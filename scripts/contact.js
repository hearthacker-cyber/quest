// Contact Page Specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS for contact page
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Contact form handling
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleFormSubmit);
    }

    // Add real-time validation
    const formInputs = contactForm.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        input.addEventListener('blur', validateField);
        input.addEventListener('input', clearFieldError);
    });

    // Add floating elements
    addFloatingElements();

    // Smooth scroll for FAQ items
    const faqButtons = document.querySelectorAll('.accordion-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });
});

// Form submission handler
function handleFormSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const submitButton = form.querySelector('button[type="submit"]');
    const submitText = submitButton.querySelector('.submit-text');
    const spinner = submitButton.querySelector('.spinner-border');

    // Validate form
    if (!validateForm(form)) {
        showNotification('Please fill in all required fields correctly.', 'error');
        return;
    }

    // Show loading state
    submitText.classList.add('d-none');
    spinner.classList.remove('d-none');
    submitButton.disabled = true;

    // Simulate API call
    setTimeout(() => {
        // Reset loading state
        submitText.classList.remove('d-none');
        spinner.classList.add('d-none');
        submitButton.disabled = false;

        // Show success message
        showNotification('Thank you! Your message has been sent successfully. We\'ll get back to you within 24 hours.', 'success');

        // Reset form
        form.reset();
        form.classList.remove('was-validated');
    }, 2000);
}

// Form validation
function validateForm(form) {
    let isValid = true;

    // Clear previous validation
    const inputs = form.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.classList.remove('is-invalid');
    });

    // Validate required fields
    const requiredFields = form.querySelectorAll('[required]');
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });

    // Validate email format
    const emailField = form.querySelector('input[type="email"]');
    if (emailField && emailField.value.trim()) {
        if (!validateEmail(emailField.value)) {
            emailField.classList.add('is-invalid');
            isValid = false;
        }
    }

    if (!isValid) {
        form.classList.add('was-validated');
    }

    return isValid;
}

// Field validation
function validateField(e) {
    const field = e.target;

    if (field.hasAttribute('required') && !field.value.trim()) {
        field.classList.add('is-invalid');
        return;
    }

    if (field.type === 'email' && field.value.trim()) {
        if (!validateEmail(field.value)) {
            field.classList.add('is-invalid');
            return;
        }
    }

    field.classList.remove('is-invalid');
}

// Clear field error
function clearFieldError(e) {
    const field = e.target;
    field.classList.remove('is-invalid');
}

// Email validation
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Notification system
function showNotification(message, type) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.custom-notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `custom-notification alert alert-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} position-fixed`;
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

// Add floating elements dynamically
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

// Phone number formatting
function formatPhoneNumber(phone) {
    const cleaned = phone.replace(/\D/g, '');
    const match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/);
    if (match) {
        return '(' + match[1] + ') ' + match[2] + '-' + match[3];
    }
    return phone;
}

// Initialize phone number formatting
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            const formatted = formatPhoneNumber(e.target.value);
            if (formatted !== e.target.value) {
                e.target.value = formatted;
            }
        });
    }
});