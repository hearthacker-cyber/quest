// Quick Actions Dashboard JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animations and interactions

    // Animate quick stat numbers
    function animateQuickStats() {
        const statNumbers = document.querySelectorAll('.quick-stat-number');
        const targetValues = [1500, 25, 10000, 75];

        statNumbers.forEach((element, index) => {
            const currentText = element.textContent;
            let targetValue;

            if (currentText.includes('K')) {
                targetValue = targetValues[index] * 1000;
            } else {
                targetValue = targetValues[index];
            }

            animateValue(element, 0, targetValue, 1500);
        });
    }

    // Value animation function
    function animateValue(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            let value = Math.floor(progress * (end - start) + start);

            // Format number with commas
            if (end >= 1000) {
                element.textContent = value.toLocaleString();
            } else {
                element.textContent = value;
            }

            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Add click effects to action cards
    function initializeActionCards() {
        const actionCards = document.querySelectorAll('.quick-action-card');

        actionCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Add click animation
                const actionCard = this.querySelector('.action-card');
                actionCard.style.transform = 'scale(0.95)';

                setTimeout(() => {
                    actionCard.style.transform = '';
                }, 150);

                // Show loading state (simulate)
                const icon = actionCard.querySelector('.action-icon');
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin action-icon mb-3';

                setTimeout(() => {
                    icon.className = originalClass;
                }, 1000);
            });
        });
    }

    // Initialize table row interactions
    function initializeTableInteractions() {
        const tableRows = document.querySelectorAll('.table-hover tbody tr');

        tableRows.forEach(row => {
            row.addEventListener('click', function() {
                // Add visual feedback
                this.style.backgroundColor = 'rgba(67, 97, 238, 0.1)';
                setTimeout(() => {
                    this.style.backgroundColor = '';
                }, 300);
            });
        });
    }

    // Add real-time updates for demo
    function simulateRealTimeUpdates() {
        setInterval(() => {
            // Randomly update user count
            const userCountElement = document.querySelector('.quick-stat-number');
            if (userCountElement) {
                const currentCount = parseInt(userCountElement.textContent.replace(/,/g, ''));
                const randomIncrement = Math.floor(Math.random() * 3) + 1;
                userCountElement.textContent = (currentCount + randomIncrement).toLocaleString();
            }
        }, 10000); // Update every 10 seconds
    }

    // Initialize everything when page loads
    function initializePage() {
        animateQuickStats();
        initializeActionCards();
        initializeTableInteractions();
        simulateRealTimeUpdates();

        // Add loading animation to cards
        const cards = document.querySelectorAll('.action-card, .quick-stat-card');
        cards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
        });
    }

    // Start initialization
    initializePage();

    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + Number shortcuts for quick actions
        if (e.ctrlKey || e.metaKey) {
            const actionCards = document.querySelectorAll('.quick-action-card');

            switch (e.key) {
                case '1':
                    if (actionCards[0]) actionCards[0].click();
                    break;
                case '2':
                    if (actionCards[1]) actionCards[1].click();
                    break;
                case '3':
                    if (actionCards[2]) actionCards[2].click();
                    break;
                case '4':
                    if (actionCards[3]) actionCards[3].click();
                    break;
                case '5':
                    if (actionCards[4]) actionCards[4].click();
                    break;
                case '6':
                    if (actionCards[5]) actionCards[5].click();
                    break;
            }
        }
    });

    // Add search functionality for tables
    function addTableSearch() {
        const tables = document.querySelectorAll('.table');

        tables.forEach(table => {
            const searchInput = document.createElement('input');
            searchInput.type = 'text';
            searchInput.placeholder = 'Search...';
            searchInput.className = 'form-control mb-3';
            searchInput.style.maxWidth = '300px';

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    if (text.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            table.parentNode.insertBefore(searchInput, table);
        });
    }

    // Uncomment the line below to enable table search
    // addTableSearch();
});