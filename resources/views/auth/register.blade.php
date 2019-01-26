@extends('layout.admin.auth')

@section('authbox')

    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width:320px">

        <h4 class="fw-300 c-grey-900 mB-40">
            Register a {{config('app.name')}} account
        </h4>

        <form class="form-horizontal" method="POST" action="register">

            {{ csrf_field() }}

            <div class="form-group">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                       required autofocus placeholder="Full names">
                @if ($errors->has('name'))
                    <span class="help-block text-danger">
                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                       placeholder="Email">
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                </span>
                @endif
            </div>

            {{-- <div class="form-group">
                <select id="county" class="form-control" name="county" required>
                    <option value="">Choose a county</option>
                    @foreach(config('settings.counties') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('county'))
                    <span class="help-block text-danger">
                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('county') }}
                </span>
                @endif
            </div> --}}

            <div class="form-group">
                <input id="telephone" type="telephone" class="form-control" name="telephone" value="{{ old('telephone') }}"
                       required placeholder="Telephone">
                @if ($errors->has('telephone'))
                    <span class="help-block text-danger">
                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <select id="gender" class="form-control" name="gender" required>
                    <option value="">Choose your gender</option>
                    @foreach(config('settings.gender') as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('gender'))
                    <span class="help-block text-danger">
                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('gender') }}
                </span>
                @endif
            </div>

            <div class="row">
                <div class="col-6 ml-0">
                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" required
                               placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('password') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-6 mr-0">
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required placeholder="Repeat password">
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
                <a href="login">Log into your account</a>
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