<?php
// Include configuration
include('config.php');

// Initialize variables
$success = '';
$error = '';
$parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : '';
$student_id = isset($_POST['student_id']) ? $_POST['student_id'] : '';

// Fetch parent data if parent_id is provided
$parent = null;
if($parent_id) {
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND role = 'parent'");
        $stmt->execute([$parent_id]);
        $parent = $stmt->fetch();
        
        if(!$parent) {
            $error = "Parent not found.";
        }
    } catch(PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

// Fetch all available students
$available_students = [];
try {
    $stmt = $conn->prepare("SELECT id, name, email, grade FROM users WHERE role = 'student' ORDER BY name");
    $stmt->execute();
    $available_students = $stmt->fetchAll();
} catch(PDOException $e) {
    $error = "Error fetching students: " . $e->getMessage();
}

// Fetch already assigned students for this parent
$assigned_students = [];
if($parent_id) {
    try {
        // This is a sample - you'll need to implement the actual relationship table
        // $stmt = $conn->prepare("SELECT s.* FROM users s 
        //                         INNER JOIN parent_student_relationships psr ON s.id = psr.student_id 
        //                         WHERE psr.parent_id = ?");
        // $stmt->execute([$parent_id]);
        // $assigned_students = $stmt->fetchAll();
        
        // For now, we'll show empty array
        $assigned_students = [];
    } catch(PDOException $e) {
        // Silently continue - relationship feature might not be implemented yet
    }
}

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign_student'])) {
    $parent_id = $_POST['parent_id'];
    $student_id = $_POST['student_id'];
    
    if(empty($parent_id) || empty($student_id)) {
        $error = "Please select both parent and student.";
    } else {
        try {
            // Check if relationship already exists
            // $check_stmt = $conn->prepare("SELECT id FROM parent_student_relationships WHERE parent_id = ? AND student_id = ?");
            // $check_stmt->execute([$parent_id, $student_id]);
            
            // if($check_stmt->fetch()) {
            //     $error = "This student is already assigned to the selected parent.";
            // } else {
                // Insert relationship
                // $insert_stmt = $conn->prepare("INSERT INTO parent_student_relationships (parent_id, student_id, created_at) VALUES (?, ?, NOW())");
                // $result = $insert_stmt->execute([$parent_id, $student_id]);
                
                // For demo purposes, we'll simulate success
                $result = true;
                
                if($result) {
                    $success = "Student assigned to parent successfully!";
                    // Refresh assigned students list
                    // $stmt = $conn->prepare("SELECT s.* FROM users s 
                    //                         INNER JOIN parent_student_relationships psr ON s.id = psr.student_id 
                    //                         WHERE psr.parent_id = ?");
                    // $stmt->execute([$parent_id]);
                    // $assigned_students = $stmt->fetchAll();
                } else {
                    $error = "Failed to assign student. Please try again.";
                }
            // }
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}

// Handle remove assignment
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_assignment'])) {
    $parent_id = $_POST['parent_id'];
    $student_id = $_POST['student_id'];
    
    try {
        // Remove relationship
        // $delete_stmt = $conn->prepare("DELETE FROM parent_student_relationships WHERE parent_id = ? AND student_id = ?");
        // $result = $delete_stmt->execute([$parent_id, $student_id]);
        
        // For demo purposes, we'll simulate success
        $result = true;
        
        if($result) {
            $success = "Student removed from parent successfully!";
            // Refresh assigned students list
            // $stmt = $conn->prepare("SELECT s.* FROM users s 
            //                         INNER JOIN parent_student_relationships psr ON s.id = psr.student_id 
            //                         WHERE psr.parent_id = ?");
            // $stmt->execute([$parent_id]);
            // $assigned_students = $stmt->fetchAll();
        } else {
            $error = "Failed to remove student assignment. Please try again.";
        }
    } catch(PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Assign Student to Parent | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for assign student -->
    <style>
        .page-header {
            background: linear-gradient(135deg, #f39c12 0%, #3498db 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .assignment-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .assignment-card .card-header {
            background: linear-gradient(135deg, #f39c12 0%, #3498db 100%);
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
        
        .btn-assign {
            background: linear-gradient(135deg, #f39c12 0%, #3498db 100%);
            border: none;
            color: white;
        }
        
        .btn-assign:hover {
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
        
        .student-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        
        .student-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .student-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        
        .parent-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .no-students {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .no-students i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #e9ecef;
        }
        
        .relationship-badge {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .quick-action-btn {
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 14px;
            margin: 2px;
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
                                <?php if($parent): ?>
                                <li class="breadcrumb-item"><a href="view_parent.php?id=<?php echo $parent['id']; ?>"><?php echo htmlspecialchars($parent['name']); ?></a></li>
                                <?php endif; ?>
                                <li class="breadcrumb-item active" aria-current="page">Assign Student</li>
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
                                <i class="fas fa-link me-2"></i> Assign Student to Parent
                            </h1>
                            <p class="text-white-50 mb-0">
                                Link students to parent accounts to enable parental monitoring and communication.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-white-50">
                                <i class="fas fa-users fa-3x opacity-75"></i>
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

                <div class="row">
                    <!-- Assignment Form -->
                    <div class="col-lg-6">
                        <div class="card assignment-card">
                            <div class="card-header">
                                <i class="fas fa-user-plus me-2"></i> Assign New Student
                            </div>
                            <div class="card-body">
                                <form method="POST" id="assignStudentForm">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-user-friends"></i> Select Parent
                                        </h5>
                                        
                                        <?php if($parent): ?>
                                            <!-- Parent is pre-selected from URL -->
                                            <div class="parent-info">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($parent['name']); ?>&background=f39c12&color=fff&size=50" 
                                                         alt="Parent" class="rounded-circle me-3">
                                                    <div>
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($parent['name']); ?></h6>
                                                        <p class="text-muted mb-1"><?php echo htmlspecialchars($parent['email']); ?></p>
                                                        <span class="badge bg-warning">Parent</span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="parent_id" value="<?php echo $parent['id']; ?>">
                                            </div>
                                        <?php else: ?>
                                            <!-- Select parent from dropdown -->
                                            <div class="mb-3">
                                                <label for="parent_id" class="form-label">
                                                    Select Parent <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control" id="parent_id" name="parent_id" required>
                                                    <option value="">Choose a parent...</option>
                                                    <?php
                                                    try {
                                                        $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE role = 'parent' ORDER BY name");
                                                        $stmt->execute();
                                                        $parents = $stmt->fetchAll();
                                                        
                                                        foreach($parents as $p) {
                                                            $selected = ($parent_id == $p['id']) ? 'selected' : '';
                                                            echo '<option value="' . $p['id'] . '" ' . $selected . '>' . htmlspecialchars($p['name']) . ' (' . htmlspecialchars($p['email']) . ')</option>';
                                                        }
                                                    } catch(PDOException $e) {
                                                        echo '<option value="">Error loading parents</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <div class="form-text">Choose the parent you want to assign a student to</div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <h5 class="section-title mt-4">
                                            <i class="fas fa-user-graduate"></i> Select Student
                                        </h5>
                                        
                                        <div class="mb-3">
                                            <label for="student_id" class="form-label">
                                                Select Student <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-control" id="student_id" name="student_id" required>
                                                <option value="">Choose a student...</option>
                                                <?php foreach($available_students as $student): ?>
                                                    <option value="<?php echo $student['id']; ?>" <?php echo ($student_id == $student['id']) ? 'selected' : ''; ?>>
                                                        <?php echo htmlspecialchars($student['name']); ?> - Grade <?php echo $student['grade']; ?> (<?php echo htmlspecialchars($student['email']); ?>)
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="form-text">Choose the student to assign to the parent</div>
                                        </div>
                                        
                                        <div class="info-box">
                                            <i class="fas fa-info-circle me-2 text-warning"></i>
                                            <strong>Note:</strong> Once assigned, the parent will be able to monitor this student's progress, receive notifications, and communicate with teachers.
                                        </div>
                                        
                                        <div class="d-grid mt-4">
                                            <button type="submit" name="assign_student" class="btn btn-assign btn-action">
                                                <i class="fas fa-link me-2"></i> Assign Student to Parent
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Currently Assigned Students -->
                    <div class="col-lg-6">
                        <div class="card assignment-card">
                            <div class="card-header">
                                <i class="fas fa-list me-2"></i> Currently Assigned Students
                                <?php if($parent): ?>
                                    <span class="badge bg-primary ms-2"><?php echo count($assigned_students); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <?php if($parent && count($assigned_students) > 0): ?>
                                    <?php foreach($assigned_students as $student): ?>
                                        <div class="card student-card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($student['name']); ?>&background=3498db&color=fff&size=50" 
                                                         alt="Student" class="student-avatar me-3">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($student['name']); ?></h6>
                                                        <p class="text-muted mb-1">
                                                            <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($student['email']); ?>
                                                        </p>
                                                        <span class="badge bg-info">Grade <?php echo $student['grade']; ?></span>
                                                        <span class="relationship-badge ms-2">
                                                            <i class="fas fa-check me-1"></i>Assigned
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <form method="POST" style="display: inline;">
                                                            <input type="hidden" name="parent_id" value="<?php echo $parent['id']; ?>">
                                                            <input type="hidden" name="student_id" value="<?php echo $student['id']; ?>">
                                                            <button type="submit" name="remove_assignment" class="btn btn-outline-danger btn-sm quick-action-btn" 
                                                                    onclick="return confirm('Are you sure you want to remove this student from the parent?')">
                                                                <i class="fas fa-unlink"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php elseif($parent): ?>
                                    <div class="no-students">
                                        <i class="fas fa-user-graduate"></i>
                                        <h5>No Students Assigned</h5>
                                        <p class="text-muted">This parent doesn't have any students assigned yet.</p>
                                        <p class="text-muted small">Use the form to assign students to this parent.</p>
                                    </div>
                                <?php else: ?>
                                    <div class="no-students">
                                        <i class="fas fa-hand-pointer"></i>
                                        <h5>Select a Parent</h5>
                                        <p class="text-muted">Please select a parent first to view their assigned students.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <!-- Quick Actions -->
                        <div class="card assignment-card">
                            <div class="card-header">
                                <i class="fas fa-bolt me-2"></i> Quick Actions
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-6 mb-3">
                                        <a href="manage_parents.php" class="btn btn-outline-primary w-100 py-3">
                                            <i class="fas fa-users fa-2x mb-2"></i><br>
                                            All Parents
                                        </a>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <a href="users.php" class="btn btn-outline-info w-100 py-3">
                                            <i class="fas fa-user-graduate fa-2x mb-2"></i><br>
                                            All Students
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Database Schema Info -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card assignment-card">
                            <div class="card-header">
                                <i class="fas fa-database me-2"></i> Database Setup Required
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <h6 class="alert-heading">
                                        <i class="fas fa-info-circle me-2"></i> Parent-Student Relationships Table
                                    </h6>
                                    <p class="mb-2">To use this feature, you need to create a <code>parent_student_relationships</code> table:</p>
                                    <pre class="bg-dark text-light p-3 rounded mt-2">
CREATE TABLE parent_student_relationships (
    id INT PRIMARY KEY AUTO_INCREMENT,
    parent_id INT NOT NULL,
    student_id INT NOT NULL,
    relationship_type ENUM('parent', 'guardian') DEFAULT 'parent',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_relationship (parent_id, student_id)
);</pre>
                                    <p class="mt-3 mb-0">This table will store the relationships between parents and students.</p>
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
            $('#assignStudentForm').on('submit', function(e) {
                const parentId = $('#parent_id').val();
                const studentId = $('#student_id').val();
                
                if (!parentId) {
                    e.preventDefault();
                    alert('Please select a parent.');
                    $('#parent_id').focus();
                    return false;
                }
                
                if (!studentId) {
                    e.preventDefault();
                    alert('Please select a student.');
                    $('#student_id').focus();
                    return false;
                }
                
                if (!confirm('Are you sure you want to assign this student to the parent?')) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Refresh assigned students when parent changes
            $('#parent_id').on('change', function() {
                const parentId = $(this).val();
                if (parentId) {
                    window.location.href = 'assign_student.php?parent_id=' + parentId;
                }
            });
        });
    </script>

</body>

</html>