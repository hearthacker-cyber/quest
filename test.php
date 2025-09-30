<?php
// test.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Session - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/test.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Test Hero Section -->
    <section class="test-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge">Test Mode</div>
                    <h1 class="hero-title">Challenge Yourself with <span style="color: var(--primary-yellow)">Timed Tests</span></h1>
                    <p class="hero-subtitle">Simulate real exam conditions with our 20-minute timed tests to build confidence and improve time management skills.</p>
                    
                    <div class="test-stats mt-4">
                        <div class="row">
                            <div class="col-4">
                                <h4><i class="fas fa-stopwatch"></i></h4>
                                <p>20 Min Timer</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-tasks"></i></h4>
                                <p>10 Questions</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-chart-bar"></i></h4>
                                <p>Instant Results</p>
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons mt-5">
                        <button class="btn btn-warning me-3" id="start-test-btn">
                            <i class="fas fa-play me-2"></i>Start Test
                        </button>
                        <button class="btn btn-outline-light" id="view-instructions-btn">
                            <i class="fas fa-info-circle me-2"></i>Test Instructions
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="test-hero-image">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow-lg" alt="Student Taking Test">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Test Instructions Section -->
    <section class="test-instructions" id="instructions-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Test Instructions</h2>
                    <p class="section-subtitle">Read carefully before starting your test</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="instructions-card" data-aos="fade-up">
                        <div class="instructions-header">
                            <h3><i class="fas fa-clipboard-list me-2"></i>Important Guidelines</h3>
                        </div>
                        <div class="instructions-body">
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="instruction-content">
                                    <h5>Time Limit</h5>
                                    <p>You have <strong>20 minutes</strong> to complete all 10 questions. The timer will start when you begin the test.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <i class="fas fa-forward"></i>
                                </div>
                                <div class="instruction-content">
                                    <h5>Navigation</h5>
                                    <p>You can move between questions using the Next and Previous buttons. You can also skip questions and return to them later.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="instruction-content">
                                    <h5>Answering Questions</h5>
                                    <p>Select one answer for each question. You can change your answer anytime before submitting the test.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <i class="fas fa-ban"></i>
                                </div>
                                <div class="instruction-content">
                                    <h5>Restrictions</h5>
                                    <p>Once time expires, the test will auto-submit. You cannot pause or restart the test once begun.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="instruction-content">
                                    <h5>Results</h5>
                                    <p>You'll receive immediate results with detailed feedback after submitting the test.</p>
                                </div>
                            </div>
                        </div>
                        <div class="instructions-footer">
                            <button class="btn btn-warning w-100" id="begin-test-btn">
                                <i class="fas fa-play me-2"></i>Begin Test Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Active Test Section -->
    <section class="active-test-section" id="active-test-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Test Header with Timer -->
                    <div class="test-header" data-aos="fade-up">
                        <div class="test-info">
                            <h3>Analogical Reasoning Test</h3>
                            <div class="timer-container">
                                <div class="timer" id="test-timer">
                                    <i class="fas fa-clock me-2"></i>
                                    <span id="minutes">20</span>:<span id="seconds">00</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" id="timer-progress" style="width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Question Progress -->
                    <div class="question-progress" data-aos="fade-up" data-aos-delay="100">
                        <div class="progress-info">
                            <span>Question <strong id="current-question">1</strong> of <strong>10</strong></span>
                            <span id="question-category">Analogical Reasoning</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" id="question-progress-bar" style="width: 10%"></div>
                        </div>
                    </div>

                    <!-- Question Card -->
                    <div class="question-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="question-header">
                            <h3>Complete the Analogy</h3>
                            <span class="difficulty-badge medium">Medium</span>
                        </div>
                        
                        <div class="question-body">
                            <p class="question-text">Doctor is to Hospital as Teacher is to _________</p>
                            
                            <div class="analogy-container">
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <i class="fas fa-user-md fa-3x" style="color: #3498db;"></i>
                                        <div class="image-label">Doctor</div>
                                    </div>
                                    <div class="relationship-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div class="image-box">
                                        <i class="fas fa-hospital fa-3x" style="color: #e74c3c;"></i>
                                        <div class="image-label">Hospital</div>
                                    </div>
                                </div>
                                
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <i class="fas fa-chalkboard-teacher fa-3x" style="color: #9b59b6;"></i>
                                        <div class="image-label">Teacher</div>
                                    </div>
                                    <div class="relationship-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div class="image-box answer-box">
                                        <div class="question-mark">?</div>
                                        <div class="image-label">Your Answer</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Answer Options -->
                            <div class="answer-options">
                                <h5>Choose the correct answer:</h5>
                                <div class="options-grid">
                                    <div class="option-item" data-correct="true">
                                        <i class="fas fa-school fa-2x mb-2" style="color: #3498db;"></i>
                                        <div>School</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-book fa-2x mb-2" style="color: #e67e22;"></i>
                                        <div>Book</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-graduation-cap fa-2x mb-2" style="color: #2ecc71;"></i>
                                        <div>Student</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-pencil-alt fa-2x mb-2" style="color: #e74c3c;"></i>
                                        <div>Pen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="question-navigation" data-aos="fade-up" data-aos-delay="300">
                        <button class="btn btn-outline-primary" id="prev-btn">
                            <i class="fas fa-arrow-left me-2"></i>Previous
                        </button>
                        <button class="btn btn-outline-warning" id="flag-btn">
                            <i class="far fa-flag me-2"></i>Flag Question
                        </button>
                        <button class="btn btn-primary" id="next-btn">
                            Next <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Test Sidebar -->
                <div class="col-lg-4">
                    <div class="test-sidebar">
                        <!-- Question Navigator -->
                        <div class="sidebar-card" data-aos="fade-left">
                            <h5><i class="fas fa-compass me-2"></i>Question Navigator</h5>
                            <div class="question-grid">
                                <?php for($i = 1; $i <= 10; $i++): ?>
                                <div class="question-number <?php echo $i === 1 ? 'current' : ''; ?>" data-question="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </div>
                                <?php endfor; ?>
                            </div>
                            <div class="legend mt-3">
                                <div class="legend-item">
                                    <span class="legend-color current"></span>
                                    <span>Current</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color answered"></span>
                                    <span>Answered</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-color flagged"></span>
                                    <span>Flagged</span>
                                </div>
                            </div>
                        </div>

                        <!-- Test Summary -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="100">
                            <h5><i class="fas fa-chart-pie me-2"></i>Test Summary</h5>
                            <div class="test-summary">
                                <div class="summary-item">
                                    <span>Answered:</span>
                                    <strong id="answered-count">0</strong>/10
                                </div>
                                <div class="summary-item">
                                    <span>Flagged:</span>
                                    <strong id="flagged-count">0</strong>
                                </div>
                                <div class="summary-item">
                                    <span>Time Left:</span>
                                    <strong id="time-left">20:00</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="200">
                            <h5><i class="fas fa-rocket me-2"></i>Quick Actions</h5>
                            <div class="action-buttons">
                                <button class="btn btn-outline-primary btn-sm w-100 mb-2" id="review-btn">
                                    <i class="fas fa-list me-2"></i>Review All
                                </button>
                                <button class="btn btn-warning btn-sm w-100" id="submit-test-btn">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Test
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="results-section" id="results-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Test Results</h2>
                    <p class="section-subtitle">Your performance summary</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="results-card" data-aos="fade-up">
                        <div class="results-header">
                            <h3><i class="fas fa-trophy me-2"></i>Test Completed!</h3>
                            <div class="score-circle">
                                <div class="score-value">85%</div>
                                <div class="score-label">Score</div>
                            </div>
                        </div>
                        <div class="results-body">
                            <div class="results-stats">
                                <div class="stat-item">
                                    <div class="stat-icon correct">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="stat-info">
                                        <div class="stat-value">8</div>
                                        <div class="stat-label">Correct</div>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon incorrect">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <div class="stat-info">
                                        <div class="stat-value">2</div>
                                        <div class="stat-label">Incorrect</div>
                                    </div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-icon time">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div class="stat-info">
                                        <div class="stat-value">18:32</div>
                                        <div class="stat-label">Time Used</div>
                                    </div>
                                </div>
                            </div>

                            <div class="performance-breakdown">
                                <h5>Performance Breakdown</h5>
                                <div class="breakdown-item">
                                    <span>Analogical Reasoning</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 90%"></div>
                                    </div>
                                    <span>90%</span>
                                </div>
                                <div class="breakdown-item">
                                    <span>Logical Reasoning</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 80%"></div>
                                    </div>
                                    <span>80%</span>
                                </div>
                                <div class="breakdown-item">
                                    <span>Pattern Recognition</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 85%"></div>
                                    </div>
                                    <span>85%</span>
                                </div>
                            </div>

                            <div class="results-actions">
                                <button class="btn btn-outline-primary" id="review-answers-btn">
                                    <i class="fas fa-search me-2"></i>Review Answers
                                </button>
                                <button class="btn btn-warning" id="new-test-btn">
                                    <i class="fas fa-redo me-2"></i>Take New Test
                                </button>
                                <button class="btn btn-primary" id="practice-mode-btn">
                                    <i class="fas fa-book me-2"></i>Practice Weak Areas
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Test Features Section -->
    <section class="test-features">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Test Mode Advantages</h2>
                    <p class="section-subtitle">Prepare for real exams with our comprehensive testing features</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <h4>Real Exam Simulation</h4>
                        <p>Experience actual test conditions with timed sessions that help build time management skills and reduce exam anxiety.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Detailed Analytics</h4>
                        <p>Get comprehensive performance reports with insights into your strengths and areas needing improvement.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-flag"></i>
                        </div>
                        <h4>Question Flagging</h4>
                        <p>Mark difficult questions for review and easily navigate back to them before submitting your final answers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/test.js"></script>
</body>
</html>