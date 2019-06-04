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
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Total Tokens Purchased</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>Ksh {{ number_format($total['total_transacted']) }}</h2>
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

                <div class="row mt-3">
                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-dark text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Total Service Providers</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['SPs'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-dark text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Total Customers</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['customers'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-dark text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Total Orders</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['orders']['total'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-dark text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Total Ads</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ $total['ads'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-danger text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Pending Orders</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ number_format($total['orders']['pending']) }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-primary text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Progressing Orders</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ number_format($total['orders']['progressing']) }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="layers bd bg-success text-white p-20">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Completed Orders</h6></div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer">
                                        <h2>{{ number_format($total['orders']['completed']) }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <h3>Here are 10 latest orders</h3>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Provider</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Location</th>
                                    <th scope="col" colspan="2">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    @php
                                        if($order->status == 'PENDING'){
                                            $class = 'text-warning';
                                            $icon = 'clock-o';
                                        } else if($order->status == 'PROGRESSING'){
                                            $class = 'text-primary';
                                            $icon = 'refresh-circle fa-spin';
                                        } else if($order->status == 'COMPLETE'){
                                            $class = 'text-success';
                                            $icon = 'check-circle';
                                        } else if($order->status == 'CANCELLED'){
                                            $class = 'text-danger';
                                            $icon = 'times-circle';
                                        }
                                    @endphp
                                    <tr class="{{ $class }}" >
                                        <td>
                                            <i class="fa fa-{{ $icon }}"></i>
                                        </td>
                                        <td>{{ $order->ad->name }}</td>
                                        <td>{{ @$order->customer->name }}</td>
                                        <td>{{ @$order->ad->publisher->name }}</td>
                                        <td>Ksh {{ number_format($order->ad->price) }}</td>
                                        <td>{{ @str_limit($order->customer->location['display_name'], 30) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            {{ $order->expiry }}
                                            <a href="{{ route('orders.show', ['ad'=>$order->id]) }}"
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

    <style>
        .text-warning {
            color: saddlebrown !important;
        }
    </style>
@endsection