<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Scheduled Tests | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    
    <!-- Custom CSS for Scheduled Tests Page -->
    <link href="assets/css/admin-tests-scheduled.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Scheduled Tests</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-tests.php">Tests</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Scheduled Tests</li>
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

                <!-- Filters Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-filter me-2"></i>Filters & Controls
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="statusFilter" class="form-label">Status</label>
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="upcoming">Upcoming</option>
                                            <option value="ongoing">Ongoing</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateFromFilter" class="form-label">Date From</label>
                                        <input type="date" class="form-control" id="dateFromFilter">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateToFilter" class="form-label">Date To</label>
                                        <input type="date" class="form-control" id="dateToFilter">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label d-block">&nbsp;</label>
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-search me-1"></i> Apply Filters
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="resetFilters">
                                                <i class="fas fa-redo me-1"></i> Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Scheduled</p>
                                        <h4 class="mb-0">48</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <i class="fas fa-calendar-alt font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+12%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Upcoming</p>
                                        <h4 class="mb-0">15</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <i class="fas fa-clock font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger">-5%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Ongoing</p>
                                        <h4 class="mb-0">8</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <i class="fas fa-play-circle font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+3%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Completed</p>
                                        <h4 class="mb-0">25</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <i class="fas fa-check-circle font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+18%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Scheduled Tests Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-list-alt me-2"></i>Scheduled Tests
                                </h5>
                                <div>
                                    <button class="btn btn-sm btn-success me-1" id="scheduleNewTest">
                                        <i class="fas fa-plus me-1"></i> Schedule New
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" id="refreshTable">
                                        <i class="fas fa-sync-alt me-1"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="scheduledTestsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Schedule ID</th>
                                                <th>Test Name</th>
                                                <th>Start Date & Time</th>
                                                <th>End Date & Time</th>
                                                <th>Duration</th>
                                                <th>Assigned To</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Upcoming Tests -->
                                            <tr>
                                                <td><span class="fw-bold">SCH-001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-calculator text-primary me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            Mathematics Advanced
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-20
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        09:00 AM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-20
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        11:00 AM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">120 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-primary me-1">Class 10-A</span>
                                                        <small class="text-muted">(35 students)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">Upcoming</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning reschedule-test" title="Reschedule">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-test" title="Cancel">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold">SCH-002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-atom text-info me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            Physics Fundamentals
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-22
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        02:00 PM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-22
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        03:30 PM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">90 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-success me-1">Group B</span>
                                                        <small class="text-muted">(Advanced Learners)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">Upcoming</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning reschedule-test" title="Reschedule">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-test" title="Cancel">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Ongoing Tests -->
                                            <tr>
                                                <td><span class="fw-bold">SCH-015</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-flask text-danger me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            Chemistry Lab Test
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-15
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        10:00 AM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-15
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        11:30 AM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">90 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-info me-1">Individual</span>
                                                        <small class="text-muted">(12 students)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-info">Ongoing</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning reschedule-test" title="Reschedule" disabled>
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-test" title="Cancel" disabled>
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Completed Tests -->
                                            <tr>
                                                <td><span class="fw-bold">SCH-028</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-language text-success me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            English Grammar Advanced
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-10
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        09:00 AM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-10
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        10:30 AM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">90 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-primary me-1">Class 11-B</span>
                                                        <small class="text-muted">(28 students)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info" title="View Report">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="Duplicate">
                                                            <i class="fas fa-copy"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold">SCH-025</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-landmark text-warning me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            History Mid-term
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-08
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        11:00 AM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-08
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        12:30 PM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">90 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-success me-1">Group A</span>
                                                        <small class="text-muted">(Weekend Batch)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Completed</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info" title="View Report">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="Duplicate">
                                                            <i class="fas fa-copy"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Cancelled Test -->
                                            <tr>
                                                <td><span class="fw-bold">SCH-012</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <i class="fas fa-dna text-info me-2"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            Biology Practical
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-05
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        02:00 PM
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">
                                                        <i class="far fa-calendar me-1 text-muted"></i>
                                                        2024-01-05
                                                    </div>
                                                    <div class="text-nowrap text-muted small">
                                                        <i class="far fa-clock me-1"></i>
                                                        04:00 PM
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-light text-dark">120 min</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-primary me-1">Class 12-Sci</span>
                                                        <small class="text-muted">(40 students)</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-danger">Cancelled</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-test" title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="Duplicate">
                                                            <i class="fas fa-copy"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger" title="Delete">
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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>

    <!-- Custom JS for Scheduled Tests Page -->
    <script src="assets/js/pages/admin-tests-scheduled.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>