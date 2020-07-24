@extends('layout.recipe')

@section('content')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1" style="height: 600px;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 ">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                    Submit your recipe
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- recepie_area_start  -->
    <div class="recepie_area">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 text-center pt-5">
                    <h2 style="line-height: 40px;">
                        <i class="fa fa-star-o fa-fw"></i>
                        Fill this form to get started!
                        <i class="fa fa-star-o fa-fw"></i>
                    </h2>
                </div>
            </div>
            <div class="row">

                <div class="col-8 offset-2">

                    @include('common.boxes')

                    {!! Form::open(['url' => url('submit/recipe')]) !!}

                    <div class="form-group">
                        <label>Full Names</label>
                        {!! Form::text('name', old('name'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('name'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Telephone</label>
                        {!! Form::text('telephone', old('telephone'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('telephone'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        {!! Form::text('email', old('email'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('email'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        {!! Form::text('country', old('country'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('country'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('country') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>County</label>
                        {!! Form::text('county', old('county'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('county'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('county') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Category in hospitality industry </label>
                        <select name="category" id="" class="form-control">
                            <option></option>
                            <option>Chef</option>
                            <option>Outside caterer</option>
                            <option>Hotel</option>
                            <option>Restaurant</option>
                        </select>
                        @if($errors->has('name'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Name of the indigenous(traditional) cuisine and ethnic group</label>
                        {!! Form::text('recipe_name', old('recipe_name'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('recipe_name'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('recipe_name') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Name the food category (drop down)</label>
                        <select name="food_category" id="" class="form-control">
                            <option></option>
                            <option>Snack</option>
                            <option>Breakfast</option>
                            <option>Dinner</option>
                            <option>Lunch</option>
                            <option>Beverage</option>
                        </select>
                        @if($errors->has('food_category'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('food_category') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>List the ingredients with exact measures</label>
                        {!! Form::textarea('ingredients', old('ingredients'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('ingredients'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('ingredients') }}
                            </small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Cooking method or procedure</label>
                        {!! Form::textarea('procedure', old('procedure'), ['class'=>'form-control form-control-lg']) !!}
                        @if($errors->has('procedure'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('procedure') }}
                            </small>
                        @endif
                    </div>

                    <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

@endsection
