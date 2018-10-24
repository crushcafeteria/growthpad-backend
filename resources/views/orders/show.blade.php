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
                            <a target="_blank" href="{{ url('orders/'.$order->id.'/pdf') }}" class="btn btn-success pull-right">
                                <i class="fa fa-file-pdf-o fa-fw"></i> Print
                            </a>
                        </div>
                        <h3>View @yield('title')</h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">
                        @include('common.boxes')
                    </div>

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
                                    <h4 class="mb-1">{{ @$order->ad->location->display_name }}</h4>
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

                            @if($order->ad->category == 'CATERING')
                                <h4 class="c-grey-900 mB-20">Catering Options</h4>
                                <div class="list-group">
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <small class="text-muted">Event Type</small>
                                        <div class="d-flex w-100 justify-content-between">
                                            <h4 class="mb-1">{{ config('settings.catering.event_types')[$order->extra_data['type']] }}</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <small class="text-muted">Event Venue</small>
                                        <div class="d-flex w-100 justify-content-between">
                                            <h4 class="mb-1">{{ config('settings.catering.venues')[$order->extra_data['venue']] }}</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <small class="text-muted">Location</small>
                                        <div class="d-flex w-100 justify-content-between">
                                            <h4 class="mb-1">{{ $order->extra_data['location']['display_name'] }}</h4>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <small class="text-muted">Number of attendees</small>
                                        <div class="d-flex w-100 justify-content-between">
                                            <h4 class="mb-1">{{ $order->extra_data['attendees'] }} people might attend</h4>
                                        </div>
                                    </div>
                                </div>

                            @endif
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
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus-circle fa-fw"></i> Add a note
                        </button>
                        <h4>
                            <i class="fa fa-comments fa-fw"></i> Staff Notes - {{ $order->logs->count() }}
                        </h4>
                        <div class="list-group mt-3">
                            @foreach($order->logs as $log)
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <p class="mb-1">
                                        {{ $log->message }}
                                    </p>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="text-muted">
                                            <i class="fa fa-user-circle fa-fw"></i> Written by {{ $log->_publisher->name }}
                                        </small>
                                        <small class="text-muted pull-right">
                                            <i class="fa fa-clock-o fa-fw"></i> {{ $log->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Add staff note -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a note on this order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'orders/'.$order->id.'/note']) !!}
                    <div class="form-group">
                        <label>Message</label>
                        {!! Form::textarea('note', null, ['placeholder'=>'Type your message...', 'class'=>'form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="$('form').submit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
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