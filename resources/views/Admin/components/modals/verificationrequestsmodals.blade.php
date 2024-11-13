<!-- Modal -->

<div class="modal fade" id="agencyInfoModal" tabindex="-1" aria-labelledby="agencyInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="agencyInfoModalLabel">Agency Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="agencyApprovalForm">
                    @csrf
                    <input type="hidden" id="agencyIdInput" class="form-control" readonly />

                    <div class="mb-0 text-center">
                        <img id="agencyImage" src="" alt="Agency Image" class="img-fluid rounded-circle"
                            style="max-height: 150px; width: auto; border: 2px solid #007bff;" />
                        <div class="m-2">
                            <label class="form-label">Status:</label>
                            <span id="statusBadge" class="badge bg-warning text-dark">Pending</span>
                            <!-- Use different classes for different statuses -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <label for="agencyName" class="form-label">Agency Name</label>
                            <input type="text" class="form-control" id="agencyName" readonly>
                        </div>
                        <div class="col-6 mb-1">
                            <label for="agencyAddress" class="form-label">Agency Address</label>
                            <input type="text" class="form-control" id="agencyAddress" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-1">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="emailAddress" readonly>
                        </div>
                        <div class="col-4 mb-1">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" readonly>
                        </div>
                        <div class="col-4 mb-1">
                            <label for="landlineNumber" class="form-label">Landline Number</label>
                            <input type="text" class="form-control" id="landlineNumber" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <label for="geoCoverage" class="form-label">Geographical Coverage</label>
                            <input type="text" class="form-control" id="geoCoverage" readonly>
                        </div>
                        <div class="col-6 mb-1">
                            <label for="employeeCount" class="form-label">Employee Count</label>
                            <input type="text" class="form-control" id="employeeCount" readonly>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-6 mb-1">
                            <label for="businessPermit" class="form-label">Business Permit</label> <br>
                            <img id="businessPermit" src="" alt="Business Permit" class="img-fluid"
                                style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                onclick="printImage('businessPermit')" />
                        </div>
                        <div class="col-6 mb-1">
                            <label for="dtiPermit" class="form-label">DTI Permit</label> <br>
                            <img id="dtiPermit" src="" alt="DTI Permit" class="img-fluid"
                                style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                onclick="printImage('dtiPermit')" />
                        </div>

                        <div class="col-6 mb-1">
                            <label for="birPermit" class="form-label">BIR Permit</label> <br>
                            <img id="birPermit" src="" alt="BIR Permit" class="img-fluid"
                                style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                onclick="printImage('birPermit')" />
                        </div>
                        <div class="col-6 mb-1">
                            <label for="mayorsPermit" class="form-label">Mayor's Permit</label> <br>
                            <img id="mayorsPermit" src="" alt="Mayors Permit" class="img-fluid"
                                style="height: 200px; width: 200px; object-fit: cover; cursor: pointer;"
                                onclick="printImage('mayorsPermit')" />
                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bgp-gradient" onclick="approveAgency()"
                    id="approveButton">Approve</button>
                <button type="button" class="btn btn-danger" onclick="rejectAgency()" id="rejectButton">Reject</button>
            </div>
        </div>
    </div>
</div>


<script>

function printImage(imgId) {

    var img = document.getElementById(imgId);


    var printWindow = window.open('', '', 'width=600,height=600');
        printWindow.document.write('<html><head><title>Print Image</title></head><body>');
        printWindow.document.write('<img src="' + img.src + '" style="max-width:100%; height:auto;" />');
        printWindow.document.write('</body></html>');
        printWindow.document.close();


        printWindow.onload = function () {
            printWindow.print(); 
        };
    }
</script>
