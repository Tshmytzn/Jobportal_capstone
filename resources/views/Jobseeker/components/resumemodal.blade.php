<!-- Upload Resume Modal -->
<div class="modal fade" id="Uploadresumemodal" tabindex="-1" aria-labelledby="UpdateProfilePicLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateProfilePicLabel">Upload Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadResumeForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="js_id" id="js_id" value="{{ session('user_id') }}">

                    <div class="mb-3">
                        <small for="js_resume">Please upload your resume (Accepted formats: PDF, DOC, DOCX, RTF)</small>
                        <input type="file" class="form-control" id="js_resume" name="js_resume" required>
                    </div>

                    <div class="text-center">
                        <button type="button" onclick="UploadResume()" class="btn btn-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Upload Resume Modal -->
