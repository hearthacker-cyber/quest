// Initialize AOS for animations
AOS.init({
    duration: 800,
    once: true,
    offset: 100
});

// Admin Dashboard Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Stats counter animation
    animateStats();

    // Quick actions functionality
    setupQuickActions();

    // User management
    setupUserManagement();

    // Alert system
    setupAlerts();

    // Chart period switching
    setupChartPeriods();
});

// Animate stat numbers
function animateStats() {
    const statNumbers = document.querySelectorAll('.stat-number');

    statNumbers.forEach(stat => {
        const target = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            stat.textContent = formatNumber(Math.floor(current));
        }, 16);
    });
}

function formatNumber(num) {
    if (num >= 1000) {
        return (num / 1000).toFixed(1) + 'k';
    }
    return num.toString();
}

// Quick Actions
function setupQuickActions() {
    const actionBtns = document.querySelectorAll('.action-btn');

    actionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const action = this.querySelector('.action-text').textContent;

            // Add click animation
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);

            // Show action feedback
            showNotification(`Opening ${action} panel...`, 'info');
        });
    });
}

// User Management
function setupUserManagement() {
    // View all users button
    const viewAllUsersBtn = document.getElementById('view-all-users-btn');
    if (viewAllUsersBtn) {
        viewAllUsersBtn.addEventListener('click', function() {
            showNotification('Loading all users...', 'info');
            // Simulate loading
            setTimeout(() => {
                showNotification('Users loaded successfully!', 'success');
            }, 1000);
        });
    }

    // User action buttons
    const actionButtons = document.querySelectorAll('.action-buttons .btn');
    actionButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const action = this.querySelector('i').className;
            const userRow = this.closest('tr');
            const userName = userRow.querySelector('.user-name').textContent;

            if (action.includes('fa-edit')) {
                showNotification(`Editing user: ${userName}`, 'info');
            } else if (action.includes('fa-ban')) {
                showNotification(`Suspending user: ${userName}`, 'warning');
            } else if (action.includes('fa-check')) {
                showNotification(`Approving user: ${userName}`, 'success');
            }
        });
    });
}

// Alert System
function setupAlerts() {
    // Mark all as read
    const markAllReadBtn = document.getElementById('mark-all-read-btn');
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            const alerts = document.querySelectorAll('.alert-item');
            alerts.forEach(alert => {
                alert.style.opacity = '0.6';
                alert.style.background = 'rgba(248,249,250,0.5)';
            });
            this.innerHTML = '<i class="fas fa-check me-1"></i>All Read';
            this.disabled = true;
            showNotification('All alerts marked as read', 'success');
        });
    }

    // Dismiss individual alerts
    const alertActions = document.querySelectorAll('.alert-action');
    alertActions.forEach(btn => {
        btn.addEventListener('click', function() {
            const alertItem = this.closest('.alert-item');
            alertItem.style.transform = 'translateX(100%)';
            alertItem.style.opacity = '0';
            setTimeout(() => {
                alertItem.remove();
                showNotification('Alert dismissed', 'info');
            }, 300);
        });
    });
}

// Chart Periods
function setupChartPeriods() {
    const periodBtns = document.querySelectorAll('.btn-group .btn');

    periodBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            periodBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const period = this.textContent;
            showNotification(`Loading ${period.toLowerCase()} data...`, 'info');

            // Simulate chart update
            setTimeout(() => {
                showNotification(`${period} data loaded successfully!`, 'success');
            }, 800);
        });
    });
}

// Notification System
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)} me-2"></i>
            ${message}
        </div>
        <button class="notification-close">
            <i class="fas fa-times"></i>
        </button>
    `;

    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        border-left: 4px solid ${getNotificationColor(type)};
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 300px;
        transform: translateX(400px);
        transition: transform 0.3s ease;
    `;

    // Close button
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: #666;
        cursor: pointer;
        padding: 5px;
        border-radius: 5px;
    `;

    closeBtn.addEventListener('click', () => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => notification.remove(), 300);
    });

    // Add to body
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        'success': 'check-circle',
        'error': 'exclamation-circle',
        'warning': 'exclamation-triangle',
        'info': 'info-circle'
    };
    return icons[type] || 'info-circle';
}

function getNotificationColor(type) {
    const colors = {
        'success': '#28a745',
        'error': '#dc3545',
        'warning': '#ffc107',
        'info': '#17a2b8'
    };
    return colors[type] || '#17a2b8';
}

// Activity items animation
const activityItems = document.querySelectorAll('.activity-item');
activityItems.forEach((item, index) => {
    item.style.animationDelay = `${index * 100}ms`;
});

// Add some interactive effects
document.addEventListener('click', function(e) {
    // Ripple effect for buttons
    if (e.target.closest('.btn') || e.target.closest('.action-btn')) {
        const btn = e.target.closest('.btn') || e.target.closest('.action-btn');
        const ripple = document.createElement('span');
        const rect = btn.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;

        ripple.style.cssText = `
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.5);
            transform: scale(0);
            animation: ripple 0.6s linear;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
        `;

        btn.style.position = 'relative';
        btn.style.overflow = 'hidden';
        btn.appendChild(ripple);

        setTimeout(() => ripple.remove(), 600);
    }
});

// Add ripple animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);