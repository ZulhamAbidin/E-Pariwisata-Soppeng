{{-- <!DOCTYPE html>
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
        
        <form action="{{ route('destinasi-wisata.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="nama">Nama Destinasi Wisata</label>
                <input type="text" value="tes" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" value="tes" name="alamat" id="alamat" class="form-control" required>
            </div>
          
            <div class="form-group">
                <label for="HargaTiket">Harga Tiket</label>
                <input type="number"  value="20000" name="HargaTiket" id="HargaTiket" class="form-control">
            </div>
            <div class="form-group">
                <label for="FasilitasDestinasi">Fasilitas Destinasi</label>
                <input type="text"  value="tes" name="FasilitasDestinasi" id="FasilitasDestinasi" class="form-control">
            </div>
            <div class="form-group">
                <label for="JamBuka">Jam Buka</label>
                <input type="text" value="tes" name="JamBuka" id="JamBuka" class="form-control">
            </div>
            <div class="form-group">
                <label for="Deskripsi">Deskripsi</label>
                <textarea name="Deskripsi"  id="Deskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="Sejarah">Sejarah</label>
                <textarea name="Sejarah" id="Sejarah" class="form-control"></textarea>
            </div>
             <div class="form-group">
                <label for="latitude" class="sr-only">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="longitude" class="sr-only">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" required readonly>
            </div>
            <div class="form-group">
                <label for="sampul">Sampul:</label>
                <input type="file" name="sampul" class="form-control-file" id="sampul">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
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

</html> --}}









@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Destinasi Wisata</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">

                    <div class="card-body pb-4">
                        <div class="input-group mb-2">
                            <input type="seach" class="form-control form-control" id="search-input"
                                placeholder="Searching.....">
                            <span class="input-group-text btn btn-primary" id="search-button">tidak aktif Search</span>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Destinasi Wisata</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('destinasi-wisata.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Destinasi Wisata</label>
                                <input type="text" value="tes" required name="nama" id="nama"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="tes" required name="alamat" id="alamat"
                                    class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="HargaTiket">Harga Tiket</label>
                                <input type="number" value="20000" required name="HargaTiket" id="HargaTiket"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="FasilitasDestinasi">Fasilitas Destinasi</label>
                                <input type="text" value="tes" required name="FasilitasDestinasi"
                                    id="FasilitasDestinasi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="JamBuka">Jam Buka</label>
                                <input type="text" value="tes" required name="JamBuka" id="JamBuka"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Deskripsi">Deskripsi</label>
                                <textarea name="Deskripsi" required id="Deskripsi" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Sejarah">Sejarah</label>
                                <textarea name="Sejarah" required id="Sejarah" class="form-control"></textarea>
                            </div>
                            <div id="map" style="height: 400px; margin-top: 20px;"></div>
                            <div class="form-group">
                                <label for="latitude" class="sr-only">Latitude</label>
                                <input type="text" required name="latitude" id="latitude" class="form-control" required
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="longitude" class="sr-only">Longitude</label>
                                <input type="text" required name="longitude" id="longitude" class="form-control" required
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="sampul">Sampul:</label>
                                <input type="file" required name="sampul" class="form-control-file" id="sampul">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                                <small class="form-text text-muted" required>Unggah gambar baru (jpeg, png, jpg,
                                    gif)</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    @if ($errors->any())
        <script>
            var errorMessage = "<ul>";
            @foreach ($errors->all() as $error)
                errorMessage += "<li>{{ $error }}</li>";
            @endforeach
            errorMessage += "</ul>";

            Swal.fire({
                title: "Error",
                html: errorMessage,
                icon: "error",
                timer: 15000,
                showConfirmButton: false
            });
        </script>
    @endif



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

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ session('error') }}",
                icon: "error",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
