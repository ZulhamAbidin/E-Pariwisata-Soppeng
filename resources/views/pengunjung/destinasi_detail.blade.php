@extends('layouts.pengunjung')

@section('container')
<div class="section bg-landing" id="Blog">
    <div class="container">
        <h1>Detail Destinasi Wisata</h1>
        <div class="card mb-4">
            <img src="{{ asset('storage/' . $destinasiWisata->sampul) }}" class="card-img-top" alt="Destinasi Wisata">
            <div class="card-body">
                <h5 class="card-title">{{ $destinasiWisata->nama }}</h5>
                <p class="card-text">{{ $destinasiWisata->alamat }}</p>
                <p class="card-text">{{ $destinasiWisata->Deskripsi }}</p>
            </div>
        </div>

        <h2>Komentar</h2>
        @foreach ($destinasiWisata->komentars as $komentar)
        <div class="card mb-3">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $komentar->nama }}</h6>
                <p class="card-text">{{ $komentar->isi_komentar }}</p>
            </div>
        </div>
        @endforeach

        <h2>Tambah Komentar</h2>
        <form action="{{ route('pengunjung.destinasi.tambah-komentar', $destinasiWisata) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="isi_komentar" class="form-label">Komentar</label>
                <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Komentar</button>
        </form>
    </div>
</div>

@endsection