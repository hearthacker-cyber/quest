<?php
// parent_profile.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Dashboard - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/parent_profile.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Parent Hero Section -->
    <section class="parent-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8" data-aos="fade-right">
                    <div class="parent-header">
                        <div class="parent-avatar-section">
                            <div class="avatar">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Parent Avatar" class="avatar-img">
                                <div class="online-status"></div>
                            </div>
                            <div class="parent-info">
                                <h1 class="parent-name">Sarah Johnson</h1>
                                <p class="parent-role">Proud Parent & Learning Partner</p>
                                <div class="parent-badges">
                                    <span class="badge badge-primary">Active Supporter</span>
                                    <span class="badge badge-success">Progress Tracker</span>
                                    <span class="badge badge-warning">Learning Coach</span>
                                </div>
                            </div>
                        </div>
                        <div class="parent-stats">
                            <div class="row g-3">
                                <div class="col-6 col-sm-3">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat-number">2</div>
                                            <div class="stat-label">Children</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_hl5n0bwb.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat-number">156</div>
                                            <div class="stat-label">Hours Tracked</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_vywn5r.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat-number">24</div>
                                            <div class="stat-label">Reports Viewed</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_ysrn1w8l.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat-number">87%</div>
                                            <div class="stat-label">Avg. Progress</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="lottie-animation">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_6wutsrox.json" 
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

    <!-- Parent Dashboard Content -->
    <section class="parent-dashboard">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-12 col-lg-4 order-2 order-lg-1">
                    <div class="parent-sidebar">
                        <!-- Children Overview -->
                        <div class="sidebar-card" data-aos="fade-right">
                            <h5><i class="fas fa-users me-2"></i>My Children</h5>
                            <div class="children-list">
                                <div class="child-item active">
                                    <div class="child-avatar">
                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Alex Johnson">
                                    </div>
                                    <div class="child-info">
                                        <div class="child-name">Alex Johnson</div>
                                        <div class="child-grade">Grade 3</div>
                                        <div class="child-progress">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 87%"></div>
                                            </div>
                                            <span>87%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="child-item">
                                    <div class="child-avatar">
                                        <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Emma Johnson">
                                    </div>
                                    <div class="child-info">
                                        <div class="child-name">Emma Johnson</div>
                                        <div class="child-grade">Grade 1</div>
                                        <div class="child-progress">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 72%"></div>
                                            </div>
                                            <span>72%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary btn-sm w-100 mt-3" id="add-child-btn">
                                <i class="fas fa-plus me-2"></i>Add Another Child
                            </button>
                        </div>

                        <!-- Quick Actions -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="100">
                            <h5><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                            <div class="quick-actions">
                                <button class="action-btn" id="view-reports-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>View Progress Reports</span>
                                </button>
                                <button class="action-btn" id="set-goals-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_ghvdcpkt.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>Set Learning Goals</span>
                                </button>
                                <button class="action-btn" id="schedule-test-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_vybwn7fb.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>Schedule Assessment</span>
                                </button>
                                <button class="action-btn" id="contact-teacher-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_ysrn1w8l.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>Contact Teacher</span>
                                </button>
                            </div>
                        </div>

                        <!-- Subscription Status -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="200">
                            <h5><i class="fas fa-crown me-2"></i>Subscription</h5>
                            <div class="subscription-status">
                                <div class="subscription-info">
                                    <div class="plan-name">Family Plan</div>
                                    <div class="plan-desc">Up to 3 children</div>
                                    <div class="plan-status active">Active</div>
                                </div>
                                <div class="subscription-details">
                                    <div class="detail-item">
                                        <span>Renews on:</span>
                                        <strong>Dec 15, 2024</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Children:</span>
                                        <strong>2/3</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Price:</span>
                                        <strong>$25/month</strong>
                                    </div>
                                </div>
                                <button class="btn btn-warning btn-sm w-100 mt-3" id="manage-subscription-btn">
                                    <i class="fas fa-cog me-2"></i>Manage Subscription
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-12 col-lg-8 order-1 order-lg-2">
                    <!-- Progress Overview -->
                    <div class="content-section" data-aos="fade-up">
                        <div class="section-header">
                            <h3><i class="fas fa-chart-line me-2"></i>Children's Progress Overview</h3>
                            <div class="time-filter">
                                <select class="form-select form-select-sm">
                                    <option>Last Week</option>
                                    <option>Last Month</option>
                                    <option selected>Last 3 Months</option>
                                    <option>All Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="progress-overview">
                            <div class="child-progress-chart">
                                <div class="chart-header">
                                    <h6>Alex Johnson - Grade 3</h6>
                                    <span>Overall Progress: 87%</span>
                                </div>
                                <div class="subject-progress">
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Mathematics</span>
                                            <strong>82%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 82%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Reading</span>
                                            <strong>91%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 91%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Science</span>
                                            <strong>78%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 78%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Logic</span>
                                            <strong>95%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 95%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="child-progress-chart">
                                <div class="chart-header">
                                    <h6>Emma Johnson - Grade 1</h6>
                                    <span>Overall Progress: 72%</span>
                                </div>
                                <div class="subject-progress">
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Mathematics</span>
                                            <strong>68%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 68%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Reading</span>
                                            <strong>85%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Science</span>
                                            <strong>65%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 65%"></div>
                                        </div>
                                    </div>
                                    <div class="subject-item">
                                        <div class="subject-info">
                                            <span>Logic</span>
                                            <strong>70%</strong>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 70%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-header">
                            <h3><i class="fas fa-history me-2"></i>Recent Family Activity</h3>
                        </div>
                        <div class="family-activity">
                            <div class="activity-item">
                                <div class="activity-avatar">
                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Alex">
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">
                                        <strong>Alex</strong> completed Final Assessment
                                    </div>
                                    <div class="activity-desc">Scored 87% in comprehensive progress evaluation</div>
                                    <div class="activity-time">2 hours ago</div>
                                </div>
                                <div class="activity-badge success">
                                    <i class="fas fa-trophy"></i>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar">
                                    <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Emma">
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">
                                        <strong>Emma</strong> earned new badge
                                    </div>
                                    <div class="activity-desc">"Reading Star" for completing 20 books</div>
                                    <div class="activity-time">1 day ago</div>
                                </div>
                                <div class="activity-badge warning">
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-avatar">
                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="Sarah">
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title">
                                        <strong>You</strong> viewed progress report
                                    </div>
                                    <div class="activity-desc">Reviewed Alex's mathematics performance</div>
                                    <div class="activity-time">2 days ago</div>
                                </div>
                                <div class="activity-badge info">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Assessments -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="200">
                        <div class="section-header">
                            <h3><i class="fas fa-calendar-alt me-2"></i>Upcoming Assessments</h3>
                        </div>
                        <div class="upcoming-assessments">
                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <div class="assessment-info">
                                        <h6>Quarterly Progress Test</h6>
                                        <span class="child-name">Alex Johnson</span>
                                    </div>
                                    <div class="assessment-date">
                                        <div class="date-badge">
                                            <i class="fas fa-calendar me-1"></i>Dec 15, 2024
                                        </div>
                                    </div>
                                </div>
                                <p>Comprehensive evaluation covering all subjects from this quarter</p>
                                <div class="assessment-actions">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </button>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-bell me-1"></i>Set Reminder
                                    </button>
                                </div>
                            </div>
                            <div class="assessment-card">
                                <div class="assessment-header">
                                    <div class="assessment-info">
                                        <h6>Reading Comprehension Test</h6>
                                        <span class="child-name">Emma Johnson</span>
                                    </div>
                                    <div class="assessment-date">
                                        <div class="date-badge">
                                            <i class="fas fa-calendar me-1"></i>Dec 20, 2024
                                        </div>
                                    </div>
                                </div>
                                <p>Focus on reading speed and comprehension skills assessment</p>
                                <div class="assessment-actions">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>View Details
                                    </button>
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-bell me-1"></i>Set Reminder
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Parent CTA Section -->
    <section class="parent-cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8" data-aos="fade-right">
                    <h3>Need Help with Your Child's Learning Journey?</h3>
                    <p>Our education specialists are here to support you every step of the way.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <div class="cta-buttons">
                        <button class="btn btn-warning me-2 mb-2 mb-lg-0" id="contact-support-btn">
                            <i class="fas fa-headset me-2"></i>Contact Support
                        </button>
                        <button class="btn btn-outline-light" id="schedule-call-btn">
                            <i class="fas fa-phone me-2"></i>Schedule Call
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
    <script src="scripts/parent_profile.js"></script>
</body>
</html>