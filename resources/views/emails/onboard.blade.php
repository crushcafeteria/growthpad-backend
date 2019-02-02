@component('mail::message')

You have an new request from a potential service provider.

@component('mail::panel')
Name: {{ $fields['name']}} <br>
Business Name: {{ $fields['business_name']}} <br>
Mobile Number: {{ $fields['telephone']}} <br>
Email: {{ $fields['email']}} <br>
Activities: {{ $fields['activities']}} <br>
Location: {{ $fields['location']}}
@endcomponent

To send a message directly to the visitor, please reply to this email

Thanks,<br>
{{ config('app.name') }}
@endcomponent
