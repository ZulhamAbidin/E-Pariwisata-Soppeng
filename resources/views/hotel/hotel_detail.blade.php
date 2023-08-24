@extends('layouts.pengunjung')

@section('container')
    <div class="main-content app-content mt-4 " id="" >

        <div class="row">

            <div class="col-xl-7">
                <div class="card mt-6">
                    <img class="card-img-top mt-6" src="{{ asset('storage/' . $destinasihotel->sampul) }}" alt="Card image cap">
                    
                    <div class="card-body">
                        <div class="d-md-flex">

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                    {{ $destinasihotel->created_at->diffForHumans() }}
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                   {{ $destinasihotel->created_at->translatedFormat('l d F Y') }}
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-star fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                    Rating: {{ number_format($destinasihotel->averageRating(), 2) }}
                                </div>
                            </a>
                                                       
                            <div class="ms-auto">
                                <a href="javascript:void(0);" class="d-flex mb-2">
                                <i  class="fe fe-message-square fs-16 me-1 p-3 bg-success-transparent text-success bradius"></i>
                                <div class=" mt-3 ms-1 text-muted font-weight-semibold">{{ $destinasihotel->totalKomentar() }} Komentar</div>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <h3><a href="javascript:void(0)"> {{ $destinasihotel->nama }}</a></h3>
                        <p class="card-text">{{ $destinasihotel->alamat }}</p>
                        <p class="text-justify"> {{ $destinasihotel->Deskripsi }}</p>

                        @if ($destinasihotel->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasihotel->gambar) as $image)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $image) }}" alt="Gambar" class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="ms-auto">
                            <div id="map" style="height: 250px;"></div>
                        </div>
                        <!-- Replace $destinasihotel->latitude and $destinasihotel->longitude with the actual variables holding the latitude and longitude values -->
                        <a href="https://www.google.com/maps?q={{ $destinasihotel->latitude }},{{ $destinasihotel->longitude }}"
                            target="_blank" class="btn block btn-primary mt-2">Lihat di Google Maps</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Commentar</div>
                    </div>
                    
                    @foreach ($destinasihotel->komentars as $komentar)
                    <div class="card-body pb-0">
                        <div class="media mb-1 overflow-visible d-block d-sm-flex">
                            <div class="me-3 mb-2">
                                <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                        src="../assets/images/users/2.jpg"> </a>
                            </div>
                            <div class="media-body overflow-visible">
                                <div class="border mb-5 p-4 br-5">
                                    <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                    <span><i class="fe fe-thumb-up text-danger"></i></span>
                                    <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                        {{ $komentar->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- ular --}}
                    
                    {{-- <div class="card-body pb-0">
                        @foreach ($destinasihotel->komentars->take(3) as $komentar)
                        <div class="media mb-1 overflow-visible d-block d-sm-flex">
                            <div class="me-3 mb-2">
                                <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                        src="../assets/images/users/2.jpg"> </a>
                            </div>
                            <div class="media-body overflow-visible">
                                <div class="border mb-5 p-4 br-5">
                                    <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                    <span><i class="fe fe-thumb-up text-danger"></i></span>
                                    <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                    <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                        {{ $komentar->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        @if ($destinasihotel->komentars->count() > 3)
                        <div class="text-end">
                            <a href="#" id="showAllComments" class="text-muted">Lihat semua komentar</a>
                        </div>
                        <div id="allComments" style="display: none;">
                            @foreach ($destinasihotel->komentars->slice(3) as $komentar)
                            <div class="media mb-1 overflow-visible d-block d-sm-flex">
                                <div class="me-3 mb-2">
                                    <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                            src="../assets/images/users/2.jpg"> </a>
                                </div>
                                <div class="media-body overflow-visible">
                                    <div class="border mb-5 p-4 br-5">
                                        <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                        <span><i class="fe fe-thumb-up text-danger"></i></span>
                                        <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                            {{ $komentar->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div> --}}

                </div>


                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add a Comments</div>
                    </div>
                    <div class="card-body">
                        

                        <form action="{{ route('pengunjung.hotel.tambah-komentar', $destinasihotel) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="isi_komentar">Komentar</label>
                                <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="5" placeholder="Isi komentar"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select class="form-control" id="rating" name="rating" required>
                                    <option value="">Pilih rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Komentar dan Rating</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-xl-5 mt-6">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Artikel Terkait</div>
                    </div>
                    @foreach ($daftarhotelTerbaru as $postinganTerbaru)
                        <div class="card-body">
                            <div class="">
                                    <div class="d-flex overflow-visible">
                                        <a href="{{ route('pengunjung.hotel.show', $postinganTerbaru) }}"
                                            class="card-aside-column br-5 cover-image"
                                            data-bs-image-src="{{ asset('storage/' . $postinganTerbaru->sampul) }}"
                                            style="background: url('{{ asset('storage/' . $postinganTerbaru->sampul) }}') center center;"></a>
                                        <div class="ps-3 flex-column">
                                            <h4><a
                                                    href="{{ route('pengunjung.hotel.show', $postinganTerbaru) }}">{{ $postinganTerbaru->nama }}</a>
                                            </h4>
                                            <div class="text-muted">{{ $postinganTerbaru->alamat }}</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>

        </div>

    </div>

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

    {{-- ular --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showAllComments").click(function(e) {
                e.preventDefault();
                $("#allComments").slideToggle();
            });
        });
    </script> --}}

@endsection
