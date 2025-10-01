// General Settings JavaScript

$(document).ready(function() {
    // Form validation and submission
    const settingsForm = document.getElementById('generalSettingsForm');

    // File upload preview functionality
    function setupFileUploadPreview() {
        // Logo upload preview
        $('#logoUpload').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    showAlert('File size must be less than 2MB', 'danger');
                    $(this).val('');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#logoPreview .preview-container img').attr('src', e.target.result);
                    $('#logoPreview').show();
                }
                reader.readAsDataURL(file);
            }
        });

        // Favicon upload preview
        $('#faviconUpload').on('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > 500 * 1024) {
                    showAlert('Favicon size must be less than 500KB', 'danger');
                    $(this).val('');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#faviconPreview .preview-container img').attr('src', e.target.result);
                    $('#faviconPreview').show();
                }
                reader.readAsDataURL(file);
            }
        });

        // Remove logo
        $('#removeLogo').on('click', function() {
            $('#logoUpload').val('');
            $('#logoPreview .preview-container img').attr('src', '../assets/images/logo-dark.png');
            showAlert('Logo removed successfully', 'info');
        });

        // Remove favicon
        $('#removeFavicon').on('click', function() {
            $('#faviconUpload').val('');
            $('#faviconPreview .preview-container img').attr('src', '../assets/images/favicon.ico');
            showAlert('Favicon removed successfully', 'info');
        });
    }

    // Form submission handler
    function setupFormSubmission() {
        $('#generalSettingsForm').on('submit', function(e) {
            e.preventDefault();

            const form = $(this)[0];
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                showAlert('Please fill all required fields correctly', 'danger');
                return;
            }

            // Show loading state
            const saveBtn = $('#saveSettingsBtn');
            const originalText = saveBtn.html();
            saveBtn.prop('disabled', true).addClass('btn-loading').html('Saving...');

            // Simulate API call
            setTimeout(() => {
                // Process form data
                const formData = new FormData();
                formData.append('platformName', $('#platformName').val());
                formData.append('tagline', $('#tagline').val());
                formData.append('supportEmail', $('#supportEmail').val());
                formData.append('supportPhone', $('#supportPhone').val());
                formData.append('companyAddress', $('#companyAddress').val());
                formData.append('defaultLanguage', $('#defaultLanguage').val());
                formData.append('timeZone', $('#timeZone').val());
                formData.append('dateFormat', $('#dateFormat').val());
                formData.append('currency', $('#currency').val());
                formData.append('numberFormat', $('#numberFormat').val());
                formData.append('weekStart', $('#weekStart').val());

                // Append files if selected
                const logoFile = $('#logoUpload')[0].files[0];
                const faviconFile = $('#faviconUpload')[0].files[0];

                if (logoFile) formData.append('logo', logoFile);
                if (faviconFile) formData.append('favicon', faviconFile);

                // In real implementation, you would send formData to server
                console.log('Form data to be sent:', Object.fromEntries(formData));

                // Simulate success response
                saveBtn.removeClass('btn-loading').addClass('settings-saved');
                showAlert('Settings saved successfully!', 'success');

                // Reset button state
                setTimeout(() => {
                    saveBtn.prop('disabled', false).html(originalText).removeClass('settings-saved');
                    form.classList.remove('was-validated');
                }, 2000);

            }, 1500);
        });
    }

    // Reset to default settings
    function setupResetFunctionality() {
        $('#resetSettings').on('click', function() {
            if (confirm('Are you sure you want to reset all settings to default values? This action cannot be undone.')) {
                // Reset form values to default
                $('#platformName').val('Foxia Learning Platform');
                $('#tagline').val('Premium Multipurpose Learning & Assessment Platform for Students and Educators');
                $('#supportEmail').val('support@foxia.com');
                $('#supportPhone').val('+91 98765 43210');
                $('#supportHours').val('9:00 AM - 6:00 PM (Mon-Sat)');
                $('#companyAddress').val(`Foxia Education Solutions Pvt. Ltd.
123 Tech Park, Sector 62
Noida, Uttar Pradesh 201309
India`);
                $('#websiteUrl').val('https://foxia.com');
                $('#companyEmail').val('info@foxia.com');
                $('#defaultLanguage').val('en');
                $('#timeZone').val('Asia/Kolkata');
                $('#dateFormat').val('dd-mm-yyyy');
                $('#currency').val('INR');
                $('#numberFormat').val('en-IN');
                $('#weekStart').val('0');

                // Reset file inputs and previews
                $('#logoUpload').val('');
                $('#faviconUpload').val('');
                $('#logoPreview .preview-container img').attr('src', '../assets/images/logo-dark.png');
                $('#faviconPreview .preview-container img').attr('src', '../assets/images/favicon.ico');

                // Remove validation states
                settingsForm.classList.remove('was-validated');

                showAlert('Settings reset to default values', 'info');
            }
        });
    }

    // Alert notification system
    function showAlert(message, type = 'info') {
        const alertClass = `alert-${type}`;
        const alertId = 'settingsAlert';

        // Remove existing alert
        $(`#${alertId}`).remove();

        // Create new alert
        const alertHtml = `
            <div id="${alertId}" class="alert ${alertClass} alert-dismissible fade show position-fixed" 
                 style="top: 20px; right: 20px; z-index: 1060; min-width: 300px;">
                <i class="fas ${getAlertIcon(type)} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        $('body').append(alertHtml);

        // Auto remove after 5 seconds
        setTimeout(() => {
            $(`#${alertId}`).alert('close');
        }, 5000);
    }

    function getAlertIcon(type) {
        const icons = {
            'success': 'fa-check-circle',
            'danger': 'fa-exclamation-circle',
            'warning': 'fa-exclamation-triangle',
            'info': 'fa-info-circle'
        };
        return icons[type] || 'fa-info-circle';
    }

    // Real-time validation
    function setupRealTimeValidation() {
        // Email validation
        $('#supportEmail, #companyEmail').on('blur', function() {
            const email = $(this).val();
            if (email && !isValidEmail(email)) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // Phone validation
        $('#supportPhone').on('blur', function() {
            const phone = $(this).val();
            if (phone && !isValidPhone(phone)) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // URL validation
        $('#websiteUrl').on('blur', function() {
            const url = $(this).val();
            if (url && !isValidUrl(url)) {
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
    }

    // Validation helper functions
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
        return phoneRegex.test(phone.replace(/[\s\-\(\)]/g, ''));
    }

    function isValidUrl(url) {
        try {
            new URL(url);
            return true;
        } catch (_) {
            return false;
        }
    }

    // Settings preview functionality
    function setupSettingsPreview() {
        // Update preview based on settings changes
        $('#platformName').on('input', function() {
            $('#settingsPreviewTitle').text($(this).val() || 'Platform Name');
        });

        $('#tagline').on('input', function() {
            $('#settingsPreviewDescription').text($(this).val() || 'Platform description');
        });
    }

    // Initialize all functionality
    function init() {
        setupFileUploadPreview();
        setupFormSubmission();
        setupResetFunctionality();
        setupRealTimeValidation();
        setupSettingsPreview();

        console.log('General Settings page initialized');
    }

    // Initialize the page
    init();
});