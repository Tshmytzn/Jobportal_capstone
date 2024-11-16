@php
    $agency = \App\Models\Agency::find(1); 
@endphp

<div class="modal fade" id="viewdata" tabindex="-1" aria-labelledby="agencyInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bgp-gradient">
                <h5 class="modal-title text-white" id="agencyInfoModalLabel">Agency Permits Checklist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 650px; overflow-y: auto;">
                <form id="agencyApprovalForm">
                    <input type="hidden" id="agencyIdInput" class="form-control" readonly value="{{ $agency->id }}" />

                 
                    <div class="row text-center">
                        <div class="col-12 mb-1">
                            <ul id="agencyChecklist" class="list-group">
                                <!-- Business Permit -->
                                <li class="list-group-item d-flex align-items-center">
                                    <input type="checkbox" id="businessPermitCheck" {{ $agency->agency_business_permit ? 'checked' : '' }} class="me-3" />
                                    <img id="businessPermit" src="{{ asset('agencyfiles/' . $agency->agency_business_permit) }}" alt="Business Permit" class="img-fluid"
                                        style="height: 150px; width: 150px; object-fit: cover; cursor: pointer;" onclick="printImage('businessPermit')" />
                                    <label for="businessPermit" class="form-label ms-3">Business Permit</label>
                                </li>
                                <!-- DTI Permit -->
                                <li class="list-group-item d-flex align-items-center">
                                    <input type="checkbox" id="dtiPermitCheck" {{ $agency->agency_dti_permit ? 'checked' : '' }} class="me-3" />
                                    <img id="dtiPermit" src="{{ asset('agencyfiles/' . $agency->agency_dti_permit) }}" alt="DTI Permit" class="img-fluid"
                                        style="height: 150px; width: 150px; object-fit: cover; cursor: pointer;" onclick="printImage('dtiPermit')" />
                                    <label for="dtiPermit" class="form-label ms-3">DTI Permit</label>
                                </li>
                                <!-- BIR Permit -->
                                <li class="list-group-item d-flex align-items-center">
                                    <input type="checkbox" id="birPermitCheck" {{ $agency->agency_bir_permit ? 'checked' : '' }} class="me-3" />
                                    <img id="birPermit" src="{{ asset('agencyfiles/' . $agency->agency_bir_permit) }}" alt="BIR Permit" class="img-fluid"
                                        style="height: 150px; width: 150px; object-fit: cover; cursor: pointer;" onclick="printImage('birPermit')" />
                                    <label for="birPermit" class="form-label ms-3">BIR Permit</label>
                                </li>
                                <!-- Mayor's Permit -->
                                <li class="list-group-item d-flex align-items-center">
                                    <input type="checkbox" id="mayorsPermitCheck" {{ $agency->agency_mayors_permit ? 'checked' : '' }} class="me-3" />
                                    <img id="mayorsPermit" src="{{ asset('agencyfiles/' . $agency->agency_mayors_permit) }}" alt="Mayor's Permit" class="img-fluid"
                                        style="height: 150px; width: 150px; object-fit: cover; cursor: pointer;" onclick="printImage('mayorsPermit')" />
                                    <label for="mayorsPermit" class="form-label ms-3">Mayor's Permit</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
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
