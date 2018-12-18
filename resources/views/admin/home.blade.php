@extends('layout.admin.master')

@section('content')

<h3 class="text-primary mb-4">List of marketplace contacts</h3>
<hr>

<div class="row">
    <div class="col-lg-6  mb-4">
        <div class="card">
            <div class="card-block">
                <h5 class="card-title mb-4">Sales</h5>
                <canvas id="lineChart" style="height:250px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6  mb-4">
        <div class="card">
            <div class="card-block">
                <h5 class="card-title mb-4">Customer Satisfaction</h5>
                <canvas id="doughnutChart" style="height:250px"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection