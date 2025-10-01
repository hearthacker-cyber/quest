<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Plans & Packages | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Plans Page -->
    <link href="assets/css/admin-plans.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Plans & Packages</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-subscription.php">Subscription</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Plans & Packages</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planModal">
                                    <i class="fas fa-plus me-1"></i> Add New Plan
                                </button>
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
                                        <p class="text-muted fw-medium mb-2">Total Plans</p>
                                        <h4 class="mb-0">8</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <span class="font-size-24">📦</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+2</span>
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
                                        <p class="text-muted fw-medium mb-2">Active Plans</p>
                                        <h4 class="mb-0">6</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <span class="font-size-24">👥</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+1</span>
                                    <span class="text-muted ms-2">Active users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                        <h4 class="mb-0">₹1,25,000</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <span class="font-size-24">💳</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+12%</span>
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
                                        <p class="text-muted fw-medium mb-2">Active Subscriptions</p>
                                        <h4 class="mb-0">350</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <span class="font-size-24">🎟️</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+24</span>
                                    <span class="text-muted ms-2">New this week</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Plans Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-boxes me-2"></i>All Plans & Packages
                                </h5>
                                <div>
                                    <button class="btn btn-sm btn-outline-primary" id="refreshTable">
                                        <i class="fas fa-sync-alt me-1"></i> Refresh
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="plansTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Plan ID</th>
                                                <th>Plan Name</th>
                                                <th>Price</th>
                                                <th>Duration</th>
                                                <th>Features</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Basic Plan -->
                                            <tr>
                                                <td><span class="fw-bold text-muted">PLN-001</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs bg-light rounded">
                                                                <span class="avatar-title text-primary">B</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0">Basic</h6>
                                                            <small class="text-muted">Essential features</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">₹499</h6>
                                                    <small class="text-muted">per month</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark">1 Month</span>
                                                </td>
                                                <td>
                                                    <div class="features-preview">
                                                        <span class="badge bg-light text-dark me-1 mb-1">10 Tests</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Basic Support</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">PDF Reports</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-plan" title="Edit Plan" data-id="1">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-plan" title="Delete Plan" data-id="1">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Standard Plan -->
                                            <tr>
                                                <td><span class="fw-bold text-muted">PLN-002</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs bg-light rounded">
                                                                <span class="avatar-title text-success">S</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0">Standard</h6>
                                                            <small class="text-muted">Popular choice</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">₹999</h6>
                                                    <small class="text-muted">per month</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark">3 Months</span>
                                                </td>
                                                <td>
                                                    <div class="features-preview">
                                                        <span class="badge bg-light text-dark me-1 mb-1">50 Tests</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Priority Support</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Analytics</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">+2 more</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-plan" title="Edit Plan" data-id="2">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-plan" title="Delete Plan" data-id="2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Premium Plan -->
                                            <tr>
                                                <td><span class="fw-bold text-muted">PLN-003</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs bg-light rounded">
                                                                <span class="avatar-title text-warning">P</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0">Premium</h6>
                                                            <small class="text-muted">Full access</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">₹1,999</h6>
                                                    <small class="text-muted">per month</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark">6 Months</span>
                                                </td>
                                                <td>
                                                    <div class="features-preview">
                                                        <span class="badge bg-light text-dark me-1 mb-1">Unlimited Tests</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">24/7 Support</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Advanced Analytics</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">+5 more</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-plan" title="Edit Plan" data-id="3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-plan" title="Delete Plan" data-id="3">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Student Plan -->
                                            <tr>
                                                <td><span class="fw-bold text-muted">PLN-004</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs bg-light rounded">
                                                                <span class="avatar-title text-info">ST</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0">Student</h6>
                                                            <small class="text-muted">Special discount</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">₹299</h6>
                                                    <small class="text-muted">per month</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark">1 Month</span>
                                                </td>
                                                <td>
                                                    <div class="features-preview">
                                                        <span class="badge bg-light text-dark me-1 mb-1">15 Tests</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Email Support</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Basic Reports</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-plan" title="Edit Plan" data-id="4">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-plan" title="Delete Plan" data-id="4">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Enterprise Plan -->
                                            <tr>
                                                <td><span class="fw-bold text-muted">PLN-005</span></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs bg-light rounded">
                                                                <span class="avatar-title text-danger">E</span>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            <h6 class="mb-0">Enterprise</h6>
                                                            <small class="text-muted">For organizations</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">₹4,999</h6>
                                                    <small class="text-muted">per month</small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark">12 Months</span>
                                                </td>
                                                <td>
                                                    <div class="features-preview">
                                                        <span class="badge bg-light text-dark me-1 mb-1">Unlimited Everything</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Dedicated Manager</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">Custom Features</span>
                                                        <span class="badge bg-light text-dark me-1 mb-1">+8 more</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Inactive</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-plan" title="Edit Plan" data-id="5">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-plan" title="Delete Plan" data-id="5">
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

    <!-- Add/Edit Plan Modal -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="planModalLabel">
                        <i class="fas fa-plus me-2"></i>Add New Plan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="planForm">
                        <input type="hidden" id="planId" name="planId">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="planName" class="form-label">Plan Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="planName" name="planName" placeholder="e.g., Basic, Premium, Enterprise" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="planPrice" class="form-label">Price (₹) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="planPrice" name="planPrice" placeholder="Enter price in rupees" min="0" step="1" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="planDuration" class="form-label">Duration (Months) <span class="text-danger">*</span></label>
                                <select class="form-select" id="planDuration" name="planDuration" required>
                                    <option value="">Select Duration</option>
                                    <option value="1">1 Month</option>
                                    <option value="3">3 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="12">12 Months</option>
                                    <option value="24">24 Months</option>
                                    <option value="0">Lifetime</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="planStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="planStatus" name="planStatus" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Features <span class="text-danger">*</span></label>
                            <div class="features-checklist border rounded p-3" style="max-height: 200px; overflow-y: auto;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="unlimited_tests" id="feature1">
                                            <label class="form-check-label" for="feature1">
                                                Unlimited Tests
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="advanced_analytics" id="feature2">
                                            <label class="form-check-label" for="feature2">
                                                Advanced Analytics
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="priority_support" id="feature3">
                                            <label class="form-check-label" for="feature3">
                                                Priority Support
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="custom_reports" id="feature4">
                                            <label class="form-check-label" for="feature4">
                                                Custom Reports
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="mobile_app" id="feature5">
                                            <label class="form-check-label" for="feature5">
                                                Mobile App Access
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="api_access" id="feature6">
                                            <label class="form-check-label" for="feature6">
                                                API Access
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="white_label" id="feature7">
                                            <label class="form-check-label" for="feature7">
                                                White Label
                                            </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input feature-checkbox" type="checkbox" value="dedicated_manager" id="feature8">
                                            <label class="form-check-label" for="feature8">
                                                Dedicated Manager
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Custom Features Input -->
                                <div class="mt-3">
                                    <label for="customFeatures" class="form-label small">Add Custom Features (one per line)</label>
                                    <textarea class="form-control form-control-sm" id="customFeatures" rows="3" placeholder="Enter additional features, one per line"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="planDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="planDescription" name="planDescription" rows="3" placeholder="Brief description of the plan"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" id="savePlan">
                        <i class="fas fa-save me-1"></i> Save Plan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        <i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this plan? This action cannot be undone.</p>
                    <p class="text-muted small">Deleting this plan will not affect existing subscriptions, but new users won't be able to purchase it.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">
                        <i class="fas fa-trash me-1"></i> Delete Plan
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

    <!-- Custom JS for Plans Page -->
    <script src="assets/js/pages/admin-plans.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>