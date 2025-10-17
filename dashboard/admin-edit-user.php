<?php
// admin-edit-user.php
require_once 'config.php';

$user = null;
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $user) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    try {
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, role = ?, status = ? WHERE id = ?");
        $stmt->execute([$name, $email, $role, $status, $user['id']]);
        
        header("Location: admin-all-users.php?success=User updated successfully");
        exit();
    } catch(PDOException $e) {
        $error = "Error updating user: " . $e->getMessage();
    }
}
?>

<!-- Add your HTML form for editing users here -->