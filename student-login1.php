<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <?php include_once('layouts/header.php');?>

    <!-- Student Login Hero Section -->
    <section class="login-hero-section student-login">
        <div class="floating-elements">
            <!-- Floating elements will be added by JavaScript -->
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100 py-5">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <div class="hero-main">
                        <h1 class="hero-title">Welcome Back, <span style="color: var(--primary-yellow)">Student!</span></h1>
                        <p class="hero-subtitle">Continue your learning journey with personalized practice and progress tracking.</p>
                        
                        <!-- Student Benefits -->
                        <div class="benefits-section mt-5">
                            <h4 class="mb-4">Why Students Love QUEST:</h4>
                            <div class="benefits-list">
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-chart-line text-warning me-3"></i>
                                    <span>Track your learning progress</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-trophy text-warning me-3"></i>
                                    <span>Earn achievements and badges</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-brain text-warning me-3"></i>
                                    <span>Adaptive learning paths</span>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-gamepad text-warning me-3"></i>
                                    <span>Interactive practice sessions</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <!-- Student Login Form Card -->
                    <div class="login-card">
                        <div class="login-header text-center mb-4">
                            <div class="login-avatar">
                                <lottie-player 
                                    src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3>Student Login</h3>
                            <p class="text-muted">Sign in to continue your learning journey</p>
                        </div>
                        
                        <form id="studentLoginForm" class="login-form">
                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="studentEmail" class="form-label">Student Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="studentEmail" name="email" placeholder="Enter your student email" required>
                                </div>
                                <div class="invalid-feedback" id="studentEmailError">Please enter a valid student email</div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="studentPassword" class="form-label">Password</label>
                                    <a href="#forgot-password" class="forgot-password-link" id="studentForgotPassword">Forgot Password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="studentPassword" name="password" placeholder="Enter your password" required>
                                    <button type="button" class="input-group-text toggle-password" id="toggleStudentPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="studentPasswordError">Please enter your password</div>
                            </div>
                            
                            <!-- Remember Me -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="rememberStudent">
                                <label class="form-check-label" for="rememberStudent">
                                    Remember me for 30 days
                                </label>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 mb-4 login-btn">
                                <span class="btn-text">
                                    <i class="fas fa-graduation-cap me-2"></i>Sign In as Student
                                </span>
                                <div class="btn-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                    Signing In...
                                </div>
                            </button>
                            
                            <!-- Divider -->
                            <div class="divider mb-4">
                                <span>or continue with</span>
                            </div>
                            
                            <!-- Social Login -->
                            <div class="social-login mb-4">
                                <button type="button" class="btn btn-outline-primary w-100 mb-3">
                                    <i class="fab fa-google me-2"></i> Continue with Google
                                </button>
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="fab fa-apple me-2"></i> Continue with Apple
                                </button>
                            </div>
                            
                            <!-- Sign Up Link -->
                            <div class="signup-container text-center">
                                <p class="signup-text">New to QUEST? <span class="highlight">Join as a student!</span></p>
                                <a href="student-signup.php" class="signup-link">
                                    <i class="fas fa-user-graduate me-2"></i>Create Student Account
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="studentForgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Student Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_ot6p8kwa.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 120px; height: 120px; margin: 0 auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                    <p>Enter your student email address and we'll send you instructions to reset your password.</p>
                    <form id="studentForgotPasswordForm">
                        <div class="form-group mb-3">
                            <label for="studentResetEmail" class="form-label">Student Email</label>
                            <input type="email" class="form-control" id="studentResetEmail" required>
                            <div class="invalid-feedback">Please enter a valid student email</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-paper-plane me-2"></i>Send Reset Instructions
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="scripts/student-login.js"></script>
</body>
</html>