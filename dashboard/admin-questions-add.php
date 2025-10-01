<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add New Question | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    
    <!-- TinyMCE Editor -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <!-- Custom Questions CSS -->
    <link href="ssets/css/pages/admin-questions-add.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Add New Question</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-questions.php">Questions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Question</li>
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

                <!-- Add Question Form -->
                <div class="row">
                    <div class="col-lg-8">
                        <form id="addQuestionForm">
                            <!-- Question Details Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="fas fa-edit me-2"></i>Question Details</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Question Type -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="questionType" class="form-label">Question Type <span class="text-danger">*</span></label>
                                                <select class="form-select" id="questionType" name="questionType" required>
                                                    <option value="">Select Type</option>
                                                    <option value="mcq">Multiple Choice (MCQ)</option>
                                                    <option value="true_false">True/False</option>
                                                    <option value="short_answer">Short Answer</option>
                                                    <option value="essay">Essay</option>
                                                    <option value="fill_blank">Fill in the Blank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="marks" class="form-label">Marks <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="marks" name="marks" placeholder="Enter marks" min="1" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Question Text -->
                                    <div class="mb-3">
                                        <label for="questionText" class="form-label">Question Text <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="questionText" name="questionText" rows="4" placeholder="Enter your question here..." required></textarea>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="mb-3">
                                        <label for="questionImage" class="form-label">Question Image (Optional)</label>
                                        <input type="file" class="form-control" id="questionImage" name="questionImage" accept="image/*">
                                        <div class="form-text">Supported formats: JPG, PNG, GIF. Max size: 2MB</div>
                                    </div>

                                    <!-- MCQ Options Section -->
                                    <div id="mcqOptions" class="question-type-section" style="display: none;">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0"><i class="fas fa-list-ol me-2"></i>Multiple Choice Options</h6>
                                            <button type="button" class="btn btn-sm btn-primary" id="addOption">
                                                <i class="fas fa-plus me-1"></i> Add Option
                                            </button>
                                        </div>
                                        
                                        <div id="optionsContainer">
                                            <!-- Options will be dynamically added here -->
                                        </div>
                                    </div>

                                    <!-- True/False Section -->
                                    <div id="trueFalseOptions" class="question-type-section" style="display: none;">
                                        <div class="mb-3">
                                            <label class="form-label">Correct Answer</label>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="trueFalseAnswer" id="trueAnswer" value="true">
                                                    <label class="form-check-label" for="trueAnswer">True</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="trueFalseAnswer" id="falseAnswer" value="false">
                                                    <label class="form-check-label" for="falseAnswer">False</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Short Answer Section -->
                                    <div id="shortAnswerOptions" class="question-type-section" style="display: none;">
                                        <div class="mb-3">
                                            <label for="shortAnswer" class="form-label">Expected Answer</label>
                                            <textarea class="form-control" id="shortAnswer" name="shortAnswer" rows="3" placeholder="Enter expected answer..."></textarea>
                                        </div>
                                    </div>

                                    <!-- Essay Section -->
                                    <div id="essayOptions" class="question-type-section" style="display: none;">
                                        <div class="mb-3">
                                            <label for="essayGuidelines" class="form-label">Answer Guidelines</label>
                                            <textarea class="form-control" id="essayGuidelines" name="essayGuidelines" rows="3" placeholder="Provide guidelines for evaluators..."></textarea>
                                        </div>
                                    </div>

                                    <!-- Fill in Blank Section -->
                                    <div id="fillBlankOptions" class="question-type-section" style="display: none;">
                                        <div class="mb-3">
                                            <label for="fillBlankAnswer" class="form-label">Correct Answer</label>
                                            <input type="text" class="form-control" id="fillBlankAnswer" name="fillBlankAnswer" placeholder="Enter the correct word/phrase">
                                        </div>
                                    </div>

                                    <!-- Correct Answer for all types -->
                                    <div class="mb-3">
                                        <label for="correctAnswer" class="form-label">Correct Answer <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="correctAnswer" name="correctAnswer" rows="2" placeholder="Enter correct answer..." required></textarea>
                                    </div>

                                    <!-- Explanation -->
                                    <div class="mb-3">
                                        <label for="explanation" class="form-label">Explanation (Optional)</label>
                                        <textarea class="form-control" id="explanation" name="explanation" rows="3" placeholder="Provide explanation for the answer..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Question Metadata Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="fas fa-tags me-2"></i>Question Metadata</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                                <select class="form-select" id="subject" name="subject" required>
                                                    <option value="">Select Subject</option>
                                                    <option value="mathematics">Mathematics</option>
                                                    <option value="science">Science</option>
                                                    <option value="english">English</option>
                                                    <option value="history">History</option>
                                                    <option value="geography">Geography</option>
                                                    <option value="computer_science">Computer Science</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                                <select class="form-select" id="category" name="category" required>
                                                    <option value="">Select Category</option>
                                                    <option value="algebra">Algebra</option>
                                                    <option value="geometry">Geometry</option>
                                                    <option value="physics">Physics</option>
                                                    <option value="chemistry">Chemistry</option>
                                                    <option value="biology">Biology</option>
                                                    <option value="programming">Programming</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="grade" class="form-label">Grade Level</label>
                                                <select class="form-select" id="grade" name="grade">
                                                    <option value="">Select Grade</option>
                                                    <option value="1">Grade 1</option>
                                                    <option value="2">Grade 2</option>
                                                    <option value="3">Grade 3</option>
                                                    <option value="4">Grade 4</option>
                                                    <option value="5">Grade 5</option>
                                                    <option value="6">Grade 6</option>
                                                    <option value="7">Grade 7</option>
                                                    <option value="8">Grade 8</option>
                                                    <option value="9">Grade 9</option>
                                                    <option value="10">Grade 10</option>
                                                    <option value="11">Grade 11</option>
                                                    <option value="12">Grade 12</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="difficulty" class="form-label">Difficulty Level <span class="text-danger">*</span></label>
                                                <select class="form-select" id="difficulty" name="difficulty" required>
                                                    <option value="">Select Difficulty</option>
                                                    <option value="easy">Easy</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="hard">Hard</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="mb-3">
                                        <label for="tags" class="form-label">Tags (Optional)</label>
                                        <input type="text" class="form-control" id="tags" name="tags" placeholder="Add tags separated by commas">
                                        <div class="form-text">Example: algebra, equations, quadratic</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Save Question
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary" id="saveDraft">
                                            <i class="fas fa-file-alt me-1"></i> Save as Draft
                                        </button>
                                        <button type="reset" class="btn btn-outline-danger">
                                            <i class="fas fa-times me-1"></i> Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <!-- Quick Stats -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-chart-bar me-2"></i>Question Statistics</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded stats-item">
                                    <span class="fw-medium">Total Questions</span>
                                    <span class="fw-bold text-primary">1,250</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded stats-item">
                                    <span class="fw-medium">MCQ Questions</span>
                                    <span class="fw-bold text-success">850</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3 p-2 rounded stats-item">
                                    <span class="fw-medium">True/False</span>
                                    <span class="fw-bold text-info">150</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center p-2 rounded stats-item">
                                    <span class="fw-medium">Short Answer</span>
                                    <span class="fw-bold text-warning">250</span>
                                </div>
                            </div>
                        </div>

                        <!-- Question Type Help -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-info-circle me-2"></i>Question Types</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h6 class="text-primary">MCQ</h6>
                                    <p class="small text-muted mb-2">Multiple choice questions with 2-6 options. Select one correct answer.</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-success">True/False</h6>
                                    <p class="small text-muted mb-2">Simple true or false statements. Choose the correct boolean value.</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="text-warning">Short Answer</h6>
                                    <p class="small text-muted mb-2">Brief written responses. Provide expected answer for auto-grading.</p>
                                </div>
                                <div>
                                    <h6 class="text-info">Essay</h6>
                                    <p class="small text-muted mb-0">Long-form written responses. Manual grading required.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Questions -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Recently Added</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-primary rounded-circle">
                                                <i class="fas fa-question"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">Quadratic Equations</h6>
                                        <p class="text-muted mb-0">Mathematics • 2 hours ago</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-success rounded-circle">
                                                <i class="fas fa-question"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">Newton's Laws</h6>
                                        <p class="text-muted mb-0">Physics • 5 hours ago</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-warning rounded-circle">
                                                <i class="fas fa-question"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-0 fs-14">Chemical Bonds</h6>
                                        <p class="text-muted mb-0">Chemistry • 1 day ago</p>
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

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- Custom Questions Add JS -->
    <script src="assets/js/pages/admin-questions-add.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>