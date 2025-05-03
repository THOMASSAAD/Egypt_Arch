<?php
$title = "Egypt_map";
require_once 'include/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Egypt Map with Real Markers</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 90vh;
      width: 100%;
    }
    .navbar {
      padding: 10px;
      background-color: #333;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body>

<div class="navbar">
  Egyptian Archaeological Sites
</div>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  // Initialize the map
  var map = L.map('map').setView([26.8206, 30.8025], 6); // Center on Egypt

  // Add OpenStreetMap tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data © OpenStreetMap contributors'
  }).addTo(map);

  // List of all your locations
  const locations = [
    { name: "QUBBAT AL-HAWA CEMETERY", lat: 24.0889, lon: 32.8998 },
    { name: "Elephantine", lat: 24.0875, lon: 32.8856 },
    { name: "Al Kab", lat: 25.0167, lon: 32.7167 },
    { name: "Aswan", lat: 24.0889, lon: 32.8998 },
    { name: "Amada Temples", lat: 22.5833, lon: 31.65 },
    { name: "Temples of Wadi al Sebua", lat: 22.6667, lon: 31.95 },
    { name: "Gebel al-Silsila", lat: 24.6167, lon: 32.9667 },
    { name: "Abu Simbel", lat: 22.3372, lon: 31.6258 },
    { name: "Philae", lat: 24.025, lon: 32.8847 },
    { name: "Abu Mina", lat: 30.717, lon: 30.75 },
    { name: "Alexandria", lat: 31.2001, lon: 29.9187 },
    { name: "Mary’s Tree", lat: 30.0167, lon: 31.25 },
    { name: "Heliopolis", lat: 30.1200, lon: 31.2653 },
    { name: "Al-Mu'izz Street", lat: 30.0500, lon: 31.2611 },
    { name: "Cairo Citadel", lat: 30.0299, lon: 31.2617 },
    { name: "Salah al-Din Square", lat: 30.0300, lon: 31.2600 },
    { name: "Al-Saliba Street", lat: 30.0308, lon: 31.2556 },
    { name: "Al-Suyufiyya Street", lat: 30.0312, lon: 31.2594 },
    { name: "Al-Fustat (Old Cairo)", lat: 30.0061, lon: 31.2316 },
    { name: "Ayn Shams City", lat: 30.1300, lon: 31.3000 },
    { name: "Dahshur", lat: 29.8, lon: 31.2167 },
    { name: "Giza Plateau", lat: 29.9792, lon: 31.1342 },
    { name: "Saqqara", lat: 29.8711, lon: 31.2164 },
    { name: "Karnak", lat: 25.7188, lon: 32.6572 },
    { name: "Valley of the Kings", lat: 25.7402, lon: 32.6014 },
    { name: "Deir al-Bahari", lat: 25.7333, lon: 32.6 },
    { name: "Saint Catherine’s Monastery", lat: 28.5565, lon: 33.9760 },
    { name: "El Hawawish", lat: 26.5672, lon: 31.8000 },
    { name: "El Sheikh Hamad (Athribis)", lat: 26.0611, lon: 32.3247 },
    { name: "Al-Bahnasa Tombs", lat: 28.5000, lon: 30.7500 },
    { name: "Beni Hasan", lat: 27.8740, lon: 30.8080 },
    { name: "Shali village in Siwa Oasis", lat: 29.2044, lon: 25.5196 },
    { name: "Tell Basta", lat: 30.5833, lon: 31.5167 },
  ];

  // Add markers
  locations.forEach(location => {
    const marker = L.marker([location.lat, location.lon]).addTo(map);
    marker.bindPopup(location.name);
    marker.on('click', () => {
      map.setView([location.lat, location.lon], 10);
      marker.openPopup();
    });
  });
</script>

</body>
</html>

