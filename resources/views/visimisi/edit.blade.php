<!-- resources/views/visimisi/edit.blade.php -->

@extends('layouts.main')

@section('container')
<div class="containe mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Deskripsi Kabupaten') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visimisi.update', $deskripsiKabupaten->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea id="deskripsi" name="Deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" rows="3"
                                required>{{ old('deskripsi', $deskripsiKabupaten->Deskripsi) }}</textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="visi_misi">Visi Misi</label>
                            <textarea id="visi_misi" name="visi_misi"
                                class="form-control @error('visi_misi') is-invalid @enderror" rows="3"
                                required>{{ old('visi_misi', $deskripsiKabupaten->visi_misi) }}</textarea>
                            @error('visi_misi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="sejarah">Sejarah</label>
                            <textarea id="sejarah" name="sejarah"
                                class="form-control @error('sejarah') is-invalid @enderror" rows="3"
                                required>{{ old('sejarah', $deskripsiKabupaten->sejarah) }}</textarea>
                            @error('sejarah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="geografis">Geografis</label>
                            <textarea id="geografis" name="geografis"
                                class="form-control @error('geografis') is-invalid @enderror" rows="3"
                                required>{{ old('geografis', $deskripsiKabupaten->geografis) }}</textarea>
                            @error('geografis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection