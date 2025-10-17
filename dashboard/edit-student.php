<?php
// Include configuration
include('config.php');

// Check if student ID is provided
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: students.php?error=Student ID is required");
    exit();
}

$id = $_GET['id'];

// Fetch student data from database
try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'student'");
    $stmt->execute([$id]);
    $student = $stmt->fetch();
    
    if(!$student) {
        header("Location: students.php?error=Student not found");
        exit();
    }
} catch(PDOException $e) {
    header("Location: students.php?error=Database error: " . $e->getMessage());
    exit();
}

// Handle form submission
$success = '';
$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $grade = $_POST['grade'];
    $password = $_POST['password'];
    
    // Validate inputs
    if(empty($name) || empty($email) || empty($grade)) {
        $error = "All fields are required except password";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address";
    } else {
        try {
            // Check if email already exists for another user
            $check_stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
            $check_stmt->execute([$email, $id]);
            
            if($check_stmt->fetch()) {
                $error = "Email address already exists for another user";
            } else {
                // Prepare update query
                if(!empty($password)) {
                    // Update with new password
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $update_stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, grade = ?, password = ?, updated_at = NOW() WHERE id = ?");
                    $result = $update_stmt->execute([$name, $email, $grade, $hashed_password, $id]);
                } else {
                    // Update without changing password
                    $update_stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, grade = ?, updated_at = NOW() WHERE id = ?");
                    $result = $update_stmt->execute([$name, $email, $grade, $id]);
                }
                
                if($result) {
                    $success = "Student updated successfully!";
                    // Refresh student data
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'student'");
                    $stmt->execute([$id]);
                    $student = $stmt->fetch();
                } else {
                    $error = "Failed to update student. Please try again.";
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
    <title>Edit Student | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for edit student -->
    <style>
        .profile-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            border-bottom: 2px solid #667eea;
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
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-save {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
        }
        
        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
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
        }
        
        .password-input-group {
            position: relative;
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
                            <h6 class="page-title">Student Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="students.php">All Students</a></li>
                                <li class="breadcrumb-item"><a href="view_student.php?id=<?php echo $student['id']; ?>"><?php echo htmlspecialchars($student['name']); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="view_student.php?id=<?php echo $student['id']; ?>" class="btn btn-secondary btn-rounded">
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
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($student['name']); ?>&background=ffffff&color=667eea&size=100&bold=true&format=svg" 
                                     alt="Profile" class="profile-avatar rounded-circle me-4">
                                <div>
                                    <h2 class="text-white mb-1">Edit Student Profile</h2>
                                    <p class="text-white-50 mb-2">
                                        <i class="fas fa-user me-2"></i><?php echo htmlspecialchars($student['name']); ?>
                                    </p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-light text-dark">Grade <?php echo $student['grade']; ?></span>
                                        <span class="badge bg-success">
                                            <i class="fas fa-circle me-1"></i> Active
                                        </span>
                                        <span class="badge bg-info">
                                            Student ID: #STU<?php echo str_pad($student['id'], 3, '0', STR_PAD_LEFT); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-white-50">
                                <small>Last Updated: <?php echo date('M j, Y g:i A', strtotime($student['updated_at'])); ?></small>
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
                                <i class="fas fa-edit me-2"></i> Edit Student Information
                            </div>
                            <div class="card-body">
                                <form method="POST" id="editStudentForm">
                                    <div class="row">
                                        <!-- Personal Information -->
                                        <div class="col-lg-6">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-user-circle me-2"></i> Personal Information
                                                </h5>
                                                
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="name" name="name" 
                                                           value="<?php echo htmlspecialchars($student['name']); ?>" 
                                                           placeholder="Enter student's full name" required>
                                                    <div class="form-text">Enter the complete name of the student</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" 
                                                           value="<?php echo htmlspecialchars($student['email']); ?>" 
                                                           placeholder="Enter student's email address" required>
                                                    <div class="form-text">This will be used for login and communication</div>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="grade" class="form-label">Grade Level <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="grade" name="grade" required>
                                                        <option value="">Select Grade</option>
                                                        <?php for($i = 1; $i <= 12; $i++): ?>
                                                            <option value="<?php echo $i; ?>" 
                                                                <?php echo $student['grade'] == $i ? 'selected' : ''; ?>>
                                                                Grade <?php echo $i; ?>
                                                            </option>
                                                        <?php endfor; ?>
                                                    </select>
                                                    <div class="form-text">Select the current grade level of the student</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Account Security -->
                                        <div class="col-lg-6">
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-shield-alt me-2"></i> Account Security
                                                </h5>
                                                
                                                <div class="info-box">
                                                    <i class="fas fa-info-circle me-2 text-primary"></i>
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
                                            
                                            <!-- Student Information -->
                                            <div class="form-section">
                                                <h5 class="section-title">
                                                    <i class="fas fa-info-circle me-2"></i> Student Information
                                                </h5>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Student ID</label>
                                                        <input type="text" class="form-control bg-light" value="#STU<?php echo str_pad($student['id'], 3, '0', STR_PAD_LEFT); ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Account Status</label>
                                                        <input type="text" class="form-control bg-light" value="Active" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="text" class="form-control bg-light" value="<?php echo date('M j, Y', strtotime($student['created_at'])); ?>" readonly>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Last Updated</label>
                                                        <input type="text" class="form-control bg-light" value="<?php echo date('M j, Y', strtotime($student['updated_at'])); ?>" readonly>
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
                                                    <a href="view_student.php?id=<?php echo $student['id']; ?>" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <a href="students.php" class="btn btn-outline-primary btn-action">
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
                                        <a href="view_student.php?id=<?php echo $student['id']; ?>" class="btn btn-outline-primary btn-lg w-100 py-3">
                                            <i class="fas fa-eye fa-2x mb-2"></i><br>
                                            View Profile
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="suspend_student.php?id=<?php echo $student['id']; ?>" class="btn btn-outline-warning btn-lg w-100 py-3" onclick="return confirm('Are you sure you want to suspend this student?')">
                                            <i class="fas fa-user-slash fa-2x mb-2"></i><br>
                                            Suspend
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="delete_student.php?id=<?php echo $student['id']; ?>" class="btn btn-outline-danger btn-lg w-100 py-3" onclick="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                                            <i class="fas fa-trash fa-2x mb-2"></i><br>
                                            Delete
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <a href="students.php" class="btn btn-outline-info btn-lg w-100 py-3">
                                            <i class="fas fa-users fa-2x mb-2"></i><br>
                                            All Students
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
            $('#editStudentForm').on('submit', function(e) {
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
        
        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>

</body>

</html>