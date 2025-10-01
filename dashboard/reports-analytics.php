<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Test Results Analytics | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Reports Analytics -->
    <link href="assets/css/reports-analytics.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Test Results Analytics</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="reports.analytics.php">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Test Results Analytics</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary" id="generateReport">
                                    <i class="fas fa-download me-1"></i> Export Report
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- KPI Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Tests</p>
                                        <h4 class="mb-0">156</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <i class="fas fa-clipboard-list font-size-24 text-white"></i>
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
                                        <p class="text-muted fw-medium mb-2">Avg Completion Rate</p>
                                        <h4 class="mb-0">87.5%</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <i class="fas fa-check-circle font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+5.2%</span>
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
                                        <p class="text-muted fw-medium mb-2">Highest Score</p>
                                        <h4 class="mb-0">98.2%</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <i class="fas fa-trophy font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+3.8%</span>
                                    <span class="text-muted ms-2">New record</span>
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
                                        <h4 class="mb-0">72.3%</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <i class="fas fa-chart-line font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+4.1%</span>
                                    <span class="text-muted ms-2">From last month</span>
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
                                        <label for="testIdFilter" class="form-label">Test ID</label>
                                        <select class="form-select" id="testIdFilter">
                                            <option value="">All Tests</option>
                                            <option value="MATH001">MATH001 - Algebra Basics</option>
                                            <option value="PHY002">PHY002 - Physics Fundamentals</option>
                                            <option value="CHEM003">CHEM003 - Organic Chemistry</option>
                                            <option value="BIO004">BIO004 - Cell Biology</option>
                                            <option value="ENG005">ENG005 - Grammar Test</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="subjectFilter" class="form-label">Subject</label>
                                        <select class="form-select" id="subjectFilter">
                                            <option value="">All Subjects</option>
                                            <option value="mathematics">Mathematics</option>
                                            <option value="physics">Physics</option>
                                            <option value="chemistry">Chemistry</option>
                                            <option value="biology">Biology</option>
                                            <option value="english">English</option>
                                            <option value="history">History</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateFromFilter" class="form-label">Date From</label>
                                        <input type="date" class="form-control" id="dateFromFilter" value="2024-01-01">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateToFilter" class="form-label">Date To</label>
                                        <input type="date" class="form-control" id="dateToFilter" value="2024-03-31">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-search me-1"></i> Apply Filters
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="resetFilters">
                                                <i class="fas fa-redo me-1"></i> Reset
                                            </button>
                                            <button type="button" class="btn btn-outline-success ms-auto" id="refreshData">
                                                <i class="fas fa-sync-alt me-1"></i> Refresh Data
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row">
                    <!-- Score Distribution Chart -->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-bar me-2"></i>Score Distribution
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="scoreDistributionChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question Analysis Chart -->
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-pie me-2"></i>Question Analysis
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="questionAnalysisChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Test Results Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-table me-2"></i>Test Results Summary
                                </h5>
                                <div class="export-buttons">
                                    <!-- DataTables will inject export buttons here -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="testResultsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Test ID</th>
                                                <th>Test Name</th>
                                                <th>Students Assigned</th>
                                                <th>Completed</th>
                                                <th>Avg Score</th>
                                                <th>Avg Time</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Mathematics Tests -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">MATH001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-calculator text-primary me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Algebra Basics</h6>
                                                            <small class="text-muted">Mathematics</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">45</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">42</h6>
                                                    <small class="text-muted">93.3% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">78.5%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 78.5%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">45:30</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="MATH001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="MATH001">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="MATH001">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold text-primary">MATH002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-calculator text-primary me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Calculus Advanced</h6>
                                                            <small class="text-muted">Mathematics</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">38</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">35</h6>
                                                    <small class="text-muted">92.1% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-warning">65.2%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-warning" style="width: 65.2%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">52:15</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="MATH002">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="MATH002">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="MATH002">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Physics Tests -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">PHY001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-atom text-info me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Physics Fundamentals</h6>
                                                            <small class="text-muted">Physics</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">52</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">48</h6>
                                                    <small class="text-muted">92.3% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">81.3%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 81.3%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">38:45</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="PHY001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="PHY001">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="PHY001">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold text-primary">PHY002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-atom text-info me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Modern Physics</h6>
                                                            <small class="text-muted">Physics</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">41</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">36</h6>
                                                    <small class="text-muted">87.8% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-danger">58.7%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-danger" style="width: 58.7%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">61:20</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="PHY002">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="PHY002">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="PHY002">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Chemistry Tests -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">CHEM001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-flask text-success me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Organic Chemistry</h6>
                                                            <small class="text-muted">Chemistry</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">47</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">44</h6>
                                                    <small class="text-muted">93.6% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">76.8%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 76.8%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">49:10</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="CHEM001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="CHEM001">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="CHEM001">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Biology Tests -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">BIO001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-dna text-danger me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Cell Biology</h6>
                                                            <small class="text-muted">Biology</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">39</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">37</h6>
                                                    <small class="text-muted">94.9% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">84.2%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 84.2%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">42:35</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="BIO001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="BIO001">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="BIO001">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- English Tests -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">ENG001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-language text-warning me-2"></i>
                                                        <div>
                                                            <h6 class="mb-0">Grammar Test</h6>
                                                            <small class="text-muted">English</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">56</h6>
                                                    <small class="text-muted">students</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">53</h6>
                                                    <small class="text-muted">94.6% completion</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">88.7%</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 88.7%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">35:20</h6>
                                                    <small class="text-muted">minutes</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-details" title="View Details" data-id="ENG001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info download-report" title="Download Report" data-id="ENG001">
                                                            <i class="fas fa-download"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning compare-results" title="Compare Results" data-id="ENG001">
                                                            <i class="fas fa-chart-bar"></i>
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

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <!-- Custom JS for Reports Analytics -->
    <script src="assets/js/pages/reports-analytics.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>