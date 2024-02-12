<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Tambah Data (Tambah / Edit)
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">                
                <div class="col-12">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nama">Nama Lomba</label>                                                                
                                <select wire:model="lomba" class="form-control <?php $__errorArgs = ['lomba'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">                                                                                                                                                                                            
                                    <option value="{ <?php echo json_encode($lomba, 15, 512) ?> }">--Pilih Lomba--</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $dataLomba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lomba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                            
                                        <option value="<?php echo e($lomba->nama_lomba); ?>"><?php echo e($lomba->nama_lomba); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->                                    
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['lomba'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" wire:model="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan nama....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_wa">No. Whatsapp</label>
                                <input type="number" wire:model="no_wa" class="form-control <?php $__errorArgs = ['no_wa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan nomor whatsapp....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['no_wa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" wire:model="asal_sekolah" class="form-control <?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Asal sekolah....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['asal_sekolah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>                      
                            <div class="col-md-12 mb-3">
                                <label for="url">Alamat URL</label>
                                <input type="text" wire:model="url" class="form-control <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan alamat url (youtube/google drive)....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" wire:model="keterangan" class="form-control <?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan Keterangan....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['keterangan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>                      
                            <div class="col-md-12 mb-3">
                                <label for="setuju_syarat_ketentuan">Setuju Syarat Ketentuan</label>
                                <input type="text" wire:model="setuju_syarat_ketentuan" class="form-control <?php $__errorArgs = ['setuju_syarat_ketentuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan setuju_syarat_ketentuan....">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['setuju_syarat_ketentuan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <?php echo e($message); ?>

                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>                            
                            <div class="d-grid gap-2">
                                <!--[if BLOCK]><![endif]--><?php if($updateData == false): ?>
                                    <button type="submit" class="btn btn-primary" wire:click="store()">Simpan</button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-warning" wire:click="update()">Ubah</button>
                                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                View Data Peserta
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
            data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row float-right">
                    <div class="col-md-6">
                        <!--[if BLOCK]><![endif]--><?php if($peserta_selected_id): ?>
                        <a wire:click="delete_confirmation('')" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Del <?php echo e(count($peserta_selected_id)); ?> data</a>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>                    
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search...." wire:model.live="katakunci">
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo e(route('peserta.exportexcel')); ?>" class="btn btn-success">Export Data Ke Excel</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">No.</th>
                                <th scope="col">Gambar.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No. WA</th>
                                <th scope="col">Asal Sekolah</th>                                
                                <th scope="col">Lomba Peserta</th>
                                <th scope="col">Alamat URL</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $dataPeserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" wire:key="<?php echo e($value->id); ?>" value="<?php echo e($value->id); ?>"
                                        wire:model.live="peserta_selected_id"></td>
                                <th scope="row"><?php echo e($loop->iteration); ?></th>
                                <td>
                                    <a href="<?php echo e(Storage::url('public/filektpsuket/').$value->file_ktp_suket); ?>" download>
                                        <img src="<?php echo e(Storage::url('public/filektpsuket/').$value->file_ktp_suket); ?>" alt="" width="40">
                                    </a>                                    
                                </td>
                                <td><?php echo e($value->nama); ?></td>
                                <td><?php echo e($value->no_wa); ?></td>
                                <td><?php echo e($value->asal_sekolah); ?></td>
                                <td><?php echo e($value->lomba); ?></td>                                
                                <td><!--[if BLOCK]><![endif]--><?php if($value->url == ''): ?> 
                                        'Tidak Ada Alamat URL'
                                    <?php else: ?> 
                                        <a href="<?php echo e($value->url); ?>" class="btn btn-success" target="_blank">Kunjungi Halaman</a>
                                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <a wire:click="edit(<?php echo e($value->id); ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a wire:click="delete_confirmation(<?php echo e($value->id); ?>)" class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>
                    <?php echo e($dataPeserta->links()); ?>

                </div>
                <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin mendelete data tersebut ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-primary" wire:click="delete()"
                            data-bs-dismiss="modal">Ya</button>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
<script>

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /opt/lampp/htdocs/Laravel_Project/Laravel_pentaseni/resources/views/livewire/peserta.blade.php ENDPATH**/ ?>