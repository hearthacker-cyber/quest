<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Assign Test to Users | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Assign Test Page -->
    <link href="assets/css/admin-tests-assign.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Assign Test to Users</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-test.php">Tests</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Assign Test</li>
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

                <!-- Assign Test Form Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-share-square me-2"></i>Assign Test to Users
                                </h5>
                            </div>
                            <div class="card-body">
                                <form id="assignTestForm">
                                    <div class="row">
                                        <!-- Select Test -->
                                        <div class="col-md-6 mb-3">
                                            <label for="testSelect" class="form-label">Select Test <span class="text-danger">*</span></label>
                                            <select class="form-select" id="testSelect" required>
                                                <option value="">Choose a test...</option>
                                                <option value="math_advanced">Mathematics Advanced</option>
                                                <option value="physics_basic">Physics Basic Concepts</option>
                                                <option value="chemistry_organic">Organic Chemistry</option>
                                                <option value="english_grammar">English Grammar Test</option>
                                                <option value="history_world">World History Assessment</option>
                                            </select>
                                        </div>

                                        <!-- Test Duration Display -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Default Duration</label>
                                            <div class="form-control bg-light" id="defaultDurationDisplay">
                                                Select a test to see duration
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Select Users Section -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <label class="form-label">Select Users <span class="text-danger">*</span></label>
                                            
                                            <!-- User Selection Tabs -->
                                            <ul class="nav nav-tabs mb-3" id="userSelectionTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="individual-tab" data-bs-toggle="tab" data-bs-target="#individual" type="button" role="tab">
                                                        <i class="fas fa-user me-1"></i> Individual Students
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="class-tab" data-bs-toggle="tab" data-bs-target="#class" type="button" role="tab">
                                                        <i class="fas fa-users me-1"></i> Class/Grade
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="group-tab" data-bs-toggle="tab" data-bs-target="#group" type="button" role="tab">
                                                        <i class="fas fa-layer-group me-1"></i> Parent Group
                                                    </button>
                                                </li>
                                            </ul>

                                            <!-- Tab Content -->
                                            <div class="tab-content" id="userSelectionContent">
                                                <!-- Individual Students Tab -->
                                                <div class="tab-pane fade show active" id="individual" role="tabpanel">
                                                    <select class="form-select" id="individualStudents" multiple size="6">
                                                        <option value="student1">Rahul Sharma</option>
                                                        <option value="student2">Priya Patel</option>
                                                        <option value="student3">Amit Kumar</option>
                                                        <option value="student4">Neha Gupta</option>
                                                        <option value="student5">Sandeep Verma</option>
                                                        <option value="student6">Anjali Singh</option>
                                                        <option value="student7">Rajesh Mehta</option>
                                                        <option value="student8">Pooja Desai</option>
                                                    </select>
                                                    <div class="form-text">Hold Ctrl/Cmd to select multiple students</div>
                                                </div>

                                                <!-- Class/Grade Tab -->
                                                <div class="tab-pane fade" id="class" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="classSelect" class="form-label">Select Class</label>
                                                            <select class="form-select" id="classSelect">
                                                                <option value="">Choose class...</option>
                                                                <option value="class10">Class 10</option>
                                                                <option value="class11">Class 11 Science</option>
                                                                <option value="class12">Class 12 Commerce</option>
                                                                <option value="class12sci">Class 12 Science</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="sectionSelect" class="form-label">Select Section</label>
                                                            <select class="form-select" id="sectionSelect">
                                                                <option value="">Choose section...</option>
                                                                <option value="sectionA">Section A</option>
                                                                <option value="sectionB">Section B</option>
                                                                <option value="sectionC">Section C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="alert alert-info">
                                                        <i class="fas fa-info-circle me-2"></i>
                                                        This will assign the test to all students in the selected class and section.
                                                    </div>
                                                </div>

                                                <!-- Parent Group Tab -->
                                                <div class="tab-pane fade" id="group" role="tabpanel">
                                                    <select class="form-select" id="parentGroup">
                                                        <option value="">Select parent group...</option>
                                                        <option value="group1">Group A - Mr. Sharma's Students</option>
                                                        <option value="group2">Group B - Advanced Learners</option>
                                                        <option value="group3">Group C - Scholarship Batch</option>
                                                        <option value="group4">Group D - Weekend Batch</option>
                                                    </select>
                                                    <div class="alert alert-info mt-3">
                                                        <i class="fas fa-info-circle me-2"></i>
                                                        Parent groups allow you to assign tests to predefined student groups.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Schedule Section -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="border-bottom pb-2">
                                                <i class="fas fa-calendar-alt me-2"></i>Schedule Settings
                                            </h6>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="startDateTime" class="form-label">Start Date & Time <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="startDateTime" required>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="endDateTime" class="form-label">End Date & Time <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="endDateTime" required>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="durationOverride" class="form-label">Duration Override (minutes)</label>
                                            <input type="number" class="form-control" id="durationOverride" placeholder="Leave empty to use default duration">
                                            <div class="form-text">Override the default test duration in minutes</div>
                                        </div>
                                    </div>

                                    <!-- Notifications Section -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="border-bottom pb-2">
                                                <i class="fas fa-bell me-2"></i>Notification Settings
                                            </h6>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="emailNotification">
                                                <label class="form-check-label" for="emailNotification">
                                                    Send Email Notification
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="smsNotification">
                                                <label class="form-check-label" for="smsNotification">
                                                    Send SMS Notification
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pushNotification">
                                                <label class="form-check-label" for="pushNotification">
                                                    Send Push Notification
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="fas fa-share-square me-2"></i>Assign Test
                                            </button>
                                            <button type="reset" class="btn btn-outline-secondary btn-lg ms-2">
                                                <i class="fas fa-redo me-2"></i>Reset Form
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assigned Tests Table Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-list-alt me-2"></i>Recently Assigned Tests
                                </h5>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-sync-alt me-1"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="assignedTestsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Test Name</th>
                                                <th>Assigned To</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Duration</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Mathematics Advanced</td>
                                                <td>Class 10 - Section A</td>
                                                <td>2024-01-15 09:00</td>
                                                <td>2024-01-15 11:00</td>
                                                <td>120 min</td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning" title="Reschedule">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info" title="View Report">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Physics Basic Concepts</td>
                                                <td>25 Individual Students</td>
                                                <td>2024-01-16 10:00</td>
                                                <td>2024-01-18 10:00</td>
                                                <td>90 min</td>
                                                <td><span class="badge bg-primary">Scheduled</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning" title="Reschedule">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info" title="View Report">
                                                            <i class="fas fa-chart-bar"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>English Grammar Test</td>
                                                <td>Group B - Advanced Learners</td>
                                                <td>2024-01-14 14:00</td>
                                                <td>2024-01-14 15:30</td>
                                                <td>90 min</td>
                                                <td><span class="badge bg-secondary">Completed</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning" title="Reschedule">
                                                            <i class="fas fa-calendar-alt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info" title="View Report">
                                                            <i class="fas fa-chart-bar"></i>
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

    <!-- Custom JS for Assign Test Page -->
    <script src="assets/js/pages/admin-tests-assign.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>