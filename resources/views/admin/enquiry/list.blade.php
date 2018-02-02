@extends('layout.admin.master')

@section('content')

<a href="{{ url('admin/enquiries/export/excel') }}" class="btn btn-primary pull-right">
    <i class="fa fa-file-excel-o fa-fw"></i> Export to Excel
</a>

<h3 class="text-primary mb-4">All service enquiries</h3>
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
                                <th>Type</th>
                                <th>Category</th>
                                <th>Customer Name</th>
                                <th>Customer Telephone</th>
                                <th>Town</th>
                                <th colspan="2">County</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enquiries as $enquiry)
                                <tr>
                                    <td>{{ $enquiry->type }}</td>
                                    <td>{{ $enquiry->category }}</td>
                                    <td>{{ $enquiry->full_names }}</td>
                                    <td>{{ $enquiry->telephone }}</td>
                                    <td>{{ $enquiry->town }}</td>
                                    <td>{{ $enquiry->county }}</td>
                                    <td>
                                        <a href="#_" class="btn btn-outline-primary btn-sm btn-block" onclick="loadEnquiry({{ $enquiry->id }})"><i class="fa fa-eye fa-fw"></i> More</a>
                                    </td>
                                </tr>

                                {{-- {{ dump($enquiry->toArray()) }} --}}
                                
                            @endforeach
                        </tbody>
                    </table>

                    {{ $enquiries->links('vendor.pagination.bootstrap-4') }}

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
