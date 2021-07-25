@extends('admin.layout.template')

@section('title')
    Users
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users list</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Users list</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users list
        </div>
        @if ($errors->any())
            <div class="card-body">
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger" role="alert">{{ $item }}</div>
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="card-body">
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            </div>
        @endif
        <div class="card-body">
            <table id="users" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Creation date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->rol_name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td><a href="{{ route('users.edit', ['id' => $item->id_user]) }}" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#users').DataTable();
        });
    </script>
@endsection