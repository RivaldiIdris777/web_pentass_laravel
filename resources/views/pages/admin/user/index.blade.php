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
        <table class="table table-bordered" id="yajra-userdatatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified Email Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@push('script')
<script>
    $(function () {

        var table = $('#yajra-userdatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('userslist') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'email_verified_at',
                    name: 'email_verified_at'
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
</script>
@endpush
@include('sweetalert::alert')
@endsection
