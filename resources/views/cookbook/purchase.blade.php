@extends('layout.recipe')

@section('content')

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center" style="background-image: url('{{ asset('recipe/img/purchase.jpg') }}')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 ">
                    <div class="slider_text text-center">
                        <div class="text">
                            <h3>
                                {{ $product['name'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<div class="recepie_videoes_area">
    <div class="container">
        <div class="row">
            <div class="col-6 text-center">
                <div class="recepie_info">
                    <img src="http://placehold.it/400x400?text=image coming soon" class="img-thumbnail mb-5">
                    <!-- <div class="list-group text-left">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small>Product Name</small>
                            <p class="mb-1">{{ $product['name'] }}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small>Price</small>
                            <p class="mb-1">Ksh {{ number_format($product['price']) }}</p>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-6 text-center">
                <div class="recepie_info">
                    <h3>How to buy</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            1. Open the <b>M-PESA</b> menu in your phone
                        </li>
                        <li class="list-group-item">
                            2. Navigate to <b>Lipa Na M-PESA</b>
                        </li>
                        <li class="list-group-item">
                            3. Select <b>Buy Goods and Services</b>
                        </li>
                        <li class="list-group-item">
                            4. Enter till number <b>5164955</b>
                        </li>
                        <li class="list-group-item">
                            5. Enter amount <b>{{ $product['price'] }}</b>
                        </li>
                        <li class="list-group-item">
                            6. Enter your PIN and confirm
                        </li>
                    </ul>

                    <a href="/cookbook/purchase/{{ encrypt($key) }}/confirm" class="btn btn-primary btn-lg btn-block">
                        <i class="fa fa-money fa-fw"></i> Confirm Purchase
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection