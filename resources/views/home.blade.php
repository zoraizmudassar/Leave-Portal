<?php
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
?>
@section('title')
<title> Admin Dashboard</title>
@endsection
@extends('layout.mainlayout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
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
                            <h5 class="card-title">Weekly Information</h5>

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
                                            <h3 class="card-title">Latest Applications</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table  class="table table-bordered table-striped projects text-center">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th >
                                                                #
                                                            </th>
                                                            <th>
                                                                Employee
                                                            </th>
                                                            <th>
                                                                Leave Type
                                                            </th>
                                                            <th>
                                                                Leave Subject
                                                            </th>
                                                           
                                                            <th>
                                                                No of Days
                                                            </th>
                                                            
                                                            <th class="text-center">
                                                                Status
                                                            </th>
                                                            <th>
                                                                Date of Apply
                                                            </th>
                                                            <th>
                                                                Details
                                                            </th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($latest_app as $model)
                                                        <tr>
                                                            <td>
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <img alt="Avatar" class="table-avatar" src="{{URL::asset("assets/dist/img/avatar.png")}}">
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <a>
                                                                    {{ $model->user->name }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                            {{$model->leaveType->name}}
                                                            </td>
                                                            <td>
                                                                {{$model->subject}}
                                                            </td>
                                                            
                                                            <td>
                                                                {{ $model->no_of_days }}
                                                            </td>
                                                            <td class="project-state">
                                                                <span class="badge badge-{{$model->status == '0' ? 'danger' : ($model->status == '1' ? 'success' : 'warning')}}"><?= $model->status == 0 ? 'Rejected' : ($model->status == 1 ? 'Accepted' : 'Pending') ?></span>
                                                            </td>
                                                            <td>
                                                                {{$model->datetime}}
                                                            </td>
                                                            <td class="project-actions text-right">
                                                                <a style="margin-left: 50%; margin-right: 50%;" class="btn btn-secondary btn-sm" href="{{route('app-view', ['id'=>$model->id])}}">
                                                                    <i class="fas fa-eye">
                                                                    </i>
                                                                </a>
                                                                <!--                                            <a class="btn btn-success btn-sm" href="#">
                                                                                                                <i class="fas fa-thumbs-up">
                                                                                                                </i>
                                                                                                            </a>
                                                                                                            <a class="btn btn-danger btn-sm" href="#">
                                                                                                                <i class="fas fa-ban">
                                                                                                                </i>
                                                                                                            </a>-->
                                                            </td>

                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->
                                            <a href="{{route('app-all')}}" class="btn btn-sm btn-secondary float-right">View All Applications</a>
                                        </div>
                                        <!-- /.card-footer -->
                                    </div>
                                </div>
                                <!-- /.col -->
<!--                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Goal Completion</strong>
                                    </p>

                                    <div class="progress-group">
                                        Add Products to Cart
                                        <span class="float-right"><b>160</b>/200</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                     /.progress-group 

                                    <div class="progress-group">
                                        Complete Purchase
                                        <span class="float-right"><b>310</b>/400</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 75%"></div>
                                        </div>
                                    </div>

                                     /.progress-group 
                                    <div class="progress-group">
                                        <span class="progress-text">Visit Premium Page</span>
                                        <span class="float-right"><b>480</b>/800</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 60%"></div>
                                        </div>
                                    </div>

                                     /.progress-group 
                                    <div class="progress-group">
                                        Send Inquiries
                                        <span class="float-right"><b>250</b>/500</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" style="width: 50%"></div>
                                        </div>
                                    </div>
                                     /.progress-group 
                                </div>-->
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!--View Password Modal -->


@endsection
@section('dashboard_js')
<script src="{{ URL::asset('assets/dist/js/pages/2.js') }}"></script>
@endsection
