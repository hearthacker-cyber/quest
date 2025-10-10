<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['user_type'];
    $grade = isset($_POST['grade']) ? (int)$_POST['grade'] : null;
    $terms = isset($_POST['terms']) ? true : false;

    // Store form data in session for repopulating
    $_SESSION['form_data'] = [
        'fullName' => $name,
        'email' => $email,
        'grade' => $grade,
        'terms' => $terms
    ];

    // Validate form data
    $errors = [];

    // Name validation
    if (empty($name)) {
        $errors[] = "Full name is required.";
    } elseif (strlen($name) < 2) {
        $errors[] = "Full name must be at least 2 characters long.";
    }

    // Email validation
    if (empty($email)) {
        $errors[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Password validation
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // Confirm password validation
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Grade validation for students
    if ($userType === 'student' && empty($grade)) {
        $errors[] = "Grade level is required for students.";
    }

    // Terms validation
    if (!$terms) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        try {
            // Check if email already exists
            $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $checkEmail->execute([$email]);
            
            if ($checkEmail->rowCount() > 0) {
                $_SESSION['error'] = "An account with this email already exists.";
                header("Location: signup.php");
                exit();
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $insertUser = $conn->prepare("
                INSERT INTO users (name, email, password, role, grade, created_at) 
                VALUES (?, ?, ?, ?, ?, NOW())
            ");

            $insertUser->execute([$name, $email, $hashedPassword, $userType, $grade]);

            if ($insertUser->rowCount() > 0) {
                // Clear form data
                unset($_SESSION['form_data']);
                
                // Set success message
                $_SESSION['success'] = "Account created successfully! You can now login.";
                
                // Redirect to login page
                header("Location: login.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to create account. Please try again.";
            }

        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = implode("<br>", $errors);
    }

    // Redirect back to signup page with errors
    header("Location: signup.php");
    exit();
} else {
    // If not POST request, redirect to signup
    header("Location: signup.php");
    exit();
}
?>