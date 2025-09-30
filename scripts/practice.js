// Practice Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Practice page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // State variables
    let currentQuestion = 3;
    let totalQuestions = 10;
    let correctAnswers = 2;
    let streakCount = 2;
    let selectedOption = null;
    let answerChecked = false;

    // DOM Elements
    const optionItems = document.querySelectorAll('.option-item');
    const checkBtn = document.getElementById('check-btn');
    const nextBtn = document.getElementById('next-btn');
    const prevBtn = document.getElementById('prev-btn');
    const hintBtn = document.getElementById('hint-btn');
    const explainBtn = document.getElementById('explain-btn');
    const restartBtn = document.getElementById('restart-btn');
    const answerBox = document.getElementById('answer-box');
    const currentQuestionEl = document.getElementById('current-question');
    const correctCountEl = document.getElementById('correct-count');
    const streakCountEl = document.getElementById('streak-count');
    const totalAnsweredEl = document.getElementById('total-answered');
    const progressBar = document.getElementById('question-progress-bar');

    // Option selection functionality
    optionItems.forEach(item => {
        item.addEventListener('click', function() {
            if (answerChecked) return;

            // Remove selected class from all options
            optionItems.forEach(opt => {
                opt.classList.remove('selected');
                opt.style.transform = '';
            });

            // Add selected class to clicked option
            this.classList.add('selected');
            this.style.transform = 'scale(1.05)';
            selectedOption = this;

            console.log('Option selected:', this.querySelector('div').textContent);
        });
    });

    // Check Answer button functionality
    checkBtn.addEventListener('click', function() {
        if (!selectedOption) {
            showAlert('Please select an answer first!', 'warning');
            return;
        }

        const isCorrect = selectedOption.getAttribute('data-correct') === 'true';

        if (isCorrect) {
            showCorrectFeedback();
            showAlert('Correct! Well done! 🎉', 'success');
            correctAnswers++;
            streakCount++;
            updateStats();
        } else {
            showAlert('Not quite right. Try again! 💡', 'danger');
            // Highlight correct answer
            optionItems.forEach(opt => {
                if (opt.getAttribute('data-correct') === 'true') {
                    opt.classList.add('correct-highlight');
                }
            });
            streakCount = 0;
            updateStats();
        }

        answerChecked = true;
        checkBtn.disabled = true;
        console.log('Answer checked - Correct:', isCorrect);
    });

    // Next Question button
    nextBtn.addEventListener('click', function() {
        if (currentQuestion < totalQuestions) {
            currentQuestion++;
            resetQuestion();
            updateProgress();
            console.log('Moving to next question:', currentQuestion);
        } else {
            showAlert('Congratulations! You completed all questions! 🏆', 'success');
        }
    });

    // Previous Question button
    prevBtn.addEventListener('click', function() {
        if (currentQuestion > 1) {
            currentQuestion--;
            resetQuestion();
            updateProgress();
            console.log('Moving to previous question:', currentQuestion);
        }
    });

    // Hint button
    hintBtn.addEventListener('click', function() {
        showAlert('💡 Hint: Think about food categories and what group carrots belong to.', 'info');
    });

    // Explanation button
    explainBtn.addEventListener('click', function() {
        showAlert('📚 Explanation: Apples are a type of fruit, just like carrots are a type of vegetable. Both are specific examples of broader food categories.', 'info');
    });

    // Restart button
    restartBtn.addEventListener('click', function() {
        if (confirm('Are you sure you want to restart this practice session?')) {
            currentQuestion = 1;
            correctAnswers = 0;
            streakCount = 0;
            resetQuestion();
            updateProgress();
            updateStats();
            showAlert('Session restarted! 🔄', 'info');
        }
    });

    // Function to show correct feedback
    function showCorrectFeedback() {
        answerBox.innerHTML = `
            <i class="fas fa-seedling fa-3x" style="color: #27ae60;"></i>
            <div class="image-label">Vegetable</div>
            <div class="correct-badge">
                <i class="fas fa-check-circle"></i> Correct!
            </div>
        `;
        answerBox.style.borderColor = '#27ae60';
        answerBox.style.background = 'rgba(39, 174, 96, 0.1)';
        answerBox.style.position = 'relative';
    }

    // Function to reset question state
    function resetQuestion() {
        // Reset options
        optionItems.forEach(opt => {
            opt.classList.remove('selected', 'correct-highlight');
            opt.style.transform = '';
        });

        // Reset answer box
        answerBox.innerHTML = `
            <div class="question-mark">?</div>
            <div class="image-label">Your Answer</div>
        `;
        answerBox.style.borderColor = '';
        answerBox.style.background = '';

        // Reset state
        selectedOption = null;
        answerChecked = false;
        checkBtn.disabled = false;
    }

    // Function to update progress
    function updateProgress() {
        currentQuestionEl.textContent = currentQuestion;
        const progressPercent = (currentQuestion / totalQuestions) * 100;
        progressBar.style.width = `${progressPercent}%`;
    }

    // Function to update stats
    function updateStats() {
        correctCountEl.textContent = correctAnswers;
        streakCountEl.textContent = streakCount;
        totalAnsweredEl.textContent = currentQuestion - 1;
    }

    // Function to show alerts
    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.practice-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} practice-alert alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(alertDiv);

        // Auto remove after 4 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 4000);
    }

    // Initialize progress bars animation
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 500);
    });

    console.log('All event listeners attached successfully!');
});