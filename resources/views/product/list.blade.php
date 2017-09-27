@extends('layout.master')

@section('header')
    <div class="blog-header">
        <div class="container">

            <div class="col-4 float-right">
                <input type="text" class="form-control form-control-lg txtSearch" placeholder="Live search...">
            </div>

            <h3 class="blog-title">Vendor: {{ $vendor->name }}</h3>
            <p class="lead blog-description">Products available from this vendor</p>
        </div>
        <hr>
    </div>
@endsection

@section('page')

    <div class="col-md-9">

        <div class="frmList">
            <div class="card-deck">

                @foreach($products as $product)
                    <div class="col-sm-4" style="margin-bottom: 20px;">
                        <div class="card">
                            <img class="img-fluid card-img-top" src="{{ asset('milk.png') }}">
                            <div class="card-block">
                                <h5 class="card-title">
                                    <a href="{{ url('add/to/compare/'.$product->id) }}" class="btn btn-outline-warning btn-sm pull-xs-right" style="float: right;">Compare</a>
                                    {{ $product->name }}
                                </h5>
                                <div class="card-text">
                                    Ksh {{ number_format($product->price) }}
                                    <a href="{{ url('add/to/cart/'.$product->id) }}" class="btn btn-success btn-sm pull-xs-right" style="float: right;">Buy this</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--{{ dump($vendor->products) }}--}}
                @endforeach
            </div>
        </div>

        <div class="frmSearch"></div>

        {{ $products->links('vendor.pagination.bootstrap-4') }}


    </div>

    <div class="col-sm-3 blog-sidebar">
        @include('product.stats')
        <br>
        @include('product.compare')
    </div>

    <script>
        $(function () {
            $('.txtSearch').keyup(function () {
                if ($(this).val().length > 0) {
                    $('.frmList').hide()
                    $('.frmSearch').show()
                    $.get(
                        '{{ url('product/search') }}',
                        {
                            q: $('.txtSearch').val(),
                            vendor: {{ $vendor->id }}
                        }, function (res) {
                            $('.frmSearch').html(res)
                        }
                    )
                } else {
                    $('.frmSearch').hide()
                    $('.frmList').show()
                }
            })
        })
    </script>

@endsection