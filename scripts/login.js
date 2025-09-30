// Enhanced Login Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Add floating elements dynamically
    const loginFloatingContainer = document.querySelector('.login-hero-section .floating-elements');
    if (loginFloatingContainer) {
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

            loginFloatingContainer.appendChild(element);
        }
    }

    // DOM Elements
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const userTypeCards = document.querySelectorAll('.user-type-card');
    const loginTitle = document.getElementById('loginTitle');
    const loginSubtitle = document.getElementById('loginSubtitle');
    const loginAvatar = document.getElementById('loginAvatar');
    const loginBtnText = document.querySelector('.btn-text');

    const forgotPasswordModal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));
    const emailNotRegisteredModal = new bootstrap.Modal(document.getElementById('emailNotRegisteredModal'));
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');

    // Current user type
    let currentUserType = 'student';

    // User Type Selection
    userTypeCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove active class from all cards
            userTypeCards.forEach(c => c.classList.remove('active'));

            // Add active class to clicked card
            this.classList.add('active');

            // Update user type
            currentUserType = this.getAttribute('data-user-type');

            // Update login form based on user type
            updateLoginForm(currentUserType);
        });
    });

    // Update login form based on user type
    function updateLoginForm(userType) {
        const studentLottie = 'https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json';
        const parentLottie = 'https://assets1.lottiefiles.com/packages/lf20_0skurerf.json';

        if (userType === 'student') {
            loginAvatar.load(studentLottie);
            loginTitle.textContent = 'Student Login';
            loginSubtitle.textContent = 'Sign in to continue your learning journey';
            loginBtnText.innerHTML = '<i class="fas fa-graduation-cap me-2"></i>Sign In as Student';

            // Update form placeholders
            emailInput.placeholder = 'Enter your student email';
            passwordInput.placeholder = 'Enter your password';
        } else {
            loginAvatar.load(parentLottie);
            loginTitle.textContent = 'Parent Login';
            loginSubtitle.textContent = 'Sign in to monitor your child\'s progress';
            loginBtnText.innerHTML = '<i class="fas fa-user-friends me-2"></i>Sign In as Parent';

            // Update form placeholders
            emailInput.placeholder = 'Enter your parent email';
            passwordInput.placeholder = 'Enter your password';
        }

        // Add animation effect
        loginAvatar.style.animation = 'bounceIn 0.6s ease-out';
        setTimeout(() => {
            loginAvatar.style.animation = '';
        }, 600);
    }

    // Toggle Password Visibility
    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle eye icon with animation
        const icon = this.querySelector('i');
        this.style.transform = 'scale(0.9)';
        setTimeout(() => {
            this.style.transform = 'scale(1)';
        }, 150);

        if (type === 'text') {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Forgot Password Link
    forgotPasswordLink.addEventListener('click', function(e) {
        e.preventDefault();
        forgotPasswordModal.show();
    });

    // Form Validation
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

        // Shake animation for error
        input.style.animation = 'shake 0.5s ease-in-out';
        setTimeout(() => {
            input.style.animation = '';
        }, 500);
    }

    function showSuccess(input) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
    }

    function resetValidation(input) {
        input.classList.remove('is-invalid', 'is-valid');
    }

    // Real-time validation
    emailInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            resetValidation(this);
        } else if (!validateEmail(this.value)) {
            showError(this, 'Please enter a valid email address');
        } else {
            showSuccess(this);
        }
    });

    passwordInput.addEventListener('input', function() {
        if (this.value.trim() === '') {
            resetValidation(this);
        } else if (this.value.length < 6) {
            showError(this, 'Password must be at least 6 characters');
        } else {
            showSuccess(this);
        }
    });

    // Login Form Submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Get form values
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const rememberMe = document.getElementById('rememberMe').checked;

        // Validate form
        let isValid = true;

        if (email === '' || !validateEmail(email)) {
            showError(emailInput, 'Please enter a valid email address');
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

        if (!isValid) {
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
            // Check if email exists in system
            const studentEmails = ['student@quest.com', 'demo@quest.com'];
            const parentEmails = ['parent@quest.com'];
            const registeredEmails = [...studentEmails, ...parentEmails];

            if (!registeredEmails.includes(email)) {
                // Email not registered
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;

                emailNotRegisteredModal.show();
                return;
            }

            // Check user type consistency
            if ((currentUserType === 'student' && parentEmails.includes(email)) ||
                (currentUserType === 'parent' && studentEmails.includes(email))) {
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;

                const errorMsg = currentUserType === 'student' ?
                    'This email is registered as a parent account' :
                    'This email is registered as a student account';

                showError(emailInput, errorMsg);
                return;
            }

            // Simulate successful login
            if (password === 'password123') {
                // Success animation
                submitBtn.classList.add('btn-success');
                submitBtn.classList.remove('btn-warning');
                btnLoading.innerHTML = '<i class="fas fa-check me-2"></i>Login Successful!';

                setTimeout(() => {
                    // Redirect to appropriate dashboard
                    const redirectUrl = currentUserType === 'student' ? 'student-dashboard.php' : 'parent-dashboard.php';
                    window.location.href = redirectUrl;
                }, 1000);
            } else {
                // Invalid password
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;

                showError(passwordInput, 'Invalid password. Please try again.');
            }
        }, 2000);
    });

    // Forgot Password Form Submission
    forgotPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const resetEmail = document.getElementById('resetEmail');
        const email = resetEmail.value.trim();

        if (email === '' || !validateEmail(email)) {
            resetEmail.classList.add('is-invalid');
            return;
        }

        // Simulate sending reset email
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Sending...';
        submitBtn.disabled = true;

        setTimeout(() => {
            submitBtn.innerHTML = '<i class="fas fa-check me-2"></i>Email Sent!';
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-success');

            setTimeout(() => {
                forgotPasswordModal.hide();
                submitBtn.innerHTML = originalText;
                submitBtn.classList.remove('btn-success');
                submitBtn.classList.add('btn-primary');
                submitBtn.disabled = false;
                resetEmail.value = '';
                resetEmail.classList.remove('is-invalid');

                // Show success message
                showAlert('success', `Password reset instructions sent to ${email}`);
            }, 1500);
        }, 2000);
    });

    // Utility function to show alerts
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

    // Add CSS animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .lottie-player {
            transition: all 0.3s ease;
        }
    `;
    document.head.appendChild(style);

    // Demo login functionality (development only)
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        const demoContainer = document.createElement('div');
        demoContainer.className = 'demo-logins mt-4 p-3 rounded';
        demoContainer.innerHTML = `
            <p class="small mb-2"><i class="fas fa-info-circle me-2"></i>Demo Accounts:</p>
            <div class="d-flex gap-2 flex-wrap justify-content-center">
                <button class="btn demo-login" data-email="student@quest.com" data-password="password123" data-type="student">
                    <i class="fas fa-graduation-cap me-2"></i>Student Demo
                </button>
                <button class="btn demo-login" data-email="parent@quest.com" data-password="password123" data-type="parent">
                    <i class="fas fa-user-friends me-2"></i>Parent Demo
                </button>
            </div>
        `;

        document.querySelector('.hero-main').appendChild(demoContainer);

        // Demo login functionality
        document.querySelectorAll('.demo-login').forEach(button => {
            button.addEventListener('click', function() {
                const email = this.getAttribute('data-email');
                const password = this.getAttribute('data-password');
                const type = this.getAttribute('data-type');

                // Select appropriate user type
                const targetCard = document.querySelector(`.user-type-card[data-user-type="${type}"]`);
                if (targetCard) {
                    targetCard.click();
                }

                // Fill form fields
                emailInput.value = email;
                passwordInput.value = password;

                // Trigger validation
                emailInput.dispatchEvent(new Event('input'));
                passwordInput.dispatchEvent(new Event('input'));

                // Add visual feedback
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 150);
            });
        });
    }
});