<script>
    let sectionCount = 0;

    document.getElementById('addSectionBtn').addEventListener('click', function() {
        sectionCount++;
        const sectionHTML = `
        <div class="border border-primary rounded p-3 section" id="section${sectionCount}">
            <div class="modal-header bgp-gradient d-flex justify-content-between align-items-center" style="height: 60px;">
                <h5 class="modal-title text-white">Section ${sectionCount}</h5>
                <button class="btn bgp-remove m-3 remove-section-btn" onclick="removeSection(${sectionCount})">Remove Section</button>
            </div>

            <div class="form-group">
                <label for="sectionTitle${sectionCount}">Section Title</label>
                <input type="text" id="sectionTitle${sectionCount}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sectionDescription${sectionCount}">Description</label>
                <textarea id="sectionDescription${sectionCount}" class="form-control" rows="3"></textarea>
            </div>
            <h6>Questions (max 5)</h6>
            <div id="questionsContainer${sectionCount}">
                <!-- Questions for this section will be added here -->
            </div>
            <button type="button" class="btn bgp-add w-25" onclick="addQuestion(${sectionCount})">Add Question</button>
        </div>
    `;
        document.getElementById('sectionsContainer').insertAdjacentHTML('beforeend', sectionHTML);
    });

    function addQuestion(sectionId) {
        const questionsContainer = document.getElementById(`questionsContainer${sectionId}`);
        const questionCount = questionsContainer.getElementsByClassName('question-section').length;

        if (questionCount < 5) {
            const questionHTML = `
            <div class="question-section">
                <div class="form-group">
                    <label>Question</label>
                    <input type="text" class="form-control questionText" required>
                </div>
                <div class="form-group">
                    <label>Question Type</label>
                    <select class="form-control questionType">
                        <option value="text">Text</option>
                        <option value="radio">Multiple Choice</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Options (comma-separated)</label>
                    <input type="text" class="form-control questionOptions" placeholder="e.g. Option 1, Option 2">
                </div>
                <button type="button" class="btn bgp-remove w-25" onclick="removeQuestion(this)">Remove Question</button>
            </div>
        `;
            questionsContainer.insertAdjacentHTML('beforeend', questionHTML);
        } else {
            alert("You can only add up to 5 questions in this section.");
        }
    }

    function removeQuestion(button) {
        const questionSection = button.parentElement;
        questionSection.remove();
    }

    function removeSection(sectionId) {
        const section = document.getElementById(`section${sectionId}`);
        section.remove();
    }

    // Handle form submission to create assessment
    document.getElementById('assessmentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        document.getElementById('loading').style.display = 'grid';

        // Retrieve title and description values
        const assessmentTitle = document.getElementById('assessmentTitle').value;
        const assessmentDescription = document.getElementById('assessmentDescription').value;

        const sections = Array.from(document.querySelectorAll('.section')).map(section => {
            const sectionTitle = section.querySelector('input[id^="sectionTitle"]').value;
            const sectionDescription = section.querySelector('textarea[id^="sectionDescription"]')
                .value;

            const questions = Array.from(section.querySelectorAll('.question-section')).map(
                question => {
                    const questionText = question.querySelector('.questionText').value;
                    const questionType = question.querySelector('.questionType').value;
                    const questionOptions = question.querySelector('.questionOptions').value.split(
                        ',').map(option => option.trim());

                    return {
                        question_text: questionText,
                        question_type: questionType,
                        options: questionOptions,
                    };
                });

            return {
                title: sectionTitle,
                description: sectionDescription,
                questions: questions,
            };
        });

        const assessmentData = {
            title: assessmentTitle, // Use dynamic title
            description: assessmentDescription, // Use dynamic description
            sections: sections,
        };

        // Get the CSRF token from the meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Send the data via fetch
        fetch('/assessments', {
                method: 'POST',
                body: JSON.stringify(assessmentData),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in the request
                }
            })
            .then(response => {
                document.getElementById('loading').style.display = 'none';

                if (response.ok) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Assessment created successfully!',
                    }).then(() => {
                        $('#createskillassessment').modal('hide');
                        this.reset(); // Reset form if needed
                        window.location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: 'Failed to create assessment.',
                    });
                }
            })
            .catch(error => {
                document.getElementById('loading').style.display = 'none';

                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while creating the assessment.',
                });
            });
    });
</script>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        const table = $('#assessmentsTable').DataTable({
            paging: true, // Enable pagination
            searching: true, // Enable searching
            ordering: true, // Enable ordering
            info: true // Enable info
        });

        // Fetch and display assessments
        function fetchAssessments() {

            Swal.fire({
                title: 'Loading...',
                text: 'Fetching assessments, please wait.',
                allowOutsideClick: false,
                showLoaderOnConfirm: true,
                didOpen: () => {
                    Swal.showLoading();
                }
            });


            fetch('/viewassessments')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Clear existing table rows
                    const assessmentsTableBody = document.getElementById('assessmentsTableBody');
                    assessmentsTableBody.innerHTML = ''; // Clear previous data

                    // Populate table with assessment data
                    data.forEach(assessment => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${assessment.title}</td>
                        <td>${assessment.description}</td>
                        <td>${assessment.sections.length}</td>
                        <td>${new Date(assessment.createdAt).toLocaleDateString()}</td>
                        <td>
                            <button class="btn btn-success" onclick="editAssessment(${assessment.id})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteAssessment(${assessment.id})">Delete</button>
                        </td>
                    `;
                        assessmentsTableBody.appendChild(row);
                    });

                    // Close the loading alert
                    Swal.close();
                })
                .catch(error => {
                    // Close the loading alert
                    Swal.close();

                    // Show error alert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to fetch assessments. Please try again later.',
                    });
                    console.error('Error fetching assessments:', error);
                });
        }

        // Call the fetchAssessments function when the page loads
        fetchAssessments();
    });

    // Function to delete an assessment
    function deleteAssessment(id) {
        // Show confirmation alert using SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading indicator while deleting
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Please wait while we delete the assessment.',
                    allowOutsideClick: false,
                    showLoaderOnConfirm: true,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Perform delete fetch request
                fetch(`/api/assessments/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => {
                        Swal.close(); // Close loading alert

                        if (response.ok) {
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: 'Assessment has been deleted successfully.',
                            }).then(() => {
                                window.location.reload();
                                fetchAssessments(); // Refresh the table after deletion

                            });
                        } else {
                            // Show error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: 'There was a problem deleting the assessment.',
                            });
                        }
                    })
                    .catch(error => {
                        Swal.close(); // Close loading alert
                        console.error('Error deleting assessment:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while deleting the assessment.',
                        });
                    });
            }
        });
    }

    // Event listener for search input
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#assessmentsTableBody tr');

        rows.forEach(row => {
            const title = row.cells[0].innerText.toLowerCase();
            const description = row.cells[1].innerText.toLowerCase();
            row.style.display = (title.includes(query) || description.includes(query)) ? '' : 'none';
        });
    });
</script>
