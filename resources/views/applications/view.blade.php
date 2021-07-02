@extends('layout.mainlayout')
@section('title')
<title>{{$data->subject}}</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Application Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Applications</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12">
                                <h4>Employee</h4>
                                <!--{{$data->unreadNotifications}}-->
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}" alt="user image">
                                        <span class="username">
                                            <a href="#">{{$data->user->name}}</a>
                                        </span>
                                        <span class="description">{{$data->user->designation->type}} ({{$data->user->department->name}})</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Allowed Leaves</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$allowed}} </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Balance Leaves</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$balance}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Used Leaves
                                        </span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$used}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light" style="background-color: #ffc107 !important;">
                                    <div class="info-box-content">
                                        <!-- <span style="color: white;font-style: italic; font-size: 14px;" class="ml-2 p-2 badge badge-warning">Unpaid</span> -->
                                        <span style="color: white !important;font-weight: bold;;" class="info-box-text text-center text-muted">Unpaid Leaves
                                        </span>
                                        <span style="color: white !important;font-weight: bold;" class="info-box-number text-center text-muted mb-0">{{$unpaid}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary"><i class="fas fa-file"></i> {{$data->leaveType->name}}
                            @if($data->late_apply == 1)
                            <span class="badge badge-danger"><small style="font-weight: bold;color: white;">Late Informed</small></span>
                            @endif
                        </h3>
                        <p class="mb-0"><b>Subject:</b> {{$data->subject}}</p>
                        <p><b>Description:</b> {{$data->description}}</p>

                        <h3 class="badge badge-{{$data->status == '0' ? 'danger' : ($data->status == '1' ? 'success' : 'warning')}}" style="font-weight: bold;color: white;">{{$data->status == '0' ? 'Rejected' : ($data->status == '1' ? 'Accepted' : 'Pending')}} {{isset($status_changed_by) && $status_changed_by != '' ? 'by '. $status_changed_by : ''}}</h3>
                        <h4>{{isset($data->short_leave) && $data->short_leave == true ? 'Half day' : $data->no_of_days . ' days'}} Leave</h4>
                        @if($data->short_leave == 1)
                        <div class="text-muted">
                            <p>Date
                                <b class="d-block">{{$data->start_from}}</b>
                                <span class="badge badge-info font-weight-bold">{{$data->half == 1 ? '1st Half' : '2nd Half'}}</span>
                            </p>
                        </div>
                        @else
                        <div class="text-muted">
                            <p>Leave Start Date
                                <b class="d-block">{{$data->start_from}}</b>
                            </p>
                            <p>Leave End Date
                                <b class="d-block">{{$data->end_to}}</b>
                            </p>
                        </div>
                        @endif
                        <br>
                        <div class="text-center mt-5 mb-3">
                            @if($data->status != 1 && Auth::user()->hasPermission('accept_application'))
                            <a href="{{route('app-accept', ['id' => $data->id])}}" class="btn btn-sm btn-success"><i class="fas fa-thumbs-up"></i> Accept</a>
                            @endif
                            @if($data->status != 0 && Auth::user()->hasPermission('reject_application'))
                            <a href="{{route('app-reject', ['id' => $data->id])}}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i> Reject</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection