<?php
// admin-actions.php
session_start();
require_once 'config.php';

// Function to add admin
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
        $_SESSION['success_message'] = "Admin added successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error adding admin: " . $conn->error;
        return false;
    }
}

// Function to update admin role
function updateAdminRole($admin_id, $new_role) {
    global $conn;
    
    $sql = "UPDATE users SET admin_role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_role, $admin_id);
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Admin role updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating role: " . $conn->error;
        return false;
    }
}

// Function for bulk role update
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
        $_SESSION['success_message'] = count($ids) . " admin roles updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating roles: " . $conn->error;
        return false;
    }
}

// Function to toggle admin status
function toggleAdminStatus($admin_id, $status) {
    global $conn;
    
    $sql = "UPDATE users SET admin_status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $admin_id);
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Admin status updated successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error updating status: " . $conn->error;
        return false;
    }
}

// Function to delete admin
function deleteAdmin($admin_id) {
    global $conn;
    
    $sql = "DELETE FROM users WHERE id = ? AND is_admin = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $admin_id);
    
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Admin deleted successfully!";
        return true;
    } else {
        $_SESSION['error_message'] = "Error deleting admin: " . $conn->error;
        return false;
    }
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new admin
    if (isset($_POST['add_admin'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin_role = $_POST['admin_role'];
        $permissions = isset($_POST['permissions']) ? $_POST['permissions'] : [];
        $admin_notes = $_POST['admin_notes'] ?? '';
        
        if (addAdmin($name, $email, $password, $admin_role, $permissions, $admin_notes)) {
            header("Location: admin-users-admins.php");
            exit();
        }
    }
    
    // Update admin role
    if (isset($_POST['admin_role']) && isset($_POST['admin_id'])) {
        $admin_id = $_POST['admin_id'];
        $new_role = $_POST['admin_role'];
        
        if (updateAdminRole($admin_id, $new_role)) {
            header("Location: admin-users-admins.php");
            exit();
        }
    }
    
    // Bulk update roles
    if (isset($_POST['bulk_update_role'])) {
        $selected_admins = $_POST['selected_admins'];
        $new_role = $_POST['new_role'];
        
        if (bulkUpdateRoles($selected_admins, $new_role)) {
            header("Location: admin-users-admins.php");
            exit();
        }
    }
    
    // Toggle admin status
    if (isset($_POST['admin_status']) && isset($_POST['admin_id'])) {
        $admin_id = $_POST['admin_id'];
        $status = $_POST['admin_status'];
        
        if (toggleAdminStatus($admin_id, $status)) {
            header("Location: admin-users-admins.php");
            exit();
        }
    }
    
    // Delete admin
    if (isset($_POST['delete_admin'])) {
        $admin_id = $_POST['admin_id'];
        
        if (deleteAdmin($admin_id)) {
            header("Location: admin-users-admins.php");
            exit();
        }
    }
}

// Redirect back if no action matched
header("Location: admin-users-admins.php");
exit();
?>