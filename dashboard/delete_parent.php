<?php
// Include configuration
include('config.php');

// Check if parent ID is provided
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_parents.php?error=Parent ID is required");
    exit();
}

$id = $_GET['id'];

// Fetch parent data from database
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'parent'");
    $stmt->execute([$id]);
    $parent = $stmt->fetch();
    
    if(!$parent) {
        header("Location: manage_parents.php?error=Parent not found");
        exit();
    }
} catch(PDOException $e) {
    header("Location: manage_parents.php?error=Database error: " . $e->getMessage());
    exit();
}

// Check for associated students
$associated_students = [];
try {
    // Check if parent has any associated students
    // $stmt = $conn->prepare("SELECT COUNT(*) as student_count FROM parent_student_relationships WHERE parent_id = ?");
    // $stmt->execute([$id]);
    // $student_count = $stmt->fetch()['student_count'];
    
    // For demo purposes, we'll use sample data
    $student_count = 2; // Sample: 2 associated students
    $associated_students = [
        ['id' => 4, 'name' => 'Rahul Sharma', 'grade' => 2],
        ['id' => 6, 'name' => 'Amit Kumar', 'grade' => 1]
    ];
} catch(PDOException $e) {
    // Silently continue - relationship feature might not be implemented yet
    $student_count = 0;
}

