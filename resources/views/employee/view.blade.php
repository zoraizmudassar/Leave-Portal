@extends('layout.mainlayout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->designation->type}} ({{$user->department->name}})</p>


                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Total Applications</span>
                                            <span class="info-box-number">
                                                {{$all_count}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-hourglass" style="color: white;"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Pending Applications</span>
                                            <span class="info-box-number">{{$pen_count}}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Accepted Applications</span>
                                            <span class="info-box-number">{{$acc_count}}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>


                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box mb-3">
                                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Rejected Applications</span>
                                            <span class="info-box-number">{{$rej_count}}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection
