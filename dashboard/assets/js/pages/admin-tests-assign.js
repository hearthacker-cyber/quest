// Custom JavaScript for Assign Test Page

$(document).ready(function() {
    // Initialize DataTable
    $('#assignedTestsTable').DataTable({
        responsive: true,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
                [2, 'desc']
            ] // Sort by start date descending
    });

    // Test duration mapping
    const testDurations = {
        'math_advanced': '120 minutes',
        'physics_basic': '90 minutes',
        'chemistry_organic': '150 minutes',
        'english_grammar': '90 minutes',
        'history_world': '180 minutes'
    };

    // Update duration display when test is selected
    $('#testSelect').on('change', function() {
        const selectedTest = $(this).val();
        if (selectedTest && testDurations[selectedTest]) {
            $('#defaultDurationDisplay').text(testDurations[selectedTest]);
        } else {
            $('#defaultDurationDisplay').text('Select a test to see duration');
        }
    });

    // Form validation and submission
    $('#assignTestForm').on('submit', function(e) {
        e.preventDefault();

        // Basic validation
        const testSelected = $('#testSelect').val();
        const startDateTime = $('#startDateTime').val();
        const endDateTime = $('#endDateTime').val();

        if (!testSelected) {
            showAlert('Please select a test.', 'danger');
            return;
        }

        if (!startDateTime || !endDateTime) {
            showAlert('Please provide both start and end date/time.', 'danger');
            return;
        }

        if (new Date(startDateTime) >= new Date(endDateTime)) {
            showAlert('End date/time must be after start date/time.', 'danger');
            return;
        }

        // Show loading state
        const submitBtn = $(this).find('button[type="submit"]');
        const originalText = submitBtn.html();
        submitBtn.html('<i class="fas fa-spinner fa-spin me-2"></i>Assigning...');
        submitBtn.prop('disabled', true);

        // Simulate API call
        setTimeout(function() {
            // Reset button
            submitBtn.html(originalText);
            submitBtn.prop('disabled', false);

            // Show success message
            showAlert('Test assigned successfully!', 'success');

            // Refresh the table (in real scenario, you'd update via AJAX)
            $('#assignedTestsTable').DataTable().ajax.reload();

            // Reset form
            $('#assignTestForm')[0].reset();
            $('#defaultDurationDisplay').text('Select a test to see duration');
        }, 2000);
    });

    // Helper function to show alerts
    function showAlert(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        // Remove existing alerts
        $('.alert-dismissible').remove();

        // Add new alert
        $('#assignTestForm').prepend(alertHtml);

        // Auto remove after 5 seconds
        setTimeout(function() {
            $('.alert-dismissible').alert('close');
        }, 5000);
    }

    // Set minimum datetime to current time
    const now = new Date();
    const timezoneOffset = now.getTimezoneOffset() * 60000;
    const localISOTime = new Date(now - timezoneOffset).toISOString().slice(0, 16);

    $('#startDateTime').attr('min', localISOTime);
    $('#endDateTime').attr('min', localISOTime);

    // Update end datetime min when start datetime changes
    $('#startDateTime').on('change', function() {
        $('#endDateTime').attr('min', $(this).val());
    });

    // Action buttons functionality
    $(document).on('click', '.btn-outline-primary[title="Edit"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(0)').text();
        alert(`Edit functionality for: ${testName}`);
    });

    $(document).on('click', '.btn-outline-warning[title="Reschedule"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(0)').text();
        alert(`Reschedule functionality for: ${testName}`);
    });

    $(document).on('click', '.btn-outline-info[title="View Report"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(0)').text();
        alert(`View report for: ${testName}`);
    });

    $(document).on('click', '.btn-outline-danger[title="Delete"]', function() {
        const row = $(this).closest('tr');
        const testName = row.find('td:eq(0)').text();

        if (confirm(`Are you sure you want to delete the assignment for: ${testName}?`)) {
            // In real scenario, make AJAX call to delete
            row.fadeOut(300, function() {
                $(this).remove();
            });
        }
    });

    // Responsive adjustments
    $(window).on('resize', function() {
        $('#assignedTestsTable').DataTable().responsive.recalc();
    });
});