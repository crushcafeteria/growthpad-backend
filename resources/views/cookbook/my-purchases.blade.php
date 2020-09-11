@extends('layout.recipe')

@section('content')

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center"
        style="background-image: url('{{ asset('recipe/img/purchase.jpg') }}')">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 ">
                    <div class="slider_text text-center">
                        <div class="text">
                            <h3>
                                Here are your purchases
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<div class="recepie_videoes_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(request()->status == 'PESAPAL')
                <div class="alert alert-info">
                    Payment Processing! Your cookbook will be available to you in this page once the transaction has
                    been successfully processed. Please give upto 3 minutes
                </div>
                @endif
                @if ($purchases->count())
                <table class="table table-bordered">
                    <tr>
                        <th>File Name</th>
                        <th>Price</th>
                        <th>Processed By</th>
                        <th colspan=2>Date</th>
                    </tr>
                    @foreach ($purchases as $item)
                    <tr>
                        <td>{{ config('cookbook.products')[$item->product_key]['name'][app()->getLocale('en')] }}</td>
                        <td>Ksh {{ config('cookbook.products')[$item->product_key]['price'][app()->getLocale('en')] }}</td>
                        <td>{{ $item->payment->processor }} ({{ $item->payment->transaction_reference }})</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a target="_blank" class="btn btn-outline-primary btn-sm pull-right"
                                href="/cookbook/download/{{ $item->id }}">
                                <i class="fa fa-download fa-fw"></i> Download
                            </a>
                        </td>
                    </tr>
                    Ò @endforeach
                </table>
                @else
                <div class="alert alert-danger">
                    You have not purchased anything yet
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
