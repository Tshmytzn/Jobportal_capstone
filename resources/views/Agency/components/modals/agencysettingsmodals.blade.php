<!-- Update Profile Picture Modal -->
<div class="modal fade" id="UpdateProfilePic" tabindex="-1" aria-labelledby="UpdateProfilePicLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateProfilePicLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="updateProfilePicForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ session('agency_id') }}">

                    <div class="mb-3">
                        <label for="admin_profile" class="form-label">Choose Profile Picture</label>
                        <input type="file" class="form-control" id="agency_profile" name="agency_profile"
                            accept="image/*" required>
                    </div>

                    <div class="text-center">
                        <button type="button" onclick="updateProfilePic()"
                            class="btn bg-gradient-primary w-100">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Profile Picture Modal -->
