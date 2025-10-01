<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>General Settings | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    
    <!-- Custom Settings CSS -->
    <link href="assets/css/settings-general.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">General Settings</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="../index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-success btn-rounded" type="button" id="saveSettings">
                                    <i class="fas fa-save me-1"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings Form -->
                <form id="generalSettingsForm" novalidate>
                    <!-- Platform Settings Card -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-cog me-2"></i>Platform Settings
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="platformName" class="form-label">Platform Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="platformName" 
                                                       value="Foxia Learning Platform" required>
                                                <div class="invalid-feedback">
                                                    Please provide a platform name.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="supportEmail" class="form-label">Support Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="supportEmail" 
                                                       value="support@foxia.com" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid email address.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="tagline" class="form-label">Tagline / Meta Description</label>
                                        <textarea class="form-control" id="tagline" rows="3" 
                                                  placeholder="Brief description of your platform">Premium Multipurpose Learning & Assessment Platform for Students and Educators</textarea>
                                        <div class="form-text">This will be used as the meta description for SEO purposes.</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="logoUpload" class="form-label">Platform Logo</label>
                                                <input type="file" class="form-control" id="logoUpload" accept="image/*">
                                                <div class="form-text">Recommended size: 200x50 pixels. Max file size: 2MB</div>
                                                
                                                <!-- Logo Preview -->
                                                <div class="mt-3" id="logoPreview">
                                                    <div class="preview-container">
                                                        <img src="../assets/images/logo-dark.png" alt="Current Logo" class="img-thumbnail" style="max-height: 60px;">
                                                        <div class="preview-overlay">
                                                            <button type="button" class="btn btn-sm btn-danger" id="removeLogo">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="faviconUpload" class="form-label">Favicon</label>
                                                <input type="file" class="form-control" id="faviconUpload" accept="image/x-icon,image/png">
                                                <div class="form-text">Recommended size: 32x32 pixels. Formats: ICO, PNG</div>
                                                
                                                <!-- Favicon Preview -->
                                                <div class="mt-3" id="faviconPreview">
                                                    <div class="preview-container">
                                                        <img src="../assets/images/favicon.ico" alt="Current Favicon" class="img-thumbnail" style="width: 32px; height: 32px;">
                                                        <div class="preview-overlay">
                                                            <button type="button" class="btn btn-sm btn-danger" id="removeFavicon">
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
                    </div>

                    <!-- Contact Information Card -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-address-book me-2"></i>Contact Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="supportPhone" class="form-label">Support Phone</label>
                                                <input type="tel" class="form-control" id="supportPhone" 
                                                       value="+91 98765 43210" placeholder="+91 98765 43210">
                                                <div class="invalid-feedback">
                                                    Please provide a valid phone number.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="supportHours" class="form-label">Support Hours</label>
                                                <input type="text" class="form-control" id="supportHours" 
                                                       value="9:00 AM - 6:00 PM (Mon-Sat)">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="companyAddress" class="form-label">Company Address</label>
                                        <textarea class="form-control" id="companyAddress" rows="3" 
                                                  placeholder="Enter your company address">Foxia Education Solutions Pvt. Ltd.
123 Tech Park, Sector 62
Noida, Uttar Pradesh 201309
India</textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="websiteUrl" class="form-label">Website URL</label>
                                                <input type="url" class="form-control" id="websiteUrl" 
                                                       value="https://foxia.com" placeholder="https://yourwebsite.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="companyEmail" class="form-label">Company Email</label>
                                                <input type="email" class="form-control" id="companyEmail" 
                                                       value="info@foxia.com" placeholder="company@email.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Localization Settings Card -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-transparent border-bottom">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-globe me-2"></i>Localization Settings
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="defaultLanguage" class="form-label">Default Language <span class="text-danger">*</span></label>
                                                <select class="form-select" id="defaultLanguage" required>
                                                    <option value="en" selected>English</option>
                                                    <option value="hi">Hindi (हिन्दी)</option>
                                                    <option value="ta">Tamil (தமிழ்)</option>
                                                    <option value="te">Telugu (తెలుగు)</option>
                                                    <option value="bn">Bengali (বাংলা)</option>
                                                    <option value="mr">Marathi (मराठी)</option>
                                                    <option value="gu">Gujarati (ગુજરાતી)</option>
                                                    <option value="kn">Kannada (ಕನ್ನಡ)</option>
                                                    <option value="ml">Malayalam (മലയാളം)</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a default language.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="timeZone" class="form-label">Time Zone <span class="text-danger">*</span></label>
                                                <select class="form-select" id="timeZone" required>
                                                    <option value="Asia/Kolkata" selected>(UTC+5:30) Asia/Kolkata - India Standard Time</option>
                                                    <option value="Asia/Dubai">(UTC+4) Asia/Dubai - Gulf Standard Time</option>
                                                    <option value="Asia/Singapore">(UTC+8) Asia/Singapore - Singapore Time</option>
                                                    <option value="America/New_York">(UTC-5) America/New_York - Eastern Time</option>
                                                    <option value="Europe/London">(UTC+0) Europe/London - Greenwich Mean Time</option>
                                                    <option value="Asia/Tokyo">(UTC+9) Asia/Tokyo - Japan Standard Time</option>
                                                    <option value="Australia/Sydney">(UTC+10) Australia/Sydney - Australian Eastern Time</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a time zone.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="dateFormat" class="form-label">Date Format <span class="text-danger">*</span></label>
                                                <select class="form-select" id="dateFormat" required>
                                                    <option value="dd-mm-yyyy" selected>DD-MM-YYYY (15-01-2024)</option>
                                                    <option value="mm-dd-yyyy">MM-DD-YYYY (01-15-2024)</option>
                                                    <option value="yyyy-mm-dd">YYYY-MM-DD (2024-01-15)</option>
                                                    <option value="dd/mm/yyyy">DD/MM/YYYY (15/01/2024)</option>
                                                    <option value="mm/dd/yyyy">MM/DD/YYYY (01/15/2024)</option>
                                                    <option value="yyyy/mm/dd">YYYY/MM/DD (2024/01/15)</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select a date format.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="currency" class="form-label">Default Currency</label>
                                                <select class="form-select" id="currency">
                                                    <option value="INR" selected>Indian Rupee (₹)</option>
                                                    <option value="USD">US Dollar ($)</option>
                                                    <option value="EUR">Euro (€)</option>
                                                    <option value="GBP">British Pound (£)</option>
                                                    <option value="AED">UAE Dirham (د.إ)</option>
                                                    <option value="SAR">Saudi Riyal (﷼)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="numberFormat" class="form-label">Number Format</label>
                                                <select class="form-select" id="numberFormat">
                                                    <option value="en-IN" selected>Indian (1,00,000)</option>
                                                    <option value="en-US">International (100,000)</option>
                                                    <option value="de-DE">European (100.000)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="weekStart" class="form-label">Week Starts On</label>
                                                <select class="form-select" id="weekStart">
                                                    <option value="0" selected>Sunday</option>
                                                    <option value="1">Monday</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Save Button -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <button type="submit" class="btn btn-success btn-lg px-5" id="saveSettingsBtn">
                                        <i class="fas fa-save me-2"></i>Save All Changes
                                    </button>
                                    <button type="button" class="btn btn-secondary btn-lg px-5 ms-2" id="resetSettings">
                                        <i class="fas fa-undo me-2"></i>Reset to Default
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

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

    <!-- Custom Settings JS -->
    <script src="assets/js/pages/settings-general.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>