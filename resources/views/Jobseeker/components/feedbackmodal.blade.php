<!-- Modal Structure -->
<div class="modal fade" id="feedbackFormModal" tabindex="-1" role="dialog" aria-labelledby="feedbackFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header bgp-gradient">
            <h5 class="modal-title text-white" id="exampleModalLabel"> We Value Your Feedback </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form class="needs-validation" novalidate>

            <!-- Feedback Type -->
            <div class="form-group">
              <label for="feedbackType">What type of feedback would you like to give?</label>
              <select class="form-control" id="feedbackType" name="feedback_type" required>
                <option value="" disabled selected>Select an option</option>
                <option value="positive">I had a positive experience</option>
                <option value="negative">I had a negative experience</option>
                <option value="neutral">I'm giving general feedback</option>
              </select>
              <div class="invalid-feedback">Please select a feedback type.</div>
            </div>

            <!-- Rating -->
            <div class="form-group">
              <label for="rating">How would you rate your experience?</label>
              <select class="form-control" id="rating" name="rating" required>
                <option value="" disabled selected>Choose a rating</option>
                <option value="5">Excellent (5)</option>
                <option value="4">Very Good (4)</option>
                <option value="3">Good (3)</option>
                <option value="2">Fair (2)</option>
                <option value="1">Poor (1)</option>
              </select>
              <div class="invalid-feedback">Please provide a rating.</div>
            </div>

            <!-- Comments -->
            <div class="form-group">
              <label for="comments">Tell us more about your experience</label>
              <textarea class="form-control" id="comments" name="comments" rows="4" placeholder="Write your feedback here..." required></textarea>
              <div class="invalid-feedback">Please enter your comments.</div>
            </div>

            <!-- Optional Fields for Tracking (Hidden) -->
            <input type="hidden" class="form-control" id="applicationId" name="application_id">
            <input type="hidden" class="form-control" id="userId" name="user_id">
            <input type="hidden" class="form-control" id="createdAt" name="created_at">
            <input type="hidden" class="form-control" id="updatedAt" name="updated_at">

            <!-- Submit Button -->
            <button class="btn btn-primary btn-block mt-4" type="submit">Submit Feedback</button>
          </form>
        </div>
      </div>
    </div>
  </div>
