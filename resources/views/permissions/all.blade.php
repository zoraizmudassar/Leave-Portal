@extends('layout.mainlayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">All Permissions</li>
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
                            <h3 class="card-title">List of All Permissions</h3>
                            <h3 class="card-title float-right"><a href="{{route('per-add')}}" class="btn btn-primary">Add New</a></h3>
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
                                            Name
                                        </th>
                                        <th>
                                            Group
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Created at
                                        </th>
                                        <th>
                                        </th>
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
                                                {{ $model->display_name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a>
                                                {{ isset($model->permissionsGroup->display_name) ? $model->permissionsGroup->display_name : '' }}
                                            </a>
                                        </td>
                                        <td>
                                            {{$model->description}}
                                        </td>
                                        <td>
                                            {{ $model->created_at }}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-success btn-sm" href="{{route('per-edit', ['id' => $model->id])}}">
                                                <i class="fas fa-pen">
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