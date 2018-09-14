@extends('layout.admin.master')

@section('title')
    {{ $ad->name }}
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="col mb-4">


                    <div class="btn-group pull-right" role="group">
                        <a href="{{ route('ads.index') }}" class="btn btn-warning pull-right">
                            <i class="fa fa-arrow-left fa-fw"></i> Back
                        </a>
                        <a href="{{ route('ads.edit', ['ad'=>$ad->id]) }}" class="btn btn-primary pull-right">
                            <i class="fa fa-edit fa-fw"></i> Edit
                        </a>
                    </div>
                    <h3>View advertisement</h3>
                </div>

                <div class="row">

                    {{--Images--}}
                    <div class="col-md-4">
                        <div class="slider">
                            @foreach($ad->pictures as $picture)
                                <div>
                                    <img class="d-block w-100" src="{{ $picture }}">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{--Ad info--}}
                    <div class="col-4">
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Item</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $ad->name }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Price</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">Ksh {{ number_format($ad->price) }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Location</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ @$ad->location }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Category</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ @$ad->category }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Publisher Info--}}
                    <div class="col-4">
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Name</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $ad->publisher->name }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Email</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">
                                        <a href="#">{{ $ad->email }}</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Telephone</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ $ad->telephone }}</h4>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <small class="text-muted">Publisher Gender</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <h4 class="mb-1">{{ config('settings.gender')[$ad->publisher->gender] }}</h4>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 mt-4">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">Description</h4>
                            <p>{{ $ad->description }}</p>
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