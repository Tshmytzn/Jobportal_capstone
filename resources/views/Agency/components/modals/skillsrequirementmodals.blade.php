    {{-- Create Skills Modal start --}}
    <div class="modal fade" id="createskillsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form method="POST" id="createskillsform">
                        @csrf

                        <div class="form-group">
                            <label for="skill_name" class="col-form-label">Skill:</label>
                            <input type="text" class="form-control" name="skill_name" id="skill_name">
                        </div>
                        <div class="form-group">
                            <label for="skill_desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="skill_desc" id="skill_desc"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="createskills()" class="btn bgp-gradient">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Skills Modal end --}}

    {{-- Update Skills Modal end --}}
    <div class="modal fade" id="editgeneralskillmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bgp-gradient">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Edit General Skills</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="editgeneralskillsform">
                        @csrf
                        <input type="hidden" name="skillId" id="skillId" value="" readonly> 
                        
                        <div class="form-group">
                            <label for="skill_name" class="col-form-label">Skill:</label>
                            <input type="text" class="form-control text-dark" name="skill_name" id="skill_name">
                        </div>
                        <div class="form-group">
                            <label for="skill_desc" class="col-form-label">Description:</label>
                            <textarea class="form-control" name="skill_desc" id="skill_desc"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="updategeneralskills()" class="btn bgp-gradient">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Update Skills Modal end --}}

