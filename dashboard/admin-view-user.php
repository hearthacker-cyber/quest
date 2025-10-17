<?php
// admin-view-user.php
require_once 'config.php';

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch();
    
    if (!$user) {
        header("Location: admin-all-users.php?error=User not found");
        exit();
    }
} else {
    header("Location: admin-all-users.php");
    exit();
}
?>

<!-- Add your HTML for viewing user details here -->