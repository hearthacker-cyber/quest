<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Transactions | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Payments Page -->
    <link href="assets/css/admin-payments.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Payment Transactions</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-subscription.php">Subscription</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payment Transactions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary" id="generateReport">
                                    <i class="fas fa-chart-bar me-1"></i> Analytics Report
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
                                        <p class="text-muted fw-medium mb-2">Total Revenue</p>
                                        <h4 class="mb-0">₹8,42,500</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <span class="font-size-24">💳</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-success">+18.3%</span>
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
                                        <p class="text-muted fw-medium mb-2">Successful</p>
                                        <h4 class="mb-0">1,158</h4>
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
                                        <p class="text-muted fw-medium mb-2">Failed</p>
                                        <h4 class="mb-0">42</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-danger">
                                        <span class="font-size-24">🎟️</span>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <span class="badge bg-danger">-12%</span>
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
                                        <p class="text-muted fw-medium mb-2">Avg. Transaction</p>
                                        <h4 class="mb-0">₹1,247</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <span class="font-size-24">👥</span>
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
                                        <label for="dateFromFilter" class="form-label">Date From</label>
                                        <input type="date" class="form-control" id="dateFromFilter" value="2024-01-01">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="dateToFilter" class="form-label">Date To</label>
                                        <input type="date" class="form-control" id="dateToFilter" value="2024-03-31">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="statusFilter" class="form-label">Status</label>
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All Status</option>
                                            <option value="success">Success</option>
                                            <option value="failed">Failed</option>
                                            <option value="pending">Pending</option>
                                            <option value="refunded">Refunded</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="paymentMethodFilter" class="form-label">Payment Method</label>
                                        <select class="form-select" id="paymentMethodFilter">
                                            <option value="">All Methods</option>
                                            <option value="upi">UPI</option>
                                            <option value="card">Credit/Debit Card</option>
                                            <option value="paypal">PayPal</option>
                                            <option value="stripe">Stripe</option>
                                            <option value="netbanking">Net Banking</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid gap-2 d-md-flex">
                                            <button type="button" class="btn btn-primary" id="applyFilters">
                                                <i class="fas fa-search me-1"></i> Apply Filters
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" id="resetFilters">
                                                <i class="fas fa-redo me-1"></i> Reset
                                            </button>
                                            <div class="ms-auto">
                                                <button type="button" class="btn btn-success" id="refreshTable">
                                                    <i class="fas fa-sync-alt me-1"></i> Refresh
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Transactions Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-credit-card me-2"></i>Payment Transactions
                                </h5>
                                <div class="export-buttons">
                                    <!-- DataTables will inject export buttons here -->
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="paymentsTable" class="table table-hover table-bordered w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>User Name</th>
                                                <th>Plan Purchased</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Successful Transactions -->
                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-primary">TXN-001</span>
                                                    <br>
                                                    <small class="text-muted">Inv-001</small>
                                                </td>
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
                                                            <small class="text-muted">1 Month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">₹499</h6>
                                                    <small class="text-muted">Incl. GST</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-google-pay text-primary me-2"></i>
                                                        <span>UPI</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Success</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-15</div>
                                                    <small class="text-muted">10:30 AM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-001">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger refund-payment" title="Refund" data-id="TXN-001">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-primary">TXN-002</span>
                                                    <br>
                                                    <small class="text-muted">Inv-002</small>
                                                </td>
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
                                                            <small class="text-muted">3 Months</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">₹2,997</h6>
                                                    <small class="text-muted">Incl. GST</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-cc-visa text-info me-2"></i>
                                                        <span>Credit Card</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Success</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-14</div>
                                                    <small class="text-muted">02:15 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-002">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger refund-payment" title="Refund" data-id="TXN-002">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-primary">TXN-015</span>
                                                    <br>
                                                    <small class="text-muted">Inv-015</small>
                                                </td>
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
                                                            <small class="text-muted">6 Months</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-success">₹11,994</h6>
                                                    <small class="text-muted">Incl. GST</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-paypal text-primary me-2"></i>
                                                        <span>PayPal</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">Success</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-13</div>
                                                    <small class="text-muted">11:45 AM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-015">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger refund-payment" title="Refund" data-id="TXN-015">
                                                            <i class="fas fa-undo"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Failed Transactions -->
                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-muted">TXN-028</span>
                                                    <br>
                                                    <small class="text-muted">Inv-028</small>
                                                </td>
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
                                                            <small class="text-muted">1 Month</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-danger">₹299</h6>
                                                    <small class="text-muted">Incl. GST</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-university text-warning me-2"></i>
                                                        <span>Net Banking</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-danger">Failed</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-12</div>
                                                    <small class="text-muted">04:20 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-028">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="Retry" data-id="TXN-028">
                                                            <i class="fas fa-redo"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Pending Transactions -->
                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-warning">TXN-042</span>
                                                    <br>
                                                    <small class="text-muted">Inv-042</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Rajesh+Mehta&background=fd7e14&color=fff" alt="" class="avatar-xs rounded-circle me-2">
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
                                                            <small class="text-muted">12 Months</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-warning">₹59,988</h6>
                                                    <small class="text-muted">Incl. GST</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-stripe text-purple me-2"></i>
                                                        <span>Stripe</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-11</div>
                                                    <small class="text-muted">09:15 AM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-042">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success" title="Approve" data-id="TXN-042">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Refunded Transactions -->
                                            <tr>
                                                <td>
                                                    <span class="fw-bold text-info">TXN-056</span>
                                                    <br>
                                                    <small class="text-muted">Inv-056</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="https://ui-avatars.com/api/?name=Sanjay+Verma&background=6f42c1&color=fff" alt="" class="avatar-xs rounded-circle me-2">
                                                        <div>
                                                            <h6 class="mb-0">Sanjay Verma</h6>
                                                            <small class="text-muted">sanjay@example.com</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge bg-success me-2">S</span>
                                                        <div>
                                                            <h6 class="mb-0">Standard Plan</h6>
                                                            <small class="text-muted">3 Months</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-info">₹2,997</h6>
                                                    <small class="text-muted">Refunded</small>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="fab fa-cc-mastercard text-danger me-2"></i>
                                                        <span>Debit Card</span>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-info">Refunded</span></td>
                                                <td>
                                                    <div class="text-nowrap">2024-03-10</div>
                                                    <small class="text-muted">03:45 PM</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <button class="btn btn-outline-primary view-invoice" title="View Invoice" data-id="TXN-056">
                                                            <i class="fas fa-receipt"></i>
                                                        </button>
                                                        <button class="btn btn-outline-secondary" title="View Refund" data-id="TXN-056">
                                                            <i class="fas fa-history"></i>
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

    <!-- View Invoice Modal -->
    <div class="modal fade" id="viewInvoiceModal" tabindex="-1" aria-labelledby="viewInvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewInvoiceModalLabel">
                        <i class="fas fa-receipt me-2"></i>Invoice Details
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Invoice Content -->
                    <div class="invoice-container bg-white p-4 border rounded">
                        <!-- Invoice Header -->
                        <div class="row mb-4">
                            <div class="col-6">
                                <h4 class="text-primary mb-1">FOXIA EDUCATION</h4>
                                <p class="text-muted mb-0">123 Learning Street</p>
                                <p class="text-muted mb-0">Mumbai, MH 400001</p>
                                <p class="text-muted mb-0">GSTIN: 27AABCU9603R1ZM</p>
                            </div>
                            <div class="col-6 text-end">
                                <h4 class="text-primary">INVOICE</h4>
                                <p class="mb-1"><strong>Invoice #:</strong> <span id="invoiceNumber">-</span></p>
                                <p class="mb-1"><strong>Date:</strong> <span id="invoiceDate">-</span></p>
                                <p class="mb-0"><strong>Due Date:</strong> <span id="invoiceDueDate">-</span></p>
                            </div>
                        </div>

                        <!-- Bill To -->
                        <div class="row mb-4">
                            <div class="col-6">
                                <h6 class="text-muted">Bill To:</h6>
                                <p class="mb-1" id="customerName">-</p>
                                <p class="mb-1" id="customerEmail">-</p>
                                <p class="mb-0" id="customerAddress">-</p>
                            </div>
                            <div class="col-6 text-end">
                                <h6 class="text-muted">Payment Method:</h6>
                                <p class="mb-1" id="paymentMethod">-</p>
                                <p class="mb-1"><strong>Status:</strong> <span id="paymentStatus">-</span></p>
                                <p class="mb-0"><strong>Transaction ID:</strong> <span id="transactionId">-</span></p>
                            </div>
                        </div>

                        <!-- Invoice Items -->
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Description</th>
                                        <th width="100" class="text-center">Duration</th>
                                        <th width="120" class="text-end">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6 class="mb-1" id="planName">-</h6>
                                            <small class="text-muted" id="planDescription">Online learning platform subscription</small>
                                        </td>
                                        <td class="text-center" id="planDuration">-</td>
                                        <td class="text-end" id="planAmount">-</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-end"><strong>Subtotal:</strong></td>
                                        <td class="text-end" id="subtotal">-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end"><strong>GST (18%):</strong></td>
                                        <td class="text-end" id="gstAmount">-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end"><strong>Total:</strong></td>
                                        <td class="text-end" id="totalAmount"><h5 class="mb-0">-</h5></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="border-top pt-3">
                            <h6 class="text-muted">Terms & Conditions:</h6>
                            <small class="text-muted">
                                • Payment is due within 15 days<br>
                                • GST included as applicable<br>
                                • Subscription auto-renews unless cancelled<br>
                                • No refunds after 7 days of purchase
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="downloadInvoice">
                        <i class="fas fa-download me-1"></i> Download PDF
                    </button>
                    <button type="button" class="btn btn-success" id="sendInvoice">
                        <i class="fas fa-paper-plane me-1"></i> Email Invoice
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Confirmation Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-warning">
                        <i class="fas fa-undo me-2"></i>Confirm Refund
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to refund this payment?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Transaction:</strong> <span id="refundTransactionId">-</span><br>
                        <strong>Amount:</strong> <span id="refundAmount">-</span><br>
                        <strong>Customer:</strong> <span id="refundCustomer">-</span>
                    </div>
                    <div class="mb-3">
                        <label for="refundReason" class="form-label">Refund Reason</label>
                        <textarea class="form-control" id="refundReason" rows="3" placeholder="Enter reason for refund..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmRefund">
                        <i class="fas fa-undo me-1"></i> Process Refund
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
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Custom JS for Payments Page -->
    <script src="assets/js/pages/admin-payments.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>