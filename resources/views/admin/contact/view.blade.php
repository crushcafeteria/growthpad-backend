<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{ $contact->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-map-marker fa-fw"></i> Location
                    </small>
                    <div class="d-flex w-100 justify-content-between mt-10">
                        <h5 class="mb-1">{{ $contact->location }}, {{ config('settings.counties')[$contact->county] }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-user fa-fw"></i> Contact Person
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $contact->contact_name }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-phone-square fa-fw"></i> Contact Telephone
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        @foreach($contact->contact_telephone as $telephone)
                            <h5 class="mb-1"><span class="badge badge-warning">{{ $telephone }}</span></h5>
                        @endforeach
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-envelope fa-fw"></i> Contact Email
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        @if(count($contact->email))
                            @foreach($contact->email as $email)
                                <h5 class="mb-1"><span class="badge badge-primary">{{ ($email) ? $email : 'Not available' }}</span></h5>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-globe fa-fw"></i> Organization Goals
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $contact->goals }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-shopping-bag fa-fw"></i> Products
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        @if(count($contact->email))
                            @foreach($contact->products as $product)
                                <h5 class="mb-1"><span class="badge badge-success">{{ ($product) ? $product : 'BAD DATA!' }}</span></h5>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-users fa-fw"></i> Total Employees
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ ($contact->total_employees) ? $contact->total_employees : 'Not Available' }}</h5>
                    </div>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <small class="text-muted">
                        <i class="fa fa-map-marker fa-fw"></i> GPS Coordinates
                    </small>
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ ($contact->lng && $contact->lat) ? $contact->lng.', '.$contact->lat : 'Not Available' }}</h5>
                    </div>
                </div>

            </div>

            <hr>
            <img src="{{ $contact->picture }}" class="img-fluid img-thumbnail">

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="return $('#dialog').modal('hide')">Close</button>
            <a href="{{ url('admin/contact/edit/'.$contact->id) }}" class="btn btn-primary">Edit Contact</a>
        </div>
    </div>
</div>
