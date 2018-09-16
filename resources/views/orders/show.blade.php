@extends('layout.admin.master')

@section('title')
    Order #{{ $order->id }}
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row mb-4">
                    <div class="col pull-right">
                        <div class="btn-group pull-right" role="group">
                            <a href="{{ route('orders.index') }}" class="btn btn-warning pull-right">
                                <i class="fa fa-arrow-left fa-fw"></i> Back
                            </a>
                            <a href="{{ route('orders.edit', ['order'=>$order->id]) }}" class="btn btn-primary pull-right">
                                <i class="fa fa-edit fa-fw"></i> Manage
                            </a>
                        </div>
                        <h3>View @yield('title')</h3>
                    </div>
                </div>

                <div class="row">

                    {{--Product Info--}}
                    <div class="col-4">
                        <h4>Product Details</h4>
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Item</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $order->ad->name }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Price</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">Ksh {{ number_format($order->ad->price) }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Location</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ @$order->ad->location }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Posted under</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ @$order->ad->category }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Publisher info--}}
                    <div class="col-4">
                        <h4>Seller Details</h4>
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Name</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $order->ad->publisher->name }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Email</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">
                                        <a href="#">{{ $order->ad->email }}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Telephone</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $order->ad->telephone }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Gender</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ config('settings.gender')[$order->ad->publisher->gender] }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Images--}}
                    <div class="col-4">
                        <h4>Product Images</h4>
                        <div class="slider">
                            @foreach($order->ad->pictures as $picture)
                                <div>
                                    <img class="d-block w-100" src="{{ $picture }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mt-4">

                    {{--Order instructions--}}
                    <div class="col-6">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Order Instructions</h4>
                            <p>{{ $order->instructions}}</p>
                        </div>
                    </div>

                    {{--Customer Location--}}
                    <div class="col-6">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Customer Location</h4>
                            <p>{{ $order->description }}</p>
                        </div>
                    </div>
                </div>

                {{--Activity log--}}
                <div class="row mt-4">
                    <div class="col-12">

                        <a href="#" class="btn btn-secondary pull-right">
                            <i class="fa fa-plus-circle fa-fw"></i> Add a note
                        </a>
                        <h4><i class="fa fa-edit fa-fw"></i> Order Notes</h4>

                        <div class="list-group mt-3">
                            @foreach(range(0,20) as $value)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">List group item heading</h5>
                                        <small class="text-muted">
                                            <i class="fa fa-clock-o fa-fw"></i> 3 days ago
                                        </small>
                                    </div>
                                    <p class="mb-1">
                                        Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget
                                        risus varius blandit.
                                    </p>
                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection

@push('header-scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick-1.8.1/slick/slick-theme.css') }}"/>
@endpush

@push('footer-scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(function () {
            $('.slider').slick({
                dots: true,
                autoplay: true
            });
        })
    </script>
@endpush