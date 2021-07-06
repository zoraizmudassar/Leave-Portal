@extends('layout.mainlayout')
@section('content')
<style>
    .project-actions {
        display: flex;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permanent Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Permanent</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of All Permanent</h3>
                            <a style="color: white;;" href="{{route('quota')}}" class="btn btn-warning card-title float-right">
                                <img src="{{URL::asset('assets/images/sidebar-images/key.png')}}" height="20" />
                                Update Leave Quota
                            </a>
                            <a href="{{route('register')}}" class="card-title float-right btn btn-primary mr-3">Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('partials.employee_listing')
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection