// Custom JavaScript for Scheduled Tests Page

$(document).ready(function() {
    // Initialize DataTable with advanced features
    const table = $('#scheduledTestsTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            infoEmpty: "Showing 0 to 0 of 0 entries",
            infoFiltered: "(filtered from _MAX_ total entries)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [2, 'asc']
        ], // Sort by start date ascending
        columnDefs: [{
                targets: [7], // Actions column
                orderable: false,
                searchable: false
            },
            {
                targets: [0], // Schedule ID
                width: "100px"
            },
            {
                targets: [4, 6], // Duration and Status
                width: "120px"
            }
        ],
        createdRow: function(row, data, dataIndex) {
            // Add status class for row styling
            const status = $(row).find('td:eq(6)').text().toLowerCase();
            $(row).addClass('status-' + status);
            $(row).addClass('fade-in');
        }
    });

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const statusFilter = $('#statusFilter').val();
        const dateFrom = $('#dateFromFilter').val();
        const dateTo = $('#dateToFilter').val();

        // Status filter
        if (statusFilter) {
            table.column(6).search(statusFilter).draw();
        } else {
            table.column(6).search('').draw();
        }

        // Date range filter (simplified - in real app, use proper date comparison)
        if (dateFrom || dateTo) {
            // This is a simplified implementation
            // In a real application, you'd use server-side filtering for dates
            table.draw();
        }

        // Show filter feedback
        showAlert('Filters applied successfully!', 'success');
    });

    // Reset filters
    $('#resetFilters').on('click', function() {
        $('#statusFilter').val('');
        $('#dateFromFilter').val('');
        $('#dateToFilter').val('');
        table.search('').columns().search('').draw();
        showAlert('Filters reset successfully!', 'info');
    });

    // Refresh table
    $('#refreshTable').on('click', function() {
        const btn = $(this);
        const originalHtml = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Refreshing...');
        btn.prop('disabled', true);

        // Simulate API refresh
        setTimeout(function() {
            table.ajax.reload(function() {
                btn.html(originalHtml);
                btn.prop('disabled', false);
                showAlert('Table refreshed successfully!', 'success');
            });
        }, 1000);
    });

    // Schedule new test
    $('#scheduleNewTest').on('click', function() {
        window.location.href = 'tests-assign.php';
    });

    // Action button handlers
    $(document).on('click', '.view-test', function() {
        const row = $(this).closest('tr');
        const scheduleId = row.find('td:eq(0)').text();
        const testName = row.find('td:eq(1)').text();

        // Show modal with test details (simplified)
        alert(`Viewing details for: ${testName}\nSchedule ID: ${scheduleId}`);
    });

    $(document).on('click', '.reschedule-test', function() {
        if ($(this).is(':disabled')) return;

        const row = $(this).closest('tr');
        const testName = row.find('td:eq(1)').text();

        // Show reschedule modal (simplified)
        const newDate = prompt(`Reschedule "${testName}". Enter new date (YYYY-MM-DD):`, '2024-01-25');
        if (newDate) {
            showAlert(`Test "${testName}" rescheduled to ${newDate}`, 'success');
            // In real app, make API call to update schedule
        }
    });

    $(document).on('click', '.cancel-test', function() {
        if ($(this).is(':disabled')) return;

        const row = $(this).closest('tr');
        const testName = row.find('td:eq(1)').text();
        const scheduleId = row.find('td:eq(0)').text();

        if (confirm(`Are you sure you want to cancel "${testName}"?`)) {
            // Simulate API call
            const btn = $(this);
            btn.html('<i class="fas fa-spinner fa-spin"></i>');
            btn.prop('disabled', true);

            setTimeout(function() {
                showAlert(`Test "${testName}" has been cancelled`, 'warning');
                // In real app, update status via API and refresh table
            }, 1000);
        }
    });

    // View report for completed tests
    $(document).on('click', '.btn-outline-info[title="View Report"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(1)').text();
        alert(`Generating report for: ${testName}`);
    });

    // Duplicate test
    $(document).on('click', '.btn-outline-secondary[title="Duplicate"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(1)').text();

        if (confirm(`Duplicate "${testName}" schedule?`)) {
            showAlert(`Test "${testName}" duplicated successfully!`, 'success');
            // In real app, make API call to duplicate schedule
        }
    });

    // Delete cancelled test
    $(document).on('click', '.btn-outline-danger[title="Delete"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(1)').text();

        if (confirm(`Permanently delete "${testName}" schedule? This action cannot be undone.`)) {
            row.fadeOut(300, function() {
                $(this).remove();
                showAlert(`Test schedule "${testName}" deleted successfully!`, 'success');
                table.draw();
            });
        }
    });

    // Helper function to show alerts
    function showAlert(message, type) {
        const alertClass = `alert-${type}`;
        const iconClass = {
            'success': 'fa-check-circle',
            'error': 'fa-exclamation-triangle',
            'warning': 'fa-exclamation-circle',
            'info': 'fa-info-circle'
        }[type] || 'fa-info-circle';

        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3" style="z-index: 1050; min-width: 300px;" role="alert">
                <i class="fas ${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        // Remove existing alerts
        $('.alert-dismissible').remove();

        // Add new alert
        $('body').append(alertHtml);

        // Auto remove after 5 seconds
        setTimeout(function() {
            $('.alert-dismissible').alert('close');
        }, 5000);
    }

    // Set today as default for date filters
    const today = new Date().toISOString().split('T')[0];
    $('#dateFromFilter').val(today);

    // Set date to 30 days from today
    const futureDate = new Date();
    futureDate.setDate(futureDate.getDate() + 30);
    $('#dateToFilter').val(futureDate.toISOString().split('T')[0]);

    // Export functionality (simplified)
    $(document).on('click', '.btn-export', function() {
        alert('Export functionality would be implemented here with DataTables Buttons extension');
    });

    // Responsive adjustments
    $(window).on('resize', function() {
        table.responsive.recalc();
    });

    // Initialize tooltips
    $('[title]').tooltip({
        trigger: 'hover',
        placement: 'top'
    });
});