<?php
// Include configuration
include('config.php');

// Check if parent ID is provided
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_parents.php?error=Parent ID is required");
    exit();
}

$id = $_GET['id'];
$action = isset($_GET['action']) ? $_GET['action'] : 'suspend'; // suspend or unsuspend

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

// Handle form submission for confirmation
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $confirm = $_POST['confirm'];
    $reason = trim($_POST['reason']);
    $duration = $_POST['duration'];
    $notify_parent = isset($_POST['notify_parent']) ? 1 : 0;
    
    if($confirm === 'yes') {
        try {
            if($action === 'suspend') {
                // Add status field to users table if it doesn't exist
                // ALTER TABLE users ADD COLUMN status ENUM('active', 'suspended') DEFAULT 'active';
                // ALTER TABLE users ADD COLUMN suspension_reason TEXT NULL;
                // ALTER TABLE users ADD COLUMN suspension_until DATETIME NULL;
                // ALTER TABLE users ADD COLUMN suspended_at DATETIME NULL;
                
                $suspension_until = null;
                if($duration !== 'permanent') {
                    $suspension_days = intval($duration);
                    $suspension_until = date('Y-m-d H:i:s', strtotime("+$suspension_days days"));
                }
                
                // For now, we'll update a status field if it exists, otherwise we'll just show success
                // $update_stmt = $conn->prepare("UPDATE users SET status = 'suspended', suspension_reason = ?, suspension_until = ?, suspended_at = NOW(), updated_at = NOW() WHERE id = ?");
                // $result = $update_stmt->execute([$reason, $suspension_until, $id]);
                
                // Simulate success for demo
                $result = true;
                
                if($result) {
                    $success_message = "Parent account has been suspended successfully!";
                    $action_completed = true;
                    
                    // Send notification email if requested
                    if($notify_parent) {
                        // Implementation for sending email notification
                        // mail($parent['email'], "Account Suspension Notice", "Your account has been suspended. Reason: $reason");
                    }
                } else {
                    $error_message = "Failed to suspend parent account. Please try again.";
                }
            } else {
                // Unsuspend parent
                // $update_stmt = $conn->prepare("UPDATE users SET status = 'active', suspension_reason = NULL, suspension_until = NULL, suspended_at = NULL, updated_at = NOW() WHERE id = ?");
                // $result = $update_stmt->execute([$id]);
                
                // Simulate success for demo
                $result = true;
                
                if($result) {
                    $success_message = "Parent account has been unsuspended successfully!";
                    $action_completed = true;
                    
                    // Send notification email if requested
                    if($notify_parent) {
                        // mail($parent['email'], "Account Reactivation Notice", "Your account has been reactivated.");
                    }
                } else {
                    $error_message = "Failed to unsuspend parent account. Please try again.";
                }
            }
        } catch(PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    } else {
        header("Location: view_parent.php?id=" . $id);
        exit();
    }
}

