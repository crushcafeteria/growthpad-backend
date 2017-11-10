@extends('layout.admin.master')

@section('content')

<a href="{{ url('admin/contact/add') }}" class="btn btn-success pull-right">
    <i class="fa fa-plus-circle fa-fw"></i> Add contact
</a>
<div class="col-2 pull-right">
    <input type="text" class="form-control pull-right txtSearch" placeholder="Search...">
</div>
<h3 class="text-primary mb-4">List of marketplace contacts</h3>
<hr>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                @include('common.boxes')

                <div class="table-responsive">
                    <div class="frmResult">
                        @include('admin.contact.component.table')
                    </div>


                    {{ $contacts->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var busy = false
    $(function(){
        @if(@$_GET['id'])
            loadContact({{ $_GET['id'] }})
        @endif

        $('.txtSearch').keyup(function(){
            searchBusiness($(this).val())
        })
    })

    function loadContact(id)
    {
        $('#dialog').modal('show').html('Loading...').load('{{ url('admin/contact/view') }}/' + id)
    }

    function searchBusiness(term){
        if(!busy){
            busy = true
            $.get(
                '{{ url('admin/contact/search') }}',
                {
                    q: term
                }, function(res){
                    $('.frmResult').html(res)
                    busy = false
                }
            )
        }
    }

</script>

@endsection
