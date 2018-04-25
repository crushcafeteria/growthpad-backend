
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }} - IREN Kenya</title>
    <link href="{{ secure_asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <script src="{{ secure_asset('jquery/dist/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ secure_asset('style.css') }}">
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

<footer class="footer-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav-footer mt-2 mt-md-0 ">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ secure_url('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ secure_url('market') }}">Marketplace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ secure_url('disclaimer') }}">Disclaimer</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="divider"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mt-2 mb-3 pt-1">
                <p>Powered by Sodium Africa</p>
            </div>
            <div class="col-md-6 text-center text-md-right mb-4">
                <ul class="social">
                    {{--<li><a href="#" title="Facebook" class="fa fa-facebook"></a></li>--}}
                    <li><a href="https://twitter.com/irenkenya" title="Twitter" target="_blank" class="fa fa-twitter"></a></li>
                    <li><a href="mailto:info@irenkenya.com" title="Twitter" class="fa fa-envelope"></a></li>
                    {{--<li><a href="#" title="Google+" class="fa fa-google"></a></li>--}}
                    {{--<li><a href="#" title="Dribbble" class="fa fa-dribbble"></a></li>--}}
                    {{--<li><a href="#" title="Instagram" class="fa fa-instagram"></a></li>--}}
                    <div class="clear"></div>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ secure_asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ secure_asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script async defer src="http://maps.googleapis.com/maps/api/js?libraries=places&key={{ config('settings.google_api_key') }}"type="text/javascript"></script>
<script src="{{ secure_asset('node_modules/geocomplete/jquery.geocomplete.min.js') }}"></script>

@stack('footer-scripts')

<script>
    var loading =   '<div class="col-12 text-center">' +
                        '<div class="col-2 mx-auto card card-body" style="margin-top: 10%">' +
                            '<i class="fa fa-refresh fa-spin fa-2x"></i><br>' +
                            '<h6>Loading form...</h6>' +
                        '</div>' +
                    '</div>'
</script>

</body>
</html>
