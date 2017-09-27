<div class="card-deck">
    @foreach($services as $service)
        {{--{{ dump($service->toArray()) }}--}}
        <div class="col-sm-4" style="margin-bottom: 20px;">
            <div class="card">
                <img class="img-fluid card-img-top" src="{{ $service->picture }}">
                <div class="card-block">
                    <h5 class="card-title">
                        {{ str_limit($service->name, 30) }}
                    </h5>
                    <div class="card-text">
                        Ksh {{ number_format($service->price) }}
                        <a href="{{ url('service/add/to/cart/'.$service->id) }}" class="btn btn-success btn-sm pull-xs-right" style="float: right;"><i class="fa fa-shopping-cart fa-fw"></i> Buy</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{--{{ dump($services) }}--}}
</div>