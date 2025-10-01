// Custom JavaScript for Plans & Packages Page

$(document).ready(function() {
    // Initialize DataTable with advanced features
    const table = $('#plansTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search plans:",
            lengthMenu: "Show _MENU_ plans",
            info: "Showing _START_ to _END_ of _TOTAL_ plans",
            infoEmpty: "Showing 0 to 0 of 0 plans",
            infoFiltered: "(filtered from _MAX_ total plans)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [1, 'asc']
        ], // Sort by plan name ascending
        columnDefs: [{
                targets: [6], // Actions column
                orderable: false,
                searchable: false,
                width: "100px"
            },
            {
                targets: [0], // Plan ID
                width: "90px"
            },
            {
                targets: [2, 3, 5], // Price, Duration, Status
                width: "120px"
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

    // Plan data storage (in real app, this would be from API)
    let plansData = {
        1: {
            name: 'Basic',
            price: '499',
            duration: '1',
            status: 'active',
            features: ['10 Tests', 'Basic Support', 'PDF Reports'],
            description: 'Essential features for individual users'
        },
        2: {
            name: 'Standard',
            price: '999',
            duration: '3',
            status: 'active',
            features: ['50 Tests', 'Priority Support', 'Analytics', 'Mobile Access', 'Custom Reports'],
            description: 'Popular choice for serious learners'
        },
        3: {
            name: 'Premium',
            price: '1999',
            duration: '6',
            status: 'active',
            features: ['Unlimited Tests', '24/7 Support', 'Advanced Analytics', 'API Access', 'White Label', 'Dedicated Manager'],
            description: 'Full access with all premium features'
        },
        4: {
            name: 'Student',
            price: '299',
            duration: '1',
            status: 'active',
            features: ['15 Tests', 'Email Support', 'Basic Reports'],
            description: 'Special discount for students'
        },
        5: {
            name: 'Enterprise',
            price: '4999',
            duration: '12',
            status: 'inactive',
            features: ['Unlimited Everything', 'Dedicated Manager', 'Custom Features', 'API Access', 'White Label', '24/7 Support'],
            description: 'For organizations and institutions'
        }
    };

    let currentPlanId = null;

    // Add New Plan Button
    $('#planModal').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const planId = button.data('id');

        if (planId) {
            // Edit mode
            currentPlanId = planId;
            const plan = plansData[planId];

            $('#planModalLabel').html('<i class="fas fa-edit me-2"></i>Edit Plan');
            $('#planId').val(planId);
            $('#planName').val(plan.name);
            $('#planPrice').val(plan.price);
            $('#planDuration').val(plan.duration);
            $('#planStatus').val(plan.status);
            $('#planDescription').val(plan.description);

            // Reset checkboxes
            $('.feature-checkbox').prop('checked', false);

            // Set features (simplified - in real app, map features properly)
            plan.features.forEach(feature => {
                // This is a simplified mapping
                const featureMap = {
                    '10 Tests': 'feature1',
                    '50 Tests': 'feature1',
                    'Unlimited Tests': 'feature1',
                    '15 Tests': 'feature1',
                    'Unlimited Everything': 'feature1',
                    'Basic Support': 'feature3',
                    'Priority Support': 'feature3',
                    '24/7 Support': 'feature3',
                    'Email Support': 'feature3',
                    'Dedicated Manager': 'feature8',
                    'PDF Reports': 'feature4',
                    'Custom Reports': 'feature4',
                    'Analytics': 'feature2',
                    'Advanced Analytics': 'feature2',
                    'Mobile Access': 'feature5',
                    'API Access': 'feature6',
                    'White Label': 'feature7',
                    'Custom Features': 'feature4'
                };

                const checkboxId = featureMap[feature];
                if (checkboxId) {
                    $('#' + checkboxId).prop('checked', true);
                }
            });
        } else {
            // Add mode
            currentPlanId = null;
            $('#planModalLabel').html('<i class="fas fa-plus me-2"></i>Add New Plan');
            $('#planForm')[0].reset();
            $('.feature-checkbox').prop('checked', false);
        }
    });

    // Save Plan
    $('#savePlan').on('click', function() {
        const form = $('#planForm')[0];

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const saveBtn = $(this);
        const originalText = saveBtn.html();
        saveBtn.html('<span class="btn-loading"></span>');
        saveBtn.prop('disabled', true);

        // Collect form data
        const formData = {
            id: currentPlanId || Date.now(),
            name: $('#planName').val(),
            price: $('#planPrice').val(),
            duration: $('#planDuration').val(),
            status: $('#planStatus').val(),
            description: $('#planDescription').val(),
            features: getSelectedFeatures()
        };

        // Simulate API call
        setTimeout(() => {
            if (currentPlanId) {
                // Update existing plan
                plansData[currentPlanId] = formData;
                showAlert('Plan updated successfully!', 'success');
            } else {
                // Add new plan
                plansData[formData.id] = formData;
                showAlert('New plan created successfully!', 'success');
            }

            // Refresh table (in real app, this would be an API call)
            refreshTable();

            // Reset and close modal
            saveBtn.html(originalText);
            saveBtn.prop('disabled', false);
            $('#planModal').modal('hide');
        }, 1000);
    });

    // Edit Plan
    $(document).on('click', '.edit-plan', function() {
        const planId = $(this).data('id');
        $('#planModal').modal('show');
        // The modal show event will handle populating the form
    });

    // Delete Plan
    $(document).on('click', '.delete-plan', function() {
        const planId = $(this).data('id');
        const planName = plansData[planId] ? .name || 'this plan';

        $('#deleteModal').modal('show');

        $('#confirmDelete').off('click').on('click', function() {
            const deleteBtn = $(this);
            const originalText = deleteBtn.html();
            deleteBtn.html('<span class="btn-loading"></span>');
            deleteBtn.prop('disabled', true);

            // Simulate API call
            setTimeout(() => {
                delete plansData[planId];
                showAlert(`Plan "${planName}" deleted successfully!`, 'success');
                refreshTable();

                deleteBtn.html(originalText);
                deleteBtn.prop('disabled', false);
                $('#deleteModal').modal('hide');
            }, 800);
        });
    });

    // Refresh Table
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

    // Helper function to get selected features
    function getSelectedFeatures() {
        const features = [];
        $('.feature-checkbox:checked').each(function() {
            features.push($(this).next('label').text().trim());
        });

        // Add custom features
        const customFeatures = $('#customFeatures').val().split('\n').filter(f => f.trim());
        features.push(...customFeatures);

        return features;
    }

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

    // Export functionality
    new $.fn.dataTable.Buttons(table, {
        buttons: [{
                extend: 'copy',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-copy me-1"></i> Copy'
            },
            {
                extend: 'csv',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-file-csv me-1"></i> CSV'
            },
            {
                extend: 'excel',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-file-excel me-1"></i> Excel'
            },
            {
                extend: 'print',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-print me-1"></i> Print'
            }
        ]
    });

    table.buttons().container().appendTo($('.dataTables_length'));

    // Responsive adjustments
    $(window).on('resize', function() {
        table.responsive.recalc();
    });

    // Form validation styling
    $('#planForm input, #planForm select').on('blur', function() {
        if (!$(this).val()) {
            $(this).addClass('is-invalid');
        } else {
            $(this).removeClass('is-invalid');
        }
    });
});