<?php
session_start();

// Database configuration
$servername = "srv1837.hstgr.io";
$username = "u329947844_quest";
$password = "Ariharan@2025";
$dbname = "u329947844_quest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check and create admin columns if they don't exist
function checkAndCreateAdminColumns($conn) {
    $columns_to_check = [
        'is_admin' => "TINYINT(1) DEFAULT 0",
        'admin_role' => "ENUM('super-admin','moderator','content-manager','support') DEFAULT NULL",
        'admin_status' => "ENUM('active','inactive','suspended') DEFAULT 'active'",
        'last_login' => "DATETIME DEFAULT NULL",
        'admin_permissions' => "TEXT DEFAULT NULL",
        'admin_notes' => "TEXT DEFAULT NULL"
    ];
    
    foreach ($columns_to_check as $column_name => $column_definition) {
        $check_sql = "SHOW COLUMNS FROM users LIKE '$column_name'";
        $result = $conn->query($check_sql);
        
        if ($result->num_rows == 0) {
            // Column doesn't exist, create it
            $alter_sql = "ALTER TABLE users ADD COLUMN $column_name $column_definition";
            if ($conn->query($alter_sql)) {
                error_log("Column $column_name added successfully");
            } else {
                error_log("Error adding column $column_name: " . $conn->error);
            }
        }
    }
}

// Run the column check
checkAndCreateAdminColumns($conn);

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new user
    if (isset($_POST['add_user'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $role = $_POST['role'];
        $grade = isset($_POST['grade']) ? intval($_POST['grade']) : NULL;
        $admin_role = isset($_POST['admin_role']) ? $_POST['admin_role'] : NULL;
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;

        // Validate inputs
        if (empty($name) || empty($email) || empty($password) || empty($role)) {
            $_SESSION['error_message'] = "All required fields must be filled!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = "Invalid email format!";
        } else {
            // Check if email already exists
            $check_sql = "SELECT id FROM users WHERE email = '$email'";
            $check_result = $conn->query($check_sql);
            
            if ($check_result->num_rows > 0) {
                $_SESSION['error_message'] = "Email already exists!";
            } else {
                // Hash password and insert
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                if ($is_admin) {
                    $sql = "INSERT INTO users (name, email, password, role, grade, is_admin, admin_role, admin_status) 
                            VALUES ('$name', '$email', '$hashed_password', '$role', '$grade', 1, '$admin_role', 'active')";
                } else {
                    $sql = "INSERT INTO users (name, email, password, role, grade, is_admin) 
                            VALUES ('$name', '$email', '$hashed_password', '$role', '$grade', 0)";
                }
                
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['success_message'] = "User added successfully!";
                } else {
                    $_SESSION['error_message'] = "Error adding user: " . $conn->error;
                }
            }
        }
        header("Location: admin-all-users.php");
        exit();
    }

    // Delete user
    if (isset($_POST['delete_user'])) {
        $user_id = intval($_POST['user_id']);
        
        $sql = "DELETE FROM users WHERE id = $user_id";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "User deleted successfully!";
        } else {
            $_SESSION['error_message'] = "Error deleting user: " . $conn->error;
        }
        header("Location: admin-all-users.php");
        exit();
    }

    // Update user role
    if (isset($_POST['update_role']) && isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);
        $new_role = $conn->real_escape_string($_POST['role']);
        
        $sql = "UPDATE users SET role = '$new_role' WHERE id = $user_id";
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "User role updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating role: " . $conn->error;
        }
        header("Location: admin-all-users.php");
        exit();
    }

    // Update admin role
    if (isset($_POST['update_admin_role']) && isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);
        $admin_role = $conn->real_escape_string($_POST['admin_role']);
        $is_admin = isset($_POST['is_admin']) ? 1 : 0;
        
        if ($is_admin) {
            $sql = "UPDATE users SET is_admin = 1, admin_role = '$admin_role', admin_status = 'active' WHERE id = $user_id";
        } else {
            $sql = "UPDATE users SET is_admin = 0, admin_role = NULL, admin_status = NULL WHERE id = $user_id";
        }
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['success_message'] = "Admin privileges updated successfully!";
        } else {
            $_SESSION['error_message'] = "Error updating admin privileges: " . $conn->error;
        }
        header("Location: admin-all-users.php");
        exit();
    }

    // Bulk actions
    if (isset($_POST['bulk_action'])) {
        $selected_users = $_POST['selected_users'] ?? [];
        $bulk_action = $_POST['bulk_action_type'];
        
        if (empty($selected_users)) {
            $_SESSION['error_message'] = "No users selected!";
        } else {
            $ids_string = implode(',', array_map('intval', $selected_users));
            
            switch ($bulk_action) {
                case 'delete':
                    $sql = "DELETE FROM users WHERE id IN ($ids_string)";
                    $message = count($selected_users) . " users deleted successfully!";
                    break;
                case 'activate':
                    $sql = "UPDATE users SET admin_status = 'active' WHERE id IN ($ids_string) AND is_admin = 1";
                    $message = count($selected_users) . " admins activated successfully!";
                    break;
                case 'deactivate':
                    $sql = "UPDATE users SET admin_status = 'inactive' WHERE id IN ($ids_string) AND is_admin = 1";
                    $message = count($selected_users) . " admins deactivated successfully!";
                    break;
                default:
                    $_SESSION['error_message'] = "Invalid bulk action!";
                    header("Location: admin-all-users.php");
                    exit();
            }
            
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = $message;
            } else {
                $_SESSION['error_message'] = "Error performing bulk action: " . $conn->error;
            }
        }
        header("Location: admin-all-users.php");
        exit();
    }
}

