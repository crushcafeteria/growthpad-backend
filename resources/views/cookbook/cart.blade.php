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
                            @foreach ($items as $item)
                                @php
                                    $raw = $item->rawId();
                                    $item = config('cookbook.products')[$item->id];
                                @endphp
                                <tr>
                                    <td>{{ $item['name'][session()->get('locale')] }}</td>
                                    <td>
                                        {{ (session()->get('locale') == 'de') ? 'EUR' : 'KES' }}
                                        {{ $item['price'][session()->get('locale')] }}
                                    </td>
                                    <td>
                                        1
                                        <span class="float-right">
                                            <a href="/cookbook/cart/remove/{{ $raw }}" class="text-danger">Remove Item</a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                        <a href="/cookbook/cart/remove/all" class="text-danger">Remove everything</a>
                        <br>
                        <br>

                        <a href="/cookbook/cart/checkout" class="btn btn-success btn-lg btn-block">
                            <i class="fa fa-credit-card fa-fw"></i> Pay with card
                        </a>
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
