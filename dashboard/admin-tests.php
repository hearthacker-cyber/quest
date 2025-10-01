<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Tests | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    
    <!-- Custom Tests CSS -->
    <link href="assets/css/pages/admin-tests.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">All Tests</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Tests</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="tests-add.php" class="btn btn-primary btn-rounded">
                                    <i class="fas fa-plus me-1"></i> Create New Test
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Tests</p>
                                        <h4 class="mb-0">48</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="fas fa-clipboard-list font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Active Tests</p>
                                        <h4 class="mb-0">12</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                            <span class="avatar-title">
                                                <i class="fas fa-play-circle font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Draft Tests</p>
                                        <h4 class="mb-0">8</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-warning">
                                            <span class="avatar-title">
                                                <i class="fas fa-edit font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Completed</p>
                                        <h4 class="mb-0">25</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-info">
                                            <span class="avatar-title">
                                                <i class="fas fa-check-circle font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Avg. Score</p>
                                        <h4 class="mb-0">72%</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-purple">
                                            <span class="avatar-title">
                                                <i class="fas fa-chart-line font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Participants</p>
                                        <h4 class="mb-0">1.2K</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-orange">
                                            <span class="avatar-title">
                                                <i class="fas fa-users font-size-20"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-filter me-2"></i>Filters & Search</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Subject</label>
                                <select class="form-select" id="filterSubject">
                                    <option value="">All Subjects</option>
                                    <option value="mathematics">Mathematics</option>
                                    <option value="science">Science</option>
                                    <option value="english">English</option>
                                    <option value="history">History</option>
                                    <option value="geography">Geography</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Test Type</label>
                                <select class="form-select" id="filterType">
                                    <option value="">All Types</option>
                                    <option value="practice">Practice Test</option>
                                    <option value="assessment">Assessment</option>
                                    <option value="quiz">Quiz</option>
                                    <option value="final">Final Exam</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="filterStatus">
                                    <option value="">All Status</option>
                                    <option value="draft">Draft</option>
                                    <option value="active">Active</option>
                                    <option value="completed">Completed</option>
                                    <option value="scheduled">Scheduled</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <label class="form-label">Date Range</label>
                                <input type="text" class="form-control" id="dateRange" placeholder="Select date range">
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-12">
                                <label class="form-label">Search</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchBox" placeholder="Search tests...">
                                    <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn btn-outline-secondary btn-sm" id="resetFilters">
                                    <i class="fas fa-redo me-1"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tests Table Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Tests List</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end gap-2">
                                    <select class="form-select form-select-sm w-auto" id="bulkAction">
                                        <option value="">Bulk Actions</option>
                                        <option value="activate">Activate</option>
                                        <option value="deactivate">Deactivate</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="applyBulkAction">
                                        <i class="fas fa-play me-1"></i> Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="testsTable" class="table table-hover table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="30">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                            </div>
                                        </th>
                                        <th width="80">Test ID</th>
                                        <th>Test Name</th>
                                        <th width="120">Subject</th>
                                        <th width="100">Questions</th>
                                        <th width="100">Duration</th>
                                        <th width="100">Status</th>
                                        <th width="120">Created On</th>
                                        <th width="180" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Data -->
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">T001</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-primary rounded-circle">
                                                            <i class="fas fa-calculator"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Algebra Basics Test</h6>
                                                    <p class="text-muted mb-0 small">Grade 10 - Practice</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">Mathematics</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">25</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">45 mins</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">15 Jan 2024</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" title="Assign">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="2">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">T002</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="fas fa-atom"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Physics Final Exam</h6>
                                                    <p class="text-muted mb-0 small">Grade 12 - Final</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Science</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">50</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">120 mins</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">Draft</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">12 Jan 2024</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" title="Assign">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="3">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">T003</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-warning rounded-circle">
                                                            <i class="fas fa-book"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">English Grammar Quiz</h6>
                                                    <p class="text-muted mb-0 small">Grade 9 - Quiz</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">English</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">20</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">30 mins</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">10 Jan 2024</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" title="Assign">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="4">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">T004</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-info rounded-circle">
                                                            <i class="fas fa-globe-asia"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">World Geography Assessment</h6>
                                                    <p class="text-muted mb-0 small">Grade 11 - Assessment</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">Geography</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">35</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">60 mins</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">Completed</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">05 Jan 2024</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" title="Assign">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="5">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">T005</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-purple rounded-circle">
                                                            <i class="fas fa-laptop-code"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Programming Basics Test</h6>
                                                    <p class="text-muted mb-0 small">Grade 10 - Practice</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-purple">Computer Science</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">30</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">90 mins</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">Scheduled</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">20 Jan 2024</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-success" title="Assign">
                                                    <i class="fas fa-share-alt"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
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

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    
    <!-- Date Range Picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Custom Tests JS -->
    <script src="assets/js/pages/admin-tests.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>