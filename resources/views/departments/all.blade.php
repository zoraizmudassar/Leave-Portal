@extends('layout.mainlayout')
@section('title')
<title>Departments Listing</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Departments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">All Departments</li>
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
                            <h3 class="card-title">List of All Departments</h3>
                            @if(Auth::user()->hasPermission('add_department'))
                            <h3 class="card-title float-right"><a href="{{route('dep-add')}}" class="btn btn-primary">Add New</a></h3>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped projects text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Department
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
                                        @if(Auth::user()->hasPermission(['active_inactive_department', 'update_department']))
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
                                                {{ $model->name }}
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
                                        @if(Auth::user()->hasPermission(['active_inactive_department', 'update_department']))
                                        <td class="project-actions text-center">
                                            @if(Auth::user()->hasPermission('active_inactive_department'))
                                            <a href="{{route('dep-status', ['id' => $model->id, 'status'=> $model->active_status])}}" class="btn btn-dark btn-sm text-white"><?= $model->active_status == 0 ? 'Active' : ($model->active_status == 1 ? 'InActive' : 'Not Defined') ?></a>
                                            @endif
                                            @if(Auth::user()->hasPermission('update_department'))
                                            <a class="btn btn-success btn-sm" href="{{route('dep-edit', ['id' => $model->id])}}">
                                                <i class="fas fa-pen">
                                                </i>
                                            </a>
                                            @endif
                                            <!--                                            <a onclick="return confirm('Are you sure you want to Inactive this department?')" class="btn btn-danger btn-sm" href="{{route('dep-delete', ['id' => $model->id])}}">
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