<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Farm management enquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form class="frmForm">
                {!! Form::hidden('type', 'FARM-MANAGEMENT') !!}
                <fieldset class="form-group">
                    <label>Which category of service do you require?</label>
                    {!! Form::select('category', config('settings.services.farm'), NULL, ['class'=>'form-control']) !!}
                </fieldset>                
                <fieldset class="form-group">
                    <label>Full Names</label>
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
                            {!! Form::select('county', config('settings.counties'), NULL, ['class'=>'form-control selCounty', 'placeholder'=>'Choose a county']) !!}
                        </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <fieldset class="form-group">
                            <label>Type of farming activity</label>
                            <input name="activity" type="text" class="form-control">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Briefly describe your farming activities</label>
                            {!! Form::textarea('farming_activity_description', null, ['class'=>'form-control']) !!}
                        </fieldset>
                    </div>
                </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-link text-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btnSave">Submit</button>
        </div>
    </div>
</div>

<script>

    $(function(){
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


        $('.selCountry').change(function () {
            if ($('.selCountry').val() == 'KE') {
                $('.selCounty').removeAttr('disabled')
            } else {
                $('.selCounty').attr('disabled', 'disabled')
            }
        })

    })

    function validating() {
//        if (!$('input[name=category]').val()) {
//            alert('Please select a  category')
//            $('input[name=category]').focus()
//            return false
//        }
        if (!$('input[name=activity]').val()) {
            alert('Please fill the farming activity field')
            $('input[name=activity]').focus()
            return false
        }
        if (!$('input[name=full_names]').val()) {
            alert('Please enter your full names')
            $('input[name=full_names]').focus()
            return false
        }
        if (!$('input[name=telephone]').val()) {
            alert('Please enter your telephone')
            $('input[name=telephone]').focus()
            return false
        }
//        if (!$('input[name=gender]').val()) {
//            alert('Please select your gender')
//            $('input[name=gender]').focus()
//            return false
//        }
        if (!$('input[name=town]').val()) {
            alert('Please fill the town field')
            $('input[name=town]').focus()
            return false
        }
//        if (!$('input[name=county]').val()) {
//            alert('Please fill the county field')
//            $('input[name=county]').focus()
//            return false
//        }
//        if (!$('input[name=country]').val()) {
//            alert('Please fill the country field')
//            $('input[name=country]').focus()
//            return false
//        }
        return true;
    }
</script>