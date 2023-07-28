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
        <h2>Edit Destinasi Wisata</h2>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <form action="{{ route('destinasi-wisata.update', ['id' => $destinasiWisata->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Destinasi Wisata</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $destinasiWisata->nama }}"
                    required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $destinasiWisata->alamat }}"
                    required>
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control"
                    value="{{ $destinasiWisata->latitude }}" required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control"
                    value="{{ $destinasiWisata->longitude }}" required>
            </div>
            <div class="form-group">
                <label for="HargaTiket">Harga Tiket</label>
                <input type="text" name="HargaTiket" id="HargaTiket" class="form-control"
                    value="{{ $destinasiWisata->HargaTiket }}">
            </div>
            <div class="form-group">
                <label for="FasilitasDestinasi">Fasilitas Destinasi</label>
                <input type="text" name="FasilitasDestinasi" id="FasilitasDestinasi" class="form-control"
                    value="{{ $destinasiWisata->FasilitasDestinasi }}">
            </div>
            <div class="form-group">
                <label for="JamBuka">Jam Buka</label>
                <input type="text" name="JamBuka" id="JamBuka" class="form-control"
                    value="{{ $destinasiWisata->JamBuka }}">
            </div>
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea name="Deskripsi" id="Deskripsi"
                    class="form-control">{{ $destinasiWisata->Deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="Sejarah">Sejarah</label>
                <textarea name="Sejarah" id="Sejarah" class="form-control">{{ $destinasiWisata->Sejarah }}</textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
            </div>
            <div class="form-group">
                <label for="gambar_lama">Gambar Lama</label>
                @if ($destinasiWisata->gambar)
                @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid"
                        style="max-height: 200px;">
                </div>
                @endforeach
                @else
                <p>Tidak ada gambar lama.</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('destinasi-wisata.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <div id="map" style="height: 400px; margin-top: 20px;"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map;
        var marker;
        var initialLatitude = {{ $destinasiWisata->latitude }};
        var initialLongitude = {{ $destinasiWisata->longitude }};

        function initMap() {
            map = L.map('map').setView([initialLatitude, initialLongitude],
            13); // Koordinat default dari data destinasi wisata yang akan diedit

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            marker = L.marker([initialLatitude, initialLongitude], {
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
                    marker.setLatLng([initialLatitude, initialLongitude]);
                    map.setView([initialLatitude, initialLongitude], 13);
                    fillLatitudeLongitudeInputs(initialLatitude, initialLongitude);
                }
            });
        }

        // ... fungsi geocodeAlamat ...

        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
    </script>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</body>

</html>
