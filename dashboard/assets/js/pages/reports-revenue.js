// Revenue Reports JavaScript

$(document).ready(function() {
    // Initialize Date Range Picker
    $('#dateRangePicker').daterangepicker({
        opens: 'left',
        startDate: moment().subtract(30, 'days'),
        endDate: moment(),
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    // Initialize Revenue Trend Chart
    const trendCtx = document.getElementById('revenueTrendChart').getContext('2d');
    const revenueTrendChart = new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Monthly Revenue (₹)',
                data: [65000, 72000, 68000, 75000, 82000, 78000, 85000, 92000, 88000, 95000, 102000, 108000],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 3
            }, {
                label: 'Subscription Growth',
                data: [320, 350, 340, 370, 390, 380, 400, 420, 410, 430, 450, 470],
                borderColor: '#f72585',
                backgroundColor: 'rgba(247, 37, 133, 0.1)',
                tension: 0.4,
                fill: true,
                borderWidth: 2,
                borderDash: [5, 5]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                if (context.dataset.label.includes('Revenue')) {
                                    label += '₹' + context.parsed.y.toLocaleString('en-IN');
                                } else {
                                    label += context.parsed.y;
                                }
                            }
                            return label;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        callback: function(value) {
                            return '₹' + value.toLocaleString('en-IN');
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Initialize Revenue by Plan Type Chart
    const planCtx = document.getElementById('revenueByPlanChart').getContext('2d');
    const revenueByPlanChart = new Chart(planCtx, {
        type: 'doughnut',
        data: {
            labels: ['Basic', 'Standard', 'Premium', 'Enterprise'],
            datasets: [{
                data: [25, 35, 30, 10],
                backgroundColor: [
                    '#17a2b8',
                    '#6f42c1',
                    '#e83e8c',
                    '#20c997'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${percentage}% (₹${(value * 850).toLocaleString('en-IN')})`;
                        }
                    }
                }
            },
            cutout: '65%'
        }
    });

    // Sample Data for DataTable
    const transactionData = [{
            id: 'TXN001',
            user: 'Rahul Sharma',
            avatar: 'RS',
            plan: 'premium',
            amount: 2999,
            paymentMethod: 'credit_card',
            status: 'completed',
            date: '2024-01-15'
        },
        {
            id: 'TXN002',
            user: 'Priya Patel',
            avatar: 'PP',
            plan: 'standard',
            amount: 1499,
            paymentMethod: 'upi',
            status: 'completed',
            date: '2024-01-14'
        },
        {
            id: 'TXN003',
            user: 'Amit Kumar',
            avatar: 'AK',
            plan: 'basic',
            amount: 799,
            paymentMethod: 'debit_card',
            status: 'pending',
            date: '2024-01-15'
        },
        {
            id: 'TXN004',
            user: 'Neha Gupta',
            avatar: 'NG',
            plan: 'premium',
            amount: 2999,
            paymentMethod: 'net_banking',
            status: 'failed',
            date: '2024-01-13'
        },
        {
            id: 'TXN005',
            user: 'Suresh Reddy',
            avatar: 'SR',
            plan: 'enterprise',
            amount: 5999,
            paymentMethod: 'credit_card',
            status: 'completed',
            date: '2024-01-12'
        },
        {
            id: 'TXN006',
            user: 'Anjali Singh',
            avatar: 'AS',
            plan: 'standard',
            amount: 1499,
            paymentMethod: 'wallet',
            status: 'refunded',
            date: '2024-01-11'
        },
        {
            id: 'TXN007',
            user: 'Rajesh Kumar',
            avatar: 'RK',
            plan: 'premium',
            amount: 2999,
            paymentMethod: 'upi',
            status: 'completed',
            date: '2024-01-10'
        },
        {
            id: 'TXN008',
            user: 'Meera Nair',
            avatar: 'MN',
            plan: 'basic',
            amount: 799,
            paymentMethod: 'debit_card',
            status: 'completed',
            date: '2024-01-09'
        },
        {
            id: 'TXN009',
            user: 'Vikram Joshi',
            avatar: 'VJ',
            plan: 'standard',
            amount: 1499,
            paymentMethod: 'credit_card',
            status: 'completed',
            date: '2024-01-08'
        },
        {
            id: 'TXN010',
            user: 'Pooja Mehta',
            avatar: 'PM',
            plan: 'premium',
            amount: 2999,
            paymentMethod: 'net_banking',
            status: 'completed',
            date: '2024-01-07'
        }
    ];

    // Initialize DataTable
    const table = $('#transactionTable').DataTable({
        data: transactionData,
        columns: [{
                data: 'id',
                className: 'fw-bold'
            },
            {
                data: 'user',
                render: function(data, type, row) {
                    return `
                        <div class="d-flex align-items-center">
                            <div class="avatar-xs me-2">
                                <div class="avatar-title rounded-circle bg-soft-primary text-primary">
                                    ${row.avatar}
                                </div>
                            </div>
                            ${data}
                        </div>
                    `;
                }
            },
            {
                data: 'plan',
                render: function(data) {
                    const planClass = `badge-${data}`;
                    const planName = data.charAt(0).toUpperCase() + data.slice(1);
                    return `<span class="badge ${planClass}">${planName}</span>`;
                }
            },
            {
                data: 'amount',
                render: function(data, type, row) {
                    const amountClass = row.status === 'refunded' ? 'amount-negative' : 'amount-positive';
                    return `<span class="${amountClass}">₹${data.toLocaleString('en-IN')}</span>`;
                }
            },
            {
                data: 'paymentMethod',
                render: function(data) {
                    const methodNames = {
                        'credit_card': 'Credit Card',
                        'debit_card': 'Debit Card',
                        'upi': 'UPI',
                        'net_banking': 'Net Banking',
                        'wallet': 'Wallet'
                    };

                    const icons = {
                        'credit_card': 'fa-credit-card',
                        'debit_card': 'fa-credit-card',
                        'upi': 'fa-mobile-alt',
                        'net_banking': 'fa-university',
                        'wallet': 'fa-wallet'
                    };

                    return `
                        <div class="payment-method">
                            <i class="fas ${icons[data]} text-muted"></i>
                            <span>${methodNames[data]}</span>
                        </div>
                    `;
                }
            },
            {
                data: 'status',
                render: function(data) {
                    const statusClass = `badge-${data}`;
                    const statusName = data.charAt(0).toUpperCase() + data.slice(1);
                    return `<span class="badge ${statusClass}">${statusName}</span>`;
                }
            },
            {
                data: 'date',
                render: function(data) {
                    return moment(data).format('MMM D, YYYY');
                }
            }
        ],
        order: [
            [6, 'desc']
        ], // Sort by Date by default
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
            '<"row"<"col-sm-12"tr>>' +
            '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        pageLength: 10,
        language: {
            paginate: {
                previous: "<i class='fas fa-chevron-left'></i>",
                next: "<i class='fas fa-chevron-right'></i>"
            }
        }
    });

    // Add buttons to DataTable
    new $.fn.dataTable.Buttons(table, {
        buttons: [{
                extend: 'copy',
                className: 'btn-light',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'csv',
                className: 'btn-light',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'excel',
                className: 'btn-light',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                className: 'btn-light',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'print',
                className: 'btn-light',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ]
    });

    table.buttons().container().appendTo('#transactionTable_wrapper .col-md-6:eq(0)');

    // Filter Functions
    $('#applyFilters').on('click', function() {
        const planFilter = $('#planFilter').val();
        const paymentMethodFilter = $('#paymentMethodFilter').val();
        const statusFilter = $('#statusFilter').val();

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const row = table.row(dataIndex).data();
                let planMatch = true;
                let paymentMethodMatch = true;
                let statusMatch = true;

                // Plan Filter
                if (planFilter && row.plan !== planFilter) {
                    planMatch = false;
                }

                // Payment Method Filter
                if (paymentMethodFilter && row.paymentMethod !== paymentMethodFilter) {
                    paymentMethodMatch = false;
                }

                // Status Filter
                if (statusFilter && row.status !== statusFilter) {
                    statusMatch = false;
                }

                return planMatch && paymentMethodMatch && statusMatch;
            }
        );

        table.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function after drawing
    });

    $('#resetFilters').on('click', function() {
        $('#planFilter').val('');
        $('#paymentMethodFilter').val('');
        $('#statusFilter').val('');
        $('#dateRangePicker').val('');
        table.search('').draw();
    });

    // Export Button Handlers
    $('.export-btn').on('click', function(e) {
        e.preventDefault();
        const exportType = $(this).data('type');
        alert(`Exporting revenue data as ${exportType.toUpperCase()}`);
        // In real implementation, trigger the actual export
    });

    // Update charts based on date range
    $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
        // In real implementation, fetch new data based on date range
        console.log('Date range selected:', picker.startDate.format('YYYY-MM-DD'), 'to', picker.endDate.format('YYYY-MM-DD'));
        // You would typically make an AJAX call here to update the chart data
    });

    // Real-time data simulation (optional)
    function simulateRealTimeData() {
        setInterval(() => {
            // Simulate new transaction
            const newTransaction = {
                id: 'TXN' + Math.floor(1000 + Math.random() * 9000),
                user: 'New User',
                avatar: 'NU',
                plan: ['basic', 'standard', 'premium'][Math.floor(Math.random() * 3)],
                amount: [799, 1499, 2999][Math.floor(Math.random() * 3)],
                paymentMethod: ['credit_card', 'upi', 'debit_card'][Math.floor(Math.random() * 3)],
                status: 'completed',
                date: moment().format('YYYY-MM-DD')
            };

            // Add to table
            table.row.add(newTransaction).draw();

            // Show notification
            showNewTransactionNotification(newTransaction);
        }, 30000); // Every 30 seconds
    }

    function showNewTransactionNotification(transaction) {
        const notification = $(`
            <div class="toast show position-fixed" style="bottom: 20px; right: 20px; z-index: 1055;">
                <div class="toast-header">
                    <i class="fas fa-rupee-sign text-success me-2"></i>
                    <strong class="me-auto">New Transaction</strong>
                    <small>Just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    ${transaction.user} purchased ${transaction.plan} plan - ₹${transaction.amount}
                </div>
            </div>
        `);

        $('body').append(notification);

        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.remove();
        }, 5000);
    }

    // Uncomment to enable real-time simulation
    // simulateRealTimeData();
});