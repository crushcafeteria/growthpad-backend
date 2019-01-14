@extends('layout.master')

@section('page')

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row my-4">
            <div class="col-lg-7">
                <img class="img-fluid rounded" src="{{ asset('images/app.png') }}" alt="">
            </div>
            <div class="col-lg-5">
                <h2>The IREN Growthpad</h2>
                <hr>
                <p style="font-size: 18px;">
                    IREN Growthpad Mobile App is an online service platform that offers convenience and
                    efficient access to agro vets and outside caterers. It creates linkages that develop
                    a diverse market eco-system, spurs business growth and promotes networking opportunities
                    to the users.
                </p>
                <a href="https://play.google.com/store/search?q=iren%20growthpad&hl=en" class="btn btn-success">
                    <i class="fa fa-download fa-fw"></i> Download our apps
                </a>
            </div>
        </div>


    <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/pexels-photo-96715.jpeg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Efficient service provision</h4>
                        <p class="card-text">The IREN Growthpad App offers access to vetted, predictable, accountable service providers through location based systems</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/tractor.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Productivity and business growth</h4>
                        <p class="card-text"> The IREN Growthpad offers flexibility for on demand services at the convenience of your phone</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/onions.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Networking opportunities</h4>
                        <p class="card-text">The IREN Growthpad App offers opportunity to grow your network value</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-8">
                <div class="card gradient" style="height: 94%;">
                    {{--<img class="card-img-top img-fluid" src="{{ asset('images/byron-92932_1920.jpg') }}" alt="Card image cap">--}}
                    <div class="card-body" style="padding-bottom: 7px;">
                        <h2 class="card-title" style="margin-top: 7px; color: #fff;">
                            <i class="fa fa-question-circle fa-fw"></i> About IREN
                        </h2>
                        <p class="card-text">
                            Established in 2001, the Inter Region Economic Network (IREN) has worked in rural
                            Eastern and Western Kenya with farmers, managed skills development initiatives for
                            youth and managed business competitions to promote Micro, Small and Medium Sized
                            Enterprises in the Eastern Africa region. For the last three years, IREN has been
                            working with farmers and necessity traders in Western Kenya’s Bungoma and Kakamega
                            Counties on issues of property rights, productivity and markets.
                        </p>
                        <a target="_blank" href="https://irenkenya.com" class="btn btn-outline-white">
                            Visit our website
                            <i class="fa fa-caret-right fa-fw"></i></a>
                    </div>
                </div>
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
        background: #ec1a24;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #cf1e24, #ec1a24);  /* Chrome 10-25, Safari 5.1-6 */
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
