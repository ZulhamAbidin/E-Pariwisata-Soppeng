@extends('layouts.pengunjung')

@section('container')
    <div class="main-content app-content mt-4" id="">

        <div class="row">

            <div class="col-xl-8">
                <div class="card">
                    <img class="card-img-top " src="{{ asset('storage/' . $destinasiWisata->sampul) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-md-flex">
                            <a href="javascript:void(0);" class="d-flex me-4 mb-2"><i
                                    class="fe fe-calendar fs-16 me-1 p-3 bg-secondary-transparent text-secondary bradius"></i>
                                <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">Sep-25-2021</div>
                            </a>
                            {{-- <a href="profile.html" class="d-flex mb-2"><i
                                    class="fe fe-user fs-16 me-1 p-3 bg-primary-transparent text-primary bradius"></i>
                                <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">Harry Fisher</div>
                            </a> --}}
                            <div class="ms-auto">
                                <a href="javascript:void(0);" class="d-flex mb-2"><i
                                        class="fe fe-message-square fs-16 me-1 p-3 bg-success-transparent text-success bradius"></i>
                                    <div class="mt-0 mt-3 ms-1 text-muted font-weight-semibold">13 Comments</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3><a href="javascript:void(0)"> {{ $destinasiWisata->nama }}</a></h3>
                        <p class="card-text">{{ $destinasiWisata->alamat }}</p>
                        <p> {{ $destinasiWisata->Deskripsi }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Commentar</div>
                    </div>
                    
                    @foreach ($destinasiWisata->komentars as $komentar)
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>








                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Add a Comments</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengunjung.destinasi.tambah-komentar', $destinasiWisata) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="5">Your Comment*</textarea>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary btn-rounded  waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mt-6">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Artikel Terkait</div>
                    </div>
                    <div class="card-body">
                        <div class="">

                            @foreach ($daftarPostinganTerbaru as $postinganTerbaru)
                                <div class="d-flex overflow-visible">
                                    <a href="{{ route('pengunjung.destinasi.show', $postinganTerbaru) }}"
                                        class="card-aside-column br-5 cover-image"
                                        data-bs-image-src="{{ asset('storage/' . $postinganTerbaru->sampul) }}"
                                        style="background: url('{{ asset('storage/' . $postinganTerbaru->sampul) }}') center center;"></a>
                                    <div class="ps-3 flex-column">
                                        <h4><a
                                                href="{{ route('pengunjung.destinasi.show', $postinganTerbaru) }}">{{ $postinganTerbaru->nama }}</a>
                                        </h4>
                                        <div class="text-muted">{{ $postinganTerbaru->alamat }}</div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
@endsection
