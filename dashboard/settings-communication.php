<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Email / SMS Settings | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for Communication Settings -->
    <link href="assets/css/settings-communication.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Email / SMS Settings</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="settings-communication.php">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Communication Settings</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary" id="saveAllSettings">
                                    <i class="fas fa-save me-1"></i> Save All Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Email Configuration Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-envelope me-2"></i>Email Configuration
                                </h5>
                            </div>
                            <div class="card-body">
                                <form id="emailConfigForm" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="smtpHost" class="form-label">SMTP Host <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="smtpHost" value="smtp.gmail.com" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid SMTP host.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="smtpPort" class="form-label">SMTP Port <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="smtpPort" value="587" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid SMTP port.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="smtpUsername" class="form-label">SMTP Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="smtpUsername" value="noreply@foxia.com" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid SMTP username.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="smtpPassword" class="form-label">SMTP Password <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="smtpPassword" value="encryptedpassword123" required>
                                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid SMTP password.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="fromName" class="form-label">From Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="fromName" value="Foxia Education" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a from name.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fromEmail" class="form-label">From Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="fromEmail" value="noreply@foxia.com" required>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid email address.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="encryption" class="form-label">Encryption</label>
                                            <select class="form-select" id="encryption">
                                                <option value="tls" selected>TLS</option>
                                                <option value="ssl">SSL</option>
                                                <option value="none">None</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Test Configuration</label>
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-outline-primary" id="testEmailConfig">
                                                    <i class="fas fa-paper-plane me-1"></i> Send Test Email
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="emailEnabled" checked>
                                                <label class="form-check-label fw-bold" for="emailEnabled">
                                                    Enable Email Notifications
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SMS Configuration Card -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-sms me-2"></i>SMS Configuration
                                </h5>
                            </div>
                            <div class="card-body">
                                <form id="smsConfigForm" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="smsProvider" class="form-label">SMS Provider <span class="text-danger">*</span></label>
                                            <select class="form-select" id="smsProvider" required>
                                                <option value="">Choose provider...</option>
                                                <option value="twilio" selected>Twilio</option>
                                                <option value="msg91">MSG91</option>
                                                <option value="textlocal">TextLocal</option>
                                                <option value="fast2sms">Fast2SMS</option>
                                                <option value="custom">Custom Provider</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please select an SMS provider.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apiKey" class="form-label">API Key <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="apiKey" value="sk_encryptedapikey12345" required>
                                                <button class="btn btn-outline-secondary" type="button" id="toggleApiKey">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid API key.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="apiSecret" class="form-label">API Secret</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="apiSecret" value="encryptedsecret123">
                                                <button class="btn btn-outline-secondary" type="button" id="toggleApiSecret">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="senderId" class="form-label">Sender ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="senderId" value="FOXIAE" required maxlength="6">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide a valid sender ID (max 6 characters).
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="smsTestNumber" class="form-label">Test Phone Number</label>
                                            <input type="tel" class="form-control" id="smsTestNumber" placeholder="+91 9876543210">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Test Configuration</label>
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-outline-primary" id="testSmsConfig">
                                                    <i class="fas fa-mobile-alt me-1"></i> Send Test SMS
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="smsEnabled">
                                                <label class="form-check-label fw-bold" for="smsEnabled">
                                                    Enable SMS Notifications
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Notification Preferences Card -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="fas fa-bell me-2"></i>Notification Preferences
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">Email Notifications</h6>
                                        <div class="notification-list">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="emailUserSignup" checked data-type="email">
                                                <label class="form-check-label" for="emailUserSignup">
                                                    <strong>User Signup</strong>
                                                    <small class="text-muted d-block">Send welcome email when new user registers</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="emailPaymentSuccess" checked data-type="email">
                                                <label class="form-check-label" for="emailPaymentSuccess">
                                                    <strong>Payment Success</strong>
                                                    <small class="text-muted d-block">Send receipt when payment is successful</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="emailTestAssigned" checked data-type="email">
                                                <label class="form-check-label" for="emailTestAssigned">
                                                    <strong>Test Assigned</strong>
                                                    <small class="text-muted d-block">Notify users when assigned a new test</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="emailTestCompleted" checked data-type="email">
                                                <label class="form-check-label" for="emailTestCompleted">
                                                    <strong>Test Completed</strong>
                                                    <small class="text-muted d-block">Send results when test is completed</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="emailPasswordReset" checked data-type="email">
                                                <label class="form-check-label" for="emailPasswordReset">
                                                    <strong>Password Reset</strong>
                                                    <small class="text-muted d-block">Send reset link when password reset requested</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="border-bottom pb-2 mb-3">SMS Notifications</h6>
                                        <div class="notification-list">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="smsUserSignup" data-type="sms">
                                                <label class="form-check-label" for="smsUserSignup">
                                                    <strong>User Signup</strong>
                                                    <small class="text-muted d-block">Send welcome SMS when new user registers</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="smsPaymentSuccess" data-type="sms">
                                                <label class="form-check-label" for="smsPaymentSuccess">
                                                    <strong>Payment Success</strong>
                                                    <small class="text-muted d-block">Send confirmation SMS for successful payments</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="smsTestAssigned" data-type="sms">
                                                <label class="form-check-label" for="smsTestAssigned">
                                                    <strong>Test Assigned</strong>
                                                    <small class="text-muted d-block">SMS alert when test is assigned</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="smsTestCompleted" data-type="sms">
                                                <label class="form-check-label" for="smsTestCompleted">
                                                    <strong>Test Completed</strong>
                                                    <small class="text-muted d-block">SMS notification when test is completed</small>
                                                </label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input notification-checkbox" type="checkbox" id="smsPasswordReset" data-type="sms">
                                                <label class="form-check-label" for="smsPasswordReset">
                                                    <strong>Password Reset</strong>
                                                    <small class="text-muted d-block">SMS with OTP for password reset</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Note:</strong> SMS notifications will only be sent if SMS configuration is enabled and valid.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mt-4">
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
                                            <button class="btn btn-outline-primary" id="validateConfig">
                                                <i class="fas fa-check-circle me-2"></i>Validate Config
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-success" id="testAllNotifications">
                                                <i class="fas fa-vial me-2"></i>Test All
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-info" id="resetToDefaults">
                                                <i class="fas fa-undo me-2"></i>Reset Defaults
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="d-grid">
                                            <button class="btn btn-outline-warning" id="viewLogs">
                                                <i class="fas fa-history me-2"></i>View Logs
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

    <!-- Test Configuration Modal -->
    <div class="modal fade" id="testConfigModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testConfigModalTitle">
                        <i class="fas fa-cog me-2"></i>Test Configuration
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="testConfigContent">
                        <!-- Content will be loaded dynamically -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmTest">Send Test</button>
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

    <!-- Custom JS for Communication Settings -->
    <script src="assets/js/pages/settings-communication.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>