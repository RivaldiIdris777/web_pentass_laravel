<?php $__env->startSection('title'); ?>
<?php echo e(__($module_name)); ?> <?php echo e(__($module_title)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1 class="mt-4"><?php echo e($module_title); ?></h1>
<div class="card">
    <div class="card-header bg-primary">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item active text-light">Tambah <?php echo e($module_title); ?></li>
        </ol>
    </div>
    <div class="card-body">
        <form action="<?php echo e(route('users.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-2">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group mb-3">
                <label for="confirm_password">Konfirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan Password"
                    required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>   
            </div>
        </form>
    </div>
</div>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Laravel_Project/Laravel_pentaseni/resources/views/pages/admin/user/create.blade.php ENDPATH**/ ?>