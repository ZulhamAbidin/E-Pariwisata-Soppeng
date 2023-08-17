@extends('layouts.pengunjung')

@section('container')
    <div class="section bg-landing" id="Blog">
        <div class="container">

            <div class="card">
            
                <div class="card-body pb-4">
                    <form action="{{ route('pengunjung.kebudayaan.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Cari Destinasi">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>

            <div class="row">
                <h4 class="text-center fw-semibold bok">Postingan Kebudayaan Terbaru </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">List Kebudayaan.</h2>

                <div class="row">

                    @foreach ($destinasikebudayaanList as $destinasikebudayaan)
                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-6">
                            <div class="card"> <a href="{{ route('pengunjung.kebudayaan.show', $destinasikebudayaan) }}"><img class="card-img-top"
                                        src="{{ url('storage/' . $destinasikebudayaan->sampul) }}"
                                        alt="And this isn't my nose. This is a false one."></a>
                                <div class="card-body d-flex flex-column">
                                    <h3>{{ $destinasikebudayaan->nama }}</a></h3>
                                    <small  class="d-block text-muted">{{ \Carbon\Carbon::parse($destinasikebudayaan->created_at)->locale('id')->diffForHumans() }}</small>
                                    <div class="text-muted pt-2">{{ $destinasikebudayaan->alamat }}</div>
                                    <div class="text-muted pt-2 text-justify">
                                        {{ Str::limit($destinasikebudayaan->Deskripsi, 500) }}</div>
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="ms-auto">
                                            <a href="{{ route('pengunjung.kebudayaan.show', $destinasikebudayaan) }}" class="btn btn-primary">Lihat</a>
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


<style>
    @media screen and (max-width: 992px) {
        .bok {
            margin-top: 40px !important
        }
    }
</style>