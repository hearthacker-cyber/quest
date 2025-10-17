<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add New User | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for add user -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --info-color: #3498db;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --border-radius: 15px;
            --box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }
        
        .page-header {
            background: var(--primary-gradient);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
        }
        
        .form-card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .form-card .card-header {
            background: var(--primary-gradient);
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 20px;
            font-weight: 600;
            margin: 5px;
            transition: var(--transition);
            width: 100%;
            max-width: 200px;
        }
        
        .btn-save {
            background: var(--primary-gradient);
            border: none;
            color: white;
        }
        
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .info-box {
            background: #fff9e6;
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            z-index: 10;
        }
        
        .password-input-group {
            position: relative;
        }
        
        .role-selection {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .role-option {
            flex: 1;
            min-width: 200px;
        }
        
        .role-option input[type="radio"] {
            display: none;
        }
        
        .role-option label {
            display: block;
            padding: 20px 15px;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
            background: white;
            height: 100%;
        }
        
        .role-option input[type="radio"]:checked + label {
            border-color: var(--primary-color);
            background: #f0f4ff;
            color: var(--primary-color);
            font-weight: 600;
        }
        
        .role-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: block;
        }
        
        .student-role {
            color: #4361ee;
        }
        
        .parent-role {
            color: var(--warning-color);
        }
        
        .dynamic-fields {
            background: var(--light-color);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            transition: var(--transition);
        }
        
        .avatar-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            margin: 0 auto 20px;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .requirement-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .requirement-list li {
            padding: 5px 0;
            color: #6c757d;
        }
        
        .requirement-list li i {
            color: var(--success-color);
            margin-right: 10px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-header {
                padding: 20px 0;
                margin-bottom: 20px;
                border-radius: 0 0 15px 15px;
            }
            
            .page-header h1 {
                font-size: 1.5rem;
            }
            
            .form-card .card-header {
                padding: 15px;
                font-size: 1.1rem;
            }
            
            .role-selection {
                flex-direction: column;
            }
            
            .role-option {
                min-width: 100%;
            }
            
            .role-option label {
                padding: 15px 10px;
            }
            
            .role-icon {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 1.1rem;
            }
            
            .btn-action {
                width: 100%;
                max-width: none;
                margin: 5px 0;
            }
            
            .form-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .form-actions > div {
                width: 100%;
                display: flex;
                flex-direction: column;
            }
            
            .avatar-preview {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }
            
            .dynamic-fields {
                padding: 15px;
            }
            
            .info-box {
                padding: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .page-header {
                padding: 15px 0;
            }
            
            .page-header h1 {
                font-size: 1.3rem;
            }
            
            .form-card .card-header {
                padding: 12px;
                font-size: 1rem;
            }
            
            .role-icon {
                font-size: 1.8rem;
            }
            
            .section-title {
                font-size: 1rem;
            }
            
            .form-control {
                padding: 10px 12px;
            }
            
            .btn-action {
                padding: 10px 15px;
            }
        }
        
        /* Print styles */
        @media print {
            .btn-action, .password-toggle, .page-header {
                display: none !important;
            }
            
            .form-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
        
        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .form-control {
                border-width: 3px;
            }
            
            .section-title {
                border-bottom-width: 3px;
            }
        }
        
        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
            }
        }
    </style>
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
                            <h6 class="page-title">User Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="users.php">All Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New User</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="users.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Users
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-white mb-2">
                                <i class="fas fa-user-plus me-2"></i> Add New User
                            </h1>
                            <p class="text-white-50 mb-0">
                                Create new student or parent accounts in the system. Choose the appropriate role and fill in the required information.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="avatar-preview">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                <?php if($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Success!</h5>
                                <p class="mb-0"><?php echo $success; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Error!</h5>
                                <p class="mb-0"><?php echo $error; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Add User Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card form-card">
                            <div class="card-header">
                                <i class="fas fa-user-plus me-2"></i> Create New User Account
                            </div>
                            <div class="card-body">
                                <form method="POST" id="addUserForm">
                                    <div class="row">
                                        <!-- Role Selection -->
                                        <div class="col-12">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-user-tag"></i> Select User Role
                                                </h5>
                                                
                                                <div class="role-selection">
                                                    <div class="role-option">
                                                        <input type="radio" id="role_student" name="role" value="student" <?php echo $role == 'student' ? 'checked' : ''; ?> required>
                                                        <label for="role_student">
                                                            <i class="fas fa-user-graduate role-icon student-role"></i>
                                                            <strong>Student</strong>
                                                            <p class="text-muted mb-0 mt-2">For learners who will access educational content</p>
                                                        </label>
                                                    </div>
                                                    <div class="role-option">
                                                        <input type="radio" id="role_parent" name="role" value="parent" <?php echo $role == 'parent' ? 'checked' : ''; ?>>
                                                        <label for="role_parent">
                                                            <i class="fas fa-user-friends role-icon parent-role"></i>
                                                            <strong>Parent</strong>
                                                            <p class="text-muted mb-0 mt-2">For guardians who monitor student progress</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Basic Information -->
                                        <div class="col-lg-6">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-user-circle"></i> Basic Information
                                                </h5>
                                                
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        Full Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="name" name="name" 
                                                           value="<?php echo htmlspecialchars($name); ?>" 
                                                           placeholder="Enter user's full name" required>
                                                    <div class="form-text">Enter the complete name of the user</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">
                                                        Email Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                           value="<?php echo htmlspecialchars($email); ?>" 
                                                           placeholder="Enter user's email address" required>
                                                    <div class="form-text">This will be used for login and communication</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                                           value="<?php echo htmlspecialchars($phone); ?>" 
                                                           placeholder="Enter phone number">
                                                    <div class="form-text">Optional contact number</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Account Security -->
                                        <div class="col-lg-6">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-shield-alt"></i> Account Security
                                                </h5>
                                                
                                                <div class="info-box">
                                                    <i class="fas fa-info-circle me-2 text-primary"></i>
                                                    <strong>Password Requirements:</strong> Password must be at least 6 characters long for security.
                                                </div>
                                                
                                                <div class="mb-3 password-input-group">
                                                    <label for="password" class="form-label">
                                                        Password <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password" class="form-control" id="password" name="password" 
                                                           placeholder="Enter secure password" 
                                                           minlength="6" required>
                                                    <span class="password-toggle" onclick="togglePassword('password')">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <div class="form-text">Minimum 6 characters</div>
                                                </div>
                                                
                                                <div class="mb-3 password-input-group">
                                                    <label for="confirm_password" class="form-label">
                                                        Confirm Password <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                                           placeholder="Confirm password" required>
                                                    <span class="password-toggle" onclick="togglePassword('confirm_password')">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <div class="form-text">Re-enter the password for confirmation</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Dynamic Fields Based on Role -->
                                        <div class="col-12">
                                            <div class="dynamic-fields" id="dynamicFields">
                                                <?php if($role == 'student'): ?>
                                                    <!-- Student Specific Fields -->
                                                    <h5 class="section-title">
                                                        <i class="fas fa-graduation-cap"></i> Student Information
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="grade" class="form-label">
                                                                    Grade Level <span class="text-danger">*</span>
                                                                </label>
                                                                <select class="form-control" id="grade" name="grade" required>
                                                                    <option value="">Select Grade</option>
                                                                    <?php for($i = 1; $i <= 12; $i++): ?>
                                                                        <option value="<?php echo $i; ?>" <?php echo $grade == $i ? 'selected' : ''; ?>>
                                                                            Grade <?php echo $i; ?>
                                                                        </option>
                                                                    <?php endfor; ?>
                                                                </select>
                                                                <div class="form-text">Select the current grade level of the student</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php else: ?>
                                                    <!-- Parent Specific Fields -->
                                                    <h5 class="section-title">
                                                        <i class="fas fa-user-friends"></i> Parent Information
                                                    </h5>
                                                    <div class="info-box">
                                                        <i class="fas fa-info-circle me-2 text-warning"></i>
                                                        <strong>Note:</strong> After creating the parent account, you can assign students to this parent from the parent management page.
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Account Features -->
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-star"></i> Account Features
                                        </h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="requirement-list">
                                                    <?php if($role == 'student'): ?>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Access to educational content and courses
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Assignment submission and tracking
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Progress monitoring and reports
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Communication with teachers
                                                        </li>
                                                    <?php else: ?>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Monitor children's academic progress
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Receive notifications and updates
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Access to children's assignments and grades
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-check-circle"></i>
                                                            Communication with teachers and administrators
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="requirement-list">
                                                    <li>
                                                        <i class="fas fa-check-circle"></i>
                                                        Secure login with email and password
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-check-circle"></i>
                                                        Profile customization options
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-check-circle"></i>
                                                        Mobile-friendly interface
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-check-circle"></i>
                                                        24/7 system access
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Actions -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center form-actions">
                                                <div>
                                                    <a href="users.php" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <button type="reset" class="btn btn-warning btn-action">
                                                        <i class="fas fa-redo me-2"></i> Reset Form
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-save btn-action">
                                                        <i class="fas fa-save me-2"></i> Create User Account
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Tips -->
                <div class="row">
                    <div class="col-12">
                        <div class="card form-card">
                            <div class="card-header">
                                <i class="fas fa-lightbulb me-2"></i> Quick Tips
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                                            <div>
                                                <h6 class="mb-1">Email Verification</h6>
                                                <p class="text-muted mb-0">Users will receive a welcome email with login instructions.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-user-check text-success me-3 mt-1"></i>
                                            <div>
                                                <h6 class="mb-1">Role Assignment</h6>
                                                <p class="text-muted mb-0">Choose the appropriate role based on the user's needs.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-shield-alt text-info me-3 mt-1"></i>
                                            <div>
                                                <h6 class="mb-1">Security</h6>
                                                <p class="text-muted mb-0">All passwords are securely encrypted and stored.</p>
                                            </div>
                                        </div>
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
    <!-- end main-content-->

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

    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Role change handler
            $('input[name="role"]').on('change', function() {
                updateDynamicFields();
                updateAvatarPreview();
            });
            
            // Form validation
            $('#addUserForm').on('submit', function(e) {
                const password = $('#password').val();
                const confirmPassword = $('#confirm_password').val();
                const name = $('#name').val().trim();
                const email = $('#email').val().trim();
                const role = $('input[name="role"]:checked').val();
                
                // Basic validation
                if (!name) {
                    e.preventDefault();
                    alert('Please enter the user\'s full name.');
                    $('#name').focus();
                    return false;
                }
                
                if (!email) {
                    e.preventDefault();
                    alert('Please enter a valid email address.');
                    $('#email').focus();
                    return false;
                }
                
                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                    $('#confirm_password').focus();
                    return false;
                }
                
                if (password.length < 6) {
                    e.preventDefault();
                    alert('Password must be at least 6 characters long!');
                    $('#password').focus();
                    return false;
                }
                
                // Role-specific validation
                if (role === 'student') {
                    const grade = $('#grade').val();
                    if (!grade) {
                        e.preventDefault();
                        alert('Please select a grade level for the student.');
                        $('#grade').focus();
                        return false;
                    }
                }
                
                // Confirm before submitting
                const roleText = role === 'student' ? 'student' : 'parent';
                if (!confirm(`Are you sure you want to create this ${roleText} account?`)) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });
            
            // Reset form confirmation
            $('button[type="reset"]').on('click', function() {
                return confirm('Are you sure you want to reset all fields? All entered data will be lost.');
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Real-time password strength check
            $('#password').on('keyup', function() {
                const password = $(this).val();
                
                if (password.length === 0) {
                    $(this).removeClass('is-valid is-invalid');
                } else if (password.length < 6) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
            
            // Handle responsive form actions
            function handleFormActions() {
                const width = $(window).width();
                const formActions = $('.form-actions');
                
                if (width < 768) {
                    formActions.addClass('mobile-actions');
                } else {
                    formActions.removeClass('mobile-actions');
                }
            }
            
            // Initial call
            handleFormActions();
            
            // Call on resize
            $(window).on('resize', handleFormActions);
        });
        
        // Update dynamic fields based on role
        function updateDynamicFields() {
            const role = $('input[name="role"]:checked').val();
            const dynamicFields = $('#dynamicFields');
            
            if (role === 'student') {
                dynamicFields.html(`
                    <h5 class="section-title">
                        <i class="fas fa-graduation-cap"></i> Student Information
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="grade" class="form-label">
                                    Grade Level <span class="text-danger">*</span>
                                </label>
                                <select class="form-control" id="grade" name="grade" required>
                                    <option value="">Select Grade</option>
                                    ${Array.from({length: 12}, (_, i) => 
                                        `<option value="${i+1}">Grade ${i+1}</option>`
                                    ).join('')}
                                </select>
                                <div class="form-text">Select the current grade level of the student</div>
                            </div>
                        </div>
                    </div>
                `);
            } else {
                dynamicFields.html(`
                    <h5 class="section-title">
                        <i class="fas fa-user-friends"></i> Parent Information
                    </h5>
                    <div class="info-box">
                        <i class="fas fa-info-circle me-2 text-warning"></i>
                        <strong>Note:</strong> After creating the parent account, you can assign students to this parent from the parent management page.
                    </div>
                `);
            }
        }
        
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.parentElement.querySelector('.password-toggle i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
        
        // Generate avatar preview based on name and role
        function updateAvatarPreview() {
            const name = document.getElementById('name').value;
            const role = $('input[name="role"]:checked').val();
            const avatarPreview = document.querySelector('.avatar-preview i');
            
            if (role === 'student') {
                avatarPreview.className = 'fas fa-user-graduate';
            } else {
                avatarPreview.className = 'fas fa-user-friends';
            }
            
            if (name.trim() !== '') {
                // You could update the avatar with initials here
                // For now, we just change the icon based on role
            }
        }
        
        // Update avatar when name changes
        document.getElementById('name').addEventListener('input', updateAvatarPreview);
    </script>

</body>

</html>