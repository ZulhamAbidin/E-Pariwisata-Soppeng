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
        <h2>Detail Destinasi Wisata</h2>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>{{ $destinasiWisata->nama }}</h3>
            </div>
           <div class="card-body">
                <p><strong>Alamat:</strong> {{ $destinasiWisata->alamat }}</p>
                <p><strong>Latitude:</strong> {{ $destinasiWisata->latitude }}</p>
                <p><strong>Longitude:</strong> {{ $destinasiWisata->longitude }}</p>
                <p><strong>Harga Tiket:</strong> {{ $destinasiWisata->HargaTiket }}</p>
                <p><strong>Fasilitas Destinasi:</strong> {{ $destinasiWisata->FasilitasDestinasi }}</p>
                <p><strong>Jam Buka:</strong> {{ $destinasiWisata->JamBuka }}</p>
                <p><strong>Deskripsi:</strong> {{ $destinasiWisata->Deskripsi }}</p>
                <p><strong>Sejarah:</strong> {{ $destinasiWisata->Sejarah }}</p>
                @if ($destinasiWisata->sampul)
                <p><strong>Sampul:</strong></p>
                <img src="{{ url('storage/' . $destinasiWisata->sampul) }}" alt="Sampul Destinasi Wisata" class="img-fluid">
                @endif
               @if ($destinasiWisata->gambar)
                <p><strong>Gambar:</strong></p>
                @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                <img src="{{ url('storage/' . $imagePath) }}" alt="Gambar Destinasi Wisata" class="img-fluid">
                @endforeach
                @endif
                <div id="map" style="height: 400px;"></div>
                <a href="https://www.google.com/maps?q={{ $destinasiWisata->latitude }},{{ $destinasiWisata->longitude }}"
                    target="_blank" class="btn btn-primary mt-3">Buka di Google Maps</a>
            </div>
        </div>
        <a href="{{ route('destinasi-wisata.index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>

    <!-- Leaflet.js JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        var map;

        function initMap() {
            var latitude = {{ $destinasiWisata->latitude }};
            var longitude = {{ $destinasiWisata->longitude }};
            var location = [latitude, longitude];

            map = L.map('map').setView(location, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            L.marker(location).addTo(map)
                .bindPopup('{{ $destinasiWisata->nama }}').openPopup();
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
        <h1 class="page-title">Detail Destinasi Wisata</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </div>
    </div>

    <div class="row">
       <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row row-sm">
                    <div class="col-xl-5 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="product-carousel">
                                    <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                        <div class="carousel-inner">
                                            
                                            <div class=""> <img src="{{ url('storage/' . $destinasiWisata->sampul) }}" alt="img"
                                                    class="img-fluid mx-auto d-block">
                                                <div class="text-center mb-5 mt-5 btn-list"></div>
                                            </div>
                                            @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                                            <div class=""> <img src="{{ url('storage/' . $imagePath) }}"
                                                    alt="img" class="img-fluid mx-auto d-block">
                                                <div class="text-center mb-5 mt-5 btn-list"></div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                        <div class="mt-2 mb-4">
                            <h3 class="mb-3 fw-semibold">{{ $destinasiWisata->nama }}</h3>
                            <p class="text-muted mb-4">{{ $destinasiWisata->alamat }}</p>
                            
                            <h4 class="mt-4 "><b> Deskripsi Lokasi Destinasi</b></h4>
                            <p class="fw-bold text-success fw-bold text-justify">{{ $destinasiWisata->Deskripsi }}</p>
                            
                            <div class=" mt-4 mb-5"><span class="fw-bold me-2">Fasilitas Destinasi :</span><span class="fw-bold text-success">{{ $destinasiWisata->FasilitasDestinasi }}</span></div>
                            <div class=" mt-4 mb-5"><span class="fw-bold me-2">Jam Buka :</span><span class="fw-bold text-success">{{ $destinasiWisata->JamBuka }}</span></div>
                            <div class=" mt-4 mb-5"><span class="fw-bold me-2">Sejarah :</span><span class="fw-bold text-success text-justify">{{ $destinasiWisata->Sejarah }}</span></div>

                            <div class="">
                                <span class="fw-bold me-2">Lokasi :</span>
                                <div class="ms-auto">
                                    <div id="map" style="height: 250px;"></div>
                                </div>
                            </div>

                                <a href="https://www.google.com/maps?q={{ $destinasiWisata->latitude }},{{ $destinasiWisata->longitude }}"  target="_blank" class="btn btn-primary block">Buka di Google Maps</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <script>
        var map;
    
            function initMap() {
                var latitude = {{ $destinasiWisata->latitude }};
                var longitude = {{ $destinasiWisata->longitude }};
                var location = [latitude, longitude];
    
                map = L.map('map').setView(location, 13);
    
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    
                L.marker(location).addTo(map)
                    .bindPopup('{{ $destinasiWisata->nama }}').openPopup();
            }
    
            document.addEventListener('DOMContentLoaded', function() {
                initMap();
            });
    </script>


    @endpush