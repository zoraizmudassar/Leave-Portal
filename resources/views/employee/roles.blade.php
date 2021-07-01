@extends('layout.mainlayout')
@section('title')
<title>{{$user->name}} Role</title>
@endsection
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
                    <h1>Roles for {{$user->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Roles</li>
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
                            <h3 class="card-title">List of All Roles</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="leave-apply-form" action="{{route('emp-assign-roles')}}" method="post">
                                @csrf
                                <input type="hidden" name="emp_id" value="{{$user->id}}"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @foreach($roles as $role)
                                            <?php
                                            if($role->name!='team_lead')
                                            {
                                                echo "No";
                                            }
                                            ?>
                                            <div class="checkbox icheck-warning d-inline">
                                                <input name="roles[]" {{in_array($role->id, $user_roles) ? 'checked' : ''}} value="{{$role->id}}" type="checkbox" class="check-1" id="checkbox-{{$role->id}}">
                                                <label class="font-weight-normal" for="checkbox-{{$role->id}}">
                                                    {{ $role->display_name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12 text-right">
                                        <input type="submit" name="submit" value="Update Roles" class="btn btn-success"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection