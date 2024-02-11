<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Example</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1jq2GsX0J9F38kVwa5LAEBLkPTPscdzk&libraries=places"></script>
    <!-- Replace YOUR_API_KEY with your actual Google Maps API key
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
        #pac-input {
            position: absolute;
            z-index: 1;
            top: 10px;
            left: 10px;
            width: 300px;
            padding: 10px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <h1>Google Maps Example</h1>
    <input id="pac-input" type="text" placeholder="Search Box">
    <div id="map"></div>
    <script>
        // Initialize and display the map
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -34.397, lng: 150.644 }, // Default location (Sydney, Australia)
                zoom: 8 // Default zoom level
            });

            // Create the search box and link it to the UI element
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.Autocomplete(input);

            // Bias the search box to within the map's viewport
            searchBox.bindTo('bounds', map);

            // Listen for the event fired when the user selects a prediction and retrieve more details for that place
            searchBox.addListener('place_changed', function () {
                var place = searchBox.getPlace();

                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Zoom in to show more detail
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1jq2GsX0J9F38kVwa5LAEBLkPTPscdzk&callback=initMap"></script> -->

    <script>
        var map;
        var service;
        var infowindow;

        function initialize(){
            var pyrmont= new google.maps.LatLng(-33, 151);
            map= new google.maps.Map(document.getElementById('map'),{
                center: pyrmont,
                zoom:15
            })
            var input= document.getElementById('searchTextField');

            let autocomplete = new google.mas.places.Autocomplete(input)
            autocomplete.bindTo('bounds',map)
        }
        google.maps.event.addDomListener(window, 'load', initialize)
    </script>
<body>
    <input id="searchTextField" type="text" size="50">
    <div id="map" style="height: 500px;"></div>
</body>
</html>



