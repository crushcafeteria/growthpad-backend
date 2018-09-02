<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
</head>
<body>
    <div class=" container-scroller">

        {{-- @include('layout.admin.nav') --}}

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">

                @include('layout.admin.sidebar')

                <div class="content-wrapper">

                    @yield('content')

                </div>
            </div>
        </div>

    </div>

    {{-- GP dialog --}}
    <div class="modal" id="dialog" tabindex="-1" role="dialog" aria-hidden="true">

    <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{ secure_asset('node_modules/chart.js/dist/Chart.min.js') }}"></script> --}}
    {{-- <script src="{{ secure_asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script> --}}
    <script src="{{ asset('js/off-canvas.js')  }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js')  }}"></script>
    {{-- <script src="{{ secure_asset('js/misc.js')  }}"></script> --}}
    {{-- <script src="{{ secure_asset('js/chart.js')  }}"></script> --}}
    {{-- <script src="{{ secure_asset('js/maps.js')  }}"></script> --}}
</body>

</html>
