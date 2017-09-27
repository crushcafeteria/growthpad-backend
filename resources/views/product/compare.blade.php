@inject('productModel', 'App\Models\Product')
@inject('session', '\Illuminate\Support\Facades\Session')

@if(count($session::get('comparisons')))
    <h4>Compare List</h4>
    <hr>
    <div class="list-group">
        @foreach($session::get('comparisons') as $productID)
            @php
                $product = $productModel::find($productID);
            @endphp
            <div href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">{{ $product->name }}</h6>
                    <small class="text-muted">Ksh {{ number_format($product->price) }}</small>
                </div>
                <small class="text-muted">Sold by {{ $product->vendor->name }}</small>
            </div>
        @endforeach
    </div>
    <a href="{{ url('compare/empty') }}"> Reset comparisons</a>
@endif