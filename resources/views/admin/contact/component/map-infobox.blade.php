<h5>{{ $contact->name }}</h5>
Location: {{ $contact->location }}, {{ config('settings.counties')[$contact->county] }}<br>
Contact Person: {{ $contact->contact_name }}<br>