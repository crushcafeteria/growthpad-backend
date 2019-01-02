@extends('layout.admin.auth')

@section('authbox')

    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Reset your password</h4>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
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

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success">
                    Send Password Reset Link
                </button>
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