<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid">
            @yield('authbox')
        </div>
    </div>

</body>

</html>
