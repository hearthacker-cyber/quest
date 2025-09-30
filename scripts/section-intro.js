// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// Navbar scroll effect
window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
        document.querySelector('.navbar').classList.add('scrolled');
    } else {
        document.querySelector('.navbar').classList.remove('scrolled');
    }
});

// Lottie Animations
document.addEventListener('DOMContentLoaded', function() {
    // Main section Lottie
    const sectionLottie = document.getElementById('section-lottie');
    sectionLottie.innerHTML = `
        <lottie-player 
            src="https://assets1.lottiefiles.com/packages/lf20_kmfdbx5q.json" 
            background="transparent" 
            speed="1" 
            style="width: 500px; height: 400px;" 
            loop 
            autoplay>
        </lottie-player>
    `;

    // Example Lotties
    const exampleLotties = [
        'https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json', // Car
        'https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json', // Wheel
        'https://assets1.lottiefiles.com/packages/lf20_kkflmtpr.json', // Airplane
        'https://assets1.lottiefiles.com/packages/lf20_kkflmtpr.json'  // Wing
    ];

    exampleLotties.forEach((url, index) => {
        const container = document.getElementById(`example-lottie-${index + 1}`);
        if (container) {
            container.innerHTML = `
                <lottie-player 
                    src="${url}" 
                    background="transparent" 
                    speed="1" 
                    style="width: 80px; height: 80px;" 
                    ${index === 3 ? 'autoplay' : ''}>
                </lottie-player>
            `;
        }
    });

    // Option Lotties
    const optionLotties = [
        'https://assets1.lottiefiles.com/packages/lf20_kkflmtpr.json', // Correct: Wing
        'https://assets1.lottiefiles.com/packages/lf20_7sk0mcix.json', // Wrong: Car
        'https://assets1.lottiefiles.com/packages/lf20_5tkustlj.json', // Wrong: Boat
        'https://assets1.lottiefiles.com/packages/lf20_gnvuxbsd.json'  // Wrong: Train
    ];

    optionLotties.forEach((url, index) => {
        const container = document.getElementById(`option-lottie-${index + 1}`);
        if (container) {
            container.innerHTML = `
                <lottie-player 
                    src="${url}" 
                    background="transparent" 
                    speed="1" 
                    style="width: 60px; height: 60px;">
                </lottie-player>
            `;
        }
    });

    // Progress Lottie
    const progressLottie = document.getElementById('progress-lottie');
    progressLottie.innerHTML = `
        <lottie-player 
            src="https://assets1.lottiefiles.com/packages/lf20_obhph3sh.json" 
            background="transparent" 
            speed="1" 
            style="width: 200px; height: 200px;" 
            loop 
            autoplay>
        </lottie-player>
    `;

    // Example explanation toggle
    const showExplanationBtn = document.getElementById('show-explanation');
    const explanationContent = document.getElementById('explanation-content');

    showExplanationBtn.addEventListener('click', function() {
        if (explanationContent.style.display === 'none') {
            explanationContent.style.display = 'block';
            showExplanationBtn.innerHTML = '<i class="fas fa-eye-slash me-2"></i>Hide Explanation';
        } else {
            explanationContent.style.display = 'none';
            showExplanationBtn.innerHTML = '<i class="fas fa-lightbulb me-2"></i>Show Explanation';
        }
    });

    // Option selection
    const optionItems = document.querySelectorAll('.option-item');
    optionItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove selected class from all options
            optionItems.forEach(opt => opt.classList.remove('selected'));
            
            // Add selected class to clicked option
            this.classList.add('selected');
            
            // Show explanation if correct
            if (this.dataset.correct === 'true') {
                explanationContent.style.display = 'block';
                showExplanationBtn.innerHTML = '<i class="fas fa-eye-slash me-2"></i>Hide Explanation';
            }
        });
    });

    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Animate progress bars on scroll
    const progressItems = document.querySelectorAll('.progress-item');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressFill = entry.target.querySelector('.progress-fill');
                const width = progressFill.style.width;
                progressFill.style.width = '0';
                
                setTimeout(() => {
                    progressFill.style.width = width;
                }, 300);
            }
        });
    }, { threshold: 0.5 });

    progressItems.forEach(item => observer.observe(item));
});

// Section data (could be dynamic from PHP)
const sectionData = {
    'picture-analogy': {
        title: 'Master Picture Analogies',
        description: 'Develop critical thinking skills by identifying relationships between images and applying logical reasoning to solve visual puzzles.',
        category: 'Picture Analogy',
        questions: 20,
        time: '20 min',
        difficulty: 'Easy to Hard',
        about: 'Picture Analogies help develop visual reasoning and pattern recognition skills. You\'ll be presented with two images that have a specific relationship, and your task is to identify another image that shares the same relationship with a third image.',
        lottieUrl: 'https://assets1.lottiefiles.com/packages/lf20_kmfdbx5q.json'
    }
    // Add more sections as needed
};

// Function to update section content based on URL parameter
function updateSectionContent() {
    const urlParams = new URLSearchParams(window.location.search);
    const section = urlParams.get('section') || 'picture-analogy';
    
    if (sectionData[section]) {
        const data = sectionData[section];
        
        document.getElementById('section-title').textContent = data.title;
        document.getElementById('section-description').textContent = data.description;
        document.getElementById('section-category').textContent = data.category;
        document.getElementById('questions-count').textContent = data.questions;
        document.getElementById('time-limit').textContent = data.time;
        document.getElementById('difficulty-level').textContent = data.difficulty;
        document.getElementById('section-about').textContent = data.about;
        
        // Update practice and test links
        document.querySelectorAll('.action-buttons a, .mode-card a').forEach(link => {
            const href = link.getAttribute('href').split('?')[0];
            link.setAttribute('href', `${href}?section=${section}`);
        });
    }
}
// Update Lottie initialization for better responsive behavior
function initializeLottieAnimations() {
    // Main section Lottie with responsive sizing
    const sectionLottie = document.getElementById('section-lottie');
    if (sectionLottie) {
        sectionLottie.innerHTML = `
            <lottie-player 
                src="https://assets1.lottiefiles.com/packages/lf20_kmfdbx5q.json" 
                background="transparent" 
                speed="1" 
                style="width: 100%; height: auto; max-width: 500px;" 
                loop 
                autoplay>
            </lottie-player>
        `;
    }
}

// Call this function on load and resize
window.addEventListener('load', initializeLottieAnimations);
window.addEventListener('resize', initializeLottieAnimations);
// Initialize section content
updateSectionContent();