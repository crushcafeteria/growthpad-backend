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

        @include('layout.admin.widgets')

        <div class="container-fluid">
            <div class="row row-offcanvas row-offcanvas-right">
                <nav class="bg-white sidebar sidebar-fixed sidebar-offcanvas" id="sidebar">
                    <div class="user-info">
                        <img src="images/face.jpg" alt="">
                        <p class="name">Richard V.Welsh</p>
                        <p class="designation">Manager</p>
                        <span class="online"></span>
                    </div>
                    <ul class="nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                <!-- <i class="fa fa-dashboard"></i> -->
                                <img src="{{ asset('images/icons/1.png')  }}" alt="">
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/widgets.html">
                                <img src="{{ asset('images/icons/2.png')  }}" alt="">
                                <span class="menu-title">Widgets</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/forms.html">
                                <!-- <i class="fa fa-wpforms"></i> -->
                                <img src="{{ asset('images/icons/3.png')  }}" alt="">
                                <span class="menu-title">Forms</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/buttons.html">
                                <!-- <i class="fa fa-calculator"></i> -->
                                <img src="{{ asset('images/icons/4.png')  }}" alt="">
                                <span class="menu-title">Buttons</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/tables.html">
                                <!-- <i class="fa fa-table"></i> -->
                                <img src="{{ asset('images/icons/5.png')  }}" alt="">
                                <span class="menu-title">Tables</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/charts.html">
                                <!-- <i class="fa fa-bar-chart"></i> -->
                                <img src="{{ asset('images/icons/6.png')  }}" alt="">
                                <span class="menu-title">Charts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/icons.html">
                                <!-- <i class="fa fa-font"></i> -->
                                <img src="{{ asset('images/icons/7.png')  }}" alt="">
                                <span class="menu-title">Icons</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/typography.html">
                                <!-- <i class="fa fa-bold"></i> -->
                                <img src="{{ asset('images/icons/8.png')  }}" alt="">
                                <span class="menu-title">Typography</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                <!-- <i class="fa fa-address-book"></i> -->
                                <img src="{{ asset('images/icons/9.png')  }}" alt="">
                                <span class="menu-title">Sample Pages<i class="fa fa-sort-down"></i></span>
                            </a>
                            <div class="collapse" id="collapseExample">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="samples/blank_page.html">
                                            Blank Page
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="samples/register.html">
                                            Register
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="samples/login.html">
                                            Login
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="samples/not-found.html">
                                            404
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="samples/error.html">
                                            500
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <!-- <i class="fa fa-bold"></i> -->
                                <img src="{{ asset('images/icons/10.png')  }}" alt="">
                                <span class="menu-title">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- SIDEBAR ENDS -->

                <div class="content-wrapper">
                    <h3 class="text-primary mb-4">Dashboard</h3>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-success">7874</h4>
                                    <p class="card-text">Visitors</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                                        aria-valuemax="100">75%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-info">75632</h4>
                                    <p class="card-text ">Sales</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                        aria-valuemax="100">40%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-warning">2156</h4>
                                    <p class="card-text">Orders</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                                        aria-valuemax="100">25%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title font-weight-normal text-danger">$ 89623</h4>
                                    <p class="card-text">Revenue</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0"
                                        aria-valuemax="100">65%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Sales</h5>
                                    <canvas id="lineChart" style="height:250px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Customer Satisfaction</h5>
                                    <canvas id="doughnutChart" style="height:250px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-block">
                                    <h5 class="card-title mb-4">Payments</h5>
                                    <table class="table">
                                        <thead class="text-primary">
                                            <tr>
                                                <th><i class="fa fa-user ml-2"></i></th>
                                                <th>User</th>
                                                <th>Item</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th><img src="images/profile.jpg" alt="profile" class="rounded-circle" width="40"
                                                    height="40" /></th>
                                                    <td>Larry</td>
                                                    <td>Acer</td>
                                                    <td><span class="badge badge-success">Success</span></td>
                                                </tr>
                                                <tr>
                                                    <th><img src="images/profile.jpg" alt="profile" class="rounded-circle" width="40"
                                                        height="40" /></th>
                                                        <td>Larry</td>
                                                        <td>Acer</td>
                                                        <td><span class="badge badge-danger">Failed</span></td>
                                                    </tr>
                                                    <tr>
                                                        <th><img src="images/profile.jpg" alt="profile" class="rounded-circle" width="40"
                                                            height="40" /></th>
                                                            <td>Larry</td>
                                                            <td>Acer</td>
                                                            <td><span class="badge badge-primary">Processing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <th><img src="images/profile.jpg" alt="profile" class="rounded-circle" width="40"
                                                                height="40" /></th>
                                                                <td>Larry</td>
                                                                <td>Acer</td>
                                                                <td><span class="badge badge-success">Success</span></td>
                                                            </tr>
                                                            <tr>
                                                                <th><img src="images/profile.jpg" alt="profile" class="rounded-circle" width="40"
                                                                    height="40" /></th>
                                                                    <td>Larry</td>
                                                                    <td>Acer</td>
                                                                    <td><span class="badge badge-danger">Failed</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-4">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h5 class="card-title"></h5>
                                                        <div id="map" style="min-height:415px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="footer">
                                        <div class="container-fluid clearfix">
                                            <span class="float-right">
                                                <a href="#">Star Admin</a> &copy; 2017
                                            </span>
                                        </div>
                                    </footer>
                                </div>
                            </div>

                        </div>

                        <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
                        <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>

                        <script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
                        <script src="{{ asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
                        <script src="{{ asset('js/off-canvas.js')  }}"></script>
                        <script src="{{ asset('js/hoverable-collapse.js')  }}"></script>
                        <script src="{{ asset('js/misc.js')  }}"></script>
                        <script src="{{ asset('js/chart.js')  }}"></script>
                        <script src="{{ asset('js/maps.js')  }}"></script>
                    </body>

                    </html>
