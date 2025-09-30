// Final Test Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    console.log('Final test page loaded - JavaScript is working!');

    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // State variables
    let currentState = 'overview'; // overview, instructions, active, results, sample
    let currentQuestion = 1;
    let totalQuestions = 45;
    let timeLeft = 60 * 60; // 60 minutes in seconds
    let timerInterval = null;
    let isPaused = false;
    let userAnswers = {};
    let flaggedQuestions = new Set();

    // DOM Elements
    const startFinalTestBtn = document.getElementById('start-final-test-btn');
    const viewSampleReportBtn = document.getElementById('view-sample-report-btn');
    const beginFinalTestBtn = document.getElementById('begin-final-test-btn');
    const backToOverviewBtn = document.getElementById('back-to-overview-btn');
    const submitAssessmentBtn = document.getElementById('submit-assessment-btn');
    const pauseBtn = document.getElementById('pause-btn');
    const prevQuestionBtn = document.getElementById('prev-question-btn');
    const nextQuestionBtn = document.getElementById('next-question-btn');
    const flagQuestionBtn = document.getElementById('flag-question-btn');
    const reviewAllBtn = document.getElementById('review-all-btn');
    const downloadReportBtn = document.getElementById('download-report-btn');
    const printCertificateBtn = document.getElementById('print-certificate-btn');
    const newAssessmentBtn = document.getElementById('new-assessment-btn');
    const closeSampleBtn = document.getElementById('close-sample-btn');
    const startFromSampleBtn = document.getElementById('start-from-sample-btn');

    const instructionsSection = document.getElementById('instructions-section');
    const activeAssessmentSection = document.getElementById('active-assessment-section');
    const resultsSection = document.getElementById('results-section');
    const sampleReportSection = document.getElementById('sample-report-section');

    const assessmentTimer = document.getElementById('assessment-timer');
    const assessmentMinutes = document.getElementById('assessment-minutes');
    const assessmentSeconds = document.getElementById('assessment-seconds');
    const currentQuestionEl = document.getElementById('current-question');
    const questionProgressBar = document.getElementById('question-progress-bar');

    const optionItems = document.querySelectorAll('.option-item');

    // Event Listeners
    startFinalTestBtn.addEventListener('click', showInstructions);
    viewSampleReportBtn.addEventListener('click', showSampleReport);
    beginFinalTestBtn.addEventListener('click', startAssessment);
    backToOverviewBtn.addEventListener('click', backToOverview);
    submitAssessmentBtn.addEventListener('click', submitAssessment);
    pauseBtn.addEventListener('click', togglePause);
    prevQuestionBtn.addEventListener('click', goToPreviousQuestion);
    nextQuestionBtn.addEventListener('click', goToNextQuestion);
    flagQuestionBtn.addEventListener('click', toggleFlagQuestion);
    reviewAllBtn.addEventListener('click', reviewAllQuestions);
    downloadReportBtn.addEventListener('click', downloadReport);
    printCertificateBtn.addEventListener('click', printCertificate);
    newAssessmentBtn.addEventListener('click', startNewAssessment);
    closeSampleBtn.addEventListener('click', closeSampleReport);
    startFromSampleBtn.addEventListener('click', startAssessmentFromSample);

    // Option selection functionality
    optionItems.forEach(item => {
        item.addEventListener('click', function() {
            if (currentState !== 'active' || isPaused) return;

            // Remove selected class from all options in current question
            const currentOptions = document.querySelectorAll('.option-item');
            currentOptions.forEach(opt => {
                opt.classList.remove('selected');
            });

            // Add selected class to clicked option
            this.classList.add('selected');

            // Save answer
            userAnswers[currentQuestion] = this.querySelector('div').textContent.trim();
            updateProgress();

            console.log('Question', currentQuestion, 'answered:', userAnswers[currentQuestion]);
        });
    });

    // Functions
    function showInstructions() {
        currentState = 'instructions';
        instructionsSection.style.display = 'block';
        activeAssessmentSection.style.display = 'none';
        resultsSection.style.display = 'none';
        sampleReportSection.style.display = 'none';

        instructionsSection.scrollIntoView({ behavior: 'smooth' });
    }

    function showSampleReport() {
        currentState = 'sample';
        sampleReportSection.style.display = 'block';
        instructionsSection.style.display = 'none';
        activeAssessmentSection.style.display = 'none';
        resultsSection.style.display = 'none';

        sampleReportSection.scrollIntoView({ behavior: 'smooth' });
    }

    function startAssessment() {
        currentState = 'active';
        instructionsSection.style.display = 'none';
        activeAssessmentSection.style.display = 'block';
        resultsSection.style.display = 'none';
        sampleReportSection.style.display = 'none';

        startTimer();
        goToQuestion(1);

        activeAssessmentSection.scrollIntoView({ behavior: 'smooth' });

        showAlert('🎯 Assessment started! Good luck!', 'success');
    }

    function startAssessmentFromSample() {
        showInstructions();
    }

    function backToOverview() {
        currentState = 'overview';
        instructionsSection.style.display = 'none';
        activeAssessmentSection.style.display = 'none';
        resultsSection.style.display = 'none';
        sampleReportSection.style.display = 'none';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function closeSampleReport() {
        currentState = 'overview';
        sampleReportSection.style.display = 'none';

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function startTimer() {
        updateTimerDisplay();

        timerInterval = setInterval(() => {
            if (!isPaused) {
                timeLeft--;
                updateTimerDisplay();

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    autoSubmitAssessment();
                }

                // Warning when 10 minutes left
                if (timeLeft === 10 * 60) {
                    assessmentTimer.classList.add('warning');
                    showAlert('⏰ 10 minutes remaining!', 'warning');
                }

                // Critical when 5 minutes left
                if (timeLeft === 5 * 60) {
                    showAlert('🚨 5 minutes remaining! Consider reviewing flagged questions.', 'danger');
                }
            }
        }, 1000);
    }

    function updateTimerDisplay() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        assessmentMinutes.textContent = minutes.toString().padStart(2, '0');
        assessmentSeconds.textContent = seconds.toString().padStart(2, '0');
    }

    function togglePause() {
        isPaused = !isPaused;

        if (isPaused) {
            pauseBtn.innerHTML = '<i class="fas fa-play me-1"></i>Resume';
            pauseBtn.classList.remove('btn-outline-warning');
            pauseBtn.classList.add('btn-success');
            showAlert('⏸️ Assessment paused. Timer stopped.', 'info');
        } else {
            pauseBtn.innerHTML = '<i class="fas fa-pause me-1"></i>Pause';
            pauseBtn.classList.remove('btn-success');
            pauseBtn.classList.add('btn-outline-warning');
            showAlert('▶️ Assessment resumed. Timer running.', 'success');
        }
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
        } else {
            showAlert('📋 This is the last question. Use "Review All" to check your answers.', 'info');
        }
    }

    function updateQuestionDisplay() {
        currentQuestionEl.textContent = currentQuestion;

        const progressPercent = (currentQuestion / totalQuestions) * 100;
        questionProgressBar.style.width = `${progressPercent}%`;

        // Load question data
        loadQuestionData(currentQuestion);
    }

    function loadQuestionData(questionNum) {
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
            flagQuestionBtn.innerHTML = '<i class="fas fa-flag me-2"></i>Unflag';
            flagQuestionBtn.classList.add('btn-warning');
        } else {
            flagQuestionBtn.innerHTML = '<i class="far fa-flag me-2"></i>Flag';
            flagQuestionBtn.classList.remove('btn-warning');
        }
    }

    function toggleFlagQuestion() {
        if (flaggedQuestions.has(currentQuestion)) {
            flaggedQuestions.delete(currentQuestion);
            flagQuestionBtn.innerHTML = '<i class="far fa-flag me-2"></i>Flag';
            flagQuestionBtn.classList.remove('btn-warning');
            showAlert('📍 Question unflagged', 'info');
        } else {
            flaggedQuestions.add(currentQuestion);
            flagQuestionBtn.innerHTML = '<i class="fas fa-flag me-2"></i>Unflag';
            flagQuestionBtn.classList.add('btn-warning');
            showAlert('📍 Question flagged for review', 'info');
        }
    }

    function updateNavigation() {
        prevQuestionBtn.disabled = currentQuestion === 1;

        if (currentQuestion === totalQuestions) {
            nextQuestionBtn.innerHTML = 'Review <i class="fas fa-search ms-2"></i>';
        } else {
            nextQuestionBtn.innerHTML = 'Next <i class="fas fa-arrow-right ms-2"></i>';
        }
    }

    function updateProgress() {
        const answeredCount = Object.keys(userAnswers).length;
        console.log('Progress updated:', answeredCount, 'questions answered');
    }

    function reviewAllQuestions() {
        showAlert('📋 Review mode: Navigate through questions to review your answers.', 'info');
    }

    function submitAssessment() {
        const answeredCount = Object.keys(userAnswers).length;

        if (answeredCount < totalQuestions) {
            if (!confirm(`You have answered ${answeredCount} out of ${totalQuestions} questions. Submit anyway?`)) {
                return;
            }
        }

        if (confirm('Are you sure you want to submit your assessment? This action cannot be undone.')) {
            clearInterval(timerInterval);
            showResults();
        }
    }

    function autoSubmitAssessment() {
        showAlert('⏰ Time\'s up! Assessment submitted automatically.', 'warning');
        showResults();
    }

    function showResults() {
        currentState = 'results';
        activeAssessmentSection.style.display = 'none';
        resultsSection.style.display = 'block';

        // Calculate and display results
        const score = calculateFinalScore();

        resultsSection.scrollIntoView({ behavior: 'smooth' });

        showAlert('🎉 Assessment completed! View your detailed report below.', 'success');
    }

    function calculateFinalScore() {
        // Demo scoring logic
        const answeredCount = Object.keys(userAnswers).length;
        const correctCount = Math.floor(answeredCount * 0.87); // Demo: 87% correct
        return Math.round((correctCount / totalQuestions) * 100);
    }

    function downloadReport() {
        showAlert('📄 Downloading comprehensive assessment report...', 'success');
        // In real app: trigger PDF download
    }

    function printCertificate() {
        showAlert('🖨️ Preparing certificate for printing...', 'info');
        // In real app: trigger print dialog
    }

    function startNewAssessment() {
        if (confirm('Start a new assessment? Current results will be lost.')) {
            // Reset state
            currentState = 'overview';
            currentQuestion = 1;
            timeLeft = 60 * 60;
            isPaused = false;
            userAnswers = {};
            flaggedQuestions = new Set();

            // Reset UI
            resultsSection.style.display = 'none';
            activeAssessmentSection.style.display = 'none';
            instructionsSection.style.display = 'none';
            sampleReportSection.style.display = 'none';

            // Reset timer display
            pauseBtn.innerHTML = '<i class="fas fa-pause me-1"></i>Pause';
            pauseBtn.classList.remove('btn-success');
            pauseBtn.classList.add('btn-outline-warning');

            window.scrollTo({ top: 0, behavior: 'smooth' });

            showAlert('🔄 New assessment ready! Click "Begin Assessment" to start.', 'info');
        }
    }

    function showAlert(message, type) {
        // Remove existing alerts
        const existingAlert = document.querySelector('.final-test-alert');
        if (existingAlert) {
            existingAlert.remove();
        }

        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} final-test-alert alert-dismissible fade show`;
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
    console.log('Final test page initialized successfully!');
});