@extends('layout.admin.master')

@section('content')

    <h3 class="text-primary mb-4">List of contact requests</h3>
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
                                <th>Requester Names</th>
                                <th>Requested Contact</th>
                                <th>Requester Telephone</th>
                                <th>Requester Email</th>
                                <th>Requested Products</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($requests as $request)
                                {{--{{ dump($contact) }}--}}
                                <tr>
                                    <td>{{ $request->names }}</td>
                                    <td>
                                        <a target="_blank" href="{{ url('admin/contacts?id='.$request->contact->id) }}">{{ $request->contact->name }}</a>
                                    </td>
                                    <td>{{ $request->telephone }}</td>
                                    <td>{{ $request->email }}</td>
                                    <td>{{ $request->product }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $requests->links('vendor.pagination.bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
