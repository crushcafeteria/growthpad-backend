@extends('layout.recipe')

@section('content')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center"
             style="background-image: url('{{ asset('recipe/img/purchase.jpg') }}')">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 ">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                    {{ $product['name'][app()->getLocale()] }}
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
                        <img src="{{ $product['picture'] }}" class="img-thumbnail mb-5">
                        <div class="list-group text-left">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small>Product Name</small>
                                <p class="mb-1">{{ $product['name'][app()->getLocale()] }}</p>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small>Price</small>
                                <p class="mb-1">Ksh {{ number_format($product['price'][app()->getLocale()]) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 text-left">
                    <div class="recepie_info">
                        @if($product['nutrients'])
                            <h3>Nutrient Value</h3>
                            <p>
                                {!! $product['nutrients'] !!}
                            </p>
                        @endif
                        <h4 class="mb-4">
                            Price: {{ (session()->get('locale') == 'de') ? 'EUR' : 'KES' }} {{ $product['price'][app()->getLocale()] }}
                        </h4>

                        <a href="{{ url('cookbook/cart/add/'.$key) }}" class="btn btn-primary btn-lg">
                            <i class="fa fa-shopping-cart fa-fw"></i> Add to cart
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 10000000;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Enter your MPESA payment code</label>
                        <input type="text" class="form-control txtCode">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btnCheck">Confirm Payment</button>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check())
        <script>
            $(function () {
                $('.btnCheck').click(function () {
                    if (!$('.txtCode').val()) {
                        alert('Please enter your payment code');
                        return false;
                    }

                    $.get('https://growthpad.irenkenya.com/api/payment/detect/' + $('.txtCode').val() + '?msisdn={{ auth()->user()->telephone }}', function (res) {
                        if (res['status'] == 'FAILED') {
                            alert(res['error'])
                        } else {
                            alert('Payment confirmed..0 Thank you and enjoy your meal!')
                            location.href = '/cookbook/dl/{{ encrypt($key) }}/' + res['token']
                        }
                    });
                });
            });
        </script>
    @endif

@endsection
