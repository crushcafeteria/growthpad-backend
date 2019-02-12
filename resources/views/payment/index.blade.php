@extends('layout.admin.master')

@section('title')
    M-PESA Payments
@endsection

@section('page')
 <main class="main-content bgc-grey-100">
        <div id="mainContent">

            <div class="content">

                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20">

                            @if(@$_GET['q'])
                                <a href="{{ url('payments') }}" class="btn btn-success btn-lg float-right">
                                    Show all payments
                                </a>
                            @endif
                            <h4 class="c-grey-900 mB-20">@yield('title')</h4>

                            <div class="cardx" id="resp-table">
                                <div class="card-headerx">
                                    <div class="row no-gutters">
                                        @if(@$_GET['q'])
                                            <div class="col-9">
                                                <h4>{{ $payments->total() }} results for "{{ $_GET['q'] }}"</h4>
                                            </div>
                                        @endif
                                        <div class="col-3 {{ (!@$_GET['q']) ? 'offset-9' : null }}">
                                            {!! Form::open(['url'=>url('payments'), 'method'=>'GET']) !!}
                                            <div class="input-group">
                                                {!! Form::text('q', @$_GET['q'], ['class'=>'form-control', 'required'=>true, 'placeholder'=>'Search...']) !!}
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary" type="button">Go</button>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($payments->count())
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" cellspacing="0"
                                                   style="border-top: 1px solid #ddd;">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Telephone</th>
                                                    <th>Code</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($payments as $payment)
                                                    <tr class="{{ ($payment->status == 'PENDING') ? 'text-danger' : null }}">
                                                        <td>{{ $payment->first_name }} {{ $payment->last_name }}</td>
                                                        <td>{{ $payment->sender_phone }}</td>
                                                        <td>{{ $payment->transaction_reference }}</td>
                                                        <td>Ksh {{ number_format($payment->amount) }}</td>
                                                        <td>{{ $payment->status }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->txn_time)->toDateTimeString() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="col-4 offset-4 text-center text-muted">
                                            <i class="fa fa-exclamation-circle" style="font-size: 60px;"></i>
                                            <br>
                                            <br>
                                            <h5>
                                                We couldn't find any payments {{ (@$_GET['q']) ? 'containing "'.$_GET['q'].'"' : null }}
                                            </h5>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-footerx">
                                    {{ $payments->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection