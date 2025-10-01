<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Difficulty Levels | Foxia - Admin Dashboard</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
    
    <!-- Custom Difficulty Levels CSS -->
    <link href="assets/css/admin-questions-level.css" rel="stylesheet" type="text/css">
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
                                <li class="breadcrumb-item active" aria-current="page">Difficulty Levels</li>
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

                <!-- Add New Difficulty Level Card -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Difficulty Level</h4>
                                <p class="card-title-desc">Create new difficulty levels for questions</p>
                                
                                <form id="addDifficultyForm">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="levelName" class="form-label">Level Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="levelName" name="levelName" placeholder="e.g., Easy, Medium, Hard" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="levelWeight" class="form-label">Weight/Marks <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="levelWeight" name="levelWeight" min="1" max="100" step="0.5" placeholder="e.g., 1.0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label for="levelDescription" class="form-label">Description</label>
                                                <input type="text" class="form-control" id="levelDescription" name="levelDescription" placeholder="Brief description of this difficulty level">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label class="form-label">&nbsp;</label>
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <i class="fas fa-plus me-1"></i> Add Level
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Difficulty Levels Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title">Difficulty Levels</h4>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-secondary" id="refreshTable">
                                            <i class="fas fa-sync-alt me-1"></i> Refresh
                                        </button>
                                        <button class="btn btn-outline-success" id="exportTable">
                                            <i class="fas fa-download me-1"></i> Export
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table id="difficultyTable" class="table table-bordered table-hover dt-responsive nowrap w-100">
                                        <thead class="table-light">
                                            <tr>
                                                <th width="5%">Level ID</th>
                                                <th width="20%">Name</th>
                                                <th width="15%">Weight/Marks</th>
                                                <th width="40%">Description</th>
                                                <th width="10%">Questions</th>
                                                <th width="10%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Total Levels</p>
                                        <h4 class="mb-0" id="totalLevels">0</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-primary">
                                        <i class="fas fa-layer-group font-size-24 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Active Questions</p>
                                        <h4 class="mb-0" id="totalQuestions">0</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-success">
                                        <i class="fas fa-question-circle font-size-24 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Most Used</p>
                                        <h4 class="mb-0" id="mostUsed">-</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-info">
                                        <i class="fas fa-star font-size-24 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-2">Avg. Weight</p>
                                        <h4 class="mb-0" id="avgWeight">0.0</h4>
                                    </div>
                                    <div class="mini-stat-icon align-self-center rounded-circle bg-warning">
                                        <i class="fas fa-balance-scale font-size-24 text-white"></i>
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

    <!-- Edit Difficulty Modal -->
    <div class="modal fade" id="editDifficultyModal" tabindex="-1" aria-labelledby="editDifficultyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDifficultyModalLabel">Edit Difficulty Level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editDifficultyForm">
                        <input type="hidden" id="editLevelId">
                        <div class="mb-3">
                            <label for="editLevelName" class="form-label">Level Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editLevelName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLevelWeight" class="form-label">Weight/Marks <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="editLevelWeight" min="1" max="100" step="0.5" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLevelDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editLevelDescription" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveDifficultyChanges">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the difficulty level "<strong id="deleteLevelName"></strong>"?</p>
                    <p class="text-danger small mb-0">This action cannot be undone. Questions using this level will need to be reassigned.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete Level</button>
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
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

    <!-- Custom Difficulty Levels JS -->
    <script src="assets/js/admin-questions-level.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>