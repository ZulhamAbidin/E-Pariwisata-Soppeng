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
                                @foreach ($destinasiWisataList as $destinasiWisata)
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
                                            <form
                                                action="{{ route('destinasi-wisata.destroy', ['id' => $destinasiWisata->id]) }}"
                                                method="POST" style="display: inline-block;">
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

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Gagal",
                text: "{{ session('error') }}",
                icon: "error",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
