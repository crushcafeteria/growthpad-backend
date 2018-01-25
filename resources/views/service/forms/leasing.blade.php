<link rel="stylesheet" href="{{ asset('chosen/chosen.min.css') }}">
<script src="{{ asset('chosen/chosen.jquery.min.js') }}"></script>

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Leasing services enquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form class="frmForm">
                {!! Form::hidden('type', 'LEASING') !!}
                <fieldset class="form-group">
                    <label>Which category of service do you require?</label>
                    {!! Form::select('category', config('settings.services.leasing'), NULL, ['class'=>'form-control']) !!}
                </fieldset>
                <fieldset class="form-group">
                    <label>Full names of lease applicant</label>
                    <input name="full_names" type="text" class="form-control">
                </fieldset>
                <div class="row">
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>Email</label>
                            <input name="email" type="text" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>Telephone</label>
                            <input name="telephone" type="text" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control txtCategory">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>Town</label>
                            <input name="town" type="text" class="form-control geocomplete">
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>Country</label>
                            {!! Form::select('country', config('settings.countries'), NULL, ['class'=>'form-control selCountry']) !!}
                        </fieldset>
                    </div>
                    <div class="col-6">
                        <fieldset class="form-group">
                            <label>County</label>
                            {!! Form::select('county', config('settings.counties'), NULL, ['class'=>'form-control selCounty']) !!}
                        </fieldset>
                    </div>
                </div>

                <fieldset class="form-group">
                    <label>Farm/Business Name</label>
                    <input name="business_name" type="text" class="form-control">
                </fieldset>

                <fieldset class="form-group">
                    <label>Date Required</label>
                    <input name="date_required" type="text" class="form-control" placeholder="YYYY-MM-DD...">
                </fieldset>   

                <fieldset class="form-group">
                    <label>Preferred mode of communication</label>
                    {!! Form::select('comm_mode', ['EMAIL'=>'Email', 'TELEPHONE'=>'Telephone'], NULL, ['class'=>'form-control', 'placeholder'=>'Choose a value']) !!}
                </fieldset>             

                <div class="card">
                    <div class="card-body">
                        <fieldset>
                            <label>Farm tools required</label>
                            {!! Form::select('tools_required[]', config('settings.services.toolset.farm-tools'), NULL, ['class'=>'form-control chosen', 'multiple'=>TRUE]) !!}
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <label>Size of farm</label>
                            <input name="farm_size" type="text" class="form-control">
                        </fieldset>
                    </div>
                </div>
                
                <br>

                <div class="card">
                    <div class="card-body">
                        <fieldset>
                            <label>Logistics required</label>
                            {!! Form::select('logistics_required[]', config('settings.services.toolset.logistics'), NULL, ['class'=>'form-control chosen', 'multiple'=>TRUE]) !!}
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <label>Size of farm</label>
                            <input name="weight_capacity" type="text" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <br>

                
                <div class="card">
                    <div class="card-body">
                        <fieldset>
                            <label>Vendor Tools required</label>
                            {!! Form::select('vendor_required[]', config('settings.services.toolset.vendor'), NULL, ['class'=>'form-control chosen', 'multiple'=>TRUE]) !!}
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <label>Size of operation</label>
                            <input name="op_size" type="text" class="form-control">
                        </fieldset>
                    </div>
                </div>
                <br>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btnSave">Submit</button>
        </div>
    </div>
</div>

<script>
    $(function () {

        $('.selCountry').change(function () {
            if ($('.selCountry').val() == 'KE') {
                $('.selCounty').removeAttr('disabled')
            } else {
                $('.selCounty').attr('disabled', 'disabled')
            }
        })

        $('.chosen').chosen({
            create_option: true,
            persistent_create_option: true,
            skip_no_results: true,
            create_option_text: 'Create New'
        })

        $('.btnSave').click(function () {
            if (validating()) {
                $('.btnSave').html('<i class="fa fa-refresh fa-spin fa-fw"></i> Sending...').attr('disabled','disabled')
                $.post(
                    '{{ url('enquiry/save') }}',
                    $('.frmForm').serialize(),
                    function (res) {
                        if (res.status == 'OK') {
                            alert('We have received your enquiry. Someone will be in touch shortly')
                            $('#enquiry').modal('hide')
                        }
                    }
                )
            }
        })

    })
    $
    function validating() {
//        if (!$('input[name=full_names]').val()) {
//            alert('Please enter your full names')
//            $('input[name=full_names]').focus()
//            return false
//        }
//        if (!$('input[name=telephone]').val()) {
//            alert('Please enter your telephone')
//            $('input[name=telephone]').focus()
//            return false
//        }
//        if (!$('input[name=town]').val()) {
//            alert('Please fill the town field')
//            $('input[name=town]').focus()
//            return false
//        }
//        if (!$('input[name=business_name]').val()) {
//            alert('Please fill the far/business name field')
//            $('input[name=business_name]').focus()
//            return false
//        }
//        if (!$('input[name=op_size]').val()) {
//            alert('How big is your operation?')
//            $('input[name=op_size]').focus()
//            return false
//        }
        return true;
    }
</script>