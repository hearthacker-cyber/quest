<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - QUEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Admin Specific Styles */
        .admin-sidebar {
            background: linear-gradient(135deg, var(--dark-blue) 0%, #0d3c5f 100%);
            color: white;
            min-height: 100vh;
            padding: 0;
            position: fixed;
            width: 280px;
            box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .admin-main {
            margin-left: 280px;
            background: #f8f9fa;
            min-height: 100vh;
        }

        .sidebar-brand {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 15px 25px;
            border-left: 4px solid transparent;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: var(--primary-yellow);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        .admin-header {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .user-menu img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border-left: 4px solid;
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .stat-card.users { border-left-color: var(--primary-blue); }
        .stat-card.revenue { border-left-color: var(--primary-yellow); }
        .stat-card.questions { border-left-color: var(--accent-purple); }
        .stat-card.growth { border-left-color: var(--accent-orange); }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat-title {
            color: #666;
            font-weight: 600;
        }

        .stat-change {
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 10px;
        }

        .stat-change.positive { color: #28a745; }
        .stat-change.negative { color: #dc3545; }

        .chart-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-btn {
            background: white;
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
        }

        .action-btn:hover {
            border-color: var(--primary-blue);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .action-icon {
            font-size: 2rem;
            margin-bottom: 10px;
            background: linear-gradient(135deg, var(--primary-blue), var(--accent-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .admin-sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }
            
            .admin-main {
                margin-left: 0;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="admin-sidebar">
                <div class="sidebar-brand">
                    <h3 class="mb-0">QUEST Admin</h3>
                    <small class="text-muted">Control Panel</small>
                </div>
                
                <div class="sidebar-nav">
                    <div class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i>
                            User Management
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-book"></i>
                            Content Management
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-bar"></i>
                            Analytics
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-question-circle"></i>
                            Support
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="admin-main">
                <!-- Header -->
                <div class="admin-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="mb-0">Dashboard Overview</h4>
                            <small class="text-muted">Welcome back, Admin!</small>
                        </div>
                        <div class="col-auto">
                            <div class="user-menu dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Admin">
                                    <span class="ms-2 d-none d-sm-inline">Admin User</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Content -->
                <div class="container-fluid py-4">
                    <!-- Stats Overview -->
                    <div class="stats-grid">
                        <div class="stat-card users" data-aos="fade-up" data-aos-delay="0">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-number">5,248</div>
                            <div class="stat-title">Total Users</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 12% increase
                            </div>
                        </div>
                        
                        <div class="stat-card revenue" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="stat-number">$24,580</div>
                            <div class="stat-title">Monthly Revenue</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 8% increase
                            </div>
                        </div>
                        
                        <div class="stat-card questions" data-aos="fade-up" data-aos-delay="200">
                            <div class="stat-icon">
                                <i class="fas fa-question-circle"></i>
                            </div>
                            <div class="stat-number">10,542</div>
                            <div class="stat-title">Questions Solved</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 15% increase
                            </div>
                        </div>
                        
                        <div class="stat-card growth" data-aos="fade-up" data-aos-delay="300">
                            <div class="stat-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="stat-number">94%</div>
                            <div class="stat-title">Success Rate</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 3% increase
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="quick-actions" data-aos="fade-up">
                        <div class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <div class="action-text">Add User</div>
                        </div>
                        <div class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-book-medical"></i>
                            </div>
                            <div class="action-text">Create Content</div>
                        </div>
                        <div class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="action-text">View Reports</div>
                        </div>
                        <div class="action-btn">
                            <div class="action-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="action-text">Notifications</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Analytics Chart -->
                            <div class="chart-container" data-aos="fade-up">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5>User Growth Analytics</h5>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-primary active">Weekly</button>
                                        <button class="btn btn-sm btn-outline-primary">Monthly</button>
                                        <button class="btn btn-sm btn-outline-primary">Yearly</button>
                                    </div>
                                </div>
                                <div class="chart-placeholder" style="height: 300px; background: linear-gradient(45deg, #f8f9fa, #e9ecef); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #666;">
                                    <div class="text-center">
                                        <i class="fas fa-chart-line fa-3x mb-3"></i>
                                        <p>Interactive Chart Area</p>
                                        <small>User registration and activity analytics</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <!-- Recent Activity -->
                            <div class="content-section" data-aos="fade-up" data-aos-delay="100">
                                <div class="section-header">
                                    <h5><i class="fas fa-history me-2"></i>Recent Activity</h5>
                                </div>
                                <div class="activity-list">
                                    <div class="activity-item">
                                        <div class="activity-icon success">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">New user registration</div>
                                            <div class="activity-time">2 minutes ago</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon primary">
                                            <i class="fas fa-book"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Content updated</div>
                                            <div class="activity-time">1 hour ago</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon warning">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">System maintenance</div>
                                            <div class="activity-time">3 hours ago</div>
                                        </div>
                                    </div>
                                    <div class="activity-item">
                                        <div class="activity-icon info">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                        <div class="activity-content">
                                            <div class="activity-text">Monthly report generated</div>
                                            <div class="activity-time">5 hours ago</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Management & Alerts Section -->
                    <div class="row mt-4">
                        <div class="col-lg-8">
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
                        </div>
                        
                        <div class="col-lg-4">
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
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/admin.js"></script>
</body>
</html>