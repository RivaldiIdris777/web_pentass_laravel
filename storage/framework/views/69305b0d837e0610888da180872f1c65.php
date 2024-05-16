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
        <a href="javascript:void(0)" class="btn btn-success" id="btn-create-slider"><i class="fa fa-plus"></i> Tambah
        <?php echo e($module_name); ?></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="yajra-sliderdatatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Slider</th>
                        <th>Slug</th>
                        <th>Keterangan</th>                                                
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
            <form action="#" id="add-slider-form" enctype="multipart/form-data" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="gambar" id="gambar">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-gambar"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_slider">Nama Slider</label>
                        <input type="text" name="nama_slider" id="nama_slider" class="form-control" placeholder="Masukkan Nama slider...">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-slider"></div>
                    </div>                    

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" name="" cols="30" rows="10"></textarea>                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success col-md-11" id="add-slider-btn">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit <?php echo e(__($module_name)); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="edit-slider-form" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="slider_id" name="slider_id">
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
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama_slider">Nama slider</label>
                        <input type="text" id="nama_slider" name="nama_slider" class="form-control"
                            placeholder="Masukkan Nama Slider...">                        
                    </div>                    

                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" cols="30" rows="10"></textarea>                        
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

        var table = $('#yajra-sliderdatatable').DataTable({
            serverSide: true,
            ajax: "<?php echo e(route('sliderlist')); ?>",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'gambar',
                    name: 'gambar',
                    "render": function (gambar) {
                        return `<img src="<?php echo e(Storage::url('public/slider/${gambar}')); ?>" alt="${gambar}" width="40" height="40">`;
                    }                    
                },
                {
                    data: 'nama_slider',
                    name: 'nama_slider'
                },
                {
                    data: 'slug',
                    name: 'slug'
                },
                {
                    data: 'keterangan',
                    name: 'keterangan'
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
    $('body').on('click', '#btn-create-slider', function () {

        $('#modal-create').modal('show');
    });

    $("#add-slider-form").submit(function(e) {
        e.preventDefault();

        let gambar  = $('#gambar').val();

        let nama_slider  = $('#nama_slider').val();

        const fd = new FormData(this);        
        $.ajax({
          url: '<?php echo e(route('slider.store')); ?>',
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
                'Slider berhasil ditambahkan',
                'success'
              )
              
                $("#add-slider-form")[0].reset();

                // Reload Datatable
                $('#yajra-sliderdatatable').DataTable().ajax.reload();
            }else {
                Swal.fire({                        
                    icon: 'warning',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });                
            }     
          },                  
        });
      });

    $('body').on('click', '#btn-edit-slider', function () {

        let slider_id = $(this).data('id');

        //fetch detail post with ajax
        $.ajax({
            url: `/slider/${slider_id}`,
            type: "GET",
            cache: false,
            success: function (response) {

                //fill data to form
                src = $(this).find('gambar').attr('src');
                $('.image-view').append(`
            <img src="/storage/slider/${response.data.gambar}" width="50%" height="80%">
            <p class="mt-3"><strong>Nama Gambar: ${response.data.gambar}</strong></p>            
            `);            
                $('#nama_slider').val(response.data.nama_slider);
                $('#keterangan').val(response.data.keterangan);                
                $("#slider_id").val(response.data.id);

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

    //action update slider
    $("#edit-slider-form").submit(function (e) {
        e.preventDefault();
        const fd = new FormData(this);
        $.ajax({
            url: '<?php echo e(route('slider.update')); ?>',
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
                        'Slider Berhasil di update!',
                        'success'
                    )

                    //close modal
                    $('#modal-edit').modal('hide');

                    // Reload Datatable
                    $('#yajra-sliderdatatable').DataTable().ajax.reload();
                }                
            }
        });
    });    
      
    //button create post event
    $('body').on('click', '#deleteSlider', function () {

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

            console.log('test');

            //fetch to delete data
            $.ajax({
              url: '<?php echo e(route('slider.destroy')); ?>',
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
                    $('#yajra-sliderdatatable').DataTable().ajax.reload();
                    
                }
            });

            
        }
    })

});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts2.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel_Project\Laravel_Project\Laravel_pentaseni\resources\views/pages/admin/slider/index.blade.php ENDPATH**/ ?>