<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quick Actions | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    
    <!-- Custom Dashboard CSS -->
    <link href="assets/css/dashboard-custom.css" rel="stylesheet" type="text/css">
    <!-- Quick Actions CSS -->
    <link href="assets/css/admin-quick.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Quick Actions</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quick Actions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bolt me-1"></i> Quick Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#"><i class="fas fa-rocket me-2"></i> Performance</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs me-2"></i> System Tools</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-history me-2"></i> Recent Actions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Summary -->
                <div class="row mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="card quick-stat-card">
                            <div class="card-body text-center">
                                <div class="quick-stat-icon bg-primary">
                                    <i class="fas fa-users"></i>
                                </div>
                                <h4 class="mt-3 quick-stat-number">1,500</h4>
                                <p class="text-muted mb-0">Total Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card quick-stat-card">
                            <div class="card-body text-center">
                                <div class="quick-stat-icon bg-success">
                                    <i class="fas fa-clipboard-check"></i>
                                </div>
                                <h4 class="mt-3 quick-stat-number">25</h4>
                                <p class="text-muted mb-0">Active Tests</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card quick-stat-card">
                            <div class="card-body text-center">
                                <div class="quick-stat-icon bg-warning">
                                    <i class="fas fa-database"></i>
                                </div>
                                <h4 class="mt-3 quick-stat-number">10,000</h4>
                                <p class="text-muted mb-0">Questions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card quick-stat-card">
                            <div class="card-body text-center">
                                <div class="quick-stat-icon bg-info">
                                    <i class="fas fa-rupee-sign"></i>
                                </div>
                                <h4 class="mt-3 quick-stat-number">₹75K</h4>
                                <p class="text-muted mb-0">Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Quick Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Quick Actions</h4>
                                <p class="text-muted mb-4">Frequently used actions to manage your platform efficiently</p>
                                
                                <div class="row quick-actions-grid">
                                    <!-- Create Test -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/tests.php?action=create" class="quick-action-card">
                                            <div class="card action-card bg-primary text-white">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </div>
                                                    <h5 class="action-title">Create Test</h5>
                                                    <p class="action-desc mb-0">Create new assessment</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- Add Question -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/questions.php?action=add" class="quick-action-card">
                                            <div class="card action-card bg-success text-white">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <h5 class="action-title">Add Question</h5>
                                                    <p class="action-desc mb-0">Add to question bank</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- Add User -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/users.php?action=add" class="quick-action-card">
                                            <div class="card action-card bg-info text-white">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-user-plus"></i>
                                                    </div>
                                                    <h5 class="action-title">Add User</h5>
                                                    <p class="action-desc mb-0">Register new user</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- View Reports -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/reports.php" class="quick-action-card">
                                            <div class="card action-card bg-warning text-dark">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-chart-bar"></i>
                                                    </div>
                                                    <h5 class="action-title">View Reports</h5>
                                                    <p class="action-desc mb-0">Analytics & insights</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- Manage Subscriptions -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/subscriptions.php" class="quick-action-card">
                                            <div class="card action-card bg-danger text-white">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-id-card"></i>
                                                    </div>
                                                    <h5 class="action-title">Manage Subscriptions</h5>
                                                    <p class="action-desc mb-0">Subscription plans</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    
                                    <!-- System Settings -->
                                    <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                                        <a href="admin/settings.php" class="quick-action-card">
                                            <div class="card action-card bg-secondary text-white">
                                                <div class="card-body text-center p-4">
                                                    <div class="action-icon mb-3">
                                                        <i class="fas fa-cogs"></i>
                                                    </div>
                                                    <h5 class="action-title">System Settings</h5>
                                                    <p class="action-desc mb-0">Platform configuration</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Recent Activity -->
                <div class="row mt-4">
                    <!-- Latest Registered Users -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Latest Registered Users</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Date Joined</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=4361ee&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rahul Sharma</h6>
                                                            <small class="text-muted">Student</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rahul.sharma@example.com</td>
                                                <td>15 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=4cc9f0&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Priya Patel</h6>
                                                            <small class="text-muted">Teacher</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>priya.patel@example.com</td>
                                                <td>14 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=f72585&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Amit Kumar</h6>
                                                            <small class="text-muted">Student</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>amit.kumar@example.com</td>
                                                <td>13 Dec 2023</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=7209b7&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Neha Gupta</h6>
                                                            <small class="text-muted">Student</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>neha.gupta@example.com</td>
                                                <td>12 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rohan+Mehta&background=f8961e&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Rohan Mehta</h6>
                                                            <small class="text-muted">Admin</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>rohan.mehta@example.com</td>
                                                <td>11 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Latest Created Tests -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Latest Created Tests</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Subject</th>
                                                <th>Created On</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="test-icon bg-primary">
                                                                <i class="fas fa-calculator"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">Mathematics Advanced</h6>
                                                            <small class="text-muted">50 Questions</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Mathematics</td>
                                                <td>15 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="test-icon bg-success">
                                                                <i class="fas fa-flask"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">Science Fundamentals</h6>
                                                            <small class="text-muted">40 Questions</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Science</td>
                                                <td>14 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="test-icon bg-info">
                                                                <i class="fas fa-language"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">English Grammar</h6>
                                                            <small class="text-muted">35 Questions</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>English</td>
                                                <td>13 Dec 2023</td>
                                                <td><span class="badge bg-warning text-dark">Draft</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="test-icon bg-warning">
                                                                <i class="fas fa-history"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">History Quiz</h6>
                                                            <small class="text-muted">30 Questions</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>History</td>
                                                <td>12 Dec 2023</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="test-icon bg-danger">
                                                                <i class="fas fa-globe-asia"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">Geography Test</h6>
                                                            <small class="text-muted">45 Questions</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>Geography</td>
                                                <td>11 Dec 2023</td>
                                                <td><span class="badge bg-secondary">Archived</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

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

    <!-- Quick Actions JS -->
    <script src="assets/js/dashboard-quick.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>