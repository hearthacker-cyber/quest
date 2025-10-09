<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Student Signup Hero Section -->
    <section class="signup-hero-section student-signup">
        <div class="floating-elements">
            <!-- Floating elements will be added by JavaScript -->
        </div>
        <div class="container">
            <div class="row align-items-center min-vh-100 py-5">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <div class="hero-main">
                        <h1 class="hero-title">Join <span style="color: var(--primary-yellow)">QUEST</span> as a Student!</h1>
                        <p class="hero-subtitle">Start your learning journey with personalized practice and progress tracking.</p>
                        
                        <!-- Student Benefits -->
                        <div class="benefits-section mt-5">
                            <h4 class="mb-4">Why Students Love QUEST:</h4>
                            <div class="benefits-list">
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-chart-line text-warning me-3"></i>
                                    <span>Track your learning progress with detailed analytics</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-trophy text-warning me-3"></i>
                                    <span>Earn achievements and badges for your accomplishments</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-brain text-warning me-3"></i>
                                    <span>Adaptive learning paths tailored to your level</span>
                                </div>
                                <div class="benefit-item mb-3">
                                    <i class="fas fa-gamepad text-warning me-3"></i>
                                    <span>Interactive and engaging practice sessions</span>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-award text-warning me-3"></i>
                                    <span>Compete with friends and climb leaderboards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <!-- Student Signup Form Card -->
                    <div class="signup-card">
                        <div class="signup-header text-center mb-4">
                            <div class="signup-avatar">
                                <lottie-player 
                                    src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    loop 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3>Student Sign Up</h3>
                            <p class="text-muted">Create your account to start learning</p>
                        </div>
                        
                       <form id="studentSignupForm" class="signup-form" method="POST" action="student-signup-process.php">
                            <!-- Name Field -->
                            <div class="form-group mb-4">
                                <label for="studentFullName" class="form-label">Student Full Name</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                     <input type="text" class="form-control" id="studentFullName" name="name" placeholder="Enter student full name" required>
                                </div>
                                <div class="invalid-feedback" id="studentNameError">Please enter student's full name</div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group mb-4">
                                <label for="studentEmail" class="form-label">Student Email</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control" id="studentEmail" name="email" placeholder="Enter student email" required>
                                </div>
                                <div class="invalid-feedback" id="studentEmailError">Please enter a valid student email</div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-4">
                                <label for="studentPassword" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                      <input type="password" class="form-control" id="studentPassword" name="password" placeholder="Create a password" required>
                                    <button type="button" class="input-group-text toggle-password" id="toggleStudentPassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="studentPasswordError">Password must be at least 6 characters</div>
                            </div>

                            <!-- Confirm Password Field -->
                            <div class="form-group mb-4">
                                <label for="studentConfirmPassword" class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="studentConfirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                                </div>
                                <div class="invalid-feedback" id="studentConfirmPasswordError">Passwords do not match</div>
                            </div>
                            
                            <!-- Grade Selection -->
                            <div class="form-group mb-4">
                                <label for="studentGrade" class="form-label">Grade Level</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-graduation-cap"></i>
                                    </span>
                                        <select class="form-control" id="studentGrade" name="grade" required>   
                                        <option value="">Select your grade</option>
                                        <option value="1">Grade 1</option>
                                        <option value="2">Grade 2</option>
                                        <option value="3">Grade 3</option>
                                        <option value="4">Grade 4</option>
                                        <option value="5">Grade 5</option>
                                        <option value="6">Grade 6</option>
                                        <option value="7">Grade 7</option>
                                        <option value="8">Grade 8</option>
                                        <option value="9">Grade 9</option>
                                        <option value="10">Grade 10</option>
                                        <option value="11">Grade 11</option>
                                        <option value="12">Grade 12</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback" id="studentGradeError">Please select your grade level</div>
                            </div>

                            <!-- School Name -->
                            <div class="form-group mb-4">
                                <label for="studentSchool" class="form-label">School Name (Optional)</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-school"></i>
                                    </span>
                                    <input type="text" class="form-control" id="studentSchool" name="school" placeholder="Enter your school name">
                                </div>
                            </div>
                            
                            <!-- Terms Acceptance -->
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="studentTerms" name="terms" required>
                                    <label class="form-check-label" for="studentTerms">
                                        I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback" id="studentTermsError">You must agree to the terms and conditions</div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-warning w-100 py-3 mb-4 signup-btn">
                                <span class="btn-text">
                                    <i class="fas fa-graduation-cap me-2"></i>Create Student Account
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
    <a href="student-login.php" class="signup-link btn-style">
        <i class="fas fa-sign-in-alt me-2"></i>Sign In as Student
    </a>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="studentSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Student Account Created Successfully!</h5>
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
                    <h5 class="mb-3">Welcome to QUEST, Student!</h5>
                    <p class="text-muted mb-4">Your student account has been created successfully. Get ready to start your learning journey!</p>
                    <div class="d-grid gap-2">
                        <a href="student-dashboard.php" class="btn btn-warning">
                            <i class="fas fa-rocket me-2"></i>Start Learning Now
                        </a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-cog me-2"></i>Complete Profile Setup
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
    <script src="scripts/student-signup.js"></script>
</body>
</html>