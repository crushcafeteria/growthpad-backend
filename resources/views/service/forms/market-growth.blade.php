<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Market growth advisory enquiry</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form class="frmForm">
                {!! Form::hidden('type', 'MARKET-ADVISORY') !!}
                <fieldset class="form-group">
                    <label>Which category of service do you require?</label>
                    {!! Form::select('category', config('settings.services.market'), NULL, ['class'=>'form-control']) !!}
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
                            {!! Form::select('county', config('settings.counties'), NULL, ['class'=>'form-control selCounty']) !!}
                        </fieldset>
                    </div>
                </div>
                <fieldset class="form-group">
                    <label>Preferred mode of communication</label>
                    {!! Form::select('comm_mode', ['EMAIL'=>'Email', 'TELEPHONE'=>'Telephone'], NULL, ['class'=>'form-control', 'placeholder'=>'Choose a value']) !!}
                </fieldset>
                <fieldset class="form-group">
                    <label>Business Name</label>
                    <input name="business_name" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>What does your business do?</label>
                    <input name="business_type" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group">
                    <label>How do you generate revenue?</label>
                    <input name="target_market" type="text" class="form-control">
                </fieldset>

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

        $('.btnSave').click(function () {
            if (validating()) {
                $('.btnSave').html('<i class="fa fa-refresh fa-spin fa-fw"></i> Sending...').attr('disabled','disabled')
                $.post(
                    '{{ secure_url('enquiry/save') }}',
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


    function validating() {
//        if (!$('input[name=business_name]').val()) {
//            alert('Please enter a business name')
//            $('input[name=business_name]').focus()
//            return false
//        }
//        if (!$('input[name=business_type]').val()) {
//            alert('Please enter your business type')
//            $('input[name=business_type]').focus()
//            return false
//        }
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
        return true;
    }
</script>