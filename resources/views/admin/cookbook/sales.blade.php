@extends('layout.admin.master')

@section('title')
Cookbook Sales
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
                            Show all sales
                        </a>
                        @endif
                        <h4 class="c-grey-900 mB-20">@yield('title')</h4>

                        <div class="cardx" id="resp-table">
                            <div class="card-body">
                                @if($sales->count())
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" cellspacing="0"
                                        style="border-top: 1px solid #ddd;">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th colspan="2">Reference</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($sales as $sale)
                                            <tr>
                                                <td>
                                                    @if($sale->payment->processor == 'MPESA')
                                                        {{ $sale->payment->full_names }}
                                                    @else
                                                        {{ $sale->user->name }}
                                                    @endif
                                                </td>
                                                <td>{{ $sale->product['name'] }}</td>
                                                <td>Ksh {{ number_format($sale->payment->amount) }}</td>
                                                <td>{{ $sale->payment->transaction_reference }}</td>
                                                <td>
                                                    {{ $sale->created_at }}
                                                </td>
                                            </tr>
                                            {{-- @php(dump($sale->payment)) --}}
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
                                        We couldn't find any payments
                                        {{ (@$_GET['q']) ? 'containing "'.$_GET['q'].'"' : null }}
                                    </h5>
                                </div>
                                @endif
                            </div>
                            <div class="card-footerx">
                                {{ $sales->appends(request()->input())->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
