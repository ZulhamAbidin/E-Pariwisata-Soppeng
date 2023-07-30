@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Kebudayaan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kebudayaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

                {{-- <div class="card-body pb-4">
                    <div class="input-group mb-2">
                        <input type="seach" class="form-control form-control" id="search-input"
                            placeholder="Searching.....">
                        <span class="input-group-text btn btn-primary" id="search-button">tidak aktif Search</span>
                    </div>
                </div> --}}

            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Kebudayaan</h4>
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('destinasi-kebudayaan.update', ['id' => $kebudayaan->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Kebudayaan</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ $kebudayaan->nama }}" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi"
                                class="form-control">{{ $kebudayaan->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="sampul">Sampul Baru</label>
                            <input type="file" name="sampul" id="sampul" class="form-control-file">
                            <small class="form-text text-muted">Unggah gambar sampul baru (jpeg, png, jpg, gif)</small>
                        </div>

                        <!-- Menampilkan sampul lama jika ada -->
                        <div class="form-group">
                            <label for="sampul_lama">Sampul Lama</label>
                            @if ($kebudayaan->sampul)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $kebudayaan->sampul) }}" alt="Sampul Lama"
                                    class="img-fluid" style="max-height: 200px;">
                            </div>
                            @else
                            <p>Tidak ada sampul lama.</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Baru</label>
                            <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                            <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                        </div>
                        <div class="form-group">
                            <label for="gambar_lama">Gambar Lama</label>
                            @if ($kebudayaan->gambar)
                            <div class="row">
                                @foreach (json_decode($kebudayaan->gambar) as $imagePath)
                                <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                    <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid"
                                        style="max-height: 200px;">
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p>Tidak ada gambar lama.</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
