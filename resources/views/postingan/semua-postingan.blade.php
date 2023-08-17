@extends('layouts.pengunjung')

@section('container')
    <div class="section bg-landing" id="Blog">
        <div class="container">

            <div class="card">

                <div class="card-body pb-4">
                    <form action="{{ route('cari.postingan') }}" method="GET">
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
                <h4 class="text-center fw-semibold bok">Semua Postingan </h4>
                <span class="landing-title"></span>


                <h2 class="text-center fw-semibold mb-7">Semua Destinasi</h2>

                <div class="row">
                    {{-- @if ($noResults)
                        <div class="col-lg-12">
                            <p>Tidak ditemukan hasil yang sesuai dengan pencarian.</p>
                        </div>
                    @else --}}
                    @foreach ($posts as $post)
                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-4">
                                <div class="card"> <a href="{{ route('pengunjung.destinasi.show', $post) }}"><img
                                            class="card-img-top" src="{{ url('storage/' . $post->sampul) }}"
                                            alt="And this isn't my nose. This is a false one."></a>
                                    <div class="card-body d-flex flex-column">
                                        <h3>{{ $post->nama }}</a></h3>
                                        <small
                                            class="d-block text-muted">{{ \Carbon\Carbon::parse($post->created_at)->locale('id')->diffForHumans() }}</small>
                                        <div class="text-muted pt-2">{{ $post->alamat }}</div>
                                        <div class="text-muted pt-2 text-justify">
                                            {{ Str::limit($post->Deskripsi, 500) }}</div>
                                        <div class="d-flex align-items-center pt-5 mt-auto">
                                            <div class="ms-auto">
                                                <a href="{{ route('pengunjung.destinasi.show', $post) }}"
                                                    class="btn btn-primary">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    {{-- @endif --}}
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
