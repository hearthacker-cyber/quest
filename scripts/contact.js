// Contact Form Functionality
document.addEventListener('DOMContentLoaded', function() {
    console.log('Contact page loaded'); // Debug line

    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        console.log('Contact form found'); // Debug line

        const submitBtn = contactForm.querySelector('button[type="submit"]');
        const submitText = contactForm.querySelector('.submit-text');
        const spinner = contactForm.querySelector('.spinner-border');

        // Form validation and submission
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted'); // Debug line

            if (validateForm()) {
                // Show loading state
                submitText.textContent = 'Sending...';
                spinner.classList.remove('d-none');
                submitBtn.disabled = true;

                // Simulate form submission
                setTimeout(() => {
                    // Show success message
                    showSuccessMessage();

                    // Reset form
                    contactForm.reset();

                    // Reset button state
                    submitText.textContent = 'Send Message';
                    spinner.classList.add('d-none');
                    submitBtn.disabled = false;
                }, 2000);
            }
        });

        // Real-time validation
        const inputs = contactForm.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            input.addEventListener('input', function() {
                if (this.classList.contains('is-invalid')) {
                    validateField(this);
                }
            });
        });

        function validateForm() {
            let isValid = true;
            inputs.forEach(input => {
                if (input.hasAttribute('required')) {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                }
            });
            return isValid;
        }

        function validateField(field) {
            const value = field.value.trim();
            let isValid = true;

            // Remove previous validation states
            field.classList.remove('is-valid', 'is-invalid');

            if (field.hasAttribute('required') && !value) {
                field.classList.add('is-invalid');
                isValid = false;
            } else if (field.type === 'email' && value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
            } else if (field.type === 'tel' && value) {
                const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
                if (!phoneRegex.test(value.replace(/[\s\-\(\)]/g, ''))) {
                    field.classList.add('is-invalid');
                    isValid = false;
                }
            }

            if (isValid && (field.hasAttribute('required') || value)) {
                field.classList.add('is-valid');
            }

            return isValid;
        }

        function showSuccessMessage() {
            // Create success message element
            const successHTML = `
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <h3>Message Sent Successfully!</h3>
                    <p>Thank you for contacting us. We'll get back to you within 24 hours.</p>
                    <button class="btn btn-primary mt-3" onclick="location.reload()">Send Another Message</button>
                </div>
            `;

            // Replace form with success message
            contactForm.style.display = 'none';
            contactForm.insertAdjacentHTML('afterend', successHTML);
        }
    }

    // Add floating elements dynamically for contact page
    const floatingContainer = document.querySelector('.contact-hero-section .floating-elements');
    if (floatingContainer) {
        console.log('Adding floating elements'); // Debug line
        const colors = ['rgba(254, 197, 58, 0.3)', 'rgba(255, 255, 255, 0.2)', 'rgba(156, 81, 224, 0.2)'];

        for (let i = 0; i < 12; i++) {
            const element = document.createElement('div');
            element.classList.add('floating-element');

            const size = Math.random() * 60 + 20;
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

});