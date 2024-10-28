{{-- create assessment modal --}}
<div class="modal fade" id="createskillassessment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="exampleModalLabel">Create Skill Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="assessmentForm">
                    @csrf
                    <div class="form-group">
                        <label for="assessmentTitle">Assessment Title</label>
                        <input type="text" id="assessmentTitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="assessmentDescription">Assessment Description</label>
                        <textarea id="assessmentDescription" class="form-control" rows="3" required></textarea>
                    </div>
                    <div id="sectionsContainer" class="mb-2">
                        <!-- Dynamic sections will be added here -->
                    </div>

                    <button type="button" class="btn text-white" style="background-color: rgb(182, 24, 127)"
                        id="addSectionBtn">Add Section</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgp-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bgp-gradient" form="assessmentForm">Save Assessment</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Assessment Modal --}}
<div class="modal fade" id="editAssessmentModal" tabindex="-1" role="dialog"
    aria-labelledby="editAssessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="exampleModalLabel">Update Skill Assessment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editAssessmentForm" onsubmit="saveSelectedAnswers(event)">
                    @csrf
                    <div class="form-group">
                        <label for="editTitle">Title</label>
                        <input type="text" class="form-control" id="editTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="editDescription">Description</label>
                        <textarea class="form-control" id="editDescription" name="description" rows="3"></textarea>
                    </div>
                    <!-- Container for Sections, Questions, and Options -->
                    <div id="ShowsectionsContainer">
                        <!-- Sections will be dynamically added here -->
                    </div>

                    <!-- Hidden input to store selected answers -->
                    <input type="hidden" name="selectedAnswers" id="selectedAnswersInput">

                    <input type="hidden" name="assessmentId" id="assessmentId">

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
