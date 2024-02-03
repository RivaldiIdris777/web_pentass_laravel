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
                                <select wire:model.change="lomba" class="form-control @error('lomba_id') is-invalid @enderror">
                                    <option value="">--- Pilih Lomba ---</option>
                                    @foreach($dataLomba as $lomba => $value)
                                        @if (Request::input('lomba') == $value)
                                            <option value="{{ old('lomba') }}" selected>{{ old('lomba') }}</option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama_lomba }}</option>
                                        @endif                                
                                    @endforeach
                                    <!-- @foreach ($dataLomba as $lomba => $value)
                                        <option value="{{ $value->id }}">{{ $value->nama_lomba }}</option>
                                    @endforeach -->
                                </select>
                                @error('lomba_id')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" wire:model="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama....">
                                @error('nama')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_wa">No. Whatsapp</label>
                                <input type="number" wire:model="no_wa" class="form-control @error('no_wa') is-invalid @enderror" placeholder="Masukkan nomor whatsapp....">
                                @error('no_wa')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input type="text" wire:model="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" placeholder="Masukkan Asal sekolah....">
                                @error('asal_sekolah')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                      
                            <div class="col-md-12 mb-3">
                                <label for="url">Alamat URL</label>
                                <input type="text" wire:model="url" class="form-control @error('url') is-invalid @enderror" placeholder="Masukkan alamat url (youtube/google drive)....">
                                @error('url')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" wire:model="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan....">
                                @error('keterangan')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                      
                            <div class="col-md-12 mb-3">
                                <label for="setuju_syarat_ketentuan">setuju_syarat_ketentuan</label>
                                <input type="text" wire:model="setuju_syarat_ketentuan" class="form-control @error('setuju_syarat_ketentuan') is-invalid @enderror" placeholder="Masukkan setuju_syarat_ketentuan....">
                                @error('setuju_syarat_ketentuan')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>                            
                            <div class="d-grid gap-2">
                                @if ($updateData == false)
                                    <button type="submit" class="btn btn-primary" wire:click="store()">Simpan</button>
                                @else
                                    <button type="submit" class="btn btn-warning" wire:click="update()">Ubah</button>
                                @endif
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
                <div class="row">
                    <div class="col-md-6">
                        @if ($peserta_selected_id)
                        <a wire:click="delete_confirmation('')" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Del {{ count($peserta_selected_id) }} data</a>
                        @endif
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('peserta.exportexcel') }}" class="btn btn-success">Export Data Ke Excel</a>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search...." wire:model.live="katakunci">
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
                            @foreach ($dataPeserta as $data => $value)
                            <tr>
                                <td><input type="checkbox" wire:key="{{ $value->id }}" value="{{ $value->id }}"
                                        wire:model.live="peserta_selected_id"></td>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{ Storage::url('public/filektpsuket/').$value->file_ktp_suket }}" download>
                                        <img src="{{ Storage::url('public/filektpsuket/').$value->file_ktp_suket }}" alt="" width="40">
                                    </a>                                    
                                </td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->no_wa }}</td>
                                <td>{{ $value->asal_sekolah }}</td>
                                <td>{{ $value->lomba }}</td>                                
                                <td>@if ($value->url == '') 
                                        'Tidak Ada Alamat URL'
                                    @else 
                                        <a href="{{ $value->url }}" class="btn btn-success" target="_blank">Kunjungi Halaman</a>
                                    @endif
                                </td>
                                <td>
                                    <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a wire:click="delete_confirmation({{ $value->id }})" class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $dataPeserta->links() }}
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
@include('sweetalert::alert')
@push('script')
<script>

</script>
@endpush
