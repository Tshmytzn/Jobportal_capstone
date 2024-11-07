<script>
  let incrementID = 0;

function addQuestion() {
    const body = document.getElementById('questionBody');
    const questionID = `question${Date.now()}`;
    body.innerHTML += `
    <div class="col-12 m-2 border border-primary p-2 rounded" id="question${incrementID}">
        <div class="input-group">
            <input type="text" class="form-control" name="${questionID}" placeholder="Enter option">
            <div class="input-group-append">
                <button class="btn btn-success" onclick="addOption('ans${incrementID}','${questionID}')">Add Option</button>
            </div>
        </div>
        <div class="mt-2" id="ans${incrementID}">
            <!-- Options will be added here -->
        </div>
        <!-- Remove Question Button -->
        <button class="btn btn-danger mt-2" onclick="removeQuestion('question${incrementID}')">Remove Question</button>
    </div>
    `;
    incrementID++;
}

function addOption(id,id2) {
    const body = document.getElementById(id);
    const optionID = `option${Date.now()}`; // Unique ID for each option
    
    body.innerHTML += `
    <div class="d-flex mb-2" id="${optionID}">
        <input type="text" class="form-control" placeholder="Option" name="${id2}">
        <!-- Remove option button beside the input -->
        <button class="btn btn-danger btn-sm ml-2" onclick="removeOption('${optionID}')">Remove</button>
    </div>
    `;
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

</script>