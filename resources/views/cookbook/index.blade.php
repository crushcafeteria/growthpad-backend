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

    <!-- recepie_videos   -->
    <div class="recepie_videoes_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="recepie_info">
                        <h2>Support WaWa Community by simply purchasing a recipe</h2>
                        <p>
                            ‘Chakula Chetu’ (Swahili for ‘Our Food’) IREN Growthpad recipe book initiative is
                            collaborating
                            with Making More Health to give women in rural Kenya an honourable livelihood through
                            promotion
                            of recipes that draw ingredients from agricultural produce in rural areas.
                        </p>
                        <p>
                            The recipe book, “Chakula Chetu: Indigenous Recipes from the Lake Region of Kenya” promises
                            a
                            spiced culinary routine from indigenous nutritious dishes with a glance of scenic views
                            within
                            the region. By purchasing any recipe from this recipe book, you are actively supporting
                            community-led resilience and response systems to economically empower women in rural Kenya
                            in a
                            dignified and sustainable way. 50% of proceeds from each sale are contributed towards
                            economically empowering women in Homabay County, Western Kenya through WaWa Self Help Group.
                        </p>
                        <p>
                            WaWa is an NGO with a vision to provide a decent livelihood and a strong social support
                            network
                            for women in Homabay County, Western Kenya through fish farming.
                            <a class="text-primary" href="https://gokenyagofuture.org/2019/10/09/322/">Read More</a>
                        </p>
                        <p>
                            Making More Health is an initiative by Boehringer Ingelheim and Ashoka that aims to create a
                            healthier world for people, animals and their community through social innovation.
                            <a class="text-primary" href="https://www.makingmorehealth.org/">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ recepie_videos   -->

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
                        Purchase our {{ (request()->has('filter')) ? request()->filter : null }} recipes
                        <i class="fa fa-star-o fa-fw"></i>
                    </h2>


                    <div class="row mt-5">
                        <div class="col text-right">
                            <a class="text-primary" href="/cookbook?filter=vegan#shop">Show vegan recipes only</a>
                        </div>
                        <div class="col text-left">
                            <a class="text-primary" href="/cookbook?filter=meat#shop">Show meat recipes only</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $key => $product)

                    @if($product['name'][app()->getLocale('en')])
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card card-body p-0 mb-5">
                                <div class="single_recepie text-center">
                                    <div class="recepie_thumbx">
                                        <img src="{{ (strlen($product['picture'])) ? asset($product['picture']) : '/recipe/products/noimage.png' }}"
                                             class="img-fluid">
                                    </div>
                                    <h4 class="product-name mt-3">{{ @$product['name'][app()->getLocale('en')] }}</h4>
                                    <p>
                                        {{ (app()->getLocale() == 'en') ? 'Ksh' : '€' }}
                                        {{ @number_format($product['price'][app()->getLocale()]) }}
                                    </p>
                                    <a href="/cookbook/display/{{ encrypt($key) }}" class="line_btn">Buy this recipe</a>
                                </div>
                            </div>
                        </div>
                    @endif
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
                        <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/4JGypwuPzr4"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
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
