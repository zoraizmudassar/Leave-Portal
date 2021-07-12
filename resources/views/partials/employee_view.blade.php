@section('title')
<title>{{$user->name}}</title>
@endsection
<div class="row">
    <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{URL::asset('assets/dist/img/user1-128x128.jpg')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}} <span class="badge badge-info">{{$user->empCategory->name}}</span></h3>
                <h5 class="text-muted text-center">{{$user->email}}</h5>
                <p class="text-muted text-center">{{isset($user->designation) ? $user->designation->type : ''}} ({{isset($user->department) ? $user->department->name : ''}})</p>
                <h5 class="text-muted text-center">Team Lead: {{isset($team_lead) ? $team_lead->name : ''}}</h5>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Applications</span>
                        <span class="info-box-number">
                            {{$all_count}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-hourglass" style="color: white;"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pending Applications</span>
                        <span class="info-box-number">{{$pen_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Accepted Applications</span>
                        <span class="info-box-number">{{$acc_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>


            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ban"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Rejected Applications</span>
                        <span class="info-box-number">{{$rej_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="info-box bg-light mt-3">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Balance Leaves</span>
                        <span class="info-box-number text-center text-muted mb-0">{{$user->balance_leave}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>