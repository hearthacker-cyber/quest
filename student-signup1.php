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
    <style>
        :root {
            --primary-blue: #1a56db;
            --primary-yellow: #f59e0b;
            --accent-purple: #8b5cf6;
            --dark-blue: #1e3a8a;
            --light-bg: #f8fafc;
        }
        
        .signup-hero-section {
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }
        
        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .signup-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            color: #333;
        }
        
        .signup-avatar {
            margin-bottom: 20px;
        }
        
        .benefits-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        
        .benefit-item {
            display: flex;
            align-items: center;
            font-size: 16px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        }
        
        .btn {
            background: var(--primary-blue);
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        
        .btn:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .password-strength {
            margin-top: 8px;
        }
        
        .strength-meter {
            height: 6px;
            border-radius: 3px;
            background: #e5e7eb;
            overflow: hidden;
        }
        
        .strength-meter::before {
            content: '';
            display: block;
            height: 100%;
            width: 0%;
            background: #ef4444;
            transition: all 0.3s;
        }
        
        .strength-meter.weak::before { width: 33%; background: #ef4444; }
        .strength-meter.medium::before { width: 66%; background: #f59e0b; }
        .strength-meter.strong::before { width: 100%; background: #10b981; }
        
        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }
        
        .message.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        
        .message.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .min-vh-100 {
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Student Signup Hero Section -->
    <section class="signup-hero-section student-signup">
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
                        
                        <div class="form-container">
                            <div id="message" class="message"></div>
                            
                            <form id="signupForm" action="process-student-signup.php" method="POST">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                                </div>
                                
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" required placeholder="Create a password">
                                    <div class="password-strength">
                                        <div id="password-strength-meter" class="strength-meter"></div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                                </div>
                                
                                <div class="form-group">
                                    <label for="grade">Grade Level</label>
                                    <select id="grade" name="grade" required>
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
                                
                                <button type="submit" class="btn">Create Account</button>
                            </form>
                        </div>
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
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthMeter = document.getElementById('password-strength-meter');
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/\d/)) strength++;
            if (password.match(/[^a-zA-Z\d]/)) strength++;
            
            strengthMeter.className = 'strength-meter';
            if (password.length > 0) {
                if (strength <= 2) {
                    strengthMeter.classList.add('weak');
                } else if (strength === 3) {
                    strengthMeter.classList.add('medium');
                } else {
                    strengthMeter.classList.add('strong');
                }
            }
        });

        // Form validation
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const grade = document.getElementById('grade').value;
            const message = document.getElementById('message');
            
            // Reset message
            message.style.display = 'none';
            message.className = 'message';
            
            // Validation
            if (!name || !email || !password || !confirmPassword || !grade) {
                showMessage('Please fill in all fields.', 'error');
                return;
            }
            
            if (password !== confirmPassword) {
                showMessage('Passwords do not match.', 'error');
                return;
            }
            
            if (password.length < 6) {
                showMessage('Password must be at least 6 characters long.', 'error');
                return;
            }
            
            if (!validateEmail(email)) {
                showMessage('Please enter a valid email address.', 'error');
                return;
            }
            
            // Submit form via AJAX
            const formData = new FormData(this);
            
            fetch('process-student-signup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage(data.message, 'success');
                    // Show success modal after 1 second
                    setTimeout(() => {
                        const modal = new bootstrap.Modal(document.getElementById('studentSuccessModal'));
                        modal.show();
                    }, 1000);
                } else {
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                showMessage('An error occurred. Please try again.', 'error');
                console.error('Error:', error);
            });
        });
        
        function showMessage(text, type) {
            const message = document.getElementById('message');
            message.textContent = text;
            message.className = `message ${type}`;
            message.style.display = 'block';
        }
        
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
</body>
</html>