@extends('layouts.pengunjung')

@section('container')
    <div class="section bg-landing" id="Blog">
        <div class="container">
            <div class="row">
                <h4 class="text-center fw-semibold">Postingan Terbaru </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">Destinasi.</h2>

                <div class="row">
                    @foreach ($destinasiWisataList as $destinasiWisata)
                        <div class="col-sm-6 col-md-12 col-lg-3 col-xl-6">
                            <div class="card"> <a href="{{ route('pengunjung.destinasi.show', $destinasiWisata) }}"><img class="card-img-top"
                                        src="{{ url('storage/' . $destinasiWisata->sampul) }}"
                                        alt="And this isn't my nose. This is a false one."></a>
                                <div class="card-body d-flex flex-column">
                                    <h3>{{ $destinasiWisata->nama }}</a></h3>
                                    <small
                                        class="d-block text-muted">{{ \Carbon\Carbon::parse($destinasiWisata->created_at)->locale('id')->diffForHumans() }}</small>
                                    <div class="text-muted pt-2">{{ $destinasiWisata->alamat }}</div>
                                    <div class="text-muted pt-2 text-justify">
                                        {{ Str::limit($destinasiWisata->Deskripsi, 500) }}</div>
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="ms-auto">
                                            <a href="{{ route('pengunjung.destinasi.show', $destinasiWisata) }}"
                                                class="btn btn-primary">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>

@endsection
