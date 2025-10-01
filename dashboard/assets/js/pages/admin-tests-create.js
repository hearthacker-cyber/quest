// Test Creation Wizard
$(document).ready(function() {
    let currentStep = 1;
    let selectedQuestions = [];
    let testData = {
        basic: {},
        settings: {},
        questions: []
    };

    // Initialize DataTable
    let questionsTable = null;

    function initializeQuestionsTable() {
        questionsTable = $('#questionsTable').DataTable({
            responsive: true,
            ordering: true,
            order: [
                [1, 'asc']
            ],
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            language: {
                search: "Search questions:",
                lengthMenu: "Show _MENU_ questions",
                info: "Showing _START_ to _END_ of _TOTAL_ questions",
                infoEmpty: "No questions available",
                infoFiltered: "(filtered from _MAX_ total questions)",
                select: {
                    rows: {
                        _: "Selected %d questions",
                        0: "Click a row to select",
                        1: "Selected 1 question"
                    }
                }
            },
            columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    responsivePriority: 3,
                    targets: 2
                }
            ]
        });

        // Update selected questions count
        questionsTable.on('select deselect', function() {
            updateSelectedQuestionsCount();
        });
    }

    // Load sample questions data
    function loadSampleQuestions() {
        const sampleQuestions = [{
                id: 1,
                question: "What is the capital of France?",
                type: "MCQ",
                difficulty: "Easy",
                marks: 1,
                subject: "Geography"
            },
            {
                id: 2,
                question: "Solve the equation: 2x + 5 = 15",
                type: "MCQ",
                difficulty: "Medium",
                marks: 2,
                subject: "Mathematics"
            },
            {
                id: 3,
                question: "Explain the theory of relativity in your own words.",
                type: "Descriptive",
                difficulty: "Hard",
                marks: 5,
                subject: "Physics"
            },
            {
                id: 4,
                question: "The Earth is flat. True or False?",
                type: "True/False",
                difficulty: "Easy",
                marks: 1,
                subject: "Geography"
            },
            {
                id: 5,
                question: "What is the chemical symbol for Gold?",
                type: "MCQ",
                difficulty: "Easy",
                marks: 1,
                subject: "Chemistry"
            },
            {
                id: 6,
                question: "Calculate the derivative of f(x) = x² + 3x - 5",
                type: "Descriptive",
                difficulty: "Hard",
                marks: 4,
                subject: "Mathematics"
            },
            {
                id: 7,
                question: "Which programming language is known as the backbone of the web?",
                type: "MCQ",
                difficulty: "Medium",
                marks: 2,
                subject: "Computer Science"
            },
            {
                id: 8,
                question: "Photosynthesis occurs in mitochondria. True or False?",
                type: "True/False",
                difficulty: "Easy",
                marks: 1,
                subject: "Biology"
            }
        ];

        const tbody = $('#questionsTable tbody');
        tbody.empty();

        sampleQuestions.forEach(q => {
            const typeBadge = getTypeBadge(q.type);
            const difficultyBadge = getDifficultyBadge(q.difficulty);

            const row = `
                <tr>
                    <td></td>
                    <td>${q.id}</td>
                    <td>
                        <div class="question-text">${q.question}</div>
                    </td>
                    <td>${typeBadge}</td>
                    <td>${difficultyBadge}</td>
                    <td>${q.marks}</td>
                    <td>${q.subject}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-action btn-preview" title="Preview">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-action btn-edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });

        if (questionsTable) {
            questionsTable.draw();
        }
    }

    function getTypeBadge(type) {
        const badges = {
            'MCQ': 'badge-type badge-mcq',
            'True/False': 'badge-type badge-tf',
            'Descriptive': 'badge-type badge-descriptive'
        };
        return `<span class="${badges[type] || 'badge-type'}">${type}</span>`;
    }

    function getDifficultyBadge(difficulty) {
        const badges = {
            'Easy': 'badge-difficulty badge-easy',
            'Medium': 'badge-difficulty badge-medium',
            'Hard': 'badge-difficulty badge-hard'
        };
        return `<span class="${badges[difficulty] || 'badge-difficulty'}">${difficulty}</span>`;
    }

    // Update selected questions count
    function updateSelectedQuestionsCount() {
        if (questionsTable) {
            const selectedCount = questionsTable.rows({ selected: true }).count();
            $('#selectedQuestionsCount').text(`${selectedCount} questions selected`);
            $('#summaryTotalQuestions').text(selectedCount);
        }
    }

    // Step Navigation
    function showStep(stepNumber) {
        $('.step-content').hide();
        $(`#step-${stepNumber}`).show();

        // Update progress steps
        $('.step').removeClass('active completed');
        for (let i = 1; i <= stepNumber; i++) {
            $(`.step[data-step="${i}"]`).addClass(i === stepNumber ? 'active' : 'completed');
        }

        currentStep = stepNumber;

        // Update preview if we're on step 4
        if (stepNumber === 4) {
            updatePreview();
        }
    }

    // Step 1: Basic Details
    $('#nextToStep2').on('click', function() {
        const form = $('#basicDetailsForm')[0];
        if (form.checkValidity()) {
            // Save basic details
            testData.basic = {
                name: $('#testName').val(),
                subject: $('#testSubject').val(),
                description: $('#testDescription').val(),
                instructions: $('#testInstructions').val()
            };
            showStep(2);
        } else {
            form.reportValidity();
        }
    });

    // Step 2: Settings
    $('#backToStep1').on('click', function() {
        showStep(1);
    });

    $('#nextToStep3').on('click', function() {
        const form = $('#settingsForm')[0];
        if (form.checkValidity()) {
            // Save settings
            testData.settings = {
                duration: $('#testDuration').val(),
                totalMarks: $('#totalMarks').val(),
                passingMarks: $('#passingMarks').val(),
                maxAttempts: $('#maxAttempts').val(),
                difficultyMix: {
                    easy: $('#easyPercent').val(),
                    medium: $('#mediumPercent').val(),
                    hard: $('#hardPercent').val()
                },
                shuffleQuestions: $('#shuffleQuestions').is(':checked'),
                shuffleOptions: $('#shuffleOptions').is(':checked'),
                showResults: $('#showResults').is(':checked'),
                allowBacktracking: $('#allowBacktracking').is(':checked'),
                negativeMarking: $('#negativeMarking').is(':checked'),
                timerVisibility: $('#timerVisibility').is(':checked')
            };
            showStep(3);
        } else {
            form.reportValidity();
        }
    });

    // Step 3: Add Questions
    $('#backToStep2').on('click', function() {
        showStep(2);
    });

    $('#nextToStep4').on('click', function() {
        if (questionsTable.rows({ selected: true }).count() === 0) {
            showAlert('Please select at least one question for the test.', 'warning');
            return;
        }
        showStep(4);
    });

    // Step 4: Finalize
    $('#backToStep3').on('click', function() {
        showStep(3);
    });

    // Range Slider Updates
    $('#easyPercent').on('input', function() {
        $('#easyPercentValue').text($(this).val() + '%');
    });

    $('#mediumPercent').on('input', function() {
        $('#mediumPercentValue').text($(this).val() + '%');
    });

    $('#hardPercent').on('input', function() {
        $('#hardPercentValue').text($(this).val() + '%');
    });

    // Add Manual Question
    $('#addManualQuestion').on('click', function() {
        $('#addQuestionModal').modal('show');
    });

    // Import Questions
    $('#importQuestions').on('click', function() {
        showAlert('Import questions functionality would be implemented here.', 'info');
    });

    // Select All Questions
    $('#selectAllQuestions').on('change', function() {
        if ($(this).is(':checked')) {
            questionsTable.rows().select();
        } else {
            questionsTable.rows().deselect();
        }
    });

    // Update Preview
    function updatePreview() {
        // Basic Info
        const basicInfo = `
            <div class="preview-item">
                <span class="preview-label">Test Name:</span>
                <span class="preview-value">${testData.basic.name || 'Not set'}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Subject:</span>
                <span class="preview-value">${testData.basic.subject || 'Not set'}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Description:</span>
                <span class="preview-value">${testData.basic.description || 'No description'}</span>
            </div>
        `;
        $('#previewBasicInfo').html(basicInfo);

        // Settings
        const settings = `
            <div class="preview-item">
                <span class="preview-label">Duration:</span>
                <span class="preview-value">${testData.settings.duration || '0'} minutes</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Total Marks:</span>
                <span class="preview-value">${testData.settings.totalMarks || '0'}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Passing Marks:</span>
                <span class="preview-value">${testData.settings.passingMarks || '0'}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Max Attempts:</span>
                <span class="preview-value">${testData.settings.maxAttempts || '1'}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Difficulty Mix:</span>
                <span class="preview-value">
                    Easy: ${testData.settings.difficultyMix?.easy || '0'}% |
                    Medium: ${testData.settings.difficultyMix?.medium || '0'}% |
                    Hard: ${testData.settings.difficultyMix?.hard || '0'}%
                </span>
            </div>
        `;
        $('#previewSettings').html(settings);

        // Questions Summary
        const selectedCount = questionsTable.rows({ selected: true }).count();
        const questionsSummary = `
            <div class="preview-item">
                <span class="preview-label">Total Questions:</span>
                <span class="preview-value">${selectedCount}</span>
            </div>
            <div class="preview-item">
                <span class="preview-label">Selection Method:</span>
                <span class="preview-value">Manual Selection</span>
            </div>
        `;
        $('#previewQuestions').html(questionsSummary);

        // Update summary stats
        $('#summaryTotalQuestions').text(selectedCount);
        $('#summaryTotalMarks').text(testData.settings.totalMarks || '0');
        $('#summaryDuration').text((testData.settings.duration || '0') + ' min');
        $('#summaryEasy').text((testData.settings.difficultyMix ? .easy || '0') + '%');
        $('#summaryMedium').text((testData.settings.difficultyMix ? .medium || '0') + '%');
        $('#summaryHard').text((testData.settings.difficultyMix ? .hard || '0') + '%');
    }

    // Save as Draft
    $('#saveAsDraft').on('click', function() {
        if (!$('#confirmTestDetails').is(':checked')) {
            showAlert('Please confirm that all test details are correct.', 'warning');
            return;
        }

        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Saving...');

        setTimeout(() => {
            showAlert('Test saved as draft successfully!', 'success');
            $(this).prop('disabled', false).html('<i class="fas fa-save me-1"></i> Save as Draft');
            // Redirect to tests list or stay on page
        }, 2000);
    });

    // Publish Test
    $('#publishTest').on('click', function() {
        if (!$('#confirmTestDetails').is(':checked')) {
            showAlert('Please confirm that all test details are correct.', 'warning');
            return;
        }

        $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i>Publishing...');

        setTimeout(() => {
            showAlert('Test published successfully!', 'success');
            $(this).prop('disabled', false).html('<i class="fas fa-rocket me-1"></i> Publish Test');
            // Redirect to tests list
            setTimeout(() => {
                window.location.href = 'tests.php';
            }, 1500);
        }, 2000);
    });

    // Show alert message
    function showAlert(message, type) {
        const alert = $(`
            <div class="alert alert-${type} alert-dismissible fade show alert-position" role="alert">
                <i class="fas fa-${getAlertIcon(type)} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);

        $('body').append(alert);

        setTimeout(() => {
            alert.alert('close');
        }, 5000);
    }

    // Get alert icon
    function getAlertIcon(type) {
        const icons = {
            success: 'check-circle',
            warning: 'exclamation-triangle',
            danger: 'exclamation-circle',
            info: 'info-circle'
        };
        return icons[type] || 'info-circle';
    }

    // Initialize the wizard
    initializeQuestionsTable();
    loadSampleQuestions();
    showStep(1);
});