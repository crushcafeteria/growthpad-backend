@extends('layout.master')

@section('header')
    <div class="blog-header">
        <div class="container">
            <h3 class="blog-title">Vendors</h3>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
        <hr>
    </div>
@endsection

@section('page')

    <div class="col-md-9">

        <div class="card-deck">
            @foreach($vendors as $vendor)
                <div class="col-sm-4" style="margin-bottom: 20px;">
                    <div class="card">
                        <img class="img-fluid card-img-top" src="elliot.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                <a href="{{ url('products/list/'.$vendor->id) }}">{{ $vendor->name }}</a></h5>
                            <p class="card-text">
                                {{ count($vendor->products) }} available
                            </p>
                        </div>
                    </div>
                </div>
                {{--{{ dump($vendor->products) }}--}}
            @endforeach
        </div>

        {{ $vendors->links('vendor.pagination.bootstrap-4') }}


    </div><!-- /.blog-main -->

    <div class="col-sm-3 blog-sidebar">
        @include('vendor.stats')
        <br>
        @include('product.compare')
    </div>

@endsection