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
        <a href="javascript:void(0)" class="btn btn-success" id="btn-create-lomba"><i class="fa fa-plus"></i> Tambah
            Lomba</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="yajra-lombadatatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Lomba</th>
                        <th>Keterangan</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Tanggal Perlombaan</th>
                        <th>PIC</th>
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
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah <?php echo e(__($module_name)); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" id="add-lomba-form" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="gambar">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" name="nama_lomba" class="form-control" placeholder="Masukkan Nama lomba...">
                    </div>

                    <div class="form-group mb-3">
                        <label for="pic">Nama Penyelenggara</label>
                        <input type="text" name="pic" class="form-control" placeholder="Masukkan Nama penyelenggara...">
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" name="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                        <input type="date" name="tanggal_pendaftaran" class="form-control"
                            placeholder="Masukkan Tanggal pendaftaran .....">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_perlombaan">Tanggal Perlombaan</label>
                        <input type="date" name="tanggal_perlombaan" class="form-control"
                            placeholder="Masukkan Tanggal perlombaan .....">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success col-md-11" id="add-lomba-btn">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Lomba <?php echo e(__($module_name)); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit-lomba-form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="lomba_id" name="lomba_id">
                    <div class="mb-3">
                        <div class="row mb-3">
                            <div class="col-md-5 image-view text-center"></div>
                            <div class=" col-md-6">
                                <i class="fa fa-arrow-right" style="margin-right:20%;"></i>
                                <img id="output" width="50%" height="80%">
                            </div>
                        </div>
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" id="gambar" name="gambar" onChange="loadFile(event)">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-gambar-edit"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" id="nama_lomba" name="nama_lomba" class="form-control"
                            placeholder="Masukkan Nama lomba...">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_lomba-edit"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="pic">Nama Penyelenggara</label>
                        <input type="text" id="pic" name="pic" class="form-control"
                            placeholder="Masukkan Nama penyelenggara...">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-pic-edit"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-keterangan-edit"></div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                        <input type="date" id="tanggal_pendaftaran" name="tanggal_pendaftaran" class="form-control"
                            placeholder="Masukkan Tanggal pendaftaran .....">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_pendaftaran-edit">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_perlombaan">Tanggal Perlombaan</label>
                        <input type="date" id="tanggal_perlombaan" name="tanggal_perlombaan" class="form-control"
                            placeholder="Masukkan Tanggal perlombaan .....">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_perlombaan-edit">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success col-md-11" id="update">UBAH</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->startPush('script'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function () {

        var table = $('#yajra-lombadatatable').DataTable({
            serverSide: true,
            ajax: "<?php echo e(route('lombalist')); ?>",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    "render": function (gambar) {
                        return `<img src="<?php echo e(Storage::url('public/lomba/${gambar}')); ?>" alt="${gambar}" width="40" height="40">`;
                    }
                },
                {
                    data: 'nama_lomba',
                    name: 'nama_lomba'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
                },
                {
                    data: 'tanggal_pendaftaran',
                    name: 'tanggal_pendaftaran'
                },
                {
                    data: 'tanggal_perlombaan',
                    name: 'tanggal_perlombaan'
                },
                {
                    data: 'pic',
                    name: 'pic'
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
<script>
    $('body').on('click', '#btn-create-lomba', function () {

        $('#modal-create').modal('show');
    });

    $("#add-lomba-form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
          url: '<?php echo e(route('lomba.store')); ?>',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Lomba Added Successfully!',
                'success'
              )

                $("#add-lomba-form")[0].reset();

                $('#modal-create').modal('hide');

                // Reload Datatable
                $('#yajra-lombadatatable').DataTable().ajax.reload();
            }else {
                Swal.fire({
                    icon: 'warning',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
          }
        });
      });

    $('body').on('click', '#btn-edit-lomba', function () {

        $("#img-edit-view").remove();

        $("#nama_lomba_gambar").remove();

        let lomba_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `/lomba/${lomba_id}`,
            type: "GET",
            cache: false,
            success: function (response) {

                //fill data to form
                src = $(this).find('gambar').attr('src');
                $('.image-view').append(`
                <img src="/storage/lomba/${response.data.gambar}" class="img-fluid" id="img-edit-view">
                <p class="mt-3" id="nama_lomba_gambar"><strong>Nama Gambar: ${response.data.gambar}</strong></p>
                `);
                $('#nama_lomba').val(response.data.nama_lomba);
                $('#keterangan').val(response.data.keterangan);
                $('#tanggal_pendaftaran').val(response.data.tanggal_pendaftaran);
                $('#tanggal_perlombaan').val(response.data.tanggal_perlombaan);
                $('#pic').val(response.data.pic);
                $("#lomba_id").val(response.data.id);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });

</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    //action update lomba
    $("#edit-lomba-form").submit(function (e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
            url: '<?php echo e(route('lomba.update')); ?>',
            method: 'post',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.status == 200) {
                    Swal.fire(
                        'Updated!',
                        'Lomba Berhasil di update!',
                        'success'
                    )

                    $('#modal-edit').modal('hide');

                    $("#edit-lomba-form")[0].reset();

                    // Reload Datatable
                    $('#yajra-lombadatatable').DataTable().ajax.reload();
                }
            }
        });
    });

    //button delete
    $('body').on('click', '#deleteLomba', function () {

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
              url: '<?php echo e(route('lomba.destroy')); ?>',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
                success:function(response){

                    //show success message
                    Swal.fire({
                        icon: 'success',
                        title: `${response.message}`,
                        showConfirmButton: false,
                        timer: 3000
                    });

                // Reload Datatable
                $('#yajra-lombadatatable').DataTable().ajax.reload();

                }
            });


        }
    })

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\web_pentass_laravel\resources\views/pages/admin/lomba/index.blade.php ENDPATH**/ ?>