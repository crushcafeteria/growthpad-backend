@extends('layout.admin.auth')

@section('authbox')

    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Login to Growthpad</h4>

        @if(@$_GET['new'])
            <div class="alert alert-success" role="alert">
                Your account is ready. Time to login
            </div>
        @endif

        <form method="POST" action="login">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email address">
                </div>
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                    </span>
                @endif
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
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
                <a href="register">Register your account</a>
                <br>
                <a href="password/reset">I forgot my password</a>
            </div>
        </form>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>

@endsection