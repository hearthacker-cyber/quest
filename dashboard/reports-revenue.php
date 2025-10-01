<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Revenue Reports | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <!-- Custom Reports CSS -->
    <link href="assets/css/reports-revenue.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Revenue Reports</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="../index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Revenue Reports</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-download me-1"></i> Export <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item export-btn" href="#" data-type="csv"><i class="fas fa-file-csv me-2"></i> Export as CSV</a>
                                        <a class="dropdown-item export-btn" href="#" data-type="excel"><i class="fas fa-file-excel me-2"></i> Export as Excel</a>
                                        <a class="dropdown-item export-btn" href="#" data-type="pdf"><i class="fas fa-file-pdf me-2"></i> Export as PDF</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 1: KPI Cards -->
                <div class="row">
                    <!-- Total Revenue (This Month) Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #4361ee, #3a0ca3);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +15% </span>
                                        <p class="text-white-50">From last month</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-rupee-sign text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">This Month Revenue</h6>
                                        <h5 class="ms-auto mt-0">₹85,250</h5>
                                    </div>
                                    <p class="text-muted mb-0">Current month earnings</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lifetime Revenue Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #4cc9f0, #4895ef);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +28% </span>
                                        <p class="text-white-50">YoY growth</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-chart-line text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Lifetime Revenue</h6>
                                        <h5 class="ms-auto mt-0">₹12.5L</h5>
                                    </div>
                                    <p class="text-muted mb-0">Total platform revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Subscriptions Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #f72585, #b5179e);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-success my-2"> +8% </span>
                                        <p class="text-white-50">From last month</p>
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
                                        <h5 class="ms-auto mt-0">425</h5>
                                    </div>
                                    <p class="text-muted mb-0">Current active plans</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Refunds Card -->
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats custom-stat-card">
                            <div class="p-3 mini-stats-content" style="background: linear-gradient(135deg, #7209b7, #560bad);">
                                <div class="mb-4">
                                    <div class="float-end text-end">
                                        <span class="badge bg-light text-danger my-2"> -2% </span>
                                        <p class="text-white-50">From last month</p>
                                    </div>
                                    <div class="stat-icon">
                                        <i class="fas fa-exchange-alt text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-3">
                                <div class="card mb-0 border p-3 mini-stats-desc">
                                    <div class="d-flex">
                                        <h6 class="mt-0 mb-3">Refunds</h6>
                                        <h5 class="ms-auto mt-0">₹3,250</h5>
                                    </div>
                                    <p class="text-muted mb-0">This month refunds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Filters</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Date Range</label>
                                            <input type="text" class="form-control" id="dateRangePicker" placeholder="Select date range">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Plan Type</label>
                                            <select class="form-select" id="planFilter">
                                                <option value="">All Plans</option>
                                                <option value="basic">Basic</option>
                                                <option value="standard">Standard</option>
                                                <option value="premium">Premium</option>
                                                <option value="enterprise">Enterprise</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Payment Method</label>
                                            <select class="form-select" id="paymentMethodFilter">
                                                <option value="">All Methods</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="debit_card">Debit Card</option>
                                                <option value="upi">UPI</option>
                                                <option value="net_banking">Net Banking</option>
                                                <option value="wallet">Wallet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Transaction Status</label>
                                            <select class="form-select" id="statusFilter">
                                                <option value="">All Status</option>
                                                <option value="completed">Completed</option>
                                                <option value="pending">Pending</option>
                                                <option value="failed">Failed</option>
                                                <option value="refunded">Refunded</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-end">
                                        <button type="button" class="btn btn-secondary me-2" id="resetFilters">
                                            <i class="fas fa-redo me-1"></i> Reset Filters
                                        </button>
                                        <button type="button" class="btn btn-primary" id="applyFilters">
                                            <i class="fas fa-filter me-1"></i> Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row">
                    <!-- Monthly Revenue Trend Chart -->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Monthly Revenue Trend</h4>
                                <div class="chart-container">
                                    <canvas id="revenueTrendChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue by Plan Type Chart -->
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Revenue by Plan Type</h4>
                                <div class="chart-container">
                                    <canvas id="revenueByPlanChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transaction History Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Transaction History</h4>
                                <div class="table-responsive">
                                    <table id="transactionTable" class="table table-hover table-striped mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>User</th>
                                                <th>Plan</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by DataTables -->
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

    <!-- DataTables & Buttons -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Date Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Custom Reports JS -->
    <script src="assets/js/pages/reports-revenue.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>