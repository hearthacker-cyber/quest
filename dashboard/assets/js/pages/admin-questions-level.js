// Difficulty Levels Management
$(document).ready(function() {
    let difficultyData = [];
    let dataTable = null;

    // Initialize DataTable
    function initializeDataTable() {
        if (dataTable) {
            dataTable.destroy();
        }

        dataTable = $('#difficultyTable').DataTable({
            responsive: true,
            ordering: true,
            order: [
                [0, 'asc']
            ],
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            language: {
                search: "Search levels:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ levels",
                infoEmpty: "No levels available",
                infoFiltered: "(filtered from _MAX_ total levels)",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            },
            buttons: [{
                    extend: 'csv',
                    text: '<i class="fas fa-file-csv me-1"></i> CSV',
                    className: 'btn btn-outline-primary btn-sm'
                },
                {
                    extend: 'excel',
                    text: '<i class="fas fa-file-excel me-1"></i> Excel',
                    className: 'btn btn-outline-success btn-sm'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print me-1"></i> Print',
                    className: 'btn btn-outline-info btn-sm'
                }
            ],
            initComplete: function() {
                $('.dt-buttons').addClass('btn-group');
            }
        });
    }

    // Load sample data
    function loadSampleData() {
        difficultyData = [{
                id: 1,
                name: 'Easy',
                weight: 1.0,
                description: 'Basic questions for beginners',
                questionCount: 450,
                color: 'success'
            },
            {
                id: 2,
                name: 'Medium',
                weight: 1.5,
                description: 'Intermediate level questions',
                questionCount: 780,
                color: 'warning'
            },
            {
                id: 3,
                name: 'Hard',
                weight: 2.0,
                description: 'Advanced questions for experts',
                questionCount: 320,
                color: 'danger'
            },
            {
                id: 4,
                name: 'Expert',
                weight: 2.5,
                description: 'Very challenging questions',
                questionCount: 95,
                color: 'dark'
            }
        ];

        updateTable();
        updateStats();
    }

    // Update table with data
    function updateTable() {
        const tbody = $('#difficultyTable tbody');
        tbody.empty();

        if (difficultyData.length === 0) {
            tbody.append(`
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <div class="empty-state">
                            <i class="fas fa-layer-group"></i>
                            <h5>No Difficulty Levels</h5>
                            <p class="text-muted">Add your first difficulty level to get started.</p>
                        </div>
                    </td>
                </tr>
            `);
            return;
        }

        difficultyData.forEach(level => {
            const row = `
                <tr data-level-id="${level.id}">
                    <td>
                        <span class="fw-bold text-primary">${level.id}</span>
                    </td>
                    <td>
                        <span class="difficulty-badge badge-${level.color}">${level.name}</span>
                    </td>
                    <td>
                        <span class="weight-indicator ${getWeightClass(level.weight)}">
                            ${level.weight}
                        </span>
                    </td>
                    <td>
                        <span class="text-muted">${level.description}</span>
                    </td>
                    <td>
                        <span class="badge bg-light text-dark">${level.questionCount}</span>
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <button type="button" class="btn btn-action btn-edit" data-id="${level.id}" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-action btn-duplicate" data-id="${level.id}" title="Duplicate">
                                <i class="fas fa-copy"></i>
                            </button>
                            <button type="button" class="btn btn-action btn-delete" data-id="${level.id}" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `;
            tbody.append(row);
        });

        if (dataTable) {
            dataTable.draw();
        }
    }

    // Get weight class for styling
    function getWeightClass(weight) {
        if (weight <= 1.0) return 'weight-low';
        if (weight <= 1.5) return 'weight-medium';
        return 'weight-high';
    }

    // Update statistics
    function updateStats() {
        $('#totalLevels').text(difficultyData.length);

        const totalQuestions = difficultyData.reduce((sum, level) => sum + level.questionCount, 0);
        $('#totalQuestions').text(totalQuestions.toLocaleString());

        const mostUsed = difficultyData.reduce((max, level) =>
            level.questionCount > max.questionCount ? level : max, difficultyData[0]
        );
        $('#mostUsed').text(mostUsed ? .name || '-');

        const avgWeight = difficultyData.reduce((sum, level) => sum + level.weight, 0) / difficultyData.length;
        $('#avgWeight').text(avgWeight.toFixed(1));
    }

    // Add new difficulty level
    $('#addDifficultyForm').on('submit', function(e) {
        e.preventDefault();

        const name = $('#levelName').val().trim();
        const weight = parseFloat($('#levelWeight').val());
        const description = $('#levelDescription').val().trim();

        // Validation
        if (!name) {
            showAlert('Please enter a level name', 'warning');
            return;
        }

        if (isNaN(weight) || weight <= 0) {
            showAlert('Please enter a valid weight value', 'warning');
            return;
        }

        // Check for duplicate names
        if (difficultyData.some(level => level.name.toLowerCase() === name.toLowerCase())) {
            showAlert('A difficulty level with this name already exists', 'warning');
            return;
        }

        // Create new level
        const newLevel = {
            id: Math.max(...difficultyData.map(l => l.id), 0) + 1,
            name: name,
            weight: weight,
            description: description,
            questionCount: 0,
            color: getColorByWeight(weight)
        };

        difficultyData.push(newLevel);
        updateTable();
        updateStats();

        // Reset form
        $('#addDifficultyForm')[0].reset();
        showAlert('Difficulty level added successfully!', 'success');
    });

    // Get color by weight
    function getColorByWeight(weight) {
        if (weight <= 1.0) return 'easy';
        if (weight <= 1.5) return 'medium';
        if (weight <= 2.0) return 'hard';
        return 'expert';
    }

    // Edit difficulty level
    $(document).on('click', '.btn-edit', function() {
        const levelId = $(this).data('id');
        const level = difficultyData.find(l => l.id === levelId);

        if (level) {
            $('#editLevelId').val(level.id);
            $('#editLevelName').val(level.name);
            $('#editLevelWeight').val(level.weight);
            $('#editLevelDescription').val(level.description);

            $('#editDifficultyModal').modal('show');
        }
    });

    // Save edited changes
    $('#saveDifficultyChanges').on('click', function() {
        const levelId = parseInt($('#editLevelId').val());
        const name = $('#editLevelName').val().trim();
        const weight = parseFloat($('#editLevelWeight').val());
        const description = $('#editLevelDescription').val().trim();

        // Validation
        if (!name) {
            showAlert('Please enter a level name', 'warning');
            return;
        }

        if (isNaN(weight) || weight <= 0) {
            showAlert('Please enter a valid weight value', 'warning');
            return;
        }

        // Check for duplicate names (excluding current level)
        if (difficultyData.some(level =>
                level.id !== levelId && level.name.toLowerCase() === name.toLowerCase()
            )) {
            showAlert('A difficulty level with this name already exists', 'warning');
            return;
        }

        // Update level
        const levelIndex = difficultyData.findIndex(l => l.id === levelId);
        if (levelIndex !== -1) {
            difficultyData[levelIndex] = {
                ...difficultyData[levelIndex],
                name: name,
                weight: weight,
                description: description,
                color: getColorByWeight(weight)
            };

            updateTable();
            updateStats();
            $('#editDifficultyModal').modal('hide');
            showAlert('Difficulty level updated successfully!', 'success');
        }
    });

    // Duplicate difficulty level
    $(document).on('click', '.btn-duplicate', function() {
        const levelId = $(this).data('id');
        const level = difficultyData.find(l => l.id === levelId);

        if (level) {
            const newLevel = {
                ...level,
                id: Math.max(...difficultyData.map(l => l.id), 0) + 1,
                name: level.name + ' (Copy)',
                questionCount: 0
            };

            difficultyData.push(newLevel);
            updateTable();
            updateStats();
            showAlert('Difficulty level duplicated successfully!', 'success');
        }
    });

    // Delete difficulty level
    $(document).on('click', '.btn-delete', function() {
        const levelId = $(this).data('id');
        const level = difficultyData.find(l => l.id === levelId);

        if (level) {
            if (level.questionCount > 0) {
                showAlert(`Cannot delete "${level.name}" - it has ${level.questionCount} questions assigned. Reassign questions first.`, 'warning');
                return;
            }

            $('#deleteLevelName').text(level.name);
            $('#deleteConfirmModal').data('level-id', levelId);
            $('#deleteConfirmModal').modal('show');
        }
    });

    // Confirm deletion
    $('#confirmDelete').on('click', function() {
        const levelId = $('#deleteConfirmModal').data('level-id');
        difficultyData = difficultyData.filter(l => l.id !== levelId);

        updateTable();
        updateStats();
        $('#deleteConfirmModal').modal('hide');
        showAlert('Difficulty level deleted successfully!', 'success');
    });

    // Refresh table
    $('#refreshTable').on('click', function() {
        $(this).find('i').addClass('fa-spin');
        setTimeout(() => {
            updateTable();
            updateStats();
            $(this).find('i').removeClass('fa-spin');
            showAlert('Table refreshed successfully!', 'info');
        }, 1000);
    });

    // Export table
    $('#exportTable').on('click', function() {
        dataTable.buttons(0).trigger();
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

    // Initialize the page
    initializeDataTable();
    loadSampleData();
});