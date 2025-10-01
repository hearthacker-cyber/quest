// Questions Import Functionality
$(document).ready(function() {
            let uploadedData = null;
            let fileColumns = [];
            let fieldMapping = {};

            // System fields configuration
            const systemFields = [
                { id: 'question_text', name: 'Question Text', required: true, type: 'text' },
                { id: 'option_a', name: 'Option A', required: false, type: 'text' },
                { id: 'option_b', name: 'Option B', required: false, type: 'text' },
                { id: 'option_c', name: 'Option C', required: false, type: 'text' },
                { id: 'option_d', name: 'Option D', required: false, type: 'text' },
                { id: 'correct_answer', name: 'Correct Answer', required: true, type: 'text' },
                { id: 'explanation', name: 'Explanation', required: false, type: 'text' },
                { id: 'difficulty', name: 'Difficulty', required: false, type: 'select' },
                { id: 'tags', name: 'Tags', required: false, type: 'text' },
                { id: 'category', name: 'Category', required: false, type: 'text' }
            ];

            // Upload area functionality
            const uploadArea = $('#uploadArea');
            const fileInput = $('#fileInput');
            const fileInfo = $('#fileInfo');
            const fileName = $('#fileName');
            const removeFile = $('#removeFile');

            // Drag and drop functionality
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                uploadArea.addClass('dragover');
            });

            uploadArea.on('dragleave', function(e) {
                e.preventDefault();
                uploadArea.removeClass('dragover');
            });

            uploadArea.on('drop', function(e) {
                e.preventDefault();
                uploadArea.removeClass('dragover');
                const files = e.originalEvent.dataTransfer.files;
                if (files.length > 0) {
                    handleFileSelection(files[0]);
                }
            });

            uploadArea.on('click', function() {
                fileInput.click();
            });

            fileInput.on('change', function(e) {
                if (this.files.length > 0) {
                    handleFileSelection(this.files[0]);
                }
            });

            removeFile.on('click', function() {
                resetFileSelection();
            });

            function handleFileSelection(file) {
                const validTypes = [
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'text/csv'
                ];

                const validExtensions = ['.xlsx', '.xls', '.csv'];
                const fileExtension = '.' + file.name.split('.').pop().toLowerCase();

                if (!validTypes.includes(file.type) && !validExtensions.includes(fileExtension)) {
                    showAlert('Please select a valid Excel or CSV file.', 'danger');
                    return;
                }

                if (file.size > 10 * 1024 * 1024) {
                    showAlert('File size must be less than 10MB.', 'danger');
                    return;
                }

                fileName.text(file.name);
                fileInfo.show();
                uploadArea.hide();

                // Process the file
                processFile(file);
            }

            function resetFileSelection() {
                fileInput.val('');
                fileInfo.hide();
                uploadArea.show();
                uploadedData = null;
                fileColumns = [];
                $('#mappingSection').hide();
                $('#previewSection').hide();
                $('#resultsSection').hide();
            }

            function processFile(file) {
                uploadArea.addClass('loading');

                const reader = new FileReader();

                reader.onload = function(e) {
                    try {
                        const data = new Uint8Array(e.target.result);
                        const workbook = XLSX.read(data, { type: 'array' });

                        // Get the first worksheet
                        const worksheet = workbook.Sheets[workbook.SheetNames[0]];
                        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

                        if (jsonData.length < 2) {
                            throw new Error('File appears to be empty or has no data rows');
                        }

                        // Extract headers and data
                        fileColumns = jsonData[0];
                        uploadedData = jsonData.slice(1, 6); // First 5 rows for preview

                        // Show mapping section
                        showMappingSection();

                    } catch (error) {
                        console.error('Error processing file:', error);
                        showAlert('Error processing file: ' + error.message, 'danger');
                        resetFileSelection();
                    } finally {
                        uploadArea.removeClass('loading');
                    }
                };

                reader.onerror = function() {
                    showAlert('Error reading file', 'danger');
                    uploadArea.removeClass('loading');
                    resetFileSelection();
                };

                reader.readAsArrayBuffer(file);
            }

            function showMappingSection() {
                const mappingContainer = $('#fieldMapping');
                mappingContainer.empty();

                systemFields.forEach(field => {
                    const mappingItem = $('<div class="mapping-item"></div>');

                    const label = $('<span class="mapping-label"></span>');
                    label.text(field.name);
                    if (field.required) {
                        label.append('<span class="mapping-required">*</span>');
                    }

                    const select = $(`<select class="form-select mapping-select" data-field="${field.id}"></select>`);
                    select.append('<option value="">-- Select Column --</option>');

                    fileColumns.forEach((column, index) => {
                        select.append(`<option value="${index}">${column}</option>`);
                    });

                    // Auto-select if column name matches
                    const matchingIndex = fileColumns.findIndex(col =>
                        col.toLowerCase().includes(field.name.toLowerCase())
                    );
                    if (matchingIndex !== -1) {
                        select.val(matchingIndex);
                    }

                    mappingItem.append(label);
                    mappingItem.append(select);
                    mappingContainer.append(mappingItem);
                });

                $('#mappingSection').addClass('section-transition').show();
            }

            // Preview Data
            $('#previewData').on('click', function() {
                // Collect mapping
                fieldMapping = {};
                $('.mapping-select').each(function() {
                    const fieldId = $(this).data('field');
                    const columnIndex = $(this).val();
                    if (columnIndex !== '') {
                        fieldMapping[fieldId] = parseInt(columnIndex);
                    }
                });

                // Validate required fields are mapped
                const missingRequired = systemFields.filter(field =>
                    field.required && !fieldMapping[field.id]
                );

                if (missingRequired.length > 0) {
                    const fieldNames = missingRequired.map(f => f.name).join(', ');
                    showAlert(`Please map all required fields: ${fieldNames}`, 'warning');
                    return;
                }

                showPreview();
            });

            function showPreview() {
                const previewHeaders = $('#previewHeaders');
                const previewBody = $('#previewBody');

                previewHeaders.empty();
                previewBody.empty();

                // Add headers
                systemFields.forEach(field => {
                    if (fieldMapping[field.id] !== undefined) {
                        previewHeaders.append(`<th>${field.name}</th>`);
                    }
                });

                // Add data rows
                uploadedData.forEach(row => {
                    const tr = $('<tr></tr>');
                    systemFields.forEach(field => {
                        if (fieldMapping[field.id] !== undefined) {
                            const value = row[fieldMapping[field.id]] || '';
                            tr.append(`<td>${value}</td>`);
                        }
                    });
                    previewBody.append(tr);
                });

                $('#mappingSection').hide();
                $('#previewSection').addClass('section-transition').show();
            }

            // Back to mapping
            $('#backToMapping').on('click', function() {
                $('#previewSection').hide();
                $('#mappingSection').show();
            });

            // Import Data
            $('#importData').on('click', function() {
                $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Importing...');

                // Simulate import process
                setTimeout(() => {
                    showImportResults();
                    $(this).prop('disabled', false).html('<i class="fas fa-upload me-2"></i>Import Questions');
                }, 2000);
            });

            function showImportResults() {
                // Simulate import results
                const results = {
                    total: 45,
                    success: 42,
                    errors: 3,
                    errorDetails: [
                        'Row 12: Missing required field "Question Text"',
                        'Row 23: Invalid difficulty level',
                        'Row 37: Duplicate question detected'
                    ]
                };

                const summary = $('#importSummary');
                summary.empty();

                // Success count
                const successItem = $(`
            <div class="result-item import-success">
                <i class="fas fa-check-circle result-icon text-success"></i>
                <div class="result-content">
                    <strong>Successfully Imported</strong>
                    <p class="mb-0">Questions imported without errors</p>
                </div>
                <span class="result-count text-success">${results.success}</span>
            </div>
        `);
                summary.append(successItem);

                // Error count
                if (results.errors > 0) {
                    const errorItem = $(`
                <div class="result-item import-error">
                    <i class="fas fa-exclamation-circle result-icon text-danger"></i>
                    <div class="result-content">
                        <strong>Import Errors</strong>
                        <p class="mb-0">Questions that failed to import</p>
                    </div>
                    <span class="result-count text-danger">${results.errors}</span>
                </div>
            `);
                    summary.append(errorItem);

                    // Error details
                    const errorDetails = $(`
                <div class="mt-3">
                    <h6>Error Details:</h6>
                    <ul class="list-unstyled">
                        ${results.errorDetails.map(error => `<li class="text-danger small">• ${error}</li>`).join('')}
                    </ul>
                </div>
            `);
            summary.append(errorDetails);
        }
        
        $('#previewSection').hide();
        $('#resultsSection').addClass('section-transition').show();
    }

    // Import another file
    $('#importAnother').on('click', function() {
        resetFileSelection();
    });

    // Utility function to show alerts
    function showAlert(message, type) {
        const alert = $(`
            <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `);
        $('.container-fluid').prepend(alert);
        
        setTimeout(() => {
            alert.alert('close');
        }, 5000);
    }
});