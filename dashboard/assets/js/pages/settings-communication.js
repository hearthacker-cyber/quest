// Custom JavaScript for Communication Settings Page

$(document).ready(function() {
    // Initialize form validation
    initializeFormValidation();

    // Password visibility toggle
    $('#togglePassword').on('click', function() {
        togglePasswordVisibility('smtpPassword', $(this));
    });

    $('#toggleApiKey').on('click', function() {
        togglePasswordVisibility('apiKey', $(this));
    });

    $('#toggleApiSecret').on('click', function() {
        togglePasswordVisibility('apiSecret', $(this));
    });

    // Test Email Configuration
    $('#testEmailConfig').on('click', function() {
        testEmailConfiguration();
    });

    // Test SMS Configuration
    $('#testSmsConfig').on('click', function() {
        testSmsConfiguration();
    });

    // Save All Settings
    $('#saveAllSettings').on('click', function() {
        saveAllSettings();
    });

    // Quick Actions
    $('#validateConfig').on('click', function() {
        validateAllConfigurations();
    });

    $('#testAllNotifications').on('click', function() {
        testAllNotifications();
    });

    $('#resetToDefaults').on('click', function() {
        resetToDefaultSettings();
    });

    $('#viewLogs').on('click', function() {
        viewCommunicationLogs();
    });

    // SMS Provider change handler
    $('#smsProvider').on('change', function() {
        updateSmsProviderFields();
    });

    // Enable/disable handlers
    $('#emailEnabled').on('change', function() {
        toggleEmailSettings($(this).is(':checked'));
    });

    $('#smsEnabled').on('change', function() {
        toggleSmsSettings($(this).is(':checked'));
    });

    // Notification checkbox handlers
    $('.notification-checkbox').on('change', function() {
        updateNotificationSettings();
    });

    // Initialize settings state
    initializeSettingsState();
});

// Initialize form validation
function initializeFormValidation() {
    // Email configuration form validation
    const emailForm = document.getElementById('emailConfigForm');
    emailForm.addEventListener('submit', function(event) {
        if (!emailForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        emailForm.classList.add('was-validated');
    }, false);

    // SMS configuration form validation
    const smsForm = document.getElementById('smsConfigForm');
    smsForm.addEventListener('submit', function(event) {
        if (!smsForm.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        smsForm.classList.add('was-validated');
    }, false);
}

// Toggle password visibility
function togglePasswordVisibility(fieldId, button) {
    const field = $('#' + fieldId);
    const icon = button.find('i');

    if (field.attr('type') === 'password') {
        field.attr('type', 'text');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
        button.tooltip('hide').attr('title', 'Hide password').tooltip('show');
    } else {
        field.attr('type', 'password');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
        button.tooltip('hide').attr('title', 'Show password').tooltip('show');
    }
}

// Test Email Configuration
function testEmailConfiguration() {
    const btn = $('#testEmailConfig');
    const originalText = btn.html();

    // Validate form first
    const emailForm = document.getElementById('emailConfigForm');
    if (!emailForm.checkValidity()) {
        emailForm.classList.add('was-validated');
        showAlert('Please fix the validation errors before testing.', 'warning');
        return;
    }

    btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Testing...');
    btn.prop('disabled', true);

    // Simulate API call
    setTimeout(() => {
        const isSuccess = Math.random() > 0.2; // 80% success rate for demo

        if (isSuccess) {
            showAlert('Email configuration test successful! Test email sent.', 'success');
        } else {
            showAlert('Email configuration test failed. Please check your settings.', 'danger');
        }

        btn.html(originalText);
        btn.prop('disabled', false);
    }, 2000);
}

// Test SMS Configuration
function testSmsConfiguration() {
    const btn = $('#testSmsConfig');
    const originalText = btn.html();

    // Validate form first
    const smsForm = document.getElementById('smsConfigForm');
    if (!smsForm.checkValidity()) {
        smsForm.classList.add('was-validated');
        showAlert('Please fix the validation errors before testing.', 'warning');
        return;
    }

    const testNumber = $('#smsTestNumber').val();
    if (!testNumber) {
        showAlert('Please enter a test phone number.', 'warning');
        return;
    }

    btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Testing...');
    btn.prop('disabled', true);

    // Simulate API call
    setTimeout(() => {
        const isSuccess = Math.random() > 0.3; // 70% success rate for demo

        if (isSuccess) {
            showAlert(`SMS configuration test successful! Test message sent to ${testNumber}.`, 'success');
        } else {
            showAlert('SMS configuration test failed. Please check your settings and balance.', 'danger');
        }

        btn.html(originalText);
        btn.prop('disabled', false);
    }, 2000);
}

// Save All Settings
function saveAllSettings() {
    const btn = $('#saveAllSettings');
    const originalText = btn.html();

    // Validate both forms
    const emailForm = document.getElementById('emailConfigForm');
    const smsForm = document.getElementById('smsConfigForm');

    let isValid = true;

    if (!emailForm.checkValidity()) {
        emailForm.classList.add('was-validated');
        isValid = false;
    }

    if (!smsForm.checkValidity()) {
        smsForm.classList.add('was-validated');
        isValid = false;
    }

    if (!isValid) {
        showAlert('Please fix the validation errors before saving.', 'warning');
        return;
    }

    btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Saving...');
    btn.prop('disabled', true);

    // Collect all settings data
    const settingsData = {
        email: {
            smtpHost: $('#smtpHost').val(),
            smtpPort: $('#smtpPort').val(),
            smtpUsername: $('#smtpUsername').val(),
            smtpPassword: $('#smtpPassword').val(),
            fromName: $('#fromName').val(),
            fromEmail: $('#fromEmail').val(),
            encryption: $('#encryption').val(),
            enabled: $('#emailEnabled').is(':checked')
        },
        sms: {
            provider: $('#smsProvider').val(),
            apiKey: $('#apiKey').val(),
            apiSecret: $('#apiSecret').val(),
            senderId: $('#senderId').val(),
            enabled: $('#smsEnabled').is(':checked')
        },
        notifications: getNotificationSettings()
    };

    // Simulate API call
    setTimeout(() => {
        // In real application, this would be an API call to save settings
        console.log('Saving settings:', settingsData);

        showAlert('All settings saved successfully!', 'success');
        btn.html(originalText);
        btn.prop('disabled', false);
    }, 1500);
}

// Get notification settings
function getNotificationSettings() {
    const notifications = {};
    $('.notification-checkbox').each(function() {
        const id = $(this).attr('id');
        const type = $(this).data('type');
        const event = id.replace(type, '').replace(/([A-Z])/g, '_$1').toLowerCase();
        notifications[event] = {
            email: type === 'email' ? $(this).is(':checked') : false,
            sms: type === 'sms' ? $(this).is(':checked') : false
        };
    });
    return notifications;
}

// Update SMS provider fields based on selection
function updateSmsProviderFields() {
    const provider = $('#smsProvider').val();

    // Reset all provider-specific classes
    $('#smsConfigForm').removeClass('provider-twilio provider-msg91 provider-textlocal provider-fast2sms');

    // Add provider-specific class
    if (provider) {
        $('#smsConfigForm').addClass(`provider-${provider}`);
    }

    // Update field requirements based on provider
    switch (provider) {
        case 'twilio':
            $('#apiSecret').prop('required', true);
            break;
        case 'msg91':
            $('#apiSecret').prop('required', false);
            break;
        case 'textlocal':
            $('#apiSecret').prop('required', true);
            break;
        case 'fast2sms':
            $('#apiSecret').prop('required', false);
            break;
        default:
            $('#apiSecret').prop('required', false);
    }
}

// Toggle email settings based on enable/disable
function toggleEmailSettings(isEnabled) {
    const fields = ['#smtpHost', '#smtpPort', '#smtpUsername', '#smtpPassword', '#fromName', '#fromEmail', '#encryption'];

    fields.forEach(field => {
        $(field).prop('disabled', !isEnabled);
    });

    $('#testEmailConfig').prop('disabled', !isEnabled);

    // Also disable email notification checkboxes
    $('.notification-checkbox[data-type="email"]').prop('disabled', !isEnabled);

    if (!isEnabled) {
        showAlert('Email notifications have been disabled.', 'info');
    } else {
        showAlert('Email notifications have been enabled.', 'success');
    }
}

// Toggle SMS settings based on enable/disable
function toggleSmsSettings(isEnabled) {
    const fields = ['#smsProvider', '#apiKey', '#apiSecret', '#senderId', '#smsTestNumber'];

    fields.forEach(field => {
        $(field).prop('disabled', !isEnabled);
    });

    $('#testSmsConfig').prop('disabled', !isEnabled);

    // Also disable SMS notification checkboxes
    $('.notification-checkbox[data-type="sms"]').prop('disabled', !isEnabled);

    if (!isEnabled) {
        showAlert('SMS notifications have been disabled.', 'info');
    } else {
        showAlert('SMS notifications have been enabled.', 'success');
    }
}

// Update notification settings
function updateNotificationSettings() {
    const enabledEmailNotifications = $('.notification-checkbox[data-type="email"]:checked').length;
    const enabledSmsNotifications = $('.notification-checkbox[data-type="sms"]:checked').length;

    // Update counters or indicators if needed
    console.log(`Email notifications enabled: ${enabledEmailNotifications}`);
    console.log(`SMS notifications enabled: ${enabledSmsNotifications}`);
}

// Validate all configurations
function validateAllConfigurations() {
    const btn = $('#validateConfig');
    const originalText = btn.html();

    btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Validating...');
    btn.prop('disabled', true);

    // Simulate validation process
    setTimeout(() => {
        const emailValid = validateEmailConfiguration();
        const smsValid = validateSmsConfiguration();

        if (emailValid && smsValid) {
            showAlert('All configurations validated successfully!', 'success');
        } else if (!emailValid && !smsValid) {
            showAlert('Both email and SMS configurations have issues.', 'danger');
        } else if (!emailValid) {
            showAlert('Email configuration has issues. SMS configuration is valid.', 'warning');
        } else {
            showAlert('SMS configuration has issues. Email configuration is valid.', 'warning');
        }

        btn.html(originalText);
        btn.prop('disabled', false);
    }, 2000);
}

// Validate email configuration
function validateEmailConfiguration() {
    // Simple validation logic
    const host = $('#smtpHost').val();
    const port = $('#smtpPort').val();
    const username = $('#smtpUsername').val();

    return host && port && username && host.includes('.');
}

// Validate SMS configuration
function validateSmsConfiguration() {
    const provider = $('#smsProvider').val();
    const apiKey = $('#apiKey').val();
    const senderId = $('#senderId').val();

    return provider && apiKey && senderId;
}

// Test all notifications
function testAllNotifications() {
    const btn = $('#testAllNotifications');
    const originalText = btn.html();

    btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Testing All...');
    btn.prop('disabled', true);

    // Simulate testing process
    setTimeout(() => {
        const emailEnabled = $('#emailEnabled').is(':checked');
        const smsEnabled = $('#smsEnabled').is(':checked');

        let message = 'Test results: ';
        const results = [];

        if (emailEnabled) {
            results.push('Email: ✓');
        }

        if (smsEnabled) {
            results.push('SMS: ✓');
        }

        if (results.length === 0) {
            message = 'No notification methods are enabled.';
        } else {
            message += results.join(', ');
        }

        showAlert(message, 'info');
        btn.html(originalText);
        btn.prop('disabled', false);
    }, 2500);
}

// Reset to default settings
function resetToDefaultSettings() {
    if (confirm('Are you sure you want to reset all settings to default? This action cannot be undone.')) {
        // Reset email settings
        $('#smtpHost').val('smtp.gmail.com');
        $('#smtpPort').val('587');
        $('#smtpUsername').val('noreply@foxia.com');
        $('#smtpPassword').val('encryptedpassword123');
        $('#fromName').val('Foxia Education');
        $('#fromEmail').val('noreply@foxia.com');
        $('#encryption').val('tls');
        $('#emailEnabled').prop('checked', true);

        // Reset SMS settings
        $('#smsProvider').val('twilio');
        $('#apiKey').val('sk_encryptedapikey12345');
        $('#apiSecret').val('encryptedsecret123');
        $('#senderId').val('FOXIAE');
        $('#smsEnabled').prop('checked', false);

        // Reset notification settings
        $('.notification-checkbox[data-type="email"]').prop('checked', true);
        $('.notification-checkbox[data-type="sms"]').prop('checked', false);

        // Update UI state
        updateSmsProviderFields();
        toggleEmailSettings(true);
        toggleSmsSettings(false);

        showAlert('All settings have been reset to default values.', 'success');
    }
}

// View communication logs
function viewCommunicationLogs() {
    showAlert('This would open the communication logs page in a real application.', 'info');
}

// Initialize settings state
function initializeSettingsState() {
    // Set initial state based on enabled/disabled checkboxes
    toggleEmailSettings($('#emailEnabled').is(':checked'));
    toggleSmsSettings($('#smsEnabled').is(':checked'));

    // Initialize SMS provider fields
    updateSmsProviderFields();

    // Initialize tooltips
    $('[title]').tooltip({
        trigger: 'hover',
        placement: 'top'
    });
}

// Helper function to show alerts
function showAlert(message, type) {
    const alertClass = `alert-${type}`;
    const iconClass = {
        'success': 'fa-check-circle',
        'error': 'fa-exclamation-triangle',
        'warning': 'fa-exclamation-circle',
        'info': 'fa-info-circle',
        'danger': 'fa-times-circle'
    }[type] || 'fa-info-circle';

    const alertHtml = `
        <div class="alert ${alertClass} alert-dismissible fade show alert-toast" role="alert">
            <i class="fas ${iconClass} me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `;

    // Remove existing alerts
    $('.alert-toast').remove();

    // Add new alert
    $('body').append(alertHtml);

    // Auto remove after 5 seconds
    setTimeout(() => {
        $('.alert-toast').alert('close');
    }, 5000);
}