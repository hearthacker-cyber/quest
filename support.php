<!-- File: support.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/support.css">
</head>
<body>
    <?php include_once('layouts/header.php'); ?>

    <!-- Support Hero Section -->
        <!-- Support Hero Section - Fixed -->
    <section class="support-hero-section">
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
                    <h1 class="hero-title">We're Here to <span style="color: var(--primary-yellow)">Help</span></h1>
                    <p class="hero-subtitle">Get the support you need to make the most of QUEST learning platform. Our team is dedicated to ensuring your success and your child's learning journey.</p>
                    
                    <div class="support-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <h4>24/7</h4>
                                        <p>Support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-check-circle"></i>
                                    <div>
                                        <h4>98%</h4>
                                        <p>Resolution</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-smile"></i>
                                    <div>
                                        <h4>4.9/5</h4>
                                        <p>Rating</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-buttons mt-4">
                        <a href="#support-options" class="btn btn-warning me-3">Get Help Now</a>
                        <a href="faq.php" class="btn btn-outline-light">Browse FAQ</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; max-width: 400px; height: auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Help Section -->
    <section class="quick-help-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Quick Help Resources</h2>
                    <p class="section-subtitle">Find instant solutions to common issues</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="help-card">
                        <div class="help-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d2a.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Knowledge Base</h4>
                        <p>Browse our comprehensive library of articles and tutorials</p>
                        <a href="faq.php" class="btn btn-outline-primary">Explore Articles</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="help-card">
                        <div class="help-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_aw5kkcwe.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Video Tutorials</h4>
                        <p>Watch step-by-step guides for using QUEST features</p>
                        <a href="#" class="btn btn-outline-primary">Watch Videos</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="help-card">
                        <div class="help-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Community Forum</h4>
                        <p>Connect with other parents and share experiences</p>
                        <a href="#" class="btn btn-outline-primary">Join Community</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Options Section -->
    <section class="support-options-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Get Support</h2>
                    <p class="section-subtitle">Choose the support option that works best for you</p>
                </div>
            </div>
            <div class="row">
                <!-- Live Chat -->
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="support-option-card">
                        <div class="option-header">
                            <div class="option-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h4>Live Chat</h4>
                            <div class="status-badge online">Online Now</div>
                        </div>
                        <div class="option-body">
                            <p>Get instant help from our support team through live chat. Average response time: 2 minutes.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success"></i> Available 24/7</li>
                                <li><i class="fas fa-check text-success"></i> File sharing enabled</li>
                                <li><i class="fas fa-check text-success"></i> Screen sharing available</li>
                            </ul>
                            <button class="btn btn-primary w-100 start-chat-btn">
                                <i class="fas fa-comment-dots me-2"></i>Start Chat
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Email Support -->
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="support-option-card">
                        <div class="option-header">
                            <div class="option-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Email Support</h4>
                            <div class="status-badge">Response in 2h</div>
                        </div>
                        <div class="option-body">
                            <p>Send us a detailed message and we'll get back to you with a comprehensive solution.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success"></i> Detailed responses</li>
                                <li><i class="fas fa-check text-success"></i> Attachment support</li>
                                <li><i class="fas fa-check text-success"></i> Follow-up tracking</li>
                            </ul>
                            <a href="contact.php" class="btn btn-outline-primary w-100">
                                <i class="fas fa-envelope me-2"></i>Send Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Phone Support -->
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="support-option-card highlighted">
                        <div class="option-header">
                            <div class="option-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Phone Support</h4>
                            <div class="status-badge">Available Now</div>
                        </div>
                        <div class="option-body">
                            <p>Speak directly with our support specialists for immediate assistance.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check text-success"></i> Mon-Fri 9am-6pm EST</li>
                                <li><i class="fas fa-check text-success"></i> Quick issue resolution</li>
                                <li><i class="fas fa-check text-success"></i> Personalized guidance</li>
                            </ul>
                            <div class="phone-info text-center mb-3">
                                <h5 class="text-warning">+1 (555) 123-4567</h5>
                                <small class="text-muted">Current wait time: &lt; 5 minutes</small>
                            </div>
                            <button class="btn btn-warning w-100 call-support-btn">
                                <i class="fas fa-phone me-2"></i>Call Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Common Issues Section -->
    <section class="common-issues-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Common Issues & Solutions</h2>
                    <p class="section-subtitle">Quick fixes for frequent problems</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="issue-card">
                        <div class="issue-header">
                            <i class="fas fa-sign-in-alt"></i>
                            <h5>Login Problems</h5>
                            <span class="issue-tag common">Common</span>
                        </div>
                        <div class="issue-body">
                            <p>Having trouble accessing your account?</p>
                            <div class="solution-steps">
                                <div class="step">
                                    <span class="step-number">1</span>
                                    <div class="step-content">
                                        <strong>Reset Password</strong>
                                        <p>Click "Forgot Password" on the login page</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">2</span>
                                    <div class="step-content">
                                        <strong>Clear Browser Cache</strong>
                                        <p>Clear your browser's cache and cookies</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">3</span>
                                    <div class="step-content">
                                        <strong>Try Different Browser</strong>
                                        <p>Switch to Chrome, Firefox, or Safari</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary view-solution-btn">View Detailed Solution</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="issue-card">
                        <div class="issue-header">
                            <i class="fas fa-tachometer-alt"></i>
                            <h5>Slow Performance</h5>
                            <span class="issue-tag common">Common</span>
                        </div>
                        <div class="issue-body">
                            <p>QUEST is running slower than usual?</p>
                            <div class="solution-steps">
                                <div class="step">
                                    <span class="step-number">1</span>
                                    <div class="step-content">
                                        <strong>Check Internet Connection</strong>
                                        <p>Ensure stable internet with 5+ Mbps speed</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">2</span>
                                    <div class="step-content">
                                        <strong>Close Other Tabs</strong>
                                        <p>Close unnecessary browser tabs and apps</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">3</span>
                                    <div class="step-content">
                                        <strong>Update Browser</strong>
                                        <p>Use the latest version of your browser</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary view-solution-btn">View Detailed Solution</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="issue-card">
                        <div class="issue-header">
                            <i class="fas fa-video"></i>
                            <h5>Audio/Video Issues</h5>
                            <span class="issue-tag occasional">Occasional</span>
                        </div>
                        <div class="issue-body">
                            <p>Problems with sound or video playback?</p>
                            <div class="solution-steps">
                                <div class="step">
                                    <span class="step-number">1</span>
                                    <div class="step-content">
                                        <strong>Check Device Volume</strong>
                                        <p>Ensure your device volume is turned up</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">2</span>
                                    <div class="step-content">
                                        <strong>Browser Permissions</strong>
                                        <p>Allow microphone/camera in browser settings</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">3</span>
                                    <div class="step-content">
                                        <strong>Update Drivers</strong>
                                        <p>Update audio and graphics drivers</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary view-solution-btn">View Detailed Solution</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="issue-card">
                        <div class="issue-header">
                            <i class="fas fa-sync-alt"></i>
                            <h5>Progress Not Saving</h5>
                            <span class="issue-tag rare">Rare</span>
                        </div>
                        <div class="issue-body">
                            <p>Child's progress isn't being saved?</p>
                            <div class="solution-steps">
                                <div class="step">
                                    <span class="step-number">1</span>
                                    <div class="step-content">
                                        <strong>Check Internet Connection</strong>
                                        <p>Ensure stable internet during sessions</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">2</span>
                                    <div class="step-content">
                                        <strong>Refresh Page</strong>
                                        <p>Refresh the browser and check again</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">3</span>
                                    <div class="step-content">
                                        <strong>Contact Support</strong>
                                        <p>Our team can restore lost progress</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary view-solution-btn">View Detailed Solution</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Status Section -->
    <section class="status-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">System Status</h2>
                    <p class="section-subtitle">Real-time updates on our platform's performance</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="status-card" data-aos="fade-up">
                        <div class="status-header">
                            <h4>Platform Status</h4>
                            <div class="status-indicator operational">
                                <span class="status-dot"></span>
                                All Systems Operational
                            </div>
                        </div>
                        <div class="status-body">
                            <div class="status-item">
                                <div class="service-name">
                                    <i class="fas fa-check-circle text-success"></i>
                                    Website & Login
                                </div>
                                <div class="service-status operational">Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="service-name">
                                    <i class="fas fa-check-circle text-success"></i>
                                    Learning Modules
                                </div>
                                <div class="service-status operational">Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="service-name">
                                    <i class="fas fa-check-circle text-success"></i>
                                    Progress Tracking
                                </div>
                                <div class="service-status operational">Operational</div>
                            </div>
                            <div class="status-item">
                                <div class="service-name">
                                    <i class="fas fa-check-circle text-success"></i>
                                    Payment System
                                </div>
                                <div class="service-status operational">Operational</div>
                            </div>
                        </div>
                        <div class="status-footer">
                            <small class="text-muted">Last updated: <span id="lastUpdated">Just now</span></small>
                            <button class="btn btn-sm btn-outline-primary refresh-status-btn">
                                <i class="fas fa-sync-alt"></i> Refresh
                            </button>
                        </div>
                    </div>

                    <!-- Maintenance Schedule -->
                    <div class="maintenance-card mt-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="maintenance-header">
                            <h5><i class="fas fa-tools me-2"></i>Scheduled Maintenance</h5>
                        </div>
                        <div class="maintenance-body">
                            <div class="maintenance-item">
                                <div class="maintenance-date">
                                    <strong>March 20, 2024</strong>
                                    <span>2:00 AM - 4:00 AM EST</span>
                                </div>
                                <div class="maintenance-details">
                                    <p>Platform updates and performance improvements. Minimal disruption expected.</p>
                                </div>
                            </div>
                            <div class="maintenance-item">
                                <div class="maintenance-date">
                                    <strong>April 5, 2024</strong>
                                    <span>3:00 AM - 5:00 AM EST</span>
                                </div>
                                <div class="maintenance-details">
                                    <p>New feature deployment and security updates.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Support CTA -->
    <section class="support-cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="mb-3">Still Need Help?</h2>
                    <p class="mb-4">Our dedicated support team is ready to assist you with any questions or technical issues.</p>
                    <div class="support-features">
                        <div class="support-feature">
                            <i class="fas fa-shield-alt text-warning"></i>
                            <span>Secure & Confidential</span>
                        </div>
                        <div class="support-feature">
                            <i class="fas fa-graduation-cap text-warning"></i>
                            <span>Education Experts</span>
                        </div>
                        <div class="support-feature">
                            <i class="fas fa-heart text-warning"></i>
                            <span>Family-Focused Support</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="cta-animation mb-4">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 150px; height: 150px;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                    <a href="contact.php" class="btn btn-warning btn-lg me-3">Contact Support</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/support.js"></script>
</body>
</html>