// FAQ Page Specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS for FAQ page
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Initialize FAQ functionality
    initFAQSearch();
    initCategoryFilter();
    initAccordionInteractions();
    addFloatingElements();

    // Add smooth scrolling for category navigation
    initSmoothScrolling();
});

// FAQ Search Functionality
function initFAQSearch() {
    const searchInput = document.getElementById('faqSearch');
    const searchButton = document.getElementById('searchButton');

    if (searchInput && searchButton) {
        // Search on button click
        searchButton.addEventListener('click', function() {
            performFAQSearch(searchInput.value);
        });

        // Search on enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performFAQSearch(searchInput.value);
            }
        });

        // Real-time search
        searchInput.addEventListener('input', function(e) {
            if (e.target.value.length >= 3) {
                performFAQSearch(e.target.value);
            } else if (e.target.value.length === 0) {
                clearSearchResults();
            }
        });
    }
}

// Perform FAQ Search
function performFAQSearch(query) {
    if (!query.trim()) {
        clearSearchResults();
        return;
    }

    const searchTerm = query.toLowerCase().trim();
    const allQuestions = document.querySelectorAll('.accordion-button');
    const results = [];

    // Search through all questions
    allQuestions.forEach(question => {
        const questionText = question.textContent.toLowerCase();
        const accordionItem = question.closest('.accordion-item');
        const accordionBody = accordionItem.querySelector('.accordion-body');
        const bodyText = accordionBody.textContent.toLowerCase();

        if (questionText.includes(searchTerm) || bodyText.includes(searchTerm)) {
            results.push({
                element: accordionItem,
                question: questionText,
                relevance: questionText.includes(searchTerm) ? 2 : 1
            });
        }
    });

    displaySearchResults(results, searchTerm);
}

// Display Search Results
function displaySearchResults(results, searchTerm) {
    // Remove existing search results
    const existingResults = document.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }

    // Create results container
    const resultsContainer = document.createElement('div');
    resultsContainer.className = 'search-results';
    resultsContainer.setAttribute('data-aos', 'fade-up');

    if (results.length === 0) {
        // No results found
        resultsContainer.innerHTML = `
            <div class="no-results">
                <i class="fas fa-search"></i>
                <h4>No results found for "${searchTerm}"</h4>
                <p>Try different keywords or browse our categories</p>
            </div>
        `;
    } else {
        // Display results
        results.sort((a, b) => b.relevance - a.relevance);

        let resultsHTML = `
            <h4>Found ${results.length} result${results.length === 1 ? '' : 's'} for "${searchTerm}"</h4>
        `;

        results.forEach((result, index) => {
            const questionText = result.question.length > 100 ?
                result.question.substring(0, 100) + '...' : result.question;

            resultsHTML += `
                <div class="search-result-item mb-3">
                    <button class="btn btn-link text-start p-0 text-decoration-none" 
                            onclick="scrollToQuestion('${result.element.id}')">
                        <i class="fas fa-question-circle me-2 text-warning"></i>
                        ${questionText}
                    </button>
                </div>
            `;
        });

        resultsContainer.innerHTML = resultsHTML;
    }

    // Insert results before main FAQ section
    const mainFaqSection = document.querySelector('.main-faq-section');
    mainFaqSection.parentNode.insertBefore(resultsContainer, mainFaqSection);

    // Highlight search terms in results
    highlightSearchTerms(searchTerm);
}

// Clear Search Results
function clearSearchResults() {
    const existingResults = document.querySelector('.search-results');
    if (existingResults) {
        existingResults.remove();
    }
    removeHighlights();
}

// Highlight Search Terms
function highlightSearchTerms(searchTerm) {
    removeHighlights();

    const elements = document.querySelectorAll('.accordion-button, .accordion-body');
    const regex = new RegExp(searchTerm, 'gi');

    elements.forEach(element => {
        const html = element.innerHTML;
        const highlighted = html.replace(regex, match =>
            `<span class="highlight">${match}</span>`
        );
        element.innerHTML = highlighted;
    });
}

// Remove Highlights
function removeHighlights() {
    const highlights = document.querySelectorAll('.highlight');
    highlights.forEach(highlight => {
        const parent = highlight.parentNode;
        parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
        parent.normalize();
    });
}

// Category Filter Functionality
function initCategoryFilter() {
    const categoryCards = document.querySelectorAll('.category-card');

    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            filterByCategory(category);

            // Update active state
            categoryCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
        });
    });
}

// Filter by Category
function filterByCategory(category) {
    const allCategories = document.querySelectorAll('.faq-category');

    allCategories.forEach(faqCategory => {
        const categoryId = faqCategory.querySelector('.accordion').id.replace('Accordion', '');

        if (categoryId.toLowerCase().includes(category)) {
            faqCategory.style.display = 'block';
            // Scroll to category
            setTimeout(() => {
                faqCategory.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        } else {
            faqCategory.style.display = 'none';
        }
    });
}

// Accordion Interactions
function initAccordionInteractions() {
    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Add animation class
            this.classList.add('clicked');
            setTimeout(() => {
                this.classList.remove('clicked');
            }, 300);

            // Track FAQ engagement (for analytics)
            trackFAQEngagement(this.textContent);
        });
    });

    // Auto-expand first item in each category
    const firstItems = document.querySelectorAll('.accordion-item:first-child .accordion-button');
    firstItems.forEach(item => {
        if (!item.classList.contains('collapsed')) {
            const target = item.getAttribute('data-bs-target');
            const collapseElement = document.querySelector(target);
            if (collapseElement) {
                new bootstrap.Collapse(collapseElement, { toggle: false }).show();
            }
        }
    });
}

// Smooth Scrolling
function initSmoothScrolling() {
    // Add smooth scroll to category links
    const categoryLinks = document.querySelectorAll('a[href^="#"]');
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth', block: 'start' });

                // If it's an accordion, open it
                if (targetElement.classList.contains('accordion-collapse')) {
                    new bootstrap.Collapse(targetElement).show();
                }
            }
        });
    });
}

// Scroll to Specific Question
function scrollToQuestion(questionId) {
    const questionElement = document.getElementById(questionId);
    if (questionElement) {
        questionElement.scrollIntoView({ behavior: 'smooth', block: 'center' });

        // Open the accordion if it's closed
        const collapseElement = document.querySelector(`[data-bs-target="#${questionId}"]`);
        if (collapseElement && collapseElement.classList.contains('collapsed')) {
            collapseElement.click();
        }
    }
}

// Track FAQ Engagement (for analytics)
function trackFAQEngagement(question) {
    // In a real application, you would send this data to your analytics service
    console.log('FAQ Engagement:', {
        question: question.trim(),
        timestamp: new Date().toISOString(),
        page: 'faq.php'
    });
}

// Add Floating Elements
function addFloatingElements() {
    const floatingContainer = document.querySelector('.floating-elements');
    if (!floatingContainer) return;

    const colors = ['rgba(254, 197, 58, 0.3)', 'rgba(255, 255, 255, 0.2)', 'rgba(156, 81, 224, 0.2)'];

    for (let i = 0; i < 8; i++) {
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

// FAQ Helpfulness Rating (Optional Feature)
function initHelpfulnessRatings() {
    // This would require backend integration for storing ratings
    const helpfulButtons = document.querySelectorAll('.helpful-btn');

    helpfulButtons.forEach(button => {
        button.addEventListener('click', function() {
            const question = this.closest('.accordion-item').querySelector('.accordion-button').textContent;
            const isHelpful = this.classList.contains('helpful-yes');

            // Send rating to backend
            rateFAQHelpfulness(question, isHelpful);

            // Update UI
            this.disabled = true;
            this.innerHTML = `<i class="fas fa-check"></i> Thank you!`;
        });
    });
}

function rateFAQHelpfulness(question, isHelpful) {
    // In a real application, you would send this to your backend
    console.log('FAQ Rating:', {
        question: question.trim(),
        helpful: isHelpful,
        timestamp: new Date().toISOString()
    });
}

// Keyboard Navigation
document.addEventListener('keydown', function(e) {
    // Add keyboard navigation for power users
    if (e.key === '/' && e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
        e.preventDefault();
        const searchInput = document.getElementById('faqSearch');
        if (searchInput) {
            searchInput.focus();
        }
    }
});

// Print FAQ Functionality
function initPrintFAQ() {
    const printButton = document.createElement('button');
    printButton.className = 'btn btn-outline-primary position-fixed';
    printButton.style.cssText = 'bottom: 20px; right: 20px; z-index: 1000;';
    printButton.innerHTML = '<i class="fas fa-print me-2"></i>Print FAQ';
    printButton.onclick = printFAQ;

    document.body.appendChild(printButton);
}

function printFAQ() {
    window.print();
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add print button for FAQ
    initPrintFAQ();
});