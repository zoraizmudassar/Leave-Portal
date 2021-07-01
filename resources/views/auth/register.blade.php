<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<?php
use App\User;
?>
@extends('layout.mainlayout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Registration</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item">Employee</li>
                        <li class="breadcrumb-item active">Register</li>
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
                        <div class="card-header">{{ __('Register Employee') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>

                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_id">{{ __('Add Employee') }}</label>
                                            <select name="add_emp" id="add_emp" class="form-control select2" style="width: 100%;">
                                                                                        
                                                <option value=1 >New Employee</option>
                                                <option value=2 selected>Existing Employee</option>
              
                                            </select>

                                            @if ($errors->has('department_id'))
                                                <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_category_id">{{ __('Employee Category') }}</label>
                                            <select name="emp_category_id" id="emp_category_id" class="form-control select2" style="width: 100%;">
                                          
                                                @foreach($empcategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('emp_category_id'))
                                                <span class="text-danger">{{ $errors->first('emp_category_id') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department_id">{{ __('Registration Date') }}</label>
                                                <input name="reg_date" id="reg_date" width="100%">
                                          
                                                <!-- <h5 id="demo"></h5> -->
                                                <!-- <h5 id="demo1"></h5> -->
                                                <?php
                                                 date_default_timezone_set("Asia/Karachi");
                                                 $date_new = date('d-m-Y');

                                                 $year = '31/12/'.date('Y');
                                                //  echo $year;
                                                ?>
                                        <script>
                                        $('#reg_date').datepicker({
                                        uiLibrary: 'bootstrap4',
                                        "setDate": new Date(),
                                        // "autoclose": true
                                        });

                                        $(document).ready(function() {
                                        // $('#reg_date').datepicker('setDate', 'today'); 

                                        var a = $('#reg_date').val();
                                        // $('#demo').text(a);
                                        
                                        var d = new Date();
                                        var month = d.getMonth() + 1;
                                        var dateStr = month;
                                        var cal = 12 - dateStr;
                                        var div = 20 / 12;
                                        var mul = div * cal;
                                        var total = float2int(mul);
                                        function float2int (value) {
                                         return value | 0;
                                         }
                                        
                                        // $('#demo1').text(total);
                                        
                                
                                                $('#emp_category_id').on('change', function(){
                                                    var empC_val = $('#emp_category_id').val();
                                                if(empC_val == "1")
                                                {
                                                    $('#reg_date').attr('disabled', true);
                                                    $('#leave').attr('disabled', true);   
                                                    $('#leave').attr('value', 0);
                                                }
                                                else if(empC_val == "2")
                                                {
                                                    $('#reg_date').attr('disabled', true);
                                                    $('#leave').attr('disabled', true);      
                                                    $('#leave').attr('value', 0);                                          
                                                }
                                                else if(empC_val == "5")
                                                {
                                                    $a = 12;
                                                    $('#reg_date').attr('disabled', true);
                                                    $('#leave').attr('disabled', true);      
                                                    $('#leave').val(total);                                          
                                                }
                                                });
                                                
                                            });
                                        </script>
                  
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="department_id">{{ __('Allowed Leaves') }}</label>
                                            <input type="number" id="leave" class="form-control" name="leave" value="123">

                                            @if ($errors->has('department_id'))
                                                <span class="text-danger">{{ $errors->first('department_id') }}</span>
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
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                <option value="{{ $item->id }}">{{ $item->type }}</option>
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
                                            <label for="team_lead">{{ __('Team Lead') }}</label>
                                            <select name="team_lead" id="team_lead" class="form-control select2" style="width: 100%;">
                                                <option value="">---Select Option---</option>
                                                @foreach($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('team_lead'))
                                                <span class="text-danger">{{ $errors->first('team_lead') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">{{ __('Password') }}</label>

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                            @if ($errors->has('password-confirm'))
                                                <span class="text-danger">{{ $errors->first('password-confirm') }}</span>
                                                @endif
                                                @if ($errors->has('password_confirmation'))
                                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 32px;">
                                        {{ __('Register') }}
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
