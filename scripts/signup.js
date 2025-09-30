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
            const termsCheckbox = document.getElementById('terms');
            const togglePasswordBtn = document.getElementById('togglePassword');
            const userTypeCards = document.querySelectorAll('.user-type-card');
            const signupTitle = document.getElementById('signupTitle');
            const signupSubtitle = document.getElementById('signupSubtitle');
            const signupAvatar = document.getElementById('signupAvatar');
            const signupBtnText = document.querySelector('.btn-text');

            const successModal = new bootstrap.Modal(document.getElementById('successModal'));

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

                    // Update signup form based on user type
                    updateSignupForm(currentUserType);
                });
            });

            // Update signup form based on user type
            function updateSignupForm(userType) {
                const studentLottie = 'https://assets1.lottiefiles.com/packages/lf20_kdxn4d4d.json';
                const parentLottie = 'https://assets1.lottiefiles.com/packages/lf20_0skurerf.json';

                if (userType === 'student') {
                    signupAvatar.load(studentLottie);
                    signupTitle.textContent = 'Student Sign Up';
                    signupSubtitle.textContent = 'Create your account to start learning';
                    signupBtnText.innerHTML = '<i class="fas fa-graduation-cap me-2"></i>Create Student Account';

                    // Update form placeholders
                    fullNameInput.placeholder = 'Enter student full name';
                    emailInput.placeholder = 'Enter student email';

                    // Show grade selection
                    document.querySelector('.form-group:has(#grade)').style.display = 'block';
                } else {
                    signupAvatar.load(parentLottie);
                    signupTitle.textContent = 'Parent Sign Up';
                    signupSubtitle.textContent = 'Create account to monitor your child\'s progress';
                    signupBtnText.innerHTML = '<i class="fas fa-user-friends me-2"></i>Create Parent Account';

                    // Update form placeholders
                    fullNameInput.placeholder = 'Enter parent full name';
                    emailInput.placeholder = 'Enter parent email';

                    // Hide grade selection for parents
                    document.querySelector('.form-group:has(#grade)').style.display = 'none';
                }

                // Add animation effect
                signupAvatar.style.animation = 'bounceIn 0.6s ease-out';
                setTimeout(() => {
                    signupAvatar.style.animation = '';
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
            fullNameInput.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    resetValidation(this);
                } else if (this.value.trim().length < 2) {
                    showError(this, 'Name must be at least 2 characters');
                } else {
                    showSuccess(this);
                }
            });

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
                } else if (!validatePassword(this.value)) {
                    showError(this, 'Password must be at least 6 characters');
                } else {
                    showSuccess(this);
                }

                // Also validate confirm password when password changes
                if (confirmPasswordInput.value) {
                    confirmPasswordInput.dispatchEvent(new Event('input'));
                }
            });

            confirmPasswordInput.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    resetValidation(this);
                } else if (!passwordsMatch(passwordInput.value, this.value)) {
                    showError(this, 'Passwords do not match');
                } else {
                    showSuccess(this);
                }
            });

            gradeSelect.addEventListener('change', function() {
                if (this.value === '') {
                    resetValidation(this);
                } else {
                    showSuccess(this);
                }
            });

            termsCheckbox.addEventListener('change', function() {
                resetValidation(this);
            });