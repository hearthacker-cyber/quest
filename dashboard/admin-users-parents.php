<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Parents | Foxia - Admin Dashboard</title>
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
        .parent-stat-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .parent-stat-card:hover {
            transform: translateY(-5px);
        }
        
        .parent-stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: white;
        }
        
        .parent-badge {
            background: linear-gradient(135deg, #f39c12 0%, #e74c3c 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .child-count-badge {
            background: #3498db;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            margin-left: 5px;
        }
        
        .action-buttons .btn {
            border-radius: 8px;
            padding: 6px 12px;
            margin: 2px;
        }
        
        .parent-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .parent-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .parent-avatar {
            width: 80px;
            height: 80px;
            border: 4px solid #fff;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .children-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .children-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .children-list li:last-child {
            border-bottom: none;
        }
        
        .child-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
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
                            <h6 class="page-title">Parent Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="users.php">All Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Parents</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-warning btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-friends me-1"></i> Parent Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="add_parent.php"><i class="fas fa-user-plus me-2"></i> Add New Parent</a>
                                        <a class="dropdown-item" href="assign_student.php"><i class="fas fa-link me-2"></i> Assign Student</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-file-export me-2"></i> Export Parents</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i> Send Bulk Email</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-question-circle me-2"></i> Parent Guide</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parent Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Include config
                                        include('config.php');
                                        
                                        // Get total parents count
                                        $stmt = $conn->prepare("SELECT COUNT(*) as total_parents FROM users WHERE role = 'parent'");
                                        $stmt->execute();
                                        $total_parents = $stmt->fetch()['total_parents'];
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $total_parents; ?></h4>
                                        <p class="text-muted mb-0">Total Parents</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">
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
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get active parents count
                                        $active_parents = $total_parents; // Assuming all are active for now
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $active_parents; ?></h4>
                                        <p class="text-muted mb-0">Active Parents</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon" style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get parents with multiple children count (sample data)
                                        $parents_with_multiple_children = rand(5, 15);
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $parents_with_multiple_children; ?></h4>
                                        <p class="text-muted mb-0">Multiple Children</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon" style="background: linear-gradient(135deg, #8e44ad 0%, #9b59b6 100%);">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-info"><i class="fas fa-arrow-up me-1"></i> 8%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card parent-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <?php
                                        // Get suspended parents count
                                        $suspended_parents = 0; // Assuming none for now
                                        ?>
                                        <h4 class="mb-0 user-stat-number"><?php echo $suspended_parents; ?></h4>
                                        <p class="text-muted mb-0">Suspended</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="parent-stat-icon" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">
                                            <i class="fas fa-user-slash"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger"><i class="fas fa-arrow-down me-1"></i> 2%</span>
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
                    <i class="fas fa-bolt me-2 text-warning"></i> Quick Actions
                </h5>
                <div class="d-flex flex-wrap gap-2">
                    <a href="add_parent.php" class="btn btn-warning quick-action-btn">
                        <i class="fas fa-user-plus me-2"></i> Add New Parent
                    </a>
                    <a href="assign_student.php" class="btn btn-info quick-action-btn">
                        <i class="fas fa-link me-2"></i> Assign Student to Parent
                    </a>
                    <a href="send_bulk_message.php" class="btn btn-success quick-action-btn">
                        <i class="fas fa-envelope me-2"></i> Send Bulk Message
                    </a>
                    <a href="export_parents.php" class="btn btn-primary quick-action-btn">
                        <i class="fas fa-download me-2"></i> Export Parents List
                    </a>
                    <a href="admin-all-users.php" class="btn btn-outline-secondary quick-action-btn">
                        <i class="fas fa-users me-2"></i> View All Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

                <!-- Filters and Search Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="parentsSearch" placeholder="Search parents by name or email...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <select class="form-select" id="childrenFilter">
                                            <option value="">Children Count</option>
                                            <option value="0">No Children</option>
                                            <option value="1">1 Child</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3+ Children</option>
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
                                        <input type="date" class="form-control" id="dateFromFilter" placeholder="From Date">
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-warning" id="applyFilters">
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
                                            <button class="btn btn-outline-success btn-sm" id="showActive">
                                                <i class="fas fa-user-check me-1"></i> Active Only
                                            </button>
                                            <button class="btn btn-outline-warning btn-sm" id="showNoChildren">
                                                <i class="fas fa-user-times me-1"></i> No Children
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Parents Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">All Parents</h4>
                                
                                <div class="table-responsive">
                                    <table id="parents-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>Parent ID</th>
                                                <th>Parent Name</th>
                                                <th>Email</th>
                                                <th>Children</th>
                                                <th>Status</th>
                                                <th>Last Login</th>
                                                <th>Registered On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch all parents from database
                                            try {
                                                $stmt = $conn->prepare("SELECT id, name, email, role, created_at, updated_at FROM users WHERE role = 'parent' ORDER BY created_at DESC");
                                                $stmt->execute();
                                                $parents = $stmt->fetchAll();
                                                
                                                if (count($parents) > 0) {
                                                    foreach ($parents as $parent) {
                                                        // Generate avatar based on name
                                                        $avatar_url = "https://ui-avatars.com/api/?name=" . urlencode($parent['name']) . "&background=f39c12&color=fff";
                                                        
                                                        // Format dates
                                                        $registered_date = date('d M Y', strtotime($parent['created_at']));
                                                        $last_login = date('d M Y', strtotime($parent['updated_at']));
                                                        
                                                        // Determine status (for now, all are active)
                                                        $status = "Active";
                                                        $status_badge = "bg-success";
                                                        
                                                        // Generate random children count for demonstration
                                                        $children_count = rand(0, 3);
                                                        $children_text = $children_count == 0 ? "No children" : ($children_count == 1 ? "1 child" : "$children_count children");
                                                        
                                                        echo '
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <input class="form-check-input row-checkbox" type="checkbox" value="' . $parent['id'] . '">
                                                                </div>
                                                            </td>
                                                            <td>#PAR' . str_pad($parent['id'], 3, '0', STR_PAD_LEFT) . '</td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="' . $avatar_url . '" alt="" class="rounded-circle me-2" width="32" height="32">
                                                                    <div>
                                                                        <h6 class="mb-0">' . htmlspecialchars($parent['name']) . '</h6>
                                                                        <small class="text-muted">Parent Account</small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>' . htmlspecialchars($parent['email']) . '</td>
                                                            <td>
                                                                <span class="badge bg-info">' . $children_text . '</span>
                                                                ' . ($children_count > 0 ? '<span class="child-count-badge">' . $children_count . '</span>' : '') . '
                                                            </td>
                                                            <td>
                                                                <span class="badge ' . $status_badge . '">' . $status . '</span>
                                                            </td>
                                                            <td>' . $last_login . '</td>
                                                            <td>' . $registered_date . '</td>
                                                            <td>
                                                                <div class="btn-group btn-group-sm" role="group">
                                                                    <a href="view_parent.php?id=' . $parent['id'] . '" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Parent Profile">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="edit_parent.php?id=' . $parent['id'] . '" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Parent">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="assign_student.php?parent_id=' . $parent['id'] . '" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Assign Student">
                                                                        <i class="fas fa-link"></i>
                                                                    </a>
                                                                    <a href="suspend_parent.php?id=' . $parent['id'] . '" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Suspend Parent" onclick="return confirm(\'Are you sure you want to suspend this parent?\')">
                                                                        <i class="fas fa-user-slash"></i>
                                                                    </a>
                                                                    <a href="delete_parent.php?id=' . $parent['id'] . '" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Parent" onclick="return confirm(\'Are you sure you want to delete this parent? This action cannot be undone.\')">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="9" class="text-center">No parents found.</td></tr>';
                                                }
                                            } catch (PDOException $e) {
                                                echo '<tr><td colspan="9" class="text-center text-danger">Error fetching parents: ' . $e->getMessage() . '</td></tr>';
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

    <!-- Custom Parents JS -->
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#parents-datatable').DataTable({
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
                var searchValue = $('#parentsSearch').val();
                var childrenValue = $('#childrenFilter').val();
                var statusValue = $('#statusFilter').val();
                
                // Combine filters
                table.column(4).search(childrenValue).draw(); // Children column
                table.column(5).search(statusValue).draw(); // Status column
                table.search(searchValue).draw();
            });
            
            // Quick filter buttons
            $('#showAll').on('click', function() {
                table.search('').columns().search('').draw();
            });
            
            $('#showActive').on('click', function() {
                table.column(5).search('Active').draw();
            });
            
            $('#showNoChildren').on('click', function() {
                table.column(4).search('0').draw();
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