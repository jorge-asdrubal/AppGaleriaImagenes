@extends('admin.layout.template')

@section('title', 'Images')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1>Images</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">My images</li>
        </ol>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    My images
                </div>
                <div>
                    <a class="btn btn-dark btn-sm" href="{{ route('image.create') }}"><i class="fas fa-plus"></i> New image</a>
                </div>
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
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="card-body">
                <table id="images" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td><img style="padding: 5px; border: 1px solid black; width: 200px;" src="{{ asset($image->url) }}" alt="Image"></td>
                                <td>
                                    <a class="btn btn-secondary" href="{{ route('image.edit', ['id' => $image->id_image]) }}"><i class="fas fa-edit"></i></a>
                                </td>
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
            $('#images').DataTable();
        });
    </script>
@endsection