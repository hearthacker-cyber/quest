// Student Profile Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Student profile page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // DOM Elements
    const practiceNowBtn = document.getElementById('practice-now-btn');
    const takeTestBtn = document.getElementById('take-test-btn');
    const timeFilter = document.querySelector('.time-filter select');

    // Event Listeners
    practiceNowBtn.addEventListener('click', function() {
        showAlert('🎯 Redirecting to practice mode...', 'success');
        // In real app: window.location.href = 'practice.php';
    });

    takeTestBtn.addEventListener('click', function() {
        showAlert('📝 Redirecting to test selection...', 'info');
        // In real app: window.location.href = 'test.php';
    });

    timeFilter.addEventListener('change', function() {
        const selectedPeriod = this.value;
        updatePerformanceData(selectedPeriod);
        showAlert(`📊 Updated view for: ${selectedPeriod}`, 'info');
    });

    // Functions
    function updatePerformanceData(period) {
        console.log('Updating performance data for:', period);

        // Simulate data update with animation
        const performanceCards = document.querySelectorAll('.performance-card');
        performanceCards.forEach(card => {
            card.style.opacity = '0.5';
            setTimeout(() => {
                card.style.opacity = '1';
            }, 300);
        });

        // Update chart data based on period
        updateChartData(period);
    }

    function updateChartData(period) {
        const bars = document.querySelectorAll('.bar-fill');
        const heights = getRandomHeights(bars.length, period);

        bars.forEach((bar, index) => {
            const newHeight = heights[index];
            bar.style.height = `${newHeight}%`;
            bar.style.transition = 'height 0.5s ease';
        });
    }

    function getRandomHeights(count, period) {
        // Generate random heights based on period
        let baseHeight = 50;
        let variation = 30;

        switch (period) {
            case 'Last 7 Days':
                baseHeight = 60;
                variation = 35;
                break;
            case 'Last 30 Days':
                baseHeight = 55;
                variation = 40;
                break;
            case 'Last 3 Months':
                baseHeight = 50;
                variation = 45;
                break;
            case 'All Time':
                baseHeight = 65;
                variation = 30;
                break;
        }

        return Array.from({ length: count }, () =>
            Math.floor(baseHeight + Math.random() * variation)
        );
    }

    // Add floating elements to profile hero
    const floatingContainer = document.querySelector('.profile-hero .floating-elements');
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

    // Add hover effects to interactive elements
    const interactiveElements = document.querySelectorAll('.achievement-item, .performance-card, .activity-item, .goal-card');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        element.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.profile-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} profile-alert alert-dismissible fade show`;
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

    // Initialize chart data
    updateChartData('Last 3 Months');

    console.log('Student profile page initialized successfully!');
});