<!-- Update Profile Picture Modal -->
<div class="modal fade" id="UpdateProfilePic" tabindex="-1" aria-labelledby="UpdateProfilePicLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UpdateProfilePicLabel">Update Profile Picture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProfilePicForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ session('user_id') }}">

                    <div class="mb-3">
                        <label for="admin_profile" class="form-label">Choose Profile Picture</label>
                        <input type="file" class="form-control" id="admin_profile" name="admin_profile"
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

<!-- Admin Profile Modal start -->
<div class="modal fade" id="adminProfileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-custom">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Administrator</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="avatar avatar-xl mx-auto mb-3">
                    <img src="{{ asset('../assets/img/team-1.jpg') }}" alt="profile_image"
                        class="w-100 border-radius-md shadow-sm">
                </div>
                <h6 class="mb-2">Kailah Leyva</h6>
                <a href="{{ route('adminsettings') }}"> <button
                        class="btn bg-gradient-primary text-white w-100 mb-2">Settings</button></a>
                <form action="{{ route('logoutAdmin') }}" method="POST" id="logoutadminForm">
                    @csrf
                    <button type="submit" class="btn bg-gradient-primary w-100">Log out</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Admin Profile Modal End-->

