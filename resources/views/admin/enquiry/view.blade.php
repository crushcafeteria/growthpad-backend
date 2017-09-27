<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Request for farm management services</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-sitemap fa-fw"></i> Service Category
                    </small>
                    <div class="d-flex w-100 justify-content-between mt-10">
                        <h5 class="mb-1">{{ $enquiry->category }}asds</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa cubes fa-fw"></i> Farming Activity
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->activity }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-phone-square fa-fw"></i> Customer Names
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->full_names }} ({{ $enquiry->gender }})</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-phone-square fa-fw"></i> Customer Telephone
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->telephone }}</h5>
                    </div>
                </div>
               <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-phone-square fa-fw"></i> Customer Email
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->email }}</h5>
                    </div>
                </div>

                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-globe fa-fw"></i> Customer Location
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->town }}, {{ $enquiry->county }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-users fa-fw"></i> Description of farming activity
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $enquiry->farming_activity_description }}</h5>
                    </div>
                </div>
            </div>

            {{-- {{ dump($enquiry->toArray()) }} --}}

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return $('#dialog').modal('hide')">Close</button>
        </div>
    </div>
</div>
