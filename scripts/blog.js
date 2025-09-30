// Blog Page Specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS for blog page
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Search functionality
    const searchInput = document.querySelector('.blog-search input');
    const searchButton = document.querySelector('.blog-search button');

    if (searchInput && searchButton) {
        searchButton.addEventListener('click', function() {
            performSearch(searchInput.value);
        });

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch(searchInput.value);
            }
        });
    }

    // Newsletter subscription
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            subscribeToNewsletter(email);
        });
    }

    // Add hover effects to blog cards
    const blogCards = document.querySelectorAll('.blog-post-card, .featured-post-card');
    blogCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // Category filtering (basic implementation)
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.querySelector('h4').textContent;
            filterPostsByCategory(category);
        });
    });

    // Load more articles functionality
    const loadMoreButton = document.querySelector('.btn-load-more');
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function() {
            loadMoreArticles();
        });
    }
});

// Search function
function performSearch(query) {
    if (query.trim() === '') {
        showNotification('Please enter a search term', 'warning');
        return;
    }

    showNotification(`Searching for: ${query}`, 'info');
    // In a real application, you would make an AJAX request here
    console.log('Search query:', query);
}

// Newsletter subscription
function subscribeToNewsletter(email) {
    if (!validateEmail(email)) {
        showNotification('Please enter a valid email address', 'error');
        return;
    }

    // Simulate API call
    showNotification('Subscribing to newsletter...', 'info');

    setTimeout(() => {
        showNotification('Successfully subscribed to our newsletter!', 'success');
        document.querySelector('.newsletter-form input[type="email"]').value = '';
    }, 1500);
}

// Category filtering
function filterPostsByCategory(category) {
    showNotification(`Filtering by: ${category}`, 'info');
    // In a real application, you would filter the posts here
    console.log('Filter category:', category);
}

// Load more articles
function loadMoreArticles() {
    showNotification('Loading more articles...', 'info');
    // In a real application, you would load more posts via AJAX
    setTimeout(() => {
        showNotification('More articles loaded!', 'success');
    }, 1000);
}

// Utility functions
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function showNotification(message, type) {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `alert alert-${type === 'error' ? 'danger' : type === 'warning' ? 'warning' : type === 'success' ? 'success' : 'info'} position-fixed`;
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    `;
    notification.textContent = message;

    document.body.appendChild(notification);

    // Remove notification after 3 seconds
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Add floating elements dynamically for blog page
function addFloatingElements() {
    const floatingContainer = document.querySelector('.floating-elements');
    if (!floatingContainer) return;

    const colors = ['rgba(254, 197, 58, 0.3)', 'rgba(255, 255, 255, 0.2)', 'rgba(156, 81, 224, 0.2)'];

    for (let i = 0; i < 10; i++) {
        const element = document.createElement('div');
        element.classList.add('floating-element');

        const size = Math.random() * 50 + 20;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const delay = Math.random() * 10;

        element.style.width = `${size}px`;
        element.style.height = `${size}px`;
        element.style.left = `${left}%`;
        element.style.top = `${top}%`;
        element.style.background = color;
        element.style.animationDelay = `${delay}s`;

        floatingContainer.appendChild(element);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    addFloatingElements();
});