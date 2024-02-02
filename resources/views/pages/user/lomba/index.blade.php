@extends('frontend.app')
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        @foreach($slider as $sd)
        <div class="breadcrumb-hero"
            style="background: url({{ Storage::url('public/slider/').$sd->gambar }}) top center;">
            <div class="container">
                <div class="breadcrumb-hero">
                </div>
            </div>
        </div>
        @endforeach
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services mt-5" class="services">
        <div class="container">

            <div class="row ">

                @foreach($lomba as $dt)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card" style="background-color:#800000">
                        <div class="card-body text-center">
                            <img src="{{ Storage::url('public/lomba/').$dt->gambar }}" alt="" style="width:20%;">
                            <h5 class="text-light pt-3">{{ $dt->nama_lomba }}</h5>
                        </div>
                        <div class="card-footer text-center">
                            <div class="btn-group w-100">
                            <a href="javascript:void(0)" data-toggle="modal" id="btn-detail" data-url="{{ route('lomba.detailomba', $dt->id) }}"
                                class="btn btn-primary btn-sm">Informasi Lomba</a>
                            <a href="{{ route('lomba.pendaftaran') }}" class="btn btn-success btn-sm">Daftar Disini</a>                            
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Pemberitahuan</h2>
                <p>Jika ada yang ingin ditanyakan dalam pekan perlombaan bisa hubungi nomor berikut.</p><br>
                <h2>No/WA: +62 822-8612-7654</h2>
            </div>

        </div>
    </section><!-- End Features Section -->

</main><!-- End #main -->

<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Lomba <span id="nama_lomba"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Tanggal Pendaftaran :</td>
                            <td><p id="tgl-pendaftaran"></p></td>
                        </tr>
                        <tr>
                            <td>Tanggal perlombaan :</td>
                            <td><p id="tgl-perlombaan"></p></td>
                        </tr>
                        <tr>
                            <td>PIC :</td>
                            <td><p id="pic"></p></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scriptfrontend')
<script>
    $(document).ready(function () {
    $('body').on('click', '#btn-detail', function (event) {
        var userURL = $(this).data('url');        
            $.get(userURL, function (data) {            
            $('#nama_lomba').text(data.nama_lomba);
            $('#modal-detail').modal('show');
            $('#tgl-pendaftaran').text(data.tanggal_pendaftaran);
            $('#tgl-perlombaan').text(data.tanggal_perlombaan);
            $('#pic').text(data.pic);            
        })
    });
}); 
</script>
@endpush
