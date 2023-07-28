<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Leaflet.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="font-sans antialiased">
    <div class="container">
        <h2>Tambah Destinasi Wisata</h2>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <form action="{{ route('destinasi-wisata.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Destinasi Wisata</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="HargaTiket">Harga Tiket</label>
                <input type="text" name="HargaTiket" id="HargaTiket" class="form-control">
            </div>
            <div class="form-group">
                <label for="FasilitasDestinasi">Fasilitas Destinasi</label>
                <input type="text" name="FasilitasDestinasi" id="FasilitasDestinasi" class="form-control">
            </div>
            <div class="form-group">
                <label for="JamBuka">Jam Buka</label>
                <input type="text" name="JamBuka" id="JamBuka" class="form-control">
            </div>
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea name="Deskripsi" id="Deskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="Sejarah">Sejarah</label>
                <textarea name="Sejarah" id="Sejarah" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
        <div id="map" style="height: 400px; margin-top: 20px;"></div>
    </div>

    <!-- Leaflet.js JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map;
    var marker;
    
    function initMap() {
        map = L.map('map').setView([-4.3097, 119.9312], 13); // Koordinat Kabupaten Soppeng, Sulawesi
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    
        marker = L.marker([-6.1754, 106.8272], {
            draggable: true
        }).addTo(map);
    
        map.on('click', function(event) {
            marker.setLatLng(event.latlng);
            fillLatitudeLongitudeInputs(event.latlng.lat, event.latlng.lng);
        });
    
        document.getElementById('alamat').addEventListener('input', function() {
            var keyword = this.value.trim();
            if (keyword) {
                geocodeAlamat(keyword);
            } else {
                // Reset preview map
                marker.setLatLng([-6.1754, 106.8272]);
                map.setView([-6.1754, 106.8272], 13);
                fillLatitudeLongitudeInputs(-6.1754, 106.8272);
            }
        });
    }
    
    function fillLatitudeLongitudeInputs(latitude, longitude) {
        document.getElementById('latitude').value = latitude.toFixed(6);
        document.getElementById('longitude').value = longitude.toFixed(6);
    }
    
    // ... fungsi geocodeAlamat ...
    
    document.addEventListener('DOMContentLoaded', function() {
        initMap();
    });
    </script>

</body>

</html>