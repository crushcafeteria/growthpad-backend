@extends('layout.admin.auth')

@section('authbox')

<div class="row">
    <div class="auth-content-wrapper full-page-wrapper d-flex align-items-center">
        <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
                <h3 class="card-title text-primary text-left mb-5 mt-4">Identify yourself, human!</h3>

                @if(@$_GET['new'])
                    <div class="alert alert-success" role="alert">
                        Your account is ready. Time to login
                    </div>
                @endif

                <form method="POST" action="{{ url('login') }}">
                    {{ csrf_field() }}  
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email address">
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-check-circle fa-fw"></i> Login
                        </button>
                        <br>
                        <br>
                        or
                        <br>
                        <a href="{{ url('register') }}">Register your account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection