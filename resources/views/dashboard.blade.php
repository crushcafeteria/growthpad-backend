@extends('layout.admin.master')

@section('title')
    Welcome to {{ config('app.name') }}!
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-4">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Accounts Registered</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['accounts'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Orders Placed</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['orders'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Ads Posted</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['ads'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h3>Latest Ads</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Location</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latestAds as $ad)
                                    <tr>
                                        <td>{{ $ad->category }}</td>
                                        <td>{{ $ad->name }}</td>
                                        <td>Ksh {{ number_format($ad->price) }}</td>
                                        <td>{{ $ad->location['display_name'] }}</td>
                                        <td class="{{ ($ad->status == 'ACTIVE') ? 'text-success' : 'text-danger' }}">{{ $ad->status }}</td>
                                        <td>
                                            {{ $ad->expiry }}
                                            <a href="{{ route('ads.show', ['ad'=>$ad->id]) }}"
                                               class="btn btn-outline-primary btn-sm pull-right">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection