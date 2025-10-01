<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Students | Foxia - Admin Dashboard</title>
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
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Custom Students CSS -->
    <link href="assets/css/students-custom.css" rel="stylesheet" type="text/css">
</head>

<body data-sidebar="colored">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <?php include ('layout/header.php'); ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php include ('layout/sidebar.php'); ?>
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
                            <h6 class="page-title">Student Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin/users.php">User Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Students</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-graduate me-1"></i> Student Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="admin/students.php?action=add"><i class="fas fa-user-plus me-2"></i> Add New Student</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-import me-2"></i> Import Students</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-users me-2"></i> Bulk Actions</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-chart-line me-2"></i> Student Analytics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Student Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card student-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 student-stat-number">1,250</h4>
                                        <p class="text-muted mb-0">Total Students</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="student-stat-icon bg-primary">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 15%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card student-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 student-stat-number">980</h4>
                                        <p class="text-muted mb-0">Active Students</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="student-stat-icon bg-success">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 8%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card student-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 student-stat-number">750</h4>
                                        <p class="text-muted mb-0">With Active Plan</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="student-stat-icon bg-info">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 12%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card student-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 student-stat-number">85%</h4>
                                        <p class="text-muted mb-0">Avg. Progress</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="student-stat-icon bg-warning">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 5%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Student Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-3 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="studentsSearch" placeholder="Search students...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="gradeFilter">
                                            <option value="">All Grades</option>
                                            <option value="8">Grade 8</option>
                                            <option value="9">Grade 9</option>
                                            <option value="10">Grade 10</option>
                                            <option value="11">Grade 11</option>
                                            <option value="12">Grade 12</option>
                                            <option value="college">College</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="subscriptionFilter">
                                            <option value="">All Subscriptions</option>
                                            <option value="active">Active Plan</option>
                                            <option value="inactive">No Active Plan</option>
                                            <option value="trial">Trial Period</option>
                                            <option value="expired">Expired</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="lastLoginFilter">
                                            <option value="">Last Login</option>
                                            <option value="today">Today</option>
                                            <option value="week">This Week</option>
                                            <option value="month">This Month</option>
                                            <option value="3months">Last 3 Months</option>
                                            <option value="inactive">Over 3 Months</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply Filters
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="clearFilters">
                                                <i class="fas fa-times me-1"></i> Clear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <span class="text-muted">Quick Actions:</span>
                                            <button class="btn btn-outline-primary btn-sm" id="refreshTable">
                                                <i class="fas fa-sync-alt me-1"></i> Refresh
                                            </button>
                                            <button class="btn btn-outline-success btn-sm" id="exportStudents">
                                                <i class="fas fa-file-export me-1"></i> Export
                                            </button>
                                            <button class="btn btn-outline-info btn-sm" id="printTable">
                                                <i class="fas fa-print me-1"></i> Print
                                            </button>
                                            <button class="btn btn-outline-warning btn-sm" id="sendBulkMessage">
                                                <i class="fas fa-envelope me-1"></i> Message
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bulk Actions Bar -->
                <div class="bulk-actions-bar" id="bulkActionsBar">
                    <div class="d-flex align-items-center">
                        <span class="me-3"><strong id="selectedCount">0</strong> students selected</span>
                        <div class="btn-group me-3">
                            <button type="button" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-envelope me-1"></i> Send Message
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-tag me-1"></i> Add Tag
                            </button>
                            <button type="button" class="btn btn-outline-warning btn-sm">
                                <i class="fas fa-user-slash me-1"></i> Deactivate
                            </button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm" id="clearSelection">
                            <i class="fas fa-times me-1"></i> Clear Selection
                        </button>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Manage Students</h4>
                                
                                <div class="table-responsive">
                                    <table id="students-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Grade</th>
                                                <th>Active Plan</th>
                                                <th>Last Login</th>
                                                <th>Progress</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample Data - Replace with dynamic data from your backend -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#STU001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=4361ee&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rahul Sharma</h6>
                                                            <small class="text-muted">Maths, Science</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rahul.sharma@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Grade 10</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Yes</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>2 hours ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">85%</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Progress">
                                                            <i class="fas fa-chart-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Student">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#STU002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=4cc9f0&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Priya Patel</h6>
                                                            <small class="text-muted">Physics, Chemistry</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>priya.patel@example.com</td>
                                                <td>
                                                    <span class="badge bg-info">Grade 11</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Yes</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>1 day ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">92%</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Progress">
                                                            <i class="fas fa-chart-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Student">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#STU003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=f72585&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Amit Kumar</h6>
                                                            <small class="text-muted">Biology, Maths</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>amit.kumar@example.com</td>
                                                <td>
                                                    <span class="badge bg-warning">Grade 9</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary">No</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-warning me-1" style="font-size: 8px;"></i>
                                                        <span>3 days ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">65%</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Progress">
                                                            <i class="fas fa-chart-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Student">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#STU004</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=7209b7&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Neha Gupta</h6>
                                                            <small class="text-muted">All Subjects</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>neha.gupta@example.com</td>
                                                <td>
                                                    <span class="badge bg-danger">Grade 12</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Yes</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>5 minutes ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">78%</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Progress">
                                                            <i class="fas fa-chart-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Student">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#STU005</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rohan+Mehta&background=f8961e&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rohan Mehta</h6>
                                                            <small class="text-muted">Commerce</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rohan.mehta@example.com</td>
                                                <td>
                                                    <span class="badge bg-secondary">College</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Trial</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-danger me-1" style="font-size: 8px;"></i>
                                                        <span>2 weeks ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="progress" style="height: 6px; width: 80px;">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <small class="text-muted">45%</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Progress">
                                                            <i class="fas fa-chart-line"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Student">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    <!-- end main content-->

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

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <!-- Custom Students JS -->
    <script src="assets/js/pages/admin-users-students.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>