// Categories Management JavaScript
$(document).ready(function() {
    let selectedCategories = [];

    // Initialize DataTable
    const table = $('#categoriesTable').DataTable({
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
            "info": "Showing _START_ to _END_ of _TOTAL_ categories",
            "infoEmpty": "Showing 0 to 0 of 0 categories",
            "infoFiltered": "(filtered from _MAX_ total categories)",
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
        updateSelectedCategories();
        updateBulkActionState();
    });

    // Individual checkbox change
    $(document).on('change', '.row-checkbox', function() {
        if (!this.checked) {
            $('#selectAll').prop('checked', false);
        }
        updateSelectedCategories();
        updateBulkActionState();
    });

    // Update selected categories array
    function updateSelectedCategories() {
        selectedCategories = [];
        $('.row-checkbox:checked').each(function() {
            const row = $(this).closest('tr');
            const categoryId = $(this).val();
            const categoryName = row.find('h6').text();
            selectedCategories.push({
                id: categoryId,
                name: categoryName
            });
        });
    }

    // Update bulk action button state
    function updateBulkActionState() {
        const checkedCount = $('.row-checkbox:checked').length;
        $('#applyBulkAction').prop('disabled', checkedCount === 0 || $('#bulkAction').val() === '');
    }

    // Bulk action change
    $('#bulkAction').change(function() {
        updateBulkActionState();

        if (this.value === 'merge') {
            if ($('.row-checkbox:checked').length < 2) {
                showAlert('Please select at least 2 categories to merge.', 'warning');
                $('#bulkAction').val('');
                updateBulkActionState();
                return;
            }
            showMergeModal();
        }
    });

    // Apply bulk action
    $('#applyBulkAction').click(function() {
        const action = $('#bulkAction').val();

        if (selectedCategories.length === 0) {
            showAlert('Please select at least one category.', 'warning');
            return;
        }

        if (action === 'delete') {
            if (confirm(`Are you sure you want to delete ${selectedCategories.length} category(s)? This action cannot be undone.`)) {
                // Simulate API call
                showAlert(`${selectedCategories.length} category(s) deleted successfully.`, 'success');
                resetSelection();
            }
        }
    });

    // Show merge categories modal
    function showMergeModal() {
        updateSelectedCategories();

        // Update source categories display
        const sourceContainer = $('#sourceCategories');
        sourceContainer.empty();

        if (selectedCategories.length === 0) {
            sourceContainer.html('<p class="text-muted mb-0">No categories selected</p>');
        } else {
            selectedCategories.forEach(category => {
                sourceContainer.append(`
                    <span class="selected-category">
                        ${category.name}
                        <span class="remove-selection" data-id="${category.id}">×</span>
                    </span>
                `);
            });
        }

        // Update target category dropdown (exclude selected categories)
        $('#targetCategory option').show();
        selectedCategories.forEach(category => {
            $(`#targetCategory option[value="${category.id}"]`).hide();
        });

        $('#mergeCategoriesModal').modal('show');
    }

    // Remove category from merge selection
    $(document).on('click', '.remove-selection', function() {
        const categoryId = $(this).data('id');
        $(`.row-checkbox[value="${categoryId}"]`).prop('checked', false);
        updateSelectedCategories();
        updateBulkActionState();
        showMergeModal(); // Refresh modal
    });

    // Confirm merge action
    $('#confirmMerge').click(function() {
        const targetCategoryId = $('#targetCategory').val();

        if (!targetCategoryId) {
            showAlert('Please select a target category to merge into.', 'error');
            return;
        }

        if (selectedCategories.length < 2) {
            showAlert('Please select at least 2 categories to merge.', 'error');
            return;
        }

        const targetCategoryName = $('#targetCategory option:selected').text();
        const sourceNames = selectedCategories.map(cat => cat.name).join(', ');

        if (confirm(`Are you sure you want to merge ${sourceNames} into ${targetCategoryName}? This action cannot be undone.`)) {
            const btn = $(this);
            const originalText = btn.html();
            btn.prop('disabled', true).addClass('btn-loading').html('Merging...');

            // Simulate API call
            setTimeout(() => {
                showAlert(`Categories merged successfully into ${targetCategoryName}.`, 'success');
                btn.prop('disabled', false).removeClass('btn-loading').html(originalText);
                $('#mergeCategoriesModal').modal('hide');
                resetSelection();
            }, 2000);
        }
    });

    // Save new category
    $('#saveCategory').click(function() {
        const categoryName = $('#categoryName').val().trim();
        const description = $('#categoryDescription').val().trim();

        if (!categoryName) {
            showAlert('Please enter a category name.', 'error');
            return;
        }

        const btn = $(this);
        const originalText = btn.html();
        btn.prop('disabled', true).addClass('btn-loading').html('Saving...');

        // Simulate API call
        setTimeout(() => {
            showAlert(`Category "${categoryName}" created successfully!`, 'success');
            btn.prop('disabled', false).removeClass('btn-loading').html(originalText);
            $('#addCategoryModal').modal('hide');
            $('#addCategoryForm')[0].reset();

            // In real application, you would refresh the table here
        }, 1500);
    });

    // Edit category action
    $(document).on('click', '.btn-outline-warning', function() {
        const categoryId = $(this).closest('tr').find('.row-checkbox').val();
        const categoryName = $(this).closest('tr').find('h6').text();
        showAlert(`Editing category: ${categoryName}`, 'info');
    });

    // Delete category action
    $(document).on('click', '.btn-outline-danger', function() {
        const categoryId = $(this).closest('tr').find('.row-checkbox').val();
        const categoryName = $(this).closest('tr').find('h6').text();

        if (confirm(`Are you sure you want to delete category "${categoryName}"? This will also delete all questions in this category.`)) {
            showAlert(`Category "${categoryName}" deleted successfully.`, 'success');
        }
    });

    // Reset selection
    function resetSelection() {
        $('.row-checkbox').prop('checked', false);
        $('#selectAll').prop('checked', false);
        $('#bulkAction').val('');
        selectedCategories = [];
        updateBulkActionState();
    }

    // Show alert message
    function showAlert(message, type) {
        // Remove existing alerts
        $('.alert-dismissible').remove();

        const alertClass = type === 'success' ? 'alert-success' :
            type === 'error' ? 'alert-danger' :
            type === 'warning' ? 'alert-warning' : 'alert-info';

        const icon = type === 'success' ? 'fa-check-circle' :
            type === 'error' ? 'fa-exclamation-circle' :
            type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle';

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

    // Modal cleanup
    $('#addCategoryModal').on('hidden.bs.modal', function() {
        $('#addCategoryForm')[0].reset();
    });

    $('#mergeCategoriesModal').on('hidden.bs.modal', function() {
        $('#bulkAction').val('');
        updateBulkActionState();
    });
});