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
                                    <i class="fa fa-shopping-cart fa-fw"></i> {{ __('cookbook.buy_complete') }}
                                </a>

                                <a href="https://tours.growthpad.irenkenya.com" class="btn btn-warning btn-lg mt-5">
                                    <i class="fa fa-ticket fa-fw"></i> Explore local destinations
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
                        @if(app()->getLocale() == 'en')
                            <h2>Support WaWa Community by simply purchasing a recipe</h2>
                            <p>
                                ‘Chakula Chetu’ (Swahili for ‘Our Food’) IREN Growthpad recipe book initiative is
                                collaborating
                                with Making More Health to give women in rural Kenya an honourable livelihood through
                                promotion
                                of recipes that draw ingredients from agricultural produce in rural areas.
                            </p>
                            <p>
                                The recipe book, “Chakula Chetu: Indigenous Recipes from the Lake Region of Kenya”
                                promises
                                a
                                spiced culinary routine from indigenous nutritious dishes with a glance of scenic views
                                within
                                the region. By purchasing any recipe from this recipe book, you are actively supporting
                                community-led resilience and response systems to economically empower women in rural
                                Kenya
                                in a
                                dignified and sustainable way. 50% of proceeds from each sale are contributed towards
                                economically empowering women in Homabay County, Western Kenya through WaWa Self Help
                                Group.
                            </p>
                            <p>
                                WaWa is an NGO with a vision to provide a decent livelihood and a strong social support
                                network
                                for women in Homabay County, Western Kenya through fish farming.
                                <a target="_blank" class="text-primary"
                                   href="https://gokenyagofuture.org/2019/10/09/322/">Read More</a>
                            </p>
                            <p>
                                Making More Health is an initiative by Boehringer Ingelheim and Ashoka that aims to
                                create a
                                healthier world for people, animals and their community through social innovation.
                                <a target="_blank" class="text-primary" href="https://www.makingmorehealth.org/">Read
                                    more</a>
                            </p>
                        @else
                            <h2>Unterstütze die WaWa Community durch den Kauf eines unserer Rezepte</h2>
                            <p>
                                „Chakula Chetu: Traditionelle Rezepte aus der Seenregion Kenias“ (Chakula Chetu: Suaheli
                                für „Unser Essen“) ist ein kenianisches Rezeptbuch, das von dem Sozialunternehmer IREN
                                Growthpad in Kooperation mit der Initiative Making More Health entwickelt wurde. Durch
                                den Verkauf der Rezepte möchte das Projekt Frauen in den ländlichen Regionen Kenias
                                unterstützen.
                            </p>
                            <p>
                                Das Kochbuch bietet ein traditionelles Kocherlebnis, basierend auf vielseitigen
                                Rezepten, die einen Einblick in das Leben der Region gewähren. Wer nicht direkt das
                                gesamte Kochbuch erwerben möchte, kann hier auch einzelne Rezepte digital herunterladen
                                - 50% der Erträge durch jeden Verkauf kommen Projekten der NGO WAWA Kenya zu Gute.
                            </p>
                            <p>
                                Die Organisation WAWA Kenya unterstützt zurzeit mehr als 20 Frauen in Homabay County
                                (West-Kenia) dabei, sich und ihre Familien zu versorgen. Mehr Informationen findest Du
                                unter
                                <a target="_blank" class="text-primary"
                                   href="https://gokenyagofuture.org/2019/10/09/322/">Read More</a>
                            </p>
                            <p>
                                Making More Health ist eine Initiative von Boehringer Ingelheim und Ashoka, die es sich
                                zum Ziel gesetzt hat eine gesündere Welt für Menschen, Tiere und deren Gemeinschaft
                                durch soziale Innovationen zu gewährleisten. Mehr Informationen findest Du unter
                                <a target="_blank" class="text-primary" href="https://www.makingmorehealth.org/">Read
                                    more</a>
                            </p>
                        @endif
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
                <div class="col-12 text-center pt-2">
                    <a name="shop"></a>
                    <h2 style="line-height: 40px;">
                        <i class="fa fa-star-o fa-fw"></i>
                        {{ __('cookbook.purchase_our') }}
                        <i class="fa fa-star-o fa-fw"></i>
                    </h2>


                    <div class="row mt-5">
                        <div class="col text-right">
                            <a class="text-primary" href="/cookbook?filter=vegan#shop">{{ __('cookbook.vegan') }}</a>
                        </div>
                        <div class="col text-left">
                            <a class="text-primary" href="/cookbook?filter=meat#shop">{{ __('cookbook.meat') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $key => $product)

                    @if($product['name'][app()->getLocale()])
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card card-body p-0 mb-5">
                                <div class="single_recepie text-center">
                                    <div class="recepie_thumbx">
                                        <img src="{{ (strlen($product['picture'])) ? asset($product['picture']) : '/recipe/products/noimage.png' }}"
                                             class="img-fluid">
                                    </div>
                                    <h4 class="product-name mt-3">{{ @$product['name'][app()->getLocale()] }}</h4>
                                    <p class="text-center">
                                        {{ (app()->getLocale() == 'en') ? 'Ksh' : '€' }}
                                        {{ @number_format($product['price'][app()->getLocale()]) }}
                                    </p>
                                    <a href="/cookbook/display/{{ encrypt($key) }}"
                                       class="line_btn">{{ __('cookbook.buy_this') }}</a>
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

    <section class="bg-light mb-5">
        <div class="container">
            <div class="row pt-5 pb-5 mb-5">
                <div class="col-12 mb-3">
                    <h1>Videos</h1>
                </div>
                <div class="col">
                    <div class="videos_thumb">
                        <iframe width="100%" height="315" src="https://players.brightcove.net/1628196552001/default_default/index.html?videoId=6202567282001"
                                frameborder="0"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col">
                    <div class="videos_thumb">
                        <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/WFasJZ_lfCE"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

    </section>

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
                        @if(app()->getLocale() == 'en')
                            <h4 style="font-size: 30px;">Get your copy of Chakula Chetu today!</h4>
                            <p>
                                Full Chakula Chetu recipe book is available in soft copy at 40 euros. Individual soft
                                copy recipes available at 2 euros
                            </p>
                            <p class="mb-2">
                                On purchase, you will receive the recipes in a PDF file format for your daily use. Hard
                                copy versions of the recipe book are available only in Kenya at the following contact
                                details:
                            </p>
                            <ul class="pl-5 pt-3 pb-3">
                                <li>Send an email to chepchirchir@irenkenya.com</li>
                                <li>Or call +254 798 802 818</li>
                            </ul>
                            <p>
                                Enjoy your cooking!
                            </p>
                        @else
                            <h4 style="font-size: 30px;">Hol dir noch heute deine Ausgabe von Chakula Chetu!</h4>
                            <p class="mb-2">
                                Hole Dir noch heute Deine Ausgabe von Chakula Chetu!
                                Das gesamte „Chakula Chetu“-Kochbuch ist für 40€ in digitaler Form erhältlich. Einzelne
                                Rezepte erhältst Du ebenfalls digital für 2€ pro Rezept.
                                Nach Deiner Bestellung wirst Du die Rezepte in Form einer PDF-Datei für Deinen täglichen
                                Gebrauch erhalten. Gebundene Ausgaben des Kochbuchs sind nur in Kenia verfügbar, bei
                                Interesse kontaktiere uns gerne.

                            </p>
                            <ul class="pl-5 pt-3 pb-3">
                                <li>
                                    Schreibe uns eine E-Mail an chepchirchir@irenkenya.com
                                </li>
                                <li>
                                    Oder rufe uns an unter +254 798 802 818
                                </li>
                            </ul>
                            <p>
                                Viel Spaß beim Kochen!
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ download_app_area -->

    <style>
        p {
            text-align: justify !important;
        }
    </style>
@endsection
