<?php
// Include configuration
include('config.php');

// Initialize variables
$success = '';
$error = '';
$name = '';
$email = '';
$phone = '';
$address = '';

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate inputs
    if(empty($name) || empty($email) || empty($password)) {
        $error = "Name, email, and password are required fields.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif(strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        try {
            // Check if email already exists
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $check_stmt->execute([$email]);
            
            if($check_stmt->fetch()) {
                $error = "Email address already exists. Please use a different email.";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new parent
                $insert_stmt = $conn->prepare("INSERT INTO users (name, email, password, role, phone, address, created_at, updated_at) VALUES (?, ?, ?, 'parent', ?, ?, NOW(), NOW())");
                $result = $insert_stmt->execute([$name, $email, $hashed_password, $phone, $address]);
                
                if($result) {
                    $new_parent_id = $conn->lastInsertId();
                    $success = "Parent account created successfully! Parent ID: #PAR" . str_pad($new_parent_id, 3, '0', STR_PAD_LEFT);
                    
                    // Clear form fields
                    $name = $email = $phone = $address = '';
                } else {
                    $error = "Failed to create parent account. Please try again.";
                }
            }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add New Parent | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for add parent -->
    <style>
        .page-header {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .form-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .form-card .card-header {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f39c12;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: #f39c12;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #f39c12;
            box-shadow: 0 0 0 0.2rem rgba(243, 156, 18, 0.25);
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-save {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            border: none;
            color: white;
        }
        
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
        }
        
        .info-box {
            background: #fff9e6;
            border-left: 4px solid #f39c12;
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
        
        .form-requirements {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
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
            color: #27ae60;
            margin-right: 10px;
        }
        
        .avatar-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            margin: 0 auto 20px;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
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
                            <h6 class="page-title">Parent Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage_parents.php">Manage Parents</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Parent</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="manage_parents.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Parents
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
                                <i class="fas fa-user-plus me-2"></i> Add New Parent
                            </h1>
                            <p class="text-white-50 mb-0">
                                Create a new parent account in the system. Parents can monitor their children's progress and receive updates.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="avatar-preview">
                                <i class="fas fa-user-friends"></i>
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

                <!-- Add Parent Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card form-card">
                            <div class="card-header">
                                <i class="fas fa-user-plus me-2"></i> Parent Account Information
                            </div>
                            <div class="card-body">
                                <form method="POST" id="addParentForm">
                                    <div class="row">
                                        <!-- Personal Information -->
                                        <div class="col-lg-6">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-user-circle"></i> Personal Information
                                                </h5>
                                                
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">
                                                        Full Name <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="name" name="name" 
                                                           value="<?php echo htmlspecialchars($name); ?>" 
                                                           placeholder="Enter parent's full name" required>
                                                    <div class="form-text">Enter the complete name of the parent</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">
                                                        Email Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                           value="<?php echo htmlspecialchars($email); ?>" 
                                                           placeholder="Enter parent's email address" required>
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
                                                    <i class="fas fa-info-circle me-2 text-warning"></i>
                                                    <strong>Password Requirements:</strong> Password must be at least 6 characters long and include letters and numbers for better security.
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
                                            
                                            <!-- Additional Information -->
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-info-circle"></i> Additional Information
                                                </h5>
                                                
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea class="form-control" id="address" name="address" 
                                                              rows="3" placeholder="Enter parent's address"><?php echo htmlspecialchars($address); ?></textarea>
                                                    <div class="form-text">Optional residential address</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Requirements -->
                                    <div class="form-requirements">
                                        <h6 class="mb-3">
                                            <i class="fas fa-clipboard-list me-2 text-warning"></i>
                                            Parent Account Features
                                        </h6>
                                        <ul class="requirement-list">
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                Parents can monitor their children's academic progress
                                            </li>
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                Receive notifications and updates about their children
                                            </li>
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                Access to children's assignments and grades
                                            </li>
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                Communication with teachers and administrators
                                            </li>
                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                Secure login with email and password
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <!-- Form Actions -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="manage_parents.php" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <button type="reset" class="btn btn-warning btn-action">
                                                        <i class="fas fa-redo me-2"></i> Reset Form
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-save btn-action">
                                                        <i class="fas fa-save me-2"></i> Create Parent Account
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
                                            <i class="fas fa-envelope text-warning me-3 mt-1"></i>
                                            <div>
                                                <h6 class="mb-1">Email Verification</h6>
                                                <p class="text-muted mb-0">Parents will receive a welcome email with login instructions.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="d-flex align-items-start">
                                            <i class="fas fa-user-check text-success me-3 mt-1"></i>
                                            <div>
                                                <h6 class="mb-1">Student Assignment</h6>
                                                <p class="text-muted mb-0">After creating the account, you can assign students to this parent.</p>
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

    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Form validation
            $('#addParentForm').on('submit', function(e) {
                const password = $('#password').val();
                const confirmPassword = $('#confirm_password').val();
                const name = $('#name').val().trim();
                const email = $('#email').val().trim();
                
                // Basic validation
                if (!name) {
                    e.preventDefault();
                    alert('Please enter the parent\'s full name.');
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
                
                // Confirm before submitting
                if (!confirm('Are you sure you want to create this parent account?')) {
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
                const strengthIndicator = $('#password-strength');
                
                if (password.length === 0) {
                    $(this).removeClass('is-valid is-invalid');
                } else if (password.length < 6) {
                    $(this).removeClass('is-valid').addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid').addClass('is-valid');
                }
            });
        });
        
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
        
        // Generate avatar preview based on name
        function updateAvatarPreview() {
            const name = document.getElementById('name').value;
            const avatarPreview = document.querySelector('.avatar-preview');
            
            if (name.trim() !== '') {
                const initials = name.split(' ').map(word => word.charAt(0)).join('').toUpperCase();
                if (initials.length > 2) {
                    avatarPreview.textContent = initials.substring(0, 2);
                } else {
                    avatarPreview.textContent = initials;
                }
            } else {
                avatarPreview.innerHTML = '<i class="fas fa-user-friends"></i>';
            }
        }
        
        // Update avatar when name changes
        document.getElementById('name').addEventListener('input', updateAvatarPreview);
    </script>

</body>

</html>