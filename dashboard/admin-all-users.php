<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Users | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom Users CSS -->
    <link href="assets/css/admin-users.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">User Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Users</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog me-1"></i> User Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="admin/users.php?action=add"><i class="fas fa-user-plus me-2"></i> Add New User</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-export me-2"></i> Export Users</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-users-cog me-2"></i> Bulk Actions</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i> User Guide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 user-stat-number">1,500</h4>
                                        <p class="text-muted mb-0">Total Users</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon bg-primary">
                                            <i class="fas fa-users"></i>
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
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 user-stat-number">1,200</h4>
                                        <p class="text-muted mb-0">Active Users</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon bg-success">
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
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 user-stat-number">250</h4>
                                        <p class="text-muted mb-0">Teachers</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon bg-info">
                                            <i class="fas fa-chalkboard-teacher"></i>
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
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 user-stat-number">50</h4>
                                        <p class="text-muted mb-0">Suspended</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon bg-warning">
                                            <i class="fas fa-user-slash"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger"><i class="fas fa-arrow-down me-1"></i> 2%</span>
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
                                <h4 class="mt-0 header-title mb-4">Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="usersSearch" placeholder="Search users...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="roleFilter">
                                            <option value="">All Roles</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="admin">Admin</option>
                                            <option value="moderator">Moderator</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="suspended">Suspended</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <input type="date" class="form-control" id="dateFromFilter" placeholder="From Date">
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <span class="text-muted">Quick Actions:</span>
                                            <button class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-sync-alt me-1"></i> Refresh
                                            </button>
                                            <button class="btn btn-outline-success btn-sm">
                                                <i class="fas fa-file-export me-1"></i> Export
                                            </button>
                                            <button class="btn btn-outline-info btn-sm">
                                                <i class="fas fa-print me-1"></i> Print
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">All Users</h4>
                                
                                <div class="table-responsive">
                                    <table id="users-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Registered On</th>
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
                                                <td>#USR001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=4361ee&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rahul Sharma</h6>
                                                            <small class="text-muted">Last active: 2 hours ago</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rahul.sharma@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Student</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>15 Dec 2023</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend User">
                                                            <i class="fas fa-user-slash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User">
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
                                                <td>#USR002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=4cc9f0&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Priya Patel</h6>
                                                            <small class="text-muted">Last active: 1 day ago</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>priya.patel@example.com</td>
                                                <td>
                                                    <span class="badge bg-info">Teacher</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>14 Dec 2023</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend User">
                                                            <i class="fas fa-user-slash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User">
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
                                                <td>#USR003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=f72585&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Amit Kumar</h6>
                                                            <small class="text-muted">Last active: 5 minutes ago</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>amit.kumar@example.com</td>
                                                <td>
                                                    <span class="badge bg-danger">Admin</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>13 Dec 2023</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend User">
                                                            <i class="fas fa-user-slash"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User">
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
                                                <td>#USR004</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=7209b7&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Neha Gupta</h6>
                                                            <small class="text-muted">Last active: 3 days ago</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>neha.gupta@example.com</td>
                                                <td>
                                                    <span class="badge bg-primary">Student</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Inactive</span>
                                                </td>
                                                <td>12 Dec 2023</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Activate User">
                                                            <i class="fas fa-user-check"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User">
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
                                                <td>#USR005</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rohan+Mehta&background=f8961e&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rohan Mehta</h6>
                                                            <small class="text-muted">Last active: 1 week ago</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rohan.mehta@example.com</td>
                                                <td>
                                                    <span class="badge bg-secondary">Moderator</span>
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger">Suspended</span>
                                                </td>
                                                <td>11 Dec 2023</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Unsuspend User">
                                                            <i class="fas fa-user-check"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <!-- Add more sample rows as needed -->
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

    <!-- Custom Users JS -->
    <script src="assets/js/pages/admin-users.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>