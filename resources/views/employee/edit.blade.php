@extends('layout.mainlayout')

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

                                            <input  value="{{$model->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>

                                            <input value="{{$model->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_id">{{ __('Department') }}</label>
                                            <select required="" name="department_id" id="department_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($departments as $item)
                                                <option {{$model->department_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="designation_id">{{ __('Designation') }}</label>
                                            <select required="" name="designation_id" id="designation_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($designations as $item)
                                                <option {{$model->designation_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->type }}</option>
                                                @endforeach
                                            </select>

                                            @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_category_id">{{ __('Employee Category') }}</label>
                                            <select required="" name="emp_category_id" id="emp_category_id" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($empcategories as $item)
                                                <option {{$model->emp_category_id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('emp_category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="team_lead">{{ __('Team Lead') }}</label>
                                            <select required="" name="team_lead" id="team_lead" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($users as $item)
                                                <option {{$model->team_lead == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('team_lead')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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
