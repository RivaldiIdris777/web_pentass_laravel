@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero" style="background-color:yellow; height:10vh;">
            <div class="container">
                <div class="breadcrumb-hero mb-4">
                    <h2 style="color:#800000;">Pencarian Data Lomba</h2>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="form-registry">
        <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center" style="background-color:#800000;">
                        <h4 style="color:#fff;">Daftar Peserta</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <!-- List Daftar -->
                            @foreach($cari as $dt)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('templates/assets/img/pesertapentass.png') }}"
                                            class="img-fluid rounded-start" style="max-width:120%;" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><strong>{{ $dt->nama }} ( {{ $dt->no_wa }} )</strong></h5>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="no_peserta">Nomor Peserta</label>
                                                    <input class="form-control" type="text" value="{{ $dt->no_peserta }}" aria-label="Disabled input example" disabled readonly>
                                                </div>
                                                <div class="col">
                                                    <label for="status">Status Peserta</label>
                                                    <input class="form-control" type="text" value="{{ $dt->status == 'calon_peserta' ? 'Calon Peserta' : 'Menunggu Konfirmasi' }}" aria-label="Disabled input example" disabled readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="url">Alamat URL</label>
                                                    <input class="form-control" type="text" value="{{ $dt->url  }}" aria-label="Disabled input example" disabled readonly>
                                                </div>                                                
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="keterangan">Tentang Saya</label>
                                                    <textarea class="form-control" type="text" aria-label="Disabled input example" disabled readonly>{{ $dt->keterangan }}</textarea>
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
    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
