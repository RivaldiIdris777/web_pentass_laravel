<!-- ======= Hero Section ======= -->
<main id="main">

    <section id="cta" class="cta"  style="background-color:yellow;">
        <div class="container pt-5" data-aos="fade-in">

            <div class="text-center pt-5">
                <h1 style="color:#800000;">Pilih Opsi Pendaftaran</h1>

            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="form-registry">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12 d-flex">
                    <div class="card">
                        <div class="card-header text-center" style="background-color:#800000;">
                            <h4 style="color:#fff;">Pendaftaran Melalui Website</h4>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo e(route('lomba.pendaftaran')); ?>">
                                <div class="text-center">
                                    <i class="fa-solid fa-laptop mb-3" style="font-size:100px; color:#800000;"></i>
                                    <p style="color:#800000;">Pendaftaran melalui website yaitu dengan mengklik menu ini anda akan diarahkan untuk mendaftarkan melalui form yang disediakan. Beberapa hal yang harus diperhatikan yaitu memasukkan dokumen keterangan siswa sekolah asal dan bahan lomba ke dalam google drive dan menautkan link kedalam input yang tersedia.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 d-flex">
                    <div class="card">
                        <div class="card-header text-center" style="background-color:#800000;">
                            <h4 style="color:#fff;">Pendaftaran Melalui Whatsapp</h4>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo e(route('lomba.daftarwhatsapp')); ?>">
                                <div class="text-center">
                                    <i class="fa-brands fa-whatsapp mb-3" style="font-size:100px; color:#800000;"></i>
                                    <p style="color:#800000;">Pendaftaran melalui Whatsaapp yaitu dengan mengklik menu ini anda akan diarahkan untuk membuka Whatsaapp dan langsung terhubung dengan customer service pentass um jambi kami. Anda akan diminta untuk mengisi biodata dengan format whatsapp kemudian memasukkan bahan dokumen bukti surat keterangan sekolah dan bahan dengan format dokumen.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scriptfrontend'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\web_pentass_laravel\resources\views/pages/user/daftar/opsidaftar.blade.php ENDPATH**/ ?>