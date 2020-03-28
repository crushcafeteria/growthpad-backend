@extends('layout.master')

@section('page')

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row my-4">

            <div class="col-lg-7">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($banners as $key => $banner)
                            <div class="carousel-item {{ ($key == 2) ? 'active' : null }}">
                                <img src="{{ asset('images/banners/'.$banner) }}" class="d-block w-100">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                {{--{{ dd($banners) }}--}}
                <h2>The IREN Growthpad</h2>
                <h5 class="mb-4">Services and productivity in one go</h5>
                <p style="font-size: 17px;">
                    The IREN Growthpad mobile app is a platform that offers convenience and access to service providers.
                    It is a diverse market ecosystem across agricultural value chain that spurs networking opportunities
                    and business growth
                </p>
                <a href="https://play.google.com/store/apps/details?id=com.irenkenya.growthpad.customer.app&hl=en"
                   class="btn btn-success">
                    <i class="fa fa-mobile-phone fa-fw"></i> Download our app
                </a>
                <a href="/cookbook" class="btn btn-success">
                    <i class="fa fa-shopping-cart fa-fw"></i> Buy our cookbook
                </a>
            </div>
        </div>


        <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/service.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Efficient service provision</h5>
                        <hr>
                        <p class="card-text">The IREN Growthpad App offers access to vetted, predictable, accountable
                            service providers through location based systems</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/business.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Productivity and business growth</h5>
                        <hr>
                        <p class="card-text"> The IREN Growthpad offers flexibility for on demand services at the
                            convenience of your phone</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/network.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Networking opportunities</h5>
                        <hr>
                        <p class="card-text">The IREN Growthpad App offers opportunity to grow your network value</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-8">
                <div class="card">
                    {{--<img class="card-img-top img-fluid" src="{{ asset('images/byron-92932_1920.jpg') }}" alt="Card image cap">--}}
                    <div class="card-body" style="padding-bottom: 10px;">
                        <h4 class="card-title" style="margin-top: 7px;">
                            <i class="fa fa-info-circle fa-fw"></i> About IREN
                        </h4>
                        <hr>
                        <p class="card-text">
                            Established in 2001, Inter Region Economic Network (IREN) views the value chain
                            inefficiencies among the Micro, Small, and Medium Sized Enterprises in
                            Africa as a big business opportunity
                        </p>
                        <a target="_blank" href="https://irenkenya.com" class="btn btn-success">
                            Visit our website
                            <i class="fa fa-external-link fa-fw"></i>
                        </a>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    {{--Enquiry modal--}}
    <div class="modal" id="enquiry" tabindex="-1" role="dialog" aria-hidden="true"></div>

@endsection

@push('footer-scripts')
    <script>
        $('.geocomplete').geocomplete()

        function loadEnquiry(type) {
            $('#enquiry').modal('show').html(loading).load('enquiry/' + type)
        }
    </script>

    <style>
        p {
            text-align: justify;
        }

        .gradient {
            color: #fff;
            text-shadow: 0px 2px 4px rgba(0, 0, 0, .5);
            background: #ec1a24; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #cf1e24, #ec1a24); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #cf1e24, #ec1a24); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        .btn-outline-white {
            color: grey;
            background-color: #fff;
            background-image: none;
            border-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, .5);
            text-shadow: none;

        }
    </style>
@endpush
