// Admin Profile Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin profile page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // DOM Elements
    const userManagementBtn = document.getElementById('user-management-btn');
    const contentManagementBtn = document.getElementById('content-management-btn');
    const analyticsBtn = document.getElementById('analytics-btn');
    const systemSettingsBtn = document.getElementById('system-settings-btn');
    const viewAllUsersBtn = document.getElementById('view-all-users-btn');
    const markAllReadBtn = document.getElementById('mark-all-read-btn');
    const systemToolsBtn = document.getElementById('system-tools-btn');
    const advancedSettingsBtn = document.getElementById('advanced-settings-btn');
    const timeFilter = document.querySelector('.time-filter select');
    const alertActions = document.querySelectorAll('.alert-action');

    // Event Listeners
    userManagementBtn.addEventListener('click', function() {
        showAlert('👥 Opening User Management Panel...', 'info');
        // In real app: redirect to user management
    });

    contentManagementBtn.addEventListener('click', function() {
        showAlert('📚 Opening Content Management...', 'info');
        // In real app: redirect to content management
    });

    analyticsBtn.addEventListener('click', function() {
        showAlert('📊 Loading Advanced Analytics...', 'success');
        // In real app: redirect to analytics dashboard
    });

    systemSettingsBtn.addEventListener('click', function() {
        showAlert('⚙️ Opening System Settings...', 'info');
        // In real app: redirect to system settings
    });

    viewAllUsersBtn.addEventListener('click', function() {
        showAlert('👨‍👩‍👧‍👦 Loading All Users...', 'info');
        // In real app: redirect to users page
    });

    markAllReadBtn.addEventListener('click', function() {
        const alerts = document.querySelectorAll('.alert-item');
        alerts.forEach(alert => {
            alert.style.opacity = '0.5';
            setTimeout(() => {
                alert.remove();
            }, 300);
        });
        showAlert('✅ All alerts marked as read', 'success');
    });

    systemToolsBtn.addEventListener('click', function() {
        showAlert('🔧 Opening System Tools...', 'warning');
        // In real app: redirect to system tools
    });

    advancedSettingsBtn.addEventListener('click', function() {
        showAlert('🎛️ Opening Advanced Settings...', 'info');
        // In real app: redirect to advanced settings
    });

    timeFilter.addEventListener('change', function() {
        const selectedPeriod = this.value;
        updateAnalyticsData(selectedPeriod);
        showAlert(`📈 Updated analytics for: ${selectedPeriod}`, 'info');
    });

    // Alert dismissal functionality
    alertActions.forEach(action => {
        action.addEventListener('click', function() {
            const alertItem = this.closest('.alert-item');
            alertItem.style.opacity = '0';
            setTimeout(() => {
                alertItem.remove();
            }, 300);
        });
    });

    // Functions
    function updateAnalyticsData(period) {
        console.log('Updating analytics data for:', period);

        // Simulate data update with animation
        const analyticsCards = document.querySelectorAll('.analytics-card');
        analyticsCards.forEach(card => {
            card.style.opacity = '0.5';
            setTimeout(() => {
                card.style.opacity = '1';
            }, 300);
        });

        // Update trend indicators based on period
        updateTrendIndicators(period);
    }

    function updateTrendIndicators(period) {
        const trends = document.querySelectorAll('.trend');

        trends.forEach(trend => {
            // Simulate different trends based on period
            const randomChange = Math.random() * 20 - 10; // -10% to +10%
            const isPositive = randomChange >= 0;
            const changeText = `${isPositive ? '+' : ''}${Math.abs(Math.round(randomChange))}%`;

            trend.textContent = changeText;
            trend.className = `trend ${isPositive ? 'positive' : 'negative'}`;
        });
    }
    // Add to your home.js or create a new admin.js
    document.addEventListener('DOMContentLoaded', function() {
        // View All Users button
        const viewAllUsersBtn = document.getElementById('view-all-users-btn');
        if (viewAllUsersBtn) {
            viewAllUsersBtn.addEventListener('click', function() {
                alert('Redirecting to full users list...');
                // window.location.href = 'users.php';
            });
        }

        // Mark All Read button
        const markAllReadBtn = document.getElementById('mark-all-read-btn');
        if (markAllReadBtn) {
            markAllReadBtn.addEventListener('click', function() {
                document.querySelectorAll('.alert-item').forEach(alert => {
                    alert.style.opacity = '0.6';
                });
                this.innerHTML = '<i class="fas fa-check me-1"></i>All Marked Read';
                this.disabled = true;
            });
        }

        // Alert dismiss functionality
        document.querySelectorAll('.alert-action').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.alert-item').style.display = 'none';
            });
        });
    });
    // Add floating elements to admin hero
    const floatingContainer = document.querySelector('.admin-hero .floating-elements');
    const colors = ['rgba(254, 197, 58, 0.3)', 'rgba(255, 255, 255, 0.2)', 'rgba(156, 81, 224, 0.2)'];

    for (let i = 0; i < 8; i++) {
        const element = document.createElement('div');
        element.classList.add('floating-element');

        const size = Math.random() * 40 + 20;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const delay = Math.random() * 8;

        element.style.width = `${size}px`;
        element.style.height = `${size}px`;
        element.style.left = `${left}%`;
        element.style.top = `${top}%`;
        element.style.background = color;
        element.style.animationDelay = `${delay}s`;

        floatingContainer.appendChild(element);
    }

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.action-btn, .analytics-card, .alert-item, .status-item');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Make table rows interactive
    const tableRows = document.querySelectorAll('.table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('click', function() {
            const userName = this.querySelector('.user-name').textContent;
            showAlert(`👤 Selected user: ${userName}`, 'info');
        });
    });

    // Real-time system status updates (simulated)
    function simulateSystemUpdates() {
        setInterval(() => {
            const statusIndicators = document.querySelectorAll('.status-indicator');
            const randomIndex = Math.floor(Math.random() * statusIndicators.length);
            const indicator = statusIndicators[randomIndex];

            // Temporarily flash the indicator
            indicator.style.animation = 'pulse 0.5s ease-in-out';
            setTimeout(() => {
                indicator.style.animation = '';
            }, 500);
        }, 10000); // Every 10 seconds
    }

    // Initialize system updates
    simulateSystemUpdates();

    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.admin-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} admin-alert alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        alertDiv.style.cssText = `
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            min-width: 300px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        `;

        document.body.appendChild(alertDiv);

        // Auto remove after 3 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 3000);
    }

    // Initialize analytics data
    updateAnalyticsData('Last 30 Days');

    console.log('Admin profile page initialized successfully!');
});

// Add pulse animation for status indicators
const style = document.createElement('style');
style.textContent = `
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }
`;
document.head.appendChild(style);