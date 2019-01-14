@extends('layout.admin.master')

@section('title')
    Account Details
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">

                            <h4 class="c-grey-900 mB-20 text-center">@yield('title')</h4>
                            <hr>

                            @include('common.boxes')

                            <div class="list-group mb-3">
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Names</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ $account->name }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Email Address</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ $account->email }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Account Privilege</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ config('settings.privileges')[$account->privilege] }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">User Location</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ $account->location['display_name'] }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Telephone Number</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ $account->telephone }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Gender</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ config('settings.gender')[$account->gender] }}</h4>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action flex-column align-items-start">
                                    <small class="text-muted">Tokens</small>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h4 class="mb-1">{{ $account->credits }}</h4>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('users.edit', ['id' => $account->id]) }}" class="btn btn-primary btn-block btn-lg">
                                <i class="fa fa-cog fa-fw fa-spin"></i> Manage this account
                            </a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection