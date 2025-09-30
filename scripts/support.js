// Support Page Specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS for support page
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Initialize support functionality
    initLiveChat();
    initStatusUpdates();
    initIssueSolutions();
    initSupportOptions();
    addFloatingElements();

    // Initialize maintenance schedule
    initMaintenanceSchedule();
});

// Live Chat Functionality
function initLiveChat() {
    const chatButtons = document.querySelectorAll('.start-chat-btn');

    chatButtons.forEach(button => {
        button.addEventListener('click', function() {
            openLiveChat();
        });
    });
}

function openLiveChat() {
    // Create chat modal
    const chatModal = document.createElement('div');
    chatModal.className = 'modal fade';
    chatModal.id = 'chatModal';
    chatModal.innerHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="chat-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-comments me-2"></i>
                            Live Chat Support
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="mt-2">
                        <small>Connected to Support Agent • Average response time: 2 minutes</small>
                    </div>
                </div>
                <div class="chat-body">
                    <div class="chat-messages">
                        <div class="message agent-message">
                            <div class="message-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-text">
                                    Hello! I'm QUEST Support Bot. I can help you with common issues or connect you with a live agent.
                                </div>
                                <div class="message-time">Just now</div>
                            </div>
                        </div>
                        <div class="message agent-message">
                            <div class="message-avatar">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="message-content">
                                <div class="message-text">
                                    How can I help you today?
                                </div>
                                <div class="quick-options mt-3">
                                    <button class="btn btn-sm btn-outline-primary me-2 quick-option" data-option="login">Login Issues</button>
                                    <button class="btn btn-sm btn-outline-primary me-2 quick-option" data-option="technical">Technical Problems</button>
                                    <button class="btn btn-sm btn-outline-primary quick-option" data-option="billing">Billing Questions</button>
                                </div>
                                <div class="message-time">Just now</div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-input">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Type your message..." id="chatInput">
                            <button class="btn btn-primary" id="sendMessage">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(chatModal);

    // Initialize modal
    const modal = new bootstrap.Modal(chatModal);
    modal.show();

    // Add chat functionality
    initChatFunctionality();

    // Remove modal on close
    chatModal.addEventListener('hidden.bs.modal', function() {
        chatModal.remove();
    });
}

function initChatFunctionality() {
    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendMessage');
    const chatMessages = document.querySelector('.chat-messages');

    if (sendButton && chatInput) {
        sendButton.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    // Quick option buttons
    const quickOptions = document.querySelectorAll('.quick-option');
    quickOptions.forEach(option => {
        option.addEventListener('click', function() {
            const optionType = this.getAttribute('data-option');
            handleQuickOption(optionType);
        });
    });
}

function sendMessage() {
    const chatInput = document.getElementById('chatInput');
    const chatMessages = document.querySelector('.chat-messages');

    if (!chatInput.value.trim()) return;

    // Add user message
    const userMessage = document.createElement('div');
    userMessage.className = 'message user-message';
    userMessage.innerHTML = `
        <div class="message-content">
            <div class="message-text">${chatInput.value}</div>
            <div class="message-time">Just now</div>
        </div>
        <div class="message-avatar">
            <i class="fas fa-user"></i>
        </div>
    `;

    chatMessages.appendChild(userMessage);

    // Simulate agent response
    setTimeout(() => {
        const agentResponse = document.createElement('div');
        agentResponse.className = 'message agent-message';
        agentResponse.innerHTML = `
            <div class="message-avatar">
                <i class="fas fa-robot"></i>
            </div>
            <div class="message-content">
                <div class="message-text">
                    I understand you're asking about "${chatInput.value}". Let me help you with that. Our support team can provide detailed assistance. Would you like me to connect you with a live agent?
                </div>
                <div class="message-time">Just now</div>
            </div>
        `;

        chatMessages.appendChild(agentResponse);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }, 1000);

    chatInput.value = '';
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function handleQuickOption(optionType) {
    const chatInput = document.getElementById('chatInput');
    const messages = {
        'login': 'I need help with login issues',
        'technical': 'I\'m experiencing technical problems',
        'billing': 'I have questions about billing'
    };

    if (chatInput && messages[optionType]) {
        chatInput.value = messages[optionType];
        sendMessage();
    }
}

// Status Updates
function initStatusUpdates() {
    const refreshButton = document.querySelector('.refresh-status-btn');
    const lastUpdated = document.getElementById('lastUpdated');

    if (refreshButton && lastUpdated) {
        refreshButton.addEventListener('click', function() {
            refreshSystemStatus();
        });
    }

    // Auto-refresh every 5 minutes
    setInterval(refreshSystemStatus, 300000);
}

function refreshSystemStatus() {
    const refreshButton = document.querySelector('.refresh-status-btn');
    const lastUpdated = document.getElementById('lastUpdated');

    if (refreshButton) {
        // Show loading state
        const originalHTML = refreshButton.innerHTML;
        refreshButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Refreshing...';
        refreshButton.disabled = true;

        // Simulate API call
        setTimeout(() => {
            // Update timestamp
            if (lastUpdated) {
                lastUpdated.textContent = new Date().toLocaleTimeString();
            }

            // Restore button
            refreshButton.innerHTML = '<i class="fas fa-sync-alt"></i> Refresh';
            refreshButton.disabled = false;

            // Show success notification
            showNotification('System status updated successfully', 'success');
        }, 1500);
    }
}

// Issue Solutions
function initIssueSolutions() {
    const viewSolutionButtons = document.querySelectorAll('.view-solution-btn');

    viewSolutionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const issueCard = this.closest('.issue-card');
            const issueTitle = issueCard.querySelector('h5').textContent;
            viewDetailedSolution(issueTitle);
        });
    });
}

function viewDetailedSolution(issueTitle) {
    // In a real application, this would open a detailed solution page
    // For now, show a notification and scroll to FAQ section
    showNotification(`Opening detailed solution for: ${issueTitle}`, 'info');

    // Scroll to FAQ link in header
    const faqLink = document.querySelector('a[href="faq.php"]');
    if (faqLink) {
        // You could add specific anchor linking here
        window.location.href = 'faq.php';
    }
}

// Support Options
function initSupportOptions() {
    const callButtons = document.querySelectorAll('.call-support-btn');

    callButtons.forEach(button => {
        button.addEventListener('click', function() {
            const phoneNumber = '+1 (555) 123-4567';
            initiatePhoneCall(phoneNumber);
        });
    });
}

function initiatePhoneCall(phoneNumber) {
    // Show call confirmation
    const callConfirmed = confirm(`Call QUEST Support at ${phoneNumber}?`);

    if (callConfirmed) {
        // In a real application, this would initiate a phone call
        // For mobile devices, you could use tel: link
        showNotification(`Initiating call to ${phoneNumber}...`, 'info');

        // Track support call (for analytics)
        trackSupportInteraction('phone_call', phoneNumber);
    }
}

// Maintenance Schedule
function initMaintenanceSchedule() {
    // Add countdown to next maintenance
    const nextMaintenance = document.querySelector('.maintenance-item:first-child');
    if (nextMaintenance) {
        const maintenanceDate = new Date('2024-03-20T02:00:00');
        addMaintenanceCountdown(nextMaintenance, maintenanceDate);
    }
}

function addMaintenanceCountdown(element, maintenanceDate) {
    const countdownElement = document.createElement('div');
    countdownElement.className = 'maintenance-countdown mt-2';

    element.querySelector('.maintenance-date').appendChild(countdownElement);

    function updateCountdown() {
        const now = new Date();
        const timeDiff = maintenanceDate - now;

        if (timeDiff > 0) {
            const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            countdownElement.innerHTML = `
                <small class="text-warning">
                    <i class="fas fa-clock me-1"></i>
                    Starts in ${days}d ${hours}h
                </small>
            `;
        } else {
            countdownElement.innerHTML = `
                <small class="text-success">
                    <i class="fas fa-check me-1"></i>
                    Maintenance completed
                </small>
            `;
        }
    }

    updateCountdown();
    setInterval(updateCountdown, 60000); // Update every minute
}

// Support Analytics
function trackSupportInteraction(type, details) {
    // In a real application, you would send this to your analytics service
    console.log('Support Interaction:', {
        type: type,
        details: details,
        timestamp: new Date().toISOString(),
        page: 'support.php'
    });
}

// Notification System
function showNotification(message, type) {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.support-notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `support-notification alert alert-${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'} position-fixed`;
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

// Add Floating Elements
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

// Emergency Contact
function initEmergencyContact() {
    // Add emergency contact for critical issues
    const emergencyButton = document.createElement('button');
    emergencyButton.className = 'btn btn-danger position-fixed';
    emergencyButton.style.cssText = `
        bottom: 20px;
        left: 20px;
        z-index: 1000;
        border-radius: 50px;
        padding: 15px 25px;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    `;
    emergencyButton.innerHTML = '<i class="fas fa-life-ring me-2"></i>Emergency Support';
    emergencyButton.onclick = openEmergencySupport;

    document.body.appendChild(emergencyButton);
}

function openEmergencySupport() {
    // Show emergency contact options
    const emergencyNumbers = [
        { type: 'Critical Technical', number: '+1 (555) 123-EMER', available: '24/7' },
        { type: 'Billing Emergency', number: '+1 (555) 123-BILL', available: 'Mon-Fri 9am-9pm EST' },
        { type: 'Security Issues', number: '+1 (555) 123-SECU', available: '24/7' }
    ];

    let emergencyHTML = '<h5>Emergency Support Lines</h5>';
    emergencyNumbers.forEach(contact => {
        emergencyHTML += `
            <div class="emergency-contact mb-3 p-3 border rounded">
                <strong>${contact.type}</strong><br>
                <span class="text-warning">${contact.number}</span><br>
                <small class="text-muted">Available: ${contact.available}</small>
            </div>
        `;
    });

    emergencyHTML += '<p class="text-muted"><small>Use these numbers for critical issues requiring immediate attention.</small></p>';

    showNotification(emergencyHTML, 'info');
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add emergency contact button
    initEmergencyContact();
});