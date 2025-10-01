// User Performance Reports JavaScript

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

    // Initialize User Progress Chart
    const progressCtx = document.getElementById('userProgressChart').getContext('2d');
    const userProgressChart = new Chart(progressCtx, {
        type: 'line',
        data: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7', 'Week 8'],
            datasets: [{
                label: 'Average Score (%)',
                data: [65, 68, 72, 75, 74, 78, 80, 82],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Tests Completed',
                data: [120, 145, 160, 180, 175, 190, 210, 230],
                borderColor: '#f72585',
                backgroundColor: 'rgba(247, 37, 133, 0.1)',
                tension: 0.4,
                fill: true
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
                    intersect: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
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

    // Sample Data for DataTable
    const userData = [{
            id: 'USR001',
            name: 'Rahul Sharma',
            avatar: 'RS',
            grade: '10',
            testsAttempted: 15,
            avgScore: 85.5,
            timeSpent: '12h 30m',
            lastActive: '2024-01-15',
            status: 'active'
        },
        {
            id: 'USR002',
            name: 'Priya Patel',
            avatar: 'PP',
            grade: '9',
            testsAttempted: 12,
            avgScore: 78.2,
            timeSpent: '10h 45m',
            lastActive: '2024-01-14',
            status: 'active'
        },
        {
            id: 'USR003',
            name: 'Amit Kumar',
            avatar: 'AK',
            grade: '11',
            testsAttempted: 18,
            avgScore: 92.1,
            timeSpent: '15h 20m',
            lastActive: '2024-01-15',
            status: 'active'
        },
        {
            id: 'USR004',
            name: 'Neha Gupta',
            avatar: 'NG',
            grade: '10',
            testsAttempted: 8,
            avgScore: 65.8,
            timeSpent: '8h 15m',
            lastActive: '2024-01-10',
            status: 'inactive'
        },
        {
            id: 'USR005',
            name: 'Suresh Reddy',
            avatar: 'SR',
            grade: '12',
            testsAttempted: 22,
            avgScore: 88.9,
            timeSpent: '18h 45m',
            lastActive: '2024-01-15',
            status: 'active'
        },
        {
            id: 'USR006',
            name: 'Anjali Singh',
            avatar: 'AS',
            grade: '8',
            testsAttempted: 6,
            avgScore: 72.4,
            timeSpent: '6h 30m',
            lastActive: '2024-01-13',
            status: 'active'
        },
        {
            id: 'USR007',
            name: 'Rajesh Kumar',
            avatar: 'RK',
            grade: '11',
            testsAttempted: 14,
            avgScore: 81.7,
            timeSpent: '11h 20m',
            lastActive: '2024-01-12',
            status: 'active'
        },
        {
            id: 'USR008',
            name: 'Meera Nair',
            avatar: 'MN',
            grade: '9',
            testsAttempted: 10,
            avgScore: 69.3,
            timeSpent: '9h 10m',
            lastActive: '2024-01-08',
            status: 'inactive'
        },
        {
            id: 'USR009',
            name: 'Vikram Joshi',
            avatar: 'VJ',
            grade: '10',
            testsAttempted: 16,
            avgScore: 87.2,
            timeSpent: '13h 45m',
            lastActive: '2024-01-15',
            status: 'active'
        },
        {
            id: 'USR010',
            name: 'Pooja Mehta',
            avatar: 'PM',
            grade: '12',
            testsAttempted: 20,
            avgScore: 94.5,
            timeSpent: '16h 30m',
            lastActive: '2024-01-14',
            status: 'active'
        }
    ];

    // Initialize DataTable
    const table = $('#userPerformanceTable').DataTable({
        data: userData,
        columns: [{
                data: 'id',
                className: 'fw-bold'
            },
            {
                data: 'name',
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
                data: 'grade',
                render: function(data) {
                    return `Grade ${data}`;
                }
            },
            {
                data: 'testsAttempted',
                className: 'text-center'
            },
            {
                data: 'avgScore',
                render: function(data) {
                    let scoreClass = 'score-average';
                    if (data >= 90) scoreClass = 'score-excellent';
                    else if (data >= 75) scoreClass = 'score-good';
                    else if (data < 60) scoreClass = 'score-poor';

                    return `<span class="${scoreClass}">${data}%</span>`;
                }
            },
            {
                data: 'timeSpent',
                className: 'text-center'
            },
            {
                data: 'lastActive',
                render: function(data) {
                    return moment(data).format('MMM D, YYYY');
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary btn-action view-report" data-id="${row.id}" title="View Detailed Report">
                                <i class="fas fa-chart-bar"></i>
                            </button>
                            <button class="btn btn-outline-info btn-action user-details" data-id="${row.id}" title="User Details">
                                <i class="fas fa-user"></i>
                            </button>
                            <button class="btn btn-outline-success btn-action export-user" data-id="${row.id}" title="Export User Data">
                                <i class="fas fa-download"></i>
                            </button>
                        </div>
                    `;
                },
                orderable: false
            }
        ],
        order: [
            [3, 'desc']
        ], // Sort by Tests Attempted by default
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
            '<"row"<"col-sm-12"tr>>' +
            '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        pageLength: 10,
        language: {
            paginate: {
                previous: "<i class='fas fa-chevron-left'></i>",
                next: "<i class='fas fa-chevron-right'></i>"
            }
        },
        buttons: [{
                extend: 'copy',
                className: 'btn-light'
            },
            {
                extend: 'csv',
                className: 'btn-light'
            },
            {
                extend: 'excel',
                className: 'btn-light'
            },
            {
                extend: 'pdf',
                className: 'btn-light'
            },
            {
                extend: 'print',
                className: 'btn-light'
            }
        ]
    });

    // Add buttons to DataTable
    new $.fn.dataTable.Buttons(table, {
        buttons: [{
                extend: 'copy',
                className: 'btn-light'
            },
            {
                extend: 'csv',
                className: 'btn-light'
            },
            {
                extend: 'excel',
                className: 'btn-light'
            },
            {
                extend: 'pdf',
                className: 'btn-light'
            },
            {
                extend: 'print',
                className: 'btn-light'
            }
        ]
    });

    table.buttons().container().appendTo('#userPerformanceTable_wrapper .col-md-6:eq(0)');

    // Filter Functions
    $('#applyFilters').on('click', function() {
        const gradeFilter = $('#gradeFilter').val();
        const performanceFilter = $('#performanceFilter').val();
        const activityFilter = $('#activityFilter').val();

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const row = table.row(dataIndex).data();
                let gradeMatch = true;
                let performanceMatch = true;
                let activityMatch = true;

                // Grade Filter
                if (gradeFilter && row.grade !== gradeFilter) {
                    gradeMatch = false;
                }

                // Performance Filter
                if (performanceFilter) {
                    const score = row.avgScore;
                    switch (performanceFilter) {
                        case 'excellent':
                            if (score < 90) performanceMatch = false;
                            break;
                        case 'good':
                            if (score < 75 || score >= 90) performanceMatch = false;
                            break;
                        case 'average':
                            if (score < 60 || score >= 75) performanceMatch = false;
                            break;
                        case 'needs_improvement':
                            if (score >= 60) performanceMatch = false;
                            break;
                    }
                }

                // Activity Filter
                if (activityFilter) {
                    const lastActive = moment(row.lastActive);
                    const daysDiff = moment().diff(lastActive, 'days');

                    if (activityFilter === 'active' && daysDiff > 7) {
                        activityMatch = false;
                    } else if (activityFilter === 'inactive' && daysDiff <= 7) {
                        activityMatch = false;
                    }
                }

                return gradeMatch && performanceMatch && activityMatch;
            }
        );

        table.draw();
        $.fn.dataTable.ext.search.pop(); // Remove the filter function after drawing
    });

    $('#resetFilters').on('click', function() {
        $('#gradeFilter').val('');
        $('#performanceFilter').val('');
        $('#activityFilter').val('');
        $('#dateRangePicker').val('');
        table.search('').draw();
    });

    // Action Button Handlers
    $('#userPerformanceTable tbody').on('click', '.view-report', function() {
        const userId = $(this).data('id');
        alert(`View detailed report for user: ${userId}`);
        // In real implementation, redirect to user report page or show modal
    });

    $('#userPerformanceTable tbody').on('click', '.user-details', function() {
        const userId = $(this).data('id');
        alert(`Show details for user: ${userId}`);
        // In real implementation, show user details modal
    });

    $('#userPerformanceTable tbody').on('click', '.export-user', function() {
        const userId = $(this).data('id');
        alert(`Export data for user: ${userId}`);
        // In real implementation, trigger export functionality
    });

    // Export Button Handlers
    $('.export-btn').on('click', function(e) {
        e.preventDefault();
        const exportType = $(this).data('type');
        alert(`Exporting data as ${exportType.toUpperCase()}`);
        // In real implementation, trigger the actual export
    });

    // Update chart based on date range
    $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
        // In real implementation, fetch new data based on date range
        console.log('Date range selected:', picker.startDate.format('YYYY-MM-DD'), 'to', picker.endDate.format('YYYY-MM-DD'));
        // You would typically make an AJAX call here to update the chart data
    });
});