// Get user statistics
function getUserStats($conn) {
    $stats = [
        'total_users' => 0,
        'students' => 0,
        'parents' => 0,
        'admins' => 0,
        'new_this_month' => 0,
        'active_today' => 0
    ];
    
    // Total users
    $sql = "SELECT COUNT(*) as count FROM users";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['total_users'] = $row['count'];
    }
    
    // Students
    $sql = "SELECT COUNT(*) as count FROM users WHERE role = 'student'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['students'] = $row['count'];
    }
    
    // Parents
    $sql = "SELECT COUNT(*) as count FROM users WHERE role = 'parent'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['parents'] = $row['count'];
    }
    
    // Admins
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['admins'] = $row['count'];
    }
    
    // New this month
    $sql = "SELECT COUNT(*) as count FROM users WHERE MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['new_this_month'] = $row['count'];
    }
    
    // Active today (users who logged in today)
    $sql = "SELECT COUNT(*) as count FROM users WHERE DATE(last_login) = CURDATE()";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['active_today'] = $row['count'];
    }
    
    return $stats;
}

// Get users with filters
function getUsers($conn) {
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
    $role = isset($_GET['role']) ? $conn->real_escape_string($_GET['role']) : '';
    $user_type = isset($_GET['user_type']) ? $conn->real_escape_string($_GET['user_type']) : '';
    
    $sql = "SELECT * FROM users WHERE 1=1";
    
    if (!empty($search)) {
        $sql .= " AND (name LIKE '%$search%' OR email LIKE '%$search%')";
    }
    
    if (!empty($role) && $role !== 'all') {
        $sql .= " AND role = '$role'";
    }
    
    if (!empty($user_type)) {
        switch ($user_type) {
            case 'admin':
                $sql .= " AND is_admin = 1";
                break;
            case 'student':
                $sql .= " AND role = 'student' AND is_admin = 0";
                break;
            case 'parent':
                $sql .= " AND role = 'parent' AND is_admin = 0";
                break;
        }
    }
    
    $sql .= " ORDER BY created_at DESC";
    
    $result = $conn->query($sql);
    
    $users = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    
    return $users;
}

