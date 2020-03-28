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
                                    Enjoy Chakula Chetu kutoka Africa!
                                </h3>
                                <br>
                                <a href="/cookbook/buy" class="btn btn-success btn-lg">
                                    <i class="fa fa-shopping-cart fa-fw"></i> Buy our cookbook
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
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="recepie_info">
                        <h3>Why make you own indigenous food?</h3>
                        <p>
                            When we cook at home, we are in control of the healthier ingredients to use that are readily
                            available in the markets and budget friendly thus saving you money. Each recipe has
                            measurements for your portion control therefore eliminating unnecessary food waste.
                            Bring your family together and enjoy a traditional meal of a western Kenya cultural
                            background
                        </p>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="videos_thumb">
                        <div class="big_img">
                            <img src="/recipe/img/video/big.jpg" alt="">
                        </div>
                        <div class="small_thumb">
                            <img src="/recipe/img/video/small_1.png" alt="">
                        </div>
                        <div class="small_thumb_2">
                            <img src="/recipe/img/video/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ recepie_videos   -->

    <!-- recepie_area_start  -->
    <div class="recepie_area">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 text-center">
                    <h2 style="line-height: 55px;">
                        Kenyan Indigenous Food Recipes. A just published book in collaboration with local chefs, we put
                        together this special cookbook full of Kenya’s BEST indigenous food recipes from western Kenya!
                        The book is outstandingly irresistible as it details out how to prepare 16 traditional cuisines
                        from own produce for healthy eating.
                    </h2>
                </div>
            </div>
            <div class="row">
                @foreach(config('cookbook.products') as $key => $product)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single_recepie text-center">
                            <div class="recepie_thumbx">

                                <img src="{{ (strlen($product['picture'])) ? asset($product['picture']) : '/recipe/products/noimage.png' }}" class="img-fluid">
                            </div>
                            <h4 class="product-name mt-3">{{ $product['name'] }}</h4>
                            <p>Ksh {{ number_format($product['price']) }}</p>
                            <a href="/cookbook/purchase/{{ encrypt($key) }}" class="line_btn">Buy this cookbook</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

    <!-- download_app_area -->
    <div class="download_app_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="download_thumb">
                        <div class="big_img">
                            <img src="/recipe/img/video/big.jpg" alt="">
                        </div>
                        <div class="small_01">
                            <img src="/recipe/img/video/small_sm1.png" alt="">
                        </div>
                        <div class="small_02">
                            <img src="/recipe/img/video/sm2.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="download_text">
                        <h3 style="font-size: 60px">Get your cookbook from our app!</h3>
                        <p class="mb-5">
                            You will receive the recipe in a PDF file which can be read using any PDF reader.
                            Can be accessed on all devices: laptop, smartphone, tablets, ipad. The PDF file is
                            also printer friendly if you so wish to have a recipe paper trail.
                            <br>
                            Enjoy your cooking!
                        </p>
                        <div class="download_android_apple">
                            <a target="_blank"
                               href="https://play.google.com/store/apps/details?id=com.irenkenya.growthpad.customer.app&hl=en">
                                <div class="download_link d-flex d-block">
                                    <i class="fa fa-android"></i>
                                    <div class="store">
                                        <h5>Download</h5>
                                        <p>from Google Play Store</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ download_app_area -->

    <!-- footer  -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <p class="copy_right text-center">
                            Developed with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                            <a href="https://sodium.co.ke" target="_blank">Sodium Africa</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer  -->

@endsection
