@extends('layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-3 fw-bold text-center text-pink">Peta Kantor PLN</h2>
    <div id="map" style="height: 600px; border-radius: 10px; border: 5px solid #f8d9e6;"></div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView([-2.5489, 118.0149], 5); // Pusat Indonesia

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    const kantor = @json($kantor);

    kantor.forEach(k => {
        L.marker([k.lat, k.lng])
            .addTo(map)
            .bindPopup(`<strong class="text-pink">${k.nama}</strong><br>Wilayah: ${k.wilayah}<br>Penempatan: ${k.penempatan}`);
    });
</script>

@endsection

@section('styles')
<style>
    /* Gaya keseluruhan untuk memberikan nuansa pink */
    body {
        background-color: #f8d9e6;
    }

    h2 {
        color: #d63384;
    }

    /* Peta dengan border pink */
    #map {
        border-radius: 10px;
        border: 5px solid #f8d9e6;
    }

    /* Mengubah gaya popup agar lebih berwarna pink */
    .leaflet-popup-content {
        color: #d63384;
    }

    .leaflet-popup-content-wrapper {
        background-color: #f8d9e6;
    }

    /* Warna ikon marker jika ingin lebih menonjol dengan warna pink */
    .leaflet-marker-icon {
        background-color: #d63384;
        border-radius: 50%;
    }
</style>
@endsection
