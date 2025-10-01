<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Admins & Moderators | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom Admins CSS -->
    <link href="assets/css/admin-users-admins.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Admin & Moderator Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin/users.php">User Management</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Admins</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-shield me-1"></i> Admin Tools <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addAdminModal">
                                            <i class="fas fa-user-plus me-2"></i> Add New Admin
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cog me-2"></i> Role Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-history me-2"></i> Activity Log
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-shield-alt me-2"></i> Security Settings
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Stats Summary -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card admin-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 admin-stat-number">15</h4>
                                        <p class="text-muted mb-0">Total Admins</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="admin-stat-icon bg-primary">
                                            <i class="fas fa-user-shield"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-arrow-up me-1"></i> 2</span>
                                    <span class="text-muted ms-2">This month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card admin-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 admin-stat-number">8</h4>
                                        <p class="text-muted mb-0">Super Admins</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="admin-stat-icon bg-danger">
                                            <i class="fas fa-crown"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-check me-1"></i> Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card admin-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 admin-stat-number">5</h4>
                                        <p class="text-muted mb-0">Moderators</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="admin-stat-icon bg-warning">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-check me-1"></i> All Active</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card admin-stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 admin-stat-number">2</h4>
                                        <p class="text-muted mb-0">Content Managers</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="admin-stat-icon bg-info">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success"><i class="fas fa-check me-1"></i> Active</span>
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
                                <h4 class="mt-0 header-title mb-4">Admin Filters & Search</h4>
                                
                                <div class="row g-3">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="search-box">
                                            <input type="text" class="form-control" id="adminsSearch" placeholder="Search admins...">
                                            <i class="fas fa-search search-icon"></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <select class="form-select" id="roleFilter">
                                            <option value="">All Roles</option>
                                            <option value="super-admin">Super Admin</option>
                                            <option value="moderator">Moderator</option>
                                            <option value="content-manager">Content Manager</option>
                                            <option value="support">Support Staff</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-md-6">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-filter me-1"></i> Apply
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="clearFilters">
                                                <i class="fas fa-times me-1"></i> Clear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap gap-2 align-items-center">
                                            <span class="text-muted">Quick Actions:</span>
                                            <button class="btn btn-outline-primary btn-sm" id="refreshTable">
                                                <i class="fas fa-sync-alt me-1"></i> Refresh
                                            </button>
                                            <button class="btn btn-outline-success btn-sm" id="exportAdmins">
                                                <i class="fas fa-file-export me-1"></i> Export
                                            </button>
                                            <button class="btn btn-outline-info btn-sm" id="printTable">
                                                <i class="fas fa-print me-1"></i> Print
                                            </button>
                                            <button class="btn btn-outline-warning btn-sm" id="bulkRoleUpdate">
                                                <i class="fas fa-users-cog me-1"></i> Bulk Role Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bulk Actions Bar -->
                <div class="bulk-actions-bar" id="bulkActionsBar">
                    <div class="d-flex align-items-center">
                        <span class="me-3"><strong id="selectedCount">0</strong> admins selected</span>
                        <div class="btn-group me-3">
                            <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#bulkRoleModal">
                                <i class="fas fa-user-cog me-1"></i> Change Role
                            </button>
                            <button type="button" class="btn btn-outline-warning btn-sm" id="bulkDeactivate">
                                <i class="fas fa-user-slash me-1"></i> Deactivate
                            </button>
                            <button type="button" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-envelope me-1"></i> Send Message
                            </button>
                        </div>
                        <button type="button" class="btn btn-outline-danger btn-sm" id="clearSelection">
                            <i class="fas fa-times me-1"></i> Clear Selection
                        </button>
                    </div>
                </div>

                <!-- Admins Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title mb-4">Manage Admins & Moderators</h4>
                                
                                <div class="table-responsive">
                                    <table id="admins-datatable" class="table table-hover table-centered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>Admin ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Last Login</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Sample Data - Replace with dynamic data from your backend -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#ADM001</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=4361ee&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Admin User</h6>
                                                            <small class="text-muted">System Administrator</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>admin@foxia.com</td>
                                                <td>
                                                    <select class="form-select form-select-sm role-select" data-admin-id="ADM001">
                                                        <option value="super-admin" selected>Super Admin</option>
                                                        <option value="moderator">Moderator</option>
                                                        <option value="content-manager">Content Manager</option>
                                                        <option value="support">Support Staff</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>2 hours ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Admin">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Revoke Access">
                                                            <i class="fas fa-user-lock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Admin">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#ADM002</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Moderator+One&background=4cc9f0&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Moderator One</h6>
                                                            <small class="text-muted">Content Moderator</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>moderator.one@foxia.com</td>
                                                <td>
                                                    <select class="form-select form-select-sm role-select" data-admin-id="ADM002">
                                                        <option value="super-admin">Super Admin</option>
                                                        <option value="moderator" selected>Moderator</option>
                                                        <option value="content-manager">Content Manager</option>
                                                        <option value="support">Support Staff</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>1 day ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Admin">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Revoke Access">
                                                            <i class="fas fa-user-lock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Admin">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#ADM003</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Content+Manager&background=f72585&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Content Manager</h6>
                                                            <small class="text-muted">Content Management Team</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>content.manager@foxia.com</td>
                                                <td>
                                                    <select class="form-select form-select-sm role-select" data-admin-id="ADM003">
                                                        <option value="super-admin">Super Admin</option>
                                                        <option value="moderator">Moderator</option>
                                                        <option value="content-manager" selected>Content Manager</option>
                                                        <option value="support">Support Staff</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-warning me-1" style="font-size: 8px;"></i>
                                                        <span>3 days ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Admin">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Revoke Access">
                                                            <i class="fas fa-user-lock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Admin">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#ADM004</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Support+Staff&background=7209b7&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Support Staff</h6>
                                                            <small class="text-muted">Customer Support</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>support.staff@foxia.com</td>
                                                <td>
                                                    <select class="form-select form-select-sm role-select" data-admin-id="ADM004">
                                                        <option value="super-admin">Super Admin</option>
                                                        <option value="moderator">Moderator</option>
                                                        <option value="content-manager">Content Manager</option>
                                                        <option value="support" selected>Support Staff</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-success me-1" style="font-size: 8px;"></i>
                                                        <span>5 minutes ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Admin">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Revoke Access">
                                                            <i class="fas fa-user-lock"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Admin">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox">
                                                    </div>
                                                </td>
                                                <td>#ADM005</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Super+Admin&background=f8961e&color=fff" alt="" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <h6 class="mb-0">Super Admin</h6>
                                                            <small class="text-muted">System Owner</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>super.admin@foxia.com</td>
                                                <td>
                                                    <select class="form-select form-select-sm role-select" data-admin-id="ADM005">
                                                        <option value="super-admin" selected>Super Admin</option>
                                                        <option value="moderator">Moderator</option>
                                                        <option value="content-manager">Content Manager</option>
                                                        <option value="support">Support Staff</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-circle text-danger me-1" style="font-size: 8px;"></i>
                                                        <span>2 weeks ago</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Inactive</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="tooltip" title="Edit Admin">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-info" data-bs-toggle="tooltip" title="Activate">
                                                            <i class="fas fa-user-check"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Delete Admin">
                                                            <i class="fas fa-trash"></i>
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

    <!-- Add Admin Modal -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminModalLabel">Add New Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAdminForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="adminName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="adminName" placeholder="Enter full name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="adminEmail" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="adminEmail" placeholder="Enter email address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="adminRole" class="form-label">Role</label>
                                <select class="form-select" id="adminRole" required>
                                    <option value="">Select Role</option>
                                    <option value="super-admin">Super Admin</option>
                                    <option value="moderator">Moderator</option>
                                    <option value="content-manager">Content Manager</option>
                                    <option value="support">Support Staff</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="adminPermissions" class="form-label">Permissions</label>
                                <select class="form-select" id="adminPermissions" multiple>
                                    <option value="user_management">User Management</option>
                                    <option value="content_management">Content Management</option>
                                    <option value="analytics">Analytics Access</option>
                                    <option value="settings">System Settings</option>
                                    <option value="reports">Report Generation</option>
                                </select>
                                <small class="text-muted">Hold Ctrl to select multiple permissions</small>
                            </div>
                            <div class="col-12">
                                <label for="adminNotes" class="form-label">Notes (Optional)</label>
                                <textarea class="form-control" id="adminNotes" rows="3" placeholder="Any additional notes..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveAdmin">Add Admin</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Role Update Modal -->
    <div class="modal fade" id="bulkRoleModal" tabindex="-1" aria-labelledby="bulkRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkRoleModalLabel">Bulk Role Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Update role for <strong id="selectedAdminsCount">0</strong> selected admins:</p>
                    <select class="form-select" id="bulkRoleSelect">
                        <option value="">Select New Role</option>
                        <option value="super-admin">Super Admin</option>
                        <option value="moderator">Moderator</option>
                        <option value="content-manager">Content Manager</option>
                        <option value="support">Support Staff</option>
                    </select>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="sendNotification">
                        <label class="form-check-label" for="sendNotification">
                            Send email notification about role change
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmBulkRole">Update Roles</button>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Custom Admins JS -->
    <script src="assets/js/pages/admin-users-admins.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>