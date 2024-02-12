@extends('frontend.app')
<!-- ======= Hero Section ======= -->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top:90px;">
    <div class="carousel-inner">
        @foreach($slider as $key => $sd)
        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
            <img src="{{ Storage::url('public/slider/').$sd->gambar }}" class="d-block w-100" alt="...">
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
</div>


<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-end">
                <div class="col-lg-11">
                    <div class="row justify-content-md-between p-2">
                        <div class="col-lg-3 col-md-4 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <img src="{{ asset('templates/assets/img/start.png')}}" class="img-fluid" alt="">
                                <p>Bersiap mengikuti pertandingan</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <img src="{{ asset('templates/assets/img/solidarity.png')}}" alt="">
                                <p>Saling mempererat solidaritas</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <img src="{{ asset('templates/assets/img/winner.png')}}" alt="">
                                <p>Memenangkan pertandingan dan meraih prestasi</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="fade-in">

            <div class="text-center">
                <h3>Selamat Datang di PENTASS</h3>
                <p> Dalam era globalisasi dan kemajuan teknologi informasi, sektor pendidikan memiliki peran krusial
                    dalam mempersiapkan generasi muda untuk menghadapi tantangan dunia modern. Provinsi Jambi, sebagai
                    bagian dari keberagaman budaya dan nilai-nilai keislaman, memandang penting untuk terus mendukung
                    dan menginspirasi siswa SMA Se-derajat dalam mengembangkan potensi diri mereka.
                    Pendidikan bukan hanya tentang penguasaan ilmu pengetahuan, tetapi juga melibatkan aspek spiritual
                    dan seni. Oleh karena itu, kami dengan bangga mengumumkan penyelenggaraan Lomba Tilawatil Qur'an,
                    Sains, dan Seni. Lomba ini kami sebut dengan PENTASS (Pekan Tilawatil Qur’an, Sains dan Seni).
                    PENTASS bukan hanya sebagai ajang kompetisi, namun juga sebagai sarana positif untuk memupuk
                    semangat, bakat, dan kreativitas siswa dalam tiga dimensi penting kehidupan agama, sains, dan seni.
                    Melalui PENTASS, kami berharap dapat menciptakan platform yang memotivasi siswa untuk meningkatkan
                    kualitas bacaan Al-Qur'an, merangsang minat di bidang sains, dan memberikan ruang ekspresi kreatif
                    dalam seni. Dengan mengadopsi format online, PENTASS ini diharapkan dapat mencakup partisipasi luas
                    dari seluruh SMA Se-derajat di Provinsi Jambi, membangun solidaritas, dan merayakan keberagaman
                    prestasi siswa.
                    Kami menyadari bahwa pendidikan tidak hanya berada di tangan pendidik, tetapi juga merupakan
                    tanggung jawab bersama. Oleh karena itu, PENTASS adalah bentuk kolaborasi antara lembaga pendidikan,
                    masyarakat, dan pihak terkait untuk membentuk individu yang berintegritas, berwawasan luas, dan
                    berkarakter.
                    Terima kasih atas perhatian dan dukungan semua pihak. Mari bergandengan tangan mewujudkan pendidikan
                    yang berkualitas dan menginspirasi..</p>
                <a class="cta-btn" href="{{ route('lomba.pendaftaran') }}">DAFTAR DISINI</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services ">
        <div class="container">

            <div class="section-title pt-5" data-aos="fade-up">
                <h2>KATEGORI LOMBA</h2>
            </div>

            <div class="row">
                @foreach($lomba as $dt)                
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#syaratpendaftaran">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ Storage::url('public/lomba/').$dt->gambar }}" alt="">
                            </div>
                            <h4 class="title"><a href="">{{ $dt->nama_lomba }}</a></h4>
                            <p class="description">{{ $dt->keterangan }}</p>
                        </div>
                        </a>
                    </div>                
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->

</main><!-- End #main -->


<!-- Modal -->
<div class="modal fade" id="syaratpendaftaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Syarat Pendaftaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                <iframe src="https://drive.google.com/file/d/1CcC0OJSHslMoa_oxU8yYOv5sLe-Sg5VL/preview" width="640" height="480" allow="autoplay"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade hide " tabindex="-1" id="postermodal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SELAMAT DATANG DI PENTASS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('templates/assets/img/poster.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('lomba.pendaftaran') }}" class="btn btn-primary">Daftar Sekarang</a>
            </div>
        </div>
    </div>
</div>
@push('scriptfrontend')
<script type="text/javascript">
    $(window).on('load', function () {
        $('#postermodal').modal('show');
    });

</script>
@endpush
