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
            <div class="card">
                <div class="card-header text-center" style="background-color:#800000;">
                    <h4 style="color:#fff;">Cari Data Peserta di PENTASS Tahun 2024</h4>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <form action="{{ route('pendaftaran.caripendaftar') }}" method="post" class="row g-3">
                        @csrf                        
                        <div class="col-md-12 text-center">
                            <label for="no_wa" class="form-label">Nomor Telepon / Whatsapp</label>
                            <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                                value="{{ old('no_wa') }}" id="no_wa">
                            @error('no_wa')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>                        
                        <div class="text-center">
                            <strong>Konfirm Captcha:</strong><br>
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-center">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn" style="background:#800000; color:#fff;">
                                <h4>Cari Data</h4>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
