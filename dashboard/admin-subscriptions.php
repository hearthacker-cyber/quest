<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Active Subscriptions | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css">
    
    <!-- Custom CSS for Subscriptions Page -->
    <link href="assets/css/admin-subscriptions.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Active Subscriptions</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-subscription.php">Subscription</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Active Subscriptions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="bulkActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-tasks me-1"></i> Bulk Actions
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item bulk-action" href="#" data-action="extend"><i class="fas fa-calendar-plus me-2"></i> Extend Subscriptions</a></li>
                                        <li><a class="dropdown-item bulk-action" href="#" data-action="upgrade"><i class="fas fa-arrow-up me-2"></i> Upgrade Plans</a></li>
                                        <li><a class="dropdown-item bulk-action" href="#" data-action="cancel"><i class="fas fa-times me-2"></i> Cancel Subscriptions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Subscriptions</p>
                                        <h4 class="mb-0">1,247</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <span class="font-size-24">👥</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+89</span>
                                    <span class="text-muted ms-2">This month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Active</p>
                                        <h4 class="mb-0">984</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <span class="font-size-24">📦</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+5.2%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Expiring Soon</p>
                                        <h4 class="mb-0">42</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <span class="font-size-24">🎟️</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger">+12</span>
                                    <span class="text-muted ms-2">Next 7 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Monthly Revenue</p>
                                        <h4 class="mb-0">₹2,84,500</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <span class="font-size-24">💳</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+18.3%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-filter me-2"></i>Filters & Controls
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="planTypeFilter" class="form-label">Plan Type</label>
                                        <select class="form-select" id="planTypeFilter">
                                            <option value="">All Plans</option>
                                            <option value="basic">Basic</option>
                                            <option value="standard">Standard</option>
                                            <option value="premium">Premium</option>
                                            <option value="student">Student</option>
                                            <option value="enterprise">Enterprise</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="statusFilter" class="form-label">Status</label>
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="active">Active</option>
                                            <option value="expired">Expired</option>
                                            <option value="cancelled">Cancelled</option>
                                            <option value="expiring">Expiring Soon</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateFromFilter" class="form-label">Date From</label>
                                        <input type="date" class="form-control" id="dateFromFilter">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateToFilter" class="form-label">Date To</label>
                                        <input type="date" class="form-control" id="dateToFilter">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-search me-1"></i> Apply Filters
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="resetFilters">
                                                <i class="fas fa-redo me-1"></i> Reset
                                            </button>
                                            <button type="button" class="btn btn-outline-success ms-auto" id="exportData">
                                                <i class="fas fa-download me-1"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subscriptions Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-list-alt me-2"></i>All Subscriptions
                                </h5>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary" id="refreshTable">
                                        <i class="fas fa-sync-alt me-1"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="subscriptionsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="20">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                                    </div>
                                                </th>
                                                <th>Subscription ID</th>
                                                <th>User Name</th>
                                                <th>Plan Name</th>
                                                <th>Start Date</th>
                                                <th>Expiry Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Active Subscriptions -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox" value="SUB-001">
                                                    </div>
                                                </td>
                                                <td><span class="fw-bold text-primary">SUB-001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=007bff&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Rahul Sharma</h6>
                                                            <small class="text-muted">rahul@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-primary me-2">B</span>
                                                        <div>
                                                            <h6 class="mb-0">Basic Plan</h6>
                                                            <small class="text-muted">₹499/month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-01-15</div>
                                                    <small class="text-muted">3 months ago</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-04-15</div>
                                                    <small class="text-muted">45 days left</small>
                                                </td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-subscription" title="View Details" data-id="SUB-001">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning extend-subscription" title="Extend" data-id="SUB-001">
                                                            <i class="fas fa-calendar-plus"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info upgrade-subscription" title="Upgrade" data-id="SUB-001">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-subscription" title="Cancel" data-id="SUB-001">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox" value="SUB-002">
                                                    </div>
                                                </td>
                                                <td><span class="fw-bold text-primary">SUB-002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Priya+Patel&background=28a745&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Priya Patel</h6>
                                                            <small class="text-muted">priya@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-success me-2">S</span>
                                                        <div>
                                                            <h6 class="mb-0">Standard Plan</h6>
                                                            <small class="text-muted">₹999/month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-02-01</div>
                                                    <small class="text-muted">2 months ago</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-05-01</div>
                                                    <small class="text-muted">60 days left</small>
                                                </td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-subscription" title="View Details" data-id="SUB-002">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning extend-subscription" title="Extend" data-id="SUB-002">
                                                            <i class="fas fa-calendar-plus"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info upgrade-subscription" title="Upgrade" data-id="SUB-002">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-subscription" title="Cancel" data-id="SUB-002">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Expiring Soon -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox" value="SUB-015">
                                                    </div>
                                                </td>
                                                <td><span class="fw-bold text-primary">SUB-015</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Amit+Kumar&background=ffc107&color=000" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Amit Kumar</h6>
                                                            <small class="text-muted">amit@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-warning me-2">P</span>
                                                        <div>
                                                            <h6 class="mb-0">Premium Plan</h6>
                                                            <small class="text-muted">₹1,999/month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-01-10</div>
                                                    <small class="text-muted">3 months ago</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-04-10</div>
                                                    <small class="text-danger fw-bold">5 days left</small>
                                                </td>
                                                <td><span class="badge bg-warning text-dark">Expiring Soon</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-subscription" title="View Details" data-id="SUB-015">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning extend-subscription" title="Extend" data-id="SUB-015">
                                                            <i class="fas fa-calendar-plus"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info upgrade-subscription" title="Upgrade" data-id="SUB-015">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger cancel-subscription" title="Cancel" data-id="SUB-015">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Expired -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox" value="SUB-028">
                                                    </div>
                                                </td>
                                                <td><span class="fw-bold text-muted">SUB-028</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Neha+Gupta&background=6c757d&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Neha Gupta</h6>
                                                            <small class="text-muted">neha@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-info me-2">ST</span>
                                                        <div>
                                                            <h6 class="mb-0">Student Plan</h6>
                                                            <small class="text-muted">₹299/month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-01-05</div>
                                                    <small class="text-muted">3 months ago</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-04-05</div>
                                                    <small class="text-muted">Expired</small>
                                                </td>
                                                <td><span class="badge bg-secondary">Expired</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-subscription" title="View Details" data-id="SUB-028">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success" title="Renew" data-id="SUB-028">
                                                            <i class="fas fa-redo"></i>
                                                        </button>
                                                        <button class="btn btn-outline-info upgrade-subscription" title="Upgrade" data-id="SUB-028">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Cancelled -->
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input row-checkbox" type="checkbox" value="SUB-042">
                                                    </div>
                                                </td>
                                                <td><span class="fw-bold text-muted">SUB-042</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rajesh+Mehta&background=dc3545&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Rajesh Mehta</h6>
                                                            <small class="text-muted">rajesh@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-danger me-2">E</span>
                                                        <div>
                                                            <h6 class="mb-0">Enterprise Plan</h6>
                                                            <small class="text-muted">₹4,999/month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-02-15</div>
                                                    <small class="text-muted">2 months ago</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-05-15</div>
                                                    <small class="text-muted">Cancelled</small>
                                                </td>
                                                <td><span class="badge bg-danger">Cancelled</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-subscription" title="View Details" data-id="SUB-042">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success" title="Reactivate" data-id="SUB-042">
                                                            <i class="fas fa-play"></i>
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

    <!-- View Subscription Modal -->
    <div class="modal fade" id="viewSubscriptionModal" tabindex="-1" aria-labelledby="viewSubscriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewSubscriptionModalLabel">
                        <i class="fas fa-eye me-2"></i>Subscription Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="border-bottom pb-2">Subscription Information</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="text-muted">Subscription ID:</td>
                                    <td class="fw-bold" id="detailId">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Plan:</td>
                                    <td id="detailPlan">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Price:</td>
                                    <td id="detailPrice">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status:</td>
                                    <td id="detailStatus">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Start Date:</td>
                                    <td id="detailStartDate">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Expiry Date:</td>
                                    <td id="detailExpiryDate">-</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="border-bottom pb-2">User Information</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td class="text-muted">Name:</td>
                                    <td id="detailUserName">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Email:</td>
                                    <td id="detailUserEmail">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Phone:</td>
                                    <td id="detailUserPhone">-</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Joined:</td>
                                    <td id="detailUserJoined">-</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h6 class="border-bottom pb-2">Payment History</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="paymentHistory">
                                        <!-- Payment history will be loaded here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="sendReminder">
                        <i class="fas fa-bell me-1"></i> Send Reminder
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Extend Subscription Modal -->
    <div class="modal fade" id="extendSubscriptionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning">
                        <i class="fas fa-calendar-plus me-2"></i>Extend Subscription
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Extend subscription for <span id="extendUserName" class="fw-bold">-</span></p>
                    <div class="mb-3">
                        <label for="extendMonths" class="form-label">Extend by (months)</label>
                        <select class="form-select" id="extendMonths">
                            <option value="1">1 Month</option>
                            <option value="3">3 Months</option>
                            <option value="6">6 Months</option>
                            <option value="12">12 Months</option>
                        </select>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Current expiry: <span id="currentExpiry" class="fw-bold">-</span><br>
                        New expiry: <span id="newExpiry" class="fw-bold text-success">-</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmExtend">
                        <i class="fas fa-calendar-plus me-1"></i> Extend Subscription
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Actions Modal -->
    <div class="modal fade" id="bulkActionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bulkActionTitle">
                        <i class="fas fa-tasks me-2"></i>Bulk Action
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="bulkActionMessage">Are you sure you want to perform this action on selected subscriptions?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        This action will affect <span id="selectedCount" class="fw-bold">0</span> subscription(s).
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmBulkAction">
                        Confirm Action
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

    <!-- Custom JS for Subscriptions Page -->
    <script src="assets/js/pages/admin-subscriptions.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>