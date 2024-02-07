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
        <a href="{{ route('qrcode.create') }}" class="btn btn-success" id="btn-create-slider"><i class="fa fa-plus"></i> Tambah
        {{ $module_name }}</a>
    </div>
    <div class="card-body">
        
    </div>
</div>
<!-- Modal -->
@push('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@include('sweetalert::alert')
@endsection
