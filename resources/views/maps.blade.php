@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div id="map_div"> </div>
</div>
@endsection

@section('scripts')
<!-- <script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> -->
<script type="text/javascript">
    var locations = JSON.parse('@json($addresses)');
    var map = null;
    var myLatlng = new google.maps.LatLng(0.8356343748635202, 35.21362478366809); //ziwa
    var dmbounds = new google.maps.LatLngBounds(null);
    var locationbounds = new google.maps.LatLngBounds(null);
    var dmMarkers = [];
    dmbounds.extend(myLatlng);
    locationbounds.extend(myLatlng);
    var myOptions = {
        center: myLatlng,
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP,

        panControl: true,
        mapTypeControl: false,
        panControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        scaleControl: false,
        streetViewControl: false,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        }
    };

    function initializeGMap() {

        map = new google.maps.Map(document.getElementById("map_div"), myOptions);
        var infowindow = new google.maps.InfoWindow();
        var ZiwaMarker = new google.maps.Marker({
            position: new google.maps.LatLng(0.8356343748635202, 35.21362478366809),
            map: map,
            title: "Ziwa Technical Training Institute",
        });
        map.fitBounds(dmbounds);
        for (var i = 0; i < locations.length; i++) {
            if (locations[i].latitude) {
                var point = new google.maps.LatLng(locations[i].latitude, locations[i].longitude);
                dmbounds.extend(point);
                map.fitBounds(dmbounds);
                var marker = new google.maps.Marker({
                    position: point,
                    map: map,
                    title: locations[i].name,
                    icon: "/images/icon.png"
                });
                dmMarkers[locations[i].id] = marker;
            }

        };
    }
    $(document).ready(function() {
        initializeGMap();
    })
</script>
@endsection