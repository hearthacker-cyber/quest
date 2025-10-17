<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Users | Foxia - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Custom Users CSS -->
    <link href="assets/css/admin-users.css" rel="stylesheet" type="text/css">
    
    <style>
        .user-stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .user-stat-card:hover {
            transform: translateY(-5px);
        }
        
        .user-stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .student-badge {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 12px;
        }
        
        .parent-badge {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 12px;
        }
        
        .action-buttons .btn {
            border-radius: 8px;
            padding: 6px 12px;
            margin: 2px;
        }
        
        .quick-action-btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .quick-action-btn:hover {
            transform: translateY(-2px);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .role-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        
        .role-student {
            background: #4361ee;
        }
        
        .role-parent {
            background: #f39c12;
        }
    </style>
</head>

<body data-sidebar="colored">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <?php include ('layout/header.php'); ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php include ('layout/sidebar.php'); ?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- Page Title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title">User Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Users</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-cog me-1"></i> User Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="add_student.php"><i class="fas fa-user-plus me-2"></i> Add New Student</a>
                                        <a class="dropdown-item" href="add_parent.php"><i class="fas fa-user-friends me-2"></i> Add New Parent</a>
                                        <a class="dropdown-item" href="export_users.php"><i class="fas fa-file-export me-2"></i> Export Users</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-users-cog me-2"></i> Bulk Actions</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i> User Guide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Include config
                                        include('config.php');
                                        
                                        // Get total users count
                                        $stmt = $conn->prepare("SELECT COUNT(*) as total_users FROM users");
                                        $stmt->execute();
                                        $total_users = $stmt->fetch()['total_users'];
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $total_users; ?></h4>
                                        <p class="text-muted mb-0">Total Users</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 12%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get students count
                                        $stmt = $conn->prepare("SELECT COUNT(*) as students_count FROM users WHERE role = 'student'");
                                        $stmt->execute();
                                        $students_count = $stmt->fetch()['students_count'];
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $students_count; ?></h4>
                                        <p class="text-muted mb-0">Students</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon" style="background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 8%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get parents count
                                        $stmt = $conn->prepare("SELECT COUNT(*) as parents_count FROM users WHERE role = 'parent'");
                                        $stmt->execute();
                                        $parents_count = $stmt->fetch()['parents_count'];
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $parents_count; ?></h4>
                                        <p class="text-muted mb-0">Parents</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon" style="background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);">
                                            <i class="fas fa-user-friends"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 15%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card user-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get active users count (assuming all are active for now)
                                        $active_users = $total_users;
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $active_users; ?></h4>
                                        <p class="text-muted mb-0">Active Users</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="user-stat-icon" style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 10%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">
                                    <i class="fas fa-bolt me-2 text-primary"></i> Quick Actions
                                </h5>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="add_student.php" class="btn btn-primary quick-action-btn">
                                        <i class="fas fa-user-plus me-2"></i> Add New Student
                                    </a>
                                    <a href="add_parent.php" class="btn btn-warning quick-action-btn">
                                        <i class="fas fa-user-friends me-2"></i> Add New Parent
                                    </a>
                                    <a href="manage_parents.php" class="btn btn-info quick-action-btn">
                                        <i class="fas fa-users me-2"></i> Manage Parents
                                    </a>
                                    <a href="export_users.php" class="btn btn-success quick-action-btn">
                                        <i class="fas fa-download me-2"></i> Export Users
                                    </a>
                                    <a href="send_bulk_message.php" class="btn btn-secondary quick-action-btn">
                                        <i class="fas fa-envelope me-2"></i> Send Bulk Message
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="usersSearch" placeholder="Search users by name or email...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="roleFilter">
                                            <option value="">All Roles</option>
                                            <option value="student">Student</option>
                                            <option value="parent">Parent</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="gradeFilter">
                                            <option value="">All Grades</option>
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <span class="text-muted">Quick Filters:</span>
                                            <button class="btn btn-outline-primary btn-sm" id="showAll">
                                                <i class="fas fa-list me-1"></i> Show All
                                            </button>
                                            <button class="btn btn-outline-info btn-sm" id="showStudents">
                                                <i class="fas fa-user-graduate me-1"></i> Students Only
                                            </button>
                                            <button class="btn btn-outline-warning btn-sm" id="showParents">
                                                <i class="fas fa-user-friends me-1"></i> Parents Only
                                            </button>
                                            <button class="btn btn-outline-success btn-sm" id="showActive">
                                                <i class="fas fa-user-check me-1"></i> Active Only
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">All Users</h4>
                                
                                <div class="table-responsive">
                                    <table id="users-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>User ID</th>
                                                <th>User</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Grade</th>
                                                <th>Status</th>
                                                <th>Last Active</th>
                                                <th>Registered On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch all users from database (both students and parents)
                                            try {
                                                $stmt = $conn->prepare("SELECT id, name, email, role, grade, created_at, updated_at FROM users ORDER BY created_at DESC");
                                                $stmt->execute();
                                                $users = $stmt->fetchAll();
                                                
                                                if (count($users) > 0) {
                                                    foreach ($users as $user) {
                                                        // Generate avatar based on name and role
                                                        $avatar_bg_color = $user['role'] == 'student' ? '4361ee' : 'f39c12';
                                                        $avatar_url = "https://ui-avatars.com/api/?name=" . urlencode($user['name']) . "&background=" . $avatar_bg_color . "&color=fff";
                                                        
                                                        // Format dates
                                                        $registered_date = date('d M Y', strtotime($user['created_at']));
                                                        $last_active = date('d M Y', strtotime($user['updated_at']));
                                                        
                                                        // Determine status (for now, all are active)
                                                        $status = "Active";
                                                        $status_badge = "bg-success";
                                                        
                                                        // Role badge and styling
                                                        if($user['role'] == 'student') {
                                                            $role_badge = "student-badge";
                                                            $role_text = "Student";
                                                            $role_indicator = "role-student";
                                                            $grade_display = $user['grade'] ? "Grade " . $user['grade'] : "N/A";
                                                        } else {
                                                            $role_badge = "parent-badge";
                                                            $role_text = "Parent";
                                                            $role_indicator = "role-parent";
                                                            $grade_display = "N/A";
                                                        }
                                                        
                                                        echo '
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input row-checkbox" type="checkbox" value="' . $user['id'] . '">
                                                                </div>
                                                            </td>
                                                            <td>#' . strtoupper(substr($user['role'], 0, 3)) . str_pad($user['id'], 3, '0', STR_PAD_LEFT) . '</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="' . $avatar_url . '" alt="" class="user-avatar me-3">
                                                                    <div>
                                                                        <h6 class="mb-0">' . htmlspecialchars($user['name']) . '</h6>
                                                                        <small class="text-muted">
                                                                            <span class="' . $role_indicator . '"></span>' . $role_text . '
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>' . htmlspecialchars($user['email']) . '</td>
                                                            <td>
                                                                <span class="' . $role_badge . '">' . $role_text . '</span>
                                                            </td>
                                                            <td>' . $grade_display . '</td>
                                                            <td>
                                                                <span class="badge ' . $status_badge . '">' . $status . '</span>
                                                            </td>
                                                            <td>' . $last_active . '</td>
                                                            <td>' . $registered_date . '</td>
                                                            <td>
                                                                <div class="btn-group btn-group-sm" role="group">';
                                                                
                                                        if($user['role'] == 'student') {
                                                            echo '
                                                                    <a href="view_student.php?id=' . $user['id'] . '" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Student">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="edit_student.php?id=' . $user['id'] . '" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Student">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="suspend_user.php?id=' . $user['id'] . '" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend User" onclick="return confirm(\'Are you sure you want to suspend this user?\')">
                                                                        <i class="fas fa-user-slash"></i>
                                                                    </a>
                                                                    <a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User" onclick="return confirm(\'Are you sure you want to delete this user? This action cannot be undone.\')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>';
                                                        } else {
                                                            echo '
                                                                    <a href="view_parent.php?id=' . $user['id'] . '" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Parent">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="edit_parent.php?id=' . $user['id'] . '" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="assign_student.php?parent_id=' . $user['id'] . '" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Assign Student">
                                                                        <i class="fas fa-link"></i>
                                                                    </a>
                                                                    <a href="suspend_user.php?id=' . $user['id'] . '" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend User" onclick="return confirm(\'Are you sure you want to suspend this user?\')">
                                                                        <i class="fas fa-user-slash"></i>
                                                                    </a>
                                                                    <a href="delete_user.php?id=' . $user['id'] . '" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete User" onclick="return confirm(\'Are you sure you want to delete this user? This action cannot be undone.\')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>';
                                                        }
                                                        
                                                        echo '
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="10" class="text-center">No users found.</td></tr>';
                                                }
                                            } catch (PDOException $e) {
                                                echo '<tr><td colspan="10" class="text-center text-danger">Error fetching users: ' . $e->getMessage() . '</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Page-content -->

        <footer class="footer text-center">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script> Foxia <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
        </footer>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
  
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <!-- Custom Users JS -->
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#users-datatable').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                pageLength: 10,
                language: {
                    paginate: {
                        previous: "<i class='fas fa-chevron-left'></i>",
                        next: "<i class='fas fa-chevron-right'></i>"
                    }
                },
                drawCallback: function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            });
            
            // Select All checkbox functionality
            $('#selectAll').on('click', function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
            
            // Apply filters
            $('#applyFilters').on('click', function() {
                var searchValue = $('#usersSearch').val();
                var roleValue = $('#roleFilter').val();
                var gradeValue = $('#gradeFilter').val();
                var statusValue = $('#statusFilter').val();
                
                // Combine filters
                table.column(4).search(roleValue).draw(); // Role column
                table.column(5).search(gradeValue).draw(); // Grade column
                table.column(6).search(statusValue).draw(); // Status column
                table.search(searchValue).draw();
            });
            
            // Quick filter buttons
            $('#showAll').on('click', function() {
                table.search('').columns().search('').draw();
                $('#roleFilter, #gradeFilter, #statusFilter').val('');
            });
            
            $('#showStudents').on('click', function() {
                table.column(4).search('student').draw();
                $('#roleFilter').val('student');
            });
            
            $('#showParents').on('click', function() {
                table.column(4).search('parent').draw();
                $('#roleFilter').val('parent');
            });
            
            $('#showActive').on('click', function() {
                table.column(6).search('Active').draw();
                $('#statusFilter').val('active');
            });
            
            // Refresh table
            $('#refreshTable').on('click', function() {
                location.reload();
            });
            
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>

    <script src="assets/js/app.js"></script>

</body>

</html>