<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - QUEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-blue: #1a56db;
            --primary-yellow: #f59e0b;
            --accent-purple: #8b5cf6;
            --dark-blue: #1e3a8a;
            --light-bg: #f8fafc;
        }
        
        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .signup-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .signup-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
        }
        
        .signup-left {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .signup-right {
            padding: 40px;
        }
        
        .logo {
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--primary-blue);
        }
        
        .signup-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-blue);
        }
        
        .signup-subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        }
        
        .btn-signup {
            background: var(--primary-blue);
            color: white;
            padding: 12px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn-signup:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6b7280;
        }
        
        .login-link a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }
        
        .feature-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        
        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .feature-list i {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .alert {
            border-radius: 8px;
            padding: 12px 15px;
        }
        
        @media (max-width: 768px) {
            .signup-left {
                padding: 30px 20px;
            }
            
            .signup-right {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
     <?php include_once('layouts/header.php');?>
    <div class="signup-container">
        <div class="signup-card">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="signup-left">
                        <h2 class="mb-4">Join QUEST Today</h2>
                        <p class="mb-4">Unlock your child's potential with our interactive learning platform designed to enhance critical thinking and problem-solving skills.</p>
                        
                        <ul class="feature-list">
                            <li><i class="fas fa-check"></i> 10,000+ Practice Questions</li>
                            <li><i class="fas fa-check"></i> Adaptive Learning Technology</li>
                            <li><i class="fas fa-check"></i> Progress Tracking & Analytics</li>
                            <li><i class="fas fa-check"></i> Grade-Specific Content</li>
                            <li><i class="fas fa-check"></i> Practice & Test Modes</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="signup-right">
                        <div class="logo">QUEST</div>
                        <h2 class="signup-title">Create Student Account</h2>
                        <p class="signup-subtitle">Sign up to start your learning journey</p>
                        
                        <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            echo '<div class="alert alert-danger">';
                            if ($error === 'empty_fields') {
                                echo 'Please fill in all fields.';
                            } elseif ($error === 'invalid_email') {
                                echo 'Please enter a valid email address.';
                            } elseif ($error === 'email_exists') {
                                echo 'An account with this email already exists.';
                            } elseif ($error === 'password_mismatch') {
                                echo 'Passwords do not match.';
                            } elseif ($error === 'stmt_failed') {
                                echo 'Something went wrong. Please try again.';
                            }
                            echo '</div>';
                        }
                        
                        if (isset($_GET['success'])) {
                            echo '<div class="alert alert-success">Account created successfully! You can now log in.</div>';
                        }
                        ?>
                        
                        <form action="process_signup.php" method="POST" id="signupForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>
                            
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                                </div>
                            </div>
                            
                            <select class="form-control" name="grade" required>
                                <option value="" disabled selected>Select Grade</option>
                                <option value="1">Grade 1</option>
                                <option value="2">Grade 2</option>
                                <option value="3">Grade 3</option>
                                <option value="4">Grade 4</option>
                                <option value="5">Grade 5</option>
                                <option value="6">Grade 6</option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                            </select>
                            
                            <input type="hidden" name="role" value="student">
                            
                            <button type="submit" class="btn-signup" name="signup_submit">Create Account</button>
                        </form>
                        
                        <div class="login-link">
                            Already have an account? <a href="login.php">Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Client-side validation
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match. Please check and try again.');
                return false;
            }
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password should be at least 6 characters long.');
                return false;
            }
            
            return true;
        });
    </script>
     <?php include_once('layouts/footer.php');?>
</body>
</html>