@if (Session::has('errorbox') || Session::has('successbox') || Session::has('infobox') || Session::has('warningbox'))

    <?php
    if (Session::has('errorbox')) {
        $class = 'alert-danger';
        $title = @Session::get('errorbox')[1];
        $msg   = Session::get('errorbox')[0];

    } elseif (Session::has('successbox')) {
        $class = 'alert-success';
        $title = @Session::get('successbox')[1];
        $msg   = Session::get('successbox')[0];

    } elseif (Session::has('infobox')) {
        $class = 'alert-info';
        $title = @Session::get('infobox')[1];
        $msg   = Session::get('infobox')[0];

    } elseif (Session::has('warningbox')) {
        $class = 'alert-warning';
        $title = @Session::get('warningbox')[1];
        $msg   = Session::get('warningbox')[0];
    }
    ?>
    <div class="alert {{ $class }} text-xs-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @if($title)
            <strong>{!! $title !!}</strong>
        @endif
        {!! $msg !!}
    </div>

@endif

