@extends('layout.admin.master')

@section('title')
    Orders Placed
@endsection

@section('page')
    <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">
                            <div class="col-3 pull-right">
                                {!! Form::open(['url' => url('orders/search')]) !!}
                                {!! Form::text('q', request()->q, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
                                {!! Form::close() !!}
                            </div>
                            <h4 class="c-grey-900 mB-20">Orders Placed</h4>

                            @include('common.boxes')

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Provider</th>
                                    <th scope="col">Item Ordered</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td>{{ $order->ad->publisher->name }}</td>
                                        <td>{{ $order->ad->name }}</td>
                                        <td>Ksh {{ number_format($order->ad->price) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            {{ $order->created_at }}
                                            <a href="{{ route('orders.show', ['ad'=>$order->id]) }}"
                                               class="btn btn-outline-primary btn-sm pull-right">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $orders->links() }}

{{--                            {{ dump($orders) }}--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection