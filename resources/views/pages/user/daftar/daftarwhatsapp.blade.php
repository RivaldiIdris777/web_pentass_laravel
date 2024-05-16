@extends('frontend.app')
<!-- ======= Hero Section ======= -->
@push('styles')
    <style>
        .accordion-button:not(.collapsed) {
            color: #FFF !important;
            background-color: #800000 !important;
        }



        .accordion-button:link,
        .accordion-button:visited,
        .accordion-button:hover,
        .accordion-button:active {
            background-color: #800000 !important;
            color: #FFF !important;
            text-decoration: none !important;
            border: hidden !important;
            border-color: #FFF !important;
            box-shadow: 0px !important;


        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #FFF !important;
            outline: 0;
            box-shadow: 0 0 0 .25rem #FFF !important;
        }
    </style>
@endpush
<main id="main">

    <section id="cta" class="cta" style="background-color:yellow;">
        <div class="container pt-5" data-aos="fade-in">

            <div class="text-center pt-5">
                <h1 style="color:#800000;">Pendaftaran Melalui Whatsapp</h1>

            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="form-registry">
        <div class="container mt-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Langkah -> 1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Anda akan mengirim pesan pada nomor Customer Service kami dengan tujuan ingin mendaftar lomba Pentass UM JAMBI dengan meng-</p> <a href="https://wa.me/6282184549049/?text=Halo. Saya ingin mengikuti sebagai peserta lomba Pentass UM Jambi, Boleh saya minta syarat dan format bionya.">Klik Disini</a>
                            {{-- <strong>Ma.</strong> It is shown by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes control the overall appearance, as well as the showing and hiding via CSS
                            transitions. You can modify any of this with custom CSS or overriding our default variables.
                            It's also worth noting that just about any HTML can go within the
                            <code>.accordion-body</code>, though the transition does limit overflow. --}}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Langkah -> 2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Customer Service kami akan memberikan format pengisian Biodata di Whatsapp. Cukup edit bagian yang kosong dengan data anda</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Langkah -> 3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Setelah pengisian biodata selesai anda akan diminta untuk memasukkan bukti dokumen <strong>"Surat Keterangan dari Sekolah"</strong> atau <strong>"Kartu Tanda Pelajar"</strong> dalam bentuk dokumen (Bertujuan agar tidak pecah). Dan untuk <strong>"Bahan Lomba"</strong> juga dengan format yang sama yaitu dokumen agar bahan tidak rusak dan bisa dikirim dengan ukuran besar. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
@include('sweetalert::alert')
@push('scriptfrontend')
@endpush
