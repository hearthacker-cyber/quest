<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUEST - Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php include_once('layouts/header.php');?>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
            <div class="floating-element" style="width: 40px; height: 40px; top: 70%; left: 70%; animation-delay: 6s;"></div>
            <div class="floating-element" style="width: 60px; height: 60px; top: 40%; left: 90%; animation-delay: 8s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-right">
                    <h1 class="hero-title">Unlock Your Child's <span style="color: var(--primary-yellow)">Potential</span></h1>
                    <p class="hero-subtitle">Interactive learning platform designed to enhance critical thinking and problem-solving skills through adaptive practice and testing.</p>
                    <div class="hero-buttons mt-4">
                        <a href="signup.php" class="btn btn-warning me-3">Start Free Trial</a>
                        <a href="#features" class="btn btn-outline-light">Explore Features</a>
                    </div>
                    <div class="mt-5">
                        <div class="row">
                            <div class="col-4">
                                <h4>10K+</h4>
                                <p>Questions</p>
                            </div>
                            <div class="col-4">
                                <h4>5K+</h4>
                                <p>Students</p>
                            </div>
                            <div class="col-4">
                                <h4>9</h4>
                                <p>Sections</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow-lg" alt="Students Learning">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-text">Questions</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-number">5K+</div>
                        <div class="stat-text">Students</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-number">9</div>
                        <div class="stat-text">Sections</div>
                    </div>
                </div>
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-text">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Why Choose QUEST?</h2>
                    <p class="section-subtitle">Our platform offers comprehensive learning tools designed for success</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h4>Critical Thinking</h4>
                        <p>Develop problem-solving skills through carefully designed questions that challenge young minds and promote analytical thinking.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <h4>Adaptive Learning</h4>
                        <p>Questions adjust to student's level with easy, medium, and hard difficulty settings that evolve as skills improve.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Progress Tracking</h4>
                        <p>Monitor improvement over time with detailed analytics, performance reports, and personalized recommendations.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <h4>Timed Tests</h4>
                        <p>Simulate real exam conditions with our 20-minute timed test mode to build confidence and time management skills.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <h4>Practice Mode</h4>
                        <p>Learn at your own pace with immediate feedback, detailed explanations, and unlimited attempts to master concepts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Grade Specific</h4>
                        <p>Content tailored to specific grade levels with appropriate difficulty, aligned with educational standards.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Grades Section -->
    <section id="grades" class="grade-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Available Grades</h2>
                    <p class="section-subtitle">Comprehensive content for elementary and middle school students</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="0">
                    <div class="grade-card">
                        <div class="grade-header">
                            <h3>Grade 1</h3>
                        </div>
                        <div class="grade-body">
                            <div class="grade-icon">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <p>Foundational skills development with visual learning aids and interactive activities.</p>
                            <a href="#" class="btn btn-primary mt-3">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="grade-card">
                        <div class="grade-header">
                            <h3>Grade 2</h3>
                        </div>
                        <div class="grade-body">
                            <div class="grade-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <p>Building on basics with more complex problem-solving and critical thinking exercises.</p>
                            <a href="#" class="btn btn-primary mt-3">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="grade-card">
                        <div class="grade-header">
                            <h3>Grade 3</h3>
                        </div>
                        <div class="grade-body">
                            <div class="grade-icon">
                                <i class="fas fa-calculator"></i>
                            </div>
                            <p>Introducing more advanced concepts across all sections with guided practice.</p>
                            <a href="#" class="btn btn-primary mt-3">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="grade-card">
                        <div class="grade-header">
                            <h3>Grade 4+</h3>
                        </div>
                        <div class="grade-body">
                            <div class="grade-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <p>Advanced critical thinking and problem-solving challenges to prepare for higher levels.</p>
                            <a href="#" class="btn btn-primary mt-3">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Subscription Plans</h2>
                    <p class="section-subtitle">Flexible options to suit every learning need</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>1 Month</h3>
                            <p>Perfect for trying out</p>
                        </div>
                        <div class="pricing-body text-center">
                            <div class="price">$30</div>
                            <p class="price-period">per month</p>
                            <ul class="list-unstyled my-4">
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                                <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Final tests</li>
                                <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Priority support</li>
                            </ul>
                            <a href="signup.php" class="btn btn-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="pricing-card highlighted">
                        <div class="pricing-header">
                            <h3>3 Months</h3>
                            <p>Most popular choice</p>
                        </div>
                        <div class="pricing-body text-center">
                            <div class="price">$25</div>
                            <p class="price-period">per month</p>
                            <ul class="list-unstyled my-4">
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> 2 Final tests included</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Priority support</li>
                            </ul>
                            <a href="signup.php" class="btn btn-warning w-100">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h3>6 Months</h3>
                            <p>Best value</p>
                        </div>
                        <div class="pricing-body text-center">
                            <div class="price">$20</div>
                            <p class="price-period">per month</p>
                            <ul class="list-unstyled my-4">
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> 4 Final tests included</li>
                                <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Priority support</li>
                            </ul>
                            <a href="signup.php" class="btn btn-primary w-100">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">What Parents & Students Say</h2>
                    <p class="section-subtitle">Hear from our community of learners and educators</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"QUEST has transformed how my daughter approaches problem-solving. Her confidence has grown tremendously and she now looks forward to learning challenges!"</p>
                        <div class="testimonial-author">Sarah Johnson</div>
                        <div class="testimonial-role">Parent of Grade 3 Student</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"The practice mode with explanations after each question has been incredibly helpful for my son's learning. He can immediately understand where he went wrong."</p>
                        <div class="testimonial-author">Michael Chen</div>
                        <div class="testimonial-role">Parent of Grade 2 Student</div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <p class="testimonial-text">"I love the variety of questions and the timer in test mode. It really prepares me for actual exams and helps me manage my time better during tests."</p>
                        <div class="testimonial-author">Emily Rodriguez</div>
                        <div class="testimonial-role">Grade 4 Student</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="floating-shapes">
            <div class="shape" style="width: 100px; height: 100px; top: 10%; left: 5%; background: var(--primary-yellow); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; animation-delay: 0s;"></div>
            <div class="shape" style="width: 150px; height: 150px; top: 20%; left: 80%; background: white; border-radius: 50%; animation-delay: 5s;"></div>
            <div class="shape" style="width: 80px; height: 80px; top: 60%; left: 10%; background: var(--accent-purple); border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; animation-delay: 10s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 cta-content" data-aos="fade-right">
                    <h2 class="mb-3">Ready to boost your child's learning journey?</h2>
                    <p class="mb-4">Join thousands of parents who are already using QUEST to enhance their children's education and critical thinking skills.</p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="signup.php" class="btn btn-warning btn-lg">Start Free Trial</a>
                </div>
            </div>
        </div>
    </section>

   <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="scripts/home.js"></script>
</body>
</html>