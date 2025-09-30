<!-- File: section-intro.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critical Thinking Section - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/section-intro.css">
</head>
<body>
    <?php include_once('layouts/header.php'); ?>

    <!-- Section Hero Section -->
        <!-- Section Hero Section - Fixed Alignment -->
    <section class="section-intro-hero">
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
                    <span class="section-badge">Critical Thinking Section</span>
                    <h1 class="hero-title">Master <span style="color: var(--primary-yellow)">Critical Thinking</span></h1>
                    <p class="hero-subtitle">Develop essential analytical skills through engaging puzzles, pattern recognition, and logical reasoning exercises designed to challenge young minds.</p>
                    
                    <div class="section-stats">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-brain"></i>
                                    <h4>150+</h4>
                                    <p>Thinking Exercises</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-puzzle-piece"></i>
                                    <h4>4</h4>
                                    <p>Difficulty Levels</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-chart-line"></i>
                                    <h4>98%</h4>
                                    <p>Improvement Rate</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-buttons">
                        <a href="#start-learning" class="btn btn-warning">
                            <i class="fas fa-play-circle me-2"></i>Start Learning
                        </a>
                        <a href="#section-details" class="btn btn-outline-light">
                            <i class="fas fa-info-circle me-2"></i>Learn More
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; max-width: 500px; height: auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Overview -->
    <section id="section-details" class="section-overview py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="content-card">
                        <h2 class="section-title">About Critical Thinking</h2>
                        <p class="lead">Critical thinking is the ability to analyze information objectively and make reasoned judgments. It involves evaluating facts, analyzing arguments, and solving problems systematically.</p>
                        
                        <div class="learning-objectives mt-4">
                            <h4>Learning Objectives</h4>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <ul class="objective-list">
                                        <li><i class="fas fa-check-circle text-success"></i> Develop logical reasoning skills</li>
                                        <li><i class="fas fa-check-circle text-success"></i> Improve pattern recognition</li>
                                        <li><i class="fas fa-check-circle text-success"></i> Enhance problem-solving abilities</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="objective-list">
                                        <li><i class="fas fa-check-circle text-success"></i> Strengthen analytical thinking</li>
                                        <li><i class="fas fa-check-circle text-success"></i> Build decision-making confidence</li>
                                        <li><i class="fas fa-check-circle text-success"></i> Foster creative solutions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="benefits-section mt-5">
                            <h4>Why Critical Thinking Matters</h4>
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <i class="fas fa-graduation-cap benefit-icon"></i>
                                        <h5>Academic Success</h5>
                                        <p>Improves performance across all subjects by developing analytical skills</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <i class="fas fa-lightbulb benefit-icon"></i>
                                        <h5>Real-World Skills</h5>
                                        <p>Prepares for real-life problem-solving and decision-making scenarios</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <i class="fas fa-rocket benefit-icon"></i>
                                        <h5>Future Ready</h5>
                                        <p>Essential for success in STEM fields and future careers</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="benefit-item">
                                        <i class="fas fa-users benefit-icon"></i>
                                        <h5>Social Development</h5>
                                        <p>Enhances communication and collaborative problem-solving</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="info-sidebar">
                        <div class="info-card">
                            <h5><i class="fas fa-info-circle me-2"></i>Section Details</h5>
                            <ul class="section-meta">
                                <li>
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <strong>Duration</strong>
                                        <span>8-12 weeks</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-bullseye"></i>
                                    <div>
                                        <strong>Age Group</strong>
                                        <span>Grades 1-4</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-tasks"></i>
                                    <div>
                                        <strong>Exercises</strong>
                                        <span>150+ activities</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-chart-bar"></i>
                                    <div>
                                        <strong>Progress Tracking</strong>
                                        <span>Real-time analytics</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-trophy"></i>
                                    <div>
                                        <strong>Achievements</strong>
                                        <span>15+ badges to earn</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-cogs me-2"></i>Skills Developed</h5>
                            <div class="skills-list">
                                <span class="skill-tag">Logical Reasoning</span>
                                <span class="skill-tag">Pattern Recognition</span>
                                <span class="skill-tag">Problem Solving</span>
                                <span class="skill-tag">Analytical Thinking</span>
                                <span class="skill-tag">Decision Making</span>
                                <span class="skill-tag">Creative Thinking</span>
                            </div>
                        </div>

                        <div class="info-card">
                            <h5><i class="fas fa-compass me-2"></i>Quick Navigation</h5>
                            <div class="navigation-links">
                                <a href="#example" class="nav-link">
                                    <i class="fas fa-eye"></i>
                                    View Example
                                </a>
                                <a href="#practice-mode" class="nav-link">
                                    <i class="fas fa-book-open"></i>
                                    Practice Mode
                                </a>
                                <a href="#test-mode" class="nav-link">
                                    <i class="fas fa-stopwatch"></i>
                                    Test Mode
                                </a>
                                <a href="#progress" class="nav-link">
                                    <i class="fas fa-chart-line"></i>
                                    Track Progress
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Example Exercise Section -->
    <section id="example" class="example-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Try an Example</h2>
                    <p class="section-subtitle">Experience a sample critical thinking exercise</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="example-card">
                        <div class="example-header">
                            <h4>Pattern Recognition Challenge</h4>
                            <span class="difficulty-badge easy">Easy</span>
                        </div>
                        <div class="example-body">
                            <div class="question-text mb-4">
                                <p><strong>Question:</strong> Look at the pattern below. Which shape completes the sequence?</p>
                            </div>
                            
                            <div class="analogy-container mb-4">
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_8CjgWc.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div class="image-label">Circle</div>
                                    </div>
                                    <div class="relationship-arrow">→</div>
                                    <div class="image-box">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_1pxads1a.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div class="image-label">Square</div>
                                    </div>
                                </div>
                                
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_tllptwq0.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div class="image-label">Triangle</div>
                                    </div>
                                    <div class="relationship-arrow">→</div>
                                    <div class="image-box answer-box">
                                        <div class="question-mark">?</div>
                                        <div class="image-label">What's next?</div>
                                    </div>
                                </div>
                            </div>

                            <div class="answer-options">
                                <h5 class="mb-3">Choose the correct answer:</h5>
                                <div class="options-grid">
                                    <div class="option-item" data-correct="false">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_8CjgWc.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div>Circle</div>
                                    </div>
                                    <div class="option-item" data-correct="true">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_1pxads1a.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div>Square</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_tllptwq0.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div>Triangle</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_8atvAc.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            loop 
                                            autoplay>
                                        </lottie-player>
                                        <div>Star</div>
                                    </div>
                                </div>
                            </div>

                            <div class="explanation-card mt-4" style="display: none;">
                                <h6><i class="fas fa-lightbulb text-warning me-2"></i>Explanation</h6>
                                <p>The pattern shows shapes alternating between curved and straight edges. Circle (curved) → Square (straight) → Triangle (straight) → Square (straight). The correct answer is Square to maintain the pattern of alternating edge types.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learning Modes Section -->
    <section id="practice-mode" class="mode-comparison py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Learning Modes</h2>
                    <p class="section-subtitle">Choose how you want to learn and practice</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="0">
                    <div class="mode-card practice-mode">
                        <div class="mode-header">
                            <div class="mode-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <h3>Practice Mode</h3>
                            <div class="mode-badge">Learn at Your Pace</div>
                        </div>
                        <div class="mode-body">
                            <ul class="mode-features">
                                <li><i class="fas fa-check"></i> Unlimited attempts</li>
                                <li><i class="fas fa-check"></i> Instant feedback</li>
                                <li><i class="fas fa-check"></i> Detailed explanations</li>
                                <li><i class="fas fa-check"></i> No time pressure</li>
                                <li><i class="fas fa-check"></i> Step-by-step guidance</li>
                            </ul>
                            <div class="mode-stats">
                                <div class="stat">
                                    <strong>Perfect For</strong>
                                    <span>Learning New Concepts</span>
                                </div>
                                <div class="stat">
                                    <strong>Best Used</strong>
                                    <span>Daily Practice</span>
                                </div>
                                <div class="stat">
                                    <strong>Progress</strong>
                                    <span>Save & Continue</span>
                                </div>
                            </div>
                            <button class="btn btn-warning w-100 start-practice-btn">
                                <i class="fas fa-play me-2"></i>Start Practicing
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="mode-card test-mode">
                        <div class="mode-header">
                            <div class="mode-icon">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <h3>Test Mode</h3>
                            <div class="mode-badge">Challenge Yourself</div>
                        </div>
                        <div class="mode-body">
                            <ul class="mode-features">
                                <li><i class="fas fa-check"></i> 20-minute timed tests</li>
                                <li><i class="fas fa-check"></i> Exam simulation</li>
                                <li><i class="fas fa-check"></i> Results at the end</li>
                                <li><i class="fas fa-check"></i> Performance analytics</li>
                                <li><i class="fas fa-check"></i> Certificate of completion</li>
                            </ul>
                            <div class="mode-stats">
                                <div class="stat">
                                    <strong>Perfect For</strong>
                                    <span>Skill Assessment</span>
                                </div>
                                <div class="stat">
                                    <strong>Best Used</strong>
                                    <span>Weekly Review</span>
                                </div>
                                <div class="stat">
                                    <strong>Progress</strong>
                                    <span>Track Improvement</span>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 start-test-btn">
                                <i class="fas fa-flag me-2"></i>Take a Test
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Progress Preview Section -->
    <section id="progress" class="progress-preview py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Track Your Progress</h2>
                    <p class="section-subtitle">Monitor improvement and celebrate achievements</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up">
                    <div class="progress-card">
                        <div class="progress-visual">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_obdsfe9f.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 200px; height: 200px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <div class="progress-stats">
                            <h4 class="mb-4">Sample Progress Overview</h4>
                            <div class="progress-item">
                                <div class="progress-info">
                                    <span class="progress-label">Easy Exercises</span>
                                    <span class="progress-value">92%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill easy" style="width: 92%"></div>
                                </div>
                            </div>
                            <div class="progress-item">
                                <div class="progress-info">
                                    <span class="progress-label">Medium Exercises</span>
                                    <span class="progress-value">78%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill medium" style="width: 78%"></div>
                                </div>
                            </div>
                            <div class="progress-item">
                                <div class="progress-info">
                                    <span class="progress-label">Hard Exercises</span>
                                    <span class="progress-value">65%</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill hard" style="width: 65%"></div>
                                </div>
                            </div>
                            <div class="achievements mt-4">
                                <h5>Recent Achievements</h5>
                                <div class="badges-list">
                                    <span class="badge-item">
                                        <i class="fas fa-brain text-warning"></i>
                                        Critical Thinker
                                    </span>
                                    <span class="badge-item">
                                        <i class="fas fa-puzzle-piece text-primary"></i>
                                        Pattern Master
                                    </span>
                                    <span class="badge-item">
                                        <i class="fas fa-rocket text-success"></i>
                                        Fast Learner
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="start-learning" class="section-cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="mb-3">Ready to Boost Critical Thinking Skills?</h2>
                    <p class="mb-4">Start your child's journey to becoming a better thinker and problem solver with our engaging exercises.</p>
                    <div class="cta-features">
                        <div class="cta-feature">
                            <i class="fas fa-shield-check text-warning"></i>
                            <span>14-day free trial</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-user-graduate text-warning"></i>
                            <span>Adaptive learning path</span>
                        </div>
                        <div class="cta-feature">
                            <i class="fas fa-chart-line text-warning"></i>
                            <span>Progress guaranteed</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="signup.php" class="btn btn-warning btn-lg me-3">Start Free Trial</a>
                    <a href="pricing.php" class="btn btn-outline-light btn-lg">View Plans</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/section-intro.js"></script>
</body>
</html>