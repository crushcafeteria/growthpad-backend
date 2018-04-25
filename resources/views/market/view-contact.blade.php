@extends('layout.master')

@section('header')
    <div class="blog-header">
        <div class="container">

            <div class="col-4 float-right">
                <a href="{{ secure_url('market') }}" class="btn btn-warning float-right">
                    <i class="fa fa-caret-left fa-fw"></i> Go Back
                </a>
            </div>

            <h3 class="blog-title"><i class="fa fa-building fa-fw"></i> {{ $contact->name }}</h3>
            <p class="lead blog-description">
                <i class="fa fa-map-marker fa-fw"></i> {{ $contact->location }}, {{ config('settings.counties')[$contact->county] }}
            </p>
        </div>
        <hr>
    </div>
@endsection

@section('page')

    <div class="col-md-12" style="min-height: 550px">


        <div class="frmList">
            @include('common.boxes')

            <div class="row">
                <div class="col-6">
                    <img src="{{ (!$contact->picture) ? 'http://via.placeholder.com/600x400?text='.$contact->name : $contact->picture }}" class="img-fluid img-thumbnail">
                </div>

                <div class="col-6">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small class="text-muted">Contact Person</small>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $contact->contact_name }}</h5>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small class="text-muted">Market Positioning</small>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $contact->positioning }}</h5>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <small class="text-muted">Products</small>
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">
                                    @if($contact->products)
                                        @foreach($contact->products as $product)
                                            <span class="badge badge-secondary">{{ $product }}</span>
                                        @endforeach
                                    @else
                                        N/A
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>

                    <br>

                    <button class="btn btn-success"  data-toggle="modal" data-target="#connectModal"><i class="fa fa-exchange fa-fw"></i> Connect with this contact</button>
                </div>
            </div>

            {{--{{ dump($contact->toArray()) }}--}}
        </div>

        {{--Modal--}}
        <div class="modal fade" id="connectModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-exchange"></i> Connect with this contact</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="frmConnect">
                            <div class="alert alert-success text-center" role="alert">
                                Please complete all the fields
                            </div>
                            <fieldset class="form-group">
                                <label>Full Names</label>
                                <input type="text" class="form-control txtNames">
                            </fieldset>

                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>Telephone Number</label>
                                        <input type="text" class="form-control txtTelephone">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control txtEmail">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control txtCountry">
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>City / Town</label>
                                        <input type="text" class="form-control txtCity">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>Gender</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Choose a gender</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col">
                                    <fieldset class="form-group">
                                        <label>Profession</label>
                                        <input type="text" class="form-control txtProfession">
                                    </fieldset>
                                </div>
                            </div>

                            <fieldset class="form-group">
                                <label>What product are you requesting?</label>
                                <input type="text" class="form-control txtProduct">
                            </fieldset>


                        </form>
                        <div class="col-12 frmOK text-center text-success">
                            <i class="fa fa-check-circle fa-4x"></i>
                            <br>
                            <h4>You request has been sent!</h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btnSend">
                            <i class="fa fa-envelope fa-fw"></i> Send Request
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(function () {

            $('.frmOK').hide()

            setInterval(function(){
                if(!validating()){
                    $('.btnSend').attr('disabled', 'disabled')
                } else {
                    $('.btnSend').removeAttr('disabled')
                }
            }, 100)

            $('.btnSend').click(function(){
                if(validating()){
                    $('.btnSend').html('Sending...').attr('disabled','disabled')
                    $.post(
                        '{{ secure_url('request/connect') }}',
                        {
                            contact_id: {{ $contact->id }},
                            names: $('.txtNames').val(),
                            telephone: $('.txtTelephone').val(),
                            email: $('.txtEmail').val(),
                            product: $('.txtProduct').val(),
                        },
                        function(res){
                            if(res.status == 'OK')
                            {
                                $('.frmOK').show()
                                $('.frmConnect, .btnSend').hide()
                            } else {
                                alert(res.error)
                                $('.btnSend').html('Try again').removeAttr('disabled')
                            }
                        }
                    )
                }
            })

        })

        function validating()
        {
            if(!$('.txtNames').val()) return false
            if(!$('.txtTelephone').val()) return false
            if(!$('.txtEmail').val()) return false
            return true
        }
    </script>

@endsection


@section('searchbox')
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control" type="text" placeholder="Type then ↵ ...">
    </form>
@endsection