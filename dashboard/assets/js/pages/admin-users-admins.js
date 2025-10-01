// Admins Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    const adminsTable = $('#admins-datatable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            },
            search: "",
            searchPlaceholder: "Search admins...",
            lengthMenu: "_MENU_ records per page",
            info: "Showing _START_ to _END_ of _TOTAL_ admins",
            infoEmpty: "No admins available",
            infoFiltered: "(filtered from _MAX_ total admins)"
        },
        columnDefs: [
            { orderable: false, targets: [0, 7] }, // Disable sorting for checkbox and actions columns
            { responsivePriority: 1, targets: 2 }, // Name column
            { responsivePriority: 2, targets: 7 }, // Actions column
            { responsivePriority: 3, targets: 3 }, // Email column
            {
                targets: 4, // Role column
                render: function(data, type, row) {
                    if (type === 'display') {
                        return data;
                    }
                    // For sorting, return the selected value
                    return $(data).find('option:selected').text();
                }
            }
        ],
        order: [
            [1, 'asc']
        ], // Default sort by Admin ID
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

    // Clear selection
    $('#clearSelection').on('click', function() {
        $('.row-checkbox').prop('checked', false);
        $('#selectAll').prop('checked', false);
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
    $('#adminsSearch').on('keyup', function() {
        adminsTable.search(this.value).draw();
    });

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const roleFilter = $('#roleFilter').val();
        const statusFilter = $('#statusFilter').val();

        // Combine filters
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const role = data[4].toLowerCase();
                const status = data[6].toLowerCase();

                let roleMatch = true;
                let statusMatch = true;

                if (roleFilter) {
                    const selectedRole = $('#roleFilter option:selected').text().toLowerCase();
                    roleMatch = role.includes(selectedRole);
                }

                if (statusFilter) {
                    statusMatch = status.includes(statusFilter);
                }

                return roleMatch && statusMatch;
            }
        );

        adminsTable.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function
    });

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#roleFilter').val('');
        $('#statusFilter').val('');
        adminsTable.search('').draw();
        showNotification('info', 'All filters cleared');
    });

    // Refresh table
    $('#refreshTable').on('click', function() {
        adminsTable.ajax.reload();
        showNotification('info', 'Admin data refreshed');
    });

    // Export functionality
    $('#exportAdmins').on('click', function() {
        showNotification('info', 'Preparing admin data for export...');
        setTimeout(() => {
            showNotification('success', 'Admin data exported successfully!');
        }, 2000);
    });

    // Print functionality
    $('#printTable').on('click', function() {
        window.print();
    });

    // Bulk role update button
    $('#bulkRoleUpdate').on('click', function() {
        const selectedCount = $('.row-checkbox:checked').length;
        if (selectedCount > 0) {
            $('#selectedAdminsCount').text(selectedCount);
            $('#bulkRoleModal').modal('show');
        } else {
            showNotification('warning', 'Please select at least one admin to update roles');
        }
    });

    // Role change handler
    $(document).on('change', '.role-select', function() {
        const adminId = $(this).data('admin-id');
        const newRole = $(this).val();
        const adminName = $(this).closest('tr').find('h6').text();

        if (newRole) {
            $(this).addClass('changing');
            showNotification('info', `Updating role for ${adminName} to ${newRole}...`);

            // Simulate API call
            setTimeout(() => {
                $(this).removeClass('changing');
                showNotification('success', `Role updated successfully for ${adminName}`);

                // Update role badge color based on new role
                updateRoleBadge($(this), newRole);
            }, 1000);
        }
    });

    // Update role badge styling
    function updateRoleBadge(selectElement, role) {
        const row = selectElement.closest('tr');
        // You can add visual feedback here based on role
        console.log(`Role updated to: ${role}`);
    }

    // Action button handlers
    $(document).on('click', '.btn-outline-primary', function() {
        const adminId = $(this).closest('tr').find('td:eq(1)').text();
        const adminName = $(this).closest('tr').find('h6').text();
        showNotification('success', `Viewing profile for ${adminName} (${adminId})`);
    });

    $(document).on('click', '.btn-outline-success', function() {
        const adminName = $(this).closest('tr').find('h6').text();
        showNotification('info', `Editing admin: ${adminName}`);
    });

    $(document).on('click', '.btn-outline-warning', function() {
        const adminName = $(this).closest('tr').find('h6').text();
        const statusBadge = $(this).closest('tr').find('.badge');

        if (statusBadge.hasClass('bg-success')) {
            if (confirm(`Are you sure you want to revoke access for ${adminName}?`)) {
                statusBadge.removeClass('bg-success').addClass('bg-warning text-dark').text('Inactive');
                showNotification('warning', `Access revoked for ${adminName}`);
            }
        } else {
            if (confirm(`Are you sure you want to restore access for ${adminName}?`)) {
                statusBadge.removeClass('bg-warning').addClass('bg-success').text('Active');
                showNotification('success', `Access restored for ${adminName}`);
            }
        }
    });

    $(document).on('click', '.btn-outline-info', function() {
        const adminName = $(this).closest('tr').find('h6').text();
        const statusBadge = $(this).closest('tr').find('.badge');

        if (statusBadge.hasClass('bg-warning')) {
            if (confirm(`Are you sure you want to activate ${adminName}?`)) {
                statusBadge.removeClass('bg-warning').addClass('bg-success').text('Active');
                showNotification('success', `${adminName} has been activated`);
            }
        }
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const adminName = $(this).closest('tr').find('h6').text();
        const adminRole = $(this).closest('tr').find('.role-select option:selected').text();

        if (confirm(`Are you sure you want to delete ${adminName} (${adminRole})? This action cannot be undone.`)) {
            const row = $(this).closest('tr');
            row.fadeOut(300, function() {
                adminsTable.row($(this)).remove().draw();
                showNotification('error', `${adminName} has been deleted`);
            });
        }
    });

    // Bulk action handlers
    $(document).on('click', '#bulkDeactivate', function() {
        const selectedCount = $('.row-checkbox:checked').length;
        if (confirm(`Are you sure you want to deactivate ${selectedCount} selected admins?`)) {
            $('.row-checkbox:checked').each(function() {
                const row = $(this).closest('tr');
                const statusBadge = row.find('.badge');
                if (statusBadge.hasClass('bg-success')) {
                    statusBadge.removeClass('bg-success').addClass('bg-warning text-dark').text('Inactive');
                }
            });
            showNotification('warning', `${selectedCount} admins deactivated`);
            toggleBulkActionsBar();
        }
    });

    // Confirm bulk role update
    $('#confirmBulkRole').on('click', function() {
        const newRole = $('#bulkRoleSelect').val();
        const sendNotification = $('#sendNotification').is(':checked');

        if (!newRole) {
            showNotification('warning', 'Please select a role');
            return;
        }

        const selectedCount = $('.row-checkbox:checked').length;
        $('.row-checkbox:checked').each(function() {
            const row = $(this).closest('tr');
            const roleSelect = row.find('.role-select');
            roleSelect.val(newRole).addClass('changing');

            // Update visual feedback
            setTimeout(() => {
                roleSelect.removeClass('changing');
            }, 500);
        });

        $('#bulkRoleModal').modal('hide');
        showNotification('success', `Role updated to ${newRole} for ${selectedCount} admins${sendNotification ? ' (notification sent)' : ''}`);
        toggleBulkActionsBar();
    });

    // Add new admin form handler
    $('#saveAdmin').on('click', function() {
        const form = $('#addAdminForm')[0];
        if (form.checkValidity()) {
            const adminData = {
                name: $('#adminName').val(),
                email: $('#adminEmail').val(),
                role: $('#adminRole').val(),
                permissions: $('#adminPermissions').val(),
                notes: $('#adminNotes').val()
            };

            // Simulate API call
            showNotification('info', 'Adding new admin...');

            setTimeout(() => {
                $('#addAdminModal').modal('hide');
                form.reset();
                showNotification('success', `New admin ${adminData.name} added successfully`);

                // In a real application, you would refresh the table or add the new row
                // adminsTable.row.add([...]).draw();
            }, 1500);
        } else {
            form.reportValidity();
        }
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
        $('.admin-stat-number').each(function() {
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
            $('#adminsSearch').focus();
        }

        // Escape to clear search and selection
        if (e.key === 'Escape') {
            $('#adminsSearch').val('').trigger('keyup');
            $('.row-checkbox').prop('checked', false);
            $('#selectAll').prop('checked', false);
            toggleBulkActionsBar();
        }

        // Ctrl/Cmd + A to select all (when focused on table)
        if ((e.ctrlKey || e.metaKey) && e.key === 'a') {
            e.preventDefault();
            $('#selectAll').click();
        }
    });

    // Responsive table enhancements
    adminsTable.on('draw.dt', function() {
        // Add animation to new rows
        $('tbody tr').css('opacity', '0').animate({ opacity: 1 }, 300);
    });

    // Initialize with some sample animations
    $('tbody tr').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({ opacity: 1 }, 300);
    });

    // Role select styling based on selected value
    $(document).on('change', '.role-select', function() {
        const value = $(this).val();
        $(this).removeClass('role-super-admin role-moderator role-content-manager role-support');
        if (value) {
            $(this).addClass(`role-${value.replace('-', '_')}`);
        }
    });

    // Initialize role select styling
    $('.role-select').each(function() {
        $(this).trigger('change');
    });
});