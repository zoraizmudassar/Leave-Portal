@extends('layout.mainlayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Apply New Leave</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('leave-all')}}">Leaves</a></li>
                        <li class="breadcrumb-item active">Apply New</li>
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
                            <h3 class="card-title">Leave Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="accordion" class="permissions-collapses">
                                <div class="card">
                                    <div class="card-header">
                                        <a class="card-link" data-toggle="collapse" href="#collapse-1">
                                            Instructions for Leave Apply.
                                        </a>
                                    </div>
                                    <div class="row">
                                    <div class="col-8">
                                    <div id="collapse-1" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <h4 class="text-danger">You have to Apply/Inform your leave according to the listed Rules!</h4>
                                            <ul>
                                                <li class="text-warning font-weight-bold">
                                                    <div>Half or 1 day Leave => Before 1 Day</div>
                                                </li>
                                                <li class="text-warning font-weight-bold">
                                                    <div>2-3 days Leave => Before 1 Week</div>
                                                </li>
                                                <li class="text-warning font-weight-bold">
                                                    <div>4-6 days Leave => Before 2 Week</div>
                                                </li>
                                                <li class="text-warning font-weight-bold">
                                                    <div>7 or more than 7 days Leave => Before 30 days</div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div></div>
                                    <div class="col-4 p-5">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Balance Leaves</span>
                                        <span class="info-box-number text-center text-muted mb-0">{{$balance}}</span>
                                    </div>
                                </div>
                            </div>
                            </div>       
                                </div>
                  
                                <form class="leave-apply-form" action="{{route('leave-add')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="leave_type_id" class="form-control select2" style="width: 100%;">
                                                    <option value="">---Select Option---</option>
                                                    @foreach($leavetypes as $model)
                                                    <option value="{{$model->id}}">{{$model->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('leave_type_id'))
                                                <span class="text-danger">{{ $errors->first('leave_type_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="subject" placeholder="Leave Subject" class="form-control">
                                                @if ($errors->has('subject'))
                                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea style="resize: none;" rows="3" name="description"  placeholder="Leave Description"class="form-control"></textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="checkbox icheck-warning d-inline">
                                                    <input name="short_leave" value="true" type="checkbox" class="short-leave" id="short-leave">
                                                    <label class="font-weight-normal" for="short-leave">
                                                        Half Day Leave
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 half-leave-section" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="checkbox icheck-warning d-inline">
                                                            <input checked="" name="half" value="1" type="radio" class="first-half" id="first-half">
                                                            <label class="font-weight-normal" for="first-half">
                                                                1st Half
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="checkbox icheck-warning d-inline">
                                                            <input name="half" value="2" type="radio" class="second-half" id="second-half">
                                                            <label class="font-weight-normal" for="second-half">
                                                                2nd half
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--<div class="form-group single-date" style="display: none;">
                                                <label>Date</label>
                                                <div class="input-group date">
                                                    <input name="halfday" id="reservationdate" type="text" class="form-control datetimepicker-input" >
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="form-group date-range">
                                                <label>Leave Duration</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" name="duration" class="form-control float-right duration" id="leave_date" placeholder="Leave Duration">
                                                </div>
                                                @if ($errors->has('no_of_days'))
                                                <span class="text-danger">{{ $errors->first('no_of_days') }}</span>
                                                @endif
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Days</label>
                                                <input class="form-control days" id="days" type="number" readonly="" value="1" name="no_of_days"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" name="submit" value="Apply Leave" class="btn btn-success"/>
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