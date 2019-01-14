@extends('layout.admin.master')

@section('title')
    User Accounts
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">@yield('title')</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2">Names</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Privilege</th>
                                    <th scope="col">Tokens</th>
                                    <th scope="col" colspan="2">Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accounts as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ (!$user->picture) ? 'http://placehold.it/30x30/000/fff?text='.substr($user->name, 0, 1) : $user->picture }}" class="rounded-circle">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->telephone }}</td>
                                        <td>{{ $user->privilege }}</td>
                                        <td>{{ $user->credits }}</td>
                                        <td>{{ $user->location['display_name'] }}</td>
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

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection