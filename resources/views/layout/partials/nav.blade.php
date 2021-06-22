<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
<!--      <img src="assets/images/logo.png" alt="Amco Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
        <img src="{{ URL::asset('assets/images/logo.png') }}"/>
        <!--<span class="brand-text font-weight-light"> </span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ URL::asset('assets/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('emp-view-profile', ['id' => Auth::user()->id])}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(Auth::user()->hasRole('admin'))
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'dep-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'dep-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-building"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/dep.png')}}" height="20"/>
                        <p>
                            Departments
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dep-all')}}" class="nav-link {{strpos(Request::route()->getName(),'dep-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dep-add')}}" class="nav-link {{strpos(Request::route()->getName(),'dep-add') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add New Department</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'des-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'des-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-file"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/designation.png')}}" height="20"/>
                        <p>
                            Designations
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('des-all')}}" class="nav-link {{strpos(Request::route()->getName(),'des-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('des-add')}}" class="nav-link {{strpos(Request::route()->getName(),'des-add') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add New Designation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'role-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'role-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-file"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/roles.png')}}" height="20"/>
                        <p>
                            Roles
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role-all')}}" class="nav-link {{strpos(Request::route()->getName(),'role-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('role-add')}}" class="nav-link {{strpos(Request::route()->getName(),'role-add') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add New Role</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
<!--                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Permissions Groups
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('per-group-all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('per-group-add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Group</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Permissions
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('per-all')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('per-add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
               
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'lt-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'lt-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-file"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/leave_type.png')}}" height="20"/>
                        <p>
                            Leave Types
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('lt-all')}}" class="nav-link {{strpos(Request::route()->getName(),'lt-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('lt-add')}}" class="nav-link {{strpos(Request::route()->getName(),'lt-add') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add New Leave Type</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'ec-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'ec-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-file"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/emp_category.png')}}" height="20"/>
                        <p>
                            Employee Categories
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('ec-all')}}" class="nav-link {{strpos(Request::route()->getName(),'ec-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('ec-add')}}" class="nav-link {{strpos(Request::route()->getName(),'ec-add') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add Employee Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'emp-') !== false || strpos(Request::route()->getName(),'register') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'emp-') !== false || strpos(Request::route()->getName(),'register') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-users"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/employee.png')}}" height="20"/>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('emp-all')}}" class="nav-link {{strpos(Request::route()->getName(),'emp-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emp-int')}}" class="nav-link {{strpos(Request::route()->getName(),'emp-int') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Interni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emp-prob')}}" class="nav-link {{strpos(Request::route()->getName(),'emp-prob') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Probation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('emp-per')}}" class="nav-link {{strpos(Request::route()->getName(),'emp-per') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-primary"></i>
                                <p>Permanent</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('register')}}" class="nav-link {{strpos(Request::route()->getName(),'register') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                    
                </li>
                @if(Auth::user()->hasPermission('update_password') )
                <li class="nav-item has-treeview">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"  class="nav-link">
                        <!--<i class="nav-icon fas fa-users"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/key.png')}}" height="20"/>
                        <p>
                                            <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->                                           
                            Update Password
                            <!-- <i class="fas fa-angle-left right"></i> -->
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    @endif

                </li>
                @endif

                <li class="nav-item has-treeview">
                
                <a href="{{route('quota')}}" class="nav-link">
                        <!--<i class="nav-icon fas fa-users"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/key.png')}}" height="20"/>
                        <p>
                                            <!--<a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>-->                                           
                            Update Leave Quota
                            <!-- <i class="fas fa-angle-left right"></i> -->
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                

                </li>
                @endif

                 @if(Auth::user()->hasRole(['admin', 'team_lead']))
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'app-') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'app-') !== false ? 'active' : '' }}">
                        <!--<i class="nav-icon fas fa-file"></i>-->
                        <img src="{{URL::asset('assets/images/sidebar-images/applications.png')}}" height="20"/>
                        <p>
                            Leave Applications
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('app-all')}}" class="nav-link {{strpos(Request::route()->getName(),'app-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('app-pending')}}" class="nav-link {{strpos(Request::route()->getName(),'app-pending') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('app-accepted')}}" class="nav-link {{strpos(Request::route()->getName(),'app-accepted') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-primary"></i>
                                <p>Accepted</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('app-rejected')}}" class="nav-link {{strpos(Request::route()->getName(),'app-rejected') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Rejected</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                
                <li class="nav-item has-treeview {{strpos(Request::route()->getName(),'leave') !== false || strpos(Request::route()->getName(),'emp-home') !== false ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{strpos(Request::route()->getName(),'leave') !== false || strpos(Request::route()->getName(),'emp-home') !== false ? 'active' : '' }}">
                        <img src="{{URL::asset('assets/images/sidebar-images/my_leaves.png')}}" height="20"/>
                        <p>
                            My Leaves
                            <i class="fas fa-angle-left right"></i>
                            <!--<span class="badge badge-info right">6</span>-->
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('leave-all')}}" class="nav-link {{strpos(Request::route()->getName(),'leave-all') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leave-pending')}}" class="nav-link {{strpos(Request::route()->getName(),'leave-pending') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leave-accepted')}}" class="nav-link {{strpos(Request::route()->getName(),'leave-accepted') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-primary"></i>
                                <p>Accepted</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('leave-rejected')}}" class="nav-link {{strpos(Request::route()->getName(),'leave-rejected') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Rejected</p>
                            </a>
                        </li>
                        <li class="nav-item mb-5">
                            <a href="{{route('leave-apply')}}" class="nav-link {{strpos(Request::route()->getName(),'leave-apply') !== false ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Apply New Leave</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>