@extends('layout.master')

@section('page')

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row my-4">
            <div class="col-lg-5">
                <h4>Become a Growthpad service provider!</h2>
                <hr>
                <img class="img-fluid rounded" src="{{ asset('images/app.png') }}" alt="">
                <br>
                <br>
                <p>
                    IREN Growthpad helps service providers find new customers through location based systems. One can show the uniqueness of their work through the inventory that a service provider voluntarily adds. Direct contacts with the customers who locate their businesses online
                </p>
                <br>
                <h5>How it works</h5>
                <p>
                    To sign up and be listed on IREN Growthpad is simple and quick. The application form can be filled out in minutes. We need some information about your business and your location co-ordinates. We use your location as the center of your operating area and your business will come up in searches made by users within that radius. You will receive the order request, accept and seal the deal
                </p>
            </div>
            <div class="col-lg-7">
                <h4>Fill this form to get started!</h4>
                <hr>

                @include('common.boxes')

                {!! Form::open(['url' => url('onboard')]) !!}

                    <div class="form-group">
                        <label>Full Names</label>
                        {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
                        @if($errors->has('name'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Business Name</label>
                        {!! Form::text('business_name', old('business_name'), ['class'=>'form-control']) !!}
                        @if($errors->has('business_name'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('business_name') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        {!! Form::text('telephone', old('telephone'), ['class'=>'form-control']) !!}
                        @if($errors->has('telephone'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('telephone') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                        @if($errors->has('email'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Describe your business key activities</label>
                        {!! Form::text('activities', old('activities'), ['class'=>'form-control']) !!}
                        @if($errors->has('activities'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('activities') }}
                            </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Your location</label>
                        {!! Form::text('location', old('location'), ['class'=>'form-control']) !!}
                        @if($errors->has('location'))
                            <small class="text-danger">
                                <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('location') }}
                            </small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fa fa-check-circle fa-fw"></i> Get Started!
                    </button>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('footer-scripts')
<script>
    $('.geocomplete').geocomplete()
    function loadEnquiry(type) {
        $('#enquiry').modal('show').html(loading).load('enquiry/' + type)
    }
</script>

<style>
    p {
        text-align: justify;
    }

    .gradient {
        color: #fff;
        text-shadow: 0px 2px 4px rgba(0, 0, 0, .5);
        background: #ec1a24;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #cf1e24, #ec1a24);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #cf1e24, #ec1a24); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .btn-outline-white {
        color: grey;
        background-color: #fff;
        background-image: none;
        border-color: #fff;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, .5);
        text-shadow: none;

    }
</style>
@endpush
