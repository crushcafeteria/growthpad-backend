@extends('layout.admin.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    

                        <div class="">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                

                                
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('authbox')

<div class="row">
    <div class="content-wrapper full-page-wrapper d-flex align-items-center">
        <div class="card col-lg-4 offset-lg-4">
            <div class="card-block">
                <h3 class="card-title text-primary text-left mb-5 mt-4">Identify yourself, human</h3>

                <form method="POST" action="{{ route('login') }}">
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
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection