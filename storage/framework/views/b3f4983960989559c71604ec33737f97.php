<!-- ======= Hero Section ======= -->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-top:90px;">
    <div class="carousel-inner">
        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
            <img src="<?php echo e(Storage::url('public/slider/').$sd->gambar); ?>" class="d-block w-100" alt="...">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row justify-content-end">
                <div class="col-lg-11">
                    <div class="row text-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="count-box pb-5 pt-3">
                                <h2 class="text-light">Daftar Lomba</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services mt-5" class="services">
        <div class="container">

            <div class="row ">

                <?php $__currentLoopData = $lomba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="card" style="background-color:#800000">
                        <div class="card-body text-center">
                            <img src="<?php echo e(Storage::url('public/lomba/').$dt->gambar); ?>" alt="" style="width:20%;">
                            <h5 class="text-light pt-3"><?php echo e($dt->nama_lomba); ?></h5>
                        </div>
                        <div class="card-footer text-center">
                            <div class="btn-group w-100">
                                <a href="javascript:void(0)" data-toggle="modal" id="btn-detail"
                                    data-url="<?php echo e(route('lomba.detailomba', $dt->id)); ?>"
                                    class="btn btn-primary btn-sm">Informasi Lomba</a>
                                <a href="<?php echo e(route('lomba.opsipendaftaran')); ?>" class="btn btn-success btn-sm">Daftar
                                    Disini</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="fade-in">

            <div class="text-center">
                <h3>Tutorial Pendaftaran Pentass</h3>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="features" class="features mt-5">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <iframe style="width:100%; height:80%;" src="https://www.youtube.com/embed/VYl9V5SO9pg?si=qqhXUtLAFq0CTdLQ"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>

        </div>
    </section><!-- End Features Section -->



    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Pemberitahuan</h2>
                <p>Jika ada yang ingin ditanyakan dalam pekan perlombaan bisa hubungi nomor berikut.</p><br>
                <h2>No/WA: +62 821-8454-9049</h2>
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
                            <td>
                                <p id="tgl-pendaftaran"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal perlombaan :</td>
                            <td>
                                <p id="tgl-perlombaan"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>PIC :</td>
                            <td>
                                <p id="pic"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scriptfrontend'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\Laravel_Project\Laravel_pentaseni\resources\views/pages/user/lomba/index.blade.php ENDPATH**/ ?>