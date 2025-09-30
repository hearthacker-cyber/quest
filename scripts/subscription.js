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

// Plan selection highlight
document.addEventListener('DOMContentLoaded', function() {
    const planCards = document.querySelectorAll('.pricing-card');
    
    planCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove active class from all cards
            planCards.forEach(c => c.classList.remove('active'));
            // Add active class to clicked card
            this.classList.add('active');
        });
    });
    
    // Add smooth scrolling for FAQ accordion
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            setTimeout(() => {
                this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            }, 300);
        });
    });
});

// Price calculation helper
function calculateSavings(plan) {
    const monthlyPrice = 30;
    let planPrice, savings;
    
    switch(plan) {
        case '3months':
            planPrice = 25;
            savings = (monthlyPrice - planPrice) * 3;
            break;
        case '6months':
            planPrice = 20;
            savings = (monthlyPrice - planPrice) * 6;
            break;
        default:
            savings = 0;
    }
    
    return savings;
}