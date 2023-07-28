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
</head>

<body class="font-sans antialiased">
    <div class="container">
        <h2>Daftar Destinasi Wisata</h2>
       <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Harga Tiket</th>
                    <th>Fasilitas Destinasi</th>
                    <th>Jam Buka</th>
                    <th>Deskripsi</th>
                    <th>Sejarah</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destinasiWisataList as $destinasiWisata)
                <tr>
                    <td>{{ $destinasiWisata->id }}</td>
                    <td>{{ $destinasiWisata->nama }}</td>
                    <td>{{ $destinasiWisata->alamat }}</td>
                    <td>{{ $destinasiWisata->HargaTiket }}</td>
                    <td>{{ $destinasiWisata->FasilitasDestinasi }}</td>
                    <td>{{ $destinasiWisata->JamBuka }}</td>
                    <td>{{ $destinasiWisata->Deskripsi }}</td>
                    <td>{{ $destinasiWisata->Sejarah }}</td>
                    <td>{{ $destinasiWisata->latitude }}</td>
                    <td>{{ $destinasiWisata->longitude }}</td>
                    <td>
                        <a href="{{ route('destinasi-wisata.show', ['id' => $destinasiWisata->id]) }}"
                            class="btn btn-primary">Lihat</a>
                        <a href="{{ route('destinasi-wisata.edit', ['id' => $destinasiWisata->id]) }}"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('destinasi-wisata.destroy', ['id' => $destinasiWisata->id]) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus destinasi wisata ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}

@extends('layouts.main')

@section('container')

<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">List Destinasi Wisata</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="seach" class="form-control form-control" id="search-input"
                            placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary" id="search-button">tidak aktif Search</span>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Destinasi Wisata</h4>
                </div>

                <div class="card-body">
                   <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Harga Tiket</th>
                            <th>Fasilitas Destinasi</th>
                            <th>Jam Buka</th>
                            <th>Deskripsi</th>
                            <th>Sejarah</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinasiWisataList as $destinasiWisata)
                        <tr>
                            <td>{{ $destinasiWisata->id }}</td>
                            <td>{{ $destinasiWisata->nama }}</td>
                            <td>{{ $destinasiWisata->alamat }}</td>
                            <td>{{ $destinasiWisata->HargaTiket }}</td>
                            <td>{{ $destinasiWisata->FasilitasDestinasi }}</td>
                            <td>{{ $destinasiWisata->JamBuka }}</td>
                            <td>{{ $destinasiWisata->Deskripsi }}</td>
                            <td>{{ $destinasiWisata->Sejarah }}</td>
                            <td>{{ $destinasiWisata->latitude }}</td>
                            <td>{{ $destinasiWisata->longitude }}</td>
                            <td>
                                <a href="{{ route('destinasi-wisata.show', ['id' => $destinasiWisata->id]) }}"
                                    class="btn btn-primary">Lihat</a>
                                <a href="{{ route('destinasi-wisata.edit', ['id' => $destinasiWisata->id]) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('destinasi-wisata.destroy', ['id' => $destinasiWisata->id]) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus destinasi wisata ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection