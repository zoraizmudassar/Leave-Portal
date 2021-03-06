@extends('layout.mainlayout')

@section('title')
<title>{{'Update ' . $model->name}}</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$model->name}} Update</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Update</li>
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
                        <div class="card-header">{{ __('Update Employee') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('emp-update', ['id' => $model->id]) }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>

                                            <input value="{{$model->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>

                                            <input value="{{$model->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_id">{{ __('Department') }}</label>
                                            <select name="department_id" id="department_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($departments as $item)
                                                <option {{$model->department_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('department_id'))
                                            <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation_id">{{ __('Designation') }}</label>
                                            <select name="designation_id" id="designation_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($designations as $item)
                                                <option {{$model->designation_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->type }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('designation_id'))
                                            <span class="text-danger">{{ $errors->first('designation_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_category_id">{{ __('Employee Category') }}</label>
                                            <select name="emp_category_id" id="emp_category_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($empcategories as $item)
                                                <option {{$model->emp_category_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('emp_category_id'))
                                            <span class="text-danger">{{ $errors->first('emp_category_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="team_lead">{{ __('Team Lead') }}</label>
                                            <select name="team_lead" id="team_lead" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($users as $item)
                                                <option {{$model->team_lead == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('team_lead'))
                                            <span class="text-danger">{{ $errors->first('team_lead') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 32px;">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection