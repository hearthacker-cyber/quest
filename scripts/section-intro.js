// Section Intro Page Specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS for section intro page
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Initialize section functionality
    initExampleExercise();
    initLearningModes();
    initNavigation();
    initProgressAnimation();
    addFloatingElements();

    // Initialize smooth scrolling
    initSmoothScrolling();
});

// Example Exercise Functionality
function initExampleExercise() {
    const optionItems = document.querySelectorAll('.option-item');
    const explanationCard = document.querySelector('.explanation-card');

    optionItems.forEach(item => {
        item.addEventListener('click', function() {
            const isCorrect = this.getAttribute('data-correct') === 'true';

            // Remove previous selections
            optionItems.forEach(opt => {
                opt.style.borderColor = '#ddd';
                opt.style.background = 'white';
            });

            // Show result
            if (isCorrect) {
                this.style.borderColor = '#28a745';
                this.style.background = 'rgba(40, 167, 69, 0.1)';
                showNotification('Correct! Great job! 🎉', 'success');
            } else {
                this.style.borderColor = '#dc3545';
                this.style.background = 'rgba(220, 53, 69, 0.1)';
                showNotification('Not quite right. Try again! 💡', 'error');

                // Highlight correct answer
                const correctOption = document.querySelector('.option-item[data-correct="true"]');
                correctOption.style.borderColor = '#28a745';
                correctOption.style.background = 'rgba(40, 167, 69, 0.1)';
            }

            // Show explanation
            if (explanationCard) {
                explanationCard.style.display = 'block';
                explanationCard.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }

            // Track exercise attempt
            trackExerciseAttempt('pattern_recognition', isCorrect);
        });
    });
}

// Learning Modes Functionality
function initLearningModes() {
    const practiceBtn = document.querySelector('.start-practice-btn');
    const testBtn = document.querySelector('.start-test-btn');

    if (practiceBtn) {
        practiceBtn.addEventListener('click', function() {
            startPracticeMode();
        });
    }

    if (testBtn) {
        testBtn.addEventListener('click', function() {
            startTestMode();
        });
    }
}

function startPracticeMode() {
    showNotification('Starting Practice Mode... Get ready to learn! 📚', 'info');

    // Simulate loading
    setTimeout(() => {
        // In a real application, this would redirect to practice mode
        showNotification('Practice mode loaded! Begin with easy exercises.', 'success');
        trackModeSelection('practice');
    }, 1500);
}

function startTestMode() {
    const confirmed = confirm('Ready for a challenge? Test mode has a 20-minute timer. Start now?');

    if (confirmed) {
        showNotification('Starting Test Mode... Good luck! ⏱️', 'info');

        // Simulate loading
        setTimeout(() => {
            // In a real application, this would redirect to test mode
            showNotification('Test mode begins now! Complete 20 questions in 20 minutes.', 'success');
            trackModeSelection('test');
        }, 1500);
    }
}

// Navigation Functionality
function initNavigation() {
    // Add active states to navigation links
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');

    // Update active link on scroll
    window.addEventListener('scroll', function() {
        let current = '';

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;

            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
                link.style.background = 'var(--light-blue)';
                link.style.borderColor = 'var(--primary-blue)';
            }
        });
    });
}

// Progress Animation
function initProgressAnimation() {
    const progressFills = document.querySelectorAll('.progress-fill');

    // Animate progress bars when they come into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const fill = entry.target;
                const width = fill.style.width;
                fill.style.width = '0%';

                setTimeout(() => {
                    fill.style.transition = 'width 2s ease-in-out';
                    fill.style.width = width;
                }, 500);

                observer.unobserve(fill);
            }
        });
    }, { threshold: 0.5 });

    progressFills.forEach(fill => {
        observer.observe(fill);
    });
}

// Smooth Scrolling
function initSmoothScrolling() {
    const navLinks = document.querySelectorAll('a[href^="#"]');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 100;

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// // Add Floating Elements - Enhanced for better distribution
function addFloatingElements() {
    const floatingContainer = document.querySelector('.floating-elements');
    if (!floatingContainer) return;

    const colors = [
        'rgba(254, 197, 58, 0.3)',
        'rgba(255, 255, 255, 0.2)',
        'rgba(156, 81, 224, 0.2)',
        'rgba(68, 173, 229, 0.2)'
    ];

    // Clear existing elements
    floatingContainer.innerHTML = '';

    for (let i = 0; i < 15; i++) {
        const element = document.createElement('div');
        element.classList.add('floating-element');

        const size = Math.random() * 60 + 20;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const delay = Math.random() * 10;
        const duration = Math.random() * 10 + 15;

        element.style.width = `${size}px`;
        element.style.height = `${size}px`;
        element.style.left = `${left}%`;
        element.style.top = `${top}%`;
        element.style.background = color;
        element.style.animationDelay = `${delay}s`;
        element.style.animationDuration = `${duration}s`;

        floatingContainer.appendChild(element);
    }
}

// Analytics Tracking
function trackExerciseAttempt(exerciseType, isCorrect) {
    // In a real application, you would send this to your analytics service
    console.log('Exercise Attempt:', {
        type: exerciseType,
        correct: isCorrect,
        timestamp: new Date().toISOString(),
        page: 'section-intro.php'
    });
}

function trackModeSelection(mode) {
    // In a real application, you would send this to your analytics service
    console.log('Mode Selection:', {
        mode: mode,
        timestamp: new Date().toISOString(),
        section: 'critical_thinking'
    });
}

// Notification System
function showNotification(message, type) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.section-notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `section-notification alert alert-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} position-fixed`;
    notification.style.cssText = `
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        max-width: 500px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        border-radius: 15px;
        border: none;
        padding: 20px;
        font-weight: 600;
    `;

    // Add icon based on type
    let icon = '';
    if (type === 'success') {
        icon = '<i class="fas fa-check-circle me-2"></i>';
        notification.style.background = 'linear-gradient(135deg, #d4edda, #c3e6cb)';
        notification.style.color = '#155724';
    } else if (type === 'error') {
        icon = '<i class="fas fa-exclamation-circle me-2"></i>';
        notification.style.background = 'linear-gradient(135deg, #f8d7da, #f5c6cb)';
        notification.style.color = '#721c24';
    } else {
        icon = '<i class="fas fa-info-circle me-2"></i>';
        notification.style.background = 'linear-gradient(135deg, #cce7ff, #b3d9ff)';
        notification.style.color = '#004085';
    }

    notification.innerHTML = `${icon}${message}`;

    document.body.appendChild(notification);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100px)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);

    // Add close button functionality
    notification.addEventListener('click', () => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100px)';
        setTimeout(() => notification.remove(), 300);
    });
}

// Section Bookmarking
function initBookmarking() {
    // Add bookmark functionality for sections
    const bookmarkBtn = document.createElement('button');
    bookmarkBtn.className = 'btn btn-outline-primary position-fixed';
    bookmarkBtn.style.cssText = `
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        border-radius: 50px;
        padding: 12px 20px;
        font-weight: 600;
    `;
    bookmarkBtn.innerHTML = '<i class="fas fa-bookmark me-2"></i>Bookmark Section';
    bookmarkBtn.onclick = toggleBookmark;

    document.body.appendChild(bookmarkBtn);

    // Check if section is already bookmarked
    updateBookmarkButton();
}

function toggleBookmark() {
    const sectionId = 'critical_thinking';
    const bookmarks = JSON.parse(localStorage.getItem('quest_bookmarks') || '[]');
    const isBookmarked = bookmarks.includes(sectionId);

    if (isBookmarked) {
        // Remove bookmark
        const index = bookmarks.indexOf(sectionId);
        bookmarks.splice(index, 1);
        showNotification('Section removed from bookmarks', 'info');
    } else {
        // Add bookmark
        bookmarks.push(sectionId);
        showNotification('Section bookmarked! 📚', 'success');
    }

    localStorage.setItem('quest_bookmarks', JSON.stringify(bookmarks));
    updateBookmarkButton();
}

function updateBookmarkButton() {
    const sectionId = 'critical_thinking';
    const bookmarks = JSON.parse(localStorage.getItem('quest_bookmarks') || '[]');
    const isBookmarked = bookmarks.includes(sectionId);
    const bookmarkBtn = document.querySelector('.btn[onclick="toggleBookmark()"]');

    if (bookmarkBtn) {
        if (isBookmarked) {
            bookmarkBtn.innerHTML = '<i class="fas fa-bookmark text-warning me-2"></i>Bookmarked';
            bookmarkBtn.classList.add('btn-warning');
            bookmarkBtn.classList.remove('btn-outline-primary');
        } else {
            bookmarkBtn.innerHTML = '<i class="fas fa-bookmark me-2"></i>Bookmark Section';
            bookmarkBtn.classList.remove('btn-warning');
            bookmarkBtn.classList.add('btn-outline-primary');
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add bookmarking functionality
    initBookmarking();

    // Add print section button
    const printBtn = document.createElement('button');
    printBtn.className = 'btn btn-outline-secondary position-fixed';
    printBtn.style.cssText = `
        bottom: 80px;
        right: 20px;
        z-index: 1000;
        border-radius: 50px;
        padding: 12px 20px;
        font-weight: 600;
    `;
    printBtn.innerHTML = '<i class="fas fa-print me-2"></i>Print Section';
    printBtn.onclick = () => window.print();

    document.body.appendChild(printBtn);
});