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
                                    {{--<a href="/cart/display?checkout=pesapal" class="btn btn-success btn-lg mt-5 mb-5">--}}
                                        {{--<i class="fa fa-credit-card fa-fw"></i> Pay with Pesapal--}}
                                    {{--</a>--}}
                                @else
                                    {!! $iframe !!}
                                @endif
                            @else
                            @endif
                            <span id="paypal-button-container"></span>
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
        $(function () {
            paypal.Buttons({
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: "EUR",
                                value: "{{ $totalEUR }}"
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        alert('Transaction successfully completed. Please click OK and wait while we process...')
                        location.href = '/cookbook/paypal/success?payload=' + JSON.stringify(details) + '&total={{ $totalEUR }}'
                    });
                }
            }).render('#paypal-button-container')
        })

    </script>
@endpush
