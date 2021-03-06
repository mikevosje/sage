<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(get_field('favicon', 'option'))
        <link rel="shortcut icon" href="{{get_field('favicon','option')}}">
    @endif
    @if(env( 'ACF_GOOGLE_MAPS_API' ))
        <script src="https://maps.googleapis.com/maps/api/js?key={{env('ACF_GOOGLE_MAPS_API')}}"></script>
    @endif
    @php(wp_head())
</head>
