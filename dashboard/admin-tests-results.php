<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Test Results & Submissions | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    
    <!-- Custom Results CSS -->
    <link href="assets/css/admin-tests-results.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Tests Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-tests.php">Tests</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Results & Submissions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="tests.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Tests
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Submissions</p>
                                        <h4 class="mb-0" id="totalSubmissions">1,247</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <i class="fas fa-file-alt font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-success mb-0">+12.5% <span class="text-muted fs-12 ms-1">From last week</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Average Score</p>
                                        <h4 class="mb-0" id="averageScore">72.8%</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <i class="fas fa-chart-line font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-success mb-0">+3.2% <span class="text-muted fs-12 ms-1">From last week</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Pass Rate</p>
                                        <h4 class="mb-0" id="passRate">68.5%</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <i class="fas fa-check-circle font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-success mb-0">+5.1% <span class="text-muted fs-12 ms-1">From last week</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Pending Evaluation</p>
                                        <h4 class="mb-0" id="pendingEvaluation">23</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <i class="fas fa-clock font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-danger mb-0">-2 <span class="text-muted fs-12 ms-1">Since yesterday</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Filter Results</h4>
                                
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="testFilter" class="form-label">Test Name</label>
                                            <select class="form-select" id="testFilter">
                                                <option value="">All Tests</option>
                                                <option value="mathematics-final">Mathematics Final Exam</option>
                                                <option value="physics-midterm">Physics Midterm</option>
                                                <option value="chemistry-quiz">Chemistry Quiz</option>
                                                <option value="biology-assessment">Biology Assessment</option>
                                                <option value="english-test">English Proficiency Test</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="statusFilter" class="form-label">Status</label>
                                            <select class="form-select" id="statusFilter">
                                                <option value="">All Status</option>
                                                <option value="passed">Passed</option>
                                                <option value="failed">Failed</option>
                                                <option value="pending">Pending</option>
                                                <option value="not-attempted">Not Attempted</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="studentFilter" class="form-label">Student Name</label>
                                            <input type="text" class="form-control" id="studentFilter" placeholder="Search student...">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="dateFrom" class="form-label">Date From</label>
                                            <input type="date" class="form-control" id="dateFrom">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="dateTo" class="form-label">Date To</label>
                                            <input type="date" class="form-control" id="dateTo">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply Filters
                                            </button>
                                            <button class="btn btn-outline-secondary" id="resetFilters">
                                                <i class="fas fa-redo me-1"></i> Reset
                                            </button>
                                            <div class="ms-auto">
                                                <button class="btn btn-success" id="exportResults">
                                                    <i class="fas fa-download me-1"></i> Export Results
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Results Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title">Test Submissions</h4>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-primary" id="refreshTable">
                                            <i class="fas fa-sync-alt me-1"></i> Refresh
                                        </button>
                                        <div class="dropdown">
                                            <button class="btn btn-outline-success dropdown-toggle" type="button" id="exportDropdown" data-bs-toggle="dropdown">
                                                <i class="fas fa-download me-1"></i> Export
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" data-export="csv"><i class="fas fa-file-csv me-2"></i> CSV</a></li>
                                                <li><a class="dropdown-item" href="#" data-export="excel"><i class="fas fa-file-excel me-2"></i> Excel</a></li>
                                                <li><a class="dropdown-item" href="#" data-export="pdf"><i class="fas fa-file-pdf me-2"></i> PDF</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="resultsTable" class="table table-bordered table-hover dt-responsive nowrap w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="8%">Submission ID</th>
                                                <th width="20%">Test Name</th>
                                                <th width="15%">Student Name</th>
                                                <th width="12%">Score</th>
                                                <th width="10%">Status</th>
                                                <th width="15%">Submission Date</th>
                                                <th width="10%">Duration</th>
                                                <th width="10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by JavaScript -->
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

    <!-- Re-evaluate Modal -->
    <div class="modal fade" id="reEvaluateModal" tabindex="-1" aria-labelledby="reEvaluateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reEvaluateModalLabel">Re-evaluate Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to re-evaluate this submission?</p>
                    <div class="submission-info">
                        <strong>Submission ID:</strong> <span id="reEvalSubmissionId"></span><br>
                        <strong>Student:</strong> <span id="reEvalStudentName"></span><br>
                        <strong>Test:</strong> <span id="reEvalTestName"></span>
                    </div>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="recalculateScore">
                        <label class="form-check-label" for="recalculateScore">
                            Recalculate score based on current answer key
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmReEvaluate">
                        <i class="fas fa-calculator me-1"></i> Re-evaluate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Custom Results JS -->
    <script src="assets/js/pages/admin-tests-results.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>