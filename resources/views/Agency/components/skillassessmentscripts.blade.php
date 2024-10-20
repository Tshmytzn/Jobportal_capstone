<script>
    let sectionCount = 0;

    document.getElementById('addSectionBtn').addEventListener('click', function() {
        sectionCount++;
        const sectionHTML = `
        <div class="border border-primary rounded p-3 section" id="section${sectionCount}">

            <div class="modal-header bgp-gradient d-flex justify-content-between align-items-center" style="height: 60px;">
                <h5 class="modal-title text-white" id="exampleModalLabel">Section ${sectionCount}</h5>
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
        const questionHTML = `
        <div class="question-section">
            <div class="form-group">
                <label>Question</label>
                <input type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Question Type</label>
                <select class="form-control">
                    <option value="text">Text</option>
                    <option value="radio">Multiple Choice</option>
                    <option value="checkbox">Checkbox</option>
                </select>
            </div>
            <div class="form-group">
                <label>Options (comma-separated)</label>
                <input type="text" class="form-control" placeholder="e.g. Option 1, Option 2">
            </div>
            <button type="button" class="btn bgp-remove w-25" onclick="removeQuestion(this)">Remove Question</button>
        </div>
    `;
        const questionsContainer = document.getElementById(`questionsContainer${sectionId}`);
        const questionCount = questionsContainer.getElementsByClassName('question-section').length;

        if (questionCount < 5) {
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

    document.getElementById('assessmentForm').addEventListener('submit', function(event) {
        event.preventDefault();
        // Handle form submission to create assessment (e.g., using fetch to post to your API)
        alert('Assessment created!');
    });
</script>
