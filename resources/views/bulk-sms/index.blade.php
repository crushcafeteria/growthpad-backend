@extends('layout.admin.master')

@section('title')
    Bulk Messaging
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">

                    @if(@$_GET['sent'])
                        <div class="col-md-6 offset-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Success!</h5>
                                    <p class="card-text">
                                        Your bulk messages have been successfully queued for delivery
                                    </p>
                                    <a href="{{ url('dashboard') }}" class="btn btn-primary">Go Home</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 offset-3">
                            <div class="bgc-white bd bdrs-3 p-20 mB-20">

                                <h4 class="c-grey-900 mB-20 text-center">@yield('title')</h4>
                                <hr>

                                <div class="alert alert-primary text-center" role="alert">
                                    This message will be sent to all customers in the database
                                </div>

                                {!! Form::open(['url' => url('sms')]) !!}

                                <div class="form-group">
                                    <label>Recipient Group</label>
                                    {!! Form::select('group', config('settings.recipient_groups'), '', ['class' => 'form-control', 'placeholder' => 'Select a recipient category']) !!}
                                    @if($errors->has('group'))
                                        <small class="help-block text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('group') }}
                                        </small>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    {!! Form::textarea('message', old('message'), ['class' => 'form-control', 'placeholder' => 'Type your message here...']) !!}
                                    @if($errors->has('message'))
                                        <small class="help-block text-danger">
                                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('message') }}
                                        </small>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success btn-lg btn-lg">
                                    <i class="fa fa-send fa-fw"></i> Send Message
                                </button>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </main>
@endsection