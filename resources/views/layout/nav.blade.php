@inject('session', '\Illuminate\Support\Facades\Session')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-cubes fa-fw"></i> {{ config('app.name') }}</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" href="{{ url('services') }}"><i class="fa fa-cog fa-spin fa-fw"></i> Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('market') }}"><i class="fa fa-shopping-cart fa-fw"></i> Marketplace</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link active" href="https://irenkenya.com/contact/"><i class="fa fa-envelope fa-fw"></i> Contact</a>
                </li>
                {{--<li class="nav-item active">--}}
                    {{--<a class="nav-link" href="{{ url('basket') }}"><i class="fa fa-shopping-bag fa-fw"></i> Basket ({{ count($session::get('cart')) }})</a>--}}
                {{--</li>--}}
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
</style>
@endpush
