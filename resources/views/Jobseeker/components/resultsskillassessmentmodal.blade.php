<!-- Modal -->
<div class="modal fade" id="assessmentModal" tabindex="-1" aria-labelledby="assessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-center w-100" id="assessmentModalLabel">
                    <i class="bi bi-check-circle-fill text-success"></i> Assessment Completed
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-4">
                <p class="lead mb-3">Well done! Your assessment is complete.</p>
                <p>Are you ready to view your results?</p>
            </div>
            <!-- Results Section (hidden initially) -->
            <div class="modal-body text-center p-4" id="assessmentResults" style="display: none;">
                <h4>Your Assessment Results</h4>
                <p id="scoreResult">Your score: <span></span>%</p>
                <p id="passStatus">Status: <span></span></p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-success" id="viewResultsBtn" onclick="showResults()">View Results</a>
            </div>
        </div>
    </div>
</div>
