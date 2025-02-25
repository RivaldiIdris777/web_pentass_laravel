@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">

    <section id="cta" class="cta" style="background-color:yellow;">
        <div class="container pt-5" data-aos="fade-in">

            <div class="text-center pt-5">
                <h2 style="color:#800000;">Syarat/Ketentuan</h2>                
            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="form-registry">

        <div class="ratio ratio-16x9">
            <iframe src="https://drive.google.com/file/d/1DtmBLwoC-KpXOzMu8jzKMhh4EXKL1SGC/preview" width="640" height="480" allow="autoplay"></iframe>
        </div>

    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')

@endpush
