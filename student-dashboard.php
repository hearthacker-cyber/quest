<?php
session_start();

// Database configuration
$servername = "srv1837.hstgr.io";
$username = "u329947844_quest";
$password = "Ariharan@2025";
$dbname = "u329947844_quest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get student ID from session or URL parameter
$student_id = isset($_GET['id']) ? intval($_GET['id']) : (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1);

// Fetch student data
function getStudentData($conn, $student_id) {
    $sql = "SELECT * FROM users WHERE id = ? AND role = 'student'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }
    return null;
}

// Fetch student statistics
function getStudentStats($conn, $student_id) {
    $stats = [
        'overall_score' => 0,
        'questions_solved' => 0,
        'tests_completed' => 0,
        'streak_days' => 0,
        'points_earned' => 0,
        'national_rank' => 'Top 15%'
    ];
    
    // Overall score (average of all test scores)
    $sql = "SELECT AVG(score) as avg_score FROM test_results WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['overall_score'] = round($row['avg_score'] ?? 0);
    }
    
    // Questions solved
    $sql = "SELECT COUNT(*) as count FROM user_answers WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['questions_solved'] = $row['count'];
    }
    
    // Tests completed
    $sql = "SELECT COUNT(*) as count FROM test_results WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['tests_completed'] = $row['count'];
    }
    
    // Streak days (you'll need to implement this logic based on your activity tracking)
    $stats['streak_days'] = 3; // Placeholder
    
    // Points earned
    $sql = "SELECT SUM(points_earned) as total_points FROM user_points WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stats['points_earned'] = $row['total_points'] ?? 0;
    }
    
    return $stats;
}

// Fetch subject performance
function getSubjectPerformance($conn, $student_id) {
    $subjects = ['Mathematics', 'Reading', 'Science', 'Logic'];
    $performance = [];
    
    foreach ($subjects as $subject) {
        $sql = "SELECT AVG(score) as avg_score FROM test_results 
                WHERE user_id = ? AND subject = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $student_id, $subject);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $score = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $score = round($row['avg_score'] ?? 0);
        }
        
        $performance[] = [
            'subject' => $subject,
            'score' => $score,
            'trend' => 'up', // You can calculate this based on previous scores
            'change' => rand(2, 12) // Placeholder
        ];
    }
    
    return $performance;
}

// Fetch recent activity
function getRecentActivity($conn, $student_id) {
    $activities = [];
    
    // Get recent test results
    $sql = "SELECT test_name, score, subject, completed_at FROM test_results 
            WHERE user_id = ? ORDER BY completed_at DESC LIMIT 4";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $activities[] = [
            'type' => 'test',
            'title' => 'Completed ' . $row['test_name'],
            'description' => $row['subject'] . ' - Score: ' . $row['score'] . '%',
            'time' => $row['completed_at'],
            'icon' => 'file-alt'
        ];
    }
    
    // Add some placeholder achievements (you'll need to implement achievements system)
    $achievements = [
        ['type' => 'achievement', 'title' => 'Earned New Badge', 'description' => '"Math Wizard" for solving 100 math problems', 'time' => '1 day ago', 'icon' => 'star'],
        ['type' => 'study', 'title' => 'Studied New Topic', 'description' => 'Pattern Recognition - Advanced Level', 'time' => '2 days ago', 'icon' => 'book']
    ];
    
    return array_merge($activities, $achievements);
}

// Fetch learning goals
function getLearningGoals($conn, $student_id) {
    $goals = [];
    
    $sql = "SELECT goal_title, goal_description, progress, due_date FROM learning_goals 
            WHERE user_id = ? AND status = 'active' ORDER BY due_date ASC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $goals[] = $row;
        }
    } else {
        // Default goals if none exist
        $goals = [
            ['goal_title' => 'Master Multiplication', 'goal_description' => 'Complete multiplication tables up to 12x12', 'progress' => 65, 'due_date' => '3 days'],
            ['goal_title' => 'Reading Challenge', 'goal_description' => 'Read and comprehend 5 new storybooks', 'progress' => 40, 'due_date' => '1 week'],
            ['goal_title' => 'Science Project', 'goal_description' => 'Complete plant growth observation experiment', 'progress' => 20, 'due_date' => '2 weeks']
        ];
    }
    
    return $goals;
}

// Fetch weekly activity
function getWeeklyActivity($conn, $student_id) {
    $weekly_data = [];
    $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    
    foreach ($days as $day) {
        // This is a simplified version - you'll need to implement actual activity tracking
        $weekly_data[] = [
            'day' => $day,
            'activity' => rand(40, 95) // Placeholder data
        ];
    }
    
    return $weekly_data;
}

// Get all data
$student_data = getStudentData($conn, $student_id);
$student_stats = getStudentStats($conn, $student_id);
$subject_performance = getSubjectPerformance($conn, $student_id);
$recent_activity = getRecentActivity($conn, $student_id);
$learning_goals = getLearningGoals($conn, $student_id);
$weekly_activity = getWeeklyActivity($conn, $student_id);

