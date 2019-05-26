@component('mail::message')
# Hello there,

Someone just suggested a business in {{ ucfirst(strtolower($request->county)) }} County.

Business Name: {{ $request->name }} <br>
Business Telephone: {{ $request->telephone }} <br>
Business Location: {{ $request->location }} <br>
County: {{ $request->county }} <br>
Extra Information: <br>
{{ $request->county }}
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
