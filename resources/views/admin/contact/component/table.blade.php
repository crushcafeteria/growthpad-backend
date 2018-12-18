<table class="table table-bordered table-hover center-aligned-table">
    <thead>
    <tr>
        <th colspan="2">Business Name</th>
        <th colspan="2">Location</th>
        <th>Contact Name</th>
        <th>Positioning</th>
        <th>Market Type</th>
        <th colspan="2">Employees</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        {{--{{ dump($contact) }}--}}
        <tr>
            <td>
                @if(!$contact->picture)
                    <i class="fa fa-picture-o text-danger"></i>
                @else
                    <i class="fa fa-picture-o text-success"></i>
                @endif
            </td>
            <td>{{ ($contact->name) ? $contact->name : 'N/A' }}</td>
            <td>{{ $contact->location }}, {{ config('settings.counties')[$contact->county] }}</td>
            <td class="text-center">
                @if($contact->lng && $contact->lat)
                    {{ $contact->lng }}, {{ $contact->lat }}</td>
                @else
                    <span class="badge badge-warning"><i class="fa fa-question-circle fa-fw"></i> N/A</span>
                @endif
            <td>{{ $contact->contact_name }}</td>
            <td>{{ $contact->positioning }}</td>
            <td>{{ ($contact->market_type) ? @config('settings.market_types')[$contact->market_type] : 'N/A' }}</td>
            <td>{{ ($contact->total_employees) ? $contact->total_employees : 'N/A'}}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="#_" class="btn btn-outline-success btn-sm" onclick="loadContact({{ $contact->id }})">
                        <i class="fa fa-eye fa-fw"></i> View
                    </a>
                    <a href="{{ secure_url('admin/contact/edit/'.$contact->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-edit fa-fw"></i> Edit
                    </a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>