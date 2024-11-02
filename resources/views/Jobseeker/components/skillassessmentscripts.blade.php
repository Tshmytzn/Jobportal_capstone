<script>
        function editAssessment(id) {
        fetch(`/showassessments/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched data:", data); // Log fetched data for debugging

                // Initialize selected answers object
                window.selectedAnswers = {};

                // Populate form fields
                document.getElementById('assessmentId').value = data.id;
                document.getElementById('editTitle').value = data.title;
                document.getElementById('editDescription').value = data.description;

                // Populate sections
                const ShowsectionsContainer = document.getElementById('ShowsectionsContainer');
                ShowsectionsContainer.innerHTML = ''; // Clear previous content

                if (data.sections && Array.isArray(data.sections) && data.sections.length > 0) {
                    data.sections.forEach(section => {
                        const sectionDiv = document.createElement('div');
                        sectionDiv.classList.add('section');

                        // Section title and description
                        sectionDiv.innerHTML = `
                        <h6>${section.title}</h6>
                        <p>${section.description}</p>
                        <div class="questionsContainer" id="questionsContainer_${section.id}">
                            <!-- Questions will be added here -->
                        </div>
                    `;

                        // Populate questions
                        section.questions.forEach(question => {
                            const questionDiv = document.createElement('div');
                            questionDiv.classList.add('question');
                            questionDiv.innerHTML = `
                            <p>${question.question_text}</p>
                            <div class="optionsContainer" id="optionsContainer_${question.id}">
                                <!-- Options will be added here -->
                            </div><br>
                        `;

                            // Populate options
                            question.options.forEach(option => {
                                const optionDiv = document.createElement('div');
                                optionDiv.classList.add('option');

                                // Check if option is selected
                                const isChecked = (question.answer === option.option_text) ?
                                    'checked' : '';
                                optionDiv.innerHTML = `
                                <input type="radio" name="question_${question.id}" value="${option.id}" ${isChecked}> ${option.option_text}
                            `;

                                // Listen for changes on radio button selections
                                optionDiv.querySelector('input').addEventListener('change',
                                    function() {
                                        window.selectedAnswers[question.id] = option.id;
                                        console.log("Updated selectedAnswers:", window
                                            .selectedAnswers); // Debug selected answers
                                    });

                                questionDiv.querySelector(
                                    `#optionsContainer_${question.id}`).appendChild(
                                    optionDiv);
                            });

                            sectionDiv.querySelector(`#questionsContainer_${section.id}`)
                                .appendChild(questionDiv);
                        });

                        ShowsectionsContainer.appendChild(sectionDiv);
                    });
                } else {
                    ShowsectionsContainer.innerHTML = '<p>No sections available for this assessment.</p>';
                }

                // Show the modal
                $('#editAssessmentModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching assessment data:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to load assessment data.',
                });
            });
    }
</script>
