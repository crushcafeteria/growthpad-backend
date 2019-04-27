@extends('layout.admin.master')

@section('title')
    Ads
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h4 class="c-grey-900 mB-20">{{ ($provider) ? ucwords($provider->name.'\'s') : '' }} Inventory</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">Category</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Prices</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Expiry</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($ads as $ad)
                                    <tr>
                                        <td>{{ @$ad->category }}</td>
                                        <td>{{ @$ad->name }}</td>
                                        <td>Ksh {{ @number_format($ad->price) }}</td>
                                        <td>{{ @$ad->location['display_name'] }}</td>
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

                            {{ $ads->links() }}

                            {{-- {{ dump($ads) }} --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection