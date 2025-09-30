<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<?php include_once('layouts/header.php'); ?>

<!-- Section Introduction Hero -->
<section class="section-intro-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-badge">
                    <span id="section-category">Picture Analogy</span>
                </div>
                <h1 class="hero-title" id="section-title">Master Picture Analogies</h1>
                <p class="hero-subtitle" id="section-description">Develop critical thinking skills by identifying relationships between images and applying logical reasoning to solve visual puzzles.</p>
                
                <div class="section-stats mt-4">
                    <div class="stat-item">
                        <i class="fas fa-question-circle"></i>
                        <span><strong id="questions-count">20</strong> Questions per session</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-clock"></i>
                        <span><strong id="time-limit">20 min</strong> Test mode / Unlimited Practice</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-brain"></i>
                        <span>Difficulty: <strong id="difficulty-level">Easy to Hard</strong></span>
                    </div>
                </div>
                
                <div class="action-buttons mt-5">
                    <a href="practice.php?section=picture-analogy" class="btn btn-warning me-3">
                        <i class="fas fa-play-circle me-2"></i>Start Practice
                    </a>
                    <a href="test.php?section=picture-analogy" class="btn btn-outline-light">
                        <i class="fas fa-stopwatch me-2"></i>Take Test
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                <div class="lottie-animation" id="section-lottie">
                    <!-- Lottie animation will be loaded here -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Details -->
<section class="section-details py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="content-card">
                    <h3 class="mb-4">About This Section</h3>
                    <p id="section-about" class="lead">
                        Picture Analogies help develop visual reasoning and pattern recognition skills. You'll be presented with two images that have a specific relationship, and your task is to identify another image that shares the same relationship with a third image.
                    </p>
                    
                    <div class="tips-section mt-5">
                        <h4 class="mb-4"><i class="fas fa-lightbulb me-2"></i>Pro Tips & Strategies</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tip-item">
                                    <div class="tip-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <h5>Look for Patterns</h5>
                                    <p>Identify the relationship between the first two images before looking at answer choices.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tip-item">
                                    <div class="tip-icon">
                                        <i class="fas fa-sync-alt"></i>
                                    </div>
                                    <h5>Consider Transformations</h5>
                                    <p>Think about how the first image changes to become the second image.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tip-item">
                                    <div class="tip-icon">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                    <h5>Eliminate Wrong Answers</h5>
                                    <p>Rule out options that don't maintain the same relationship pattern.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tip-item">
                                    <div class="tip-icon">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                    <h5>Verify Your Choice</h5>
                                    <p>Double-check that your selected answer maintains the exact same relationship.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                <div class="info-sidebar">
                    <div class="info-card">
                        <h5><i class="fas fa-info-circle me-2"></i>Section Info</h5>
                        <ul class="section-meta">
                            <li>
                                <i class="fas fa-layer-group"></i>
                                <span>Difficulty Levels: <strong>Easy, Medium, Hard</strong></span>
                            </li>
                            <li>
                                <i class="fas fa-chart-bar"></i>
                                <span>Question Distribution: <strong>7E / 7M / 6H</strong></span>
                            </li>
                            <li>
                                <i class="fas fa-trophy"></i>
                                <span>Average Score: <strong>78%</strong></span>
                            </li>
                            <li>
                                <i class="fas fa-clock"></i>
                                <span>Avg. Time: <strong>45 sec/question</strong></span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h5><i class="fas fa-star me-2"></i>Skills Developed</h5>
                        <div class="skills-list">
                            <span class="skill-tag">Visual Reasoning</span>
                            <span class="skill-tag">Pattern Recognition</span>
                            <span class="skill-tag">Logical Thinking</span>
                            <span class="skill-tag">Analytical Skills</span>
                            <span class="skill-tag">Problem Solving</span>
                        </div>
                    </div>
                    
                    <div class="info-card">
                        <h5><i class="fas fa-share-alt me-2"></i>Quick Navigation</h5>
                        <div class="navigation-links">
                            <a href="#practice" class="nav-link">
                                <i class="fas fa-play-circle"></i>
                                <span>Practice Mode</span>
                            </a>
                            <a href="#test" class="nav-link">
                                <i class="fas fa-stopwatch"></i>
                                <span>Test Mode</span>
                            </a>
                            <a href="#examples" class="nav-link">
                                <i class="fas fa-eye"></i>
                                <span>See Examples</span>
                            </a>
                            <a href="#progress" class="nav-link">
                                <i class="fas fa-chart-line"></i>
                                <span>View Progress</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Example Problem Section -->
<section class="example-section py-5 bg-light" id="examples">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Example Problem</h2>
                <p class="section-subtitle">See how picture analogy questions work</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                <div class="example-card">
                    <div class="example-header">
                        <h4>Example: Complete the Analogy</h4>
                        <span class="difficulty-badge easy">Easy</span>
                    </div>
                    <div class="example-body">
                        <div class="analogy-container">
                            <div class="analogy-pair">
                                <div class="image-box">
                                    <div class="lottie-mini" id="example-lottie-1"></div>
                                    <span class="image-label">A</span>
                                </div>
                                <div class="relationship-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                                <div class="image-box">
                                    <div class="lottie-mini" id="example-lottie-2"></div>
                                    <span class="image-label">B</span>
                                </div>
                            </div>
                            
                            <div class="analogy-pair">
                                <div class="image-box">
                                    <div class="lottie-mini" id="example-lottie-3"></div>
                                    <span class="image-label">C</span>
                                </div>
                                <div class="relationship-arrow">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                                <div class="image-box answer-box">
                                    <div class="question-mark">?</div>
                                    <span class="image-label">D</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="answer-options">
                            <h5 class="mb-3">Choose the correct answer:</h5>
                            <div class="options-grid">
                                <div class="option-item" data-correct="true">
                                    <div class="lottie-mini" id="option-lottie-1"></div>
                                </div>
                                <div class="option-item">
                                    <div class="lottie-mini" id="option-lottie-2"></div>
                                </div>
                                <div class="option-item">
                                    <div class="lottie-mini" id="option-lottie-3"></div>
                                </div>
                                <div class="option-item">
                                    <div class="lottie-mini" id="option-lottie-4"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="explanation mt-4">
                            <button class="btn btn-outline-primary" id="show-explanation">
                                <i class="fas fa-lightbulb me-2"></i>Show Explanation
                            </button>
                            <div class="explanation-content mt-3" id="explanation-content" style="display: none;">
                                <div class="explanation-card">
                                    <h6><i class="fas fa-check-circle text-success me-2"></i>Correct Answer: Option 1</h6>
                                    <p class="mb-0">The relationship is "part to whole" - just as a wheel is part of a car, a wing is part of an airplane.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mode Comparison Section -->
<section class="mode-comparison py-5" id="practice">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Choose Your Learning Mode</h2>
                <p class="section-subtitle">Select between practice and test modes based on your goals</p>
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
                        <span class="mode-badge">Recommended for Learning</span>
                    </div>
                    <div class="mode-body">
                        <ul class="mode-features">
                            <li><i class="fas fa-check-circle"></i> No time pressure</li>
                            <li><i class="fas fa-check-circle"></i> Immediate feedback</li>
                            <li><i class="fas fa-check-circle"></i> Detailed explanations</li>
                            <li><i class="fas fa-check-circle"></i> Unlimited attempts</li>
                            <li><i class="fas fa-check-circle"></i> Learn at your own pace</li>
                        </ul>
                        <div class="mode-stats">
                            <div class="stat">
                                <strong>Best For</strong>
                                <span>Skill Building</span>
                            </div>
                            <div class="stat">
                                <strong>Questions</strong>
                                <span>20 per session</span>
                            </div>
                            <div class="stat">
                                <strong>Time</strong>
                                <span>Unlimited</span>
                            </div>
                        </div>
                        <a href="practice.php?section=picture-analogy" class="btn btn-warning w-100 mt-3">
                            <i class="fas fa-play-circle me-2"></i>Start Practice Session
                        </a>
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
                        <span class="mode-badge">Simulate Real Exams</span>
                    </div>
                    <div class="mode-body">
                        <ul class="mode-features">
                            <li><i class="fas fa-check-circle"></i> 20-minute timer</li>
                            <li><i class="fas fa-check-circle"></i> One question per page</li>
                            <li><i class="fas fa-check-circle"></i> No immediate feedback</li>
                            <li><i class="fas fa-check-circle"></i> Detailed results at end</li>
                            <li><i class="fas fa-check-circle"></i> Performance analytics</li>
                        </ul>
                        <div class="mode-stats">
                            <div class="stat">
                                <strong>Best For</strong>
                                <span>Assessment</span>
                            </div>
                            <div class="stat">
                                <strong>Questions</strong>
                                <span>20 per test</span>
                            </div>
                            <div class="stat">
                                <strong>Time</strong>
                                <span>20 minutes</span>
                            </div>
                        </div>
                        <a href="test.php?section=picture-analogy" class="btn btn-primary w-100 mt-3">
                            <i class="fas fa-stopwatch me-2"></i>Start Test Session
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Progress Preview Section -->
<section class="progress-preview py-5 bg-light" id="progress">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Track Your Progress</h2>
                <p class="section-subtitle">Monitor your improvement across all difficulty levels</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                <div class="progress-card">
                    <div class="progress-visual">
                        <div class="lottie-progress" id="progress-lottie"></div>
                    </div>
                    <div class="progress-stats">
                        <div class="progress-item">
                            <div class="progress-info">
                                <span class="progress-label">Easy Questions</span>
                                <span class="progress-value">85%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill easy" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-info">
                                <span class="progress-label">Medium Questions</span>
                                <span class="progress-value">72%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill medium" style="width: 72%"></div>
                            </div>
                        </div>
                        <div class="progress-item">
                            <div class="progress-info">
                                <span class="progress-label">Hard Questions</span>
                                <span class="progress-value">58%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill hard" style="width: 58%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('layouts/footer.php'); ?>

<!-- Lottie Player Script -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-interactivity@latest/dist/lottie-interactivity.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="scripts/section-intro.js"></script>