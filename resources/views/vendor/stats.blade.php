@inject('vendorModel', 'App\Models\Vendor')

<h4>Summary</h4>
<hr>

<div class="card">
    <div class="card-block">
        <p class="text-muted">Total Vendors</p>
        <h1 class="card-title">{{ $vendorModel::count() }}</h1>
    </div>
</div>
<br>