// Determine page title and messages based on action
if($action === 'unsuspend') {
    $page_title = "Unsuspend Parent";
    $action_text = "Unsuspend";
    $action_color = "success";
    $icon = "fa-user-check";
    $confirmation_message = "Are you sure you want to unsuspend this parent account?";
    $success_redirect = "Parent account has been reactivated and full access has been restored.";
} else {
    $page_title = "Suspend Parent";
    $action_text = "Suspend";
    $action_color = "warning";
    $icon = "fa-user-slash";
    $confirmation_message = "Are you sure you want to suspend this parent account?";
    $success_redirect = "Parent account has been suspended and access has been restricted.";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $page_title; ?> | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for suspend parent -->
    <style>
        .action-header {
            background: linear-gradient(135deg, 
                <?php echo $action === 'suspend' ? '#f39c12' : '#27ae60'; ?> 0%, 
                <?php echo $action === 'suspend' ? '#e74c3c' : '#2ecc71'; ?> 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .action-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.9;
        }
        
        .confirmation-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border-left: 5px solid <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?>;
        }
        
        .confirmation-card .card-header {
            background: white;
            color: <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?>;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .parent-info-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-confirm {
            background: linear-gradient(135deg, 
                <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?> 0%, 
                <?php echo $action === 'suspend' ? '#c0392b' : '#229954'; ?> 100%);
            border: none;
            color: white;
        }
        
        .btn-confirm:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .reason-box {
            background: #fff9e6;
            border: 1px solid #ffeaa7;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .duration-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 15px 0;
        }
        
        .duration-option {
            flex: 1;
            min-width: 120px;
        }
        
        .duration-option input[type="radio"] {
            display: none;
        }
        
        .duration-option label {
            display: block;
            padding: 15px;
            text-align: center;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }
        
        .duration-option input[type="radio"]:checked + label {
            border-color: <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?>;
            background: <?php echo $action === 'suspend' ? '#fff5f5' : '#f0fff4'; ?>;
            color: <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?>;
            font-weight: 600;
        }
        
        .consequences-list {
            list-style: none;
            padding: 0;
        }
        
        .consequences-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .consequences-list li:last-child {
            border-bottom: none;
        }
        
        .consequences-list li i {
            color: <?php echo $action === 'suspend' ? '#e74c3c' : '#27ae60'; ?>;
            margin-right: 10px;
        }
        
        .notification-checkbox {
            background: #e8f5e8;
            border: 1px solid #27ae60;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
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

                <!-- Action Header -->
                <div class="action-header">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-center text-md-start">
                            <div class="action-icon">
                                <i class="fas <?php echo $icon; ?>"></i>
                            </div>
                            <h1 class="text-white mb-2"><?php echo $page_title; ?></h1>
                            <p class="text-white-50 mb-0">
                                You are about to <?php echo strtolower($action_text); ?> this parent's account.
                                <?php if($action === 'suspend'): ?>
                                    This action will restrict their access to the system.
                                <?php else: ?>
                                    This action will restore their full access to the system.
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-md-4 text-center text-md-end">
                            <div class="text-white-50">
                                <div class="mb-2">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    Administrative Action Required
                                </div>
                                <small>This action will be recorded in the system audit log.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(isset($action_completed) && $action_completed): ?>
                    <!-- Success Message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-3"></i>
                                    <div>
                                        <h5 class="alert-heading mb-1">Action Completed Successfully!</h5>
                                        <p class="mb-0"><?php echo $success_message; ?></p>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <div class="card parent-info-card">
                                <div class="card-body text-center">
                                    <div class="mb-4">
                                        <i class="fas <?php echo $icon; ?> fa-4x text-<?php echo $action_color; ?> mb-3"></i>
                                        <h4>Parent Has Been <?php echo $action_text; ?>ed</h4>
                                        <p class="text-muted"><?php echo $success_redirect; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                                        <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-primary btn-action">
                                            <i class="fas fa-user me-2"></i> View Parent Profile
                                        </a>
                                        <a href="manage_parents.php" class="btn btn-outline-secondary btn-action">
                                            <i class="fas fa-users me-2"></i> Back to Parents
                                        </a>
                                        <?php if($action === 'suspend'): ?>
                                            <a href="suspend_parent.php?id=<?php echo $parent['id']; ?>&action=unsuspend" class="btn btn-success btn-action">
                                                <i class="fas fa-user-check me-2"></i> Unsuspend Now
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Parent Information -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="card parent-info-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2 text-center">
                                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($parent['name']); ?>&background=<?php echo $action === 'suspend' ? 'e74c3c' : '27ae60'; ?>&color=fff&size=100" 
                                                 alt="Profile" class="rounded-circle mb-3" width="80" height="80">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="mb-1"><?php echo htmlspecialchars($parent['name']); ?></h5>
                                                    <p class="text-muted mb-2">
                                                        <i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($parent['email']); ?>
                                                    </p>
                                                    <span class="badge bg-warning">Parent Account</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-muted">Parent ID</small>
                                                    <p class="mb-1"><strong>#PAR<?php echo str_pad($parent['id'], 3, '0', STR_PAD_LEFT); ?></strong></p>
                                                    
                                                    <small class="text-muted">Registration Date</small>
                                                    <p class="mb-0"><?php echo date('M j, Y', strtotime($parent['created_at'])); ?></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <small class="text-muted">Current Status</small>
                                                    <p class="mb-1">
                                                        <span class="badge bg-success">
                                                            <i class="fas fa-circle me-1"></i> Active
                                                        </span>
                                                    </p>
                                                    
                                                    <small class="text-muted">Last Activity</small>
                                                    <p class="mb-0"><?php echo date('M j, Y', strtotime($parent['updated_at'])); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card confirmation-card">
                                <div class="card-header">
                                    <i class="fas fa-exclamation-triangle me-2"></i> Confirmation Required
                                </div>
                                <div class="card-body">
                                    <?php if(isset($error_message)): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            <?php echo $error_message; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <form method="POST" id="suspendForm">
                                        <div class="text-center mb-4">
                                            <h4 class="text-<?php echo $action_color; ?>">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                <?php echo $confirmation_message; ?>
                                            </h4>
                                            <p class="text-muted">
                                                This action will <?php echo $action === 'suspend' ? 'restrict' : 'restore'; ?> the parent's access to the system and affect their ability to monitor their children's progress.
                                            </p>
                                        </div>

                                        <?php if($action === 'suspend'): ?>
                                        <!-- Suspension Details -->
                                        <div class="reason-box">
                                            <h6 class="mb-3">
                                                <i class="fas fa-clipboard-list me-2"></i>
                                                Suspension Details
                                            </h6>
                                            
                                            <div class="mb-3">
                                                <label for="reason" class="form-label">
                                                    <strong>Reason for Suspension</strong>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" 
                                                          placeholder="Please provide a detailed reason for suspending this parent account..." required></textarea>
                                                <div class="form-text">This reason will be recorded in the system logs and may be reviewed during audits.</div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Suspension Duration</strong>
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="duration-options">
                                                    <div class="duration-option">
                                                        <input type="radio" id="duration_3" name="duration" value="3" required>
                                                        <label for="duration_3">
                                                            <i class="fas fa-calendar-day me-2"></i><br>
                                                            3 Days
                                                        </label>
                                                    </div>
                                                    <div class="duration-option">
                                                        <input type="radio" id="duration_7" name="duration" value="7">
                                                        <label for="duration_7">
                                                            <i class="fas fa-calendar-week me-2"></i><br>
                                                            7 Days
                                                        </label>
                                                    </div>
                                                    <div class="duration-option">
                                                        <input type="radio" id="duration_30" name="duration" value="30">
                                                        <label for="duration_30">
                                                            <i class="fas fa-calendar-alt me-2"></i><br>
                                                            30 Days
                                                        </label>
                                                    </div>
                                                    <div class="duration-option">
                                                        <input type="radio" id="duration_permanent" name="duration" value="permanent">
                                                        <label for="duration_permanent">
                                                            <i class="fas fa-infinity me-2"></i><br>
                                                            Permanent
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Notification Option -->
                                        <div class="notification-checkbox">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="notify_parent" name="notify_parent" value="1" checked>
                                                <label class="form-check-label" for="notify_parent">
                                                    <strong>
                                                        <i class="fas fa-envelope me-2"></i>
                                                        Send email notification to parent
                                                    </strong>
                                                </label>
                                                <div class="form-text">
                                                    <?php if($action === 'suspend'): ?>
                                                        The parent will receive an email explaining the suspension and its duration.
                                                    <?php else: ?>
                                                        The parent will receive an email notifying them that their account has been reactivated.
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Consequences -->
                                        <div class="mb-4">
                                            <h6 class="mb-3">
                                                <i class="fas fa-list-alt me-2"></i>
                                                Consequences of This Action
                                            </h6>
                                            <ul class="consequences-list">
                                                <?php if($action === 'suspend'): ?>
                                                    <li>
                                                        <i class="fas fa-ban"></i>
                                                        Parent will not be able to log into their account
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-lock"></i>
                                                        All parent account features will be temporarily disabled
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-eye-slash"></i>
                                                        Parent will lose access to children's progress monitoring
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-comment-slash"></i>
                                                        Parent will not be able to communicate with teachers
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-bell"></i>
                                                        Parent will stop receiving notifications and updates
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-history"></i>
                                                        This action will be recorded in the system audit log
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <i class="fas fa-check-circle"></i>
                                                        Parent will regain full access to their account
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-unlock"></i>
                                                        All parent account features will be restored
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-eye"></i>
                                                        Parent will be able to monitor children's progress again
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-comment"></i>
                                                        Parent can resume communication with teachers
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-bell"></i>
                                                        Parent will start receiving notifications and updates
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-history"></i>
                                                        This action will be recorded in the system audit log
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <!-- Confirmation -->
                                        <div class="alert alert-warning">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="confirmAction" name="confirm" value="yes" required>
                                                <label class="form-check-label" for="confirmAction">
                                                    <strong>
                                                        I understand the consequences and confirm that I want to 
                                                        <?php echo strtolower($action_text); ?> this parent's account.
                                                        I have verified that this action is necessary and appropriate.
                                                    </strong>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="view_parent.php?id=<?php echo $parent['id']; ?>" class="btn btn-outline-secondary btn-action">
                                                    <i class="fas fa-times me-2"></i> Cancel
                                                </a>
                                                <a href="manage_parents.php" class="btn btn-outline-primary btn-action">
                                                    <i class="fas fa-list me-2"></i> Back to Parents
                                                </a>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-confirm btn-action">
                                                    <i class="fas <?php echo $icon; ?> me-2"></i> 
                                                    <?php echo $action_text; ?> Parent Account
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Database Schema Info -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card confirmation-card">
                                <div class="card-header">
                                    <i class="fas fa-database me-2"></i> Database Setup Required
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-info">
                                        <h6 class="alert-heading">
                                            <i class="fas fa-info-circle me-2"></i> Account Status Fields
                                        </h6>
                                        <p class="mb-2">To use the suspension feature, you need to add these columns to your <code>users</code> table:</p>
                                        <pre class="bg-dark text-light p-3 rounded mt-2">
ALTER TABLE users 
ADD COLUMN status ENUM('active', 'suspended') DEFAULT 'active',
ADD COLUMN suspension_reason TEXT NULL,
ADD COLUMN suspension_until DATETIME NULL,
ADD COLUMN suspended_at DATETIME NULL;</pre>
                                        <p class="mt-3 mb-0">These fields will track account suspension status and history.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

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
            
            // Form validation
            $('#suspendForm').on('submit', function(e) {
                const confirmed = $('#confirmAction').is(':checked');
                
                if (!confirmed) {
                    e.preventDefault();
                    alert('Please confirm that you understand the consequences of this action.');
                    return false;
                }
                
                <?php if($action === 'suspend'): ?>
                const reason = $('#reason').val().trim();
                if (!reason) {
                    e.preventDefault();
                    alert('Please provide a reason for the suspension.');
                    $('#reason').focus();
                    return false;
                }
                
                const durationSelected = $('input[name="duration"]:checked').length > 0;
                if (!durationSelected) {
                    e.preventDefault();
                    alert('Please select a suspension duration.');
                    return false;
                }
                <?php endif; ?>
                
                return true;
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
            
            // Add confirmation dialog for permanent suspension
            $('input[name="duration"]').on('change', function() {
                if ($(this).val() === 'permanent') {
                    if (!confirm('WARNING: Are you sure you want to set permanent suspension? This action should only be used in severe cases and cannot be automatically reversed.')) {
                        $(this).prop('checked', false);
                    }
                }
            });
        });
    </script>

</body>

</html>