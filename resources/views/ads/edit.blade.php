@extends('layout.admin.master')

@section('title')
    Edit ad
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="col mb-4">


                    <div class="btn-group pull-right" role="group">
                        <a href="{{ route('ads.show', ['ad'=>$ad->id]) }}" class="btn btn-warning pull-right">
                            <i class="fa fa-arrow-left fa-fw"></i> Back
                        </a>
                        <a href="{{ route('ads.index', ['ad'=>$ad->id]) }}" class="btn btn-primary pull-right">
                            <i class="fa fa-list fa-fw"></i> List all ads
                        </a>
                    </div>
                    <h3>
                        <i class="fa fa-edit fa-fw"></i> Edit advertisement
                    </h3>
                </div>

                <div class="row">

                    <div class="col-12">
                        {!! Form::model($ad, ['url' => 'ads/'.$ad->id, 'method'=>'POST']) !!}

                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Title</label>
                                    {{ Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Ad name...']) }}
                                    @if($errors->has('name'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    {!! Form::select('category', config('settings.categories'), old('category'), ['class'=>'form-control']) !!}
                                    @if($errors->has('category'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('category') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Ksh</span>
                                        </div>
                                        {{ Form::text('price', old('price'), ['class'=>'form-control', 'placeholder'=>'Price...']) }}
                                    </div>
                                    @if($errors->has('price'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('price') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    {{ Form::text('telephone', old('telephone'), ['class'=>'form-control', 'placeholder'=>'Telephone...']) }}
                                    @if($errors->has('telephone'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    {{ Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Email...']) }}
                                    @if($errors->has('email'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Location</label>
                                    {{ Form::text('location', old('location'), ['class'=>'form-control', 'placeholder'=>'Location...']) }}
                                    @if($errors->has('location'))
                                        <small class="text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('location') }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            {{ Form::textarea('description', old('description'), ['class'=>'form-control', 'placeholder'=>'Ad description...']) }}
                            @if($errors->has('description'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('description') }}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                <i class="fa fa-check-circle fa-fw"></i> Save Changes
                            </button>
                        </div>

                        {!! Form::close() !!}
                    </div>

                    {{--{{ dump($ad) }}--}}

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