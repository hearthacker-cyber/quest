// Custom JavaScript for Engagement Reports Page

$(document).ready(function() {
    // Initialize DataTable with export buttons
    const table = $('#engagementTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search users:",
            lengthMenu: "Show _MENU_ users",
            info: "Showing _START_ to _END_ of _TOTAL_ users",
            infoEmpty: "Showing 0 to 0 of 0 users",
            infoFiltered: "(filtered from _MAX_ total users)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [7, 'desc']
        ], // Sort by Last Active descending
        columnDefs: [{
                targets: [8], // Actions column
                orderable: false,
                searchable: false,
                width: "140px"
            },
            {
                targets: [0], // User ID
                width: "90px"
            },
            {
                targets: [2, 3], // Grade, User Type
                width: "100px"
            },
            {
                targets: [4, 5, 6], // Numbers columns
                width: "120px"
            }
        ],
        buttons: [{
                extend: 'csv',
                className: 'btn btn-sm btn-outline-primary',
                text: '<i class="fas fa-file-csv me-1"></i> CSV',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-sm btn-outline-success',
                text: '<i class="fas fa-file-excel me-1"></i> Excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-sm btn-outline-danger',
                text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'print',
                className: 'btn btn-sm btn-outline-secondary',
                text: '<i class="fas fa-print me-1"></i> Print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            }
        ],
        createdRow: function(row, data, dataIndex) {
            // Add animation class
            $(row).addClass('fade-in-up');
        }
    });

    // Add export buttons to the page
    table.buttons().container().appendTo('.export-buttons');

    // Initialize Charts
    initializeCharts();

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const gradeFilter = $('#gradeFilter').val();
        const userTypeFilter = $('#userTypeFilter').val();
        const dateFrom = $('#dateFromFilter').val();
        const dateTo = $('#dateToFilter').val();

        // Apply filters to DataTable
        table.draw();

        // Update charts based on filters
        updateCharts();

        showAlert('Filters applied successfully!', 'success');
    });

    // Reset filters
    $('#resetFilters').on('click', function() {
        $('#gradeFilter').val('');
        $('#userTypeFilter').val('');
        $('#dateFromFilter').val('2024-02-01');
        $('#dateToFilter').val('2024-03-31');
        table.search('').columns().search('').draw();

        // Reset charts to original data
        initializeCharts();

        showAlert('Filters reset successfully!', 'info');
    });

    // Refresh data
    $('#refreshData').on('click', function() {
        const btn = $(this);
        const originalHtml = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Refreshing...');
        btn.prop('disabled', true);

        // Simulate API refresh
        setTimeout(function() {
            table.ajax.reload(function() {
                btn.html(originalHtml);
                btn.prop('disabled', false);
                showAlert('Data refreshed successfully!', 'success');
            });

            // Refresh charts
            initializeCharts();
        }, 1000);
    });

    // Generate Report
    $('#generateReport').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Generating...');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert('Engagement report generated successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);

            // Trigger PDF export
            $('.buttons-pdf').click();
        }, 2000);
    });

    // Action buttons
    $(document).on('click', '.view-profile', function() {
        const userId = $(this).data('id');
        showAlert(`Opening profile for user ${userId}`, 'info');
    });

    $(document).on('click', '.engagement-details', function() {
        const userId = $(this).data('id');
        showAlert(`Showing detailed engagement analytics for ${userId}`, 'info');
    });

    $(document).on('click', '.send-reminder', function() {
        const userId = $(this).data('id');
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin"></i>');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert(`Engagement reminder sent to user ${userId}`, 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
        }, 1000);
    });

    // Initialize Charts function
    function initializeCharts() {
        // Destroy existing charts if they exist
        if (window.dauChart) {
            window.dauChart.destroy();
        }
        if (window.deviceUsageChart) {
            window.deviceUsageChart.destroy();
        }
        if (window.participationChart) {
            window.participationChart.destroy();
        }

        // Generate dates for last 30 days
        const dates = [];
        for (let i = 29; i >= 0; i--) {
            const date = new Date();
            date.setDate(date.getDate() - i);
            dates.push(date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' }));
        }

        // Daily Active Users Chart (Line Chart)
        const dauCtx = document.getElementById('dauChart').getContext('2d');
        window.dauChart = new Chart(dauCtx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Daily Active Users',
                    data: generateRandomData(800, 1500, 30),
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#007bff',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Daily Active Users Trend',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Users'
                        },
                        ticks: {
                            stepSize: 200
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'nearest'
                }
            }
        });

        // Device Usage Chart (Pie Chart)
        const deviceCtx = document.getElementById('deviceUsageChart').getContext('2d');
        window.deviceUsageChart = new Chart(deviceCtx, {
            type: 'doughnut',
            data: {
                labels: ['Mobile', 'Desktop', 'Tablet'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#28a745',
                        '#007bff',
                        '#ffc107'
                    ],
                    borderColor: [
                        '#28a745',
                        '#007bff',
                        '#ffc107'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    },
                    title: {
                        display: true,
                        text: 'Platform Distribution',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                return `${label}: ${value}%`;
                            }
                        }
                    }
                },
                cutout: '60%'
            }
        });

        // Participation by Grade Chart (Bar Chart)
        const participationCtx = document.getElementById('participationChart').getContext('2d');
        window.participationChart = new Chart(participationCtx, {
            type: 'bar',
            data: {
                labels: ['Grade 10', 'Grade 11', 'Grade 12', 'College'],
                datasets: [{
                    label: 'Active Users',
                    data: [1247, 985, 842, 356],
                    backgroundColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#dc3545'
                    ],
                    borderColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#dc3545'
                    ],
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'User Participation by Grade Level',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Active Users: ${context.parsed.y}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Active Users'
                        },
                        ticks: {
                            stepSize: 200
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Grade Level'
                        }
                    }
                }
            }
        });
    }

    // Update Charts based on filters
    function updateCharts() {
        const gradeFilter = $('#gradeFilter').val();
        const userTypeFilter = $('#userTypeFilter').val();

        // Simulate different data based on filters
        let participationData, deviceData;

        if (gradeFilter === '10') {
            participationData = [1247, 650, 420, 180];
            deviceData = [70, 20, 10];
        } else if (gradeFilter === '11') {
            participationData = [800, 985, 600, 250];
            deviceData = [60, 30, 10];
        } else if (userTypeFilter === 'teacher') {
            participationData = [150, 120, 80, 45];
            deviceData = [40, 50, 10];
        } else {
            // Default data
            participationData = [1247, 985, 842, 356];
            deviceData = [65, 25, 10];
        }

        // Update charts with new data
        window.participationChart.data.datasets[0].data = participationData;
        window.participationChart.update();

        window.deviceUsageChart.data.datasets[0].data = deviceData;
        window.deviceUsageChart.update();
    }

    // Helper function to generate random data
    function generateRandomData(min, max, count) {
        const data = [];
        for (let i = 0; i < count; i++) {
            data.push(Math.floor(Math.random() * (max - min + 1)) + min);
        }
        return data;
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

        // Reinitialize charts on resize to maintain responsiveness
        setTimeout(initializeCharts, 100);
    });

    // Custom filtering for DataTable
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            const gradeFilter = $('#gradeFilter').val();
            const userTypeFilter = $('#userTypeFilter').val();
            const dateFrom = $('#dateFromFilter').val();
            const dateTo = $('#dateToFilter').val();

            const grade = data[2];
            const userType = data[3].toLowerCase();
            const lastActive = data[7];

            // Grade filter
            if (gradeFilter && grade !== gradeFilter) {
                return false;
            }

            // User type filter
            if (userTypeFilter && !userType.includes(userTypeFilter.toLowerCase())) {
                return false;
            }

            // Date range filter (simplified)
            if (dateFrom && dateTo) {
                const rowDate = new Date(lastActive);
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