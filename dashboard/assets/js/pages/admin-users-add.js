document.addEventListener('DOMContentLoaded', function() {
    // Role-specific field toggling
    const roleSelect = document.getElementById('role');
    const studentFields = document.getElementById('studentFields');
    const parentFields = document.getElementById('parentFields');
    const adminFields = document.getElementById('adminFields');

    roleSelect.addEventListener('change', function() {
        // Hide all fields first
        studentFields.style.display = 'none';
        parentFields.style.display = 'none';
        adminFields.style.display = 'none';

        // Show relevant fields based on role
        switch (this.value) {
            case 'student':
                studentFields.style.display = 'block';
                break;
            case 'parent':
                parentFields.style.display = 'block';
                break;
            case 'admin':
                adminFields.style.display = 'block';
                break;
        }
    });

    // Password generation
    const generatePasswordBtn = document.getElementById('generatePassword');
    const passwordField = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');

    generatePasswordBtn.addEventListener('click', function() {
        const password = generatePassword(12);
        passwordField.value = password;
        passwordField.type = 'text';
        togglePasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
    });

    // Password visibility toggle
    togglePasswordBtn.addEventListener('click', function() {
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            this.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordField.type = 'password';
            this.innerHTML = '<i class="fas fa-eye"></i>';
        }
    });

    // Form submission
    const addUserForm = document.getElementById('addUserForm');
    addUserForm.addEventListener('submit', function(e) {
        e.preventDefault();

        if (validateForm()) {
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Creating...';

            // Simulate API call
            setTimeout(() => {
                // Show success message
                showAlert('User created successfully! Welcome email has been sent.', 'success');

                // Reset form
                addUserForm.reset();
                studentFields.style.display = 'none';
                parentFields.style.display = 'none';
                adminFields.style.display = 'none';

                // Reset button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }, 2000);
        }
    });

    // Form validation
    function validateForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const role = document.getElementById('role').value;

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showAlert('Please enter a valid email address.', 'error');
            return false;
        }

        // Password validation
        if (password.length < 8) {
            showAlert('Password must be at least 8 characters long.', 'error');
            return false;
        }

        // Role validation
        if (!role) {
            showAlert('Please select a user role.', 'error');
            return false;
        }

        return true;
    }

    // Generate random password
    function generatePassword(length) {
        const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
        let password = "";
        for (let i = 0; i < length; i++) {
            password += charset.charAt(Math.floor(Math.random() * charset.length));
        }
        return password;
    }

    // Show alert message
    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlerts = document.querySelectorAll('.alert-dismissible');
        existingAlerts.forEach(alert => alert.remove());

        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';

        const alertHtml = `
                    <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                        <i class="fas ${icon} me-2"></i> ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;

        const pageTitle = document.querySelector('.page-title-box');
        pageTitle.insertAdjacentHTML('afterend', alertHtml);

        // Auto-remove success alerts after 5 seconds
        if (type === 'success') {
            setTimeout(() => {
                const alert = document.querySelector('.alert-success');
                if (alert) {
                    alert.remove();
                }
            }, 5000);
        }
    }
});