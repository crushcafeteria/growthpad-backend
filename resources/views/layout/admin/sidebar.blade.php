<nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">
    <div class="user-info">
        <img src="{{ secure_asset('images/face.jpg') }}" alt="">
        <p class="name">{{ Auth::user()->name }}</p>
        {{-- <p class="designation">Manager</p> --}}
        <span class="online"></span>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
                <img src="{{ asset('images/icons/database.png')  }}" alt="">
                <span class="menu-title">Contact DB<i class="fa fa-sort-down"></i></span>
            </a>
            <div class="collapse" id="collapseExample">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ asset('admin/contact/add') }}">
                            Add new contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ secure_url('admin/contacts') }}">
                            List all contacts
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ secure_url('admin/contact/requests') }}">
                <img src="{{ asset('images/icons/request.png')  }}" alt="">
                <span class="menu-title">Contact Requests</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ secure_url('admin/contacts/map') }}">
                <img src="{{ asset('images/icons/1.png')  }}" alt="">
                <span class="menu-title">Contact Map</span>
            </a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="{{ secure_url('admin/enquiries') }}">
                <img src="{{ asset('images/icons/4.png')  }}" alt="">
                <span class="menu-title">Service Enquiries</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ secure_url('admin/users') }}">
                <!-- <i class="fa fa-bold"></i> -->
                <img src="{{ asset('images/icons/10.png')  }}" alt="">
                <span class="menu-title">User Manager</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ secure_url('admin/logout') }}">
                <img src="{{ asset('images/icons/2.png')  }}" alt="">
                <span class="menu-title">Log out</span>
            </a>
        </li>
    </ul>
</nav>
<!-- SIDEBAR ENDS -->
