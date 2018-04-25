@extends('layout.master')

@section('header')
    <div class="blog-header">
        <div class="container">
            <a href="{{ secure_url('services') }}" class="btn btn-danger btn-lg float-right"><i class="fa fa-caret-left"></i> Back to services</a>
            <h3 class="blog-title">My Shopping Basket</h3>
            <p class="lead blog-description">Items you are about to purchase</p>
        </div>
        <hr>
    </div>
@endsection

@section('page')


    <div class="col-md-12">

        @if($cart)
            @php
                $total = 0;
            @endphp

            <div class="list-group">
                @foreach($cart as $product)
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $product->name }}</h5>
                            <small class="text-muted">Ksh {{ number_format($product->price) }}</small>
                        </div>
                        {{--                            <small class="text-muted">Sold by {{ $product->vendor->name }}</small>--}}
                        <small class="text-muted float-right">
                            <a href="{{ secure_url('remove/from/cart/'.$product->id) }}" class="text-danger">Remove from cart</a>
                        </small>
                    </div>

                    @php
                        $total = $total + $product->price;
                    @endphp
                @endforeach
                <div class="list-group-item list-group-item-action flex-column align-items-start active">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Grand Total</h5>
                        <h5 class="mb-1">Ksh {{ $total }}</h5>
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-success btn-lg">Complete your order</button>

        @else

            <div class="col-6 offset-3" style="margin-top: 40px;">
                <div class="card card-block text-center">
                    <i class="fa fa-frown-o fa-4x"></i>
                    <h2>Empty basket!</h2>
                    <br>
                    <br>
                    <a href="{{ secure_url('services') }}" class="btn btn-secondary"><i class="fa fa-search fa-fw"></i> Shop for a service</a>
                </div>
            </div>

        @endif


    </div>

@endsection