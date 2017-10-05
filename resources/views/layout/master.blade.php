
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - IREN Kenya</title>
    <link href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
</head>
<body style="margin-top: 50px">

@include('layout.nav')

<br>

@yield('header')  

<div class="container">

    <div class="row">

        @yield('page')

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="py-3 bg-light">
    <div class="container pb-4">
        <span class="pull-left text-muted">Made with <i class="fa fa-heart"></i> in Nairobi City</span>
        <a href="{{ url('disclaimer') }}" class="pull-right text-muted">Disclaimer</a>
    </div>
</footer>

<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script async defer src="http://maps.googleapis.com/maps/api/js?libraries=places&key={{ config('settings.google_api_key') }}"type="text/javascript"></script>
<script src="{{ asset('node_modules/geocomplete/jquery.geocomplete.min.js') }}"></script>

@stack('footer-scripts')

</body>
</html>
