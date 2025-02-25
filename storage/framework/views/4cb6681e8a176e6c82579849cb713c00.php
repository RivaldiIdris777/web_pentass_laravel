<!-- ======= Hero Section ======= -->
<main id="main">
    
    <section id="cta" class="cta"  style="background-color:#3ae374;">
        <div class="container pt-5" data-aos="fade-in">

            <div class="text-center pt-5">                
            <h2 style="color:#ffffff;">Pendaftaran Lomba</h2>
                    <h5 style="color:#ffffff;">Terdapat tata cara dalam pendaftaran. Silahkan Klik Tombol Dibawah.</h5>
                    <br>
                    <a href="<?php echo e(route('pendaftaran.panduan')); ?>" class="btn btn-danger mb-5">Syarat/Ketentuan & Tata
                        Cara Pendaftaran</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <section id="form-registry">
        <div class="container mt-4">
            <div class="card">
                <div class="card-header text-center" style="background-color:#800000;">
                    <h4 style="color:#fff;">Pendaftaran Lomba PENTASS Tahun 2024</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('pendaftaran.store')); ?>" method="post" enctype="multipart/form-data"
                        class="row g-3">
                        <?php echo csrf_field(); ?>
                        <div class="col-12">
                            <label for="lomba" class="form-label">Pilih Lomba</label>
                            <select name="lomba" class="form-control  <?php $__errorArgs = ['lomba'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">-- Pilih Lomba Yang ingin Diikuti --</option>
                                <?php $__currentLoopData = $lomba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Request::input('lomba') == $dt): ?>
                                <option value="<?php echo e(old('lomba')); ?>" selected><?php echo e(old('lomba')); ?></option>
                                <?php else: ?>
                                <option value="<?php echo e($dt->nama_lomba); ?>"><?php echo e($dt->nama_lomba); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['lomba'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('email')); ?>" id="email" placeholder="Masukkan email...">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('nama')); ?>" id="nama" placeholder="Masukkan nama lengkap...">
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-4">
                            <label for="no_wa" class="form-label">Nomor Telepon / Whatsapp</label>
                            <input type="number" name="no_wa" class="form-control <?php $__errorArgs = ['no_wa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('no_wa')); ?>" id="no_wa">
                            <?php $__errorArgs = ['no_wa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-12">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah"
                                class="form-control <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('asal_sekolah')); ?>" placeholder="Masukkan Asal Sekolah secara lengkap...">
                            <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-12">
                            <label for="file_ktp_suket" class="form-label">Masukkan Gambar Kartu Tanda Pelajar Atau
                                Surat Keterangan dari Sekolah ("Format file harus JPG/PNG/JPEG")</label>
                            <input type="file" name="file_ktp_suket"
                                class="form-control <?php $__errorArgs = ['file_ktp_suket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('file_ktp_suket')); ?>">
                            <?php $__errorArgs = ['file_ktp_suket'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-12">
                            <label for="url" class="form-label">Link Google Drive Materi Lomba (Pastikan Akses URL Tidak Dikunci)</label>
                            <input type="text" name="url" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('url')); ?>"
                                placeholder="Masukkan Alamat Url Google Drive yang sudah dibuat...">
                            <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="col-md-12">
                            <label for="keterangan" class="form-label">Ceritakan sedikit tentang diri anda
                                (Optional)</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30"
                                rows="10"><?php echo e(old('keterangan')); ?></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="setuju_syarat_ketentuan" value="setuju" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Kami telah menerima <a class="text-primary" href="<?php echo e(route('pendaftaran.panduan')); ?>"><strong>Syarat & ketentuan yang berlaku</strong></a></label>
                        </div>
                        <div class="text-center">
                            <strong>Konfirm Captcha:</strong><br>
                        </div>
                        <div class="form-group mb-3 d-flex justify-content-center">
                            <?php echo NoCaptcha::renderJs(); ?>

                            <?php echo NoCaptcha::display(); ?>

                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn" style="background:#800000; color:#fff;">
                                <h4>DAFTAR SEKARANG</h4>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('scriptfrontend'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\web_pentass_laravel\resources\views/pages/user/daftar/index.blade.php ENDPATH**/ ?>