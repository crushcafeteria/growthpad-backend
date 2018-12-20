<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed"><a class="sidebar-link td-n" href="dashboard">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="assets/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">{{ config('app.name') }}</h5>
                            </div>
                        </div>
                    </a></div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" href="{{ secure_url('dashboard')) }}">
                    <span class="icon-holder">
                        <i class="fa fa-home fa-fw"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ secure_url('ads')) }}">
                    <span class="icon-holder">
                        <i class="fa fa-eye fa-fw"></i>
                    </span>
                    <span class="title">Ads</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ secure_url('orders')) }}">
                    <span class="icon-holder">
                        <i class="fa fa-shopping-cart fa-fw"></i>
                    </span>
                    <span class="title">Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ secure_url('users')) }}">
                    <span class="icon-holder">
                        <i class="fa fa-users fa-fw"></i>
                    </span>
                    <span class="title">User Accounts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="{{ secure_url('logout')) }}">
                    <span class="icon-holder">
                        <i class="fa fa-sign-out fa-fw"></i>
                    </span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>


{{--<nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">--}}
{{--<div class="user-info">--}}
{{--<img src="{{ asset('images/face.jpg') }}" alt="">--}}
{{--<p class="name">{{ Auth::user()->name }}</p>--}}
{{-- <p class="designation">Manager</p> --}}
{{--<span class="online"></span>--}}
{{--</div>--}}
{{--<ul class="nav">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">--}}
{{--<img src="{{ asset('images/icons/database.png')  }}" alt="">--}}
{{--<span class="menu-title">Contact DB<i class="fa fa-sort-down"></i></span>--}}
{{--</a>--}}
{{--<div class="collapse" id="collapseExample">--}}
{{--<ul class="nav flex-column sub-menu">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ asset('admin/contact/add') }}">--}}
{{--Add new contact--}}
{{--</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ url('admin/contacts') }}">--}}
{{--List all contacts--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ url('admin/contact/requests') }}">--}}
{{--<img src="{{ asset('images/icons/request.png')  }}" alt="">--}}
{{--<span class="menu-title">Contact Requests</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ url('admin/contacts/map') }}">--}}
{{--<img src="{{ asset('images/icons/1.png')  }}" alt="">--}}
{{--<span class="menu-title">Contact Map</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item active">--}}
{{--<a class="nav-link" href="{{ url('admin/enquiries') }}">--}}
{{--<img src="{{ asset('images/icons/4.png')  }}" alt="">--}}
{{--<span class="menu-title">Service Enquiries</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ url('admin/users') }}">--}}
{{--<!-- <i class="fa fa-bold"></i> -->--}}
{{--<img src="{{ asset('images/icons/10.png')  }}" alt="">--}}
{{--<span class="menu-title">User Manager</span>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ url('admin/logout') }}">--}}
{{--<img src="{{ asset('images/icons/2.png')  }}" alt="">--}}
{{--<span class="menu-title">Log out</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</nav>--}}
{{--<!-- SIDEBAR ENDS -->--}}
