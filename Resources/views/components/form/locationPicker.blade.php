<div class="label-field select-field  sm:col-span-{{$col}}   col-span-12 @if(isset($required)) required @endif">
    <label for="{{ $name }}">{{ $label }} </label>
    <input type="hidden" id="cord"
           @if (isset($start))
           start='{"lat":{{$start->getLat() }}, "lng": {{$start->getLng() }} }'
           @endif

           name="{{ $name }}">
    <div id="map"></div>
</div>

@push('styles')
    <style type="text/css">
        #map {
            /*width: 100%;*/
            height: 400px;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key={{ config('custom.google_api_key') }}"></script>

    <script>

        var lp = new LocationPicker('map', {

            setCurrentPosition: false, // You can omit this, defaults to true
        }, {
            @if (isset($start))
            center: {"lat": {{ $start->getLat() }}, "lng": {{ $start->getLng() }} },
            @endif
            zoom: 15 // You can set any google map options here, zoom defaults to 15
        });

        google.maps.event.addListener(lp.map, 'idle', function (event) {
            var location = lp.getMarkerPosition();
            $('#cord').val(JSON.stringify({lat: location.lat, lng: location.lng}));
        });
    </script>
@endpush
