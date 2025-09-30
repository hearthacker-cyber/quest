// Parent Profile Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Parent profile page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // DOM Elements
    const addChildBtn = document.getElementById('add-child-btn');
    const viewReportsBtn = document.getElementById('view-reports-btn');
    const setGoalsBtn = document.getElementById('set-goals-btn');
    const scheduleTestBtn = document.getElementById('schedule-test-btn');
    const contactTeacherBtn = document.getElementById('contact-teacher-btn');
    const manageSubscriptionBtn = document.getElementById('manage-subscription-btn');
    const contactSupportBtn = document.getElementById('contact-support-btn');
    const scheduleCallBtn = document.getElementById('schedule-call-btn');
    const timeFilter = document.querySelector('.time-filter select');
    const childItems = document.querySelectorAll('.child-item');

    // Event Listeners
    addChildBtn.addEventListener('click', function() {
        showAlert('👶 Opening child registration form...', 'info');
        // In real app: open modal or redirect to registration
    });

    viewReportsBtn.addEventListener('click', function() {
        showAlert('📊 Loading progress reports...', 'success');
        // In real app: redirect to reports page
    });

    setGoalsBtn.addEventListener('click', function() {
        showAlert('🎯 Opening goal setting dashboard...', 'info');
        // In real app: redirect to goals page
    });

    scheduleTestBtn.addEventListener('click', function() {
        showAlert('📅 Opening assessment scheduler...', 'info');
        // In real app: redirect to scheduling page
    });

    contactTeacherBtn.addEventListener('click', function() {
        showAlert('👩‍🏫 Opening teacher communication panel...', 'info');
        // In real app: open contact modal
    });

    manageSubscriptionBtn.addEventListener('click', function() {
        showAlert('💳 Opening subscription management...', 'info');
        // In real app: redirect to subscription page
    });

    contactSupportBtn.addEventListener('click', function() {
        showAlert('🛟 Connecting you with our support team...', 'success');
        // In real app: open support chat/modal
    });

    scheduleCallBtn.addEventListener('click', function() {
        showAlert('📞 Opening call scheduling calendar...', 'info');
        // In real app: open scheduling modal
    });

    timeFilter.addEventListener('change', function() {
        const selectedPeriod = this.value;
        updateDashboardData(selectedPeriod);
        showAlert(`📊 Updated view for: ${selectedPeriod}`, 'info');
    });

    // Child selection functionality
    childItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all children
            childItems.forEach(child => child.classList.remove('active'));

            // Add active class to clicked child
            this.classList.add('active');

            const childName = this.querySelector('.child-name').textContent;
            updateChildView(childName);
        });
    });

    // Functions
    function updateDashboardData(period) {
        console.log('Updating dashboard data for:', period);

        // Simulate data update with animation
        const progressCharts = document.querySelectorAll('.child-progress-chart');
        progressCharts.forEach(chart => {
            chart.style.opacity = '0.5';
            setTimeout(() => {
                chart.style.opacity = '1';
            }, 300);
        });

        // Update progress bars based on period
        updateProgressBars(period);
    }

    function updateProgressBars(period) {
        const progressBars = document.querySelectorAll('.progress-bar');

        progressBars.forEach(bar => {
            const currentWidth = parseInt(bar.style.width);
            const newWidth = getAdjustedWidth(currentWidth, period);

            bar.style.width = '0';
            setTimeout(() => {
                bar.style.width = `${newWidth}%`;
                bar.style.transition = 'width 0.5s ease';
            }, 200);
        });
    }

    function getAdjustedWidth(currentWidth, period) {
        // Adjust width based on selected time period (demo logic)
        let adjustment = 0;

        switch (period) {
            case 'Last Week':
                adjustment = 5;
                break;
            case 'Last Month':
                adjustment = -2;
                break;
            case 'Last 3 Months':
                adjustment = 0;
                break;
            case 'All Time':
                adjustment = 8;
                break;
        }

        return Math.max(0, Math.min(100, currentWidth + adjustment));
    }

    function updateChildView(childName) {
        console.log('Switching to child view:', childName);

        // Update main content to reflect selected child
        const sectionHeaders = document.querySelectorAll('.section-header h3');
        sectionHeaders.forEach(header => {
            if (header.textContent.includes("Children's Progress")) {
                header.innerHTML = `<i class="fas fa-chart-line me-2"></i>${childName}'s Progress Overview`;
            }
        });

        showAlert(`👦 Now viewing ${childName}'s progress`, 'success');
    }

    // Add floating elements to parent hero
    const floatingContainer = document.querySelector('.parent-hero .floating-elements');
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
    const interactiveElements = document.querySelectorAll('.child-item, .action-btn, .recommendation-card, .assessment-card');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Animate progress bars on scroll
    const progressBars = document.querySelectorAll('.progress-bar');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                    bar.style.transition = 'width 1s ease-in-out';
                }, 200);
            }
        });
    }, { threshold: 0.5 });

    progressBars.forEach(bar => observer.observe(bar));

    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.parent-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} parent-alert alert-dismissible fade show`;
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

    // Initialize dashboard data
    updateDashboardData('Last 3 Months');

    console.log('Parent profile page initialized successfully!');
});