@extends('admin.layout.template')

@section('title')
    User Edit
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Users list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users list</a></li>
            <li class="breadcrumb-item active">User edit</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header py-3 d-flex justify-content-center">
                <h3 class="m-0 font-weight-bold text-dark">User edit</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                    <input type="hidden" name="previous_email" value="{{ $user->email }}">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-floating mb-3">
                                <input required type="text" value="{{ $user->name }}" placeholder="Name..." class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                <label for="name">Name: </label>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input required type="email" value="{{ $user->email }}" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                <label for="email">Email: </label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter new password" name="password" id="password">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" id="password_confirmation">
                                <label for="password_confirmation">Confirm password</label>
                            </div>
                        </div>
                    </div>
                    @if ($user->id_rol != 1)
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <select class="form-control @error('id_rol') is-invalid @enderror" name="id_rol" id="id_rol">
                                    <option value="">Seleccione</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id_rol }}" {{ $rol->id_rol == $user->id_rol ? 'selected' : '' }}>{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                                <label for="id_rol">Role</label>
                                @error('id_rol')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @else
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input id="role" class="form-control" type="text" readonly value="SuperAdmin">
                                <label for="role">Role</label>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-warning" style="width: 30%;"><i class="far fa-window-close"></i> Cancel</a>
                        <button type="submit" class="btn btn-outline-secondary" style="width: 30%; margin-left: 5%;"><i class="far fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection