<?php $__env->startSection('title'); ?>
<?php echo e(__($module_name)); ?> <?php echo e(__($module_title)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1 class="mt-4"><?php echo e($module_title); ?></h1>
<div class="card">
    <div class="card-header mb-">
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
    </div>
    <div class="card-body">
        <table id="roletable" class="table table-bordered" id="yajra-userdatatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role Pengguna</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($item->name); ?></td>                    
                    <td>
                        <a href="<?php echo e(route('manage-roles.edit', $item->id)); ?>" class="btn btn-warning"><i
                                class="fa fa-pencil"></i></a>
                        <form method="POST" action="<?php echo e(route('manage-roles.destroy', $item->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->startPush('script'); ?>
<script>
    $(function () {
        $("#roletable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Laravel_Project/Laravel_pentaseni/resources/views/pages/admin/role/index.blade.php ENDPATH**/ ?>