@inject('session', '\Illuminate\Support\Facades\Session')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="images/logo.png" class="logo-img">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a target="_blank" class="nav-link active" href="https://play.google.com/store/search?q=iren%20growthpad&hl=en"><i class="fa fa-android fa-fw"></i> Download app</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('onboard') }}"><i class="fa fa-plus-circle fa-fw"></i> Become a service provider</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link active" href="https://irenkenya.com/contact/"><i class="fa fa-envelope fa-fw"></i> Contact Us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login"><i class="fa fa-lock fa-fw"></i> Staff Login</a>
                </li>
            </ul>
            @yield('searchbox')
        </div>
    </div>
</nav>


@push('footer-scripts')

<style>
    .nav-item {
        margin-right: 40px;
    }

    .fixed-top .nav-item:hover {
        background-color: rgba(255,255,255, .5);
        border-radius: 5px;
        text-shadow: 0px -1px 2px #000;
    }

    .logo-img {
        vertical-align: middle;
        border-style: none;
        width: 80px;
        margin-right: 50px;
    }

    .navbar-brand {
        padding-top: 0;
        padding-bottom: .3125rem;
        margin-right: 0;
    }

    .navbar {
        padding: 0;
    }
</style>
@endpush
