// Questions Management JavaScript
$(document).ready(function() {
    // Initialize DataTable
    const table = $('#questionsTable').DataTable({
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
            "info": "Showing _START_ to _END_ of _TOTAL_ questions",
            "infoEmpty": "Showing 0 to 0 of 0 questions",
            "infoFiltered": "(filtered from _MAX_ total questions)",
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
            showAlert('Please select at least one question.', 'warning');
            return;
        }

        if (confirm(`Are you sure you want to ${action} ${selectedIds.length} question(s)?`)) {
            // Simulate API call
            showAlert(`${selectedIds.length} question(s) ${action}d successfully.`, 'success');

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

    // Category filter
    $('#filterCategory').change(applyFilters);

    // Difficulty filter
    $('#filterDifficulty').change(applyFilters);

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
        $('#filterCategory').val('');
        $('#filterDifficulty').val('');
        $('#filterType').val('');
        $('#filterStatus').val('');
        $('#searchBox').val('');
        table.search('').draw();
    });

    // Action button handlers
    $(document).on('click', '.btn-outline-primary', function() {
        const qid = $(this).closest('tr').find('.badge').text();
        showAlert(`Viewing question ${qid}`, 'info');
    });

    $(document).on('click', '.btn-outline-warning', function() {
        const qid = $(this).closest('tr').find('.badge').text();
        showAlert(`Editing question ${qid}`, 'warning');
    });

    $(document).on('click', '.btn-outline-info', function() {
        const qid = $(this).closest('tr').find('.badge').text();
        showAlert(`Duplicating question ${qid}`, 'info');
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const qid = $(this).closest('tr').find('.badge').text();
        if (confirm(`Are you sure you want to delete question ${qid}?`)) {
            showAlert(`Question ${qid} deleted successfully.`, 'success');
        }
    });

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

    // Custom filtering function for DataTables
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            const subject = $('#filterSubject').val();
            const category = $('#filterCategory').val();
            const difficulty = $('#filterDifficulty').val();
            const type = $('#filterType').val();
            const status = $('#filterStatus').val();

            if (subject && data[3].indexOf(subject) === -1) return false;
            if (category && data[3].indexOf(category) === -1) return false;
            if (difficulty && data[4].indexOf(difficulty) === -1) return false;
            if (type && data[5].indexOf(type) === -1) return false;
            if (status && data[6].indexOf(status) === -1) return false;

            return true;
        }
    );
});