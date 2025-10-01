// Test Results & Submissions Management
$(document).ready(function() {
    let resultsTable = null;
    let currentFilters = {};

    // Initialize DataTable
    function initializeDataTable() {
        resultsTable = $('#resultsTable').DataTable({
            responsive: true,
            ordering: true,
            order: [
                [5, 'desc']
            ], // Sort by submission date descending
            pageLength: 25,
            lengthMenu: [10, 25, 50, 100],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            language: {
                search: "Search submissions:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ submissions",
                infoEmpty: "No submissions available",
                infoFiltered: "(filtered from _MAX_ total submissions)",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            buttons: [{
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv me-1"></i> CSV',
                    className: 'btn btn-outline-primary btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel me-1"></i> Excel',
                    className: 'btn btn-outline-success btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                    className: 'btn btn-outline-danger btn-sm',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }
            ],
            initComplete: function() {
                $('.dt-buttons').addClass('btn-group');
            }
        });
    }

    // Load sample data
    function loadSampleData() {
        const sampleData = [{
                id: 'SUB001',
                testName: 'Mathematics Final Exam',
                studentName: 'Rahul Sharma',
                score: 85,
                totalMarks: 100,
                status: 'passed',
                submissionDate: '2024-01-15 14:30:00',
                duration: '58:30',
                studentAvatar: 'https://ui-avatars.com/api/?name=Rahul+Sharma&background=0D8ABC&color=fff'
            },
            {
                id: 'SUB002',
                testName: 'Physics Midterm',
                studentName: 'Priya Patel',
                score: 42,
                totalMarks: 100,
                status: 'failed',
                submissionDate: '2024-01-14 10:15:00',
                duration: '45:12',
                studentAvatar: 'https://ui-avatars.com/api/?name=Priya+Patel&background=F44336&color=fff'
            },
            {
                id: 'SUB003',
                testName: 'Chemistry Quiz',
                studentName: 'Amit Kumar',
                score: 92,
                totalMarks: 100,
                status: 'passed',
                submissionDate: '2024-01-13 16:45:00',
                duration: '25:18',
                studentAvatar: 'https://ui-avatars.com/api/?name=Amit+Kumar&background=4CAF50&color=fff'
            },
            {
                id: 'SUB004',
                testName: 'Biology Assessment',
                studentName: 'Neha Gupta',
                score: 78,
                totalMarks: 100,
                status: 'passed',
                submissionDate: '2024-01-12 09:20:00',
                duration: '52:45',
                studentAvatar: 'https://ui-avatars.com/api/?name=Neha+Gupta&background=9C27B0&color=fff'
            },
            {
                id: 'SUB005',
                testName: 'English Proficiency Test',
                studentName: 'Rajesh Singh',
                score: 35,
                totalMarks: 100,
                status: 'failed',
                submissionDate: '2024-01-11 11:30:00',
                duration: '38:22',
                studentAvatar: 'https://ui-avatars.com/api/?name=Rajesh+Singh&background=FF9800&color=fff'
            },
            {
                id: 'SUB006',
                testName: 'Mathematics Final Exam',
                studentName: 'Sneha Verma',
                score: 95,
                totalMarks: 100,
                status: 'passed',
                submissionDate: '2024-01-10 15:10:00',
                duration: '59:45',
                studentAvatar: 'https://ui-avatars.com/api/?name=Sneha+Verma&background=E91E63&color=fff'
            },
            {
                id: 'SUB007',
                testName: 'Computer Science Test',
                studentName: 'Vikram Joshi',
                score: 88,
                totalMarks: 100,
                status: 'passed',
                submissionDate: '2024-01-09 13:25:00',
                duration: '47:33',
                studentAvatar: 'https://ui-avatars.com/api/?name=Vikram+Joshi&background=607D8B&color=fff'
            },
            {
                id: 'SUB008',
                testName: 'Physics Midterm',
                studentName: 'Anjali Desai',
                score: 29,
                totalMarks: 100,
                status: 'failed',
                submissionDate: '2024-01-08 08:45:00',
                duration: '42:15',
                studentAvatar: 'https://ui-avatars.com/api/?name=Anjali+Desai&background=795548&color=fff'
            }
        ];

        const tbody = $('#resultsTable tbody');
        tbody.empty();

        sampleData.forEach(submission => {
            const percentage = (submission.score / submission.totalMarks * 100).toFixed(1);
            const progressBarClass = getProgressBarClass(percentage);
            const statusBadge = getStatusBadge(submission.status);

            const row = `
                <tr>
                    <td>
                        <span class="fw-bold text-primary">${submission.id}</span>
                    </td>
                    <td>${submission.testName}</td>
                    <td>
                        <div class="student-info">
                            <img src="${submission.studentAvatar}" alt="${submission.studentName}" class="student-avatar">
                            ${submission.studentName}
                        </div>
                    </td>
                    <td>
                        <div class="score-display ${getScoreColorClass(percentage)}">
                            ${submission.score}/${submission.totalMarks}
                        </div>
                        <div class="score-percentage">${percentage}%</div>
                        <div class="score-progress">
                            <div class="score-progress-bar ${progressBarClass}" style="width: ${percentage}%"></div>
                        </div>
                    </td>
                    <td>${statusBadge}</td>
                    <td>
                        <div class="text-muted small">${formatDate(submission.submissionDate)}</div>
                    </td>
                    <td>${submission.duration}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-action btn-view" data-id="${submission.id}" title="View Report">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action btn-pdf" data-id="${submission.id}" title="Download PDF">
                                <i class="fas fa-file-pdf"></i>
                            </button>
                            <button type="button" class="btn btn-action btn-re-evaluate" data-id="${submission.id}" title="Re-evaluate">
                                <i class="fas fa-calculator"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });

        if (resultsTable) {
            resultsTable.draw();
        }
    }

    // Helper functions
    function getProgressBarClass(percentage) {
        if (percentage >= 80) return 'score-excellent';
        if (percentage >= 60) return 'score-good';
        if (percentage >= 40) return 'score-average';
        return 'score-poor';
    }

    function getScoreColorClass(percentage) {
        if (percentage >= 80) return 'score-excellent-color';
        if (percentage >= 60) return 'score-good-color';
        if (percentage >= 40) return 'score-average-color';
        return 'score-poor-color';
    }

    function getStatusBadge(status) {
        const badges = {
            'passed': 'status-badge badge-passed',
            'failed': 'status-badge badge-failed',
            'pending': 'status-badge badge-pending',
            'not-attempted': 'status-badge badge-not-attempted'
        };
        const statusText = status.charAt(0).toUpperCase() + status.slice(1);
        return `<span class="${badges[status] || 'status-badge'}">${statusText}</span>`;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    // Apply Filters
    $('#applyFilters').on('click', function() {
        const testFilter = $('#testFilter').val();
        const statusFilter = $('#statusFilter').val();
        const studentFilter = $('#studentFilter').val();
        const dateFrom = $('#dateFrom').val();
        const dateTo = $('#dateTo').val();

        currentFilters = {
            test: testFilter,
            status: statusFilter,
            student: studentFilter,
            dateFrom: dateFrom,
            dateTo: dateTo
        };

        applyTableFilters();
        showAlert('Filters applied successfully!', 'success');
    });

    // Reset Filters
    $('#resetFilters').on('click', function() {
        $('#testFilter').val('');
        $('#statusFilter').val('');
        $('#studentFilter').val('');
        $('#dateFrom').val('');
        $('#dateTo').val('');

        currentFilters = {};
        applyTableFilters();
        showAlert('Filters reset successfully!', 'info');
    });

    // Apply table filters
    function applyTableFilters() {
        if (resultsTable) {
            resultsTable.draw();
        }
    }

    // Export functionality
    $('[data-export]').on('click', function(e) {
        e.preventDefault();
        const exportType = $(this).data('export');

        switch (exportType) {
            case 'csv':
                resultsTable.button('.buttons-csv').trigger();
                break;
            case 'excel':
                resultsTable.button('.buttons-excel').trigger();
                break;
            case 'pdf':
                resultsTable.button('.buttons-pdf').trigger();
                break;
        }

        showAlert(`Exporting data as ${exportType.toUpperCase()}...`, 'info');
    });

    // View Report
    $(document).on('click', '.btn-view', function() {
        const submissionId = $(this).data('id');
        window.location.href = `tests-result-detail.php?id=${submissionId}`;
    });

    // Download PDF
    $(document).on('click', '.btn-pdf', function() {
        const submissionId = $(this).data('id');
        showAlert(`Generating PDF report for submission ${submissionId}...`, 'info');
        // PDF generation logic would go here
    });

    // Re-evaluate
    $(document).on('click', '.btn-re-evaluate', function() {
        const submissionId = $(this).data('id');
        const row = $(this).closest('tr');
        const studentName = row.find('.student-info').text().trim();
        const testName = row.find('td:nth-child(2)').text().trim();

        $('#reEvalSubmissionId').text(submissionId);
        $('#reEvalStudentName').text(studentName);
        $('#reEvalTestName').text(testName);

        $('#reEvaluateModal').modal('show');
    });

    // Confirm Re-evaluate
    $('#confirmReEvaluate').on('click', function() {
        const submissionId = $('#reEvalSubmissionId').text();
        const recalculate = $('#recalculateScore').is(':checked');

        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Re-evaluating...');

        setTimeout(() => {
            $('#reEvaluateModal').modal('hide');
            $(this).prop('disabled', false).html('<i class="fas fa-calculator me-1"></i> Re-evaluate');
            showAlert(`Submission ${submissionId} re-evaluated successfully!`, 'success');
        }, 2000);
    });

    // Refresh Table
    $('#refreshTable').on('click', function() {
        $(this).find('i').addClass('fa-spin');
        setTimeout(() => {
            loadSampleData();
            $(this).find('i').removeClass('fa-spin');
            showAlert('Table refreshed successfully!', 'info');
        }, 1000);
    });

    // Show alert message
    function showAlert(message, type) {
        const alert = $(`
            <div class="alert alert-${type} alert-dismissible fade show alert-position" role="alert">
                <i class="fas fa-${getAlertIcon(type)} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);

        $('body').append(alert);

        setTimeout(() => {
            alert.alert('close');
        }, 5000);
    }

    // Get alert icon
    function getAlertIcon(type) {
        const icons = {
            success: 'check-circle',
            warning: 'exclamation-triangle',
            danger: 'exclamation-circle',
            info: 'info-circle'
        };
        return icons[type] || 'info-circle';
    }

    // Initialize
    initializeDataTable();
    loadSampleData();
});