<?php
// export-users.php
session_start();
require_once 'config.php';

// Check admin privileges
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Get filters from request
$search = $_GET['search'] ?? '';
$role_filter = $_GET['role'] ?? '';
$status_filter = $_GET['status'] ?? '';
$date_from = $_GET['date_from'] ?? '';

// Build query (same as main page)
$query = "SELECT * FROM users WHERE 1=1";
$params = [];

if (!empty($search)) {
    $query .= " AND (name LIKE :search OR email LIKE :search OR user_id LIKE :search)";
    $params[':search'] = "%$search%";
}

if (!empty($role_filter)) {
    $query .= " AND role = :role";
    $params[':role'] = $role_filter;
}

if (!empty($status_filter)) {
    $query .= " AND status = :status";
    $params[':status'] = $status_filter;
}

if (!empty($date_from)) {
    $query .= " AND created_at >= :date_from";
    $params[':date_from'] = $date_from;
}

try {
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $users = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Error fetching users for export: " . $e->getMessage());
}

// Set headers for CSV download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=users_' . date('Y-m-d') . '.csv');

// Create output stream
$output = fopen('php://output', 'w');

// Add CSV headers
fputcsv($output, ['User ID', 'Name', 'Email', 'Role', 'Status', 'Registered On', 'Last Login']);

// Add data rows
foreach ($users as $user) {
    fputcsv($output, [
        $user['user_id'],
        $user['name'],
        $user['email'],
        ucfirst($user['role']),
        ucfirst($user['status']),
        date('M j, Y', strtotime($user['created_at'])),
        $user['last_login'] ? date('M j, Y', strtotime($user['last_login'])) : 'Never'
    ]);
}

fclose($output);
exit;