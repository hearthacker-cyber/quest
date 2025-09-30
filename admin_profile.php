<?php
// admin_profile.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin_profile.css">
</head>
<body>
    <?php include_once('layouts/header.php');?>

    <!-- Admin Hero Section -->
    <section class="admin-hero">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8" data-aos="fade-right">
                    <div class="admin-header">
                        <div class="admin-avatar-section">
                            <div class="avatar">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Admin Avatar" class="avatar-img">
                                <div class="online-status"></div>
                                <div class="admin-badge">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                            </div>
                            <div class="admin-info">
                                <h1 class="admin-name">Michael Chen</h1>
                                <p class="admin-role">System Administrator</p>
                                <div class="admin-badges">
                                    <span class="badge badge-primary">Super Admin</span>
                                    <span class="badge badge-success">Verified</span>
                                    <span class="badge badge-warning">Active</span>
                                </div>
                            </div>
                        </div>
                        <div class="admin-stats">
                            <div class="row g-3">
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
                                            <div class="stat-number">1,248</div>
                                            <div class="stat-label">Total Users</div>
                                        </div>
                                    </div>
                                </div>
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
                                            <div class="stat-number">356</div>
                                            <div class="stat-label">Active Today</div>
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
                                            <div class="stat-number">94%</div>
                                            <div class="stat-label">System Uptime</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-3">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <lottie-player 
                                                src="https://assets1.lottiefiles.com/packages/lf20_vybwn7fb.json" 
                                                background="transparent" 
                                                speed="1" 
                                                style="width: 40px; height: 40px;" 
                                                loop 
                                                autoplay>
                                            </lottie-player>
                                        </div>
                                        <div class="stat-content">
                                            <div class="stat-number">12</div>
                                            <div class="stat-label">New Reports</div>
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

    <!-- Admin Dashboard Content -->
    <section class="admin-dashboard">
        <div class="container">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-12 col-lg-4 order-2 order-lg-1">
                    <div class="admin-sidebar">
                        <!-- Quick Actions -->
                        <div class="sidebar-card" data-aos="fade-right">
                            <h5><i class="fas fa-rocket me-2"></i>Quick Actions</h5>
                            <div class="quick-actions">
                                <button class="action-btn" id="user-management-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_hl5n0bwb.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>User Management</span>
                                </button>
                                <button class="action-btn" id="content-management-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>Content Management</span>
                                </button>
                                <button class="action-btn" id="analytics-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_ysrn1w8l.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>Analytics Dashboard</span>
                                </button>
                                <button class="action-btn" id="system-settings-btn">
                                    <div class="action-icon">
                                        <lottie-player 
                                            src="https://assets1.lottiefiles.com/packages/lf20_vybwn7fb.json" 
                                            background="transparent" 
                                            speed="1" 
                                            style="width: 40px; height: 40px;" 
                                            autoplay>
                                        </lottie-player>
                                    </div>
                                    <span>System Settings</span>
                                </button>
                            </div>
                        </div>

                        <!-- System Status -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="100">
                            <h5><i class="fas fa-server me-2"></i>System Status</h5>
                            <div class="system-status">
                                <div class="status-item">
                                    <div class="status-info">
                                        <span>Database</span>
                                        <div class="status-indicator online"></div>
                                    </div>
                                    <div class="status-details">
                                        <span>Healthy</span>
                                        <small>Response: 12ms</small>
                                    </div>
                                </div>
                                <div class="status-item">
                                    <div class="status-info">
                                        <span>API Services</span>
                                        <div class="status-indicator online"></div>
                                    </div>
                                    <div class="status-details">
                                        <span>Optimal</span>
                                        <small>Uptime: 99.9%</small>
                                    </div>
                                </div>
                                <div class="status-item">
                                    <div class="status-info">
                                        <span>File Storage</span>
                                        <div class="status-indicator warning"></div>
                                    </div>
                                    <div class="status-details">
                                        <span>82% Used</span>
                                        <small>18.2GB free</small>
                                    </div>
                                </div>
                                <div class="status-item">
                                    <div class="status-info">
                                        <span>Backup System</span>
                                        <div class="status-indicator online"></div>
                                    </div>
                                    <div class="status-details">
                                        <span>Last: 2h ago</span>
                                        <small>Auto backup active</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="sidebar-card" data-aos="fade-right" data-aos-delay="200">
                            <h5><i class="fas fa-history me-2"></i>Admin Activity</h5>
                            <div class="admin-activity">
                                <div class="activity-item">
                                    <div class="activity-icon success">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">New user registered</div>
                                        <div class="activity-time">5 min ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon warning">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">System warning</div>
                                        <div class="activity-time">1 hour ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon primary">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Settings updated</div>
                                        <div class="activity-time">2 hours ago</div>
                                    </div>
                                </div>
                                <div class="activity-item">
                                    <div class="activity-icon info">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Report generated</div>
                                        <div class="activity-time">4 hours ago</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-12 col-lg-8 order-1 order-lg-2">
                    <!-- Platform Analytics -->
                    <div class="content-section" data-aos="fade-up">
                        <div class="section-header">
                            <h3><i class="fas fa-chart-bar me-2"></i>Platform Analytics</h3>
                            <div class="time-filter">
                                <select class="form-select form-select-sm">
                                    <option>Today</option>
                                    <option>Last 7 Days</option>
                                    <option selected>Last 30 Days</option>
                                    <option>Last 90 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="analytics-grid">
                            <div class="analytics-card">
                                <div class="analytics-header">
                                    <h6>User Growth</h6>
                                    <span class="trend positive">+12%</span>
                                </div>
                                <div class="analytics-chart">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_hl5n0bwb.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 100%; height: 120px;" 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="analytics-footer">
                                    <span>245 new users this month</span>
                                </div>
                            </div>
                            <div class="analytics-card">
                                <div class="analytics-header">
                                    <h6>Activity Rate</h6>
                                    <span class="trend positive">+8%</span>
                                </div>
                                <div class="analytics-chart">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_soop7nra.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 100%; height: 120px;" 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="analytics-footer">
                                    <span>78% daily active users</span>
                                </div>
                            </div>
                            <div class="analytics-card">
                                <div class="analytics-header">
                                    <h6>Revenue</h6>
                                    <span class="trend positive">+15%</span>
                                </div>
                                <div class="analytics-chart">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_ysrn1w8l.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 100%; height: 120px;" 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="analytics-footer">
                                    <span>$12,450 this month</span>
                                </div>
                            </div>
                            <div class="analytics-card">
                                <div class="analytics-header">
                                    <h6>Engagement</h6>
                                    <span class="trend negative">-3%</span>
                                </div>
                                <div class="analytics-chart">
                                    <lottie-player 
                                        src="https://assets1.lottiefiles.com/packages/lf20_vybwn7fb.json" 
                                        background="transparent" 
                                        speed="1" 
                                        style="width: 100%; height: 120px;" 
                                        autoplay>
                                    </lottie-player>
                                </div>
                                <div class="analytics-footer">
                                    <span>Avg. session: 18min</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Management -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-header">
                            <h3><i class="fas fa-users me-2"></i>Recent Users</h3>
                            <button class="btn btn-primary btn-sm" id="view-all-users-btn">
                                <i class="fas fa-eye me-1"></i>View All
                            </button>
                        </div>
                        <div class="users-table">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Join Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="User" class="user-avatar">
                                                    <div>
                                                        <div class="user-name">Alex Johnson</div>
                                                        <div class="user-email">alex@example.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="role-badge student">Student</span></td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>Dec 1, 2024</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="User" class="user-avatar">
                                                    <div>
                                                        <div class="user-name">Sarah Wilson</div>
                                                        <div class="user-email">sarah@example.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="role-badge parent">Parent</span></td>
                                            <td><span class="status-badge active">Active</span></td>
                                            <td>Nov 28, 2024</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-warning">
                                                        <i class="fas fa-ban"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="user-info">
                                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=50&q=80" alt="User" class="user-avatar">
                                                    <div>
                                                        <div class="user-name">Dr. Robert Kim</div>
                                                        <div class="user-email">robert@example.com</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="role-badge teacher">Teacher</span></td>
                                            <td><span class="status-badge pending">Pending</span></td>
                                            <td>Nov 25, 2024</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-success">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- System Alerts -->
                    <div class="content-section" data-aos="fade-up" data-aos-delay="200">
                        <div class="section-header">
                            <h3><i class="fas fa-bell me-2"></i>System Alerts</h3>
                            <button class="btn btn-outline-secondary btn-sm" id="mark-all-read-btn">
                                <i class="fas fa-check-double me-1"></i>Mark All Read
                            </button>
                        </div>
                        <div class="alerts-list">
                            <div class="alert-item warning">
                                <div class="alert-icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="alert-content">
                                    <div class="alert-title">Storage Space Running Low</div>
                                    <div class="alert-desc">File storage is at 82% capacity. Consider cleaning up old files or upgrading storage.</div>
                                    <div class="alert-time">2 hours ago</div>
                                </div>
                                <button class="alert-action">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="alert-item info">
                                <div class="alert-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="alert-content">
                                    <div class="alert-title">New Feature Available</div>
                                    <div class="alert-desc">Advanced analytics dashboard is now available for all admin users.</div>
                                    <div class="alert-time">5 hours ago</div>
                                </div>
                                <button class="alert-action">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="alert-item success">
                                <div class="alert-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="alert-content">
                                    <div class="alert-title">Backup Completed Successfully</div>
                                    <div class="alert-desc">System backup completed at 02:00 AM. All data is securely stored.</div>
                                    <div class="alert-time">Yesterday</div>
                                </div>
                                <button class="alert-action">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admin CTA Section -->
    <section class="admin-cta">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8" data-aos="fade-right">
                    <h3>Need Advanced System Controls?</h3>
                    <p>Access comprehensive system management tools and advanced analytics.</p>
                </div>
                <div class="col-12 col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <div class="cta-buttons">
                        <button class="btn btn-warning me-2 mb-2 mb-lg-0" id="system-tools-btn">
                            <i class="fas fa-tools me-2"></i>System Tools
                        </button>
                        <button class="btn btn-outline-light" id="advanced-settings-btn">
                            <i class="fas fa-cogs me-2"></i>Advanced Settings
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
    <script src="scripts/admin_profile.js"></script>
</body>
</html>