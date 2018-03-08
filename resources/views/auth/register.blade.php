@extends('layout.admin.auth')

@section('authbox')

<div class="row">
    <div class="auth-content-wrapper full-page-wrapper d-flex align-items-center">
        <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
                <h3 class="card-title text-primary text-left mb-5 mt-4">Signup for a GrowthPad account</h3>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Full names">
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-open"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <select id="county" class="form-control" name="county" required>
                                <option value="">Choose a county</option>
                                @foreach(config('settings.counties') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('county'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('county') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                            <input id="telephone" type="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}" required placeholder="Telephone">
                        </div>
                        @if ($errors->has('telephone'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                            <select id="gender" class="form-control" name="gender" required>
                                <option value="">Choose your gender</option>
                                @foreach(config('settings.gender') as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('gender'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('gender') }}
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-6 ml-0">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('password') }}
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6 mr-0">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat password">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-check-circle fa-fw"></i> Register
                        </button>
                        <br>
                        <br>
                        or
                        <br>
                        <a href="{{ url('login') }}">Log into your account</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection