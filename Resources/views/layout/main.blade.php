@extends('panel_ui::layout.base')

@section('body')
    <body class="app">
        @yield('content')

        <!-- BEGIN: JS Assets-->
{{--        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>--}}
{{--        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>--}}
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ asset('jquery-sortable-lists.min.js') }}"></script>
        @stack('scripts')

        <!-- END: JS Assets-->
    </body>
@endsection
