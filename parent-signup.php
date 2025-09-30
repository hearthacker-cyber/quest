<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Sign Up - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Parent Signup Hero Section -->
    <section class="signup-hero-section parent-signup">
        <div class="floating-elements">
            <!-- Floating elements will be added by JavaScript -->
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100 py-5">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <div class="hero-main">
                        <h1 class="hero-title">Join <span style="color: var(--primary-yellow)">QUEST</span> as a Parent!</h1>
                        <p class="hero-subtitle">Monitor your child's learning progress and support their educational journey.</p>
                        
                        <!-- Parent Benefits -->
                        <div class="benefits-section mt-5">
                            <h4 class="mb-4">Why Parents Choose QUEST:</h4>
                            <div class="benefits-list">
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-chart-bar text-warning me-3"></i>
                                    <span>Track your child's progress in real-time with detailed analytics</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-bell text-warning me-3"></i>
                                    <span>Receive instant progress notifications and weekly reports</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-comments text-warning me-3"></i>
                                    <span>Communicate directly with teachers and tutors</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-calendar-check text-warning me-3"></i>
                                    <span>Monitor study schedules, assignments, and deadlines</span>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-child text-warning me-3"></i>
                                    <span>Support multiple children under one parent account</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <!-- Parent Signup Form Card -->
                    <div class="signup-card">
                        <div class="signup-header text-center mb-4">
                            <div class="signup-avatar">
                                <lottie-player 
                                    src="https://assets1.lottiefiles.com/packages/lf20_0skurerf.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3>Parent Sign Up</h3>
                            <p class="text-muted">Create account to monitor your child's progress</p>
                        </div>
                        
                        <form id="parentSignupForm" class="signup-form">
                            <!-- Name Field -->
                            <div class="form-group mb-4">
                                <label for="parentFullName" class="form-label">Parent Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" id="parentFullName" name="fullName" placeholder="Enter parent full name" required>
                                </div>
                                <div class="invalid-feedback" id="parentNameError">Please enter parent's full name</div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="parentEmail" class="form-label">Parent Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="parentEmail" name="email" placeholder="Enter parent email" required>
                                </div>
                                <div class="invalid-feedback" id="parentEmailError">Please enter a valid parent email</div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <label for="parentPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="parentPassword" name="password" placeholder="Create a password" required>
                                    <button type="button" class="input-group-text toggle-password" id="toggleParentPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="parentPasswordError">Password must be at least 6 characters</div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group mb-4">
                                <label for="parentConfirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="parentConfirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                                </div>
                                <div class="invalid-feedback" id="parentConfirmPasswordError">Passwords do not match</div>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group mb-4">
                                <label for="parentPhone" class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <input type="tel" class="form-control" id="parentPhone" name="phone" placeholder="Enter your phone number" required>
                                </div>
                                <div class="invalid-feedback" id="parentPhoneError">Please enter a valid phone number</div>
                            </div>

                            <!-- Number of Children -->
                            <div class="form-group mb-4">
                                <label for="numberOfChildren" class="form-label">Number of Children</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-users"></i>
                                    </span>
                                    <select class="form-control" id="numberOfChildren" name="childrenCount">
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                        <option value="4">4+ Children</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Terms Acceptance -->
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parentTerms" name="terms" required>
                                    <label class="form-check-label" for="parentTerms">
                                        I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback" id="parentTermsError">You must agree to the terms and conditions</div>
                                </div>
                            </div>

                            <!-- Newsletter Subscription -->
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="parentNewsletter" name="newsletter" checked>
                                    <label class="form-check-label" for="parentNewsletter">
                                        Send me weekly progress reports and educational tips
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 mb-4 signup-btn">
                                <span class="btn-text">
                                    <i class="fas fa-user-friends me-2"></i>Create Parent Account
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
                            <!-- Login Link -->
<div class="signup-container text-center">
    <p class="signup-text">Already have an account? <span class="highlight">Welcome back!</span></p>
    <a href="parent-login.php" class="signup-link btn-style">
        <i class="fas fa-sign-in-alt me-2"></i>Sign In as Parent
    </a>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="parentSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Parent Account Created Successfully!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <h5 class="mb-3">Welcome to QUEST, Parent!</h5>
                    <p class="text-muted mb-4">Your parent account has been created successfully. You can now add your children and start monitoring their progress.</p>
                    <div class="d-grid gap-2">
                        <a href="parent-dashboard.php" class="btn btn-warning">
                            <i class="fas fa-tachometer-alt me-2"></i>Go to Parent Dashboard
                        </a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-user-plus me-2"></i>Add Your First Child
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
    <script src="scripts/parent-signup.js"></script>
</body>
</html>