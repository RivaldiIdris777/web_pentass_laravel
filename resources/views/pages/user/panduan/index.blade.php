@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero" style="background-color:yellow; height:10vh;">
            <div class="container">
                <div class="breadcrumb-hero mb-4">
                    <h2 style="color:#800000;">Syarat/Ketentuan & Panduan Pendaftaran</h2>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="form-registry">
    <iframe src="{{ asset('templates/assets/documents/panduanpendaftaran.pdf') }}" frameBorder="0"
                scrolling="auto" height="100%" width="100%"></iframe>
    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
