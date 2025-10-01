// Dashboard Charts Initialization
document.addEventListener('DOMContentLoaded', function() {
    // User Growth Chart (Line Chart)
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Users',
                data: [650, 800, 950, 1100, 1250, 1500],
                borderColor: '#4361ee',
                backgroundColor: 'rgba(67, 97, 238, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#4361ee',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }, {
                label: 'Active Users',
                data: [500, 650, 750, 900, 1050, 1200],
                borderColor: '#4cc9f0',
                backgroundColor: 'rgba(76, 201, 240, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#4cc9f0',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    padding: 10,
                    cornerRadius: 4
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    },
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'nearest'
            }
        }
    });

    // Revenue Distribution Chart (Doughnut Chart)
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(revenueCtx, {
        type: 'doughnut',
        data: {
            labels: ['Test Subscriptions', 'Course Sales', 'Consulting', 'Other'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: [
                    '#4361ee',
                    '#4cc9f0',
                    '#f72585',
                    '#7209b7'
                ],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        boxWidth: 12,
                        font: {
                            size: 11
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.parsed}%`;
                        }
                    }
                }
            }
        }
    });

    // Update stats with animation
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value.toLocaleString();
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Animate stat numbers on page load
    const statValues = document.querySelectorAll('.mini-stats-desc h5');
    const targetValues = [1500, 1200, 25, 10000, 75000, 350];

    statValues.forEach((element, index) => {
        const currentValue = parseInt(element.textContent.replace(/,/g, ''));
        animateValue(element, 0, targetValues[index], 2000);
    });

    // Add real-time updates simulation
    setInterval(() => {
        // Simulate real-time updates for demo purposes
        const randomIncrement = Math.floor(Math.random() * 10) + 1;
        const currentUsers = parseInt(statValues[0].textContent.replace(/,/g, ''));
        statValues[0].textContent = (currentUsers + randomIncrement).toLocaleString();
    }, 10000);
});

// Export functionality for the settings dropdown
document.addEventListener('DOMContentLoaded', function() {
    const exportButton = document.querySelector('.dropdown-item[href="#"]');
    if (exportButton) {
        exportButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Simulate export functionality
            const toast = document.createElement('div');
            toast.className = 'alert alert-success alert-dismissible fade show position-fixed';
            toast.style.top = '20px';
            toast.style.right = '20px';
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <strong>Success!</strong> Report exported successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        });
    }
});