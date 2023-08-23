@extends('layouts.pengunjung')

@section('container')
    <div class="section bg-landing" id="Blog">
        <div class="container">

            <div class="card">
                
                <div class="card-body pb-4">
                    <form action="{{ route('pengunjung.hotel.index') }}" method="GET">
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
                <h4 class="text-center fw-semibold bok">Postingan Terbaru </h4>
                <span class="landing-title"></span>
                <h2 class="text-center fw-semibold mb-7">Penginapan Dan Hotel.</h2>

                <div class="row">
                    @foreach ($destinasihotelList as $destinasihotel)
                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-6">
                            <div class="card"> <a href="{{ route('pengunjung.hotel.show', $destinasihotel) }}"><img class="card-img-top"
                                        src="{{ url('storage/' . $destinasihotel->sampul) }}"
                                        alt="And this isn't my nose. This is a false one."></a>
                                <div class="card-body d-flex flex-column">
                                    <h3>{{ $destinasihotel->nama }}</a></h3>
                                    <small  class="d-block text-muted">{{ \Carbon\Carbon::parse($destinasihotel->created_at)->locale('id')->diffForHumans() }}</small>
                                    <div class="text-muted pt-2">{{ $destinasihotel->alamat }}</div>
                                    <div class="text-muted pt-2 text-justify">
                                        {{ Str::limit($destinasihotel->Deskripsi, 500) }}</div>
                                    <div class="d-flex align-items-center pt-5 mt-auto">
                                        <div class="ms-auto">
                                            <a href="{{ route('pengunjung.hotel.show', $destinasihotel) }}" class="btn btn-primary">Lihat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $destinasihotelList->links('pagination::bootstrap-5') }}
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