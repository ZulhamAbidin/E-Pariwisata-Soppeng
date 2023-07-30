@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Detail Destinasi Hotel</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">{{ $destinasihotel->nama }}</h3>
                    </div>
                    <div class="card-body h-100">
                        <div id="carousel-captions1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">

                                <div class="carousel-item active">
                                    <img class="d-block w-100 br-5" alt=""
                                        src="{{ url('storage/' . $destinasihotel->sampul) }}"
                                        data-bs-holder-rendered="true">
                                </div>

                                @foreach (json_decode($destinasihotel->gambar) as $imagePath)
                                    <div class="carousel-item">
                                        <img class="d-block w-100 br-5" alt=""
                                            src="{{ url('storage/' . $imagePath) }}" data-bs-holder-rendered="true">
                                    </div>
                                @endforeach

                            </div>

                            <a class="carousel-control-prev" href="#carousel-captions1" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>

                            <a class="carousel-control-next" href="#carousel-captions1" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row row-sm">
                            {{-- <div class="col-xl-5 col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="product-carousel">
                                            <div id="Slider" class="carousel slide border" data-bs-ride="false">
                                                <div class="carousel-inner">

                                                    <div class=""> <img
                                                            src="{{ url('storage/' . $destinasihotel->sampul) }}"
                                                            alt="img" class="img-fluid mx-auto d-block">
                                                        <div class="text-center mb-5 mt-5 btn-list"></div>
                                                    </div>
                                                    @foreach (json_decode($destinasihotel->gambar) as $imagePath)
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
                            </div> --}}
                            <div class="details col-xl-12 col-lg-12 col-md-12 mt-4 mt-xl-0">
                                <div class="mt-2 mb-4">
                                    <h3 class="mb-3 fw-semibold">{{ $destinasihotel->nama }}</h3>
                                    <p class="text-muted mb-4">{{ $destinasihotel->alamat }}</p>

                                    <h4 class="mt-4 "><b> Deskripsi Lokasi Destinasi</b></h4>
                                    <p class="fw-bold text-success fw-bold text-justify">{{ $destinasihotel->Deskripsi }}
                                    </p>

                                    <div class=" mt-4 mb-5"><span class="fw-bold me-2">Jam Buka :</span><span
                                            class="fw-bold text-success">{{ $destinasihotel->JamBuka }}</span></div>

                                    <div class="">
                                        <span class="fw-bold me-2">Lokasi :</span>
                                        <div class="ms-auto">
                                            <div id="map" style="height: 250px;"></div>
                                        </div>
                                    </div>

                                    <a href="https://www.google.com/maps?q={{ $destinasihotel->latitude }},{{ $destinasihotel->longitude }}"
                                        target="_blank" class="btn btn-primary block">Buka di Google Maps</a>
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
                var latitude = {{ $destinasihotel->latitude }};
                var longitude = {{ $destinasihotel->longitude }};
                var location = [latitude, longitude];

                map = L.map('map').setView(location, 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                L.marker(location).addTo(map)
                    .bindPopup('{{ $destinasihotel->nama }}').openPopup();
            }

            document.addEventListener('DOMContentLoaded', function() {
                initMap();
            });
        </script>
    @endpush
