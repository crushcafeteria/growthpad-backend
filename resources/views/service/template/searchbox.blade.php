<form class="form-inline my-2 my-lg-0">
    <input class="form-control txtSearch" type="text" placeholder="Type then ↵ ...">
</form>

<script>
    $(function () {
        $('.txtSearch').keyup(function () {
            if ($(this).val().length > 1) {
                $('.frmList').hide()
                $('.frmSearch').show().html('Searching...')
                $.get(
                    '{{ url('contacts/search') }}',
                    {
                        q: $('.txtSearch').val()
                    }, function (res) {
                        $('.frmSearch').html(res)
                    }
                )
            } else {
                $('.frmSearch').hide()
                $('.frmList').show()
            }
        })
    })
</script>