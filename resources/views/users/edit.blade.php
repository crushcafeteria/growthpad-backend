@extends('layout.admin.master')

@section('title')
    Manage this account
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">

                            <h4 class="c-grey-900 mB-20 text-center">@yield('title')</h4>
                            <hr>

                            {!! Form::model($account, ['url' => route('users.update', ['id' => $account->id])]) !!}

                            @method('PUT')

                            <div class="form-group">
                                <label>Names</label>
                                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter your names...']) !!}
                                @if($errors->has('name'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Business Name</label>
                                {!! Form::text('business_name', old('business_name'), ['class' => 'form-control', 'placeholder' => 'Enter business name...']) !!}
                                @if($errors->has('business_name'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('business_name') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Business Category</label>
                                {!! Form::select('business_category', config('settings.categories'), old('business_category'), ['class' => 'form-control', 'placeholder' => 'Select a business category']) !!}
                                @if($errors->has('business_category'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('business_category') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter your email...']) !!}
                                @if($errors->has('email'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Telephone</label>
                                {!! Form::text('telephone', old('telephone'), ['class' => 'form-control', 'placeholder' => 'Enter your telephone...']) !!}
                                @if($errors->has('telephone'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                {!! Form::select('gender', config('settings.gender'), old('gender'), ['class' => 'form-control', 'placeholder' => 'Select a gender']) !!}
                                @if($errors->has('gender'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('gender') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Privileges</label>
                                {!! Form::select('privilege', config('settings.privileges'), old('privilege'), ['class' => 'form-control', 'placeholder' => 'Select a privilege']) !!}
                                @if($errors->has('privilege'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('privilege') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Tokens</label>
                                {!! Form::text('credits', old('credits'), ['class' => 'form-control', 'placeholder' => 'Tokens...']) !!}
                                @if($errors->has('credits'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('credits') }}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>County</label>
                                {!! Form::select('county', config('settings.counties'), old('county'), ['class' => 'form-control', 'placeholder' => 'Select a county']) !!}
                                @if($errors->has('county'))
                                    <small class="help-block text-danger">
                                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('county') }}
                                    </small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success btn-block btn-lg">
                                <i class="fa fa-check-circle fa-fw"></i> Save Changes
                            </button>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection