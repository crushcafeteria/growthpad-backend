<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <style>
        /*#loader {*/
            /*transition: all .3s ease-in-out;*/
            /*opacity: 1;*/
            /*visibility: visible;*/
            /*position: fixed;*/
            /*height: 100vh;*/
            /*width: 100%;*/
            /*background: #fff;*/
            /*z-index: 90000*/
        /*}*/

        /*#loader.fadeOut {*/
            /*opacity: 0;*/
            /*visibility: hidden*/
        /*}*/

        /*.spinner {*/
            /*width: 40px;*/
            /*height: 40px;*/
            /*position: absolute;*/
            /*top: calc(50% - 20px);*/
            /*left: calc(50% - 20px);*/
            /*background-color: #333;*/
            /*border-radius: 100%;*/
            /*-webkit-animation: sk-scaleout 1s infinite ease-in-out;*/
            /*animation: sk-scaleout 1s infinite ease-in-out*/
        /*}*/

        /*@-webkit-keyframes sk-scaleout {*/
            /*0% {*/
                /*-webkit-transform: scale(0)*/
            /*}*/
            /*100% {*/
                /*-webkit-transform: scale(1);*/
                /*opacity: 0*/
            /*}*/
        /*}*/

        /*@keyframes sk-scaleout {*/
            /*0% {*/
                /*-webkit-transform: scale(0);*/
                /*transform: scale(0)*/
            /*}*/
            /*100% {*/
                /*-webkit-transform: scale(1);*/
                /*transform: scale(1);*/
                /*opacity: 0*/
            /*}*/
        /*}*/
    </style>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}"/>
    @stack('header-scripts')
</head>

<body class="app">
<div id="loader">
    <div class="spinner"></div>
</div>
<script>
    // window.addEventListener('load', () => {
    //     const loader = document.getElementById('loader');
    //     setTimeout(() => {
    //         loader.classList.add('fadeOut');
    //     }, 300)
    })
</script>
<div>
    @include('layout.admin.sidebar');
    <div class="page-container">

        @include('layout.admin.top-nav')
        @yield('page')

        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
                <span>
                    Cooked with <i class="fa fa-heart-o"></i> and
                    <a href="https://sodium.co.ke" target="_blank" title="Colorlib">Sodium</a>
                </span>
        </footer>
    </div>

</div>

<script type="text/javascript" src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor.js') }}"></script>
<script type="text/javascript" src="{{ asset('bundle.js') }}"></script>

@stack('footer-scripts')

</body>
</html>

<style>
    .header {
        top: -1px;
    }
</style>