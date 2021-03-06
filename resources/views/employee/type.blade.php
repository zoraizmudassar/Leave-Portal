@extends('layout.mainlayout')
@section('title')
<title>{{$type->name . ' Employee Listing'}}</title>
@endsection
@section('content')
<style>
    .project-actions{
        display: flex;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $type->name ?> Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active"><?= $type->name ?></li>
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
                            <h3 class="card-title">List of All <?= $type->name ?></h3>
                            <!-- <h3 class="card-title float-right"><a href="{{route('register')}}" class="btn btn-primary">Add New</a></h3> -->
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