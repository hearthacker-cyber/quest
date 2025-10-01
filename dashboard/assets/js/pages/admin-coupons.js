// Custom JavaScript for Coupons Page

$(document).ready(function() {
    // Initialize DataTable with export buttons
    const table = $('#couponsTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search coupons:",
            lengthMenu: "Show _MENU_ coupons",
            info: "Showing _START_ to _END_ of _TOTAL_ coupons",
            infoEmpty: "Showing 0 to 0 of 0 coupons",
            infoFiltered: "(filtered from _MAX_ total coupons)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [0, 'asc']
        ], // Sort by coupon code ascending
        columnDefs: [{
                targets: [6], // Actions column
                orderable: false,
                searchable: false,
                width: "120px"
            },
            {
                targets: [0], // Coupon Code
                width: "180px"
            },
            {
                targets: [1, 2, 5], // Discount Type, Value, Status
                width: "100px"
            }
        ],
        buttons: [{
                extend: 'csv',
                className: 'btn btn-sm btn-outline-primary',
                text: '<i class="fas fa-file-csv me-1"></i> CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-sm btn-outline-success',
                text: '<i class="fas fa-file-excel me-1"></i> Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm btn-outline-danger',
                text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-print me-1"></i> Print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5]
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

    // Coupon data storage (in real app, this would be from API)
    let couponsData = {
        1: {
            code: 'WELCOME20',
            description: 'New user discount',
            type: 'percentage',
            value: '20',
            maxDiscount: '500',
            validFrom: '2024-01-01',
            validTo: '2024-12-31',
            plans: ['basic', 'standard', 'premium', 'student'],
            usageLimit: '1000',
            usagePerUser: '1',
            minCartValue: '',
            status: 'active'
        },
        2: {
            code: 'STUDENT500',
            description: 'Student special',
            type: 'flat',
            value: '500',
            maxDiscount: '',
            validFrom: '2024-03-01',
            validTo: '2024-06-30',
            plans: ['student'],
            usageLimit: '500',
            usagePerUser: '1',
            minCartValue: '',
            status: 'active'
        },
        3: {
            code: 'SUMMER25',
            description: 'Summer sale',
            type: 'percentage',
            value: '25',
            maxDiscount: '',
            validFrom: '2024-05-01',
            validTo: '2024-05-31',
            plans: ['all'],
            usageLimit: '',
            usagePerUser: '1',
            minCartValue: '',
            status: 'inactive'
        }
    };

    let currentCouponId = null;

    // Add/Edit Coupon Modal
    $('#couponModal').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const couponId = button.data('id');

        if (couponId) {
            // Edit mode
            currentCouponId = couponId;
            const coupon = couponsData[couponId];

            $('#couponModalLabel').html('<i class="fas fa-edit me-2"></i>Edit Coupon');
            $('#couponId').val(couponId);
            $('#couponCode').val(coupon.code);
            $('#couponDescription').val(coupon.description);
            $('#discountType').val(coupon.type);
            $('#discountValue').val(coupon.value);
            $('#maxDiscount').val(coupon.maxDiscount);
            $('#validFrom').val(coupon.validFrom);
            $('#validTo').val(coupon.validTo);
            $('#usageLimit').val(coupon.usageLimit);
            $('#usagePerUser').val(coupon.usagePerUser);
            $('#minCartValue').val(coupon.minCartValue);
            $('#couponStatus').val(coupon.status);

            // Reset checkboxes
            $('.plan-checkbox').prop('checked', false);

            // Set applicable plans
            if (coupon.plans.includes('all')) {
                $('#planAll').prop('checked', true);
                $('.plan-checkbox:not([value="all"])').prop('checked', true).prop('disabled', true);
            } else {
                coupon.plans.forEach(plan => {
                    $(`#plan${plan.charAt(0).toUpperCase() + plan.slice(1)}`).prop('checked', true);
                });
            }
        } else {
            // Add mode
            currentCouponId = null;
            $('#couponModalLabel').html('<i class="fas fa-plus me-2"></i>Add New Coupon');
            $('#couponForm')[0].reset();
            $('.plan-checkbox').prop('checked', false);
            $('#planAll').prop('checked', true);
            $('.plan-checkbox:not([value="all"])').prop('checked', true).prop('disabled', true);

            // Set default dates
            const today = new Date().toISOString().split('T')[0];
            const nextMonth = new Date();
            nextMonth.setMonth(nextMonth.getMonth() + 1);
            const nextMonthStr = nextMonth.toISOString().split('T')[0];

            $('#validFrom').val(today);
            $('#validTo').val(nextMonthStr);
        }
    });

    // Generate Coupon Code
    $('#generateCode').on('click', function() {
        const prefixes = ['WELCOME', 'SUMMER', 'WINTER', 'SPRING', 'FALL', 'STUDENT', 'NEW', 'SPECIAL'];
        const suffixes = ['10', '15', '20', '25', '30', '50', '100', '200', '500'];

        const prefix = prefixes[Math.floor(Math.random() * prefixes.length)];
        const suffix = suffixes[Math.floor(Math.random() * suffixes.length)];

        $('#couponCode').val(prefix + suffix);
        showAlert('Coupon code generated!', 'success');
    });

    // Quick Action - Generate Code
    $('#generateCouponCode').on('click', function() {
        $('#couponModal').modal('show');
        setTimeout(() => {
            $('#generateCode').click();
        }, 500);
    });

    // All Plans checkbox logic
    $('#planAll').on('change', function() {
        if ($(this).is(':checked')) {
            $('.plan-checkbox:not([value="all"])').prop('checked', true).prop('disabled', true);
        } else {
            $('.plan-checkbox:not([value="all"])').prop('checked', false).prop('disabled', false);
        }
    });

    // Individual plan checkbox logic
    $('.plan-checkbox:not([value="all"])').on('change', function() {
        if (!$('.plan-checkbox:not([value="all"]):checked').length) {
            $('#planAll').prop('checked', false);
        }
    });

    // Save Coupon
    $('#saveCoupon').on('click', function() {
        const form = $('#couponForm')[0];

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Validate dates
        const validFrom = new Date($('#validFrom').val());
        const validTo = new Date($('#validTo').val());

        if (validTo <= validFrom) {
            showAlert('Valid To date must be after Valid From date', 'warning');
            return;
        }

        const saveBtn = $(this);
        const originalText = saveBtn.html();
        saveBtn.html('<span class="btn-loading"></span>');
        saveBtn.prop('disabled', true);

        // Collect form data
        const selectedPlans = $('#planAll').is(':checked') ?
            ['all'] :
            $('.plan-checkbox:not([value="all"]):checked').map(function() {
                return $(this).val();
            }).get();

        const formData = {
            id: currentCouponId || Date.now(),
            code: $('#couponCode').val().toUpperCase(),
            description: $('#couponDescription').val(),
            type: $('#discountType').val(),
            value: $('#discountValue').val(),
            maxDiscount: $('#maxDiscount').val() || '',
            validFrom: $('#validFrom').val(),
            validTo: $('#validTo').val(),
            plans: selectedPlans,
            usageLimit: $('#usageLimit').val() || '',
            usagePerUser: $('#usagePerUser').val() || '1',
            minCartValue: $('#minCartValue').val() || '',
            status: $('#couponStatus').val()
        };

        // Simulate API call
        setTimeout(() => {
            if (currentCouponId) {
                // Update existing coupon
                couponsData[currentCouponId] = formData;
                showAlert('Coupon updated successfully!', 'success');
            } else {
                // Add new coupon
                couponsData[formData.id] = formData;
                showAlert('New coupon created successfully!', 'success');
            }

            // Refresh table (in real app, this would be an API call)
            refreshTable();

            // Reset and close modal
            saveBtn.html(originalText);
            saveBtn.prop('disabled', false);
            $('#couponModal').modal('hide');
        }, 1000);
    });

    // Edit Coupon
    $(document).on('click', '.edit-coupon', function() {
        const couponId = $(this).data('id');
        $('#couponModal').modal('show');
    });

    // Toggle Coupon Status
    $(document).on('click', '.toggle-coupon', function() {
        const couponId = $(this).data('id');
        const coupon = couponsData[couponId];
        const newStatus = coupon.status === 'active' ? 'inactive' : 'active';
        const action = newStatus === 'active' ? 'enabled' : 'disabled';

        if (confirm(`Are you sure you want to ${action} coupon "${coupon.code}"?`)) {
            const btn = $(this);
            const originalText = btn.html();

            btn.html('<i class="fas fa-spinner fa-spin"></i>');
            btn.prop('disabled', true);

            setTimeout(() => {
                couponsData[couponId].status = newStatus;
                showAlert(`Coupon "${coupon.code}" ${action} successfully!`, 'success');
                refreshTable();
                btn.html(originalText);
                btn.prop('disabled', false);
            }, 800);
        }
    });

    // Delete Coupon
    $(document).on('click', '.delete-coupon', function() {
        const couponId = $(this).data('id');
        const couponCode = couponsData[couponId] ? .code || 'this coupon';

        $('#deleteCouponCode').text(couponCode);
        $('#deleteModal').modal('show');

        $('#confirmDelete').off('click').on('click', function() {
            const deleteBtn = $(this);
            const originalText = deleteBtn.html();
            deleteBtn.html('<span class="btn-loading"></span>');
            deleteBtn.prop('disabled', true);

            // Simulate API call
            setTimeout(() => {
                delete couponsData[couponId];
                showAlert(`Coupon "${couponCode}" deleted successfully!`, 'success');
                refreshTable();

                deleteBtn.html(originalText);
                deleteBtn.prop('disabled', false);
                $('#deleteModal').modal('hide');
            }, 800);
        });
    });

    // Duplicate Coupon
    $(document).on('click', '.btn-outline-secondary[title="Duplicate"]', function() {
        const couponId = $(this).data('id');
        const originalCoupon = couponsData[couponId];

        if (confirm(`Duplicate coupon "${originalCoupon.code}"?`)) {
            const newCouponId = Date.now();
            const newCode = originalCoupon.code + '_COPY';

            couponsData[newCouponId] = {
                ...originalCoupon,
                code: newCode,
                status: 'inactive'
            };

            showAlert(`Coupon duplicated as "${newCode}"`, 'success');
            refreshTable();
        }
    });

    // Quick Actions
    $('#bulkCreate').on('click', function() {
        showAlert('Bulk create functionality would open a special modal', 'info');
    });

    $('#exportCoupons').on('click', function() {
        // Trigger CSV export
        $('.buttons-csv').click();
    });

    $('#refreshTable').on('click', function() {
        const btn = $(this);
        const originalHtml = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Refreshing...');
        btn.prop('disabled', true);

        setTimeout(() => {
            refreshTable();
            btn.html(originalHtml);
            btn.prop('disabled', false);
            showAlert('Table refreshed successfully!', 'success');
        }, 800);
    });

    // Helper function to refresh table
    function refreshTable() {
        // In a real application, this would be an API call
        // For now, we'll just reload the page
        location.reload();
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

    // Form validation styling
    $('#couponForm input, #couponForm select').on('blur', function() {
        if (!$(this).val() && $(this).prop('required')) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });

    // Show/hide max discount field based on discount type
    $('#discountType').on('change', function() {
        if ($(this).val() === 'percentage') {
            $('#maxDiscount').closest('.mb-3').show();
        } else {
            $('#maxDiscount').closest('.mb-3').hide();
        }
    });

    // Trigger initial state
    $('#discountType').trigger('change');
});