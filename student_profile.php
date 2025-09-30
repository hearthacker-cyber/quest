<?php
// student_profile.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/student_profile.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Profile Hero Section -->
    <section class="profile-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="profile-header">
                        <div class="avatar-section">
                            <div class="avatar">
                                <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Student Avatar" class="avatar-img">
                                <div class="online-status"></div>
                            </div>
                            <div class="profile-info">
                                <h1 class="student-name">Alex Johnson</h1>
                                <p class="student-grade">Grade 3 Student</p>
                                <div class="badges">
                                    <span class="badge badge-primary">Math Whiz</span>
                                    <span class="badge badge-success">Reading Pro</span>
                                    <span class="badge badge-warning">Critical Thinker</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number">87%</div>
                                <div class="stat-label">Overall Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">156</div>
                                <div class="stat-label">Questions Solved</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">12</div>
                                <div class="stat-label">Tests Completed</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">5</div>
                                <div class="stat-label">Streak Days</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="lottie-animation">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_hl5n0bwb.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; height: 300px;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Content Section -->
    <section class="profile-content">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-lg-4">
                    <div class="profile-sidebar">
                        <!-- Quick Stats -->
                        <div class="sidebar-card" data-aos="fade-right">
                            <h5><i class="fas fa-chart-line me-2"></i>Quick Stats</h5>
                            <div class="quick-stats">
                                <div class="quick-stat">
                                    <i class="fas fa-trophy" style="color: var(--primary-yellow);"></i>
                                    <div>
                                        <div class="value">Top 15%</div>
                                        <div class="label">National Rank</div>
                                    </div>
                                </div>
                                <div class="quick-stat">
                                    <i class="fas fa-bolt" style="color: var(--accent-orange);"></i>
                                    <div>
                                        <div class="value">3 Days</div>
                                        <div class="label">Learning Streak</div>
                                    </div>
                                </div>
                                <div class="quick-stat">
                                    <i class="fas fa-star" style="color: var(--accent-purple);"></i>
                                    <div>
                                        <div class="value">245</div>
                                        <div class="label">Points Earned</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Achievements -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="100">
                            <h5><i class="fas fa-award me-2"></i>Recent Achievements</h5>
                            <div class="achievements-list">
                                <div class="achievement-item">
                                    <div class="achievement-icon">
                                        <i class="fas fa-brain"></i>
                                    </div>
                                    <div class="achievement-info">
                                        <div class="achievement-title">Critical Thinker</div>
                                        <div class="achievement-desc">Solved 50 hard questions</div>
                                        <div class="achievement-date">2 days ago</div>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-icon">
                                        <i class="fas fa-rocket"></i>
                                    </div>
                                    <div class="achievement-info">
                                        <div class="achievement-title">Fast Learner</div>
                                        <div class="achievement-desc">Completed test in record time</div>
                                        <div class="achievement-date">1 week ago</div>
                                    </div>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-icon">
                                        <i class="fas fa-puzzle-piece"></i>
                                    </div>
                                    <div class="achievement-info">
                                        <div class="achievement-title">Pattern Master</div>
                                        <div class="achievement-desc">Perfect score in analogies</div>
                                        <div class="achievement-date">2 weeks ago</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Learning Goals -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="200">
                            <h5><i class="fas fa-bullseye me-2"></i>Learning Goals</h5>
                            <div class="goals-list">
                                <div class="goal-item">
                                    <div class="goal-progress">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 75%"></div>
                                        </div>
                                        <span>75%</span>
                                    </div>
                                    <div class="goal-info">
                                        <div class="goal-title">Complete Grade 3 Math</div>
                                        <div class="goal-subtitle">15/20 topics mastered</div>
                                    </div>
                                </div>
                                <div class="goal-item">
                                    <div class="goal-progress">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 40%"></div>
                                        </div>
                                        <span>40%</span>
                                    </div>
                                    <div class="goal-info">
                                        <div class="goal-title">Improve Reading Speed</div>
                                        <div class="goal-subtitle">Read 20 books this month</div>
                                    </div>
                                </div>
                                <div class="goal-item">
                                    <div class="goal-progress">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 90%"></div>
                                        </div>
                                        <span>90%</span>
                                    </div>
                                    <div class="goal-info">
                                        <div class="goal-title">Master Logical Reasoning</div>
                                        <div class="goal-subtitle">Solve 100 pattern questions</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-8">
                    <!-- Performance Overview -->
                    <div class="content-section" data-aos="fade-up">
                        <div class="section-header">
                            <h3><i class="fas fa-chart-bar me-2"></i>Performance Overview</h3>
                            <div class="time-filter">
                                <select class="form-select form-select-sm">
                                    <option>Last 7 Days</option>
                                    <option>Last 30 Days</option>
                                    <option selected>Last 3 Months</option>
                                    <option>All Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="performance-cards">
                            <div class="performance-card">
                                <div class="performance-icon math">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <div class="performance-info">
                                    <div class="performance-title">Mathematics</div>
                                    <div class="performance-score">82%</div>
                                    <div class="performance-trend up">
                                        <i class="fas fa-arrow-up"></i> 5% from last month
                                    </div>
                                </div>
                            </div>
                            <div class="performance-card">
                                <div class="performance-icon reading">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="performance-info">
                                    <div class="performance-title">Reading</div>
                                    <div class="performance-score">91%</div>
                                    <div class="performance-trend up">
                                        <i class="fas fa-arrow-up"></i> 8% from last month
                                    </div>
                                </div>
                            </div>
                            <div class="performance-card">
                                <div class="performance-icon science">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <div class="performance-info">
                                    <div class="performance-title">Science</div>
                                    <div class="performance-score">78%</div>
                                    <div class="performance-trend down">
                                        <i class="fas fa-arrow-down"></i> 2% from last month
                                    </div>
                                </div>
                            </div>
                            <div class="performance-card">
                                <div class="performance-icon logic">
                                    <i class="fas fa-puzzle-piece"></i>
                                </div>
                                <div class="performance-info">
                                    <div class="performance-title">Logic</div>
                                    <div class="performance-score">95%</div>
                                    <div class="performance-trend up">
                                        <i class="fas fa-arrow-up"></i> 12% from last month
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Charts -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-header">
                            <h3><i class="fas fa-chart-line me-2"></i>Learning Progress</h3>
                        </div>
                        <div class="progress-charts">
                            <div class="chart-container">
                                <div class="chart-header">
                                    <h6>Weekly Activity</h6>
                                    <span>Questions Solved</span>
                                </div>
                                <div class="chart-bars">
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 70%"></div>
                                        <span>Mon</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 85%"></div>
                                        <span>Tue</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 60%"></div>
                                        <span>Wed</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 95%"></div>
                                        <span>Thu</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 75%"></div>
                                        <span>Fri</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 50%"></div>
                                        <span>Sat</span>
                                    </div>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: 40%"></div>
                                        <span>Sun</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="200">
                        <div class="section-header">
                            <h3><i class="fas fa-history me-2"></i>Recent Activity</h3>
                        </div>
                        <div class="activity-timeline">
                            <div class="activity-item">
                                <div class="activity-icon completed">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Completed Practice Test</div>
                                    <div class="activity-desc">Analogical Reasoning - Score: 92%</div>
                                    <div class="activity-time">2 hours ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon earned">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Earned New Badge</div>
                                    <div class="activity-desc">"Math Wizard" for solving 100 math problems</div>
                                    <div class="activity-time">1 day ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon studied">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Studied New Topic</div>
                                    <div class="activity-desc">Pattern Recognition - Advanced Level</div>
                                    <div class="activity-time">2 days ago</div>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon test">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">Took Final Assessment</div>
                                    <div class="activity-desc">Overall Score: 87% - Great improvement!</div>
                                    <div class="activity-time">3 days ago</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Goals -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header">
                            <h3><i class="fas fa-flag me-2"></i>Upcoming Goals</h3>
                        </div>
                        <div class="upcoming-goals">
                            <div class="goal-card">
                                <div class="goal-header">
                                    <h6>Master Multiplication</h6>
                                    <span class="goal-due">Due: 3 days</span>
                                </div>
                                <p>Complete multiplication tables up to 12x12</p>
                                <div class="goal-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 65%"></div>
                                    </div>
                                    <span>65% complete</span>
                                </div>
                            </div>
                            <div class="goal-card">
                                <div class="goal-header">
                                    <h6>Reading Challenge</h6>
                                    <span class="goal-due">Due: 1 week</span>
                                </div>
                                <p>Read and comprehend 5 new storybooks</p>
                                <div class="goal-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                    <span>40% complete</span>
                                </div>
                            </div>
                            <div class="goal-card">
                                <div class="goal-header">
                                    <h6>Science Project</h6>
                                    <span class="goal-due">Due: 2 weeks</span>
                                </div>
                                <p>Complete plant growth observation experiment</p>
                                <div class="goal-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 20%"></div>
                                    </div>
                                    <span>20% complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="profile-cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h3>Ready to Continue Learning?</h3>
                    <p>Keep building your skills and unlock new achievements!</p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <div class="cta-buttons">
                        <button class="btn btn-warning me-2" id="practice-now-btn">
                            <i class="fas fa-play me-2"></i>Practice Now
                        </button>
                        <button class="btn btn-outline-light" id="take-test-btn">
                            <i class="fas fa-file-alt me-2"></i>Take Test
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/student_profile.js"></script>
</body>
</html>