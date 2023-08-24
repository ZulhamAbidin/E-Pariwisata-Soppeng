@extends('layouts.pengunjung')

@section('container')
    <div class="main-content app-content mt-4" id="">

        <div class="row">

            <div class="col-xl-7">
                <div class="card mt-4">
                    <img class="card-img-top mt-6" src="{{ asset('storage/' . $destinasiKuliner->sampul) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-md-flex">

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-clock fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                    {{ $destinasiKuliner->created_at->diffForHumans() }}
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                   {{ $destinasiKuliner->created_at->translatedFormat('l d F Y') }}
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="d-flex me-4 mb-2">
                                <i class="fe fe-star fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                    Rating: {{ number_format($destinasiKuliner->averageRating(), 2) }}
                                </div>
                            </a>
                                                       
                            <div class="ms-auto">
                                <a href="javascript:void(0);" class="d-flex mb-2">
                                <i  class="fe fe-message-square fs-16 me-1 p-3 bg-success-transparent text-success bradius"></i>
                                <div class=" mt-3 ms-1 text-muted font-weight-semibold">{{ $destinasiKuliner->totalKomentar() }} Komentar</div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <h3><a href="javascript:void(0)"> {{ $destinasiKuliner->nama }}</a></h3>
                        <p class="card-text">{{ $destinasiKuliner->alamat }}</p>
                        <p class="text-justify"> {{ $destinasiKuliner->Deskripsi }}</p>

                        @if ($destinasiKuliner->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasiKuliner->gambar) as $image)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $image) }}" alt="Gambar" class="img-fluid">
                            </div>
                            @endforeach
                        </div>
                        @endif

                        <div class="ms-auto">
                            <div id="map" style="height: 250px;"></div>
                        </div>
                        <!-- Replace $destinasiKuliner->latitude and $destinasiKuliner->longitude with the actual variables holding the latitude and longitude values -->
                        <a href="https://www.google.com/maps?q={{ $destinasiKuliner->latitude }},{{ $destinasiKuliner->longitude }}"
                            target="_blank" class="btn block btn-primary mt-2">Lihat di Google Maps</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Commentar</div>
                    </div>
                    
                    <div class="card body">
                        <div class="card-header">
                            <div class="card-title">Comments</div>
                        </div>
                    
                        @foreach ($destinasiKuliner->komentars as $komentar)
                        <div class="card-body pb-0">
                            <div class="media mb-5 overflow-visible d-block d-sm-flex">
                                {{-- <div class="me-3 mb-2">
                                    <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                            src="../assets/images/users/5.jpg"> </a>
                                </div> --}}
                                <div class="media-body overflow-visible">
                                    <div class="border mb-5 p-4 br-5">
                                        <h5 class="mt-0">{{ $komentar->nama }}</h5>
                                        <span><i class="fe fe-thumb-up text-danger"></i></span>
                                        <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                        <div class="mt-3 ms-1 text-muted font-weight-semibold">
                                            {{ $komentar->created_at->diffForHumans() }}
                                        </div>
                    
                                        <span class="reply" data-commentid="{{ $komentar->id }}">
                                            <div class="reply-button mt-2">
                                                <span class="reply-badge btn-primary bg-primary rounded-pill py-1 btn-sm px-2">
                                                    <i class="fe fe-corner-up-left mx-1"></i>Reply
                                                </span>
                                            </div>
                                        </span>
                    
                                        <form method="POST" style="display: none;" class="comment-form mt-4"
                                            data-commentid="{{ $komentar->id }}"
                                            action="{{ route('pengunjung.kuliner.tambah-balasan-komentar', ['destinasiKuliner' => $destinasiKuliner->id, 'komentar' => $komentar->id]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="centang_biru" value="{{ Auth::check() ? 1 : 0 }}">
                                                <label for="nama">Nama</label>
                                                <?php
                                                                        $namaValue = Auth::check() ? auth()->user()->name : old('nama');
                                                                        $readonly = Auth::check() ? 'readonly' : '';
                                                                    ?>
                                                <input type="text" class="form-control mb-2" id="nama" name="nama"
                                                    placeholder="Nama lengkap" required value="{{ $namaValue }}" {{ $readonly }}>
                    
                                                <label for="isi_balasan">Balas Komentar</label>
                                                <textarea name="isi_balasan" class="form-control @error('isi_balasan') is-invalid @enderror"
                                                    rows="3">{{ old('isi_balasan') }}</textarea>
                                                @error('isi_balasan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-sm btn-primary">Balas</button>
                                        </form>
                                    </div>
                    
                    
                                    {{-- komentar balasan --}}
                                    @foreach ($komentar->balasanKomentars as $balasan)
                                    @if ($balasan->parent_komentar_id === $komentar->id)
                                    <div class="media mb-5 overflow-visible">
                                        <div class="me-6">
                                            {{-- <a href="profile.html"> <img class="media-object rounded-circle thumb-sm" alt="64x64"
                                                    src="../assets/images/users/2.jpg"> </a> --}}
                                        </div>
                                        <div class="media-body border p-4 overflow-visible br-5">
                                            <h5 class="mt-0">
                                                @if ($balasan->centang_biru)
                                                <img src="{{ asset('images/logo.webp') }}" alt="" class="img-fluid"
                                                    style="width: 24px; height: 24px;"><!-- Tampilkan centang biru dengan ukuran fs-24 -->
                                                @endif
                                                {{ $balasan->nama }}
                                            </h5>
                                            <span>
                                                <i class="fe fe-thumb-up text-danger"></i>
                                            </span>
                                            <p>{{ $balasan->isi_balasan }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    {{-- komentar balasan --}}
                    
                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>

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
                        

                        <form action="{{ route('pengunjung.kuliner.tambah-komentar', $destinasiKuliner) }}" method="POST">
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
                    @foreach ($daftarKulinerTerbaru as $postinganTerbaru)
                        <div class="card-body">
                            <div class="">
                                    <div class="d-flex overflow-visible">
                                        <a href="{{ route('pengunjung.kuliner.show', $postinganTerbaru) }}"
                                            class="card-aside-column br-5 cover-image"
                                            data-bs-image-src="{{ asset('storage/' . $postinganTerbaru->sampul) }}"
                                            style="background: url('{{ asset('storage/' . $postinganTerbaru->sampul) }}') center center;"></a>
                                        <div class="ps-3 flex-column">
                                            <h4><a
                                                    href="{{ route('pengunjung.kuliner.show', $postinganTerbaru) }}">{{ $postinganTerbaru->nama }}</a>
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
            var latitude = {{ $destinasiKuliner->latitude }};
            var longitude = {{ $destinasiKuliner->longitude }};
            var location = [latitude, longitude];
    
            map = L.map('map').setView(location, 13);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    
            L.marker(location).addTo(map)
                .bindPopup('{{ $destinasiKuliner->nama }}').openPopup();
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
