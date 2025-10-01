// Custom JavaScript for Subscriptions Page

$(document).ready(function() {
    // Initialize DataTable with advanced features
    const table = $('#subscriptionsTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search subscriptions:",
            lengthMenu: "Show _MENU_ subscriptions",
            info: "Showing _START_ to _END_ of _TOTAL_ subscriptions",
            infoEmpty: "Showing 0 to 0 of 0 subscriptions",
            infoFiltered: "(filtered from _MAX_ total subscriptions)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [1, 'asc']
        ], // Sort by subscription ID ascending
        columnDefs: [{
                targets: [0, 7], // Checkbox and Actions columns
                orderable: false,
                searchable: false
            },
            {
                targets: [0], // Checkbox column
                width: "30px"
            },
            {
                targets: [1], // Subscription ID
                width: "100px"
            },
            {
                targets: [6], // Status
                width: "100px"
            }
        ],
        createdRow: function(row, data, dataIndex) {
            // Add animation class
            $(row).addClass('fade-in-up');

            // Add status class for row styling
            const status = $(row).find('td:eq(6)').text().toLowerCase().replace(' ', '-');
            $(row).addClass('status-' + status);
        }
    });

    // Select All checkbox
    $('#selectAll').on('click', function() {
        const isChecked = $(this).prop('checked');
        $('.row-checkbox').prop('checked', isChecked);
        updateBulkActions();
    });

    // Individual row checkbox
    $(document).on('change', '.row-checkbox', function() {
        updateBulkActions();

        // Update Select All checkbox state
        const totalRows = $('.row-checkbox').length;
        const checkedRows = $('.row-checkbox:checked').length;
        $('#selectAll').prop('checked', totalRows === checkedRows);
    });

    // Update bulk actions based on selection
    function updateBulkActions() {
        const selectedCount = $('.row-checkbox:checked').length;
        $('#selectedCount').text(selectedCount);

        // Enable/disable bulk actions dropdown
        const bulkActionsBtn = $('#bulkActionsDropdown');
        if (selectedCount > 0) {
            bulkActionsBtn.prop('disabled', false);
            bulkActionsBtn.html(`<i class="fas fa-tasks me-1"></i> Bulk Actions (${selectedCount})`);
        } else {
            bulkActionsBtn.prop('disabled', true);
            bulkActionsBtn.html('<i class="fas fa-tasks me-1"></i> Bulk Actions');
        }
    }

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const planFilter = $('#planTypeFilter').val();
        const statusFilter = $('#statusFilter').val();
        const dateFrom = $('#dateFromFilter').val();
        const dateTo = $('#dateToFilter').val();

        // Apply filters to DataTable
        table.draw();

        showAlert('Filters applied successfully!', 'success');
    });

    // Reset filters
    $('#resetFilters').on('click', function() {
        $('#planTypeFilter').val('');
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

    // Export data
    $('#exportData').on('click', function() {
        // Trigger DataTables export
        $('.buttons-excel').click();
    });

    // View Subscription Details
    $(document).on('click', '.view-subscription', function() {
        const subscriptionId = $(this).data('id');

        // Simulate loading subscription data
        const subscriptionData = {
            id: subscriptionId,
            plan: 'Premium Plan',
            price: '₹1,999/month',
            status: 'Active',
            startDate: '2024-01-10',
            expiryDate: '2024-04-10',
            userName: 'Amit Kumar',
            userEmail: 'amit@example.com',
            userPhone: '+91 9876543210',
            userJoined: '2023-08-15'
        };

        // Populate modal with data
        $('#detailId').text(subscriptionData.id);
        $('#detailPlan').text(subscriptionData.plan);
        $('#detailPrice').text(subscriptionData.price);
        $('#detailStatus').html(`<span class="badge bg-success">${subscriptionData.status}</span>`);
        $('#detailStartDate').text(subscriptionData.startDate);
        $('#detailExpiryDate').text(subscriptionData.expiryDate);
        $('#detailUserName').text(subscriptionData.userName);
        $('#detailUserEmail').text(subscriptionData.userEmail);
        $('#detailUserPhone').text(subscriptionData.userPhone);
        $('#detailUserJoined').text(subscriptionData.userJoined);

        // Load payment history
        const paymentHistory = `
            <tr>
                <td>2024-01-10</td>
                <td>₹1,999</td>
                <td>Credit Card</td>
                <td><span class="badge bg-success">Success</span></td>
            </tr>
            <tr>
                <td>2023-12-10</td>
                <td>₹1,999</td>
                <td>Credit Card</td>
                <td><span class="badge bg-success">Success</span></td>
            </tr>
            <tr>
                <td>2023-11-10</td>
                <td>₹1,999</td>
                <td>UPI</td>
                <td><span class="badge bg-success">Success</span></td>
            </tr>
        `;
        $('#paymentHistory').html(paymentHistory);

        $('#viewSubscriptionModal').modal('show');
    });

    // Extend Subscription
    $(document).on('click', '.extend-subscription', function() {
        const subscriptionId = $(this).data('id');
        const userName = $(this).closest('tr').find('h6.mb-0').first().text();
        const currentExpiry = $(this).closest('tr').find('td:eq(5) .text-nowrap').text();

        $('#extendUserName').text(userName);
        $('#currentExpiry').text(currentExpiry);

        // Calculate new expiry date
        calculateNewExpiry();

        $('#extendSubscriptionModal').modal('show');
    });

    // Calculate new expiry date when months change
    $('#extendMonths').on('change', calculateNewExpiry);

    function calculateNewExpiry() {
        const months = parseInt($('#extendMonths').val());
        const currentExpiry = $('#currentExpiry').text();

        if (currentExpiry !== '-') {
            const currentDate = new Date(currentExpiry);
            currentDate.setMonth(currentDate.getMonth() + months);
            const newExpiry = currentDate.toISOString().split('T')[0];
            $('#newExpiry').text(newExpiry);
        }
    }

    // Confirm extend subscription
    $('#confirmExtend').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<span class="btn-loading"></span>');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Subscription extended successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
            $('#extendSubscriptionModal').modal('hide');
        }, 1500);
    });

    // Upgrade Subscription
    $(document).on('click', '.upgrade-subscription', function() {
        const subscriptionId = $(this).data('id');
        // In real implementation, show upgrade options modal
        showAlert('Upgrade functionality would show available plans here', 'info');
    });

    // Cancel Subscription
    $(document).on('click', '.cancel-subscription', function() {
        const subscriptionId = $(this).data('id');
        const userName = $(this).closest('tr').find('h6.mb-0').first().text();

        if (confirm(`Are you sure you want to cancel subscription for ${userName}?`)) {
            const btn = $(this);
            const originalText = btn.html();

            btn.html('<i class="fas fa-spinner fa-spin"></i>');
            btn.prop('disabled', true);

            setTimeout(() => {
                showAlert(`Subscription for ${userName} has been cancelled`, 'warning');
                btn.html(originalText);
                btn.prop('disabled', false);
                // In real app, update status via API
            }, 1000);
        }
    });

    // Bulk Actions
    $('.bulk-action').on('click', function(e) {
        e.preventDefault();
        const action = $(this).data('action');
        const selectedCount = $('.row-checkbox:checked').length;

        if (selectedCount === 0) {
            showAlert('Please select at least one subscription', 'warning');
            return;
        }

        const actionTitles = {
            'extend': 'Extend Subscriptions',
            'upgrade': 'Upgrade Plans',
            'cancel': 'Cancel Subscriptions'
        };

        const actionMessages = {
            'extend': 'Extend selected subscriptions by specified duration?',
            'upgrade': 'Upgrade selected subscriptions to higher plans?',
            'cancel': 'Cancel selected subscriptions? This action cannot be undone.'
        };

        $('#bulkActionTitle').html(`<i class="fas fa-tasks me-2"></i>${actionTitles[action]}`);
        $('#bulkActionMessage').text(actionMessages[action]);
        $('#selectedCount').text(selectedCount);

        $('#bulkActionModal').modal('show');

        // Set up confirm action
        $('#confirmBulkAction').off('click').on('click', function() {
            const btn = $(this);
            const originalText = btn.html();

            btn.html('<span class="btn-loading"></span>');
            btn.prop('disabled', true);

            setTimeout(() => {
                showAlert(`Bulk ${action} action completed for ${selectedCount} subscription(s)`, 'success');
                btn.html(originalText);
                btn.prop('disabled', false);
                $('#bulkActionModal').modal('hide');

                // Clear selection
                $('.row-checkbox').prop('checked', false);
                $('#selectAll').prop('checked', false);
                updateBulkActions();
            }, 2000);
        });
    });

    // Send Reminder
    $('#sendReminder').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Sending...');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Reminder sent successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
            $('#viewSubscriptionModal').modal('hide');
        }, 1000);
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
            <div class="alert ${alertClass} alert-dismissible fade show alert-toast" role="alert">
                <i class="fas ${iconClass} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        // Remove existing alerts
        $('.alert-toast').remove();

        // Add new alert
        $('body').append(alertHtml);

        // Auto remove after 5 seconds
        setTimeout(() => {
            $('.alert-toast').alert('close');
        }, 5000);
    }

    // Initialize tooltips
    $('[title]').tooltip({
        trigger: 'hover',
        placement: 'top'
    });

    // Set default date filters
    const today = new Date().toISOString().split('T')[0];
    $('#dateFromFilter').val(today);

    const nextMonth = new Date();
    nextMonth.setMonth(nextMonth.getMonth() + 1);
    $('#dateToFilter').val(nextMonth.toISOString().split('T')[0]);

    // Responsive adjustments
    $(window).on('resize', function() {
        table.responsive.recalc();
    });
});