// Students Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    const studentsTable = $('#students-datatable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            },
            search: "",
            searchPlaceholder: "Search students...",
            lengthMenu: "_MENU_ records per page",
            info: "Showing _START_ to _END_ of _TOTAL_ students",
            infoEmpty: "No students available",
            infoFiltered: "(filtered from _MAX_ total students)"
        },
        columnDefs: [
            { orderable: false, targets: [0, 8] }, // Disable sorting for checkbox and actions columns
            { responsivePriority: 1, targets: 2 }, // Name column
            { responsivePriority: 2, targets: 8 }, // Actions column
            { responsivePriority: 3, targets: 3 }, // Email column
            {
                targets: 7, // Progress column
                render: function(data, type, row) {
                    if (type === 'display') {
                        const progress = data.split('>')[1] ? .split('%')[0] || '0';
                        return `
                            <div class="progress" style="height: 6px; width: 80px;">
                                <div class="progress-bar ${progress >= 80 ? 'bg-success' : progress >= 60 ? 'bg-warning' : 'bg-danger'}" 
                                     role="progressbar" style="width: ${progress}%" 
                                     aria-valuenow="${progress}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <small class="text-muted">${progress}%</small>
                        `;
                    }
                    return data;
                }
            }
        ],
        order: [
            [1, 'asc']
        ], // Default sort by Student ID
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
    $('#studentsSearch').on('keyup', function() {
        studentsTable.search(this.value).draw();
    });

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const gradeFilter = $('#gradeFilter').val();
        const subscriptionFilter = $('#subscriptionFilter').val();
        const lastLoginFilter = $('#lastLoginFilter').val();

        // Combine filters
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const grade = data[4].toLowerCase();
                const subscription = data[5].toLowerCase();
                const lastLogin = data[6].toLowerCase();

                let gradeMatch = true;
                let subscriptionMatch = true;
                let lastLoginMatch = true;

                if (gradeFilter) {
                    gradeMatch = grade.includes(gradeFilter.toLowerCase());
                }

                if (subscriptionFilter) {
                    if (subscriptionFilter === 'active') {
                        subscriptionMatch = subscription.includes('yes') || subscription.includes('trial');
                    } else if (subscriptionFilter === 'inactive') {
                        subscriptionMatch = subscription.includes('no');
                    } else if (subscriptionFilter === 'trial') {
                        subscriptionMatch = subscription.includes('trial');
                    } else if (subscriptionFilter === 'expired') {
                        subscriptionMatch = subscription.includes('expired');
                    }
                }

                if (lastLoginFilter) {
                    const now = new Date();
                    let timeThreshold = new Date();

                    switch (lastLoginFilter) {
                        case 'today':
                            timeThreshold.setHours(0, 0, 0, 0);
                            break;
                        case 'week':
                            timeThreshold.setDate(now.getDate() - 7);
                            break;
                        case 'month':
                            timeThreshold.setMonth(now.getMonth() - 1);
                            break;
                        case '3months':
                            timeThreshold.setMonth(now.getMonth() - 3);
                            break;
                        case 'inactive':
                            timeThreshold.setMonth(now.getMonth() - 3);
                            lastLoginMatch = false; // Will be set based on date comparison
                            break;
                    }

                    // Simple date matching for demo
                    if (lastLoginFilter !== 'inactive') {
                        lastLoginMatch = Math.random() > 0.3; // Simulate active users
                    } else {
                        lastLoginMatch = Math.random() < 0.7; // Simulate inactive users
                    }
                }

                return gradeMatch && subscriptionMatch && lastLoginMatch;
            }
        );

        studentsTable.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function
    });

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#gradeFilter').val('');
        $('#subscriptionFilter').val('');
        $('#lastLoginFilter').val('');
        studentsTable.search('').draw();
        showNotification('info', 'All filters cleared');
    });

    // Refresh table
    $('#refreshTable').on('click', function() {
        studentsTable.ajax.reload();
        showNotification('info', 'Student data refreshed');
    });

    // Export functionality
    $('#exportStudents').on('click', function() {
        showNotification('info', 'Preparing student data for export...');
        setTimeout(() => {
            showNotification('success', 'Student data exported successfully!');
        }, 2000);
    });

    // Print functionality
    $('#printTable').on('click', function() {
        window.print();
    });

    // Bulk message functionality
    $('#sendBulkMessage').on('click', function() {
        showNotification('info', 'Opening bulk message composer...');
    });

    // Action button handlers
    $(document).on('click', '.btn-outline-primary', function() {
        const studentId = $(this).closest('tr').find('td:eq(1)').text();
        const studentName = $(this).closest('tr').find('h6').text();
        showNotification('success', `Viewing profile for ${studentName} (${studentId})`);
    });

    $(document).on('click', '.btn-outline-info', function() {
        const studentName = $(this).closest('tr').find('h6').text();
        const progress = $(this).closest('tr').find('.text-muted').text();
        showNotification('info', `Viewing progress for ${studentName} - ${progress} completion`);
    });

    $(document).on('click', '.btn-outline-success', function() {
        const studentName = $(this).closest('tr').find('h6').text();
        showNotification('info', `Editing student: ${studentName}`);
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const studentName = $(this).closest('tr').find('h6').text();
        if (confirm(`Are you sure you want to delete ${studentName}? This action cannot be undone.`)) {
            const row = $(this).closest('tr');
            row.fadeOut(300, function() {
                studentsTable.row($(this)).remove().draw();
                showNotification('error', `${studentName} has been deleted`);
            });
        }
    });

    // Bulk action handlers
    $(document).on('click', '.bulk-actions-bar .btn', function() {
        const action = $(this).text().trim();
        const selectedCount = $('.row-checkbox:checked').length;
        showNotification('info', `${action} for ${selectedCount} selected students`);
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
        $('.student-stat-number').each(function() {
            const $this = $(this);
            let target;
            const currentText = $this.text();

            if (currentText.includes('%')) {
                target = parseInt(currentText);
            } else {
                target = parseInt(currentText.replace(/,/g, ''));
            }

            const duration = 2000;
            let start = 0;
            const increment = target / (duration / 16);

            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    if (currentText.includes('%')) {
                        $this.text(target + '%');
                    } else {
                        $this.text(target.toLocaleString());
                    }
                    clearInterval(timer);
                } else {
                    if (currentText.includes('%')) {
                        $this.text(Math.floor(start) + '%');
                    } else {
                        $this.text(Math.floor(start).toLocaleString());
                    }
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
            $('#studentsSearch').focus();
        }

        // Escape to clear search and selection
        if (e.key === 'Escape') {
            $('#studentsSearch').val('').trigger('keyup');
            $('.row-checkbox').prop('checked', false);
            $('#selectAll').prop('checked', false);
            toggleBulkActionsBar();
        }
    });

    // Responsive table enhancements
    studentsTable.on('draw.dt', function() {
        // Add animation to new rows
        $('tbody tr').css('opacity', '0').animate({ opacity: 1 }, 300);

        // Update progress bar colors based on values
        $('.progress-bar').each(function() {
            const progress = parseInt($(this).attr('aria-valuenow'));
            $(this).removeClass('bg-success bg-warning bg-danger');
            if (progress >= 80) {
                $(this).addClass('bg-success');
            } else if (progress >= 60) {
                $(this).addClass('bg-warning');
            } else {
                $(this).addClass('bg-danger');
            }
        });
    });

    // Initialize with some sample animations
    $('tbody tr').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({ opacity: 1 }, 300);
    });

    // Progress bar hover effects
    $(document).on('mouseenter', '.progress', function() {
        $(this).find('.progress-bar').css('transform', 'scaleX(1.02)');
    }).on('mouseleave', '.progress', function() {
        $(this).find('.progress-bar').css('transform', 'scaleX(1)');
    });
});