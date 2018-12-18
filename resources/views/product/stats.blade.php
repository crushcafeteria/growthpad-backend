@inject('productModel', 'App\Models\Product')

<h4>Summary</h4>
<hr>

<div class="card">
    <div class="card-block">
        <p class="text-muted">Total in stock</p>
        <h1 class="card-title">{{ $productModel::where('vendor_id', $vendor->id)->count() }}</h1>
    </div>
</div>
<br>