@extends('layouts2.app')

@section('title')
{{ __($module_name) }} {{ __($module_title) }}
@endsection

@section('content')
<h1 class="mt-4">{{ $module_title }}</h1>
<div class="card">
    <div class="card-header mb-">
        <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
    </div>
    <div class="card-body">
        <table id="roletable" class="table table-bordered" id="yajra-userdatatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Role Pengguna</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>                    
                    <td>
                        <a href="{{ route('manage-roles.edit', $item->id) }}" class="btn btn-warning"><i
                                class="fa fa-pencil"></i></a>
                        <form method="POST" action="{{ route('manage-roles.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('script')
<script>
    $(function () {
        $("#roletable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

</script>
@endpush
@include('sweetalert::alert')
@endsection
