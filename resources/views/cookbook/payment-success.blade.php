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
                                    Checkout complete!
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
                <div class="col-4 offset-4 text-center text-success">
                    <i class="fa fa-check-circle fa-4x" style="font-size: 15vh"></i>
                    <br>
                    <br>
                    <h1>Your payment has been successfully processed!</h1>
                    <br>
                    <br>
                    <a href="/cookbook/my-purchases" class="btn btn-success">Download my purchases</a>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>

@endsection
