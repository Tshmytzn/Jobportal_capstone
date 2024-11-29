<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<!-- Print button script -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<!-- Other export buttons (optional) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- pdfmake for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<!-- Buttons for HTML5 exports (Excel, PDF) -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {

        const table = $('#assessmentsTable').DataTable({
            ajax: {
                url: '/viewassessments',
                dataSrc: '',
                processing: false,
                serverSide: false,
                destroy: true,
                error: function(xhr, error, code) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to fetch assessments. Please try again later.',
                    });
                    console.error('Error fetching assessments:', error);
                }
            },
            columns: [{
                    data: 'title'
                },
                {
                    data: 'description',
                    render: function(data, type, row) {
                        if (data.length > 30) {
                            return data.substring(0, 30) + '...';
                        }
                        return data;
                    }
                },

                {
                    data: 'sections.length'
                },
                {
                    data: 'createdAt',
                    render: function(data) {
                        return new Date(data).toLocaleDateString();
                    }
                },
                {
                    data: 'id',
                    render: function(id) {
                        return `
                        <button class="btn text-white btn-sm" style="background: linear-gradient(90deg, rgba(77, 7, 99, 1) 0%, rgba(121, 9, 128, 1) 50%, rgba(189, 11, 186, 1) 100%);" onclick="editAssessment(${id})">Set Answer</button>
                        <button class="btn text-white btn-sm" style="            background: linear-gradient(90deg,rgb(206, 150, 150) 0%,rgb(207, 74, 74) 50%,rgba(139, 0, 0, 1) 100%);
" onclick="deleteAssessment(${id})">Delete</button>
                    `;
                    }
                }
            ],
            dom: 'Bfrtip',
            buttons: [
                'colvis',

                {
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel'
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    },
                    customize: function(win) {

                        $(win.document.body)
                            .prepend(
                                `<div class="print-header">
                                    <img src="{{ asset('assets/img/PESOLOGO.png') }}" style="width: 100px; height: auto;">
                                    <h1>Public Employment Service Office Victorias City</h1>
                                </div>
                                <div class="print-header-date">
                                    Public Employment Service Office Victorias City
                                </div>`
                            );


                        $(win.document.body).find('h1').remove();

                        var style = `
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    table, th, td {
                        border: 1px solid #ddd;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(odd) {
                        background-color: #ffffff;
                    }
                    .print-header, .print-header-date {
                        position: fixed;
                        top: 140px;
                        left: 0;
                        width: 100%;
                        text-align: center;
                        z-index: 9999;
                        background: #fff;
                    }
                    .print-header-date {
                        font-size: 22px;
                        color: #666;
                        margin-top: 100px;
                        margin-bottom: 20px;

                    }
                    body {
                        margin-top: 150px; 
                    }
                    @media print {
                        .print-header, .print-header-date {
                            position: fixed;
                            top: 10px;
                            left: 0;
                            width: 100%;
                            text-align: center;
                            z-index: 9999;
                            background: #fff;
                        }
                        body {
                            margin-top: 150px;
                        }
                        .page-break {
                        page-break-before: always;
                    }
                            
                    }
                </style>
            `;

                        // Add the style to the printed window
                        $(win.document.head).append(style);

                      var rowsPerPage = 25;
                        var rows = $(win.document.body).find('table tr');
                        for (var i = rowsPerPage; i < rows.length; i += rowsPerPage) {
                            $(rows[i]).before(
                                '<tr class="page-break"><td colspan="100%"></td></tr>');
                        }

                        // Adjust page margins for the print view
                        $(win.document.body).css('margin-top', '150px');
                    }
                }

            ],
            initComplete: function() {

                $('.dt-button').attr(
                    'style',
                    'background: linear-gradient(to right, #FADCD9, #d8bfd8 ); color: #444; border: 1px solid #DDD; padding: 8px 12px; border-radius: 4px; font-size: 14px; cursor: pointer; margin: 4px; transition: all 0.3s ease; box-shadow: none;'
                );
            },
        });

        // Reload data after adding or deleting an assessment
        function reloadTable() {
            table.ajax.reload(null, false); // Reload the table without resetting pagination
        }
    });

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
                                $('#assessmentsTable').DataTable().ajax
                                    .reload(); // Reload DataTable after deletion
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
                        Swal.close();
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

    // Fetch and display assessment data
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
                                <input type="radio" name="question_${question.id}" value="${option.option_text}" ${isChecked}> ${option.option_text}
                            `;

                                // Listen for changes on radio button selections
                                optionDiv.querySelector('input').addEventListener('change',
                                    function() {
                                        window.selectedAnswers[question.id] = option.option_text;
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

<script>
    function saveSelectedAnswers(event) {
        event.preventDefault(); // Prevent form's default submission

        // Store the selected answers in the hidden field as JSON
        document.getElementById('selectedAnswersInput').value = JSON.stringify(window.selectedAnswers || {});

        // Submit the form via AJAX
        const formData = new FormData(document.getElementById('editAssessmentForm'));

        // Get the assessment ID from a hidden field (make sure this is available)
        const assessmentId = document.getElementById('assessmentId').value;
        formData.append('assessmentId', assessmentId); // Add the assessment ID to the form data

        // Show loading indication
        const saveButton = document.querySelector('button[type="submit"]');
        saveButton.disabled = true; // Disable the button
        Swal.fire({
            title: 'Saving...',
            onBeforeOpen: () => {
                Swal.showLoading();
            }
        });

        fetch('/saveAssessment', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Assessment updated successfully:', data);
                // Close the modal and/or show success message
                $('#editAssessmentModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Updated!',
                    text: 'The assessment was updated successfully.',
                });
            })
            .catch(error => {
                console.error('Error updating assessment:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: error.message || 'Failed to update the assessment.',
                });
            })
            .finally(() => {
                saveButton.disabled = false; // Re-enable the button after response
            });
    }
</script>


<script>
    // document.getElementById('editAssessmentForm').addEventListener('submit', function(event) {
    //     event.preventDefault();

    //     const id = this.dataset.assessmentId;

    //     // Gather updated sections, questions, and options
    //     const sections = Array.from(document.getElementsByClassName('section')).map(sectionDiv => {
    //         const title = sectionDiv.querySelector('input[placeholder="Section Title"]').value;
    //         const description = sectionDiv.querySelector('input[placeholder="Section Description"]')
    //             .value;

    //         const questions = Array.from(sectionDiv.getElementsByClassName('question')).map(
    //             questionDiv => {
    //                 const questionText = questionDiv.querySelector(
    //                     'input[placeholder="Question Text"]').value;

    //                 const options = Array.from(questionDiv.getElementsByTagName('input')).map(
    //                     optionInput => optionInput.value);

    //                 return {
    //                     question_text: questionText,
    //                     options: options
    //                 };
    //             });

    //         return {
    //             title: title,
    //             description: description,
    //             questions: questions
    //         };
    //     });

    //     const updatedData = {
    //         title: document.getElementById('editTitle').value,
    //         description: document.getElementById('editDescription').value,
    //         sections: sections // Include the sections data
    //     };

    // Send the updated data via fetch
    // fetch(`/updateassessments/${id}`, {
    //     method: 'PUT',
    //     headers: {
    //         'Content-Type': 'application/json',
    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
    //             'content'),
    //     },
    //     body: JSON.stringify(updatedData),
    // })
    // .then(response => {
    //     if (response.ok) {
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Updated!',
    //             text: 'Assessment has been updated successfully.',
    //         }).then(() => {
    //             $('#editAssessmentModal').modal('hide'); // Close modal
    //             fetchAssessments(); // Refresh data
    //         });
    //     } else {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Failed',
    //             text: 'Could not update assessment. Please try again.',
    //         });
    //     }
    // })
    // .catch(error => {
    //     console.error('Error updating assessment:', error);
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'An error occurred while updating the assessment.',
    //     });
    // });
    // });
</script>
