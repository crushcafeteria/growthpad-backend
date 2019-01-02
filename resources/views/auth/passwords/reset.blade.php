@extends('layout.admin.auth')

@section('authbox')

    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Change your password</h4>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Type new password">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block text-danger">
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('password') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input id="password" type="password" class="form-control" name="password_confirmation" required placeholder="Type new password again">
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block text-danger">
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('password_confirmation') }}
                    </span>
                @endif
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Change Password
                    </button>
                </div>
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