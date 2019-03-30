@extends('layout.master')

@section('page')

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row my-4">
            <div class="col-lg-5">
                <h4>Become a Growthpad service provider!</h4>
                <hr>
                <img class="img-fluid rounded" src="{{ asset('images/app.png') }}" alt="">
                <br>
                <br>
                <p>
                    The IREN Growthpad mobile app offers customers access to your services at the convenience of their phones.
                </p>
                <br>

                <h4>How it works</h4>
                <hr>
                <p>
                    To sign up and be listed on the IREN Growthpad mobile app is simple and quick. Fill the application
                    form on the right. The IREN Growthpad team will get in touch and take you through the
                    vetting process for accreditation.
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
                        <i class="fa fa-check-circle fa-fw"></i> Submit
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
