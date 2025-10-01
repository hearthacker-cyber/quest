<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Create New Test | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    
    <!-- Custom Test Creation CSS -->
    <link href="assets/css/admin-tests-create.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Tests Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-tests.php">Tests</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create New Test</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="tests.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Tests
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Steps -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="steps-wizard">
                                    <div class="step active" data-step="1">
                                        <div class="step-icon">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="step-label">Basic Details</div>
                                    </div>
                                    <div class="step" data-step="2">
                                        <div class="step-icon">
                                            <i class="fas fa-cog"></i>
                                        </div>
                                        <div class="step-label">Settings</div>
                                    </div>
                                    <div class="step" data-step="3">
                                        <div class="step-icon">
                                            <i class="fas fa-question-circle"></i>
                                        </div>
                                        <div class="step-label">Add Questions</div>
                                    </div>
                                    <div class="step" data-step="4">
                                        <div class="step-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="step-label">Finalize</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Basic Details -->
                <div class="row step-content" id="step-1">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    <i class="fas fa-info-circle text-primary me-2"></i>Basic Test Details
                                </h4>
                                
                                <form id="basicDetailsForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="testName" class="form-label">Test Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="testName" name="testName" placeholder="Enter test name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="testSubject" class="form-label">Subject/Category <span class="text-danger">*</span></label>
                                                <select class="form-select" id="testSubject" name="testSubject" required>
                                                    <option value="">Select Subject</option>
                                                    <option value="mathematics">Mathematics</option>
                                                    <option value="physics">Physics</option>
                                                    <option value="chemistry">Chemistry</option>
                                                    <option value="biology">Biology</option>
                                                    <option value="english">English</option>
                                                    <option value="computer-science">Computer Science</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="testDescription" class="form-label">Description</label>
                                                <textarea class="form-control" id="testDescription" name="testDescription" rows="3" placeholder="Brief description of the test"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="testInstructions" class="form-label">Instructions</label>
                                                <textarea class="form-control" id="testInstructions" name="testInstructions" rows="4" placeholder="Test instructions for students"></textarea>
                                                <div class="form-text">Provide clear instructions for test takers</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="mt-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" id="nextToStep2">
                                        Next <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Settings -->
                <div class="row step-content" id="step-2" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    <i class="fas fa-cog text-primary me-2"></i>Test Settings
                                </h4>
                                
                                <form id="settingsForm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="testDuration" class="form-label">Duration (minutes) <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="testDuration" name="testDuration" min="1" max="300" value="60" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="totalMarks" class="form-label">Total Marks <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="totalMarks" name="totalMarks" min="1" max="1000" value="100" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="passingMarks" class="form-label">Passing Marks <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="passingMarks" name="passingMarks" min="1" max="100" value="40" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="maxAttempts" class="form-label">Max Attempts</label>
                                                <input type="number" class="form-control" id="maxAttempts" name="maxAttempts" min="1" max="10" value="1">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="mb-3">Difficulty Mix</h6>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="easyPercent" class="form-label">Easy (%)</label>
                                                        <input type="range" class="form-range" id="easyPercent" min="0" max="100" value="30">
                                                        <div class="d-flex justify-content-between">
                                                            <span>0%</span>
                                                            <span id="easyPercentValue">30%</span>
                                                            <span>100%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="mediumPercent" class="form-label">Medium (%)</label>
                                                        <input type="range" class="form-range" id="mediumPercent" min="0" max="100" value="50">
                                                        <div class="d-flex justify-content-between">
                                                            <span>0%</span>
                                                            <span id="mediumPercentValue">50%</span>
                                                            <span>100%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="hardPercent" class="form-label">Hard (%)</label>
                                                        <input type="range" class="form-range" id="hardPercent" min="0" max="100" value="20">
                                                        <div class="d-flex justify-content-between">
                                                            <span>0%</span>
                                                            <span id="hardPercentValue">20%</span>
                                                            <span>100%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <h6 class="mb-3">Additional Settings</h6>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="shuffleQuestions" checked>
                                                        <label class="form-check-label" for="shuffleQuestions">Shuffle Questions</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="shuffleOptions" checked>
                                                        <label class="form-check-label" for="shuffleOptions">Shuffle Options</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="showResults" checked>
                                                        <label class="form-check-label" for="showResults">Show Results Immediately</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="allowBacktracking">
                                                        <label class="form-check-label" for="allowBacktracking">Allow Backtracking</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="negativeMarking">
                                                        <label class="form-check-label" for="negativeMarking">Enable Negative Marking</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="timerVisibility" checked>
                                                        <label class="form-check-label" for="timerVisibility">Show Timer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" id="backToStep1">
                                        <i class="fas fa-arrow-left me-1"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary" id="nextToStep3">
                                        Next <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Add Questions -->
                <div class="row step-content" id="step-3" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    <i class="fas fa-question-circle text-primary me-2"></i>Add Questions
                                </h4>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-outline-primary" id="addManualQuestion">
                                                <i class="fas fa-plus me-1"></i> Add Manual Question
                                            </button>
                                            <button class="btn btn-outline-success" id="importQuestions">
                                                <i class="fas fa-file-import me-1"></i> Import Questions
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-end">
                                            <span class="badge bg-primary fs-6" id="selectedQuestionsCount">0 questions selected</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="questionsTable" class="table table-bordered table-hover dt-responsive nowrap w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="3%">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="selectAllQuestions">
                                                    </div>
                                                </th>
                                                <th width="5%">ID</th>
                                                <th width="40%">Question</th>
                                                <th width="10%">Type</th>
                                                <th width="10%">Difficulty</th>
                                                <th width="10%">Marks</th>
                                                <th width="12%">Subject</th>
                                                <th width="10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Questions will be loaded dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" id="backToStep2">
                                        <i class="fas fa-arrow-left me-1"></i> Back
                                    </button>
                                    <button type="button" class="btn btn-primary" id="nextToStep4">
                                        Next <i class="fas fa-arrow-right ms-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Finalize & Publish -->
                <div class="row step-content" id="step-4" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">
                                    <i class="fas fa-check-circle text-primary me-2"></i>Finalize & Publish
                                </h4>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="preview-card">
                                            <h5 class="mb-3">Test Preview</h5>
                                            <div class="preview-section">
                                                <h6>Basic Information</h6>
                                                <div class="preview-details" id="previewBasicInfo">
                                                    <!-- Basic info will be populated -->
                                                </div>
                                            </div>
                                            
                                            <div class="preview-section">
                                                <h6>Settings</h6>
                                                <div class="preview-details" id="previewSettings">
                                                    <!-- Settings will be populated -->
                                                </div>
                                            </div>
                                            
                                            <div class="preview-section">
                                                <h6>Selected Questions</h6>
                                                <div class="preview-details" id="previewQuestions">
                                                    <!-- Questions summary will be populated -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="summary-card">
                                            <h5 class="mb-3">Quick Summary</h5>
                                            <div class="summary-stats">
                                                <div class="stat-item">
                                                    <span class="stat-label">Total Questions:</span>
                                                    <span class="stat-value" id="summaryTotalQuestions">0</span>
                                                </div>
                                                <div class="stat-item">
                                                    <span class="stat-label">Total Marks:</span>
                                                    <span class="stat-value" id="summaryTotalMarks">0</span>
                                                </div>
                                                <div class="stat-item">
                                                    <span class="stat-label">Duration:</span>
                                                    <span class="stat-value" id="summaryDuration">0 min</span>
                                                </div>
                                                <div class="stat-item">
                                                    <span class="stat-label">Difficulty Mix:</span>
                                                    <span class="stat-value">
                                                        <span id="summaryEasy">0%</span> /
                                                        <span id="summaryMedium">0%</span> /
                                                        <span id="summaryHard">0%</span>
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="confirmTestDetails">
                                                    <label class="form-check-label" for="confirmTestDetails">
                                                        I confirm all test details are correct
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" id="backToStep3">
                                        <i class="fas fa-arrow-left me-1"></i> Back
                                    </button>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary" id="saveAsDraft">
                                            <i class="fas fa-save me-1"></i> Save as Draft
                                        </button>
                                        <button type="button" class="btn btn-success" id="publishTest">
                                            <i class="fas fa-rocket me-1"></i> Publish Test
                                        </button>
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

    <!-- Add Manual Question Modal -->
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add Manual Question</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Manual question form would go here -->
                    <p>Manual question addition form would be implemented here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add Question</button>
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

    <!-- DataTables & Plugins -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <!-- Custom Test Creation JS -->
    <script src="assets/js/pages/admin-tests-create.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>