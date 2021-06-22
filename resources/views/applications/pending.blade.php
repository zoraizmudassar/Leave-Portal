@extends('layout.mainlayout')
@section('title')
<title>Pending Applications</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pending Applications</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('app-all')}}">Applications</a></li>
                        <li class="breadcrumb-item active">List of Pending</li>
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
                            <h3 class="card-title">List of Pending Leaves</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped projects text-center">
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
                                                {{ $model->user->name }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $model->leave_type_id }}
                                        </td>
                                        <td>
                                            {{$model->subject}}
                                        </td>
                                        
                                        <td>
                                            {{ $model->no_of_days }}
                                        </td>
                                        <td class="project-state">
                                            <span class="badge badge-{{$model->status == '0' ? 'danger' : ($model->status == '1' ? 'success' : 'warning')}}"><?= $model->status == 0 ? 'Rejected' : ($model->status == 1 ? 'Accepted' : 'Pending')?></span>
                                        </td>
                                        <td>
                                            {{$model->datetime}}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a style="margin-right: 20%" class="btn btn-secondary btn-sm" href="{{route('app-view', ['id'=>$model->id])}}">
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
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection