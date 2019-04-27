@extends('layout.admin.master')

@section('title')
    @if(@$_GET['q'])
        Users matching '{{ @$_GET['q'] }}'
    @else
        User Accounts
    @endif
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">

                            {{--Search box--}}
                            <span class="float-right">
                                {!! Form::open(['url' => url('users'), 'method' => 'GET']) !!}
                                    <span class="form-group">
                                        {!! Form::text('q', @$_GET['q'], ['placeholder' => 'Search...']) !!}
                                    </span>
                                {!! Form::close() !!}
                            </span>

                            <h4 class="c-grey-900 mB-20">@yield('title')</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Names</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Privilege</th>
                                    <th scope="col">Inventory</th>
                                    <th scope="col">County</th>
                                    <th scope="col" colspan="2">Join Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accounts as $user)
                                    <tr>
                                        <td>
                                            @if(!$user->business_name || !$user->business_category || !$user->county)
                                                <i class="fa fa-exclamation-circle text-danger" title="This account has incomplete records!"></i>
                                            @else
                                                <i class="fa fa-check-circle text-success"></i>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ ($user->business_name) ? $user->business_name : 'Not available' }}</td>
                                        <td>{{ ($user->business_category) ? config('settings.categories')[$user->business_category] : 'Not available' }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>{{ $user->privilege }}</td>
                                        <td>
                                            <a href="{{ url('ads?provider='.$user->id) }}">{{ $user->ads->count() }} items</a>
                                        </td>
                                        <td>{{ $user->county }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-outline-primary btn-sm pull-right">
                                                <i class="fa fa-eye fa-fw"></i> View
                                            </a>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                            {{ $accounts->links() }}


                            <span class="text-muted">
                                Showing page {{ $accounts->currentPage() }} of {{ $accounts->lastPage() }} ({{ $accounts->total() }} records)
                            </span>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection