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
                    <!-- <div class="list-group text-left">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small>Product Name</small>
                            <p class="mb-1">{{ $product['name'][app()->getLocale()] }}</p>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small>Price</small>
                            <p class="mb-1">Ksh {{ number_format($product['price'][app()->getLocale()]) }}</p>
                        </div>
                    </div> -->
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

                    @if(!request()->has('isCard') && auth()->check())
                        <a href="/cookbook/display/{{ encrypt($key) }}?isCard=true" class="btn btn-success btn-lg mt-5 mb-5">
                            <i class="fa fa-credit-card fa-fw"></i> Pay with card
                        </a>
                    @endif

                    @if(auth()->check())
                    <h3>How to buy with {{ (request()->has('isCard')) ? 'Pesapal' : 'M-PESA' }} </h3>
                    @endif

                    {{-- MPESA payment --}}
                    @if(!request()->has('isCard'))
                    <ul class="list-group list-group-flush">
                        @if(auth()->check())
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
                        @endif
                        @if(!auth()->check())
                        <li class="list-group-item">
                            1. <a href="/login">Login into</a> or <a href="/register">signup for</a> your
                            Growthpad account
                        </li>
                        <li class="list-group-item">
                            2. Your payment instructions will appear here.
                        </li>
                        @endif
                    </ul>
                    @endif

                    {{-- Card payments --}}
                    @if(request()->has('isCard'))
                        {!! $iframe !!}
                    @endif

                    @if(!auth()->check())
                        <a href="/login?next=/cookbook/purchase/{{ encrypt($key) }}" class="btn btn-success btn-lg mt-5">
                        <i class="fa fa-credit-card fa-fw"></i> Pay with MPESA or card
                    </a>
                    @else
                        <div class="col-12 text-center mt-5">
                        @if(!request()->has('isCard'))
                        <a href="#!" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-money fa-fw"></i> Confirm M-PESA payment
                        </a>
                        @endif

                    </div>
                    @endif

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
