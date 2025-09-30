// Parent Login JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Add floating elements
    const floatingContainer = document.querySelector('.parent-login .floating-elements');
    addFloatingElements(floatingContainer);

    // DOM Elements
    const loginForm = document.getElementById('parentLoginForm');
    const emailInput = document.getElementById('parentEmail');
    const passwordInput = document.getElementById('parentPassword');
    const togglePasswordBtn = document.getElementById('toggleParentPassword');
    const forgotPasswordLink = document.getElementById('parentForgotPassword');

    const forgotPasswordModal = new bootstrap.Modal(document.getElementById('parentForgotPasswordModal'));
    const forgotPasswordForm = document.getElementById('parentForgotPasswordForm');

    // Toggle Password Visibility
    togglePasswordBtn.addEventListener('click', function() {
        togglePasswordVisibility(passwordInput, this);
    });

    // Forgot Password Link
    forgotPasswordLink.addEventListener('click', function(e) {
        e.preventDefault();
        forgotPasswordModal.show();
    });

    // Form Validation and Submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        handleParentLogin();
    });

    // Forgot Password Form
    forgotPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();
        handleParentPasswordReset();
    });

    function handleParentLogin() {
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (!validateParentForm(email, password)) {
            return;
        }

        // Show loading state
        const submitBtn = loginForm.querySelector('.login-btn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnLoading = submitBtn.querySelector('.btn-loading');

        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');
        submitBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            const parentEmails = ['parent@quest.com'];

            if (!parentEmails.includes(email)) {
                // Email not registered as parent
                showAlert('error', 'This email is not registered as a parent account.');
                resetLoginButton(submitBtn, btnText, btnLoading);
                return;
            }

            // Simulate successful login
            if (password === 'password123') {
                showAlert('success', 'Login successful! Redirecting...');
                submitBtn.classList.add('btn-success');
                submitBtn.classList.remove('btn-warning');

                setTimeout(() => {
                    window.location.href = 'parent-dashboard.php';
                }, 1500);
            } else {
                showAlert('error', 'Invalid password. Please try again.');
                resetLoginButton(submitBtn, btnText, btnLoading);
            }
        }, 2000);
    }

    function validateParentForm(email, password) {
        let isValid = true;

        if (email === '' || !validateEmail(email)) {
            showError(emailInput, 'Please enter a valid parent email');
            isValid = false;
        } else {
            showSuccess(emailInput);
        }

        if (password === '') {
            showError(passwordInput, 'Please enter your password');
            isValid = false;
        } else if (password.length < 6) {
            showError(passwordInput, 'Password must be at least 6 characters');
            isValid = false;
        } else {
            showSuccess(passwordInput);
        }

        return isValid;
    }
});

// Utility Functions
function addFloatingElements(container) {
    if (!container) return;

    const colors = ['rgba(254, 197, 58, 0.3)', 'rgba(255, 255, 255, 0.2)', 'rgba(156, 81, 224, 0.2)'];

    for (let i = 0; i < 12; i++) {
        const element = document.createElement('div');
        element.classList.add('floating-element');

        const size = Math.random() * 80 + 20;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const delay = Math.random() * 15;

        element.style.width = `${size}px`;
        element.style.height = `${size}px`;
        element.style.left = `${left}%`;
        element.style.top = `${top}%`;
        element.style.background = color;
        element.style.animationDelay = `${delay}s`;
        element.style.borderRadius = Math.random() > 0.5 ? '50%' : '30%';

        container.appendChild(element);
    }
}

function togglePasswordVisibility(passwordInput, toggleBtn) {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    const icon = toggleBtn.querySelector('i');
    toggleBtn.style.transform = 'scale(0.9)';
    setTimeout(() => {
        toggleBtn.style.transform = 'scale(1)';
    }, 150);

    if (type === 'text') {
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function showError(input, message) {
    input.classList.add('is-invalid');
    input.classList.remove('is-valid');
    const errorElement = document.getElementById(input.id + 'Error');
    if (errorElement) {
        errorElement.textContent = message;
    }

    input.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
        input.style.animation = '';
    }, 500);
}

function showSuccess(input) {
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}

function resetLoginButton(submitBtn, btnText, btnLoading) {
    btnText.classList.remove('d-none');
    btnLoading.classList.add('d-none');
    submitBtn.disabled = false;
}

function showAlert(type, message) {
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    alert.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.body.appendChild(alert);

    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 5000);
}