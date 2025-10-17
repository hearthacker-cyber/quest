<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup_submit'])) {
    // Get form data
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $grade = $_POST['grade'];
    $role = $_POST['role'];
    
    // Validate inputs
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password) || empty($grade)) {
        header("Location: signup.php?error=empty_fields");
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=invalid_email");
        exit();
    }
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        header("Location: signup.php?error=password_mismatch");
        exit();
    }
    
    // Check password length
    if (strlen($password) < 6) {
        header("Location: signup.php?error=password_length");
        exit();
    }
    
    try {
        // Check if email already exists
        $check_email_sql = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $conn->prepare($check_email_sql);
        $check_stmt->execute([$email]);
        
        if ($check_stmt->rowCount() > 0) {
            header("Location: signup.php?error=email_exists");
            exit();
        }
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Combine first and last name for the name field
        $full_name = $first_name . ' ' . $last_name;
        
        // Insert new user
        $insert_sql = "INSERT INTO users (name, email, password, role, grade) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        
        if ($insert_stmt->execute([$full_name, $email, $hashed_password, $role, $grade])) {
            header("Location: signup.php?success=account_created");
            exit();
        } else {
            header("Location: signup.php?error=stmt_failed");
            exit();
        }
        
    } catch (PDOException $e) {
        error_log("Signup error: " . $e->getMessage());
        header("Location: signup.php?error=stmt_failed");
        exit();
    }
} else {
    // Redirect if accessed directly
    header("Location: signup.php");
    exit();
}
?>