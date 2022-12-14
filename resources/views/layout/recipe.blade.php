<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The IREN Cookbook</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/recipe/css/bootstrap.min.css">
    <link rel="stylesheet" href="/recipe/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/recipe/css/magnific-popup.css">
    <link rel="stylesheet" href="/recipe/css/font-awesome.min.css">
    <link rel="stylesheet" href="/recipe/css/themify-icons.css">
    <link rel="stylesheet" href="/recipe/css/nice-select.css">
    <link rel="stylesheet" href="/recipe/css/flaticon.css">
    <link rel="stylesheet" href="/recipe/css/gijgo.css">
    <link rel="stylesheet" href="/recipe/css/animate.min.css">
    <link rel="stylesheet" href="/recipe/css/slick.css">
    <link rel="stylesheet" href="/recipe/css/slicknav.css">
    <link rel="stylesheet" href="/recipe/css/style.css">
    <!-- <link rel="stylesheet" href="/recipe/css/responsive.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {{--Facebook Pixel--}}
    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '910947912670238');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=910947912670238&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164930032-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-164930032-1');
    </script>

</head>

<body>

    <script
        src="https://www.paypal.com/sdk/js?client-id={{ config('cookbook.paypal.client_id') }}&currency=EUR&locale={{ (session()->get('locale') == 'de') ? 'de_DE' : 'en_US' }}">
    </script>

    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

    @php
    $cart = ShoppingCart::all();
    @endphp


    <!-- header-start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <a href="/">
                    <img src="/images/logo.png" width="70">
                </a>
            </a>
            <button class="navbar-toggler btn-lg" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars fa-fw text-white"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li>
                        <a href="/cookbook"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="/locale/{{ (app()->getLocale() == 'en') ? 'de' : 'en'}}">
                            <i class="fa fa-info fa-fw"></i> {{ (app()->getLocale() == 'en') ? 'German Version' : 'English Version'}}
                        </a>
                    </li>
                    <li><a href="/submit/recipe"><i class="fa fa-paper-plane fa-fw"></i> Submit
                            recipe</a></li>
                    {{--<li>--}}
                        {{--<a target="_blank"--}}
                           {{--href="https://play.google.com/store/apps/details?id=com.irenkenya.growthpad.customer.app&hl=en">--}}
                            {{--<i class="fa fa-phone fa-fw"></i>Get the app--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    <li>
                        <a target="_blank" href="https://irenkenya.com/contact/">
                            <i class="fa fa-phone-square fa-fw"></i> Contact
                        </a>
                    </li>

                    @if(!auth()->check())
                        <li>
                            <a href="/register">
                                <i class="fa fa-plus-circle fa-fw"></i> Register
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="/cookbook/cart/display">
                            <i class="fa fa-shopping-bag fa-fw"></i> Cart({{ $cart->count() }})
                        </a>
                    </li>
                    @if(auth()->check())
                        <li>
                            <a href="#!" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sign-out fa-fw"></i> Hello, {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/cookbook/my-purchases">
                                    <i class="fa fa-download fa-fw"></i> My Purchases
                                </a>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fa fa-sign-out fa-fw"></i> Logout
                                </a>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- header-end -->

    <style>
        nav li {
            list-style: none;
            padding: 15px;
        }

        nav a, button {
            color: #fff;
            outline: medium none;
        }
    </style>

    {{-- @dump(session()->all(), app()->getLocale()) --}}

    @yield('content')

    <a target="_blank" href="https://wa.me/254798802824?text=Chat%20with%20Growthpad%20Tours%20on%20WhatsApp" class="btn btn-success btn-lg sticky-btn">
        <i class="fa fa-whatsapp fa-fw"></i> Chat on WhatsApp
    </a>

    <!-- footer  -->
    <footer class="footer mt-5">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <p class="copy_right text-center">
                            <a target="_blank" href="\recipe\Privacy Policy.pdf">Privacy Policy</a>
                        </p>
                        <p class="text-center">
                            <a target="_blank" href="https://web.facebook.com/IRENGrowthpad/" class="text-white">
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                            <a target="_blank" href="https://twitter.com/IRENGrowthpad" class="text-white">
                                <i class="fa fa-twitter fa-fw"></i>
                            </a>
                            <a target="_blank" href="https://www.youtube.com/channel/UC-4mGDBbhVL5UtKXQpL_pnw" class="text-white">
                                <i class="fa fa-youtube fa-fw"></i>
                            </a>
                            <a target="_blank" href="https://instagram.com/irengrowthpad_ke" class="text-white">
                                <i class="fa fa-instagram fa-fw"></i>
                            </a>
                        </p>
                        <p class="copy_right text-center">
                            &copy; IREN Growthpad {{ date('Y') }} All rights reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer  -->

    <!-- JS here -->
    <script src="/recipe/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/recipe/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/recipe/js/popper.min.js"></script>
    <script src="/recipe/js/bootstrap.min.js"></script>
    <script src="/recipe/js/owl.carousel.min.js"></script>
    <script src="/recipe/js/isotope.pkgd.min.js"></script>
    <script src="/recipe/js/ajax-form.js"></script>
    <script src="/recipe/js/waypoints.min.js"></script>
    <script src="/recipe/js/jquery.counterup.min.js"></script>
    <script src="/recipe/js/imagesloaded.pkgd.min.js"></script>
    <script src="/recipe/js/scrollIt.js"></script>
    <script src="/recipe/js/jquery.scrollUp.min.js"></script>
    <script src="/recipe/js/wow.min.js"></script>
    <script src="/recipe/js/nice-select.min.js"></script>
    <script src="/recipe/js/jquery.slicknav.min.js"></script>
    <script src="/recipe/js/jquery.magnific-popup.min.js"></script>
    <script src="/recipe/js/plugins.js"></script>
    <script src="/recipe/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="/recipe/js/contact.js"></script>
    <script src="/recipe/js/jquery.ajaxchimp.min.js"></script>
    <script src="/recipe/js/jquery.form.js"></script>
    <script src="/recipe/js/jquery.validate.min.js"></script>
    <script src="/recipe/js/mail-script.js"></script>

    <script src="/recipe/js/main.js"></script>

    @stack('footer-scripts')
</body>

</html>