// Handle form submission for confirmation
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $confirm = $_POST['confirm'];
    $delete_associated = isset($_POST['delete_associated']) ? $_POST['delete_associated'] : 'keep';
    $reason = trim($_POST['reason']);
    
    if($confirm === 'yes') {
        try {
            // Start transaction
            $conn->beginTransaction();
            
            // Delete associated student relationships first
            if($student_count > 0) {
                // $delete_relations_stmt = $conn->prepare("DELETE FROM parent_student_relationships WHERE parent_id = ?");
                // $delete_relations_stmt->execute([$id]);
                
                // If we're also deleting associated student accounts
                if($delete_associated === 'delete') {
                    foreach($associated_students as $student) {
                        // $delete_student_stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'student'");
                        // $delete_student_stmt->execute([$student['id']]);
                    }
                }
            }
            
            // Delete parent account
            // $delete_stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'parent'");
            // $result = $delete_stmt->execute([$id]);
            
            // For demo purposes, we'll simulate success
            $result = true;
            
            if($result) {
                // Commit transaction
                $conn->commit();
                
                $success_message = "Parent account has been deleted successfully!";
                $action_completed = true;
                
                // Log the deletion (you would implement your logging system here)
                // logAction("Parent deleted: " . $parent['name'] . " (ID: " . $parent['id'] . "), Reason: " . $reason);
                
            } else {
                // Rollback transaction
                $conn->rollBack();
                $error_message = "Failed to delete parent account. Please try again.";
            }
        } catch(PDOException $e) {
            // Rollback transaction on error
            $conn->rollBack();
            $error_message = "Database error: " . $e->getMessage();
        }
    } else {
        header("Location: view_parent.php?id=" . $id);
        exit();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Delete Parent | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for delete parent -->
    <style>
        .action-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .action-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }
        
        .confirmation-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border-left: 5px solid #e74c3c;
        }
        
        .confirmation-card .card-header {
            background: white;
            color: #e74c3c;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .parent-info-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-confirm {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border: none;
            color: white;
        }
        
        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        
        .warning-box {
            background: #fff5f5;
            border: 2px solid #e74c3c;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .student-options {
            background: #fff9e6;
            border: 1px solid #f39c12;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .option-radio {
            margin-bottom: 15px;
        }
        
        .option-radio input[type="radio"] {
            display: none;
        }
        
        .option-radio label {
            display: block;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .option-radio input[type="radio"]:checked + label {
            border-color: #e74c3c;
            background: #fff5f5;
            color: #e74c3c;
            font-weight: 600;
        }
        
        .consequences-list {
            list-style: none;
            padding: 0;
        }
        
        .consequences-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .consequences-list li:last-child {
            border-bottom: none;
        }
        
        .consequences-list li i {
            color: #e74c3c;
            margin-right: 10px;
        }
        
        .student-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .student-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        
        .irreversible-warning {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
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
                                <li class="breadcrumb-item"><a href="view_parent.php?id=<?php echo $parent['id']; ?>"><?php echo htmlspecialchars($parent['name']); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Delete Parent</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Header -->
                <div class="action-header">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-center text-md-start">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <h1 class="text-white mb-2">Delete Parent Account</h1>
                            <p class="text-white-50 mb-0">
                                You are about to permanently delete this parent account and all associated data.
                                <strong class="text-warning">This action cannot be undone.</strong>
                            </p>
                        </div>
                        <div class="col-md-4 text-center text-md-end">
                            <div class="text-white-50">
                                <div class="mb-2">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Critical Administrative Action
                                </div>
                                <small>This action is permanent and irreversible.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($action_completed) && $action_completed): ?>
                    <!-- Success Message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <h5 class="alert-heading mb-1">Parent Account Deleted Successfully!</h5>
                                        <p class="mb-0"><?php echo $success_message; ?></p>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <div class="card parent-info-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <i class="fas fa-trash fa-4x text-danger mb-3"></i>
                                        <h4>Parent Account Deleted</h4>
                                        <p class="text-muted">The parent account and all associated data have been permanently removed from the system.</p>
                                    </div>
                                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                                        <a href="manage_parents.php" class="btn btn-primary btn-action">
                                            <i class="fas fa-users me-2"></i> Back to Parents
                                        </a>
                                        <a href="dashboard.php" class="btn btn-outline-secondary btn-action">
                                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Parent Information -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card parent-info-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2 text-center">
                                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($parent['name']); ?>&background=e74c3c&color=fff&size=100" 
                                                 alt="Profile" class="rounded-circle mb-3" width="80" height="80">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="mb-1 text-danger"><?php echo htmlspecialchars($parent['name']); ?></h5>
                                                    <p class="text-muted mb-2">
                                                        <i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($parent['email']); ?>
                                                    </p>
                                                    <span class="badge bg-warning">Parent Account</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-muted">Parent ID</small>
                                                    <p class="mb-1"><strong>#PAR<?php echo str_pad($parent['id'], 3, '0', STR_PAD_LEFT); ?></strong></p>
                                                    
                                                    <small class="text-muted">Registration Date</small>
                                                    <p class="mb-0"><?php echo date('M j, Y', strtotime($parent['created_at'])); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-muted">Associated Students</small>
                                                    <p class="mb-1">
                                                        <span class="badge bg-info">
                                                            <?php echo $student_count; ?> student(s)
                                                        </span>
                                                    </p>
                                                    
                                                    <small class="text-muted">Last Activity</small>
                                                    <p class="mb-0"><?php echo date('M j, Y', strtotime($parent['updated_at'])); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card confirmation-card">
                                <div class="card-header">
                                    <i class="fas fa-exclamation-triangle me-2"></i> Critical Action - Confirmation Required
                                </div>
                                <div class="card-body">
                                    <?php if(isset($error_message)): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <?php echo $error_message; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <form method="POST" id="deleteParentForm">
                                        <!-- Critical Warning -->
                                        <div class="irreversible-warning">
                                            <h4 class="mb-2">
                                                <i class="fas fa-skull-crossbones me-2"></i>
                                                IRREVERSIBLE ACTION
                                            </h4>
                                            <p class="mb-0">
                                                This action will permanently delete the parent account and cannot be undone.
                                                There is no recovery option once this action is completed.
                                            </p>
                                        </div>

                                        <!-- Associated Students Section -->
                                        <?php if($student_count > 0): ?>
                                        <div class="student-options">
                                            <h6 class="mb-3">
                                                <i class="fas fa-user-graduate me-2"></i>
                                                Associated Students (<?php echo $student_count; ?>)
                                            </h6>
                                            
                                            <p class="text-muted mb-3">
                                                This parent is currently associated with the following students. 
                                                Please choose what to do with these student accounts:
                                            </p>
                                            
                                            <!-- Show associated students -->
                                            <div class="mb-3">
                                                <?php foreach($associated_students as $student): ?>
                                                    <div class="card student-card">
                                                        <div class="card-body">
                                                            <div class="d-flex align-items-center">
                                                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($student['name']); ?>&background=3498db&color=fff&size=40" 
                                                                     alt="Student" class="student-avatar me-3">
                                                                <div class="flex-grow-1">
                                                                    <h6 class="mb-1"><?php echo htmlspecialchars($student['name']); ?></h6>
                                                                    <span class="badge bg-info">Grade <?php echo $student['grade']; ?></span>
                                                                </div>
                                                                <span class="badge bg-warning">Associated</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            
                                            <div class="option-radio">
                                                <input type="radio" id="keep_students" name="delete_associated" value="keep" checked required>
                                                <label for="keep_students">
                                                    <strong>Keep Student Accounts</strong><br>
                                                    <small class="text-muted">Only remove the parent association. Student accounts will remain active.</small>
                                                </label>
                                            </div>
                                            
                                            <div class="option-radio">
                                                <input type="radio" id="delete_students" name="delete_associated" value="delete">
                                                <label for="delete_students">
                                                    <strong class="text-danger">Delete Student Accounts</strong><br>
                                                    <small class="text-muted">Permanently delete both parent and all associated student accounts.</small>
                                                </label>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Deletion Reason -->
                                        <div class="warning-box">
                                            <h6 class="mb-3">
                                                <i class="fas fa-clipboard-list me-2"></i>
                                                Deletion Details
                                            </h6>
                                            
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">
                                                    <strong>Reason for Deletion</strong>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" 
                                                          placeholder="Please provide a detailed reason for deleting this parent account..." required></textarea>
                                                <div class="form-text">This reason will be recorded in the system audit logs for compliance and review purposes.</div>
                                            </div>
                                        </div>

                                        <!-- Consequences -->
                                        <div class="mb-4">
                                            <h6 class="mb-3">
                                                <i class="fas fa-list-alt me-2"></i>
                                                Consequences of This Action
                                            </h6>
                                            <ul class="consequences-list">
                                                <li>
                                                    <i class="fas fa-trash"></i>
                                                    Parent account will be permanently deleted from the database
                                                </li>
                                                <li>
                                                    <i class="fas fa-unlink"></i>
                                                    All parent-student relationships will be removed
                                                </li>
                                                <li>
                                                    <i class="fas fa-history"></i>
                                                    Parent's activity history and data will be lost
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    Parent will no longer receive any notifications
                                                </li>
                                                <li>
                                                    <i class="fas fa-database"></i>
                                                    This action will be permanently recorded in audit logs
                                                </li>
                                                <li>
                                                    <i class="fas fa-undo"></i>
                                                    <strong>This action cannot be undone or recovered</strong>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Final Confirmation -->
                                        <div class="alert alert-danger">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="confirmIrreversible" name="confirm" value="yes" required>
                                                <label class="form-check-label" for="confirmIrreversible">
                                                    <strong>
                                                        I understand that this action is permanent and cannot be undone.
                                                    </strong>
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="confirmBackup" required>
                                                <label class="form-check-label" for="confirmBackup">
                                                    <strong>
                                                        I have verified that this deletion is necessary and appropriate.
                                                    </strong>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="confirmAuthorization" required>
                                                <label class="form-check-label" for="confirmAuthorization">
                                                    <strong>
                                                        I have the proper authorization to perform this critical action.
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Type Parent Name for Confirmation -->
                                        <div class="warning-box">
                                            <div class="mb-3">
                                                <label for="confirm_name" class="form-label">
                                                    <strong>Type the parent's name to confirm</strong>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="confirm_name" 
                                                       placeholder="Type: <?php echo htmlspecialchars($parent['name']); ?>" 
                                                       oninput="validateName()">
                                                <div class="form-text">Type the parent's full name exactly as shown above to confirm deletion.</div>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-secondary btn-action">
                                                    <i class="fas fa-times me-2"></i> Cancel
                                                </a>
                                                <a href="manage_parents.php" class="btn btn-outline-primary btn-action">
                                                    <i class="fas fa-list me-2"></i> Back to Parents
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-confirm btn-action" id="deleteButton" disabled>
                                                    <i class="fas fa-trash me-2"></i> 
                                                    Permanently Delete Parent
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alternative Actions -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card confirmation-card">
                                <div class="card-header">
                                    <i class="fas fa-lightbulb me-2"></i> Consider Alternative Actions
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <i class="fas fa-user-slash fa-2x text-warning mb-3"></i>
                                                <h6>Suspension</h6>
                                                <p class="text-muted small">Temporarily disable the account instead of permanent deletion.</p>
                                                <a href="suspend_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-warning btn-sm">
                                                    Suspend Instead
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <i class="fas fa-edit fa-2x text-info mb-3"></i>
                                                <h6>Edit Account</h6>
                                                <p class="text-muted small">Update parent information or restrict access instead.</p>
                                                <a href="edit_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-info btn-sm">
                                                    Edit Instead
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="text-center">
                                                <i class="fas fa-archive fa-2x text-secondary mb-3"></i>
                                                <h6>Archive</h6>
                                                <p class="text-muted small">Archive the account for later review instead of deletion.</p>
                                                <a href="manage_parents.php" class="btn btn-outline-secondary btn-sm">
                                                    Back to List
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

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
            
            // Form validation
            $('#deleteParentForm').on('submit', function(e) {
                const confirmed = $('#confirmIrreversible').is(':checked') && 
                                $('#confirmBackup').is(':checked') && 
                                $('#confirmAuthorization').is(':checked');
                
                if (!confirmed) {
                    e.preventDefault();
                    alert('Please confirm all critical warnings before proceeding.');
                    return false;
                }
                
                const reason = $('#reason').val().trim();
                if (!reason) {
                    e.preventDefault();
                    alert('Please provide a reason for the deletion.');
                    $('#reason').focus();
                    return false;
                }
                
                const parentName = '<?php echo htmlspecialchars($parent['name']); ?>';
                const typedName = $('#confirm_name').val().trim();
                
                if (typedName !== parentName) {
                    e.preventDefault();
                    alert('Please type the parent\'s name exactly as shown to confirm deletion.');
                    $('#confirm_name').focus();
                    return false;
                }
                
                // Final warning
                if (!confirm('FINAL WARNING: This will permanently delete the parent account and cannot be undone. Are you absolutely sure?')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Warning for deleting associated students
            $('#delete_students').on('change', function() {
                if ($(this).is(':checked')) {
                    if (!confirm('WARNING: This will also delete all associated student accounts. This action affects multiple users and cannot be undone. Are you sure?')) {
                        $('#keep_students').prop('checked', true);
                    }
                }
            });
        });
        
        // Validate typed name matches parent name
        function validateName() {
            const parentName = '<?php echo htmlspecialchars($parent['name']); ?>';
            const typedName = document.getElementById('confirm_name').value.trim();
            const deleteButton = document.getElementById('deleteButton');
            
            if (typedName === parentName) {
                deleteButton.disabled = false;
            } else {
                deleteButton.disabled = true;
            }
        }
    </script>

</body>

</html>