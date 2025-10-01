<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Import Questions | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    
    <!-- Custom Import Questions CSS -->
    <link href="assets/css/admin-questions-import.css" rel="stylesheet" type="text/css">
</head>

<body data-sidebar="colored">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <?php include('layout/header.php'); ?>

    <!-- ========== Left Sidebar Start ========== -->
    <?php include('layout/sidebar.php'); ?>
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
                            <h6 class="page-title">Questions Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-questions.php">Questions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Import Questions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="admin-questions.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Questions
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Import Instructions Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Import Questions</h4>
                                <p class="card-title-desc">Bulk import questions using Excel or CSV files</p>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="instruction-card">
                                            <h5><i class="fas fa-info-circle text-primary me-2"></i>Instructions</h5>
                                            <ul class="ps-3">
                                                <li>Download the template file to ensure proper formatting</li>
                                                <li>Supported formats: .xlsx, .xls, .csv</li>
                                                <li>Maximum file size: 10MB</li>
                                                <li>Required fields: Question Text, Correct Answer</li>
                                                <li>Optional fields: Options, Explanation, Difficulty, Tags</li>
                                            </ul>
                                            
                                            <div class="mt-4">
                                                <a href="assets/samples/questions-template.xlsx" class="btn btn-outline-primary">
                                                    <i class="fas fa-download me-2"></i>Download Template
                                                </a>
                                                <a href="#" class="btn btn-outline-info ms-2">
                                                    <i class="fas fa-eye me-2"></i>View Format Guidelines
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="upload-area" id="uploadArea">
                                            <div class="upload-content">
                                                <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                                <h5>Drag & Drop your file here</h5>
                                                <p class="text-muted">or click to browse</p>
                                                <span class="badge bg-light text-dark">Excel, CSV (Max 10MB)</span>
                                            </div>
                                            <input type="file" id="fileInput" class="file-input" accept=".xlsx,.xls,.csv">
                                        </div>
                                        <div id="fileInfo" class="mt-3" style="display: none;">
                                            <div class="alert alert-info d-flex align-items-center">
                                                <i class="fas fa-file me-2"></i>
                                                <span id="fileName"></span>
                                                <button type="button" class="btn-close ms-auto" id="removeFile"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Field Mapping Section -->
                <div class="row" id="mappingSection" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Field Mapping</h4>
                                <p class="card-title-desc">Map your file columns to the system fields</p>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="fieldMapping">
                                            <!-- Dynamic mapping fields will be inserted here -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="info-card">
                                            <h6><i class="fas fa-lightbulb text-warning me-2"></i>Mapping Tips</h6>
                                            <ul class="ps-3 small">
                                                <li>Required fields must be mapped</li>
                                                <li>Unmapped columns will be ignored</li>
                                                <li>You can map multiple columns to tags</li>
                                                <li>Options should be separated by semicolons</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button class="btn btn-primary" id="previewData">
                                        <i class="fas fa-eye me-2"></i>Preview Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Preview Section -->
                <div class="row" id="previewSection" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Preview</h4>
                                <p class="card-title-desc">First 5 rows of your imported data</p>
                                
                                <div class="preview-table">
                                    <table class="table table-bordered" id="previewTable">
                                        <thead>
                                            <tr id="previewHeaders">
                                                <!-- Headers will be dynamically added -->
                                            </tr>
                                        </thead>
                                        <tbody id="previewBody">
                                            <!-- Preview rows will be dynamically added -->
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="mt-4 d-flex justify-content-between">
                                    <div>
                                        <button class="btn btn-secondary" id="backToMapping">
                                            <i class="fas fa-arrow-left me-2"></i>Back to Mapping
                                        </button>
                                    </div>
                                    <div>
                                        <button class="btn btn-success" id="importData">
                                            <i class="fas fa-upload me-2"></i>Import Questions
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Import Results Section -->
                <div class="row" id="resultsSection" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Import Results</h4>
                                
                                <div id="importSummary">
                                    <!-- Results will be shown here -->
                                </div>
                                
                                <div class="mt-4">
                                    <button class="btn btn-primary" id="importAnother">
                                        <i class="fas fa-plus me-2"></i>Import Another File
                                    </button>
                                    <a href="questions.php" class="btn btn-outline-secondary ms-2">
                                        <i class="fas fa-list me-2"></i>View All Questions
                                    </a>
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

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- SheetJS for Excel parsing -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- Custom Import Questions JS -->
    <script src="assets/js/page/admin-questions-import.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>