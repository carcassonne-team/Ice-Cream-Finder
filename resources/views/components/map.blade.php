<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load Leaflet from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.3/dist/esri-leaflet.js"
            integrity="sha512-kuYkbOFCV/SsxrpmaCRMEFmqU08n6vc+TfAVlIKjR1BPVgt75pmtU9nbQll+4M9PN2tmZSAgD1kGUCKL88CscA=="
            crossorigin=""></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
          integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
          crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js"
            integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w=="
            crossorigin=""></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
        #map {
            width: 55vw;
            height: 280px;
        }
    </style>
</head>
<body>
<div class="map" id="map"></div>
</body>
</html>

<script>
    const geo = [{{$lat}},{{$lng}}];
    const map = L.map('map').setView(geo,12);

    L.tileLayer('https://api.maptiler.com/maps/basic/{z}/{x}/{y}.png?key=2MMUGS8hqbPIC9Ja7nvk', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
    }).addTo(map)

    var Icon = L.icon({
        iconUrl: '{{asset('ice.png')}}',

        iconSize:     [30, 60], // size of the icon
        // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    var searchControl = L.esri.Geocoding.geosearch({
        position: 'topright',
        placeholder: 'Search your Ice Cream location',
        useMapBounds: false,
        providers: [L.esri.Geocoding.arcgisOnlineProvider({
            apikey: 'AAPK8c45b99faffc4595adeb323921d4f4b0JmXUx6hRFnVDcoMmu9FyBHaeCPK0Q0dmUoPA-vzZ6vFLPGSN_SeYeB4Rjdrr4DaR', // replace with your api key - https://developers.arcgis.com
            nearby: {
                lat: -33.8688,
                lng: 151.2093
            }
        })]
    }).addTo(map);

    var results = L.layerGroup().addTo(map);

    const marker = L.marker(geo,{icon: Icon}).bindPopup(
        '<img src="https://static.turbosquid.com/Preview/2017/02/15__11_06_03/2.pngEE1C23C6-2483-409B-AD17-4A772BE5BC9AOriginal.jpg" width="200px" height="200px"/> {{$shopName}} '
    ).addTo(map)

    marker.on('click',() => {
        map.flyTo(geo,12);
    })


</script>
