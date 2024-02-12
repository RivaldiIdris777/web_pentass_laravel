<?php $__env->startSection('title'); ?>
<?php echo e(__($module_name)); ?> <?php echo e(__($module_title)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<h1 class="mt-4"><?php echo e($module_title); ?></h1>
<div class="card">
    <div class="card-header mb-">
        Tambah <?php echo e($module_name); ?></a>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('qrcode.store')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3">
                <label for="">Gambar QrCode</label>
                <input type="file" name="" class="form-control">
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="">Nama QrCode</label>
                    <input type="text" name="nama_qrcode" class="form-control">
                </div>
                <div class="col">
                    <label for="">Url Qrcode yang diarahkan</label>
                    <input type="text" name="url" class="form-control">
                </div>
            </div>            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<?php $__env->startPush('script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Laravel_Project/Laravel_pentaseni/resources/views/pages/admin/qrcode/create.blade.php ENDPATH**/ ?>