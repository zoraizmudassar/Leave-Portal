@extends('layout.mainlayout')
@section('title')
<title>{{$role->display_name}} Permissions</title>
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
                    <h1>Permissions for {{$role->display_name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Permissions</li>
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
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form class="leave-apply-form" action="{{route('role-assign-permissions')}}" method="post">
                                @csrf
                                <input type="hidden" name="role_id" value="{{$role->id}}"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="accordion" class="permissions-collapses">
                                            <?php
                                            $cnt = 1;
                                            foreach ($permissions_groups as $group) {
                                                if (isset($group->permissions) && count($group->permissions->toArray())) {
                                                    ?>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="card-link" data-toggle="collapse" href="#collapse-<?= $group->id ?>">
                                                                {{ $group->display_name }}
                                                            </a>
                                                        </div>
                                                        <div id="collapse-{{$group->id}}" class="collapse {{$cnt == 0 ? 'show' : ''}}" data-parent="#accordion">
                                                            <div class="card-body">
                                                                <div class="form-group clearfix">
                                                                    <div class="checkbox icheck-warning">
                                                                        <input type="checkbox" id="checkall-{{$group->id}}">
                                                                        <label for="checkall-{{$group->id}}">
                                                                            Check All
                                                                        </label>
                                                                    </div>
                                                                    <?php foreach ($group->permissions as $permission) { ?>
                                                                        <div class="checkbox icheck-warning d-inline">
                                                                            <input name="permissions[]" {{in_array($permission->id, $role_permissions) ? 'checked' : ''}} value="{{$permission->id}}" type="checkbox" class="check-{{$group->id}}" id="checkbox-{{$permission->id}}">
                                                                            <label class="font-weight-normal" for="checkbox-{{$permission->id}}">
                                                                                {{ $permission->display_name }}
                                                                            </label>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                $cnt++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <input type="submit" name="submit" value="Update Permissions" class="btn btn-success"/>
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