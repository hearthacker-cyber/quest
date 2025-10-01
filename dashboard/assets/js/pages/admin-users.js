// Users Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    const usersTable = $('#users-datatable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            },
            search: "",
            searchPlaceholder: "Search users...",
            lengthMenu: "_MENU_ records per page",
            info: "Showing _START_ to _END_ of _TOTAL_ users",
            infoEmpty: "No users available",
            infoFiltered: "(filtered from _MAX_ total users)"
        },
        columnDefs: [
            { orderable: false, targets: [0, 7] }, // Disable sorting for checkbox and actions columns
            { responsivePriority: 1, targets: 2 }, // Name column
            { responsivePriority: 2, targets: 7 }, // Actions column
            { responsivePriority: 3, targets: 3 } // Email column
        ],
        order: [
            [1, 'asc']
        ], // Default sort by User ID
        pageLength: 10,
        drawCallback: function(settings) {
            // Re-initialize tooltips after table redraw
            $('[data-bs-toggle="tooltip"]').tooltip('dispose').tooltip();
        }
    });

    // Initialize Bootstrap tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Select All Checkbox
    $('#selectAll').on('click', function() {
        const isChecked = $(this).prop('checked');
        $('.row-checkbox').prop('checked', isChecked);
        toggleBulkActionsBar();
    });

    // Individual row checkboxes
    $(document).on('change', '.row-checkbox', function() {
        const allChecked = $('.row-checkbox:checked').length === $('.row-checkbox').length;
        $('#selectAll').prop('checked', allChecked);
        toggleBulkActionsBar();
    });

    // Toggle bulk actions bar
    function toggleBulkActionsBar() {
        const checkedCount = $('.row-checkbox:checked').length;
        if (checkedCount > 0) {
            $('#bulkActionsBar').addClass('show');
            $('#selectedCount').text(checkedCount);
        } else {
            $('#bulkActionsBar').removeClass('show');
        }
    }

    // Search functionality
    $('#usersSearch').on('keyup', function() {
        usersTable.search(this.value).draw();
    });

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const roleFilter = $('#roleFilter').val();
        const statusFilter = $('#statusFilter').val();
        const dateFromFilter = $('#dateFromFilter').val();

        // Combine filters
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const role = data[4].toLowerCase();
                const status = data[5].toLowerCase();
                const registeredDate = data[6];

                let roleMatch = true;
                let statusMatch = true;
                let dateMatch = true;

                if (roleFilter) {
                    roleMatch = role.includes(roleFilter);
                }

                if (statusFilter) {
                    statusMatch = status.includes(statusFilter);
                }

                if (dateFromFilter) {
                    const rowDate = new Date(registeredDate);
                    const filterDate = new Date(dateFromFilter);
                    dateMatch = rowDate >= filterDate;
                }

                return roleMatch && statusMatch && dateMatch;
            }
        );

        usersTable.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function
    });

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#roleFilter').val('');
        $('#statusFilter').val('');
        $('#dateFromFilter').val('');
        usersTable.search('').draw();
    });

    // Action button handlers
    $(document).on('click', '.btn-outline-primary', function() {
        const userId = $(this).closest('tr').find('td:eq(1)').text();
        showNotification('success', `Viewing profile for ${userId}`);
    });

    $(document).on('click', '.btn-outline-success', function() {
        const userName = $(this).closest('tr').find('h6').text();
        showNotification('info', `Editing user: ${userName}`);
    });

    $(document).on('click', '.btn-outline-warning', function() {
        const userName = $(this).closest('tr').find('h6').text();
        const statusBadge = $(this).closest('tr').find('.badge');

        if (statusBadge.hasClass('bg-success')) {
            if (confirm(`Are you sure you want to suspend ${userName}?`)) {
                statusBadge.removeClass('bg-success').addClass('bg-danger').text('Suspended');
                showNotification('warning', `${userName} has been suspended`);
            }
        } else if (statusBadge.hasClass('bg-danger')) {
            if (confirm(`Are you sure you want to activate ${userName}?`)) {
                statusBadge.removeClass('bg-danger').addClass('bg-success').text('Active');
                showNotification('success', `${userName} has been activated`);
            }
        }
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const userName = $(this).closest('tr').find('h6').text();
        if (confirm(`Are you sure you want to delete ${userName}? This action cannot be undone.`)) {
            const row = $(this).closest('tr');
            row.fadeOut(300, function() {
                usersTable.row($(this)).remove().draw();
                showNotification('error', `${userName} has been deleted`);
            });
        }
    });

    // Export functionality
    $('.btn-outline-success:contains("Export")').on('click', function() {
        showNotification('info', 'Preparing user data for export...');
        setTimeout(() => {
            showNotification('success', 'User data exported successfully!');
        }, 2000);
    });

    // Refresh functionality
    $('.btn-outline-primary:contains("Refresh")').on('click', function() {
        usersTable.ajax.reload();
        showNotification('info', 'User data refreshed');
    });

    // Print functionality
    $('.btn-outline-info:contains("Print")').on('click', function() {
        window.print();
    });

    // Notification function
    function showNotification(type, message) {
        const toast = document.createElement('div');
        toast.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        toast.style.top = '20px';
        toast.style.right = '20px';
        toast.style.zIndex = '9999';
        toast.style.minWidth = '300px';

        let icon = 'info-circle';
        if (type === 'success') icon = 'check-circle';
        if (type === 'error') icon = 'exclamation-circle';
        if (type === 'warning') icon = 'exclamation-triangle';

        toast.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas fa-${icon} me-2"></i>
                <span>${message}</span>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    // Animate stat numbers
    function animateStats() {
        $('.user-stat-number').each(function() {
            const $this = $(this);
            const target = parseInt($this.text().replace(/,/g, ''));
            const duration = 2000;
            let start = 0;
            const increment = target / (duration / 16);

            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    $this.text(target.toLocaleString());
                    clearInterval(timer);
                } else {
                    $this.text(Math.floor(start).toLocaleString());
                }
            }, 16);
        });
    }

    // Initialize animations
    setTimeout(animateStats, 500);

    // Add keyboard shortcuts
    $(document).on('keydown', function(e) {
        // Ctrl/Cmd + F for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            $('#usersSearch').focus();
        }

        // Escape to clear search
        if (e.key === 'Escape') {
            $('#usersSearch').val('').trigger('keyup');
        }
    });

    // Responsive table enhancements
    usersTable.on('draw.dt', function() {
        // Add animation to new rows
        $('tbody tr').css('opacity', '0').animate({ opacity: 1 }, 300);
    });

    // Initialize with some sample animations
    $('tbody tr').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({ opacity: 1 }, 300);
    });
});