$userStats = getUserStats($conn);
$users = getUsers($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>All Users Management | Foxia - Admin Dashboard</title>
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
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        .user-stat-card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        
        .user-stat-card:hover {
            transform: translateY(-2px);
        }
        
        .user-stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }
        
        .user-stat-number {
            font-size: 24px;
            font-weight: bold;
        }
        
        .bulk-actions-bar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-icon {
            position: absolute;
            right: 15px;
            top: 12px;
            color: #6c757d;
        }
        
        .table-actions .btn {
            margin: 2px;
        }
        
        .admin-badge {
            font-size: 0.7em;
            padding: 3px 6px;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        .status-active { background-color: #28a745; }
        .status-inactive { background-color: #ffc107; }
        .status-suspended { background-color: #dc3545; }
        
        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
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
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="d-flex">
                <div class="navbar-brand-box text-center">
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo.png" alt="" height="20">
                        </span>
                    </a>
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo_dark.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                <div class="navbar-header">
                    <button type="button" class="button-menu-mobile waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="d-flex ms-auto">
                        <!-- Search input -->
                        <div class="search-wrap" id="search-wrap">
                            <div class="search-bar">
                                <input class="search-input form-control" placeholder="Search">
                                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                                    <i class="mdi mdi-close-circle"></i>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown d-none d-md-block">
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="flag-img me-2" src="assets/images/flags/us_flag.jpg" alt="Header Language" height="16"> English <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/germany_flag.jpg" alt="user-image" height="12"> <span class="align-middle"> German </span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/italy_flag.jpg" alt="user-image" height="12"> <span class="align-middle"> Italian </span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/french_flag.jpg" alt="user-image" height="12"> <span class="align-middle"> French </span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/spain_flag.jpg" alt="user-image" height="12"> <span class="align-middle"> Spanish </span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <img src="assets/images/flags/russia_flag.jpg" alt="user-image" height="12"> <span class="align-middle"> Russian </span>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown">
                            <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge bg-danger rounded-pill">3</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="m-0 font-size-16"> Notification (3) </h5>
                                        </div>
                                    </div>
                                </div>

                                <div data-simplebar style="max-height: 230px;">
                                    <a href="" class="text-reset notification-item d-block active">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-success rounded-circle font-size-16">
                                                    <i class="mdi mdi-cart-outline"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item d-block">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-danger rounded-circle font-size-16">
                                                    <i class="mdi mdi-message-text-outline"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">You have 87 unread messages</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="" class="text-reset notification-item d-block">
                                        <div class="d-flex">
                                            <div class="avatar-xs me-3">
                                                <span class="avatar-title bg-info rounded-circle font-size-16">
                                                    <i class="mdi mdi-glass-cocktail"></i>
                                                </span>
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                                                <div class="font-size-12 text-muted">
                                                    <p class="mb-1">It is a long established fact that a reader will</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="p-2 border-top">
                                    <div class="d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 text-start" href="javascript:void(0)">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user me-2" src="assets/images/users/avatar-1.jpg" alt="Header Avatar"> 
                                <span class="d-none d-md-inline-block ms-1">Admin User <i class="mdi mdi-chevron-down"></i> </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i class="dripicons-user font-size-16 align-middle d-inline-block me-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-wallet font-size-16 align-middle d-inline-block me-1"></i> My Wallet</a>
                                <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="dripicons-gear font-size-16 align-middle me-1"></i> Settings</a>
                                <a class="dropdown-item" href="#"><i class="dripicons-lock-open font-size-16 align-middle d-inline-block me-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="dripicons-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-spin mdi-cog"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title text-uppercase">Main</li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Dashboard </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="index.php">Overview</a></li>
                                <li><a href="dashboard-quick.php">Quick Action</a></li>
                            </ul>
                        </li>

                        <li>
                           <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="dripicons-user"></i>
                                 <span> User Management </span>
                           </a>
                              <ul class="sub-menu" aria-expanded="false">
                                  <li><a href="admin-all-users.php" class="active">All Users</a></li>
                                   <li><a href="admin-users-students.php">Manage Students</a></li>
                                    <li><a href="admin-users-parents.php">Manage parents</a></li>
                                    <li><a href="admin-users-admins.php">Manage Admins</a></li>
                                   <li><a href="admin-users-add.php">Add New User</a></li>
                                 </ul>
                        </li>

                         <!-- Questions Management Menu -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-document"></i>
                        <span> Questions Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="admin-questions.php">All Questions</a></li>
                        <li><a href="admin-questions-add.php">Add New Question</a></li>
                        <li><a href="admin-questions-import.php">Import Questions</a></li>
                        <li><a href="admin-questions-categories.php">Question Categories</a></li>
                        <li><a href="admin-questions-level.php">Difficulty Levels</a></li>
                    </ul>
                </li>

                <!-- Tests Management Menu -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-document-edit"></i>
                        <span> Tests Management </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="admin-tests.php">All Tests</a></li>
                        <li><a href="admin-tests-create.php">Create New Test</a></li>
                        <li><a href="admin-tests-scheduled.php">Scheduled Tests</a></li>
                        <li><a href="admin-tests-results.php">Results / Submissions</a></li>
                        <li><a href="admin-tests-assign.php">Assign Test to Users</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                       <i class="dripicons-tags"></i>
                       <span> Subscription & Billing </span>
                    </a>
                     <ul class="sub-menu" aria-expanded="false">
                      <li><a href="admin-plans.php">Plans & Packages</a></li>
                      <li><a href="admin-subscriptions.php">Active Subscriptions</a></li>
                      <li><a href="admin-payments.php">Payment Transactions</a></li>
                      <li><a href="admin-coupons.php">Coupons / Discounts</a></li>
                    </ul>
                </li>

                <!-- REPORTS & ANALYTICS SECTION -->
    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="dripicons-graph-bar"></i>
            <span> Reports & Analytics </span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="reports-performance.php">User Performance Reports</a></li>
            <li><a href="reports-analytics.php">Test Results Analytics</a></li>
            <li><a href="reports-revenue.php">Revenue Reports</a></li>
            <li><a href="reports-engagement.php">Engagement Reports</a></li>
        </ul>
    </li>

    <!-- SETTINGS SECTION -->
<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="dripicons-gear"></i>
        <span> Settings </span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="settings-general.php">General Settings</a></li>
        <li><a href="settings-communication.php">Email / SMS Settings</a></li>
        <li><a href="settings-payment.php">Payment Gateway Settings</a></li>
        <li><a href="settings-roles.php">Roles & Permissions</a></li>
    </ul>
</li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
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
                                <h6 class="page-title">Complete Users Management</h6>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">User Management</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                                </ol>
                            </div>
                            <div class="col-md-4">
                                <div class="float-end d-none d-md-block">
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-users me-1"></i> User Tools <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                                <i class="fas fa-user-plus me-2"></i> Add New User
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-file-import me-2"></i> Import Users
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-envelope me-2"></i> Send Bulk Email
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-download me-2"></i> Export Users
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alert Messages -->
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo $_SESSION['success_message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['success_message']); ?>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?php echo $_SESSION['error_message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>

                    <!-- User Stats Summary -->
                    <div class="row mb-4">
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-primary"><?php echo $userStats['total_users']; ?></h4>
                                            <p class="text-muted mb-0">Total Users</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-primary">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> <?php echo $userStats['new_this_month']; ?></span>
                                        <span class="text-muted ms-2">This month</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-success">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-success"><?php echo $userStats['students']; ?></h4>
                                            <p class="text-muted mb-0">Students</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-success">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-check me-1"></i> Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-info"><?php echo $userStats['parents']; ?></h4>
                                            <p class="text-muted mb-0">Parents</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-info">
                                                <i class="fas fa-user-friends"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-check me-1"></i> Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-warning"><?php echo $userStats['admins']; ?></h4>
                                            <p class="text-muted mb-0">Admins</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-warning">
                                                <i class="fas fa-user-shield"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-check me-1"></i> Active</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-danger"><?php echo $userStats['active_today']; ?></h4>
                                            <p class="text-muted mb-0">Active Today</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-danger">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-check me-1"></i> Live</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4">
                            <div class="card user-stat-card border-secondary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-0 user-stat-number text-secondary">0</h4>
                                            <p class="text-muted mb-0">Online Now</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="user-stat-icon bg-secondary">
                                                <i class="fas fa-globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <span class="badge bg-success"><i class="fas fa-signal me-1"></i> Real-time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Filters and Search Section -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Advanced User Filters & Search</h4>
                                    
                                    <form method="GET" action="">
                                        <div class="row g-3">
                                            <div class="col-xl-3 col-md-6">
                                                <div class="search-box">
                                                    <input type="text" class="form-control" name="search" placeholder="Search users by name or email..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                                    <i class="fas fa-search search-icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6">
                                                <select class="form-select" name="role">
                                                    <option value="all">All Roles</option>
                                                    <option value="student" <?php echo (isset($_GET['role']) && $_GET['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
                                                    <option value="parent" <?php echo (isset($_GET['role']) && $_GET['role'] == 'parent') ? 'selected' : ''; ?>>Parent</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-2 col-md-6">
                                                <select class="form-select" name="user_type">
                                                    <option value="">All Types</option>
                                                    <option value="admin" <?php echo (isset($_GET['user_type']) && $_GET['user_type'] == 'admin') ? 'selected' : ''; ?>>Admins Only</option>
                                                    <option value="student" <?php echo (isset($_GET['user_type']) && $_GET['user_type'] == 'student') ? 'selected' : ''; ?>>Students Only</option>
                                                    <option value="parent" <?php echo (isset($_GET['user_type']) && $_GET['user_type'] == 'parent') ? 'selected' : ''; ?>>Parents Only</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-2 col-md-6">
                                                <select class="form-select" name="status">
                                                    <option value="">All Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="suspended">Suspended</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="d-grid gap-2 d-md-flex">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-filter me-1"></i> Apply Filters
                                                    </button>
                                                    <a href="admin-all-users.php" class="btn btn-outline-secondary">
                                                        <i class="fas fa-times me-1"></i> Clear All
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                                <span class="text-muted">Quick Actions:</span>
                                                <a href="admin-all-users.php" class="btn btn-outline-primary btn-sm">
                                                    <i class="fas fa-sync-alt me-1"></i> Refresh
                                                </a>
                                                <button class="btn btn-outline-success btn-sm" onclick="exportToExcel()">
                                                    <i class="fas fa-file-export me-1"></i> Export
                                                </button>
                                                <button class="btn btn-outline-info btn-sm" onclick="window.print()">
                                                    <i class="fas fa-print me-1"></i> Print
                                                </button>
                                                <button class="btn btn-outline-warning btn-sm" id="bulkActionBtn">
                                                    <i class="fas fa-users-cog me-1"></i> Bulk Actions
                                                </button>
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-danger btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                        <i class="fas fa-cog me-1"></i> More Tools
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i> Send Email to All</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-file-import me-2"></i> Import Users</a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-download me-2"></i> Export Report</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-trash me-2"></i> Bulk Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bulk Actions Bar -->
                    <div class="bulk-actions-bar" id="bulkActionsBar">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="me-3"><strong id="selectedCount">0</strong> users selected</span>
                                <div class="btn-group me-3">
                                    <button type="button" class="btn btn-light btn-sm" onclick="performBulkAction('activate')">
                                        <i class="fas fa-check-circle me-1"></i> Activate
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="performBulkAction('deactivate')">
                                        <i class="fas fa-ban me-1"></i> Deactivate
                                    </button>
                                    <button type="button" class="btn btn-light btn-sm" onclick="performBulkAction('delete')">
                                        <i class="fas fa-trash me-1"></i> Delete
                                    </button>
                                </div>
                                <button type="button" class="btn btn-light btn-sm me-3">
                                    <i class="fas fa-envelope me-1"></i> Send Email
                                </button>
                            </div>
                            <button type="button" class="btn btn-light btn-sm" id="clearSelection">
                                <i class="fas fa-times me-1"></i> Clear Selection
                            </button>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-4">Complete Users Management</h4>
                                    
                                    <div class="table-responsive">
                                        <form id="bulkActionForm" method="POST" action="">
                                            <input type="hidden" name="bulk_action_type" id="bulkActionType" value="">
                                            <table id="users-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th width="50">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                                            </div>
                                                        </th>
                                                        <th>User ID</th>
                                                        <th>User Info</th>
                                                        <th>Contact</th>
                                                        <th>Role & Type</th>
                                                        <th>Admin Role</th>
                                                        <th>Status</th>
                                                        <th>Last Activity</th>
                                                        <th>Joined Date</th>
                                                        <th width="120">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($users)): ?>
                                                        <?php foreach ($users as $user): ?>
                                                            <?php
                                                            // Role badge class
                                                            $roleClass = '';
                                                            switch ($user['role']) {
                                                                case 'student': $roleClass = 'bg-success'; break;
                                                                case 'parent': $roleClass = 'bg-info'; break;
                                                                default: $roleClass = 'bg-secondary';
                                                            }
                                                            
                                                            // Admin badge class
                                                            $adminRoleClass = '';
                                                            if ($user['is_admin']) {
                                                                switch ($user['admin_role']) {
                                                                    case 'super-admin': $adminRoleClass = 'bg-danger'; break;
                                                                    case 'moderator': $adminRoleClass = 'bg-warning'; break;
                                                                    case 'content-manager': $adminRoleClass = 'bg-primary'; break;
                                                                    case 'support': $adminRoleClass = 'bg-secondary'; break;
                                                                    default: $adminRoleClass = 'bg-dark';
                                                                }
                                                            }
                                                            
                                                            // Status badge class
                                                            $statusClass = '';
                                                            if ($user['is_admin']) {
                                                                switch ($user['admin_status']) {
                                                                    case 'active': $statusClass = 'bg-success'; break;
                                                                    case 'inactive': $statusClass = 'bg-warning text-dark'; break;
                                                                    case 'suspended': $statusClass = 'bg-danger'; break;
                                                                    default: $statusClass = 'bg-secondary';
                                                                }
                                                            } else {
                                                                $statusClass = 'bg-success'; // Regular users are always active
                                                            }
                                                            
                                                            // Last login display
                                                            $lastActivityText = 'Never';
                                                            $lastActivityClass = 'text-muted';
                                                            if ($user['last_login']) {
                                                                $lastLoginTime = strtotime($user['last_login']);
                                                                $timeDiff = time() - $lastLoginTime;
                                                                
                                                                if ($timeDiff < 3600) {
                                                                    $lastActivityClass = 'text-success';
                                                                    $lastActivityText = 'Just now';
                                                                } elseif ($timeDiff < 86400) {
                                                                    $lastActivityClass = 'text-success';
                                                                    $lastActivityText = floor($timeDiff / 3600) . ' hours ago';
                                                                } elseif ($timeDiff < 604800) {
                                                                    $lastActivityClass = 'text-warning';
                                                                    $lastActivityText = floor($timeDiff / 86400) . ' days ago';
                                                                } else {
                                                                    $lastActivityClass = 'text-danger';
                                                                    $lastActivityText = floor($timeDiff / 604800) . ' weeks ago';
                                                                }
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input row-checkbox" type="checkbox" name="selected_users[]" value="<?php echo $user['id']; ?>">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <span class="fw-bold text-primary">#USR<?php echo str_pad($user['id'], 3, '0', STR_PAD_LEFT); ?></span>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&background=4361ee&color=fff&size=32" alt="<?php echo htmlspecialchars($user['name']); ?>" class="rounded-circle me-2 user-avatar">
                                                                        <div>
                                                                            <h6 class="mb-0"><?php echo htmlspecialchars($user['name']); ?></h6>
                                                                            <small class="text-muted">ID: <?php echo $user['id']; ?></small>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <div class="fw-medium"><?php echo htmlspecialchars($user['email']); ?></div>
                                                                        <small class="text-muted">Email</small>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex flex-column gap-1">
                                                                        <span class="badge <?php echo $roleClass; ?>"><?php echo ucfirst($user['role']); ?></span>
                                                                        <?php if ($user['is_admin']): ?>
                                                                            <span class="badge bg-dark admin-badge"><i class="fas fa-crown me-1"></i>Admin</span>
                                                                        <?php endif; ?>
                                                                        <?php if ($user['role'] == 'student' && $user['grade']): ?>
                                                                            <span class="badge bg-primary admin-badge">Grade <?php echo $user['grade']; ?></span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <?php if ($user['is_admin']): ?>
                                                                        <form method="POST" action="" class="d-inline">
                                                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                                            <select class="form-select form-select-sm" name="admin_role" onchange="this.form.submit()">
                                                                                <option value="super-admin" <?php echo $user['admin_role'] == 'super-admin' ? 'selected' : ''; ?>>Super Admin</option>
                                                                                <option value="moderator" <?php echo $user['admin_role'] == 'moderator' ? 'selected' : ''; ?>>Moderator</option>
                                                                                <option value="content-manager" <?php echo $user['admin_role'] == 'content-manager' ? 'selected' : ''; ?>>Content Manager</option>
                                                                                <option value="support" <?php echo $user['admin_role'] == 'support' ? 'selected' : ''; ?>>Support Staff</option>
                                                                            </select>
                                                                            <input type="hidden" name="is_admin" value="1">
                                                                            <input type="hidden" name="update_admin_role" value="1">
                                                                        </form>
                                                                    <?php else: ?>
                                                                        <span class="text-muted">-</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <span class="badge <?php echo $statusClass; ?>">
                                                                        <i class="fas fa-circle status-dot status-<?php echo $user['is_admin'] ? $user['admin_status'] : 'active'; ?>"></i>
                                                                        <?php echo $user['is_admin'] ? ucfirst($user['admin_status']) : 'Active'; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="<?php echo $lastActivityClass; ?>">
                                                                        <?php echo $lastActivityText; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <?php echo date('M j, Y', strtotime($user['created_at'])); ?>
                                                                    <br>
                                                                    <small class="text-muted"><?php echo date('g:i A', strtotime($user['created_at'])); ?></small>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-sm table-actions">
                                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile" onclick="viewUserProfile(<?php echo $user['id']; ?>)">
                                                                            <i class="fas fa-eye"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit User" onclick="editUser(<?php echo $user['id']; ?>)">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <?php if ($user['is_admin']): ?>
                                                                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Admin Settings" onclick="manageAdmin(<?php echo $user['id']; ?>)">
                                                                                <i class="fas fa-user-shield"></i>
                                                                            </button>
                                                                        <?php else: ?>
                                                                            <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Make Admin" onclick="makeAdmin(<?php echo $user['id']; ?>)">
                                                                                <i class="fas fa-user-plus"></i>
                                                                            </button>
                                                                        <?php endif; ?>
                                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User" onclick="deleteUser(<?php echo $user['id']; ?>)">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="10" class="text-center py-4">
                                                                <div class="text-muted">
                                                                    <i class="fas fa-users fa-3x mb-3"></i>
                                                                    <h4>No Users Found</h4>
                                                                    <p>No users match your current filters. <a href="#" data-bs-toggle="modal" data-bs-target="#addUserModal">Add your first user</a> or <a href="admin-all-users.php">clear filters</a>.</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </form>
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

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addUserModalLabel">
                        <i class="fas fa-user-plus me-2"></i>Add New User
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="userName" class="form-label">Full Name *</label>
                                <input type="text" class="form-control" id="userName" name="name" placeholder="Enter full name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="userEmail" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="userEmail" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="userPassword" class="form-label">Password *</label>
                                <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter password" required>
                                <div class="form-text">Minimum 6 characters</div>
                            </div>
                            <div class="col-md-6">
                                <label for="userRole" class="form-label">Role *</label>
                                <select class="form-select" id="userRole" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="parent">Parent</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="gradeField" style="display: none;">
                                <label for="userGrade" class="form-label">Grade</label>
                                <select class="form-select" id="userGrade" name="grade">
                                    <option value="">Select Grade</option>
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>">Grade <?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="makeAdmin" name="is_admin">
                                    <label class="form-check-label" for="makeAdmin">
                                        Make this user an admin
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6" id="adminRoleField" style="display: none;">
                                <label for="adminRole" class="form-label">Admin Role</label>
                                <select class="form-select" id="adminRole" name="admin_role">
                                    <option value="support">Support Staff</option>
                                    <option value="content-manager">Content Manager</option>
                                    <option value="moderator">Moderator</option>
                                    <option value="super-admin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="add_user">
                            <i class="fas fa-save me-1"></i> Add User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#users-datatable').DataTable({
                responsive: true,
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                pageLength: 25,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users...",
                    lengthMenu: "_MENU_"
                }
            });
            
            // Show/hide grade field based on role selection
            $('#userRole').on('change', function() {
                if ($(this).val() === 'student') {
                    $('#gradeField').show();
                    $('#userGrade').prop('required', true);
                } else {
                    $('#gradeField').hide();
                    $('#userGrade').prop('required', false);
                }
            });
            
            // Show/hide admin role field
            $('#makeAdmin').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#adminRoleField').show();
                } else {
                    $('#adminRoleField').hide();
                }
            });
            
            // Bulk selection functionality
            $('#selectAll').on('change', function() {
                $('.row-checkbox').prop('checked', this.checked);
                updateBulkActionsBar();
            });
            
            $('.row-checkbox').on('change', function() {
                if (!this.checked) {
                    $('#selectAll').prop('checked', false);
                } else {
                    // Check if all are selected
                    const allChecked = $('.row-checkbox:checked').length === $('.row-checkbox').length;
                    $('#selectAll').prop('checked', allChecked);
                }
                updateBulkActionsBar();
            });
            
            function updateBulkActionsBar() {
                const selectedCount = $('.row-checkbox:checked').length;
                $('#selectedCount').text(selectedCount);
                
                if (selectedCount > 0) {
                    $('#bulkActionsBar').fadeIn();
                } else {
                    $('#bulkActionsBar').fadeOut();
                }
            }
            
            $('#clearSelection').on('click', function() {
                $('.row-checkbox, #selectAll').prop('checked', false);
                updateBulkActionsBar();
            });
            
            $('#bulkActionBtn').on('click', function() {
                const selectedCount = $('.row-checkbox:checked').length;
                if (selectedCount === 0) {
                    alert('Please select at least one user to perform bulk actions.');
                    return;
                }
            });
            
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
        
        function performBulkAction(action) {
            const selectedCount = $('.row-checkbox:checked').length;
            if (selectedCount === 0) {
                alert('Please select at least one user.');
                return;
            }
            
            let confirmMessage = '';
            switch (action) {
                case 'delete':
                    confirmMessage = `Are you sure you want to delete ${selectedCount} user(s)? This action cannot be undone.`;
                    break;
                case 'activate':
                    confirmMessage = `Are you sure you want to activate ${selectedCount} admin(s)?`;
                    break;
                case 'deactivate':
                    confirmMessage = `Are you sure you want to deactivate ${selectedCount} admin(s)?`;
                    break;
                default:
                    return;
            }
            
            if (confirm(confirmMessage)) {
                $('#bulkActionType').val(action);
                $('#bulkActionForm').append('<input type="hidden" name="bulk_action" value="1">');
                $('#bulkActionForm').submit();
            }
        }
        
        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';
                
                const userIdInput = document.createElement('input');
                userIdInput.type = 'hidden';
                userIdInput.name = 'user_id';
                userIdInput.value = userId;
                form.appendChild(userIdInput);
                
                const deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'delete_user';
                deleteInput.value = '1';
                form.appendChild(deleteInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
        
        function viewUserProfile(userId) {
            alert('View profile for user ID: ' + userId);
            // window.location.href = 'user-profile.php?id=' + userId;
        }
        
        function editUser(userId) {
            alert('Edit user with ID: ' + userId);
            // window.location.href = 'edit-user.php?id=' + userId;
        }
        
        function makeAdmin(userId) {
            if (confirm('Are you sure you want to make this user an admin?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';
                
                const userIdInput = document.createElement('input');
                userIdInput.type = 'hidden';
                userIdInput.name = 'user_id';
                userIdInput.value = userId;
                form.appendChild(userIdInput);
                
                const adminRoleInput = document.createElement('input');
                adminRoleInput.type = 'hidden';
                adminRoleInput.name = 'admin_role';
                adminRoleInput.value = 'support';
                form.appendChild(adminRoleInput);
                
                const isAdminInput = document.createElement('input');
                isAdminInput.type = 'hidden';
                isAdminInput.name = 'is_admin';
                isAdminInput.value = '1';
                form.appendChild(isAdminInput);
                
                const updateInput = document.createElement('input');
                updateInput.type = 'hidden';
                updateInput.name = 'update_admin_role';
                updateInput.value = '1';
                form.appendChild(updateInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
        
        function manageAdmin(userId) {
            alert('Manage admin settings for user ID: ' + userId);
            // window.location.href = 'admin-settings.php?id=' + userId;
        }
        
        function exportToExcel() {
            alert('Export functionality would be implemented here');
            // Implement Excel export using DataTables buttons
        }
    </script>

</body>
</html>
<?php
// Close database connection
$conn->close();
?>