<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Manage Categories | Foxia - Responsive Bootstrap 5 Admin Dashboard</title>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.bootstrap5.min.css">
    
    <!-- Custom Categories CSS -->
    <link href="assets/css/pages/admin-questions-categories.css" rel="stylesheet" type="text/css">
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
                            <h6 class="page-title">Manage Categories / Subjects</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="index.php">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="admin-questions.php">Questions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Categories</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <button class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                    <i class="fas fa-plus me-1"></i> Add New Category
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stats">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium">Total Categories</p>
                                        <h4 class="mb-0">24</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                            <span class="avatar-title">
                                                <i class="fas fa-folder font-size-24"></i>
                                            </span>
                                        </div>
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
                                        <p class="text-muted fw-medium">Total Subjects</p>
                                        <h4 class="mb-0">8</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                            <span class="avatar-title">
                                                <i class="fas fa-book font-size-24"></i>
                                            </span>
                                        </div>
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
                                        <p class="text-muted fw-medium">Total Questions</p>
                                        <h4 class="mb-0">1,250</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-info">
                                            <span class="avatar-title">
                                                <i class="fas fa-question-circle font-size-24"></i>
                                            </span>
                                        </div>
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
                                        <p class="text-muted fw-medium">Uncategorized</p>
                                        <h4 class="mb-0">15</h4>
                                    </div>
                                    <div class="flex-shrink-0 align-self-center">
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-warning">
                                            <span class="avatar-title">
                                                <i class="fas fa-tag font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories Table Card -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Categories & Subjects</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end gap-2">
                                    <select class="form-select form-select-sm w-auto" id="bulkAction">
                                        <option value="">Bulk Actions</option>
                                        <option value="merge">Merge Categories</option>
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
                            <table id="categoriesTable" class="table table-hover table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="30">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll">
                                            </div>
                                        </th>
                                        <th width="80">ID</th>
                                        <th>Category Name</th>
                                        <th width="200">Parent Subject</th>
                                        <th width="120">Total Questions</th>
                                        <th width="150" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Sample Data -->
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input row-checkbox" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td><span class="badge bg-primary">CAT001</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-primary rounded-circle">
                                                            <i class="fas fa-calculator"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Algebra</h6>
                                                    <p class="text-muted mb-0 small">Equations and functions</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">Mathematics</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">150</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
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
                                        <td><span class="badge bg-primary">CAT002</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-success rounded-circle">
                                                            <i class="fas fa-shapes"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Geometry</h6>
                                                    <p class="text-muted mb-0 small">Shapes and measurements</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">Mathematics</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">120</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
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
                                        <td><span class="badge bg-primary">CAT003</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-warning rounded-circle">
                                                            <i class="fas fa-atom"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Physics</h6>
                                                    <p class="text-muted mb-0 small">Laws of motion and energy</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Science</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">200</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
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
                                        <td><span class="badge bg-primary">CAT004</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-info rounded-circle">
                                                            <i class="fas fa-vial"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Chemistry</h6>
                                                    <p class="text-muted mb-0 small">Elements and compounds</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Science</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">180</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
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
                                        <td><span class="badge bg-primary">CAT005</span></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-xs">
                                                        <div class="avatar-title bg-danger rounded-circle">
                                                            <i class="fas fa-dna"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Biology</h6>
                                                    <p class="text-muted mb-0 small">Living organisms and life</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Science</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold text-primary">160</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">
                        <i class="fas fa-plus me-2"></i>Add New Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addCategoryForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="categoryName" class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="parentSubject" class="form-label">Parent Subject</label>
                                    <select class="form-select" id="parentSubject" name="parentSubject">
                                        <option value="">Select Subject (Optional)</option>
                                        <option value="mathematics">Mathematics</option>
                                        <option value="science">Science</option>
                                        <option value="english">English</option>
                                        <option value="history">History</option>
                                        <option value="geography">Geography</option>
                                        <option value="computer_science">Computer Science</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" placeholder="Enter category description..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveCategory">
                        <i class="fas fa-save me-1"></i> Save Category
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Merge Categories Modal -->
    <div class="modal fade" id="mergeCategoriesModal" tabindex="-1" aria-labelledby="mergeCategoriesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mergeCategoriesModalLabel">
                        <i class="fas fa-object-group me-2"></i>Merge Categories
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="mergeCategoriesForm">
                        <div class="mb-3">
                            <label class="form-label">Merge From (Source Categories)</label>
                            <div id="sourceCategories" class="border rounded p-3 bg-light">
                                <!-- Selected categories will appear here -->
                                <p class="text-muted mb-0">No categories selected</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="targetCategory" class="form-label">Merge Into (Target Category)</label>
                            <select class="form-select" id="targetCategory" name="targetCategory" required>
                                <option value="">Select target category</option>
                                <option value="1">Algebra</option>
                                <option value="2">Geometry</option>
                                <option value="3">Physics</option>
                                <option value="4">Chemistry</option>
                                <option value="5">Biology</option>
                            </select>
                        </div>
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Warning:</strong> This action cannot be undone. All questions from source categories will be moved to the target category.
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning" id="confirmMerge">
                        <i class="fas fa-object-group me-1"></i> Merge Categories
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
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

    <!-- Custom Categories JS -->
    <script src="assets/js/pages/admin-questions-categories.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>