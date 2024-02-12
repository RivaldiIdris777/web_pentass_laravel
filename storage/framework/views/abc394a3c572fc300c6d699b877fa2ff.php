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
        <table class="table table-bordered" id="yajra-userdatatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified Email Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->startPush('script'); ?>
<script>
    $(function () {

        var table = $('#yajra-userdatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('userslist')); ?>",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'email_verified_at',
                    name: 'email_verified_at'
                },                                
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });

</script>
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Laravel_Project/Laravel_pentaseni/resources/views/pages/admin/user/index.blade.php ENDPATH**/ ?>