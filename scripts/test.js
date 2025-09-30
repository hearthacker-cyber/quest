// Test Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Test page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // State variables
    let testState = 'ready'; // ready, instructions, active, completed
    let currentQuestion = 1;
    let totalQuestions = 10;
    let timeLeft = 20 * 60; // 20 minutes in seconds
    let timerInterval = null;
    let userAnswers = {};
    let flaggedQuestions = new Set();

    // DOM Elements
    const startTestBtn = document.getElementById('start-test-btn');
    const viewInstructionsBtn = document.getElementById('view-instructions-btn');
    const beginTestBtn = document.getElementById('begin-test-btn');
    const submitTestBtn = document.getElementById('submit-test-btn');
    const reviewBtn = document.getElementById('review-btn');
    const flagBtn = document.getElementById('flag-btn');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const reviewAnswersBtn = document.getElementById('review-answers-btn');
    const newTestBtn = document.getElementById('new-test-btn');
    const practiceModeBtn = document.getElementById('practice-mode-btn');

    const instructionsSection = document.getElementById('instructions-section');
    const activeTestSection = document.getElementById('active-test-section');
    const resultsSection = document.getElementById('results-section');

    const testTimer = document.getElementById('test-timer');
    const timerProgress = document.getElementById('timer-progress');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');
    const timeLeftEl = document.getElementById('time-left');

    const currentQuestionEl = document.getElementById('current-question');
    const questionProgressBar = document.getElementById('question-progress-bar');
    const answeredCountEl = document.getElementById('answered-count');
    const flaggedCountEl = document.getElementById('flagged-count');

    const optionItems = document.querySelectorAll('.option-item');
    const questionNumbers = document.querySelectorAll('.question-number');

    // Event Listeners
    startTestBtn.addEventListener('click', showInstructions);
    viewInstructionsBtn.addEventListener('click', showInstructions);
    beginTestBtn.addEventListener('click', startTest);
    submitTestBtn.addEventListener('click', submitTest);
    reviewBtn.addEventListener('click', reviewAllQuestions);
    flagBtn.addEventListener('click', toggleFlagQuestion);
    prevBtn.addEventListener('click', goToPreviousQuestion);
    nextBtn.addEventListener('click', goToNextQuestion);
    reviewAnswersBtn.addEventListener('click', reviewAnswers);
    newTestBtn.addEventListener('click', startNewTest);
    practiceModeBtn.addEventListener('click', goToPracticeMode);

    // Option selection functionality
    optionItems.forEach(item => {
        item.addEventListener('click', function() {
            if (testState !== 'active') return;

            // Remove selected class from all options in current question
            const currentOptions = document.querySelectorAll('.option-item');
            currentOptions.forEach(opt => {
                opt.classList.remove('selected');
            });

            // Add selected class to clicked option
            this.classList.add('selected');

            // Save answer
            userAnswers[currentQuestion] = this.querySelector('div').textContent.trim();
            updateQuestionState(currentQuestion, 'answered');
            updateSummary();

            console.log('Question', currentQuestion, 'answered:', userAnswers[currentQuestion]);
        });
    });

    // Question number click functionality
    questionNumbers.forEach(number => {
        number.addEventListener('click', function() {
            if (testState !== 'active') return;

            const questionNum = parseInt(this.getAttribute('data-question'));
            goToQuestion(questionNum);
        });
    });

    // Functions
    function showInstructions() {
        instructionsSection.style.display = 'block';
        testState = 'instructions';

        // Scroll to instructions
        instructionsSection.scrollIntoView({ behavior: 'smooth' });
    }

    function startTest() {
        testState = 'active';
        instructionsSection.style.display = 'none';
        activeTestSection.style.display = 'block';
        resultsSection.style.display = 'none';

        // Start timer
        startTimer();

        // Initialize first question
        goToQuestion(1);

        // Scroll to test
        activeTestSection.scrollIntoView({ behavior: 'smooth' });

        console.log('Test started!');
    }

    function startTimer() {
        updateTimerDisplay();

        timerInterval = setInterval(() => {
            timeLeft--;
            updateTimerDisplay();

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                autoSubmitTest();
            }

            // Warning when 5 minutes left
            if (timeLeft === 5 * 60) {
                testTimer.classList.add('warning');
                showAlert('⏰ 5 minutes remaining!', 'warning');
            }

            // Critical when 1 minute left
            if (timeLeft === 60) {
                showAlert('🚨 1 minute remaining! Finish up!', 'danger');
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        minutesEl.textContent = minutes.toString().padStart(2, '0');
        secondsEl.textContent = seconds.toString().padStart(2, '0');
        timeLeftEl.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

        // Update progress bar
        const totalTime = 20 * 60;
        const progressPercent = (timeLeft / totalTime) * 100;
        timerProgress.style.width = `${progressPercent}%`;
    }

    function goToQuestion(questionNum) {
        if (questionNum < 1 || questionNum > totalQuestions) return;

        currentQuestion = questionNum;
        updateQuestionDisplay();
        updateNavigation();
    }

    function goToPreviousQuestion() {
        if (currentQuestion > 1) {
            goToQuestion(currentQuestion - 1);
        }
    }

    function goToNextQuestion() {
        if (currentQuestion < totalQuestions) {
            goToQuestion(currentQuestion + 1);
        }
    }

    function updateQuestionDisplay() {
        // Update current question indicator
        currentQuestionEl.textContent = currentQuestion;

        // Update progress bar
        const progressPercent = (currentQuestion / totalQuestions) * 100;
        questionProgressBar.style.width = `${progressPercent}%`;

        // Update question numbers
        questionNumbers.forEach(number => {
            number.classList.remove('current');
            if (parseInt(number.getAttribute('data-question')) === currentQuestion) {
                number.classList.add('current');
            }
        });

        // Load question data (in real app, this would fetch from server)
        loadQuestionData(currentQuestion);
    }

    function loadQuestionData(questionNum) {
        // In a real application, this would fetch question data from a server
        // For demo purposes, we'll just reset the options and load saved answer

        // Reset all options
        optionItems.forEach(opt => {
            opt.classList.remove('selected');
        });

        // Load saved answer if exists
        if (userAnswers[questionNum]) {
            optionItems.forEach(opt => {
                if (opt.querySelector('div').textContent.trim() === userAnswers[questionNum]) {
                    opt.classList.add('selected');
                }
            });
        }

        // Update flag button state
        if (flaggedQuestions.has(questionNum)) {
            flagBtn.innerHTML = '<i class="fas fa-flag me-2"></i>Unflag Question';
            flagBtn.classList.add('btn-warning');
        } else {
            flagBtn.innerHTML = '<i class="far fa-flag me-2"></i>Flag Question';
            flagBtn.classList.remove('btn-warning');
        }
    }

    function toggleFlagQuestion() {
        if (flaggedQuestions.has(currentQuestion)) {
            flaggedQuestions.delete(currentQuestion);
            flagBtn.innerHTML = '<i class="far fa-flag me-2"></i>Flag Question';
            flagBtn.classList.remove('btn-warning');
            updateQuestionState(currentQuestion, 'unflagged');
        } else {
            flaggedQuestions.add(currentQuestion);
            flagBtn.innerHTML = '<i class="fas fa-flag me-2"></i>Unflag Question';
            flagBtn.classList.add('btn-warning');
            updateQuestionState(currentQuestion, 'flagged');
            showAlert('Question flagged for review ⚑', 'info');
        }
        updateSummary();
    }

    function updateQuestionState(questionNum, state) {
        const questionElement = document.querySelector(`.question-number[data-question="${questionNum}"]`);

        questionElement.classList.remove('answered', 'flagged');

        if (state === 'answered') {
            questionElement.classList.add('answered');
        } else if (state === 'flagged') {
            questionElement.classList.add('flagged');
        } else if (state === 'unflagged') {
            // Keep answered state if it was answered
            if (userAnswers[questionNum]) {
                questionElement.classList.add('answered');
            }
        }
    }

    function updateNavigation() {
        // Update previous button
        prevBtn.disabled = currentQuestion === 1;

        // Update next button text for last question
        if (currentQuestion === totalQuestions) {
            nextBtn.innerHTML = 'Review <i class="fas fa-search ms-2"></i>';
        } else {
            nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right ms-2"></i>';
        }
    }

    function updateSummary() {
        const answeredCount = Object.keys(userAnswers).length;
        const flaggedCount = flaggedQuestions.size;

        answeredCountEl.textContent = answeredCount;
        flaggedCountEl.textContent = flaggedCount;
    }

    function reviewAllQuestions() {
        showAlert('📋 Review mode activated. Use question navigator to check all questions.', 'info');
    }

    function submitTest() {
        if (confirm('Are you sure you want to submit your test? You cannot change answers after submission.')) {
            clearInterval(timerInterval);
            showResults();
        }
    }

    function autoSubmitTest() {
        showAlert('⏰ Time\'s up! Test submitted automatically.', 'warning');
        showResults();
    }

    function showResults() {
        testState = 'completed';
        activeTestSection.style.display = 'none';
        resultsSection.style.display = 'block';

        // Calculate score (demo - in real app, this would be from server)
        const score = calculateScore();

        // Update results display
        document.querySelector('.score-value').textContent = `${score}%`;

        // Scroll to results
        resultsSection.scrollIntoView({ behavior: 'smooth' });

        console.log('Test completed! Score:', score);
    }

    function calculateScore() {
        // Demo scoring - in real app, this would compare with correct answers
        const answeredCount = Object.keys(userAnswers).length;
        const correctCount = Math.floor(answeredCount * 0.8); // Demo: 80% correct

        return Math.round((correctCount / totalQuestions) * 100);
    }

    function reviewAnswers() {
        showAlert('🔍 Answer review feature would show detailed feedback here.', 'info');
    }

    function startNewTest() {
        if (confirm('Start a new test? Current progress will be lost.')) {
            // Reset state
            testState = 'ready';
            currentQuestion = 1;
            timeLeft = 20 * 60;
            userAnswers = {};
            flaggedQuestions = new Set();

            // Reset UI
            resultsSection.style.display = 'none';
            activeTestSection.style.display = 'none';
            instructionsSection.style.display = 'none';

            // Reset question states
            questionNumbers.forEach(number => {
                number.classList.remove('current', 'answered', 'flagged');
            });

            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });

            showAlert('New test ready! Click "Start Test" to begin.', 'info');
        }
    }

    function goToPracticeMode() {
        showAlert('📚 Redirecting to practice mode for weak areas...', 'info');
        // In real app: window.location.href = 'practice.php';
    }

    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.test-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} test-alert alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        alertDiv.style.cssText = `
            position: fixed;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            min-width: 300px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        `;

        document.body.appendChild(alertDiv);

        // Auto remove after 4 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 4000);
    }

    // Initialize
    updateSummary();
    console.log('Test page initialized successfully!');
});