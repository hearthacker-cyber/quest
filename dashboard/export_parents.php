<?php
// Include configuration
include('config.php');

// Initialize variables
$success = '';
$error = '';
$export_type = 'excel';
$include_columns = ['name', 'email', 'students_count', 'status', 'created_at'];
$filters = [];

// Fetch all parents from database with additional data
$parents = [];
try {
    $stmt = $conn->prepare("
        SELECT 
            u.id, 
            u.name, 
            u.email, 
            u.created_at,
            u.updated_at,
            COUNT(psr.student_id) as students_count
        FROM users u 
        LEFT JOIN parent_student_relationships psr ON u.id = psr.parent_id 
        WHERE u.role = 'parent' 
        GROUP BY u.id 
        ORDER BY u.name
    ");
    $stmt->execute();
    $parents = $stmt->fetchAll();
} catch(PDOException $e) {
    // If relationship table doesn't exist, fall back to basic query
    try {
        $stmt = $conn->prepare("SELECT id, name, email, created_at, updated_at FROM users WHERE role = 'parent' ORDER BY name");
        $stmt->execute();
        $parents = $stmt->fetchAll();
        
        // Add students_count as 0 for all parents
        foreach($parents as &$parent) {
            $parent['students_count'] = 0;
        }
    } catch(PDOException $e2) {
        $error = "Error fetching parents: " . $e2->getMessage();
    }
}

// Handle export request
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['export_data'])) {
    $export_type = $_POST['export_type'];
    $include_columns = isset($_POST['include_columns']) ? $_POST['include_columns'] : [];
    $filename = $_POST['filename'] ?: 'parents_export';
    
    // Apply filters if any
    $filtered_parents = applyFilters($parents, $_POST);
    
    if(empty($filtered_parents)) {
        $error = "No data to export based on the current filters.";
    } else {
        try {
            switch($export_type) {
                case 'excel':
                    exportExcel($filtered_parents, $include_columns, $filename);
                    break;
                case 'csv':
                    exportCSV($filtered_parents, $include_columns, $filename);
                    break;
                case 'pdf':
                    exportPDF($filtered_parents, $include_columns, $filename);
                    break;
                case 'json':
                    exportJSON($filtered_parents, $include_columns, $filename);
                    break;
                default:
                    $error = "Invalid export type selected.";
            }
        } catch(Exception $e) {
            $error = "Export failed: " . $e->getMessage();
        }
    }
}

// Apply filters to parents data
function applyFilters($parents, $post_data) {
    $filtered = $parents;
    
    // Filter by students count
    if(isset($post_data['students_filter']) && $post_data['students_filter'] !== '') {
        $filtered = array_filter($filtered, function($parent) use ($post_data) {
            $count = $parent['students_count'];
            switch($post_data['students_filter']) {
                case 'none': return $count == 0;
                case 'single': return $count == 1;
                case 'multiple': return $count > 1;
                default: return true;
            }
        });
    }
    
    // Filter by registration date
    if(!empty($post_data['date_from'])) {
        $filtered = array_filter($filtered, function($parent) use ($post_data) {
            return strtotime($parent['created_at']) >= strtotime($post_data['date_from']);
        });
    }
    
    if(!empty($post_data['date_to'])) {
        $filtered = array_filter($filtered, function($parent) use ($post_data) {
            return strtotime($parent['created_at']) <= strtotime($post_data['date_to']);
        });
    }
    
    return array_values($filtered);
}

// Export functions
function exportExcel($data, $columns, $filename) {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
    header('Cache-Control: max-age=0');
    
    $output = fopen('php://output', 'w');
    
    // Add BOM for UTF-8
    fwrite($output, "\xEF\xBB\xBF");
    
    // Headers
    $headers = [];
    foreach($columns as $column) {
        $headers[] = getColumnHeader($column);
    }
    fputcsv($output, $headers, "\t");
    
    // Data
    foreach($data as $parent) {
        $row = [];
        foreach($columns as $column) {
            $row[] = getFormattedValue($parent, $column);
        }
        fputcsv($output, $row, "\t");
    }
    
    fclose($output);
    exit;
}

function exportCSV($data, $columns, $filename) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '.csv"');
    
    $output = fopen('php://output', 'w');
    
    // Add BOM for UTF-8
    fwrite($output, "\xEF\xBB\xBF");
    
    // Headers
    $headers = [];
    foreach($columns as $column) {
        $headers[] = getColumnHeader($column);
    }
    fputcsv($output, $headers);
    
    // Data
    foreach($data as $parent) {
        $row = [];
        foreach($columns as $column) {
            $row[] = getFormattedValue($parent, $column);
        }
        fputcsv($output, $row);
    }
    
    fclose($output);
    exit;
}

