<?php
// admin-functions.php
session_start();
require_once 'config.php';

function getAdmins() {
    global $conn;
    
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $role = isset($_GET['role']) ? $_GET['role'] : '';
    $status = isset($_GET['status']) ? $_GET['status'] : '';
    
    $sql = "SELECT * FROM users WHERE is_admin = 1";
    $params = [];
    
    if (!empty($search)) {
        $sql .= " AND (name LIKE ? OR email LIKE ?)";
        $params[] = "%$search%";
        $params[] = "%$search%";
    }
    
    if (!empty($role)) {
        $sql .= " AND admin_role = ?";
        $params[] = $role;
    }
    
    if (!empty($status)) {
        $sql .= " AND admin_status = ?";
        $params[] = $status;
    }
    
    $sql .= " ORDER BY created_at DESC";
    
    $stmt = $conn->prepare($sql);
    
    if (!empty($params)) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $admins = [];
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
    
    return $admins;
}

function getAdminStats() {
    global $conn;
    
    $stats = [
        'total_admins' => 0,
        'super_admins' => 0,
        'moderators' => 0,
        'content_managers' => 0,
        'new_this_month' => 0
    ];
    
    // Total admins
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1";
    $result = $conn->query($sql);
    $stats['total_admins'] = $result->fetch_assoc()['count'];
    
    // Super admins
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1 AND admin_role = 'super-admin'";
    $result = $conn->query($sql);
    $stats['super_admins'] = $result->fetch_assoc()['count'];
    
    // Moderators
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1 AND admin_role = 'moderator'";
    $result = $conn->query($sql);
    $stats['moderators'] = $result->fetch_assoc()['count'];
    
    // Content managers
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1 AND admin_role = 'content-manager'";
    $result = $conn->query($sql);
    $stats['content_managers'] = $result->fetch_assoc()['count'];
    
    // New this month
    $sql = "SELECT COUNT(*) as count FROM users WHERE is_admin = 1 AND MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())";
    $result = $conn->query($sql);
    $stats['new_this_month'] = $result->fetch_assoc()['count'];
    
    return $stats;
}

function addAdmin($name, $email, $password, $admin_role, $permissions = [], $admin_notes = '') {
    global $conn;
    
    // Check if email already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    
    if ($check_result->num_rows > 0) {
        $_SESSION['error_message'] = "Email already exists!";
        return false;
    }
    
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $permissions_json = json_encode($permissions);
    
    $sql = "INSERT INTO users (name, email, password, is_admin, admin_role, admin_permissions, admin_notes, admin_status) VALUES (?, ?, ?, 1, ?, ?, ?, 'active')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $hashed_password, $admin_role, $permissions_json, $admin_notes);
    
    if ($stmt->execute()) {
        $admin_id = $conn->insert_id;
        logAdminActivity($admin_id, "Admin created", "New admin '$name' added with role '$admin_role'");
        $_SESSION['success_message'] = "Admin added successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error adding admin: " . $conn->error;
        return false;
    }
}

function updateAdminRole($admin_id, $new_role) {
    global $conn;
    
    $sql = "UPDATE users SET admin_role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_role, $admin_id);
    
    if ($stmt->execute()) {
        logAdminActivity($admin_id, "Role updated", "Admin role changed to '$new_role'");
        $_SESSION['success_message'] = "Admin role updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating role: " . $conn->error;
        return false;
    }
}

function bulkUpdateRoles($admin_ids, $new_role) {
    global $conn;
    
    $ids = explode(',', $admin_ids);
    $placeholders = str_repeat('?,', count($ids) - 1) . '?';
    
    $sql = "UPDATE users SET admin_role = ? WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    
    $params = array_merge([$new_role], $ids);
    $types = str_repeat('s', count($params));
    $stmt->bind_param($types, ...$params);
    
    if ($stmt->execute()) {
        logAdminActivity($_SESSION['admin_id'], "Bulk role update", "Updated roles for " . count($ids) . " admins to '$new_role'");
        $_SESSION['success_message'] = count($ids) . " admin roles updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating roles: " . $conn->error;
        return false;
    }
}

function toggleAdminStatus($admin_id, $status) {
    global $conn;
    
    $sql = "UPDATE users SET admin_status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $admin_id);
    
    if ($stmt->execute()) {
        $action = $status == 'active' ? 'activated' : 'deactivated';
        logAdminActivity($admin_id, "Status changed", "Admin account $action");
        $_SESSION['success_message'] = "Admin status updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating status: " . $conn->error;
        return false;
    }
}

function deleteAdmin($admin_id) {
    global $conn;
    
    $sql = "DELETE FROM users WHERE id = ? AND is_admin = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
    
    if ($stmt->execute()) {
        logAdminActivity($_SESSION['admin_id'], "Admin deleted", "Admin with ID $admin_id was deleted");
        $_SESSION['success_message'] = "Admin deleted successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error deleting admin: " . $conn->error;
        return false;
    }
}

function logAdminActivity($admin_id, $action, $details = '') {
    global $conn;
    
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    
    $sql = "INSERT INTO admin_activity_log (admin_id, action, details, ip_address, user_agent) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $admin_id, $action, $details, $ip_address, $user_agent);
    $stmt->execute();
}
?>