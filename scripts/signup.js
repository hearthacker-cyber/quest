// Enhanced Signup Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Add floating elements dynamically
    const signupFloatingContainer = document.querySelector('.signup-hero-section .floating-elements');
    if (signupFloatingContainer) {
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

            signupFloatingContainer.appendChild(element);
        }
    }

    // DOM Elements
    const signupForm = document.getElementById('signupForm');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const gradeSelect = document.getElementById('grade');
    const gradeField = document.getElementById('gradeField');
    const termsCheckbox = document.getElementById('terms');
    const togglePasswordBtn = document.getElementById('togglePassword');
    const userTypeCards = document.querySelectorAll('.user-type-card');
    const userTypeInput = document.getElementById('userType');
    const signupTitle = document.getElementById('signupTitle');
    const signupSubtitle = document.getElementById('signupSubtitle');
    const signupAvatar = document.getElementById('signupAvatar');
    const signupBtnText = document.querySelector('.btn-text');
    const signupBtn = document.querySelector('.signup-btn');

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
            userTypeInput.value = currentUserType;

            // Update signup form based on user type
            updateSignupForm(currentUserType);
        });
    });

    // Update signup form based on user type
    function updateSignupForm(userType) {
        const studentLottie = 'https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json';
        const parentLottie = 'https://assets1.lottiefiles.com/packages/lf20_0skurerf.json';

        if (userType === 'student') {
            if (signupAvatar) {
                signupAvatar.load(studentLottie);
            }
            if (signupTitle) {
                signupTitle.textContent = 'Student Sign Up';
            }
            if (signupSubtitle) {
                signupSubtitle.textContent = 'Create your account to start learning';
            }
            if (signupBtnText) {
                signupBtnText.innerHTML = '<i class="fas fa-graduation-cap me-2"></i>Create Student Account';
            }

            // Update form placeholders
            if (fullNameInput) {
                fullNameInput.placeholder = 'Enter student full name';
            }
            if (emailInput) {
                emailInput.placeholder = 'Enter student email';
            }

            // Show grade selection and make it required
            if (gradeField) {
                gradeField.style.display = 'block';
            }
            if (gradeSelect) {
                gradeSelect.required = true;
            }
        } else {
            if (signupAvatar) {
                signupAvatar.load(parentLottie);
            }
            if (signupTitle) {
                signupTitle.textContent = 'Parent Sign Up';
            }
            if (signupSubtitle) {
                signupSubtitle.textContent = 'Create account to monitor your child\'s progress';
            }
            if (signupBtnText) {
                signupBtnText.innerHTML = '<i class="fas fa-user-friends me-2"></i>Create Parent Account';
            }

            // Update form placeholders
            if (fullNameInput) {
                fullNameInput.placeholder = 'Enter parent full name';
            }
            if (emailInput) {
                emailInput.placeholder = 'Enter parent email';
            }

            // Hide grade selection and make it not required for parents
            if (gradeField) {
                gradeField.style.display = 'none';
            }
            if (gradeSelect) {
                gradeSelect.required = false;
                gradeSelect.value = '';
                resetValidation(gradeSelect);
            }
        }

        // Add animation effect
        if (signupAvatar) {
            signupAvatar.style.animation = 'bounceIn 0.6s ease-out';
            setTimeout(() => {
                signupAvatar.style.animation = '';
            }, 600);
        }
    }

    // Toggle Password Visibility
    if (togglePasswordBtn) {
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
    }

    // Form Validation Functions
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
        return password.length >= 6;
    }

    function passwordsMatch(password, confirmPassword) {
        return password === confirmPassword;
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
    if (fullNameInput) {
        fullNameInput.addEventListener('input', function() {
            if (this.value.trim() === '') {
                resetValidation(this);
            } else if (this.value.trim().length < 2) {
                showError(this, 'Name must be at least 2 characters');
            } else {
                showSuccess(this);
            }
        });
    }

    if (emailInput) {
        emailInput.addEventListener('input', function() {
            if (this.value.trim() === '') {
                resetValidation(this);
            } else if (!validateEmail(this.value)) {
                showError(this, 'Please enter a valid email address');
            } else {
                showSuccess(this);
            }
        });
    }

    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
            if (this.value.trim() === '') {
                resetValidation(this);
            } else if (!validatePassword(this.value)) {
                showError(this, 'Password must be at least 6 characters');
            } else {
                showSuccess(this);
            }

            // Also validate confirm password when password changes
            if (confirmPasswordInput && confirmPasswordInput.value) {
                confirmPasswordInput.dispatchEvent(new Event('input'));
            }
        });
    }

    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value.trim() === '') {
                resetValidation(this);
            } else if (!passwordsMatch(passwordInput.value, this.value)) {
                showError(this, 'Passwords do not match');
            } else {
                showSuccess(this);
            }
        });
    }

    if (gradeSelect) {
        gradeSelect.addEventListener('change', function() {
            if (this.value === '') {
                resetValidation(this);
            } else {
                showSuccess(this);
            }
        });
    }

    if (termsCheckbox) {
        termsCheckbox.addEventListener('change', function() {
            resetValidation(this);
        });
    }

    // Form Submission Handler
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            // Validate all fields
            let isValid = true;

            // Validate name
            if (fullNameInput.value.trim() === '') {
                showError(fullNameInput, 'Please enter your full name');
                isValid = false;
            } else if (fullNameInput.value.trim().length < 2) {
                showError(fullNameInput, 'Name must be at least 2 characters');
                isValid = false;
            }

            // Validate email
            if (emailInput.value.trim() === '') {
                showError(emailInput, 'Please enter your email address');
                isValid = false;
            } else if (!validateEmail(emailInput.value)) {
                showError(emailInput, 'Please enter a valid email address');
                isValid = false;
            }

            // Validate password
            if (passwordInput.value === '') {
                showError(passwordInput, 'Please create a password');
                isValid = false;
            } else if (!validatePassword(passwordInput.value)) {
                showError(passwordInput, 'Password must be at least 6 characters');
                isValid = false;
            }

            // Validate confirm password
            if (confirmPasswordInput.value === '') {
                showError(confirmPasswordInput, 'Please confirm your password');
                isValid = false;
            } else if (!passwordsMatch(passwordInput.value, confirmPasswordInput.value)) {
                showError(confirmPasswordInput, 'Passwords do not match');
                isValid = false;
            }

            // Validate grade only for students
            if (currentUserType === 'student') {
                if (gradeSelect.value === '') {
                    showError(gradeSelect, 'Please select your grade level');
                    isValid = false;
                }
            }

            // Validate terms
            if (!termsCheckbox.checked) {
                showError(termsCheckbox, 'You must agree to the terms and conditions');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();

                // Show loading state
                const btnText = signupBtn.querySelector('.btn-text');
                const btnLoading = signupBtn.querySelector('.btn-loading');

                btnText.classList.add('d-none');
                btnLoading.classList.remove('d-none');
                signupBtn.disabled = true;

                // Re-enable after validation
                setTimeout(() => {
                    btnText.classList.remove('d-none');
                    btnLoading.classList.add('d-none');
                    signupBtn.disabled = false;
                }, 1000);
            }
        });
    }

    // Add shake animation for errors
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }
    `;
    document.head.appendChild(style);
});