function exportPDF($data, $columns, $filename) {
    // For PDF export, we'll create a simple HTML table and let the user print as PDF
    // In a real implementation, you might use a library like TCPDF or Dompdf
    
    $html = '<!DOCTYPE html>
    <html>
    <head>
        <title>Parents Export</title>
        <style>
            body { font-family: Arial, sans-serif; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            .header { text-align: center; margin-bottom: 20px; }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Parents List</h1>
            <p>Generated on: ' . date('Y-m-d H:i:s') . '</p>
            <p>Total Records: ' . count($data) . '</p>
        </div>
        <table>
            <thead>
                <tr>';
    
    foreach($columns as $column) {
        $html .= '<th>' . getColumnHeader($column) . '</th>';
    }
    
    $html .= '</tr>
            </thead>
            <tbody>';
    
    foreach($data as $parent) {
        $html .= '<tr>';
        foreach($columns as $column) {
            $html .= '<td>' . htmlspecialchars(getFormattedValue($parent, $column)) . '</td>';
        }
        $html .= '</tr>';
    }
    
    $html .= '</tbody>
        </table>
    </body>
    </html>';
    
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment;filename="' . $filename . '.html"');
    echo $html;
    exit;
}

function exportJSON($data, $columns, $filename) {
    $export_data = [];
    
    foreach($data as $parent) {
        $row = [];
        foreach($columns as $column) {
            $row[getColumnHeader($column)] = getFormattedValue($parent, $column);
        }
        $export_data[] = $row;
    }
    
    header('Content-Type: application/json');
    header('Content-Disposition: attachment;filename="' . $filename . '.json"');
    echo json_encode($export_data, JSON_PRETTY_PRINT);
    exit;
}

// Helper functions
function getColumnHeader($column) {
    $headers = [
        'id' => 'Parent ID',
        'name' => 'Name',
        'email' => 'Email',
        'students_count' => 'Students Count',
        'status' => 'Status',
        'created_at' => 'Registration Date',
        'updated_at' => 'Last Updated'
    ];
    return $headers[$column] ?? ucfirst(str_replace('_', ' ', $column));
}

function getFormattedValue($parent, $column) {
    switch($column) {
        case 'id':
            return 'PAR' . str_pad($parent['id'], 3, '0', STR_PAD_LEFT);
        case 'created_at':
        case 'updated_at':
            return date('Y-m-d', strtotime($parent[$column]));
        case 'status':
            return 'Active'; // You would get this from your database
        case 'students_count':
            return $parent['students_count'] ?? 0;
        default:
            return $parent[$column] ?? '';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Export Parents | Foxia - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS for export page -->
    <style>
        .page-header {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .export-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .export-card .card-header {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: #3498db;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-export {
            background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
            border: none;
            color: white;
        }
        
        .btn-export:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .format-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        
        .format-option {
            flex: 1;
            min-width: 120px;
        }
        
        .format-option input[type="radio"] {
            display: none;
        }
        
        .format-option label {
            display: block;
            padding: 20px;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .format-option input[type="radio"]:checked + label {
            border-color: #3498db;
            background: #ebf5fb;
            color: #3498db;
            font-weight: 600;
        }
        
        .format-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .columns-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .column-checkbox {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .column-checkbox:hover {
            background: #e9ecef;
        }
        
        .preview-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            max-height: 400px;
            overflow: auto;
        }
        
        .preview-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .preview-table th,
        .preview-table td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        
        .preview-table th {
            background-color: #3498db;
            color: white;
        }
        
        .preview-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .stats-box {
            background: #e8f5e8;
            border-left: 4px solid #27ae60;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .stat-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .selection-actions {
            background: #fff9e6;
            border-left: 4px solid #f39c12;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body data-sidebar="colored">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <?php include('layout/header.php'); ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php include('layout/sidebar.php'); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">Parent Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage_parents.php">Manage Parents</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Export Parents</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="manage_parents.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Parents
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-white mb-2">
                                <i class="fas fa-download me-2"></i> Export Parents Data
                            </h1>
                            <p class="text-white-50 mb-0">
                                Export parent information to various formats for reporting, analysis, or backup purposes.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-white-50">
                                <i class="fas fa-file-export fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                <?php if($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Export Successful!</h5>
                                <p class="mb-0"><?php echo $success; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Export Failed!</h5>
                                <p class="mb-0"><?php echo $error; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <!-- Export Settings -->
                    <div class="col-lg-8">
                        <div class="card export-card">
                            <div class="card-header">
                                <i class="fas fa-cog me-2"></i> Export Settings
                            </div>
                            <div class="card-body">
                                <form method="POST" id="exportForm">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-file-export"></i> Export Format
                                        </h5>
                                        
                                        <div class="format-options">
                                            <div class="format-option">
                                                <input type="radio" id="format_excel" name="export_type" value="excel" <?php echo $export_type == 'excel' ? 'checked' : ''; ?> required>
                                                <label for="format_excel">
                                                    <i class="fas fa-file-excel format-icon text-success"></i>
                                                    Excel (.xls)
                                                </label>
                                            </div>
                                            <div class="format-option">
                                                <input type="radio" id="format_csv" name="export_type" value="csv" <?php echo $export_type == 'csv' ? 'checked' : ''; ?>>
                                                <label for="format_csv">
                                                    <i class="fas fa-file-csv format-icon text-info"></i>
                                                    CSV (.csv)
                                                </label>
                                            </div>
                                            <div class="format-option">
                                                <input type="radio" id="format_pdf" name="export_type" value="pdf" <?php echo $export_type == 'pdf' ? 'checked' : ''; ?>>
                                                <label for="format_pdf">
                                                    <i class="fas fa-file-pdf format-icon text-danger"></i>
                                                    PDF (.html)
                                                </label>
                                            </div>
                                            <div class="format-option">
                                                <input type="radio" id="format_json" name="export_type" value="json" <?php echo $export_type == 'json' ? 'checked' : ''; ?>>
                                                <label for="format_json">
                                                    <i class="fas fa-file-code format-icon text-warning"></i>
                                                    JSON (.json)
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="filename" class="form-label">File Name</label>
                                                <input type="text" class="form-control" id="filename" name="filename" 
                                                       value="parents_export_<?php echo date('Y_m_d'); ?>" 
                                                       placeholder="Enter file name">
                                                <div class="form-text">Custom name for the exported file</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Total Records</label>
                                                <div class="form-control bg-light">
                                                    <strong><?php echo count($parents); ?></strong> parents found
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Column Selection -->
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-columns"></i> Select Columns
                                            <span class="badge bg-primary ms-2" id="selectedColumnsCount"><?php echo count($include_columns); ?> selected</span>
                                        </h5>
                                        
                                        <div class="selection-actions">
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="selectAllColumns()">
                                                    <i class="fas fa-check-square me-1"></i> Select All
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deselectAllColumns()">
                                                    <i class="fas fa-times-circle me-1"></i> Deselect All
                                                </button>
                                                <button type="button" class="btn btn-outline-info btn-sm" onclick="selectDefaultColumns()">
                                                    <i class="fas fa-undo me-1"></i> Default Columns
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="columns-box">
                                            <?php
                                            $all_columns = [
                                                'id' => 'Parent ID',
                                                'name' => 'Name',
                                                'email' => 'Email',
                                                'students_count' => 'Students Count',
                                                'status' => 'Status',
                                                'created_at' => 'Registration Date',
                                                'updated_at' => 'Last Updated'
                                            ];
                                            
                                            foreach($all_columns as $key => $label):
                                            ?>
                                                <div class="form-check column-checkbox">
                                                    <input class="form-check-input column-select" type="checkbox" 
                                                           name="include_columns[]" value="<?php echo $key; ?>" 
                                                           id="column_<?php echo $key; ?>"
                                                           <?php echo in_array($key, $include_columns) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label" for="column_<?php echo $key; ?>">
                                                        <strong><?php echo $label; ?></strong>
                                                    </label>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                                    <!-- Filters -->
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-filter"></i> Filters (Optional)
                                        </h5>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="students_filter" class="form-label">Students Count</label>
                                                <select class="form-control" id="students_filter" name="students_filter">
                                                    <option value="">All Parents</option>
                                                    <option value="none">No Students</option>
                                                    <option value="single">1 Student</option>
                                                    <option value="multiple">2+ Students</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date_from" class="form-label">Registered From</label>
                                                <input type="date" class="form-control" id="date_from" name="date_from">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date_to" class="form-label">Registered To</label>
                                                <input type="date" class="form-control" id="date_to" name="date_to">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Actions -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="manage_parents.php" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <button type="reset" class="btn btn-warning btn-action">
                                                        <i class="fas fa-redo me-2"></i> Reset
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" name="export_data" class="btn btn-export btn-action">
                                                        <i class="fas fa-download me-2"></i> Export Data
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview & Statistics -->
                    <div class="col-lg-4">
                        <!-- Data Preview -->
                        <div class="card export-card">
                            <div class="card-header">
                                <i class="fas fa-eye me-2"></i> Data Preview
                            </div>
                            <div class="card-body">
                                <div class="preview-box">
                                    <table class="preview-table">
                                        <thead>
                                            <tr>
                                                <?php 
                                                $preview_columns = array_slice($include_columns, 0, 4); // Show first 4 columns
                                                foreach($preview_columns as $column): 
                                                ?>
                                                    <th><?php echo getColumnHeader($column); ?></th>
                                                <?php endforeach; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $preview_data = array_slice($parents, 0, 5); // Show first 5 rows
                                            foreach($preview_data as $parent): 
                                            ?>
                                                <tr>
                                                    <?php foreach($preview_columns as $column): ?>
                                                        <td><?php echo getFormattedValue($parent, $column); ?></td>
                                                    <?php endforeach; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        Showing <?php echo min(5, count($parents)); ?> of <?php echo count($parents); ?> records
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Export Statistics -->
                        <div class="card export-card">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-2"></i> Export Statistics
                            </div>
                            <div class="card-body">
                                <div class="stats-box">
                                    <?php
                                    $total_parents = count($parents);
                                    $with_students = array_filter($parents, function($p) { return ($p['students_count'] ?? 0) > 0; });
                                    $without_students = $total_parents - count($with_students);
                                    ?>
                                    
                                    <div class="stat-item">
                                        <span>Total Parents:</span>
                                        <strong><?php echo $total_parents; ?></strong>
                                    </div>
                                    <div class="stat-item">
                                        <span>With Students:</span>
                                        <strong><?php echo count($with_students); ?></strong>
                                    </div>
                                    <div class="stat-item">
                                        <span>Without Students:</span>
                                        <strong><?php echo $without_students; ?></strong>
                                    </div>
                                    <div class="stat-item">
                                        <span>New This Month:</span>
                                        <strong>
                                            <?php 
                                            $this_month = array_filter($parents, function($p) {
                                                return strtotime($p['created_at']) >= strtotime('first day of this month');
                                            });
                                            echo count($this_month);
                                            ?>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Quick Export -->
                        <div class="card export-card">
                            <div class="card-header">
                                <i class="fas fa-bolt me-2"></i> Quick Export
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-outline-success" onclick="quickExport('excel')">
                                        <i class="fas fa-file-excel me-2"></i> Quick Excel Export
                                    </button>
                                    <button type="button" class="btn btn-outline-info" onclick="quickExport('csv')">
                                        <i class="fas fa-file-csv me-2"></i> Quick CSV Export
                                    </button>
                                    <button type="button" class="btn btn-outline-primary" onclick="quickExport('all_data')">
                                        <i class="fas fa-database me-2"></i> Export All Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Page-content -->

        <footer class="footer text-center">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script> Foxia <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
        </footer>
    </div>
    <!-- end main-content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
  
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Update selected columns count
            function updateColumnsCount() {
                const selectedCount = $('.column-select:checked').length;
                $('#selectedColumnsCount').text(selectedCount + ' selected');
            }
            
            // Event listeners
            $('.column-select').on('change', updateColumnsCount);
            
            // Initial update
            updateColumnsCount();
            
            // Form validation
            $('#exportForm').on('submit', function(e) {
                const selectedCount = $('.column-select:checked').length;
                
                if (selectedCount === 0) {
                    e.preventDefault();
                    alert('Please select at least one column to export.');
                    return false;
                }
                
                return true;
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
        
        // Column selection functions
        function selectAllColumns() {
            $('.column-select').prop('checked', true);
            updateColumnsCount();
        }
        
        function deselectAllColumns() {
            $('.column-select').prop('checked', false);
            updateColumnsCount();
        }
        
        function selectDefaultColumns() {
            deselectAllColumns();
            $('#column_id, #column_name, #column_email, #column_students_count, #column_created_at').prop('checked', true);
            updateColumnsCount();
        }
        
        function updateColumnsCount() {
            const selectedCount = $('.column-select:checked').length;
            $('#selectedColumnsCount').text(selectedCount + ' selected');
        }
        
        // Quick export functions
        function quickExport(type) {
            if (type === 'all_data') {
                selectAllColumns();
            } else {
                selectDefaultColumns();
                $('#format_' + type).prop('checked', true);
            }
            
            $('#exportForm').submit();
        }
    </script>

</body>

</html>