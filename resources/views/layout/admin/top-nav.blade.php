<div class="header navbar">
    <div class="header-container">
        <ul class="nav nav-left">
            <li>
                <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                    <i class="fa fa-list-ul"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('users') }}">Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('payments') }}">Payments</a>
            </li>
        </ul>

        <ul class="nav-right">
            <li class="dropdown show">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                   data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p"
                             src="{{ auth()->user()->picture }}" alt=""></div>
                    <div class="peer">
                        <span class="fsz-sm c-grey-900">{{ auth()->user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    {{--<li>--}}
                    {{--<a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">--}}
                    {{--<i class="ti-settings mR-10"></i>--}}
                    {{--<span>Setting</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-email mR-10"></i> <span>Messages</span></a>--}}
                    {{--</li>--}}
                    {{--<li role="separator" class="divider"></li>--}}
                    <li>
                        <a href="{{ url('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="fa fa-sign-out fa-fw"></i> <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</div>