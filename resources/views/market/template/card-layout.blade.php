<div class="card-deck">
    @foreach($contacts as $contact)
        {{--{{ dump($contact->toArray()) }}--}}
        <div class="col-sm-4" style="margin-bottom: 20px;">
            <div class="card">
                <a href="{{ url('contact/view/'.$contact->id) }}">
                    <img class="img-fluid card-img-top" src="{{ (!$contact->picture) ? 'http://via.placeholder.com/600x400?text='.$contact->name : $contact->picture }}">
                    <div class="card-body">
                        <h5 class="card-title" title="{{ $contact->name }}">
                            <i class="fa fa-caret-right fa-fw"></i> {{ str_limit($contact->name, 25) }}
                        </h5>
                        <div class="card-text">
                            <small class="text-muted">
                                <i class="fa fa-map-marker fa-fw"></i> {{ $contact->location }}, {{ config('settings.counties')[$contact->county] }}
                            </small>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    @endforeach

    {{--{{ dump($contacts) }}--}}
</div>