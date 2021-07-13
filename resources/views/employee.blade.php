<?php
$view_route_name = 'leave-view';
?>
@extends('layout.mainlayout')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                    <a href="{{route('leave-apply')}}" class="btn btn-info mt-1">Apply New Leave</a>
                </div><!-- /.col -->
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box mt-3">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Balance Leaves</span>
                            <span class="info-box-number text-center text-muted mb-0">{{Auth::user()->balance_leave}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box mt-3" style="background-color: #ffc107 !important;">
                        <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Unpaid Leaves</span>
                            <span class="info-box-number text-center text-muted mb-0">{{$unpaid}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Applications</span>
                            <span class="info-box-number">
                                {{$all_count}}
                                <!--<small>%</small>-->
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
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
                <div class="col-12 col-sm-6 col-md-3">
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
                <div class="col-12 col-sm-6 col-md-3">
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
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Yearly Information</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">All Applications</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @include('partials.applications_listing')
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->
                                            <a href="{{route('leave-all')}}" class="btn btn-sm btn-secondary float-right">View All Applications</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@section('dashboard_js')
<script src="{{ URL::asset('assets/dist/js/pages/dashboard2.js') }}"></script>
@endsection