@extends('layout.admin.master')

@section('content')

<h3 class="text-primary mb-4">Edit a marketplace contact</h3>
<hr>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                {!! Form::open(['url'=>url('admin/contact/save'), 'files'=>TRUE]) !!}

                {!! Form::hidden('id', $contact->id) !!}

                <div class="row">
                    <div class="col">
                        <fieldset class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', $contact->name, ['class'=>'form-control', 'placeholder'=>'Smartbee Enterprises...']) !!}
                            @if($errors->has('name'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('name') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                    <div class="col">
                        <fieldset class="form-group">
                            <label>Location</label>
                            {!! Form::text('location', $contact->location, ['class'=>'form-control', 'placeholder'=>'Khayega...']) !!}
                            @if($errors->has('location'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('location') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                    <div class="col">
                        <fieldset class="form-group">
                            <label>County</label>
                            {!! Form::select('county', config('settings.counties'), $contact->county, ['class'=>'form-control', 'placeholder'=>'Choose a county']) !!}
                            @if($errors->has('county'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('county') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                </div>

                <fieldset class="form-group">
                    <label>Picture</label>
                    {!! Form::file('picture', ['class'=>'form-control']) !!}
                    @if($errors->has('picture'))
                        <small class="text-danger">
                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('picture') }}
                        </small>
                    @endif
                </fieldset>

                <fieldset class="form-group">
                    <label>Contact Details</label>
                    <div class="row">
                        <div class="col">
                            {!! Form::text('contact_name', $contact->contact_name, ['class'=>'form-control', 'placeholder'=>'John Doe...']) !!}
                            @if($errors->has('contact_name'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('contact_name') }}
                                </small>
                            @endif
                        </div>
                        <div class="col">
                            {!! Form::text('contact_telephone', implode(', ', $contact->contact_telephone), ['class'=>'form-control', 'placeholder'=>'0700123456...']) !!}
                            @if($errors->has('contact_telephone'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('contact_telephone') }}
                                </small>
                            @endif
                        </div>
                        <div class="col">
                            {!! Form::text('email', implode(', ', $contact->email), ['class'=>'form-control', 'placeholder'=>'email@example.com...']) !!}
                            @if($errors->has('email'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('email') }}
                                </small>
                            @endif
                        </div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <label>Business Goals</label>
                    {!! Form::textarea('goals', $contact->goals, ['class'=>'form-control', 'placeholder'=>'To provide self employment...']) !!}
                    @if($errors->has('goals'))
                        <small class="text-danger">
                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('goals') }}
                        </small>
                    @endif
                </fieldset>

                <fieldset class="form-group">
                    <label>Products</label>
                    {!! Form::text('products', implode(', ', $contact->products), ['class'=>'form-control', 'placeholder'=>'Separate with commas...']) !!}
                    @if($errors->has('products'))
                        <small class="text-danger">
                            <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('products') }}
                        </small>
                    @endif
                </fieldset>

                <div class="row">
                    <div class="col">
                        <fieldset class="form-group">
                            <label>Value-chain Positioning</label>
                            {!! Form::text('positioning', $contact->positioning, ['class'=>'form-control', 'placeholder'=>'Processing...']) !!}
                            @if($errors->has('positioning'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('positioning') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                    <div class="col">
                        <fieldset class="form-group">
                            <label>Market Type</label>
                            {!! Form::select('market_type', config('settings.market_types'), $contact->market_type, ['class'=>'form-control', 'placeholder'=>'Choose a market size']) !!}
                            @if($errors->has('market_type'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('market_type') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                    <div class="col">
                        <fieldset class="form-group">
                            <label>Total Employees</label>
                            {!! Form::text('total_employees', $contact->total_employees, ['class'=>'form-control', 'placeholder'=>'5...']) !!}
                            @if($errors->has('total_employees'))
                                <small class="text-danger">
                                    <i class="fa fa-exclamation-circle fa-fw"></i> {{ $errors->first('total_employees') }}
                                </small>
                            @endif
                        </fieldset>
                    </div>
                </div>

                <button class="btn btn-success btn-lg"><i class="fa fa-save fa-fw"></i> Save changes</button>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>




    <div class="col-md-12">

        

    </div>

@endsection