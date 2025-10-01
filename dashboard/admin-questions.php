<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>All Questions | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    
    <!-- Custom Questions CSS -->
    <link href="assets/css/admin-questions.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">All Questions</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item active" aria-current="page">All Questions</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="admin-questions-add.php" class="btn btn-primary btn-rounded">
                                    <i class="fas fa-plus me-1"></i> Add New Question
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters Card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"><i class="fas fa-filter me-2"></i>Filters & Search</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Subject</label>
                                <select class="form-select" id="filterSubject">
                                    <option value="">All Subjects</option>
                                    <option value="mathematics">Mathematics</option>
                                    <option value="science">Science</option>
                                    <option value="english">English</option>
                                    <option value="history">History</option>
                                    <option value="geography">Geography</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Category</label>
                                <select class="form-select" id="filterCategory">
                                    <option value="">All Categories</option>
                                    <option value="algebra">Algebra</option>
                                    <option value="geometry">Geometry</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemistry">Chemistry</option>
                                    <option value="biology">Biology</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Difficulty</label>
                                <select class="form-select" id="filterDifficulty">
                                    <option value="">All Levels</option>
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Question Type</label>
                                <select class="form-select" id="filterType">
                                    <option value="">All Types</option>
                                    <option value="mcq">Multiple Choice</option>
                                    <option value="true_false">True/False</option>
                                    <option value="short_answer">Short Answer</option>
                                    <option value="essay">Essay</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Status</label>
                                <select class="form-select" id="filterStatus">
                                    <option value="">All Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">
                                <label class="form-label">Search</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="searchBox" placeholder="Search questions...">
                                    <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button class="btn btn-outline-secondary btn-sm" id="resetFilters">
                                    <i class="fas fa-redo me-1"></i> Reset Filters
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Questions Table Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Questions List</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end gap-2">
                                    <select class="form-select form-select-sm w-auto" id="bulkAction">
                                        <option value="">Bulk Actions</option>
                                        <option value="activate">Activate</option>
                                        <option value="deactivate">Deactivate</option>
                                        <option value="delete">Delete</option>
                                    </select>
                                    <button class="btn btn-primary btn-sm" id="applyBulkAction">
                                        <i class="fas fa-play me-1"></i> Apply
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="questionsTable" class="table table-hover table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="30">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                            </div>
                                        </th>
                                        <th width="80">QID</th>
                                        <th>Question Preview</th>
                                        <th width="200">Subject/Category</th>
                                        <th width="120">Difficulty</th>
                                        <th width="120">Type</th>
                                        <th width="100">Status</th>
                                        <th width="150" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Data - In real application, this would come from database -->
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Q001</span></td>
                                        <td>What is the formula for calculating the area of a circle?</td>
                                        <td>
                                            <div>
                                                <span class="badge bg-info">Mathematics</span>
                                                <div class="text-muted small">Geometry</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Easy</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">MCQ</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="2">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Q002</span></td>
                                        <td>Explain Newton's First Law of Motion with examples...</td>
                                        <td>
                                            <div>
                                                <span class="badge bg-info">Science</span>
                                                <div class="text-muted small">Physics</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">Medium</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">Short Answer</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="3">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Q003</span></td>
                                        <td>The capital of France is Paris. (True/False)</td>
                                        <td>
                                            <div>
                                                <span class="badge bg-info">Geography</span>
                                                <div class="text-muted small">World Capitals</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Easy</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">True/False</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">Draft</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="4">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Q004</span></td>
                                        <td>Solve the quadratic equation: x² + 5x + 6 = 0</td>
                                        <td>
                                            <div>
                                                <span class="badge bg-info">Mathematics</span>
                                                <div class="text-muted small">Algebra</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-warning">Medium</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">Short Answer</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="5">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">Q005</span></td>
                                        <td>Which of the following is not a programming language?</td>
                                        <td>
                                            <div>
                                                <span class="badge bg-info">Computer Science</span>
                                                <div class="text-muted small">Programming</div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">Hard</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">MCQ</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">Inactive</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-primary" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-info" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" title="Delete">
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

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>

    <!-- Custom Questions JS -->
    <script src="assets/js/pages/admin-questions.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>