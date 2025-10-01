<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
                            <h6 class="page-title">Dashboard</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog me-1"></i> Settings <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#"><i class="fas fa-download me-2"></i> Export Report</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-sliders-h me-2"></i> Customize</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i> Help</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 1: Overview Cards -->
                <div class="row">
                    <!-- Total Users Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #4361ee, #3a0ca3);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +12% </span>
                                        <p class="text-white-50">From last week</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Total Users</h6>
                                        <h5 class="ms-auto mt-0">1,500</h5>
                                    </div>
                                    <p class="text-muted mb-0">Registered platform users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Students Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #4cc9f0, #4895ef);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +8% </span>
                                        <p class="text-white-50">From last week</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-user-graduate text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Active Students</h6>
                                        <h5 class="ms-auto mt-0">1,200</h5>
                                    </div>
                                    <p class="text-muted mb-0">Currently learning</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Tests Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #f72585, #b5179e);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +5% </span>
                                        <p class="text-white-50">From last week</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-clipboard-check text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Active Tests</h6>
                                        <h5 class="ms-auto mt-0">25</h5>
                                    </div>
                                    <p class="text-muted mb-0">Ongoing assessments</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Questions in Bank Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #7209b7, #560bad);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-primary my-2"> 0% </span>
                                        <p class="text-white-50">No change</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-database text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Questions in Bank</h6>
                                        <h5 class="ms-auto mt-0">10,000</h5>
                                    </div>
                                    <p class="text-muted mb-0">Total questions available</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #f8961e, #f3722c);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +10% </span>
                                        <p class="text-white-50">This month</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-rupee-sign text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Revenue</h6>
                                        <h5 class="ms-auto mt-0">₹75,000</h5>
                                    </div>
                                    <p class="text-muted mb-0">Monthly revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Subscriptions Card -->
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #43aa8b, #4d908e);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +4% </span>
                                        <p class="text-white-50">From last week</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-id-card text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Active Subscriptions</h6>
                                        <h5 class="ms-auto mt-0">350</h5>
                                    </div>
                                    <p class="text-muted mb-0">Current subscriptions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Analytics -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Monthly User Growth</h4>
                                <div class="chart-container">
                                    <canvas id="userGrowthChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Platform Analytics</h4>

                                <div class="row text-center mt-4">
                                    <div class="col-6">
                                        <h5 class="">85%</h5>
                                        <p class="text-muted font-size-14">Completion Rate</p>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="">92%</h5>
                                        <p class="text-muted font-size-14">Satisfaction Score</p>
                                    </div>
                                </div>

                                <div class="chart-container mt-4">
                                    <canvas id="revenueChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- Recent Activity Section -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Recent Activity</h4>
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">User</th>
                                                <th scope="col">Activity</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=0D8ABC&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        Rahul Sharma
                                                    </div>
                                                </td>
                                                <td>Completed Test: Mathematics Advanced</td>
                                                <td>10 minutes ago</td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=F44336&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        Priya Patel
                                                    </div>
                                                </td>
                                                <td>Started new subscription</td>
                                                <td>25 minutes ago</td>
                                                <td><span class="badge bg-primary">Active</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=4CAF50&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        Amit Kumar
                                                    </div>
                                                </td>
                                                <td>Updated profile information</td>
                                                <td>1 hour ago</td>
                                                <td><span class="badge bg-info">Updated</span></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=9C27B0&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        Neha Gupta
                                                    </div>
                                                </td>
                                                <td>Submitted feedback</td>
                                                <td>2 hours ago</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
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

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Custom Dashboard Charts -->
    <script src="assets/js/pages/dashboard-charts.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>

</html>