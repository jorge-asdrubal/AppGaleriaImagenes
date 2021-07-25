@extends('admin.layout.template')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">{{ $users_number }}</div>
                    <div class="card-footer d-flex justify-content-start">
                        <div class="small text-white">Total number of users</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">{{ $my_images_number }}</div>
                    <div class="card-footer d-flex justify-content-start">
                        <div class="small text-white">Total images uploaded by you</div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-body">{{ $images_number }}</div>
                    <div class="card-footer d-flex justify-content-start">
                        <div class="small text-white">Total images uploaded by all</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection