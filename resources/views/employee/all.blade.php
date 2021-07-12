@extends('layout.mainlayout')
@section('title')
<title>Employee Listing</title>
@endsection
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
                    <h1>Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">List</li>
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
                            <h3 class="card-title">List of All Employee</h3>
                            @if(Auth::user()->hasPermission('add_employee'))
                            <a href="{{route('register')}}" class="float-right btn btn-primary">Add New</a>
                            @endif
                            @if(Auth::user()->hasPermission('update_leave_quota'))
                            <!-- Button trigger modal -->
                            <button style="color: white;" type="button" class="float-right mr-3 btn btn-warning" data-toggle="modal" data-target="#conformUpdateLeaveQuota">
                                Update Leave Quota
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="conformUpdateLeaveQuota" tabindex="-1" role="dialog" aria-labelledby="conformUpdateLeaveQuotaLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation for Update Leave Quota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to update leave quota for all Permenant Employee?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-success" href="{{route('quota')}}">Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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