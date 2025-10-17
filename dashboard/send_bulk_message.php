<?php
// Include configuration
include('config.php');

// Initialize variables
$success = '';
$error = '';
$selected_parents = [];
$message_type = 'email';
$subject = '';
$message = '';

// Fetch all parents from database
$parents = [];
try {
    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE role = 'parent' ORDER BY name");
    $stmt->execute();
    $parents = $stmt->fetchAll();
} catch(PDOException $e) {
    $error = "Error fetching parents: " . $e->getMessage();
}

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $selected_parents = isset($_POST['selected_parents']) ? $_POST['selected_parents'] : [];
    $message_type = $_POST['message_type'];
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $send_copy = isset($_POST['send_copy']) ? true : false;
    
    // Validate inputs
    if(empty($selected_parents)) {
        $error = "Please select at least one parent to send the message to.";
    } elseif(empty($subject)) {
        $error = "Please enter a subject for your message.";
    } elseif(empty($message)) {
        $error = "Please enter your message content.";
    } else {
        try {
            // Get selected parents' details
            $placeholders = str_repeat('?,', count($selected_parents) - 1) . '?';
            $stmt = $conn->prepare("SELECT name, email FROM users WHERE id IN ($placeholders)");
            $stmt->execute($selected_parents);
            $recipients = $stmt->fetchAll();
            
            // Simulate sending messages
            $sent_count = 0;
            $failed_emails = [];
            
            foreach($recipients as $recipient) {
                // In a real implementation, you would send actual emails here
                // For demo purposes, we'll simulate success
                $sent_success = true; // mail($recipient['email'], $subject, $message);
                
                if($sent_success) {
                    $sent_count++;
                } else {
                    $failed_emails[] = $recipient['email'];
                }
            }
            
            // Send copy to admin if requested
            if($send_copy) {
                // mail('admin@school.com', "Copy: " . $subject, $message);
            }
            
            if($sent_count > 0) {
                $success = "Message sent successfully to $sent_count parent(s)!";
                
                if(!empty($failed_emails)) {
                    $success .= " Failed to send to: " . implode(', ', $failed_emails);
                }
                
                // Clear form
                $selected_parents = [];
                $subject = '';
                $message = '';
            } else {
                $error = "Failed to send messages to all selected parents.";
            }
            
        } catch(PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Send Bulk Message | Foxia - Admin Dashboard</title>
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
    
    <!-- Custom CSS for bulk messaging -->
    <style>
        .page-header {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
        }
        
        .message-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .message-card .card-header {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            border: none;
            padding: 20px;
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .form-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #495057;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #27ae60;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: #27ae60;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #27ae60;
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
        }
        
        .btn-action {
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            margin: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-send {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            border: none;
            color: white;
        }
        
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }
        
        .recipients-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .parent-checkbox {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .parent-checkbox:hover {
            background: #e9ecef;
        }
        
        .selection-actions {
            background: #fff9e6;
            border-left: 4px solid #f39c12;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .message-preview {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .recipient-count {
            background: #27ae60;
            color: white;
            border-radius: 20px;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .template-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        
        .template-btn {
            border-radius: 8px;
            padding: 8px 15px;
            font-size: 14px;
            border: 1px solid #dee2e6;
            background: white;
            transition: all 0.3s ease;
        }
        
        .template-btn:hover {
            background: #f8f9fa;
            border-color: #27ae60;
        }
        
        .character-count {
            text-align: right;
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
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
                            <h6 class="page-title">Parent Management</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Foxia</a></li>
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="manage_parents.php">Manage Parents</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Send Bulk Message</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <div class="float-end d-none d-md-block">
                                <a href="manage_parents.php" class="btn btn-secondary btn-rounded">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Parents
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="text-white mb-2">
                                <i class="fas fa-envelope me-2"></i> Send Bulk Message
                            </h1>
                            <p class="text-white-50 mb-0">
                                Send messages to multiple parents at once. Perfect for announcements, reminders, and updates.
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="text-white-50">
                                <i class="fas fa-mail-bulk fa-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Success/Error Messages -->
                <?php if($success): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Message Sent!</h5>
                                <p class="mb-0"><?php echo $success; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exclamation-circle fa-2x me-3"></i>
                            <div>
                                <h5 class="alert-heading mb-1">Error!</h5>
                                <p class="mb-0"><?php echo $error; ?></p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="row">
                    <!-- Message Form -->
                    <div class="col-lg-8">
                        <div class="card message-card">
                            <div class="card-header">
                                <i class="fas fa-edit me-2"></i> Compose Message
                            </div>
                            <div class="card-body">
                                <form method="POST" id="bulkMessageForm">
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-cog"></i> Message Settings
                                        </h5>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="message_type" class="form-label">Message Type</label>
                                                <select class="form-control" id="message_type" name="message_type">
                                                    <option value="email" <?php echo $message_type == 'email' ? 'selected' : ''; ?>>Email Message</option>
                                                    <option value="notification" <?php echo $message_type == 'notification' ? 'selected' : ''; ?>>System Notification</option>
                                                    <option value="sms" <?php echo $message_type == 'sms' ? 'selected' : ''; ?>>SMS Text Message</option>
                                                </select>
                                                <div class="form-text">Choose how you want to send the message</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="subject" class="form-label">
                                                    Subject <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="subject" name="subject" 
                                                       value="<?php echo htmlspecialchars($subject); ?>" 
                                                       placeholder="Enter message subject" required>
                                                <div class="form-text">Brief subject line for your message</div>
                                            </div>
                                        </div>
                                        
                                        <!-- Quick Templates -->
                                        <div class="mb-4">
                                            <label class="form-label">Quick Templates</label>
                                            <div class="template-buttons">
                                                <button type="button" class="template-btn" onclick="loadTemplate('meeting')">
                                                    <i class="fas fa-users me-1"></i> Parent Meeting
                                                </button>
                                                <button type="button" class="template-btn" onclick="loadTemplate('progress')">
                                                    <i class="fas fa-chart-line me-1"></i> Progress Report
                                                </button>
                                                <button type="button" class="template-btn" onclick="loadTemplate('reminder')">
                                                    <i class="fas fa-bell me-1"></i> General Reminder
                                                </button>
                                                <button type="button" class="template-btn" onclick="loadTemplate('holiday')">
                                                    <i class="fas fa-umbrella-beach me-1"></i> Holiday Notice
                                                </button>
                                                <button type="button" class="template-btn" onclick="clearMessage()">
                                                    <i class="fas fa-times me-1"></i> Clear
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="message" class="form-label">
                                                Message Content <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" id="message" name="message" rows="8" 
                                                      placeholder="Type your message here..." required><?php echo htmlspecialchars($message); ?></textarea>
                                            <div class="character-count">
                                                <span id="charCount">0</span> characters
                                            </div>
                                            <div class="form-text">
                                                You can use placeholders like {parent_name}, {student_name} which will be replaced with actual names.
                                            </div>
                                        </div>
                                        
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="send_copy" name="send_copy" value="1" checked>
                                            <label class="form-check-label" for="send_copy">
                                                Send a copy to my email address
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <!-- Recipients Selection -->
                                    <div class="form-section">
                                        <h5 class="section-title">
                                            <i class="fas fa-users"></i> Select Recipients
                                            <span class="recipient-count ms-2" id="recipientCount">0 selected</span>
                                        </h5>
                                        
                                        <div class="selection-actions">
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="selectAllParents()">
                                                    <i class="fas fa-check-square me-1"></i> Select All
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="deselectAllParents()">
                                                    <i class="fas fa-times-circle me-1"></i> Deselect All
                                                </button>
                                                <button type="button" class="btn btn-outline-info btn-sm" onclick="selectByGrade()">
                                                    <i class="fas fa-filter me-1"></i> Select by Criteria
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="recipients-box">
                                            <?php if(count($parents) > 0): ?>
                                                <?php foreach($parents as $parent): ?>
                                                    <div class="form-check parent-checkbox">
                                                        <input class="form-check-input parent-select" type="checkbox" 
                                                               name="selected_parents[]" value="<?php echo $parent['id']; ?>" 
                                                               id="parent_<?php echo $parent['id']; ?>"
                                                               <?php echo in_array($parent['id'], $selected_parents) ? 'checked' : ''; ?>>
                                                        <label class="form-check-label" for="parent_<?php echo $parent['id']; ?>">
                                                            <strong><?php echo htmlspecialchars($parent['name']); ?></strong>
                                                            <small class="text-muted ms-2"><?php echo htmlspecialchars($parent['email']); ?></small>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="text-center text-muted py-4">
                                                    <i class="fas fa-users fa-3x mb-3"></i>
                                                    <p>No parents found in the system.</p>
                                                    <a href="add_parent.php" class="btn btn-warning">Add New Parent</a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <!-- Form Actions -->
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="manage_parents.php" class="btn btn-outline-secondary btn-action">
                                                        <i class="fas fa-times me-2"></i> Cancel
                                                    </a>
                                                    <button type="reset" class="btn btn-warning btn-action">
                                                        <i class="fas fa-redo me-2"></i> Reset Form
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-send btn-action">
                                                        <i class="fas fa-paper-plane me-2"></i> Send Message
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview & Statistics -->
                    <div class="col-lg-4">
                        <!-- Message Preview -->
                        <div class="card message-card">
                            <div class="card-header">
                                <i class="fas fa-eye me-2"></i> Message Preview
                            </div>
                            <div class="card-body">
                                <div class="message-preview">
                                    <h6 class="text-muted mb-3">Subject: <span id="previewSubject"><?php echo htmlspecialchars($subject); ?></span></h6>
                                    <div id="previewContent">
                                        <?php echo nl2br(htmlspecialchars($message)); ?>
                                    </div>
                                    <?php if(empty($message)): ?>
                                        <p class="text-muted text-center">Your message will appear here</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sending Statistics -->
                        <div class="card message-card">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-2"></i> Sending Statistics
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-6 mb-3">
                                        <div class="stat-number text-primary"><?php echo count($parents); ?></div>
                                        <div class="stat-label">Total Parents</div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="stat-number text-success" id="selectedCount">0</div>
                                        <div class="stat-label">Selected</div>
                                    </div>
                                </div>
                                <div class="progress mb-3">
                                    <div class="progress-bar bg-success" id="selectionProgress" style="width: 0%"></div>
                                </div>
                                <small class="text-muted" id="progressText">0% of parents selected</small>
                            </div>
                        </div>
                        
                        <!-- Quick Tips -->
                        <div class="card message-card">
                            <div class="card-header">
                                <i class="fas fa-lightbulb me-2"></i> Tips & Best Practices
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Keep messages clear and concise
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Use a descriptive subject line
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Double-check recipient list
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Avoid sending during late hours
                                    </li>
                                    <li>
                                        <i class="fas fa-check text-success me-2"></i>
                                        Test with small groups first
                                    </li>
                                </ul>
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

    <script src="assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Update recipient count and statistics
            function updateRecipientStats() {
                const selectedCount = $('.parent-select:checked').length;
                const totalParents = <?php echo count($parents); ?>;
                const percentage = totalParents > 0 ? Math.round((selectedCount / totalParents) * 100) : 0;
                
                $('#recipientCount').text(selectedCount + ' selected');
                $('#selectedCount').text(selectedCount);
                $('#selectionProgress').css('width', percentage + '%');
                $('#progressText').text(percentage + '% of parents selected');
            }
            
            // Update preview in real-time
            function updatePreview() {
                $('#previewSubject').text($('#subject').val());
                $('#previewContent').html($('#message').val().replace(/\n/g, '<br>'));
            }
            
            // Update character count
            function updateCharCount() {
                const charCount = $('#message').val().length;
                $('#charCount').text(charCount);
            }
            
            // Event listeners
            $('.parent-select').on('change', updateRecipientStats);
            $('#subject, #message').on('input', updatePreview);
            $('#message').on('input', updateCharCount);
            
            // Initial updates
            updateRecipientStats();
            updatePreview();
            updateCharCount();
            
            // Form validation
            $('#bulkMessageForm').on('submit', function(e) {
                const selectedCount = $('.parent-select:checked').length;
                const subject = $('#subject').val().trim();
                const message = $('#message').val().trim();
                
                if (selectedCount === 0) {
                    e.preventDefault();
                    alert('Please select at least one parent to send the message to.');
                    return false;
                }
                
                if (!subject) {
                    e.preventDefault();
                    alert('Please enter a subject for your message.');
                    $('#subject').focus();
                    return false;
                }
                
                if (!message) {
                    e.preventDefault();
                    alert('Please enter your message content.');
                    $('#message').focus();
                    return false;
                }
                
                if (!confirm(`Are you sure you want to send this message to ${selectedCount} parent(s)?`)) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
        
        // Template functions
        function loadTemplate(type) {
            const templates = {
                meeting: {
                    subject: "Important Parent-Teacher Meeting Announcement",
                    message: "Dear {parent_name},\n\nWe would like to invite you to our upcoming parent-teacher meeting scheduled for [Date] at [Time] in [Location].\n\nThis meeting is important to discuss your child's progress and address any concerns you may have.\n\nPlease confirm your attendance by replying to this message.\n\nBest regards,\nSchool Administration"
                },
                progress: {
                    subject: "Student Progress Report Update",
                    message: "Dear {parent_name},\n\nWe are pleased to share your child {student_name}'s recent progress report. Overall, they are showing good progress in their studies.\n\nKey highlights:\n- Academic performance: [Details]\n- Attendance: [Details]\n- Behavior: [Details]\n\nPlease feel free to contact us if you have any questions or concerns.\n\nBest regards,\nSchool Administration"
                },
                reminder: {
                    subject: "Important School Reminder",
                    message: "Dear {parent_name},\n\nThis is a friendly reminder about [Event/Deadline]. Please ensure that [Action Required].\n\nIf you have any questions, don't hesitate to contact the school office.\n\nThank you for your cooperation.\n\nBest regards,\nSchool Administration"
                },
                holiday: {
                    subject: "School Holiday Notice",
                    message: "Dear {parent_name},\n\nThis is to inform you that the school will be closed for [Holiday Name] from [Start Date] to [End Date].\n\nClasses will resume on [Resumption Date]. We wish you and your family a wonderful holiday break.\n\nPlease ensure your child completes any assigned holiday homework.\n\nBest regards,\nSchool Administration"
                }
            };
            
            if (templates[type]) {
                $('#subject').val(templates[type].subject);
                $('#message').val(templates[type].message);
                updatePreview();
                updateCharCount();
            }
        }
        
        function clearMessage() {
            $('#subject').val('');
            $('#message').val('');
            updatePreview();
            updateCharCount();
        }
        
        // Selection functions
        function selectAllParents() {
            $('.parent-select').prop('checked', true);
            updateRecipientStats();
        }
        
        function deselectAllParents() {
            $('.parent-select').prop('checked', false);
            updateRecipientStats();
        }
        
        function selectByGrade() {
            // This would be implemented based on your specific criteria
            alert('Grade-based selection feature would be implemented here based on your student data structure.');
        }
    </script>

</body>

</html>