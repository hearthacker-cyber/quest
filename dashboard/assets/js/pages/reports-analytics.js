// Custom JavaScript for Reports Analytics Page

$(document).ready(function() {
    // Initialize DataTable with export buttons
    const table = $('#testResultsTable').DataTable({
        responsive: true,
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>><"row"<"col-sm-12"tr>><"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        language: {
            search: "Search tests:",
            lengthMenu: "Show _MENU_ tests",
            info: "Showing _START_ to _END_ of _TOTAL_ tests",
            infoEmpty: "Showing 0 to 0 of 0 tests",
            infoFiltered: "(filtered from _MAX_ total tests)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        order: [
            [0, 'asc']
        ], // Sort by Test ID ascending
        columnDefs: [{
                targets: [6], // Actions column
                orderable: false,
                searchable: false,
                width: "120px"
            },
            {
                targets: [0], // Test ID
                width: "100px"
            },
            {
                targets: [2, 3, 4, 5], // Numbers columns
                width: "120px"
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
        }
    });

    // Add export buttons to the page
    table.buttons().container().appendTo('.export-buttons');

    // Initialize Charts
    initializeCharts();

    // Filter functionality
    $('#applyFilters').on('click', function() {
        const testIdFilter = $('#testIdFilter').val();
        const subjectFilter = $('#subjectFilter').val();
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
        $('#testIdFilter').val('');
        $('#subjectFilter').val('');
        $('#dateFromFilter').val('2024-01-01');
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
            showAlert('Comprehensive report generated successfully!', 'success');
            btn.html(originalText);
            btn.prop('disabled', false);

            // Trigger PDF export
            $('.buttons-pdf').click();
        }, 2000);
    });

    // Action buttons
    $(document).on('click', '.view-details', function() {
        const testId = $(this).data('id');
        showAlert(`Viewing detailed analytics for ${testId}`, 'info');
    });

    $(document).on('click', '.download-report', function() {
        const testId = $(this).data('id');
        const btn = $(this);
        const originalText = btn.html();

        btn.html('<i class="fas fa-spinner fa-spin"></i>');
        btn.prop('disabled', true);

        setTimeout(() => {
            showAlert(`Report for ${testId} downloaded successfully!`, 'success');
            btn.html(originalText);
            btn.prop('disabled', false);
        }, 1000);
    });

    $(document).on('click', '.compare-results', function() {
        const testId = $(this).data('id');
        showAlert(`Opening comparison view for ${testId}`, 'info');
    });

    // Initialize Charts function
    function initializeCharts() {
        // Destroy existing charts if they exist
        if (window.scoreDistributionChart) {
            window.scoreDistributionChart.destroy();
        }
        if (window.questionAnalysisChart) {
            window.questionAnalysisChart.destroy();
        }

        // Score Distribution Chart (Bar Chart)
        const scoreCtx = document.getElementById('scoreDistributionChart').getContext('2d');
        window.scoreDistributionChart = new Chart(scoreCtx, {
            type: 'bar',
            data: {
                labels: ['0-20%', '21-40%', '41-60%', '61-80%', '81-100%'],
                datasets: [{
                    label: 'Number of Students',
                    data: [12, 28, 45, 67, 89],
                    backgroundColor: [
                        '#dc3545',
                        '#fd7e14',
                        '#ffc107',
                        '#20c997',
                        '#198754'
                    ],
                    borderColor: [
                        '#dc3545',
                        '#fd7e14',
                        '#ffc107',
                        '#20c997',
                        '#198754'
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
                        display: true,
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Student Score Distribution',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Students: ${context.parsed.y}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Students'
                        },
                        ticks: {
                            stepSize: 10
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Score Ranges'
                        }
                    }
                }
            }
        });

        // Question Analysis Chart (Pie Chart)
        const questionCtx = document.getElementById('questionAnalysisChart').getContext('2d');
        window.questionAnalysisChart = new Chart(questionCtx, {
            type: 'pie',
            data: {
                labels: ['Correct Answers', 'Wrong Answers', 'Skipped Questions'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#28a745',
                        '#dc3545',
                        '#6c757d'
                    ],
                    borderColor: [
                        '#28a745',
                        '#dc3545',
                        '#6c757d'
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
                        text: 'Question Analysis',
                        font: {
                            size: 16
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '0%'
            }
        });
    }

    // Update Charts based on filters
    function updateCharts() {
        const testIdFilter = $('#testIdFilter').val();
        const subjectFilter = $('#subjectFilter').val();

        // Simulate different data based on filters
        let scoreData, questionData;

        if (testIdFilter === 'MATH001') {
            scoreData = [5, 15, 25, 35, 20];
            questionData = [70, 20, 10];
        } else if (testIdFilter === 'PHY001') {
            scoreData = [8, 12, 30, 40, 30];
            questionData = [75, 18, 7];
        } else if (subjectFilter === 'mathematics') {
            scoreData = [10, 20, 35, 45, 40];
            questionData = [68, 22, 10];
        } else if (subjectFilter === 'physics') {
            scoreData = [12, 18, 32, 38, 35];
            questionData = [72, 20, 8];
        } else {
            // Default data
            scoreData = [12, 28, 45, 67, 89];
            questionData = [65, 25, 10];
        }

        // Update charts with new data
        window.scoreDistributionChart.data.datasets[0].data = scoreData;
        window.scoreDistributionChart.update();

        window.questionAnalysisChart.data.datasets[0].data = questionData;
        window.questionAnalysisChart.update();
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
            const testIdFilter = $('#testIdFilter').val();
            const subjectFilter = $('#subjectFilter').val();
            const dateFrom = $('#dateFromFilter').val();
            const dateTo = $('#dateToFilter').val();

            const testId = data[0];
            const subject = data[1].toLowerCase();

            // Test ID filter
            if (testIdFilter && !testId.includes(testIdFilter)) {
                return false;
            }

            // Subject filter
            if (subjectFilter && !subject.includes(subjectFilter.toLowerCase())) {
                return false;
            }

            return true;
        }
    );
});