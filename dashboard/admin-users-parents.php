<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Parents | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom Parents CSS -->
    <link href="assets/css/parents-custom.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Parent Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin/users.php">User Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Parents</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-users me-1"></i> Parent Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="admin/parents.php?action=add"><i class="fas fa-user-plus me-2"></i> Add New Parent</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-link me-2"></i> Link Students</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-import me-2"></i> Import Parents</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-chart-bar me-2"></i> Parent Analytics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parent Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 parent-stat-number">450</h4>
                                        <p class="text-muted mb-0">Total Parents</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon bg-primary">
                                            <i class="fas fa-users"></i>
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
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 parent-stat-number">380</h4>
                                        <p class="text-muted mb-0">Active Parents</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon bg-success">
                                            <i class="fas fa-user-check"></i>
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 parent-stat-number">2.3</h4>
                                        <p class="text-muted mb-0">Avg. Students/Parent</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon bg-info">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 0.2</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 parent-stat-number">320</h4>
                                        <p class="text-muted mb-0">With Active Plan</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon bg-warning">
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
                </div>

                <!-- Filters and Search Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Parent Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="parentsSearch" placeholder="Search parents...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <select class="form-select" id="subscriptionFilter">
                                            <option value="">All Subscription Plans</option>
                                            <option value="premium">Premium Plan</option>
                                            <option value="basic">Basic Plan</option>
                                            <option value="family">Family Plan</option>
                                            <option value="trial">Trial Period</option>
                                            <option value="none">No Active Plan</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <select class="form-select" id="studentsFilter">
                                            <option value="">All Student Counts</option>
                                            <option value="1">1 Student</option>
                                            <option value="2">2 Students</option>
                                            <option value="3">3+ Students</option>
                                            <option value="0">No Students</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply
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
                                            <button class="btn btn-outline-success btn-sm" id="exportParents">
                                                <i class="fas fa-file-export me-1"></i> Export
                                            </button>
                                            <button class="btn btn-outline-info btn-sm" id="printTable">
                                                <i class="fas fa-print me-1"></i> Print
                                            </button>
                                            <button class="btn btn-outline-warning btn-sm" id="sendBulkMessage">
                                                <i class="fas fa-envelope me-1"></i> Message All
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
                        <span class="me-3"><strong id="selectedCount">0</strong> parents selected</span>
                        <div class="btn-group me-3">
                            <button type="button" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-envelope me-1"></i> Send Message
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-link me-1"></i> Link Students
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

                <!-- Parents Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Manage Parents</h4>
                                
                                <div class="table-responsive">
                                    <table id="parents-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>Parent ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Linked Student(s)</th>
                                                <th>Subscription Plan</th>
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
                                                <td>#PAR001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rajesh+Sharma&background=4361ee&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rajesh Sharma</h6>
                                                            <small class="text-muted">Father</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rajesh.sharma@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=4cc9f0&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Rahul Sharma (Grade 10)
                                                        </span>
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Neha+Sharma&background=f72585&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Neha Sharma (Grade 8)
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">Family Plan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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
                                                <td>#PAR002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Sunita+Patel&background=4cc9f0&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Sunita Patel</h6>
                                                            <small class="text-muted">Mother</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>sunita.patel@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=7209b7&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Priya Patel (Grade 11)
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Premium Plan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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
                                                <td>#PAR003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Vikram+Singh&background=f72585&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Vikram Singh</h6>
                                                            <small class="text-muted">Father</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>vikram.singh@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Arjun+Singh&background=f8961e&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Arjun Singh (Grade 9)
                                                        </span>
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Karan+Singh&background=43aa8b&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Karan Singh (Grade 7)
                                                        </span>
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Simran+Singh&background=9c27b0&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Simran Singh (Grade 6)
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary">Family Plan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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
                                                <td>#PAR004</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Anita+Gupta&background=7209b7&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Anita Gupta</h6>
                                                            <small class="text-muted">Mother</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>anita.gupta@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Rohan+Gupta&background=4361ee&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Rohan Gupta (Grade 12)
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Basic Plan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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
                                                <td>#PAR005</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Sanjay+Mehta&background=f8961e&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Sanjay Mehta</h6>
                                                            <small class="text-muted">Father</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>sanjay.mehta@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="text-muted">No students linked</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary">No Plan</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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
                                                <td>#PAR006</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Pooja+Reddy&background=43aa8b&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Pooja Reddy</h6>
                                                            <small class="text-muted">Mother</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>pooja.reddy@example.com</td>
                                                <td>
                                                    <div class="student-chips">
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Aditya+Reddy&background=9c27b0&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Aditya Reddy (Grade 8)
                                                        </span>
                                                        <span class="student-chip">
                                                            <img src="https://ui-avatars.com/api/?name=Divya+Reddy&background=4361ee&color=fff" alt="" class="rounded-circle me-1" width="16" height="16">
                                                            Divya Reddy (Grade 10)
                                                        </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Trial Period</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="View Linked Students">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Manage Subscription">
                                                            <i class="fas fa-id-card"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent">
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

    <!-- Custom Parents JS -->
    <script src="assets/js/admin-users-parents.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>