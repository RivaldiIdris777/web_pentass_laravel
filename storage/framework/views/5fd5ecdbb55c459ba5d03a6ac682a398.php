<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero" style="background-color:yellow; height:10vh;">
            <div class="container">
                <div class="breadcrumb-hero mb-3">
                    <h2 style="color:#800000;">Detail Peserta <?php echo e($peserta->nama); ?></h2>
                </div>
            </div>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="form-registry">
        <div class="container">
            <div class="card">
                <div class="card-header text-center" style="background-color:#800000;">
                    <h4 style="color:#fff;">Detail Peserta <?php echo e($peserta->nama); ?></h4>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="<?php echo e(asset('templates/assets/img/pesertapentass.png')); ?>" alt="" style="max-width:40%;">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="form-floating">
                            <input type="nama" class="form-control" id="floatingInputGrid" placeholder=""
                                value="<?php echo e($peserta->no_peserta); ?>">
                            <label for="floatingInputGrid">Nomor Peserta</label>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="nama" class="form-control" id="floatingInputGrid" placeholder=""
                                    value="<?php echo e($peserta->nama); ?>">
                                <label for="floatingInputGrid">Nama Peserta</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="nama" class="form-control" id="floatingInputGrid" placeholder=""
                                    value="<?php echo e($peserta->no_wa); ?>">
                                <label for="floatingInputGrid">Nomor WA</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="nama" class="form-control" id="floatingInputGrid" placeholder=""
                                    value="<?php echo e($peserta->asal_sekolah); ?>">
                                <label for="floatingInputGrid">Asal Sekolah</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="nama" class="form-control" id="floatingInputGrid" placeholder=""
                                    value="<?php echo e($peserta->status == 'calon_peserta' ? 'Calon Peserta' : 'Belum Terdaftar'); ?> ">
                                <label for="floatingInputGrid">Status Peserta</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <a class="btn btn-primary" href="<?php echo e(Storage::url('public/filektpsuket/').$peserta->file_ktp_suket); ?>" download>
                            <img src="<?php echo e(Storage::url('public/filektpsuket/').$peserta->file_ktp_suket); ?>" alt="" style="max-width:20%;">
                        </a>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <a href="<?php echo e($peserta->url); ?>" class="btn btn-success" target="_blank">Coba Kunjungi Alamat
                            URL</a>
                    </div>
                    <div class="row g-2 mb-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <textarea class="form-control" id="" cols="30"
                                    rows="20"><?php echo e($peserta->keterangan); ?></textarea>
                                <label for="floatingInputGrid">Penjelasan Tentang Anda</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-right m-3 d-flex justify-content-end">
                    <a href="<?php echo e(route('home.depan')); ?>" class="btn btn-warning" style="color:#800000">Kembali Ke Halaman Home</a>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scriptfrontend'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\Laravel_Project\Laravel_pentaseni\resources\views/pages/user/daftar/detaildaftar.blade.php ENDPATH**/ ?>