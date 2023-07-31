{{-- @extends('layouts.main')

@section('container')
<div class="container">
    <h2>List Deskripsi Kabupaten</h2>
    <ul>
        @foreach ($data as $item)
        <li>{{ $item->deskripsi }}</li>
        @endforeach
    </ul>
</div>
@endsection --}}

@extends('layouts.pengunjung')

@section('container')
<div class="section bg-landing" id="Blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @foreach ($data as $item)
                    <div class="card-header d-flex justify-content-between">
            
                        <div class="fw-bold">
                            <p>{{ __('Data Deskripsi Kabupaten') }}</p>
                        </div>
            
                        <div class="">
                            <a href="{{ route('visimisi.edit', $item->id) }}" class="btn btn-md btn-primary">Edit</a>
            
                        </div>
            
            
                    </div>
            
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
            
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-bottom-0 custom-card-header">
                                <h6 class="main-content-label mb-0 ">Data Deskripsi Kabupaten</h6>
                            </div>
            
            
                            <div class="card-body">
                                <div class="vtimeline">
                                    <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="avatar avatar-md timeline-badge">
            
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">Visi Misi Kabupaten Soppeng</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{{ $item->visi_misi }}</p>
                                            </div>
                                        </div>
                                    </div>
            
            
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                        <div class="avatar avatar-md timeline-badge">
            
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">Deskripsi Kabupaten Soppeng</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{{ $item->deskripsi }}</p>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="timeline-wrapper timeline-wrapper-success">
                                        <div class="avatar avatar-md timeline-badge">
            
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">Sejarah Kabupaten Soppeng</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{{ $item->sejarah }}</p>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-warning">
                                        <div class="avatar avatar-md timeline-badge">
            
                                        </div>
                                        <div class="timeline-panel">
                                            <div class="timeline-heading">
                                                <h6 class="timeline-title">Letak Geografis Kabupaten Soppeng</h6>
                                            </div>
                                            <div class="timeline-body">
                                                <p>{{ $item->geografis }}</p>
                                            </div>
                                        </div>
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
</div>

@endsection

<style>
    @media screen and (max-width: 992px) {
        .bok {
            margin-top: 40px !important
        }
    }
</style>