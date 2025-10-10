<?php
session_start();
require_once 'config.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['userType'];
    $grade = isset($_POST['grade']) ? (int)$_POST['grade'] : null;
    $terms = isset($_POST['terms']) ? true : false;

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || !$terms) {
        $error = 'All fields are required and you must agree to the terms.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    } elseif ($userType === 'student' && empty($grade)) {
        $error = 'Please select your grade level.';
    } else {
        try {
            // Check if email already exists
            $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $checkEmail->execute([$email]);
            
            if ($checkEmail->rowCount() > 0) {
                $error = 'Email address is already registered.';
            } else {
                // Hash password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert user
                $insertUser = $conn->prepare("INSERT INTO users (name, email, password, role, grade) VALUES (?, ?, ?, ?, ?)");
                $insertUser->execute([$name, $email, $hashedPassword, $userType, $grade]);
                
                if ($insertUser->rowCount() > 0) {
                    $success = 'Account created successfully!';
                    $_SESSION['user_id'] = $conn->lastInsertId();
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_role'] = $userType;
                    $_SESSION['user_email'] = $email;
                } else {
                    $error = 'Failed to create account. Please try again.';
                }
            }
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Signup Hero Section -->
    <section class="signup-hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
            <div class="floating-element" style="width: 40px; height: 40px; top: 70%; left: 70%; animation-delay: 6s;"></div>
            <div class="floating-element" style="width: 60px; height: 60px; top: 40%; left: 90%; animation-delay: 8s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100 py-5">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <div class="hero-main">
                        <h1 class="hero-title">Join <span style="color: var(--primary-yellow)">QUEST</span> Today!</h1>
                        <p class="hero-subtitle">Start your learning journey with personalized practice and progress tracking.</p>
                        
                        <!-- User Type Selection -->
                        <div class="user-type-selection mt-5">
                            <h4 class="mb-4">I am signing up as:</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="user-type-card student-card active" data-user-type="student">
                                        <div class="user-type-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 80px; height: 80px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <h5>Student</h5>
                                        <p>Create your learning account and start practicing</p>
                                        <div class="selection-indicator">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="user-type-card parent-card" data-user-type="parent">
                                        <div class="user-type-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_0skurerf.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 80px; height: 80px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <h5>Parent</h5>
                                        <p>Create account to monitor your child's progress</p>
                                        <div class="selection-indicator">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <!-- Error/Success Messages -->
                    <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <?php echo htmlspecialchars($error); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if ($success): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo htmlspecialchars($success); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Signup Form Card -->
                    <div class="signup-card">
                        <div class="signup-header text-center mb-4">
                            <div class="signup-avatar">
                                <lottie-player 
                                    id="signupAvatar"
                                    src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3 id="signupTitle">Student Sign Up</h3>
                            <p class="text-muted" id="signupSubtitle">Create your account to start learning</p>
                        </div>
                        
                        <form id="signupForm" class="signup-form" method="POST" action="">
                            <input type="hidden" name="userType" id="userType" value="student">
                            
                            <!-- Name Field -->
                            <div class="form-group mb-4">
                                <label for="fullName" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="fullName" name="fullName" 
                                           placeholder="Enter your full name" 
                                           value="<?php echo isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : ''; ?>" 
                                           required>
                                </div>
                                <div class="invalid-feedback" id="nameError">Please enter your full name</div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           placeholder="Enter your email" 
                                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                                           required>
                                </div>
                                <div class="invalid-feedback" id="emailError">Please enter a valid email address</div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" 
                                           placeholder="Create a password" required>
                                    <button type="button" class="input-group-text toggle-password" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="passwordError">Password must be at least 6 characters</div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group mb-4">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" 
                                           placeholder="Confirm your password" required>
                                </div>
                                <div class="invalid-feedback" id="confirmPasswordError">Passwords do not match</div>
                            </div>
                            
                            <!-- Grade Selection -->
                            <div class="form-group mb-4" id="gradeField">
                                <label for="grade" class="form-label">Grade Level</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-graduation-cap"></i>
                                    </span>
                                    <select class="form-control" id="grade" name="grade" required>
                                        <option value="">Select your grade</option>
                                        <?php for ($i = 1; $i <= 8; $i++): ?>
                                            <option value="<?php echo $i; ?>" 
                                                <?php echo (isset($_POST['grade']) && $_POST['grade'] == $i) ? 'selected' : ''; ?>>
                                                Grade <?php echo $i; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="invalid-feedback" id="gradeError">Please select your grade level</div>
                            </div>
                            
                            <!-- Terms Acceptance -->
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" 
                                           <?php echo (isset($_POST['terms']) && $_POST['terms']) ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback" id="termsError">You must agree to the terms and conditions</div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 mb-4 signup-btn">
                                <span class="btn-text">
                                    <i class="fas fa-user-plus me-2"></i>Create Account
                                </span>
                                <div class="btn-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Creating Account...
                                </div>
                            </button>
                            
                            <!-- Divider -->
                            <div class="divider mb-4">
                                <span>or continue with</span>
                            </div>
                            
                            <!-- Social Signup -->
                            <div class="social-signup mb-4">
                                <button type="button" class="btn btn-outline-primary w-100 mb-3">
                                    <i class="fab fa-google me-2"></i> Continue with Google
                                </button>
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="fab fa-apple me-2"></i> Continue with Apple
                                </button>
                            </div>
                            
                            <!-- Login Link -->
                            <div class="text-center">
                                <p class="mb-0">Already have an account? <a href="login.php" class="login-link">Sign in now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <?php if ($success): ?>
    <div class="modal fade show" id="successModal" tabindex="-1" aria-hidden="false" style="display: block; background: rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account Created Successfully!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideModal()"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_ukg8wjsk.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 150px; height: 150px; margin: 0 auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                    <h5 class="mb-3">Welcome to QUEST!</h5>
                    <p class="text-muted mb-4">Your account has been created successfully. Get ready to start your learning journey!</p>
                    <div class="d-grid gap-2">
                        <a href="student-dashboard.php" class="btn btn-warning">
                            <i class="fas fa-rocket me-2"></i>Start Learning
                        </a>
                        <button type="button" class="btn btn-outline-secondary" onclick="hideModal()">
                            <i class="fas fa-cog me-2"></i>Setup Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/signup.js"></script>
    
    <script>
        function hideModal() {
            document.getElementById('successModal').style.display = 'none';
        }
    </script>
</body>
</html>