// Close connection
$conn->close();

// If no student data found, use defaults
if (!$student_data) {
    $student_data = [
        'name' => 'Alex Johnson',
        'grade' => 3,
        'email' => 'alex.johnson@example.com'
    ];
}
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
                                <h1 class="student-name"><?php echo htmlspecialchars($student_data['name']); ?></h1>
                                <p class="student-grade">Grade <?php echo htmlspecialchars($student_data['grade']); ?> Student</p>
                                <div class="badges">
                                    <span class="badge badge-primary">Math Whiz</span>
                                    <span class="badge badge-success">Reading Pro</span>
                                    <span class="badge badge-warning">Critical Thinker</span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-stats">
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $student_stats['overall_score']; ?>%</div>
                                <div class="stat-label">Overall Score</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $student_stats['questions_solved']; ?></div>
                                <div class="stat-label">Questions Solved</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $student_stats['tests_completed']; ?></div>
                                <div class="stat-label">Tests Completed</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number"><?php echo $student_stats['streak_days']; ?></div>
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
                                        <div class="value"><?php echo $student_stats['national_rank']; ?></div>
                                        <div class="label">National Rank</div>
                                    </div>
                                </div>
                                <div class="quick-stat">
                                    <i class="fas fa-bolt" style="color: var(--accent-orange);"></i>
                                    <div>
                                        <div class="value"><?php echo $student_stats['streak_days']; ?> Days</div>
                                        <div class="label">Learning Streak</div>
                                    </div>
                                </div>
                                <div class="quick-stat">
                                    <i class="fas fa-star" style="color: var(--accent-purple);"></i>
                                    <div>
                                        <div class="value"><?php echo $student_stats['points_earned']; ?></div>
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
                                <?php foreach($learning_goals as $goal): ?>
                                <div class="goal-item">
                                    <div class="goal-progress">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo $goal['progress']; ?>%"></div>
                                        </div>
                                        <span><?php echo $goal['progress']; ?>%</span>
                                    </div>
                                    <div class="goal-info">
                                        <div class="goal-title"><?php echo htmlspecialchars($goal['goal_title']); ?></div>
                                        <div class="goal-subtitle"><?php echo htmlspecialchars($goal['goal_description']); ?></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
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
                            <?php foreach($subject_performance as $subject): ?>
                            <div class="performance-card">
                                <div class="performance-icon <?php echo strtolower($subject['subject']); ?>">
                                    <i class="fas fa-<?php 
                                        switch($subject['subject']) {
                                            case 'Mathematics': echo 'calculator'; break;
                                            case 'Reading': echo 'book'; break;
                                            case 'Science': echo 'flask'; break;
                                            case 'Logic': echo 'puzzle-piece'; break;
                                            default: echo 'chart-bar';
                                        }
                                    ?>"></i>
                                </div>
                                <div class="performance-info">
                                    <div class="performance-title"><?php echo $subject['subject']; ?></div>
                                    <div class="performance-score"><?php echo $subject['score']; ?>%</div>
                                    <div class="performance-trend <?php echo $subject['trend']; ?>">
                                        <i class="fas fa-arrow-<?php echo $subject['trend']; ?>"></i> 
                                        <?php echo $subject['change']; ?>% from last month
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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
                                    <?php foreach($weekly_activity as $day_data): ?>
                                    <div class="chart-bar">
                                        <div class="bar-fill" style="height: <?php echo $day_data['activity']; ?>%"></div>
                                        <span><?php echo $day_data['day']; ?></span>
                                    </div>
                                    <?php endforeach; ?>
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
                            <?php foreach($recent_activity as $activity): ?>
                            <div class="activity-item">
                                <div class="activity-icon <?php echo $activity['type']; ?>">
                                    <i class="fas fa-<?php echo $activity['icon']; ?>"></i>
                                </div>
                                <div class="activity-content">
                                    <div class="activity-title"><?php echo htmlspecialchars($activity['title']); ?></div>
                                    <div class="activity-desc"><?php echo htmlspecialchars($activity['description']); ?></div>
                                    <div class="activity-time"><?php echo $activity['time']; ?></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Upcoming Goals -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="300">
                        <div class="section-header">
                            <h3><i class="fas fa-flag me-2"></i>Upcoming Goals</h3>
                        </div>
                        <div class="upcoming-goals">
                            <?php foreach($learning_goals as $goal): ?>
                            <div class="goal-card">
                                <div class="goal-header">
                                    <h6><?php echo htmlspecialchars($goal['goal_title']); ?></h6>
                                    <span class="goal-due">Due: <?php echo $goal['due_date']; ?></span>
                                </div>
                                <p><?php echo htmlspecialchars($goal['goal_description']); ?></p>
                                <div class="goal-progress">
                                    <div class="progress">
                                        <div class="progress-bar" style="width: <?php echo $goal['progress']; ?>%"></div>
                                    </div>
                                    <span><?php echo $goal['progress']; ?>% complete</span>
                                </div>
                            </div>
                            <?php endforeach; ?>
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