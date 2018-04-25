@if(count($products))
    <div class="card-deck">
        @foreach($products as $product)
            <div class="col-sm-4" style="margin-bottom: 20px;">
                <div class="card">
                    <img class="img-fluid card-img-top" src="{{ asset('milk.png') }}">
                    <div class="card-block">
                        <h5 class="card-title">
                            <a href="{{ secure_url('add/to/compare/'.$product->id) }}" class="btn btn-outline-warning btn-sm pull-xs-right" style="float: right;">Compare</a>
                            {{ $product->name }}
                        </h5>
                        <div class="card-text">
                            Ksh {{ number_format($product->price) }}
                            <a href="{{ secure_url('add/to/cart/'.$product->id) }}" class="btn btn-success btn-sm pull-xs-right" style="float: right;">Buy this</a>
                        </div>
                    </div>
                </div>
            </div>
            {{--{{ dump($vendor->products) }}--}}
        @endforeach
    </div>
@else
    <div class="alert alert-danger" role="alert">
        <strong>Nothing Found!</strong> Please adjust your search parameter
    </div>
@endif