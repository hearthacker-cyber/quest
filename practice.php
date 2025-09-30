<?php
// practice.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Session - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/practice.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Practice Hero Section -->
    <section class="practice-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge">Practice Mode</div>
                    <h1 class="hero-title">Master Concepts Through <span style="color: var(--primary-yellow)">Practice</span></h1>
                    <p class="hero-subtitle">Unlimited attempts with instant feedback and detailed explanations to help you learn at your own pace.</p>
                    
                    <div class="practice-stats mt-4">
                        <div class="row">
                            <div class="col-4">
                                <h4><i class="fas fa-infinity"></i></h4>
                                <p>Unlimited Practice</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-bolt"></i></h4>
                                <p>Instant Feedback</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-graduation-cap"></i></h4>
                                <p>Learn & Improve</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="practice-hero-image">
                        <img src="https://images.unsplash.com/photo-1580894894513-541e068a3e2b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow-lg" alt="Student Practicing">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Current Question Section -->
    <section class="current-question-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Question Progress -->
                    <div class="question-progress" data-aos="fade-up">
                        <div class="progress-info">
                            <span>Question <strong id="current-question">3</strong> of <strong>10</strong></span>
                            <span>Analogical Reasoning</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" id="question-progress-bar" style="width: 30%"></div>
                        </div>
                    </div>

                    <!-- Question Card -->
                    <div class="question-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="question-header">
                            <h3>Complete the Analogy</h3>
                            <span class="difficulty-badge easy">Easy</span>
                        </div>
                        
                        <div class="question-body">
                            <p class="question-text">Apple is to Fruit as Carrot is to _________</p>
                            
                            <div class="analogy-container">
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <i class="fas fa-apple-alt fa-3x" style="color: #e74c3c;"></i>
                                        <div class="image-label">Apple</div>
                                    </div>
                                    <div class="relationship-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div class="image-box">
                                        <i class="fas fa-apple-alt fa-3x" style="color: #27ae60;"></i>
                                        <div class="image-label">Fruit</div>
                                    </div>
                                </div>
                                
                                <div class="analogy-pair">
                                    <div class="image-box">
                                        <i class="fas fa-carrot fa-3x" style="color: #e67e22;"></i>
                                        <div class="image-label">Carrot</div>
                                    </div>
                                    <div class="relationship-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div class="image-box answer-box" id="answer-box">
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
                                        <i class="fas fa-seedling fa-2x mb-2" style="color: #27ae60;"></i>
                                        <div>Vegetable</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-tree fa-2x mb-2" style="color: #8e44ad;"></i>
                                        <div>Plant</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-leaf fa-2x mb-2" style="color: #2ecc71;"></i>
                                        <div>Leaf</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <i class="fas fa-utensils fa-2x mb-2" style="color: #e74c3c;"></i>
                                        <div>Food</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="question-navigation" data-aos="fade-up" data-aos-delay="200">
                        <button class="btn btn-outline-primary" id="prev-btn">
                            <i class="fas fa-arrow-left me-2"></i>Previous
                        </button>
                        <button class="btn btn-warning" id="check-btn">
                            Check Answer <i class="fas fa-check ms-2"></i>
                        </button>
                        <button class="btn btn-primary" id="next-btn">
                            Next <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="practice-sidebar">
                        <!-- Session Info -->
                        <div class="sidebar-card" data-aos="fade-left">
                            <h5><i class="fas fa-info-circle me-2"></i>Session Info</h5>
                            <div class="session-stats">
                                <div class="stat-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Time Spent: <strong id="time-spent">12:45</strong></span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Correct: <strong id="correct-count">2</strong>/<strong id="total-answered">3</strong></span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-bolt"></i>
                                    <span>Streak: <strong id="streak-count">2</strong></span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="100">
                            <h5><i class="fas fa-rocket me-2"></i>Quick Actions</h5>
                            <div class="action-buttons">
                                <button class="btn btn-outline-primary btn-sm w-100 mb-2" id="hint-btn">
                                    <i class="fas fa-lightbulb me-2"></i>Get Hint
                                </button>
                                <button class="btn btn-outline-primary btn-sm w-100 mb-2" id="explain-btn">
                                    <i class="fas fa-book me-2"></i>Show Explanation
                                </button>
                                <button class="btn btn-outline-warning btn-sm w-100" id="restart-btn">
                                    <i class="fas fa-redo me-2"></i>Restart Session
                                </button>
                            </div>
                        </div>

                        <!-- Progress Overview -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="200">
                            <h5><i class="fas fa-chart-line me-2"></i>Progress Overview</h5>
                            <div class="progress-overview">
                                <div class="progress-item">
                                    <div class="progress-info">
                                        <span class="progress-label">Easy Questions</span>
                                        <span class="progress-value">80%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill easy" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info">
                                        <span class="progress-label">Medium Questions</span>
                                        <span class="progress-value">45%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill medium" style="width: 45%"></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <div class="progress-info">
                                        <span class="progress-label">Hard Questions</span>
                                        <span class="progress-value">20%</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill hard" style="width: 20%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="practice-features">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Practice Mode Benefits</h2>
                    <p class="section-subtitle">Learn effectively with our comprehensive practice features</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-infinity"></i>
                        </div>
                        <h4>Unlimited Attempts</h4>
                        <p>Practice as many times as you need without any restrictions. Master each concept thoroughly before moving forward.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Instant Feedback</h4>
                        <p>Get immediate results and explanations for every question. Understand your mistakes and learn from them instantly.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Progress Tracking</h4>
                        <p>Monitor your improvement with detailed analytics and personalized recommendations for focused learning.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/practice.js"></script>
</body>
</html>