<?php
// Include configuration
include('config.php');

// Check if parent ID is provided
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_parents.php?error=Parent ID is required");
    exit();
}

$id = $_GET['id'];

// Fetch parent data from database
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'parent'");
    $stmt->execute([$id]);
    $parent = $stmt->fetch();
    
    if(!$parent) {
        header("Location: manage_parents.php?error=Parent not found");
        exit();
    }
} catch(PDOException $e) {
    header("Location: manage_parents.php?error=Database error: " . $e->getMessage());
    exit();
}

// Handle form submission
$success = '';
$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate inputs
    if(empty($name) || empty($email)) {
        $error = "Name and email are required fields.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif(!empty($password) && $password !== $confirm_password) {
        $error = "Passwords do not match.";
    } elseif(!empty($password) && strlen($password) < 6) {
        $error = "Password must be at least 6 characters long.";
    } else {
        try {
            // Check if email already exists for another user
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $check_stmt->execute([$email, $id]);
            
            if($check_stmt->fetch()) {
                $error = "Email address already exists for another user.";
            } else {
                // Prepare update query
                if(!empty($password)) {
                    // Update with new password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $update_stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ?, updated_at = NOW() WHERE id = ?");
                    $result = $update_stmt->execute([$name, $email, $hashed_password, $id]);
                } else {
                    // Update without changing password
                    $update_stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, updated_at = NOW() WHERE id = ?");
                    $result = $update_stmt->execute([$name, $email, $id]);
                }
                
                if($result) {
                    $success = "Parent updated successfully!";
                    // Refresh parent data
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'parent'");
                    $stmt->execute([$id]);
                    $parent = $stmt->fetch();
                } else {
                    $error = "Failed to update parent. Please try again.";
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
    <title>Edit Parent | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for edit parent -->
    <style>
        .profile-header {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            border: 4px solid rgba(255,255,255,0.3);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .edit-form-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .edit-form-card .card-header {
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
        
        .parent-info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        
        .info-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #f39c12;
        }
        
        .info-label {
            font-size: 12px;
            color: #6c757d;
            text-transform: uppercase;
            font-weight: 600;
        }
        
        .info-value {
            font-size: 14px;
            color: #495057;
            font-weight: 500;
            margin-top: 5px;
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
                                <li class="breadcrumb-item"><a href="view_parent.php?id=<?php echo $parent['id']; ?>"><?php echo htmlspecialchars($parent['name']); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Parent</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($parent['name']); ?>&background=ffffff&color=f39c12&size=100&bold=true&format=svg" 
                                     alt="Profile" class="profile-avatar rounded-circle me-4">
                                <div>
                                    <h2 class="text-white mb-1">Edit Parent Profile</h2>
                                    <p class="text-white-50 mb-2">
                                        <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($parent['name']); ?>
                                    </p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-light text-dark">
                                            <i class="fas fa-user-friends me-1"></i> Parent Account
                                        </span>
                                        <span class="badge bg-success">
                                            <i class="fas fa-circle me-1"></i> Active
                                        </span>
                                        <span class="badge bg-info">
                                            Parent ID: #PAR<?php echo str_pad($parent['id'], 3, '0', STR_PAD_LEFT); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-white-50">
                                <small>Last Updated: <?php echo date('M j, Y g:i A', strtotime($parent['updated_at'])); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                <?php if($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo $success; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Edit Form -->
                <div class="row">
                    <div class="col-12">
                        <div class="card edit-form-card">
                            <div class="card-header">
                                <i class="fas fa-edit me-2"></i> Edit Parent Information
                            </div>
                            <div class="card-body">
                                <form method="POST" id="editParentForm">
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
                                                           value="<?php echo htmlspecialchars($parent['name']); ?>" 
                                                           placeholder="Enter parent's full name" required>
                                                    <div class="form-text">Enter the complete name of the parent</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">
                                                        Email Address <span class="text-danger">*</span>
                                                    </label>
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                           value="<?php echo htmlspecialchars($parent['email']); ?>" 
                                                           placeholder="Enter parent's email address" required>
                                                    <div class="form-text">This will be used for login and communication</div>
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
                                                    <strong>Password Update:</strong> Leave password fields blank if you don't want to change the current password.
                                                </div>
                                                
                                                <div class="mb-3 password-input-group">
                                                    <label for="password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" 
                                                           placeholder="Enter new password" 
                                                           minlength="6">
                                                    <span class="password-toggle" onclick="togglePassword('password')">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <div class="form-text">Minimum 6 characters. Leave blank to keep current password</div>
                                                </div>
                                                
                                                <div class="mb-3 password-input-group">
                                                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                                           placeholder="Confirm new password">
                                                    <span class="password-toggle" onclick="togglePassword('confirm_password')">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <div class="form-text">Re-enter the new password for confirmation</div>
                                                </div>
                                            </div>
                                            
                                            <!-- Parent Information -->
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-info-circle"></i> Parent Information
                                                </h5>
                                                
                                                <div class="parent-info-box">
                                                    <div class="info-grid">
                                                        <div class="info-item">
                                                            <div class="info-label">Parent ID</div>
                                                            <div class="info-value">#PAR<?php echo str_pad($parent['id'], 3, '0', STR_PAD_LEFT); ?></div>
                                                        </div>
                                                        <div class="info-item">
                                                            <div class="info-label">Account Status</div>
                                                            <div class="info-value">
                                                                <span class="badge bg-success">Active</span>
                                                            </div>
                                                        </div>
                                                        <div class="info-item">
                                                            <div class="info-label">Registration Date</div>
                                                            <div class="info-value"><?php echo date('M j, Y', strtotime($parent['created_at'])); ?></div>
                                                        </div>
                                                        <div class="info-item">
                                                            <div class="info-label">Last Updated</div>
                                                            <div class="info-value"><?php echo date('M j, Y', strtotime($parent['updated_at'])); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Actions -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <a href="manage_parents.php" class="btn btn-outline-primary btn-action">
                                                        <i class="fas fa-list me-2"></i> Back to List
                                                    </a>
                                                </div>
                                                <div>
                                                    <button type="reset" class="btn btn-warning btn-action">
                                                        <i class="fas fa-redo me-2"></i> Reset
                                                    </button>
                                                    <button type="submit" class="btn btn-save btn-action">
                                                        <i class="fas fa-save me-2"></i> Save Changes
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

                <!-- Quick Actions Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card edit-form-card">
                            <div class="card-header">
                                <i class="fas fa-bolt me-2"></i> Quick Actions
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-3 mb-3">
                                        <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-primary btn-lg w-100 py-3">
                                            <i class="fas fa-eye fa-2x mb-2"></i><br>
                                            View Profile
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="assign_student.php?parent_id=<?php echo $parent['id']; ?>" class="btn btn-outline-info btn-lg w-100 py-3">
                                            <i class="fas fa-link fa-2x mb-2"></i><br>
                                            Assign Student
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="suspend_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-warning btn-lg w-100 py-3" onclick="return confirm('Are you sure you want to suspend this parent?')">
                                            <i class="fas fa-user-slash fa-2x mb-2"></i><br>
                                            Suspend
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="delete_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-danger btn-lg w-100 py-3" onclick="return confirm('Are you sure you want to delete this parent? This action cannot be undone.')">
                                            <i class="fas fa-trash fa-2x mb-2"></i><br>
                                            Delete
                                        </a>
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
            $('#editParentForm').on('submit', function(e) {
                const password = $('#password').val();
                const confirmPassword = $('#confirm_password').val();
                
                if (password !== confirmPassword) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                    $('#confirm_password').focus();
                    return false;
                }
                
                if (password && password.length < 6) {
                    e.preventDefault();
                    alert('Password must be at least 6 characters long!');
                    $('#password').focus();
                    return false;
                }
                
                return true;
            });
            
            // Reset form confirmation
            $('button[type="reset"]').on('click', function() {
                return confirm('Are you sure you want to reset all changes?');
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
        
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');
            
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
    </script>

</body>

</html>