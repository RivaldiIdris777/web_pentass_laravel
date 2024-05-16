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
        <a href="<?php echo e(route('peserta.create')); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Peserta</a>
        <a href="/peserta/export_excel" class="btn btn-success my-3">Export Data Ke Excel</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="yajra-pesertadatatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>File KTP atau Surat Keterangan</th>
                        <th>Nomor Peserta</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Nomor WA</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                        <th>Alamat URL</th>
                        <th>Lomba</th>
                        <th>Setuju Syarat Ketentuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<?php $__env->startPush('script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {

        var table = $('#yajra-pesertadatatable').DataTable({
            serverSide: true,
            ajax: "<?php echo e(route('pesertalist')); ?>",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'file_ktp_suket',
                    name: 'file_ktp_suket',
                    "render": function (file_ktp_suket) {
                        return `<a href="<?php echo e(Storage::url('public/filektpsuket/${file_ktp_suket}')); ?>" alt="${file_ktp_suket}" >Download</a>`;
                    }
                },
                {
                    data: 'no_peserta',
                    name: 'no_peserta'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'no_wa',
                    name: 'no_wa'
                },
                {
                    data: 'asal_sekolah',
                    name: 'asal_sekolah'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'url',
                    name: 'url',
                    "render": function (url) {
                        return `<a href="<?php echo e(('${url}')); ?>" class="btn btn-success" target="_blank">Kunjungi Alamat</a>`;
                    }
                },

                {
                    data: 'lomba',
                    name: 'lomba'
                },
                {
                    data: 'setuju_syarat_ketentuan',
                    name: 'setuju_syarat_ketentuan'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                },
            ]
        });

    });

    $('body').on('click', '#deletePeserta', function () {

        let id = $(this).data('id');
        let csrf = '<?php echo e(csrf_token()); ?>';
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
                //fetch to delete data
                $.ajax({
                    url: '<?php echo e(route('peserta.destroy')); ?>',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: csrf
                    },
                    success: function (response) {

                        //show success message
                        Swal.fire({
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        // Reload Datatable
                        $('#yajra-pesertadatatable').DataTable().ajax.reload();

                    }
                });


            }
        })

    });

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\Laravel_Project\Laravel_pentaseni\resources\views/pages/admin/peserta/index.blade.php ENDPATH**/ ?>