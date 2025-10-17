<?php
// admin-add-user.php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = 'USR' . str_pad(rand(100, 999), 3, '0', STR_PAD_LEFT);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $status = $_POST['status'];

    try {
        $stmt = $conn->prepare("INSERT INTO users (user_id, name, email, password, role, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $name, $email, $password, $role, $status]);
        
        header("Location: admin-all-users.php?success=User added successfully");
        exit();
    } catch(PDOException $e) {
        $error = "Error adding user: " . $e->getMessage();
    }
}
?>

<!-- Add your HTML form for adding users here -->