<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <?php include_once('layouts/header.php');?>

    <!-- Login Hero Section -->
    <section class="login-hero-section">
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
                        <h1 class="hero-title">Welcome Back to <span style="color: var(--primary-yellow)">QUEST</span></h1>
                        <p class="hero-subtitle">Continue your learning journey with personalized practice and progress tracking.</p>
                        
                        <!-- User Type Selection -->
                        <div class="user-type-selection mt-5">
                            <h4 class="mb-4">I am a:</h4>
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
                                        <p>Access your learning dashboard and continue practicing</p>
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
                                        <p>Monitor your child's progress and performance</p>
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
                    <!-- Login Form Card -->
                    <div class="login-card">
                        <div class="login-header text-center mb-4">
                            <div class="login-avatar">
                                <lottie-player 
                                    id="loginAvatar"
                                    src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3 id="loginTitle">Student Login</h3>
                            <p class="text-muted" id="loginSubtitle">Sign in to continue your learning journey</p>
                        </div>
                        
                        <form id="loginForm" class="login-form">
                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="invalid-feedback" id="emailError">Please enter a valid email address</div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label">Password</label>
                                    <a href="#forgot-password" class="forgot-password-link" id="forgotPasswordLink">Forgot Password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                    <button type="button" class="input-group-text toggle-password" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="passwordError">Please enter your password</div>
                            </div>
                            
                            <!-- Remember Me -->
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me for 30 days
                                </label>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 mb-4 login-btn">
                                <span class="btn-text">
                                    <i class="fas fa-sign-in-alt me-2"></i>Sign In as Student
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
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="signup.php" class="signup-link">Sign up now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Your Password</h5>
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
                    <p>Enter your email address and we'll send you instructions to reset your password.</p>
                    <form id="forgotPasswordForm">
                        <div class="form-group mb-3">
                            <label for="resetEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="resetEmail" required>
                            <div class="invalid-feedback">Please enter a valid email address</div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-paper-plane me-2"></i>Send Reset Instructions
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Not Registered Modal -->
    <div class="modal fade" id="emailNotRegisteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Email Not Registered</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-4">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_kcsr6fcp.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 150px; height: 150px; margin: 0 auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                    <h5 class="mb-3">We couldn't find an account with that email</h5>
                    <p class="text-muted mb-4">Would you like to create a new account and start your learning journey?</p>
                    <div class="d-grid gap-2">
                        <a href="signup.php" class="btn btn-warning">
                            <i class="fas fa-user-plus me-2"></i>Create New Account
                        </a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-edit me-2"></i>Try Different Email
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/login.js"></script>
</body>
</html>