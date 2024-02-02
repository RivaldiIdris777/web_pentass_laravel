@extends('layouts2.app')

@section('title')
{{ __($module_name) }} {{ __($module_title) }}
@endsection

@section('content')
<h1 class="mt-4">{{ $module_title }}</h1>
<div class="card">
    <div class="card-header bg-primary">
        <ol class="breadcrumb mb-1">
            <li class="breadcrumb-item active text-light">Tambah {{ $module_title }}</li>
        </ol>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label for="name">Username</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email" required>
            </div>

            <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <div class="form-group mb-3">
                <label for="confirm_password">Konfirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Masukkan Password"
                    required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>   
            </div>
        </form>
    </div>
</div>
@include('sweetalert::alert')
@push('script')

@endpush
@endsection
