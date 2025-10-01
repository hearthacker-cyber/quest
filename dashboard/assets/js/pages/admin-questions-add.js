// Add Question JavaScript
$(document).ready(function() {
    let optionCount = 0;

    // Initialize TinyMCE Editor
    tinymce.init({
        selector: '#questionText',
        plugins: 'advlist autolink lists link image charmap preview anchor table',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image',
        height: 300,
        menubar: false,
        statusbar: false,
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }'
    });

    // Question Type Change Handler
    $('#questionType').change(function() {
        const type = $(this).val();

        // Hide all sections first
        $('.question-type-section').hide();

        // Show relevant section
        switch (type) {
            case 'mcq':
                $('#mcqOptions').show();
                break;
            case 'true_false':
                $('#trueFalseOptions').show();
                break;
            case 'short_answer':
                $('#shortAnswerOptions').show();
                break;
            case 'essay':
                $('#essayOptions').show();
                break;
            case 'fill_blank':
                $('#fillBlankOptions').show();
                break;
        }

        // Update correct answer placeholder
        updateCorrectAnswerPlaceholder(type);
    });

    // Add Option Button
    $('#addOption').click(function() {
        addOption();
    });

    // Remove Option
    $(document).on('click', '.remove-option', function() {
        $(this).closest('.option-item').remove();
        renumberOptions();
    });

    // Set Correct Option
    $(document).on('click', '.set-correct', function() {
        $('.option-item').removeClass('correct-option');
        $(this).closest('.option-item').addClass('correct-option');

        const optionText = $(this).closest('.option-item').find('.option-text').val();
        $('#correctAnswer').val(optionText);
    });

    // Image Preview
    $('#questionImage').change(function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').remove();
                $(this).after('<img id="imagePreview" src="' + e.target.result + '" class="image-preview" style="display: block;">');
            }.bind(this);
            reader.readAsDataURL(file);
        }
    });

    // Form Submission
    $('#addQuestionForm').submit(function(e) {
        e.preventDefault();

        if (validateForm()) {
            // Show loading state
            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            submitBtn.prop('disabled', true).addClass('btn-loading').html('Saving Question...');

            // Simulate API call
            setTimeout(() => {
                showAlert('Question saved successfully!', 'success');

                // Reset button state
                submitBtn.prop('disabled', false).removeClass('btn-loading').html(originalText);
            }, 2000);
        }
    });

    // Save as Draft
    $('#saveDraft').click(function() {
        if (validateForm(true)) {
            const submitBtn = $(this);
            const originalText = submitBtn.html();
            submitBtn.prop('disabled', true).addClass('btn-loading').html('Saving Draft...');

            setTimeout(() => {
                showAlert('Question saved as draft successfully!', 'info');
                submitBtn.prop('disabled', false).removeClass('btn-loading').html(originalText);
            }, 1500);
        }
    });

    // Form Validation
    function validateForm(isDraft = false) {
        const type = $('#questionType').val();
        const marks = $('#marks').val();
        const questionText = tinymce.get('questionText').getContent();
        const correctAnswer = $('#correctAnswer').val();
        const subject = $('#subject').val();
        const category = $('#category').val();
        const difficulty = $('#difficulty').val();

        if (!type) {
            showAlert('Please select a question type.', 'error');
            return false;
        }

        if (!marks || marks < 1) {
            showAlert('Please enter valid marks (minimum 1).', 'error');
            return false;
        }

        if (!questionText.trim()) {
            showAlert('Please enter question text.', 'error');
            return false;
        }

        if (!correctAnswer.trim() && !isDraft) {
            showAlert('Please enter correct answer.', 'error');
            return false;
        }

        if (!subject && !isDraft) {
            showAlert('Please select a subject.', 'error');
            return false;
        }

        if (!category && !isDraft) {
            showAlert('Please select a category.', 'error');
            return false;
        }

        if (!difficulty && !isDraft) {
            showAlert('Please select difficulty level.', 'error');
            return false;
        }

        // MCQ specific validation
        if (type === 'mcq' && $('.option-item').length < 2 && !isDraft) {
            showAlert('Please add at least 2 options for MCQ questions.', 'error');
            return false;
        }

        // True/False specific validation
        if (type === 'true_false' && !$('input[name="trueFalseAnswer"]:checked').val() && !isDraft) {
            showAlert('Please select correct answer for True/False question.', 'error');
            return false;
        }

        return true;
    }

    // Add Option Function
    function addOption() {
        optionCount++;
        const optionHtml = `
            <div class="option-item">
                <div class="option-header">
                    <span class="option-number">Option ${optionCount}</span>
                    <div class="option-actions">
                        <button type="button" class="btn btn-sm btn-success set-correct" title="Set as Correct">
                            <i class="fas fa-check"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger remove-option" title="Remove Option">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control option-text" placeholder="Enter option text...">
                    </div>
                    <div class="col-md-4">
                        <input type="file" class="form-control option-image" accept="image/*">
                    </div>
                </div>
            </div>
        `;
        $('#optionsContainer').append(optionHtml);
    }

    // Renumber Options
    function renumberOptions() {
        $('.option-item').each(function(index) {
            $(this).find('.option-number').text(`Option ${index + 1}`);
        });
        optionCount = $('.option-item').length;
    }

    // Update Correct Answer Placeholder
    function updateCorrectAnswerPlaceholder(type) {
        let placeholder = '';
        switch (type) {
            case 'mcq':
                placeholder = 'Enter correct answer or select from options...';
                break;
            case 'true_false':
                placeholder = 'Enter "True" or "False"...';
                break;
            case 'short_answer':
                placeholder = 'Enter expected short answer...';
                break;
            case 'essay':
                placeholder = 'Enter model essay answer...';
                break;
            case 'fill_blank':
                placeholder = 'Enter the missing word/phrase...';
                break;
            default:
                placeholder = 'Enter correct answer...';
        }
        $('#correctAnswer').attr('placeholder', placeholder);
    }

    // Show Alert Message
    function showAlert(message, type) {
        // Remove existing alerts
        $('.alert-dismissible').remove();

        const alertClass = type === 'success' ? 'alert-success' :
            type === 'error' ? 'alert-danger' :
            type === 'warning' ? 'alert-warning' : 'alert-info';

        const icon = type === 'success' ? 'fa-check-circle' :
            type === 'error' ? 'fa-exclamation-circle' :
            type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle';

        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                <i class="fas ${icon} me-2"></i> ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;

        $('.page-title-box').after(alertHtml);

        // Auto-remove alerts after 5 seconds
        setTimeout(() => {
            $('.alert').alert('close');
        }, 5000);
    }

    // Add initial options for MCQ
    $('#questionType').change();

    // Add two default options when MCQ is selected
    $(document).on('show', '#mcqOptions', function() {
        if ($('.option-item').length === 0) {
            addOption();
            addOption();
        }
    });

    // Tags input handling
    $('#tags').on('keypress', function(e) {
        if (e.which === 13 || e.which === 44) {
            e.preventDefault();
            addTag($(this).val().trim());
            $(this).val('');
        }
    });

    function addTag(tagText) {
        if (tagText) {
            const tagHtml = `<span class="tag">${tagText} <span class="remove-tag" onclick="$(this).parent().remove()">×</span></span>`;
            if ($('.tags-container').length === 0) {
                $('#tags').after('<div class="tags-container"></div>');
            }
            $('.tags-container').append(tagHtml);
        }
    }
});