@extends('layout.mainlayout')
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
                            <h3 class="card-title float-right"><a href="{{route('register')}}" class="btn btn-primary">Add New</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="text-center table table-bordered table-striped projects">
                                <thead class="table-dark">
                                    <tr>
                                        <th >
                                            #
                                        </th>
                                        <th>
                                            Employee
                                        </th>
                                        <th>
                                            Designation
                                        </th>
                                        <th>
                                            Department
                                        </th>
                                        <th>
                                            Email
                                        </th>
<!--                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            Used Leaves
                                        </th>
                                        <th>
                                            Balance Leaves
                                        </th>-->
                                        <th>
                                        Status
                                        </th>
                                        <th>
                                        Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $model)
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
                                                {{ $model->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{$model->designation->type}}
                                        </td>
                                        <td>
                                            {{ $model->department->name }}
                                        </td>
                                        <td>
                                            {{ $model->email }}
                                        </td>
                                        <td>
                                        <span class="badge badge-{{$model->active_status == '0' ? 'danger' : ($model->active_status == '1' ? 'success' : 'warning')}}"><?= $model->active_status == 0 ? 'InActive' : ($model->active_status == 1 ? 'Active' : 'Not defined')?></span></td>
                                        <td class="project-actions text-right">
                                        <a href="{{route('emp-status', ['id' => $model->id, 'status'=> $model->active_status])}}" class="btn btn-dark btn-sm text-white mr-2"><?= $model->active_status == 0 ? 'Active' : ($model->active_status == 1 ? 'InActive' : 'Not Defined')?></a>
                                            <a class="btn btn-primary btn-sm" href="{{route('emp-view', ['id' => $model->id])}}">
                                                <i class="fas fa-eye">
                                                </i>
                                            </a>
                                            <a class="btn btn-warning btn-sm ml-2" href="{{route('emp-edit', ['id' => $model->id])}}">
                                                <i class="fas fa-pen" style="color: white;">
                                                </i>
                                            </a>
                                            <a class="btn btn-success btn-sm ml-2" href="{{route('emp-roles', ['id' => $model->id])}}">
                                                <i class="fas fa-tasks">
                                                </i>
                                            </a>
                                        </td>
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