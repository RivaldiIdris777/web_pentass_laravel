@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero" style="background-color:yellow; height:25vh;">
            <div class="container">
                <div class="breadcrumb-hero mb-4">
                    <h2 style="color:#800000;">Syarat/Ketentuan & Panduan Pendaftaran</h2>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="form-registry">

        <div class="ratio ratio-16x9">
        <iframe src="https://drive.google.com/file/d/1ihCeY_FFw5fuucmfDQyTEySzrQ-Wimya/preview" width="640" height="480" allow="autoplay"></iframe>
        </div>        

    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
