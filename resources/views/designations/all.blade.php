@extends('layout.mainlayout')
@section('title')
<title>Designations Listing</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Designations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">All Designations</li>
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
                            <h3 class="card-title">List of All Designations</h3>
                            @if(Auth::user()->hasPermission('add_designation'))
                            <h3 class="card-title float-right"><a href="{{route('des-add')}}" class="btn btn-primary">Add New</a></h3>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="text-center table table-bordered table-striped projects">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Designation
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        @if(Auth::user()->hasPermission(['update_designation', 'active_inactive_designation']))
                                        <th>
                                            Action
                                        </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $model)
                                    <tr>
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                            <a>
                                                {{ $model->type }}
                                            </a>
                                        </td>
                                        <td>
                                            {{$model->description}}
                                        </td>
                                        <td>
                                            {{ $model->created_at }}
                                        </td>
                                        <td>
                                            <span class="badge badge-{{$model->active_status == '0' ? 'danger' : ($model->active_status == '1' ? 'success' : 'warning')}}"><?= $model->active_status == 0 ? 'InActive' : ($model->active_status == 1 ? 'Active' : 'Not defined') ?></span>
                                        </td>
                                        @if(Auth::user()->hasPermission(['update_designation', 'active_inactive_designation']))
                                        <td class="project-actions text-center">
                                            @if(Auth::user()->hasPermission('active_inactive_designation'))
                                            <a href="{{route('des-status', ['id' => $model->id, 'status'=> $model->active_status])}}" class="btn btn-dark btn-sm text-white"><?= $model->active_status == 0 ? 'Active' : ($model->active_status == 1 ? 'InActive' : 'Not Defined') ?></a>
                                            @endif
                                            @if(Auth::user()->hasPermission('update_designation'))
                                            <a class="btn btn-success btn-sm" href="{{route('des-edit', ['id' => $model->id])}}">
                                                <i class="fas fa-pen">
                                                </i>
                                            </a>
                                            @endif
                                            <!--                                            <a class="btn btn-danger btn-sm" href="{{route('des-delete', ['id' => $model->id])}}">
                                                <i class="fas fa-trash">
                                                </i>
                                            </a>-->
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection