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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
                <label for="sampul">Sampul</label>
                <input type="file" name="sampul" id="sampul" class="form-control-file">
                <small class="form-text text-muted">Unggah gambar sampul baru (jpeg, png, jpg, gif)</small>
            </div>
            
            <!-- Menampilkan sampul lama jika ada -->
            <div class="form-group">
                <label for="sampul_lama">Sampul Lama</label>
                @if ($destinasiWisata->sampul)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $destinasiWisata->sampul) }}" alt="Sampul Lama" class="img-fluid"
                        style="max-height: 200px;">
                </div>
                @else
                <p>Tidak ada sampul lama.</p>
                @endif
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
            map = L.map('map').setView([initialLatitude, initialLongitude], 13);
    
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
                    marker.setLatLng([initialLatitude, initialLongitude]);
                    map.setView([initialLatitude, initialLongitude], 13);
                    fillLatitudeLongitudeInputs(initialLatitude, initialLongitude);
                }
            });
        }
    
        function fillLatitudeLongitudeInputs(latitude, longitude) {
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }
    
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
        <h1 class="page-title">Edit Destinasi Wisata</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                {{-- <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="seach" class="form-control form-control" id="search-input"
                            placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary" id="search-button">tidak aktif Search</span>
                    </div>
                </div> --}}

            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Destinasi Wisata</h4>
                </div>

                <div class="card-body">
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
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $destinasiWisata->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $destinasiWisata->alamat }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $destinasiWisata->latitude }}"
                         readonly   required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control"
                         readonly   value="{{ $destinasiWisata->longitude }}" required>
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
                        <input type="text" name="JamBuka" id="JamBuka" class="form-control" value="{{ $destinasiWisata->JamBuka }}">
                    </div>
                    <div class="form-group">
                        <label for="Deskripsi">Deskripsi</label>
                        <textarea name="Deskripsi" id="Deskripsi" class="form-control">{{ $destinasiWisata->Deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="Sejarah">Sejarah</label>
                        <textarea name="Sejarah" id="Sejarah" class="form-control">{{ $destinasiWisata->Sejarah }}</textarea>
                    </div>
                
                
                    <div class="form-group">
                        <label for="sampul">Sampul Baru</label>
                        <input type="file" name="sampul" id="sampul" class="form-control-file">
                        <small class="form-text text-muted">Unggah gambar sampul baru (jpeg, png, jpg, gif)</small>
                    </div>
                
                    <!-- Menampilkan sampul lama jika ada -->
                    <div class="form-group">
                        <label for="sampul_lama">Sampul Lama</label>
                        @if ($destinasiWisata->sampul)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $destinasiWisata->sampul) }}" alt="Sampul Lama" class="img-fluid" style="max-height: 200px;">
                        </div>
                        @else
                        <p>Tidak ada sampul lama.</p>
                        @endif
                    </div>
                
                    <div class="form-group">
                        <label for="gambar">Gambar Baru</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                        <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                    </div>
                    <div class="form-group">
                        <label for="gambar_lama">Gambar Lama</label>
                        @if ($destinasiWisata->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid" style="max-height: 200px;">
                            </div>
                            @endforeach
                        </div>

                        @else
                        <p>Tidak ada gambar lama.</p>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <div id="map" style="height: 400px; margin-top: 20px;"></div>
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


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script>
    var map;
        var marker;
        var initialLatitude = {{ $destinasiWisata->latitude }};
        var initialLongitude = {{ $destinasiWisata->longitude }};
    
        function initMap() {
            map = L.map('map').setView([initialLatitude, initialLongitude], 13);
    
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
                    marker.setLatLng([initialLatitude, initialLongitude]);
                    map.setView([initialLatitude, initialLongitude], 13);
                    fillLatitudeLongitudeInputs(initialLatitude, initialLongitude);
                }
            });
        }
    
        function fillLatitudeLongitudeInputs(latitude, longitude) {
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }
    
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