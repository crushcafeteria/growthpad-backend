@extends('layout.recipe')

@section('content')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 ">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                    Chakula Chetu Recipe Book
                                </h3>
                                <br>
                                <img src="{{ asset('images/MMH_logo.png') }}" width="150">
                                <br>
                                <a href="/cookbook/purchase/{{ encrypt(0) }}" class="btn btn-success btn-lg mt-5">
                                    <i class="fa fa-shopping-cart fa-fw"></i> Buy complete recipe book
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    {{--<!-- recepie_videos   -->--}}
    {{--<div class="recepie_videoes_area">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xl-6 col-lg-6 col-md-6">--}}
                    {{--<div class="recepie_info">--}}
                        {{--<h2>Indigenous Food Recipes of Kenya</h2>--}}
                        {{--<p>--}}
                            {{--Chakula Chetu published by the Inter Region Economic Network (IREN Kenya) offers details on--}}
                            {{--how to prepare indigenous recipes developed by home chefs from western Kenya Region. The--}}
                            {{--book consists of tourist sights and sound guides to the region from scenic Lake Simbi Nyaima--}}
                            {{--in Homa Bay County to the rock art at Kakapel in Busia County--}}
                        {{--</p>--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-md-6">--}}
                    {{--<div class="videos_thumb">--}}
                        {{--<img src="/recipe/img/1.jpg" class="img-fluid img-rounded img-thumbnail">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!--/ recepie_videos   -->--}}

    {{--<!-- recepie_videos   -->--}}
    {{--<div class="recepie_videoes_area">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xl-6 col-lg-6 col-md-6 order-2">--}}
                    {{--<div class="recepie_info">--}}
                        {{--<h2>Explore the foods of Western Kenya!</h2>--}}
                        {{--<p>--}}
                            {{--Carefully selected recipes developed by home chefs and guided by nutritional experts are--}}
                            {{--an offer. This is a journey to activate cash flow in rural economies and ultimately link--}}
                            {{--them to famous Kenyan tourist circuits.  Your purchase makes the first mile of the--}}
                            {{--journey possible!--}}
                        {{--</p>--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-6 col-md-6 order-1">--}}
                    {{--<div class="videos_thumb">--}}
                        {{--<img src="/recipe/Boiled Black Nightshade (Esufuwa).jpg" class="img-fluid img-rounded img-thumbnail">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!--/ recepie_videos   -->--}}

    <!-- recepie_area_start  -->
    <div class="recepie_area">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 text-center pt-5">
                    <a name="shop"></a>
                    <h2 style="line-height: 40px;">
                        <i class="fa fa-star-o fa-fw"></i>
                        Purchase our recipes
                        <i class="fa fa-star-o fa-fw"></i>
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach(config('cookbook.products') as $key => $product)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="card card-body p-0 mb-5">
                            <div class="single_recepie text-center">
                                <div class="recepie_thumbx">
                                    <img src="{{ (strlen($product['picture'])) ? asset($product['picture']) : '/recipe/products/noimage.png' }}"
                                         class="img-fluid">
                                </div>
                                <h4 class="product-name mt-3">{{ $product['name'][app()->getLocale()] }}</h4>
                                <p>
                                    {{ (app()->getLocale() == 'ke') ? 'Ksh' : '€' }}
                                    {{ number_format($product['price'][app()->getLocale()]) }}
                                </p>
                                <a href="/cookbook/display/{{ encrypt($key) }}" class="line_btn">Buy this recipe</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12">
                    <div class="alert alert-success text-center">
                        You will be asked to login or register a Growthpad account before purchasing items
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

    <!-- download_app_area -->
    <div class="download_app_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="videos_thumb">
                        <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/4JGypwuPzr4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="download_text">
                        <h4 style="font-size: 30px;">Get your copy of Chakula Chetu today!</h4>
                        <p class="mb-2">
                            Full Chakula Chetu recipe book is available in soft copy at Kshs. 3,500
                            Individual soft copy recipes available at Kshs. 100
                        </p>
                        <p>
                            On purchase you will receive the recipes in a PDF file format for your daily use.
                            To get the full Chakula Chetu book in hard copy at Kshs. 3,500
                        <ul class="pl-5 pt-3 pb-3">
                            <li>Send an email to chepchirchir@irenkenya.com</li>
                            <li>Or call +254 798 802 818</li>
                        </ul>

                        </p>
                        <p>
                            Enjoy your cooking!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ download_app_area -->

@endsection
