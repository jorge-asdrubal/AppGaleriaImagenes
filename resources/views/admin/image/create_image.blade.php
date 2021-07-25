@extends('admin.layout.template')

@section('title', 'Image Create')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dropzone.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1>Image create</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('image.index') }}">My images</a></li>
            <li class="breadcrumb-item active">Image create</li>
        </ol>
        <div class="card">
            <div class="card-header">
                <h3>Image create</h3>
            </div>
            <div class="card-body">
                {{-- <form enctype="multipart/form-data" action="{{ route('image.save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control" placeholder="Image..." name="image" id="image">
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('image.index') }}" class="btn btn-outline-warning" style="width: 20%; margin-right: 10%;"><i class="fas fa-window-close"></i> Cancel</a>
                            <button type="submit" class="btn btn-outline-secondary" style="width: 20%;"><i class="fas fa-save"></i> Save</button>
                        </div>
                    </div>
                </form> --}}
                <form action="{{ route('image.save') }}" method="POST" class="dropzone"  id="my-awesome-dropzone">
                </form>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('image.index') }}" class="btn btn-outline-secondary" style="width: 20%; margin-top: 1%;">Images list</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            dictDefaultMessage: "Drop images here to upload.",
            paramName: "image",
            maxFilesize: 5, // MB
            acceptFiles: ".jpg, .png, .jpeg", // Type of load
        };
    </script>
@endsection