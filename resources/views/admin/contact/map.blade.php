@extends('layout.admin.master')

@section('content')

    <a href="{{ secure_url('admin/contacts') }}" class="btn btn-primary pull-right">
        <i class="fa fa-list-ol fa-fw"></i> Show all contacts
    </a>

    <h3 class="text-primary mb-4">Contact Map</h3>
    <hr>

    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card card-block">
                <div id="map" style="height:700px;"></div>
            </div>
        </div>
    </div>

    <script src="https://maps.google.com/maps/api/js?libraries=geometry&v=3.22&key={{ config('app.google_api_key') }}"></script>
    <script src="{{ asset('node_modules/maplace-js/dist/maplace.min.js') }}"></script>
    <script>
        $(function () {
            new Maplace({
                locations: {!! json_encode($locations) !!},
                map_div: '#map',
                controls_type: 'list',
                controls_title: 'LIST OF CONTACTS',
                type: 'marker',
                controls_type: 'dropdown'
            }).Load();
        })
    </script>
    <style>
        .card {
            min-height: 300px;
        }
    </style>

@endsection
