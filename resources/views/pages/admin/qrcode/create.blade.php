@extends('layouts2.app')

@section('title')
{{ __($module_name) }} {{ __($module_title) }}
@endsection
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@section('content')
<h1 class="mt-4">{{ $module_title }}</h1>
<div class="card">
    <div class="card-header mb-">
        Tambah {{ $module_name }}</a>
    </div>
    <div class="card-body">
        <form action="{{ route('qrcode.store') }}" method="post">
            @csrf
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
@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@include('sweetalert::alert')
@endsection
