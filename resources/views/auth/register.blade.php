@extends('layout.admin.auth')

@section('authbox')

<div class="row">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center">
        <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
                <h3 class="card-title text-primary text-left mb-5 mt-4">Signup for an account</h3>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
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



                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
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
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repeat password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
  
@endsection