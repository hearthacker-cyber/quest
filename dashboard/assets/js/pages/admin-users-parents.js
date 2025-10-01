// Parents Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    const parentsTable = $('#parents-datatable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            },
            search: "",
            searchPlaceholder: "Search parents...",
            lengthMenu: "_MENU_ records per page",
            info: "Showing _START_ to _END_ of _TOTAL_ parents",
            infoEmpty: "No parents available",
            infoFiltered: "(filtered from _MAX_ total parents)"
        },
        columnDefs: [
            { orderable: false, targets: [0, 6] }, // Disable sorting for checkbox and actions columns
            { responsivePriority: 1, targets: 2 }, // Name column
            { responsivePriority: 2, targets: 6 }, // Actions column
            { responsivePriority: 3, targets: 3 }, // Email column
            {
                targets: 4, // Linked Students column
                render: function(data, type, row) {
                    if (type === 'display') {
                        return data;
                    }
                    // For sorting and filtering, return plain text
                    return $(data).text() || data;
                }
            }
        ],
        order: [
            [1, 'asc']
        ], // Default sort by Parent ID
        pageLength: 10,
        drawCallback: function(settings) {
            // Re-initialize tooltips after table redraw
            $('[data-bs-toggle="tooltip"]').tooltip('dispose').tooltip();

            // Update student count for filtering
            updateStudentCounts();
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
    $('#parentsSearch').on('keyup', function() {
        parentsTable.search(this.value).draw();
    });

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const subscriptionFilter = $('#subscriptionFilter').val();
        const studentsFilter = $('#studentsFilter').val();

        // Combine filters
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const subscription = data[5].toLowerCase();
                const students = data[4];

                let subscriptionMatch = true;
                let studentsMatch = true;

                if (subscriptionFilter) {
                    if (subscriptionFilter === 'premium') {
                        subscriptionMatch = subscription.includes('premium');
                    } else if (subscriptionFilter === 'basic') {
                        subscriptionMatch = subscription.includes('basic');
                    } else if (subscriptionFilter === 'family') {
                        subscriptionMatch = subscription.includes('family');
                    } else if (subscriptionFilter === 'trial') {
                        subscriptionMatch = subscription.includes('trial');
                    } else if (subscriptionFilter === 'none') {
                        subscriptionMatch = subscription.includes('no plan');
                    }
                }

                if (studentsFilter) {
                    const studentCount = countStudents(students);
                    if (studentsFilter === '0') {
                        studentsMatch = studentCount === 0;
                    } else if (studentsFilter === '1') {
                        studentsMatch = studentCount === 1;
                    } else if (studentsFilter === '2') {
                        studentsMatch = studentCount === 2;
                    } else if (studentsFilter === '3') {
                        studentsMatch = studentCount >= 3;
                    }
                }

                return subscriptionMatch && studentsMatch;
            }
        );

        parentsTable.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function
    });

    // Count students from student chips
    function countStudents(studentsHtml) {
        const $temp = $('<div>').html(studentsHtml);
        const studentChips = $temp.find('.student-chip');
        return studentChips.length;
    }

    // Update student counts for display
    function updateStudentCounts() {
        $('tbody tr').each(function() {
            const studentsCell = $(this).find('td:eq(4)');
            const studentCount = countStudents(studentsCell.html());
            if (studentCount > 0) {
                studentsCell.attr('data-student-count', studentCount);
            }
        });
    }

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#subscriptionFilter').val('');
        $('#studentsFilter').val('');
        parentsTable.search('').draw();
        showNotification('info', 'All filters cleared');
    });

    // Refresh table
    $('#refreshTable').on('click', function() {
        parentsTable.ajax.reload();
        showNotification('info', 'Parent data refreshed');
    });

    // Export functionality
    $('#exportParents').on('click', function() {
        showNotification('info', 'Preparing parent data for export...');
        setTimeout(() => {
            showNotification('success', 'Parent data exported successfully!');
        }, 2000);
    });

    // Print functionality
    $('#printTable').on('click', function() {
        window.print();
    });

    // Bulk message functionality
    $('#sendBulkMessage').on('click', function() {
        showNotification('info', 'Opening bulk message composer for parents...');
    });

    // Action button handlers
    $(document).on('click', '.btn-outline-info', function() {
        const parentId = $(this).closest('tr').find('td:eq(1)').text();
        const parentName = $(this).closest('tr').find('h6').text();
        const studentCount = countStudents($(this).closest('tr').find('td:eq(4)').html());

        if (studentCount > 0) {
            showNotification('success', `Viewing ${studentCount} linked students for ${parentName}`);
        } else {
            showNotification('warning', `${parentName} has no linked students`);
        }
    });

    $(document).on('click', '.btn-outline-success', function() {
        const parentName = $(this).closest('tr').find('h6').text();
        showNotification('info', `Editing parent: ${parentName}`);
    });

    $(document).on('click', '.btn-outline-warning', function() {
        const parentName = $(this).closest('tr').find('h6').text();
        const currentPlan = $(this).closest('tr').find('.badge').text();
        showNotification('info', `Managing subscription for ${parentName} (Current: ${currentPlan})`);
    });

    $(document).on('click', '.btn-outline-danger', function() {
        const parentName = $(this).closest('tr').find('h6').text();
        const studentCount = countStudents($(this).closest('tr').find('td:eq(4)').html());

        let message = `Are you sure you want to delete ${parentName}?`;
        if (studentCount > 0) {
            message += ` This will also unlink ${studentCount} student(s).`;
        }
        message += " This action cannot be undone.";

        if (confirm(message)) {
            const row = $(this).closest('tr');
            row.fadeOut(300, function() {
                parentsTable.row($(this)).remove().draw();
                showNotification('error', `${parentName} has been deleted`);
            });
        }
    });

    // Student chip click handler
    $(document).on('click', '.student-chip', function(e) {
        e.stopPropagation();
        const studentName = $(this).text().split(' (')[0];
        showNotification('info', `Viewing student profile: ${studentName}`);
    });

    // Bulk action handlers
    $(document).on('click', '.bulk-actions-bar .btn', function() {
        const action = $(this).text().trim();
        const selectedCount = $('.row-checkbox:checked').length;
        showNotification('info', `${action} for ${selectedCount} selected parents`);
    });

    // Link Students button handler
    $('.btn-outline-info:contains("Link Students")').on('click', function() {
        const selectedCount = $('.row-checkbox:checked').length;
        if (selectedCount > 0) {
            showNotification('info', `Opening student linking for ${selectedCount} selected parents`);
        } else {
            showNotification('warning', 'Please select at least one parent to link students');
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
        $('.parent-stat-number').each(function() {
            const $this = $(this);
            let target;
            const currentText = $this.text();

            if (currentText.includes('.')) {
                target = parseFloat(currentText);
            } else {
                target = parseInt(currentText.replace(/,/g, ''));
            }

            const duration = 2000;
            let start = 0;
            const increment = target / (duration / 16);

            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    if (currentText.includes('.')) {
                        $this.text(target.toFixed(1));
                    } else {
                        $this.text(target.toLocaleString());
                    }
                    clearInterval(timer);
                } else {
                    if (currentText.includes('.')) {
                        $this.text(start.toFixed(1));
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
            $('#parentsSearch').focus();
        }

        // Escape to clear search and selection
        if (e.key === 'Escape') {
            $('#parentsSearch').val('').trigger('keyup');
            $('.row-checkbox').prop('checked', false);
            $('#selectAll').prop('checked', false);
            toggleBulkActionsBar();
        }
    });

    // Responsive table enhancements
    parentsTable.on('draw.dt', function() {
        // Add animation to new rows
        $('tbody tr').css('opacity', '0').animate({ opacity: 1 }, 300);
    });

    // Initialize with some sample animations
    $('tbody tr').each(function(index) {
        $(this).css('opacity', '0').delay(index * 100).animate({ opacity: 1 }, 300);
    });

    // Student chip hover effects
    $(document).on('mouseenter', '.student-chip', function() {
        $(this).css('transform', 'translateX(4px)');
    }).on('mouseleave', '.student-chip', function() {
        $(this).css('transform', 'translateX(0)');
    });

    // Initialize student counts
    updateStudentCounts();
});