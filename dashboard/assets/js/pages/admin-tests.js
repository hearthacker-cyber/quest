// Tests Management JavaScript
$(document).ready(function() {
    // Initialize DataTable
    const table = $('#testsTable').DataTable({
        "pageLength": 25,
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
        ],
        "order": [
            [1, 'asc']
        ],
        "language": {
            "search": "Search:",
            "lengthMenu": "Show _MENU_ entries",
            "info": "Showing _START_ to _END_ of _TOTAL_ tests",
            "infoEmpty": "Showing 0 to 0 of 0 tests",
            "infoFiltered": "(filtered from _MAX_ total tests)",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "Next",
                "previous": "Previous"
            }
        },
        "responsive": true,
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    });

    // Initialize Date Range Picker
    $('#dateRange').daterangepicker({
        opens: 'left',
        drops: 'down',
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            format: 'DD/MM/YYYY'
        }
    });

    $('#dateRange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        applyFilters();
    });

    $('#dateRange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        applyFilters();
    });

    // Select All Checkbox
    $('#selectAll').change(function() {
        $('.row-checkbox').prop('checked', this.checked);
        updateBulkActionState();
    });

    // Individual checkbox change
    $(document).on('change', '.row-checkbox', function() {
        if (!this.checked) {
            $('#selectAll').prop('checked', false);
        }
        updateBulkActionState();
    });

    // Update bulk action button state
    function updateBulkActionState() {
        const checkedCount = $('.row-checkbox:checked').length;
        $('#applyBulkAction').prop('disabled', checkedCount === 0 || $('#bulkAction').val() === '');
    }

    // Bulk action change
    $('#bulkAction').change(updateBulkActionState);

    // Apply bulk action
    $('#applyBulkAction').click(function() {
        const action = $('#bulkAction').val();
        const selectedIds = $('.row-checkbox:checked').map(function() {
            return this.value;
        }).get();

        if (selectedIds.length === 0) {
            showAlert('Please select at least one test.', 'warning');
            return;
        }

        let actionText = '';
        switch (action) {
            case 'activate':
                actionText = 'activate';
                break;
            case 'deactivate':
                actionText = 'deactivate';
                break;
            case 'delete':
                actionText = 'delete';
                break;
        }

        if (confirm(`Are you sure you want to ${actionText} ${selectedIds.length} test(s)?`)) {
            // Simulate API call
            showAlert(`${selectedIds.length} test(s) ${actionText}d successfully.`, 'success');

            // Reset selection
            $('.row-checkbox').prop('checked', false);
            $('#selectAll').prop('checked', false);
            $('#bulkAction').val('');
            updateBulkActionState();
        }
    });

    // Filter functionality
    function applyFilters() {
        table.draw();
    }

    // Subject filter
    $('#filterSubject').change(applyFilters);

    // Type filter
    $('#filterType').change(applyFilters);

    // Status filter
    $('#filterStatus').change(applyFilters);

    // Search box
    $('#searchBox').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Clear search
    $('#clearSearch').click(function() {
        $('#searchBox').val('');
        table.search('').draw();
    });

    // Reset all filters
    $('#resetFilters').click(function() {
        $('#filterSubject').val('');
        $('#filterType').val('');
        $('#filterStatus').val('');
        $('#dateRange').val('');
        $('#searchBox').val('');
        table.search('').draw();
    });

    // Action button handlers
    $(document).on('click', '.btn-outline-primary', function() {
        const testId = $(this).closest('tr').find('.badge').text();
        const testName = $(this).closest('tr').find('h6').text();
        showAlert(`Viewing test: ${testName} (${testId})`, 'info');
    });

    $(document).on('click', '.btn-outline-warning', function() {
        const testId = $(this).closest('tr').find('.badge').text();
        const testName = $(this).closest('tr').find('h6').text();
        showAlert(`Editing test: ${testName} (${testId})`, 'warning');
    });

    $(document).on('click', '.btn-outline-info', function() {
        const testId = $(this).closest('tr').find('.badge').text();
        const testName = $(this).closest('tr').find('h6').text();
        if (confirm(`Duplicate test: ${testName}?`)) {
            showAlert(`Test "${testName}" duplicated successfully.`, 'success');
        }
    });

    $(document).on('click', '.btn-outline-success', function() {
        const testId = $(this).closest('tr').find('.badge').text();
        const testName = $(this).closest('tr').find('h6').text();
        showAlert(`Assigning test: ${testName} to students/groups`, 'info');
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const testId = $(this).closest('tr').find('.badge').text();
        const testName = $(this).closest('tr').find('h6').text();
        if (confirm(`Are you sure you want to delete test: ${testName}? This action cannot be undone.`)) {
            showAlert(`Test "${testName}" deleted successfully.`, 'success');
        }
    });

    // Custom filtering function for DataTables
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            const subject = $('#filterSubject').val();
            const type = $('#filterType').val();
            const status = $('#filterStatus').val();
            const dateRange = $('#dateRange').val();

            if (subject && data[3].indexOf(subject) === -1) return false;
            if (type && data[2].toLowerCase().indexOf(type) === -1) return false;
            if (status && data[6].toLowerCase().indexOf(status) === -1) return false;

            // Date range filtering (simplified)
            if (dateRange) {
                const createdDate = data[7]; // Assuming date is in column 7
                // In real implementation, you would parse and compare dates
            }

            return true;
        }
    );

    // Show alert message
    function showAlert(message, type) {
        // Remove existing alerts
        $('.alert-dismissible').remove();

        const alertClass = type === 'success' ? 'alert-success' :
            type === 'warning' ? 'alert-warning' :
            type === 'info' ? 'alert-info' : 'alert-danger';

        const icon = type === 'success' ? 'fa-check-circle' :
            type === 'warning' ? 'fa-exclamation-triangle' :
            type === 'info' ? 'fa-info-circle' : 'fa-exclamation-circle';

        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="fas ${icon} me-2"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        $('.page-title-box').after(alertHtml);

        // Auto-remove alerts after 5 seconds
        setTimeout(() => {
            $('.alert').alert('close');
        }, 5000);
    }

    // Export functionality (optional)
    function exportTests(format) {
        showAlert(`Exporting tests data in ${format.toUpperCase()} format...`, 'info');
        // In real implementation, you would make an API call to export data
    }
});