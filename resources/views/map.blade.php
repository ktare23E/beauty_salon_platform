<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Leaflet Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 450px;
            width: 600px;
        }
    </style>
</head>
<body>
    <h1>Dynamic Leaflet Map</h1>
    <input type="text" id="address" placeholder="Enter an address">
    <button onclick="updateMap()">Update Map</button>
    <div id="map"></div>

    <script>
        // Initialize the map
        const map = L.map('map').setView([8.0577, 123.7497], 13);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            zoom: 13
        }).addTo(map);

        // Function to update the map based on user input
        // function updateMap() {
        //     const address = document.getElementById('address').value;
        //     const geocodeApiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`;

        //     fetch(geocodeApiUrl)
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.length > 0) {
        //                 const location = data[0];
        //                 const lat = location.lat;
        //                 const lon = location.lon;
        //                 const newLatLng = new L.LatLng(lat, lon);
        //                 map.setView(newLatLng, 13);

        //                 // Add a marker
        //                 L.marker(newLatLng).addTo(map)
        //                     .bindPopup(`<b>${location.display_name}</b>`)
        //                     .openPopup();
        //             } else {
        //                 alert('Location not found');
        //             }
        //         })
        //         .catch(error => console.error('Error:', error));
        // }
    </script>
</body>
</html>
