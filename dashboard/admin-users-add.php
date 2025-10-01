<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add New User | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    <link href="assets/css/admin-users-add.css" id="app-style" rel="stylesheet" type="text/css">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    
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
                            <h6 class="page-title">Add New User</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="../index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New User</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="users.php" class="btn btn-primary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Users
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add User Form -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-user-plus me-2"></i>Create New User</h5>
                            </div>
                            <div class="card-body">
                                <form id="addUserForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter full name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="role" class="form-label">Role <span class="text-danger">*</span></label>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="">Select Role</option>
                                                    <option value="student">Student</option>
                                                    <option value="parent">Parent</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                                    <button type="button" class="btn btn-outline-secondary" id="generatePassword">
                                                        <i class="fas fa-sync-alt me-1"></i> Generate
                                                    </button>
                                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="form-text">Password must be at least 8 characters long</div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Student Specific Fields -->
                                    <div class="role-specific-fields" id="studentFields" style="display: none;">
                                        <h6 class="mb-3"><i class="fas fa-user-graduate me-2"></i>Student Information</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="grade" class="form-label">Grade</label>
                                                    <select class="form-select" id="grade" name="grade">
                                                        <option value="">Select Grade</option>
                                                        <option value="1">Grade 1</option>
                                                        <option value="2">Grade 2</option>
                                                        <option value="3">Grade 3</option>
                                                        <option value="4">Grade 4</option>
                                                        <option value="5">Grade 5</option>
                                                        <option value="6">Grade 6</option>
                                                        <option value="7">Grade 7</option>
                                                        <option value="8">Grade 8</option>
                                                        <option value="9">Grade 9</option>
                                                        <option value="10">Grade 10</option>
                                                        <option value="11">Grade 11</option>
                                                        <option value="12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="section" class="form-label">Section</label>
                                                    <input type="text" class="form-control" id="section" name="section" placeholder="Enter section">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Parent Specific Fields -->
                                    <div class="role-specific-fields" id="parentFields" style="display: none;">
                                        <h6 class="mb-3"><i class="fas fa-users me-2"></i>Link to Students</h6>
                                        <div class="mb-3">
                                            <label class="form-label">Select Student(s)</label>
                                            <select class="form-select" id="studentSelect" multiple size="4">
                                                <option value="1">Rahul Sharma (Grade 10-A)</option>
                                                <option value="2">Priya Patel (Grade 9-B)</option>
                                                <option value="3">Amit Kumar (Grade 11-C)</option>
                                                <option value="4">Neha Gupta (Grade 8-A)</option>
                                                <option value="5">Sneha Singh (Grade 12-B)</option>
                                            </select>
                                            <div class="form-text">Hold Ctrl/Cmd to select multiple students</div>
                                        </div>
                                    </div>

                                    <!-- Admin Specific Fields -->
                                    <div class="role-specific-fields" id="adminFields" style="display: none;">
                                        <h6 class="mb-3"><i class="fas fa-shield-alt me-2"></i>Admin Role Configuration</h6>
                                        <div class="mb-3">
                                            <label for="adminRole" class="form-label">Admin Role Type</label>
                                            <select class="form-select" id="adminRole" name="adminRole">
                                                <option value="">Select Admin Role</option>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="moderator">Moderator</option>
                                                <option value="content_manager">Content Manager</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="sendWelcomeEmail" name="sendWelcomeEmail" checked>
                                            <label class="form-check-label" for="sendWelcomeEmail">
                                                <i class="fas fa-envelope me-1"></i> Send welcome email to the user
                                            </label>
                                        </div>
                                        
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-user-plus me-1"></i> Create User
                                            </button>
                                            <button type="reset" class="btn btn-outline-secondary">
                                                <i class="fas fa-redo me-1"></i> Reset Form
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Quick Stats -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>User Statistics</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded" style="background-color: #f8f9fa;">
                                    <span class="fw-medium">Total Users</span>
                                    <span class="fw-bold text-primary">1,500</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded" style="background-color: #f8f9fa;">
                                    <span class="fw-medium">Students</span>
                                    <span class="fw-bold text-success">1,200</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded" style="background-color: #f8f9fa;">
                                    <span class="fw-medium">Parents</span>
                                    <span class="fw-bold text-info">250</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center p-2 rounded" style="background-color: #f8f9fa;">
                                    <span class="fw-medium">Admins</span>
                                    <span class="fw-bold text-warning">50</span>
                                </div>
                            </div>
                        </div>

                        <!-- Help Card -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Quick Tips</h5>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info border-0">
                                    <small>
                                        <i class="fas fa-lightbulb me-2"></i>
                                        <strong>Pro Tip:</strong> Always verify email addresses and use strong passwords for new users.
                                    </small>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Use strong passwords
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Verify email addresses
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Assign appropriate roles
                                    </li>
                                    <li>
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        Send welcome emails for new users
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Recent Activity</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-primary rounded-circle">
                                                <i class="fas fa-user-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">New Student Added</h6>
                                        <p class="text-muted mb-0">2 hours ago</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-success rounded-circle">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">Parent Account Created</h6>
                                        <p class="text-muted mb-0">5 hours ago</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-warning rounded-circle">
                                                <i class="fas fa-shield-alt"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">New Moderator Added</h6>
                                        <p class="text-muted mb-0">1 day ago</p>
                                    </div>
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

    <script>
        // Add New User JavaScript
         <script src="assets/js/pages/admin-users-add.js"></script>



    </script>

    <script src="assets/js/app.js"></script>

</body>

</html>