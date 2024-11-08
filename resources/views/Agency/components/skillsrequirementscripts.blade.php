<script>
let incrementID = 0;
let questionID = 1; // Global variable to track question IDs across multiple questions

function addQuestion() {
    const body = document.getElementById('questionBody');
    const currentQuestionID = questionID; // Capture the current question ID for this question block

    // Create a new question block with a unique questionID
    const questionBlock = document.createElement('div');
    questionBlock.classList.add('col-12', 'm-2', 'border', 'border-primary', 'p-2', 'rounded');
    questionBlock.id = `question${incrementID}`;

    questionBlock.innerHTML = `
        <div class="input-group">
            <input type="text" class="form-control" name="question[${currentQuestionID}][]" placeholder="Enter Question">
            <div class="input-group-append">
                <button type="button" class="btn btn-success" onclick="addOption('ans${incrementID}', '${currentQuestionID}')">Add Option</button>
            </div>
        </div>
        <div class="mt-2" id="ans${incrementID}">
            <!-- Options will be added here -->
        </div>
        <!-- Remove Question Button -->
        <button type="button" class="btn btn-danger mt-2" onclick="removeQuestion('question${incrementID}')">Remove Question</button>
    `;

    // Append the new question block to the body
    body.appendChild(questionBlock);

    incrementID++; // Increment incrementID for each question block
    questionID++;  // Increment questionID to ensure uniqueness for the next question
}

function addOption(id, questionID) {
    const body = document.getElementById(id);

    // Create a container for the new option input and dropdown
    const optionContainer = document.createElement('div');
    optionContainer.classList.add('d-flex', 'mb-2');
    const optionID = `option${Date.now()}`; // Unique ID for each option
    optionContainer.id = optionID;

    // Create the input element for the option
    const input = document.createElement('input');
    input.type = 'text';
    input.className = 'form-control mr-2';
    input.placeholder = 'Option';
    input.name = `option[${questionID}][]`; // Name format as an array for each question

    // Create the select element with a default empty option
    const select = document.createElement('select');
    select.className = 'form-control mr-2';
    select.name = `status[${questionID}][]`; // Name for the status as an array for each question
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.text = 'Select';
    defaultOption.selected = true;
    defaultOption.disabled = true;
    select.appendChild(defaultOption);

    // Add "Correct" and "Wrong" options
    const correctOption = document.createElement('option');
    correctOption.value = 'Correct';
    correctOption.text = 'Correct';
    select.appendChild(correctOption);

    const wrongOption = document.createElement('option');
    wrongOption.value = 'Wrong';
    wrongOption.text = 'Wrong';
    select.appendChild(wrongOption);

    // Create the remove button
    const removeButton = document.createElement('button');
    removeButton.className = 'btn btn-danger btn-sm';
    removeButton.innerText = 'Remove';
    removeButton.onclick = () => removeOption(optionID);

    // Append input, select, and remove button to the option container
    optionContainer.appendChild(input);
    optionContainer.appendChild(select);
    optionContainer.appendChild(removeButton);

    // Append the new option container to the body
    body.appendChild(optionContainer);
}

function removeQuestion(id) {
    const questionElement = document.getElementById(id);
    if (questionElement) {
        questionElement.remove();
    }
}

function removeOption(id) {
    const optionElement = document.getElementById(id);
    if (optionElement) {
        optionElement.remove();
    }
}


function saveSkillAssessment(){
    const form = document.getElementById('questionForm')
    const formData = new FormData(form);
    formData.append('_token', '{{ csrf_token() }}');
    formData.forEach((value, key) => {
    console.log(`${key}: ${value}`);
});

$.ajax({
        url: `{{route('AddQuestion')}}`, // The URL to which the request will be sent
        type: 'POST', // The type of request
        data: formData, // Pass the FormData object
        processData: false, // Prevent jQuery from automatically transforming the data into a query string
        contentType: false, // Let the browser set the content type (for file uploads)
        success: function(response) {
            Swal.fire({
                    icon: "success",
                    title: "Question SuccessFully Saved",
                    showConfirmButton: false,
                    timer: 1500
                    });
                    $('#createskillassessment').modal('hide');
                    const body = document.getElementById('questionBody');
                    body.innerHTML=``;
                    document.getElementById('questionForm').reset();
                    getAssessment()
        },
        error: function(xhr, status, error) {
            // This function is executed if there is an error in the request
            console.error('Error:', error);
            // You can handle the error here
        }
    });

}
let assessmentData = '';
function getAssessment(){
     $.ajax({
            url: `{{route('GetAssessment')}}`,  // URL where the request will be sent
            method: 'GET',  // HTTP method
            dataType: 'json',  // Expected response type
            success: function(response) {
                // Handle the success response here
                console.log('Success:', response);
                assessmentData=response;

                processAssessmentData();
            },
            error: function(xhr, status, error) {
                // Handle the error response here
                console.log('Error:', error);
                $('#result').html('An error occurred. Please try again.');
            }
        });
}
function processAssessmentData() {
    console.log('Assessment Data inside another function:', assessmentData);

    // Prepare data for DataTable
    const tableData = assessmentData.map(item => {
        return {
            title: item.title?.title || '',  // Use title text or empty string if missing
            job_title: item.title?.job_title || '',  // Use job title or empty string if missing
            questions: item.questions.map(q => {
                const questionText = `<b>${q.question}</b>`; // Bold the question text
                const answers = q.answers.map(a => `- ${a.answer} (${a.status})`).join('<br>'); // Indent each answer
                return `${questionText}<br>${answers}`;  // Join question and answers with line breaks
            }).join('<hr>'),  // Separate each question with a horizontal line for clarity
            id: item.title.id,  // Include the ID for delete action
        };
    });

    // Initialize DataTable
    $('#assessmentsDataTable').DataTable({
        data: tableData,
        columns: [
            { data: 'title', title: 'Title' },
            { data: 'job_title', title: 'Job Title' },
            { data: 'questions', title: 'Questions & Answers' },
            { 
                data: 'id',
                title: 'Actions',
                render: function(data, type, row) {
                    // Only the Delete button is included
                    return `
                        <button class="btn btn-danger" onclick="deleteAssessment(${data})">Delete</button>
                    `;
                }
            }
        ],
        destroy: true,  // Allows re-initializing the table if this function is called multiple times
        autoWidth: false,  // Prevents auto-sizing columns based on content
        responsive: true,  // Enables responsiveness if desired
        "createdRow": function(row, data, dataIndex) {
            // Allows HTML inside the questions column for better formatting
            $('td:eq(2)', row).html(data.questions);
        }
    });
}

// Function for handling the Delete button click
function deleteAssessment(id) {
    // Use SweetAlert2 for confirmation
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform your delete action here (e.g., make an AJAX call to delete the record)
            $.ajax({
                url: `/deleteAssessment/${id}`,  // Replace with your delete URL
                method: 'DELETE',
                success: function(response) {
                    console.log('Record deleted successfully:', response);
                    // Optionally, reload or refresh the DataTable after deletion
                    $('#assessmentsDataTable').DataTable().ajax.reload();
                    Swal.fire('Deleted!', 'Your record has been deleted.', 'success');  // Show success alert
                },
                error: function(xhr, status, error) {
                    console.log('Error deleting record:', error);
                    Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');  // Show error alert
                }
            });
        }
    });
}

$(document).ready(function() {
getAssessment();

});

</script>