@extends('layouts2.app')

@section('title')
{{ __($module_name) }} {{ __($module_title) }}
@endsection
@section('content')
<h1 class="mt-4">{{ $module_title }}</h1>
<div class="card">
    <div class="card-header mb-">
        <h4>Ubah Peserta</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('peserta.update', $peserta->id) }}" method="post" class="row g-3" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $peserta->email) }}">
                @error('email')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $peserta->nama) }}">
                @error('email')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="no_wa" class="form-label">Nomor WA</label>
                <input type="number" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror"
                    value="{{ old('no_wa', $peserta->no_wa) }}">
                @error('no_wa')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror"
                    value="{{ old('asal_sekolah', $peserta->asal_sekolah) }}">
                @error('asal_sekolah')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-5">
                <label for="lomba" class="form-label">Lomba yang didaftarkan</label>
                <select name="lomba" class="form-control @error('lomba') is-invalid @enderror"
                    value="{{ old('lomba') }}">
                    <option value="{{ $peserta->lomba }}">{{ $peserta->lomba }}</option>
                    @foreach($lomba as $dt)
                    <option value="{{ $dt->nama_lomba }}" @selected(old('lomba') == $dt->nama_lomba)>{{ $dt->nama_lomba }}</option>
                    @endforeach
                </select>
                @error('lomba')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror"
                    value="{{ old('status') }}">
                    <option value="{{ $peserta->status }}">{{ $peserta->status }}</option>
                    <option value="calon_peserta" @selected(old('lomba'))>Calon Peserta</option>
                    <option value="peserta" @selected(old('lomba'))>Peserta</option>
                    <option value="pemenang" @selected(old('lomba'))>Pemenang</option>
                </select>
                @error('status')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="url" class="form-label">Alamat URL</label>
                <input type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                    value="{{ old('url', $peserta->url) }}">
                @error('url')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="file_ktp_suket" class="form-label">Upload File KTP atau Surat Keterangan</label>
                <div class="preview d-flex justify-content-center">
                    <img id="file-ip-1-preview" class="img-fluid mb-3" style="width:20%; height:20%;" src="{{ Storage::url('public/filektpsuket/').$peserta->file_ktp_suket }}">
                </div>
                <div class="input-group mb-3">
                    <input type="file" name="file_ktp_suket"
                        class="form-control @error('file_ktp_suket') is-invalid @enderror" id="file_ktp_suket" value="{{ $peserta->file_ktp_suket }}"
                        accept="image/*" onchange="showPreview(event);">
                </div>
                @error('file_ktp_suket')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $peserta->keterangan) }}</textarea>
                @error('keterangan')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" type="submit">Ubah Data</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }

</script>
@endpush
@include('sweetalert::alert')
@endsection
