<?php
// final_test.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/final_test.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Final Test Hero Section -->
    <section class="final-test-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="section-badge">Final Assessment</div>
                    <h1 class="hero-title">Comprehensive <span style="color: var(--primary-yellow)">Progress Evaluation</span></h1>
                    <p class="hero-subtitle">Complete assessment to measure your child's learning progress and identify areas for improvement.</p>
                    
                    <div class="final-test-stats mt-4">
                        <div class="row">
                            <div class="col-4">
                                <h4><i class="fas fa-file-alt"></i></h4>
                                <p>Full Assessment</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-chart-bar"></i></h4>
                                <p>Detailed Report</p>
                            </div>
                            <div class="col-4">
                                <h4><i class="fas fa-award"></i></h4>
                                <p>Certificate</p>
                            </div>
                        </div>
                    </div>

                    <div class="action-buttons mt-5">
                        <button class="btn btn-warning me-3" id="start-final-test-btn">
                            <i class="fas fa-play me-2"></i>Begin Assessment
                        </button>
                        <button class="btn btn-outline-light" id="view-sample-report-btn">
                            <i class="fas fa-eye me-2"></i>View Sample Report
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="lottie-animation">
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_ukwu6wtp.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; height: 400px;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Assessment Overview Section -->
    <section class="assessment-overview">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">What This Assessment Covers</h2>
                    <p class="section-subtitle">Comprehensive evaluation across all learning domains</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="domain-card">
                        <div class="domain-icon">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_6wutsrox.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Analogical Reasoning</h4>
                        <p>Pattern recognition and relationship identification skills</p>
                        <div class="domain-stats">
                            <span>15 Questions</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="domain-card">
                        <div class="domain-icon">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Logical Thinking</h4>
                        <p>Critical thinking and problem-solving abilities</p>
                        <div class="domain-stats">
                            <span>12 Questions</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="domain-card">
                        <div class="domain-icon">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_y5dfefqd.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Mathematical Concepts</h4>
                        <p>Number sense and basic mathematical operations</p>
                        <div class="domain-stats">
                            <span>10 Questions</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="domain-card">
                        <div class="domain-icon">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_5tk27f6r.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Verbal Reasoning</h4>
                        <p>Language comprehension and vocabulary skills</p>
                        <div class="domain-stats">
                            <span>8 Questions</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Assessment Instructions -->
    <section class="assessment-instructions" id="instructions-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Final Assessment Guidelines</h2>
                    <p class="section-subtitle">Important information for parents and students</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="instructions-card" data-aos="fade-up">
                        <div class="instructions-header">
                            <h3><i class="fas fa-clipboard-check me-2"></i>Assessment Details</h3>
                        </div>
                        <div class="instructions-body">
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 60px; height: 60px;" 
                                        loop 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="instruction-content">
                                    <h5>Assessment Structure</h5>
                                    <p>This comprehensive assessment contains <strong>45 questions</strong> across 4 domains, with an estimated completion time of <strong>60 minutes</strong>.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_ghvdcpkt.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 60px; height: 60px;" 
                                        loop 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="instruction-content">
                                    <h5>Parent's Role</h5>
                                    <p>Ensure your child is in a quiet environment, well-rested, and has all necessary materials. Provide encouragement but avoid helping with answers.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_vybwn7fb.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 60px; height: 60px;" 
                                        loop 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="instruction-content">
                                    <h5>Breaks & Pacing</h5>
                                    <p>The assessment can be paused once for a 5-minute break. Encourage your child to work steadily but not rush through questions.</p>
                                </div>
                            </div>
                            <div class="instruction-item">
                                <div class="instruction-icon">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_ysrn1w8l.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 60px; height: 60px;" 
                                        loop 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="instruction-content">
                                    <h5>Results & Reporting</h5>
                                    <p>You'll receive a detailed progress report with actionable insights and personalized learning recommendations upon completion.</p>
                                </div>
                            </div>
                        </div>
                        <div class="instructions-footer">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <button class="btn btn-outline-primary w-100" id="back-to-overview-btn">
                                        <i class="fas fa-arrow-left me-2"></i>Back to Overview
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-warning w-100" id="begin-final-test-btn">
                                        <i class="fas fa-play me-2"></i>Begin Assessment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Active Assessment Section -->
    <section class="active-assessment-section" id="active-assessment-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Assessment Header -->
                    <div class="assessment-header" data-aos="fade-up">
                        <div class="assessment-info">
                            <h3>Final Progress Assessment</h3>
                            <div class="domain-indicator">
                                <span class="domain-badge">Analogical Reasoning</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 33%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="timer-container">
                            <div class="timer" id="assessment-timer">
                                <i class="fas fa-clock me-2"></i>
                                <span id="assessment-minutes">60</span>:<span id="assessment-seconds">00</span>
                            </div>
                            <button class="btn btn-outline-warning btn-sm" id="pause-btn">
                                <i class="fas fa-pause me-1"></i>Pause
                            </button>
                        </div>
                    </div>

                    <!-- Question Progress -->
                    <div class="question-progress" data-aos="fade-up" data-aos-delay="100">
                        <div class="progress-info">
                            <span>Question <strong id="current-question">1</strong> of <strong>45</strong></span>
                            <span>Domain <strong id="current-domain">1</strong> of 4</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" id="question-progress-bar" style="width: 2%"></div>
                        </div>
                    </div>

                    <!-- Question Card -->
                    <div class="question-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="question-header">
                            <h3>Complete the Pattern Sequence</h3>
                            <span class="difficulty-badge medium">Medium</span>
                        </div>
                        
                        <div class="question-body">
                            <p class="question-text">What comes next in this sequence?</p>
                            
                            <div class="pattern-sequence">
                                <div class="sequence-items">
                                    <div class="sequence-item">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_2rn9c2jq.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <div class="sequence-item">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_2rn9c2jq.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <div class="sequence-item">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_2rn9c2jq.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 80px; height: 80px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <div class="sequence-arrow">
                                        <i class="fas fa-arrow-right fa-2x"></i>
                                    </div>
                                    <div class="sequence-item answer-box">
                                        <div class="question-mark">?</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Answer Options -->
                            <div class="answer-options">
                                <h5>Choose the correct pattern:</h5>
                                <div class="options-grid">
                                    <div class="option-item" data-correct="true">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_2rn9c2jq.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            autoplay>
                                        </lottie-player>
                                        <div>Pattern A</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_6wutsrox.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            autoplay>
                                        </lottie-player>
                                        <div>Pattern B</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            autoplay>
                                        </lottie-player>
                                        <div>Pattern C</div>
                                    </div>
                                    <div class="option-item" data-correct="false">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_y5dfefqd.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 60px; height: 60px;" 
                                            autoplay>
                                        </lottie-player>
                                        <div>Pattern D</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="question-navigation" data-aos="fade-up" data-aos-delay="300">
                        <button class="btn btn-outline-primary" id="prev-question-btn">
                            <i class="fas fa-arrow-left me-2"></i>Previous
                        </button>
                        <button class="btn btn-outline-warning" id="flag-question-btn">
                            <i class="far fa-flag me-2"></i>Flag
                        </button>
                        <button class="btn btn-primary" id="next-question-btn">
                            Next <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>

                <!-- Assessment Sidebar -->
                <div class="col-lg-4">
                    <div class="assessment-sidebar">
                        <!-- Progress Overview -->
                        <div class="sidebar-card" data-aos="fade-left">
                            <h5><i class="fas fa-chart-pie me-2"></i>Assessment Progress</h5>
                            <div class="progress-overview">
                                <div class="domain-progress">
                                    <span>Analogical Reasoning</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span>0/15</span>
                                </div>
                                <div class="domain-progress">
                                    <span>Logical Thinking</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span>0/12</span>
                                </div>
                                <div class="domain-progress">
                                    <span>Mathematical Concepts</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span>0/10</span>
                                </div>
                                <div class="domain-progress">
                                    <span>Verbal Reasoning</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 0%"></div>
                                    </div>
                                    <span>0/8</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="100">
                            <h5><i class="fas fa-rocket me-2"></i>Quick Actions</h5>
                            <div class="action-buttons">
                                <button class="btn btn-outline-primary btn-sm w-100 mb-2" id="review-all-btn">
                                    <i class="fas fa-list me-2"></i>Review All
                                </button>
                                <button class="btn btn-warning btn-sm w-100" id="submit-assessment-btn">
                                    <i class="fas fa-paper-plane me-2"></i>Submit Assessment
                                </button>
                            </div>
                        </div>

                        <!-- Student Info -->
                        <div class="sidebar-card" data-aos="fade-left" data-aos-delay="200">
                            <h5><i class="fas fa-user-graduate me-2"></i>Student Information</h5>
                            <div class="student-info">
                                <div class="info-item">
                                    <i class="fas fa-user"></i>
                                    <span>Name: <strong>Alex Johnson</strong></span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-grade"></i>
                                    <span>Grade: <strong>3</strong></span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-calendar"></i>
                                    <span>Date: <strong><?php echo date('M j, Y'); ?></strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="final-results-section" id="results-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Assessment Complete!</h2>
                    <p class="section-subtitle">Detailed performance report and recommendations</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="results-card" data-aos="fade-up">
                        <div class="results-header">
                            <div class="certificate-badge">
                                <lottie-player 
                                    src="https://assets1.lottiefiles.com/packages/lf20_vywn5r.json" 
                                    background="transparent" 
                                    speed="1" 
                                    style="width: 100px; height: 100px;" 
                                    autoplay>
                                </lottie-player>
                            </div>
                            <h3>Final Assessment Report</h3>
                            <p class="student-name">Alex Johnson - Grade 3</p>
                        </div>
                        
                        <div class="results-body">
                            <!-- Overall Score -->
                            <div class="overall-score" data-aos="fade-up" data-aos-delay="100">
                                <div class="score-circle">
                                    <div class="score-value">87%</div>
                                    <div class="score-label">Overall Score</div>
                                </div>
                                <div class="score-details">
                                    <div class="detail-item">
                                        <span>Questions Answered</span>
                                        <strong>45/45</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Time Taken</span>
                                        <strong>52:18</strong>
                                    </div>
                                    <div class="detail-item">
                                        <span>Performance Level</span>
                                        <strong class="level-advanced">Advanced</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Domain Breakdown -->
                            <div class="domain-breakdown" data-aos="fade-up" data-aos-delay="200">
                                <h5>Performance by Domain</h5>
                                <div class="breakdown-grid">
                                    <div class="domain-result">
                                        <div class="domain-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_6wutsrox.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="domain-info">
                                            <span>Analogical Reasoning</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 92%"></div>
                                            </div>
                                        </div>
                                        <div class="domain-score">92%</div>
                                    </div>
                                    <div class="domain-result">
                                        <div class="domain-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="domain-info">
                                            <span>Logical Thinking</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 85%"></div>
                                            </div>
                                        </div>
                                        <div class="domain-score">85%</div>
                                    </div>
                                    <div class="domain-result">
                                        <div class="domain-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_y5dfefqd.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="domain-info">
                                            <span>Mathematical Concepts</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 78%"></div>
                                            </div>
                                        </div>
                                        <div class="domain-score">78%</div>
                                    </div>
                                    <div class="domain-result">
                                        <div class="domain-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_5tk27f6r.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="domain-info">
                                            <span>Verbal Reasoning</span>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 95%"></div>
                                            </div>
                                        </div>
                                        <div class="domain-score">95%</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recommendations -->
                            <div class="recommendations" data-aos="fade-up" data-aos-delay="300">
                                <h5>Learning Recommendations</h5>
                                <div class="recommendation-cards">
                                    <div class="recommendation-card">
                                        <div class="rec-icon">
                                            <i class="fas fa-calculator"></i>
                                        </div>
                                        <div class="rec-content">
                                            <h6>Focus on Mathematical Concepts</h6>
                                            <p>Practice basic operations and number patterns to strengthen foundational math skills.</p>
                                        </div>
                                    </div>
                                    <div class="recommendation-card">
                                        <div class="rec-icon">
                                            <i class="fas fa-puzzle-piece"></i>
                                        </div>
                                        <div class="rec-content">
                                            <h6>Advanced Logical Puzzles</h6>
                                            <p>Challenge with complex pattern recognition and sequencing exercises.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="results-actions" data-aos="fade-up" data-aos-delay="400">
                                <button class="btn btn-outline-primary" id="download-report-btn">
                                    <i class="fas fa-download me-2"></i>Download Full Report
                                </button>
                                <button class="btn btn-warning" id="print-certificate-btn">
                                    <i class="fas fa-print me-2"></i>Print Certificate
                                </button>
                                <button class="btn btn-primary" id="new-assessment-btn">
                                    <i class="fas fa-redo me-2"></i>New Assessment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sample Report Section -->
    <section class="sample-report-section" id="sample-report-section" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Sample Assessment Report</h2>
                    <p class="section-subtitle">See what you'll receive after completing the assessment</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="sample-report-card" data-aos="fade-up">
                        <div class="report-preview">
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 200px; height: 200px;" 
                                autoplay>
                            </lottie-player>
                            <h4>Comprehensive Progress Report</h4>
                            <p>Your detailed report will include:</p>
                            <ul class="report-features">
                                <li><i class="fas fa-check text-success me-2"></i>Domain-wise performance analysis</li>
                                <li><i class="fas fa-check text-success me-2"></i>Strengths and areas for improvement</li>
                                <li><i class="fas fa-check text-success me-2"></i>Personalized learning recommendations</li>
                                <li><i class="fas fa-check text-success me-2"></i>Progress tracking over time</li>
                                <li><i class="fas fa-check text-success me-2"></i>Printable certificate of completion</li>
                            </ul>
                        </div>
                        <div class="report-actions">
                            <button class="btn btn-outline-primary" id="close-sample-btn">
                                <i class="fas fa-arrow-left me-2"></i>Back to Assessment
                            </button>
                            <button class="btn btn-warning" id="start-from-sample-btn">
                                <i class="fas fa-play me-2"></i>Start Assessment Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/final_test.js"></script>
</body>
</html>