<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Engagement Reports | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Engagement Reports -->
    <link href="assets/css/reports-engagement.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Engagement Reports</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="reports-engagement.php">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Engagement Reports</li>
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
                    <div class="col-xl-2 col-md-4">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">DAU</p>
                                        <h4 class="mb-0">1,247</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <i class="fas fa-users font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+8.3%</span>
                                    <span class="text-muted ms-2">From yesterday</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">WAU</p>
                                        <h4 class="mb-0">8,542</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <i class="fas fa-user-friends font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+12.7%</span>
                                    <span class="text-muted ms-2">From last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">MAU</p>
                                        <h4 class="mb-0">24,856</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <i class="fas fa-chart-line font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+15.2%</span>
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
                                        <p class="text-muted fw-medium mb-2">Avg Session Duration</p>
                                        <h4 class="mb-0">24m 35s</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <i class="fas fa-clock font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+2.3%</span>
                                    <span class="text-muted ms-2">From last week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Tests Attempted</p>
                                        <h4 class="mb-0">8,427</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-danger">
                                        <i class="fas fa-clipboard-check font-size-24 text-white"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+18.9%</span>
                                    <span class="text-muted ms-2">This month</span>
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
                                        <label for="gradeFilter" class="form-label">Grade</label>
                                        <select class="form-select" id="gradeFilter">
                                            <option value="">All Grades</option>
                                            <option value="10">Grade 10</option>
                                            <option value="11">Grade 11</option>
                                            <option value="12">Grade 12</option>
                                            <option value="college">College</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="userTypeFilter" class="form-label">User Type</label>
                                        <select class="form-select" id="userTypeFilter">
                                            <option value="">All Users</option>
                                            <option value="student">Student</option>
                                            <option value="teacher">Teacher</option>
                                            <option value="parent">Parent</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateFromFilter" class="form-label">Date From</label>
                                        <input type="date" class="form-control" id="dateFromFilter" value="2024-02-01">
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
                    <!-- Daily Active Users Chart -->
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-line me-2"></i>Daily Active Users (Last 30 Days)
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="dauChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Device Usage Chart -->
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-mobile-alt me-2"></i>Device/Platform Usage
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="deviceUsageChart" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Participation by Grade Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-chart-bar me-2"></i>Participation by Grade
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="chart-container">
                                    <canvas id="participationChart" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Engagement Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-table me-2"></i>User Engagement Details
                                </h5>
                                <div class="export-buttons">
                                    <!-- DataTables will inject export buttons here -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="engagementTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>User Type</th>
                                                <th>Logins</th>
                                                <th>Tests Attempted</th>
                                                <th>Avg Session Time</th>
                                                <th>Last Active</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Student Users -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">USR001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=007bff&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Rahul Sharma</h6>
                                                            <small class="text-muted">rahul@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">10</span></td>
                                                <td><span class="badge bg-success">Student</span></td>
                                                <td>
                                                    <h6 class="mb-0">142</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">28</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 85%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">32m 15s</h6>
                                                    <small class="text-success">+12% above avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-28</div>
                                                    <small class="text-muted">14:30 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR001">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning send-reminder" title="Send Reminder" data-id="USR001">
                                                            <i class="fas fa-bell"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold text-primary">USR002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=28a745&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Priya Patel</h6>
                                                            <small class="text-muted">priya@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">11</span></td>
                                                <td><span class="badge bg-success">Student</span></td>
                                                <td>
                                                    <h6 class="mb-0">118</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">35</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-success" style="width: 92%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">28m 45s</h6>
                                                    <small class="text-success">+8% above avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-29</div>
                                                    <small class="text-muted">09:15 AM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR002">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR002">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning send-reminder" title="Send Reminder" data-id="USR002">
                                                            <i class="fas fa-bell"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><span class="fw-bold text-primary">USR015</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=ffc107&color=000" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Amit Kumar</h6>
                                                            <small class="text-muted">amit@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">12</span></td>
                                                <td><span class="badge bg-success">Student</span></td>
                                                <td>
                                                    <h6 class="mb-0">95</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">22</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-warning" style="width: 65%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">21m 30s</h6>
                                                    <small class="text-warning">-5% below avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-27</div>
                                                    <small class="text-muted">16:45 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR015">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR015">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning send-reminder" title="Send Reminder" data-id="USR015">
                                                            <i class="fas fa-bell"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Teacher Users -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">USR028</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=6c757d&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Neha Gupta</h6>
                                                            <small class="text-muted">neha@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-secondary">Teacher</span></td>
                                                <td><span class="badge bg-info">Teacher</span></td>
                                                <td>
                                                    <h6 class="mb-0">156</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">18</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-info" style="width: 75%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">45m 20s</h6>
                                                    <small class="text-success">+35% above avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-29</div>
                                                    <small class="text-muted">11:20 AM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR028">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR028">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning send-reminder" title="Send Reminder" data-id="USR028">
                                                            <i class="fas fa-bell"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Low Engagement User -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">USR042</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rajesh+Mehta&background=dc3545&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Rajesh Mehta</h6>
                                                            <small class="text-muted">rajesh@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-primary">10</span></td>
                                                <td><span class="badge bg-success">Student</span></td>
                                                <td>
                                                    <h6 class="mb-0">42</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">8</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-danger" style="width: 25%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">15m 10s</h6>
                                                    <small class="text-danger">-32% below avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-25</div>
                                                    <small class="text-muted">19:30 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR042">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR042">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger send-reminder" title="Send Reminder" data-id="USR042">
                                                            <i class="fas fa-bell"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Parent User -->
                                            <tr>
                                                <td><span class="fw-bold text-primary">USR056</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Sanjay+Verma&background=6f42c1&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Sanjay Verma</h6>
                                                            <small class="text-muted">sanjay@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-secondary">Parent</span></td>
                                                <td><span class="badge bg-warning text-dark">Parent</span></td>
                                                <td>
                                                    <h6 class="mb-0">68</h6>
                                                    <small class="text-muted">this month</small>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">12</h6>
                                                    <div class="progress mt-1" style="height: 4px;">
                                                        <div class="progress-bar bg-info" style="width: 60%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">18m 45s</h6>
                                                    <small class="text-warning">-10% below avg</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-28</div>
                                                    <small class="text-muted">20:15 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-profile" title="View Profile" data-id="USR056">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info engagement-details" title="Engagement Details" data-id="USR056">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning send-reminder" title="Send Reminder" data-id="USR056">
                                                            <i class="fas fa-bell"></i>
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

    <!-- Custom JS for Engagement Reports -->
    <script src="assets/js/pages/reports-engagement.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>