@extends('layout.master')

@section('page')


    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row my-4">
            <div class="col-lg-7">
                <img class="img-fluid rounded" src="{{ asset('images/tractor-grain-mixer-rural-denmark-53622.jpeg') }}" alt="">
            </div>
            <div class="col-lg-5">
                <h2>The IREN Growthpad</h2>
                <p style="font-size: 18px;">
                    The IREN Growth-Pad offers efficient service provision and networking opportunities
                    to users at both farm and vendor level. The Growth-Pad features annual IREN Bukura
                    Trade and Cultural Fair that enable participants to trade and network, Buni Umiliki
                    (Innovate and Own) radio program and the online service provision platform. The key
                    IREN Growth-Pad products and services can be found below
                </p>
                <a class="btn btn-outline-success" href="{{ url('market') }}">
                    <i class="fa fa-exchange fa-fw"></i> Connect with our contacts
                </a>
            </div>
        </div>


    <!-- Content Row -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/pexels-photo-96715.jpeg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Farm Management</h4>
                        <p class="card-text">We organize and operate activities on your farm to maximize productivity and profits</p>
                        <a href="#_" class="btn btn-primary btn-sm" onclick="loadEnquiry('farm-management')">More
                            <i class="fa fa-caret-right fa-fw"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/tractor-2487106_1920.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Leasing Solutions</h4>
                        <p class="card-text">We avail modern technology to increase efficiency at farm and vendor levels</p>
                        <a href="#_" class="btn btn-primary btn-sm" onclick="loadEnquiry('leasing')">More
                            <i class="fa fa-caret-right fa-fw"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/onions-1397037_1920.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Market Linkages</h4>
                        <p class="card-text">We offer opportunities and network to increase market reach</p>
                        <a href="#_" class="btn btn-primary btn-sm" onclick="loadEnquiry('market-growth')">More
                            <i class="fa fa-caret-right fa-fw"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img class="card-img-top img-fluid" src="{{ asset('images/byron-92932_1920.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Formalization and Consulting</h4>
                        <p class="card-text">We advice on property rights and formalization to unlock capital </p>
                        <a href="#" class="btn btn-primary btn-sm" onclick="loadEnquiry('consulting')">More
                            <i class="fa fa-caret-right fa-fw"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-8">
                <div class="card gradient" style="height: 94%;">
                    {{--<img class="card-img-top img-fluid" src="{{ asset('images/byron-92932_1920.jpg') }}" alt="Card image cap">--}}
                    <div class="card-body">
                        <h2 class="card-title" style="margin-top: 7px;">
                            <i class="fa fa-question-circle fa-fw"></i> About IREN
                        </h2>
                        <p class="card-text lead">
                            Established in 2001, the Inter Region Economic Network (IREN) has worked in rural
                            Eastern and Western Kenya with farmers, managed skills development initiatives for
                            youth and managed business competitions to promote Micro, Small and Medium Sized
                            Enterprises in the Eastern Africa region. For the last three years, IREN has been
                            working with farmers and necessity traders in Western Kenya’s Bungoma and Kakamega
                            Counties on issues of property rights, productivity and markets.
                        </p>
                        <a target="_blank" href="https://irenkenya.com" class="btn btn-outline-white">Visit our website
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
        $('#enquiry').modal('show').html(loading).load('{{ url('enquiry') }}/' + type)
    }
</script>

<style>
    p {
        text-align: justify;
    }

    .gradient {
        background: #56ab2f; /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #a8e063, #56ab2f); /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #a8e063, #56ab2f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: #fff;
        text-shadow: 0px 2px 4px rgba(0, 0, 0, .5);
    }

    .gradient p {
        font-weight: bold !important;
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