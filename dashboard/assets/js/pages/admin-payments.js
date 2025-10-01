// Custom JavaScript for Payments Page

$(document).ready(function() {
    // Initialize DataTable with export buttons
    const table = $('#paymentsTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search transactions:",
            lengthMenu: "Show _MENU_ transactions",
            info: "Showing _START_ to _END_ of _TOTAL_ transactions",
            infoEmpty: "Showing 0 to 0 of 0 transactions",
            infoFiltered: "(filtered from _MAX_ total transactions)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [6, 'desc']
        ], // Sort by date descending
        columnDefs: [{
                targets: [7], // Actions column
                orderable: false,
                searchable: false,
                width: "100px"
            },
            {
                targets: [0], // Transaction ID
                width: "120px"
            },
            {
                targets: [3, 5, 6], // Amount, Status, Date
                width: "100px"
            }
        ],
        buttons: [{
                extend: 'csv',
                className: 'btn btn-sm btn-outline-primary',
                text: '<i class="fas fa-file-csv me-1"></i> CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-sm btn-outline-success',
                text: '<i class="fas fa-file-excel me-1"></i> Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm btn-outline-danger',
                text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                },
                customize: function(doc) {
                    doc.content[1].table.widths =
                        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-print me-1"></i> Print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            }
        ],
        createdRow: function(row, data, dataIndex) {
            // Add animation class
            $(row).addClass('fade-in-up');

            // Add status class for row styling
            const status = $(row).find('td:eq(5)').text().toLowerCase();
            $(row).addClass('status-' + status);
        }
    });

    // Add export buttons to the page
    table.buttons().container().appendTo('.export-buttons');

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const statusFilter = $('#statusFilter').val();
        const paymentMethodFilter = $('#paymentMethodFilter').val();
        const dateFrom = $('#dateFromFilter').val();
        const dateTo = $('#dateToFilter').val();

        // Apply filters to DataTable
        table.draw();

        showAlert('Filters applied successfully!', 'success');
    });

    // Reset filters
    $('#resetFilters').on('click', function() {
        $('#statusFilter').val('');
        $('#paymentMethodFilter').val('');
        $('#dateFromFilter').val('2024-01-01');
        $('#dateToFilter').val('2024-03-31');
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

    // Generate Analytics Report
    $('#generateReport').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Generating...');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Analytics report generated successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);

            // In real implementation, this would download a report
            // For now, trigger PDF export
            $('.buttons-pdf').click();
        }, 2000);
    });

    // View Invoice
    $(document).on('click', '.view-invoice', function() {
        const transactionId = $(this).data('id');
        const row = $(this).closest('tr');

        // Get data from the row
        const userName = row.find('h6.mb-0').first().text();
        const userEmail = row.find('small.text-muted').first().text();
        const planName = row.find('td:eq(2) h6.mb-0').text();
        const planDuration = row.find('td:eq(2) small.text-muted').text();
        const amount = row.find('td:eq(3) h6').text();
        const paymentMethod = row.find('td:eq(4) span').text();
        const status = row.find('td:eq(5) .badge').text();
        const date = row.find('td:eq(6) .text-nowrap').text();

        // Calculate amounts for invoice
        const amountValue = parseInt(amount.replace('₹', '').replace(',', ''));
        const subtotal = Math.round(amountValue / 1.18);
        const gstAmount = amountValue - subtotal;

        // Populate invoice modal
        $('#invoiceNumber').text('INV-' + transactionId.split('-')[1]);
        $('#invoiceDate').text(date);
        $('#invoiceDueDate').text(date); // Same as invoice date for simplicity
        $('#customerName').text(userName);
        $('#customerEmail').text(userEmail);
        $('#customerAddress').text('Mumbai, Maharashtra, India');
        $('#paymentMethod').text(paymentMethod);
        $('#paymentStatus').html(`<span class="badge bg-${getStatusColor(status)}">${status}</span>`);
        $('#transactionId').text(transactionId);
        $('#planName').text(planName);
        $('#planDescription').text('Online learning platform subscription');
        $('#planDuration').text(planDuration);
        $('#planAmount').text('₹' + subtotal.toLocaleString());
        $('#subtotal').text('₹' + subtotal.toLocaleString());
        $('#gstAmount').text('₹' + gstAmount.toLocaleString());
        $('#totalAmount').html('<h5 class="mb-0 text-success">' + amount + '</h5>');

        $('#viewInvoiceModal').modal('show');
    });

    // Refund Payment
    $(document).on('click', '.refund-payment', function() {
        const transactionId = $(this).data('id');
        const row = $(this).closest('tr');

        const userName = row.find('h6.mb-0').first().text();
        const amount = row.find('td:eq(3) h6').text();

        $('#refundTransactionId').text(transactionId);
        $('#refundAmount').text(amount);
        $('#refundCustomer').text(userName);
        $('#refundReason').val('');

        $('#refundModal').modal('show');
    });

    // Confirm Refund
    $('#confirmRefund').on('click', function() {
        const refundReason = $('#refundReason').val().trim();

        if (!refundReason) {
            showAlert('Please enter a refund reason', 'warning');
            return;
        }

        const btn = $(this);
        const originalText = btn.html();

        btn.html('<span class="btn-loading"></span>');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Refund processed successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
            $('#refundModal').modal('hide');

            // In real app, update transaction status
        }, 1500);
    });

    // Download Invoice
    $('#downloadInvoice').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Downloading...');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Invoice downloaded successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);

            // In real implementation, this would download the PDF
            // For demo, we'll trigger the browser print dialog
            window.print();
        }, 1000);
    });

    // Send Invoice via Email
    $('#sendInvoice').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Sending...');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Invoice sent via email successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
        }, 1000);
    });

    // Approve Pending Payment
    $(document).on('click', '.btn-outline-success[title="Approve"]', function() {
        const transactionId = $(this).data('id');
        const row = $(this).closest('tr');
        const userName = row.find('h6.mb-0').first().text();

        if (confirm(`Approve payment for ${userName}?`)) {
            const btn = $(this);
            const originalText = btn.html();

            btn.html('<i class="fas fa-spinner fa-spin"></i>');
            btn.prop('disabled', true);

            setTimeout(() => {
                showAlert(`Payment for ${userName} approved successfully!`, 'success');
                btn.html(originalText);
                btn.prop('disabled', false);
                // In real app, update status via API
            }, 1000);
        }
    });

    // Retry Failed Payment
    $(document).on('click', '.btn-outline-secondary[title="Retry"]', function() {
        const transactionId = $(this).data('id');
        showAlert('Retry payment functionality would be implemented here', 'info');
    });

    // Helper function to get status color
    function getStatusColor(status) {
        const statusColors = {
            'Success': 'success',
            'Failed': 'danger',
            'Pending': 'warning',
            'Refunded': 'info'
        };
        return statusColors[status] || 'secondary';
    }

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

    // Responsive adjustments
    $(window).on('resize', function() {
        table.responsive.recalc();
    });

    // Custom filtering for payment methods and status
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            const statusFilter = $('#statusFilter').val();
            const paymentMethodFilter = $('#paymentMethodFilter').val();
            const dateFrom = $('#dateFromFilter').val();
            const dateTo = $('#dateToFilter').val();

            const status = data[5].toLowerCase();
            const paymentMethod = data[4].toLowerCase();
            const date = data[6];

            // Status filter
            if (statusFilter && status !== statusFilter.toLowerCase()) {
                return false;
            }

            // Payment method filter
            if (paymentMethodFilter && !paymentMethod.includes(paymentMethodFilter.toLowerCase())) {
                return false;
            }

            // Date range filter (simplified)
            if (dateFrom && dateTo) {
                const rowDate = new Date(date);
                const fromDate = new Date(dateFrom);
                const toDate = new Date(dateTo);

                if (rowDate < fromDate || rowDate > toDate) {
                    return false;
                }
            }

            return true;
        }
    );
});