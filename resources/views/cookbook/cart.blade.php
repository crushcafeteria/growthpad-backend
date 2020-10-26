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
                                    Your shopping cart
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
                <div class="col-12">
                    <a name="pesapal"></a>
                    @if ($items->count())
                        <table class="table table-bordered">
                            <tr>
                                <th>File Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            @php
                                $totalKES = 0;
                                $totalEUR = 0;
                            @endphp
                            @foreach ($items as $item)
                                @php
                                    $raw = $item->rawId();
                                    $item = config('cookbook.products')[$item->id];
                                    $totalKES = $totalKES + $item['price']['en'];
                                    $totalEUR = $totalEUR + $item['price']['de'];
                                @endphp
                                <tr>
                                    <td>{{ $item['name'][app()->getLocale('en')] }}</td>
                                    <td>
                                        {{ (app()->getLocale('en') == 'de') ? 'EUR' : 'KES' }}
                                        {{ $item['price'][app()->getLocale('en')] }}
                                    </td>
                                    <td>
                                        1
                                        <span class="float-right">
                                <a href="/cookbook/cart/remove/{{ $raw }}" class="text-danger">Remove Item</a>
                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Grand Total</th>
                                <th>
                                    {{ (app()->getLocale('en') == 'de') ? 'EUR' : 'KES' }}
                                    {{ (app()->getLocale('en') == 'de') ? $totalEUR : $totalKES }}
                                </th>
                                <th></th>
                            </tr>
                        </table>
                        <a href="/cookbook/cart/remove/all" class="text-danger">Remove everything</a>
                        <br>
                        <br>

                        {{-- @dump(session()->all()) --}}

                        <div class="col-12 text-center">
                            @if(app()->getLocale() == 'en')
                                @if(!request()->has('checkout'))
                                    <a href="/cookbook/cart/display?checkout=pesapal#pesapal"
                                       class="btn btn-success btn-lg mt-3 mb-5">
                                        <i class="fa fa-credit-card fa-fw"></i> Checkout with Pesapal
                                    </a>
                                    <a href="/cookbook/cart/display?checkout=mpesa#pesapal"
                                       class="btn btn-success btn-lg mt-3 mb-5">
                                        <i class="fa fa-credit-card fa-fw"></i> Lipa na M-PESA
                                    </a>
                                @else
                                    @if(request()->checkout == 'mpesa')

                                        <div class="row">
                                            <div class="col">
                                                <div class="card card-body">
                                                    <h4>Step 1: Lipa na M-PESA</h4>
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
                                                            5. Enter amount <b>{{ $totalKES }}</b>
                                                        </li>
                                                        <li class="list-group-item">
                                                            6. Enter your PIN and confirm
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card card-body text-center">
                                                    <h4>Step 2: Confirm your payment</h4>
                                                    <hr>

                                                    <div class="alert alert-info frmChecking">
                                                        We are checking for a payment from the number you used to
                                                        register ({{ auth()->user()->telephone }})
                                                    </div>
                                                    <div class="text-center frmLoader">
                                                        <img src="{{ asset('images/loading.gif') }}" width="300px">
                                                    </div>

                                                    <div class="alert alert-danger frmUnpaid">
                                                        <h5>Payment not found!</h5>
                                                        We have not received a payment
                                                        from {{ auth()->user()->telephone }}. Checking again in a bit...
                                                    </div>

                                                    <div class="alert alert-success frmPaid">
                                                        <h5>Payment Received!</h5>
                                                        We have received your payment via MPESA.
                                                        <a href="#!" class="btn btn-success btnComplete">Complete
                                                            Checkout</a>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>



                                        {{--                                        @dump(auth()->user())--}}


                                    @elseif(request()->checkout == 'pesapal')
                                        {!! $iframe !!}
                                    @endif
                                @endif
                            @else
                                <span id="paypal-button-container"></span>
                            @endif
                        </div>

                    @else
                        <div class="alert alert-danger">
                            You have not added anything to the cart
                        </div>

                        <a href="/cookbook" class="btn btn-success btn-lg btn-block">
                            Shop items here
                        </a>
                    @endif


                </div>
            </div>
        </div>
    </div>



@endsection

@push('footer-scripts')
    <script>
        var busy = false
        var payment;
        var token;

        $(function () {
            paypal.Buttons({
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: "EUR",
                                value: "{{ @$totalEUR }}"
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        alert('Transaction successfully completed. Please click OK and wait while we process...')
                        location.href = '/cookbook/paypal/success?payload=' + JSON.stringify(details) + '&total={{ @$totalEUR }}'
                    });
                }
            }).render('#paypal-button-container')

            // Detect payment
            $('.frmUnpaid, .frmPaid').hide()
            checkPayment()

            setInterval(function () {
                checkPayment()
            }, 10000)

            // Update busy
            setInterval(function () {
                // console.log(busy)
                if (busy) {
                    $('.frmLoader, .frmChecking').show()
                    $('.frmUnpaid, .frmPaid').hide()
                } else {
                    $('.frmLoader, .frmChecking').hide()
                }
            }, 500)

            $('.btnComplete').click(function () {
                window.location.href = '/cookbook/cart/mpesa/finish/' + token
            })

        })

        function checkPayment() {
            if (!busy) {
                busy = true
                fetch('{{ url('api/payment/detect?msisdn='. auth()->user()->telephone) }}')
                    .then(function (response) {
                        busy = false

                        if (response.status !== 200) {
                            console.log('Status ' + response.status + ' => An error occured while requesting for payment data')
                            return
                        }

                        response.json().then(function (res) {
                            // console.log(res)

                            if (res.status == 'FAILED') {
                                $('.frmUnpaid').show()
                                $('.frmPaid').hide()
                            } else {
                                $('.frmPaid').show()
                                $('.frmUnpaid').hide()
                                token = res.token
                            }
                        })
                    })
            }
        }

    </script>
@endpush
