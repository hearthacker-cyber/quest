<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Coupons / Discounts | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Coupons Page -->
    <link href="assets/css/admin-coupons.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Coupons / Discounts</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-subscription.php">Subscription</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Coupons / Discounts</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#couponModal">
                                    <i class="fas fa-plus me-1"></i> Add New Coupon
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
                                        <p class="text-muted fw-medium mb-2">Active Coupons</p>
                                        <h4 class="mb-0">12</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <span class="font-size-24">🎟️</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+3</span>
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
                                        <p class="text-muted fw-medium mb-2">Total Usage</p>
                                        <h4 class="mb-0">847</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <span class="font-size-24">👥</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+124</span>
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
                                        <p class="text-muted fw-medium mb-2">Discount Given</p>
                                        <h4 class="mb-0">₹1,24,750</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
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
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Avg. Discount</p>
                                        <h4 class="mb-0">₹247</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <span class="font-size-24">📦</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+8.7%</span>
                                    <span class="text-muted ms-2">From last month</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-bolt me-2"></i>Quick Actions
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-primary" id="generateCouponCode">
                                                <i class="fas fa-magic me-2"></i>Generate Code
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success" id="bulkCreate">
                                                <i class="fas fa-layer-group me-2"></i>Bulk Create
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-info" id="exportCoupons">
                                                <i class="fas fa-download me-2"></i>Export List
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-warning" id="refreshTable">
                                                <i class="fas fa-sync-alt me-2"></i>Refresh
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Coupons Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-tags me-2"></i>All Coupons & Discounts
                                </h5>
                                <div class="export-buttons">
                                    <!-- DataTables will inject export buttons here -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="couponsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Coupon Code</th>
                                                <th>Discount Type</th>
                                                <th>Discount Value</th>
                                                <th>Valid From – Valid To</th>
                                                <th>Usage Limit</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Active Coupons -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-primary me-2">
                                                            <i class="fas fa-tag"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="mb-0">WELCOME20</h6>
                                                            <small class="text-muted">New user discount</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Percentage</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">20%</h6>
                                                    <small class="text-muted">Max ₹500</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-01-01</div>
                                                    <div class="text-nowrap text-muted">to 2024-12-31</div>
                                                    <small class="text-success">245 days left</small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="mb-0">1000</h6>
                                                        <small class="text-muted">total uses</small>
                                                        <div class="progress mt-1" style="height: 4px;">
                                                            <div class="progress-bar bg-success" style="width: 65%"></div>
                                                        </div>
                                                        <small>650 used</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-coupon" title="Edit" data-id="1">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning toggle-coupon" title="Disable" data-id="1">
                                                            <i class="fas fa-pause"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-coupon" title="Delete" data-id="1">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-success me-2">
                                                            <i class="fas fa-tag"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="mb-0">STUDENT500</h6>
                                                            <small class="text-muted">Student special</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Flat</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">₹500</h6>
                                                    <small class="text-muted">Flat discount</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-01</div>
                                                    <div class="text-nowrap text-muted">to 2024-06-30</div>
                                                    <small class="text-warning">92 days left</small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="mb-0">500</h6>
                                                        <small class="text-muted">total uses</small>
                                                        <div class="progress mt-1" style="height: 4px;">
                                                            <div class="progress-bar bg-info" style="width: 45%"></div>
                                                        </div>
                                                        <small>225 used</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-coupon" title="Edit" data-id="2">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning toggle-coupon" title="Disable" data-id="2">
                                                            <i class="fas fa-pause"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-coupon" title="Delete" data-id="2">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-warning me-2">
                                                            <i class="fas fa-tag"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="mb-0">SUMMER25</h6>
                                                            <small class="text-muted">Summer sale</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Percentage</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">25%</h6>
                                                    <small class="text-muted">No maximum</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-05-01</div>
                                                    <div class="text-nowrap text-muted">to 2024-05-31</div>
                                                    <small class="text-info">Future coupon</small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="mb-0">∞</h6>
                                                        <small class="text-muted">unlimited</small>
                                                        <div class="progress mt-1" style="height: 4px;">
                                                            <div class="progress-bar" style="width: 0%"></div>
                                                        </div>
                                                        <small>0 used</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-secondary">Inactive</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-coupon" title="Edit" data-id="3">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success toggle-coupon" title="Enable" data-id="3">
                                                            <i class="fas fa-play"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-coupon" title="Delete" data-id="3">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Expired Coupon -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-secondary me-2">
                                                            <i class="fas fa-tag"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="mb-0">NEWYEAR2024</h6>
                                                            <small class="text-muted">New Year special</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning text-dark">Flat</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">₹300</h6>
                                                    <small class="text-muted">Flat discount</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-01-01</div>
                                                    <div class="text-nowrap text-muted">to 2024-01-31</div>
                                                    <small class="text-danger">Expired</small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="mb-0">200</h6>
                                                        <small class="text-muted">total uses</small>
                                                        <div class="progress mt-1" style="height: 4px;">
                                                            <div class="progress-bar bg-success" style="width: 100%"></div>
                                                        </div>
                                                        <small>200 used</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-danger">Expired</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-coupon" title="Edit" data-id="4">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="Duplicate" data-id="4">
                                                            <i class="fas fa-copy"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-coupon" title="Delete" data-id="4">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Limited Usage Coupon -->
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-info me-2">
                                                            <i class="fas fa-tag"></i>
                                                        </span>
                                                        <div>
                                                            <h6 class="mb-0">FIRST100</h6>
                                                            <small class="text-muted">First 100 users</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-info">Percentage</span>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">15%</h6>
                                                    <small class="text-muted">Max ₹1000</small>
                                                </td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-01</div>
                                                    <div class="text-nowrap text-muted">to 2024-08-31</div>
                                                    <small class="text-success">154 days left</small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h6 class="mb-0">100</h6>
                                                        <small class="text-muted">per user</small>
                                                        <div class="progress mt-1" style="height: 4px;">
                                                            <div class="progress-bar bg-warning" style="width: 85%"></div>
                                                        </div>
                                                        <small>85 used</small>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Active</span></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary edit-coupon" title="Edit" data-id="5">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-warning toggle-coupon" title="Disable" data-id="5">
                                                            <i class="fas fa-pause"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger delete-coupon" title="Delete" data-id="5">
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

    <!-- Add/Edit Coupon Modal -->
    <div class="modal fade" id="couponModal" tabindex="-1" aria-labelledby="couponModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="couponModalLabel">
                        <i class="fas fa-plus me-2"></i>Add New Coupon
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="couponForm">
                        <input type="hidden" id="couponId" name="couponId">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="couponCode" class="form-label">Coupon Code <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="couponCode" name="couponCode" placeholder="e.g., WELCOME20" required>
                                    <button type="button" class="btn btn-outline-secondary" id="generateCode">
                                        <i class="fas fa-magic"></i>
                                    </button>
                                </div>
                                <div class="form-text">Use uppercase letters and numbers only</div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="couponDescription" class="form-label">Description</label>
                                <input type="text" class="form-control" id="couponDescription" name="couponDescription" placeholder="e.g., New user discount">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="discountType" class="form-label">Discount Type <span class="text-danger">*</span></label>
                                <select class="form-select" id="discountType" name="discountType" required>
                                    <option value="">Select Type</option>
                                    <option value="percentage">Percentage (%)</option>
                                    <option value="flat">Flat Amount (₹)</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="discountValue" class="form-label">Discount Value <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="discountValue" name="discountValue" placeholder="Enter value" min="0" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="maxDiscount" class="form-label">Maximum Discount</label>
                                <input type="number" class="form-control" id="maxDiscount" name="maxDiscount" placeholder="For percentage only" min="0">
                                <div class="form-text">Leave empty for no maximum</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validFrom" class="form-label">Valid From <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="validFrom" name="validFrom" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="validTo" class="form-label">Valid To <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="validTo" name="validTo" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Applicable Plans <span class="text-danger">*</span></label>
                                <div class="border rounded p-3" style="max-height: 150px; overflow-y: auto;">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="all" id="planAll">
                                        <label class="form-check-label fw-bold" for="planAll">
                                            All Plans
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="basic" id="planBasic">
                                        <label class="form-check-label" for="planBasic">
                                            Basic Plan
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="standard" id="planStandard">
                                        <label class="form-check-label" for="planStandard">
                                            Standard Plan
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="premium" id="planPremium">
                                        <label class="form-check-label" for="planPremium">
                                            Premium Plan
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="student" id="planStudent">
                                        <label class="form-check-label" for="planStudent">
                                            Student Plan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input plan-checkbox" type="checkbox" value="enterprise" id="planEnterprise">
                                        <label class="form-check-label" for="planEnterprise">
                                            Enterprise Plan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="usageLimit" class="form-label">Usage Limit</label>
                                <input type="number" class="form-control" id="usageLimit" name="usageLimit" placeholder="Enter total uses" min="0">
                                <div class="form-text">Leave empty for unlimited usage</div>
                                
                                <label for="usagePerUser" class="form-label mt-3">Usage Per User</label>
                                <input type="number" class="form-control" id="usagePerUser" name="usagePerUser" placeholder="Uses per user" min="1" value="1">
                                <div class="form-text">Number of times a single user can use this coupon</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="minCartValue" class="form-label">Minimum Cart Value</label>
                                <input type="number" class="form-control" id="minCartValue" name="minCartValue" placeholder="Minimum amount to apply" min="0">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="couponStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="couponStatus" name="couponStatus" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" id="saveCoupon">
                        <i class="fas fa-save me-1"></i> Save Coupon
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
                    <p>Are you sure you want to delete this coupon?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        This action cannot be undone. All usage data will be lost.
                    </div>
                    <p class="mb-0"><strong>Coupon Code:</strong> <span id="deleteCouponCode" class="fw-bold">-</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">
                        <i class="fas fa-trash me-1"></i> Delete Coupon
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

    <!-- Custom JS for Coupons Page -->
    <script src="assets/js/pages/admin-coupons.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>