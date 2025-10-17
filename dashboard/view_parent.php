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

// Fetch associated students (you'll need to create a parent_student_relationships table for this)
$associated_students = [];
try {
    // This is a sample query - you'll need to implement the actual relationship table
    // $stmt = $conn->prepare("SELECT s.* FROM users s 
    //                         INNER JOIN parent_student_relationships psr ON s.id = psr.student_id 
    //                         WHERE psr.parent_id = ?");
    // $stmt->execute([$id]);
    // $associated_students = $stmt->fetchAll();
    
    // For now, we'll show sample data
    $associated_students = [
        ['id' => 4, 'name' => 'Rahul Sharma', 'grade' => 2, 'email' => 'rahul@example.com'],
        ['id' => 6, 'name' => 'Amit Kumar', 'grade' => 1, 'email' => 'amit@example.com']
    ];
} catch(PDOException $e) {
    // Silently continue - relationship feature might not be implemented yet
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View Parent | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for parent profile -->
    <style>
        .profile-header {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .profile-avatar {
            width: 150px;
            height: 150px;
            border: 5px solid rgba(255,255,255,0.3);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .profile-stats {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .stat-item {
            text-align: center;
            padding: 15px;
        }
        
        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #f39c12;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 14px;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .info-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        .info-card .card-header {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
        }
        
        .info-value {
            color: #6c757d;
        }
        
        .parent-badge {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .action-buttons .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            margin: 5px;
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
        
        .timeline {
            position: relative;
            padding-left: 30px;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 15px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 20px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -23px;
            top: 5px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #f39c12;
            border: 3px solid white;
            box-shadow: 0 0 0 3px #f39c12;
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
                                <li class="breadcrumb-item active" aria-current="page">Parent Profile</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-warning btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog me-1"></i> Actions <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="edit_parent.php?id=<?php echo $parent['id']; ?>">
                                            <i class="fas fa-edit me-2"></i> Edit Parent
                                        </a>
                                        <a class="dropdown-item" href="assign_student.php?parent_id=<?php echo $parent['id']; ?>">
                                            <i class="fas fa-link me-2"></i> Assign Student
                                        </a>
                                        <a class="dropdown-item" href="suspend_parent.php?id=<?php echo $parent['id']; ?>" onclick="return confirm('Are you sure you want to suspend this parent?')">
                                            <i class="fas fa-user-slash me-2"></i> Suspend Parent
                                        </a>
                                        <a class="dropdown-item text-danger" href="delete_parent.php?id=<?php echo $parent['id']; ?>" onclick="return confirm('Are you sure you want to delete this parent? This action cannot be undone.')">
                                            <i class="fas fa-trash me-2"></i> Delete Parent
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="manage_parents.php">
                                            <i class="fas fa-arrow-left me-2"></i> Back to Parents
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Header -->
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($parent['name']); ?>&background=ffffff&color=f39c12&size=150&bold=true&format=svg" 
                                     alt="Profile" class="profile-avatar rounded-circle me-4">
                                <div>
                                    <h2 class="text-white mb-1"><?php echo htmlspecialchars($parent['name']); ?></h2>
                                    <p class="text-white-50 mb-2">
                                        <i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($parent['email']); ?>
                                    </p>
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="parent-badge">
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
                            <div class="action-buttons">
                                <a href="edit_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-light">
                                    <i class="fas fa-edit me-2"></i> Edit Profile
                                </a>
                                <a href="manage_parents.php" class="btn btn-outline-light">
                                    <i class="fas fa-arrow-left me-2"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parent Statistics -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number"><?php echo count($associated_students); ?></div>
                                <div class="stat-label">Associated Students</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number"><?php echo rand(85, 98); ?>%</div>
                                <div class="stat-label">Activity Rate</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number"><?php echo rand(12, 25); ?></div>
                                <div class="stat-label">Messages Sent</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number"><?php echo rand(150, 300); ?></div>
                                <div class="stat-label">Login Count</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Parent Information -->
                    <div class="col-xl-6">
                        <div class="card info-card">
                            <div class="card-header">
                                <i class="fas fa-user-circle me-2"></i> Parent Information
                            </div>
                            <div class="card-body">
                                <div class="info-item">
                                    <span class="info-label">Full Name</span>
                                    <span class="info-value"><?php echo htmlspecialchars($parent['name']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Email Address</span>
                                    <span class="info-value"><?php echo htmlspecialchars($parent['email']); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Parent ID</span>
                                    <span class="info-value">#PAR<?php echo str_pad($parent['id'], 3, '0', STR_PAD_LEFT); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Account Type</span>
                                    <span class="info-value">
                                        <span class="badge bg-warning">Parent Account</span>
                                    </span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Account Status</span>
                                    <span class="info-value">
                                        <span class="badge bg-success">Active</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information -->
                        <div class="card info-card">
                            <div class="card-header">
                                <i class="fas fa-shield-alt me-2"></i> Account Information
                            </div>
                            <div class="card-body">
                                <div class="info-item">
                                    <span class="info-label">Registration Date</span>
                                    <span class="info-value"><?php echo date('F j, Y', strtotime($parent['created_at'])); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Last Updated</span>
                                    <span class="info-value"><?php echo date('F j, Y', strtotime($parent['updated_at'])); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Last Login</span>
                                    <span class="info-value"><?php echo date('M j, Y g:i A', strtotime('-'.rand(1,7).' days')); ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Login Count</span>
                                    <span class="info-value"><?php echo rand(50, 200); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Associated Students -->
                    <div class="col-xl-6">
                        <div class="card info-card">
                            <div class="card-header">
                                <i class="fas fa-user-graduate me-2"></i> Associated Students
                                <span class="badge bg-primary ms-2"><?php echo count($associated_students); ?></span>
                            </div>
                            <div class="card-body">
                                <?php if(count($associated_students) > 0): ?>
                                    <?php foreach($associated_students as $student): ?>
                                        <div class="card student-card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($student['name']); ?>&background=4361ee&color=fff&size=50" 
                                                         alt="Student" class="student-avatar me-3">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1"><?php echo htmlspecialchars($student['name']); ?></h6>
                                                        <p class="text-muted mb-1">
                                                            <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($student['email']); ?>
                                                        </p>
                                                        <span class="badge bg-info">Grade <?php echo $student['grade']; ?></span>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="view_student.php?id=<?php echo $student['id']; ?>"><i class="fas fa-eye me-2"></i>View Profile</a></li>
                                                            <li><a class="dropdown-item" href="#"><i class="fas fa-unlink me-2"></i>Remove Association</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="no-students">
                                        <i class="fas fa-user-graduate"></i>
                                        <h5>No Students Associated</h5>
                                        <p class="text-muted">This parent doesn't have any students assigned yet.</p>
                                        <a href="assign_student.php?parent_id=<?php echo $parent['id']; ?>" class="btn btn-warning">
                                            <i class="fas fa-link me-2"></i> Assign Student
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="card info-card">
                            <div class="card-header">
                                <i class="fas fa-history me-2"></i> Recent Activity
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    <div class="timeline-item">
                                        <h6 class="mb-1">Viewed Student Progress</h6>
                                        <p class="text-muted mb-1">Checked Rahul's mathematics performance</p>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="mb-1">Sent Message to Teacher</h6>
                                        <p class="text-muted mb-1">Inquired about upcoming parent-teacher meeting</p>
                                        <small class="text-muted">1 day ago</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="mb-1">Downloaded Report Card</h6>
                                        <p class="text-muted mb-1">Quarterly progress report for Amit</p>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                    <div class="timeline-item">
                                        <h6 class="mb-1">Updated Profile Information</h6>
                                        <p class="text-muted mb-1">Changed email notification preferences</p>
                                        <small class="text-muted">3 days ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card info-card">
                            <div class="card-header">
                                <i class="fas fa-bolt me-2"></i> Quick Actions
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-md-3 mb-3">
                                        <a href="edit_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-warning btn-lg w-100 py-3">
                                            <i class="fas fa-edit fa-2x mb-2"></i><br>
                                            Edit Profile
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
            
            // Print parent profile
            $('#printProfile').on('click', function() {
                window.print();
            });
            
            // Export parent data
            $('#exportData').on('click', function() {
                alert('Export functionality would be implemented here');
                // Implement export functionality
            });
        });
    </script>

</body>

</html>