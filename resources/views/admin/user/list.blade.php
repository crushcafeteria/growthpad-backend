@extends('layout.admin.master')

@section('content')

<h3 class="text-primary mb-4">Registered system accounts</h3>
<hr>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-block">

                @include('common.boxes')

                <div class="table-responsive">
                    <table class="table table-bordered table-hover center-aligned-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                {{-- {{ dump($users->toArray()) }} --}}
                                
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function loadEnquiry(id)
    {
        $('#dialog').modal('show').html('Loading...').load('{{ url('admin/enquiry/view') }}/' + id)
    }

</script>

@endsection
