
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery/dist/jquery.min.js"></script>
</head>
<body style="margin-top: 50px">

@include('layout.nav')

<br>

@yield('header')

<div class="container">
    <div class="row">
        @yield('page')
    </div>
</div>


<footer class="footer bg-dark">
    <div class="container text-centerx">
        <span class="text-white">
            Developed by <a target="_blank" href="https://sodium.co.ke" class="text-white">Sodium Africa</a> &nbsp;
            | &nbsp; Responding host: {{ gethostname() }}
        </span>
        <span class="float-right">
            <a href="{{ config('settings.links.facebook') }}" class="text-white footer-icon">
                <i class="fa fa-facebook-square fa-fw"></i>
            </a>
            <a href="{{ config('settings.links.twitter') }}" class="text-white footer-icon">
                <i class="fa fa-twitter-square fa-fw"></i>
            </a>
            <a href="{{ url('disclaimer') }}" class="text-white footer-icon">
                Disclaimer
            </a>
        </span>
    </div>
</footer>

<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key={{ config('settings.google_api_key') }}"type="text/javascript"></script>
<script src="node_modules/geocomplete/jquery.geocomplete.min.js"></script>

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

<style>
    /* Sticky footer styles
-------------------------------------------------- */
    html {
        position: relative;
        min-height: 100%;
    }
    body {
        /* Margin bottom by footer height */
        margin-bottom: 60px;
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }

    .footer-icon {
        font-size: 20px;
        margin-left: 15px;
        text-decoration: none;
    }
</style>
