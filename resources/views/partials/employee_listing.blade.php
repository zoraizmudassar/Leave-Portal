<table id="example1" class="text-center table table-bordered table-striped projects">
    <thead class="table-dark">
        <tr>
            <th>
                #
            </th>
            <th>
                Employee
            </th>
            <th>
                Designation
            </th>
            <th>
                Department
            </th>
            <th>
                Email
            </th>
            <th>
                Status
            </th>
            <th>
                Action
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
                    {{ $model->name }}
                </a>
            </td>
            <td>
                {{isset($model->designation) ? $model->designation->type : 'Not Set'}}
            </td>
            <td>
                {{isset($model->department) ? $model->department->name : 'Not Set' }}
            </td>
            <td>
                {{ $model->email }}
            </td>
            <td>
                <span class="badge badge-{{$model->active_status == '0' ? 'danger' : ($model->active_status == '1' ? 'success' : 'warning')}}"><?= $model->active_status == 0 ? 'InActive' : ($model->active_status == 1 ? 'Active' : 'Not defined') ?></span>
            </td>
            <td class="project-actions text-right">
                @if(Auth::user()->hasPermission('active_inactive_employee'))
                <a href="{{route('emp-status', ['id' => $model->id, 'status'=> $model->active_status])}}" class="btn btn-dark btn-sm text-white mr-2"><?= $model->active_status == 0 ? 'Active' : ($model->active_status == 1 ? 'InActive' : 'Not Defined') ?></a>
                @endif
                <a class="btn btn-primary btn-sm" href="{{route('emp-view', ['id' => $model->id])}}">
                    <i class="fas fa-eye">
                    </i>
                </a>
                @if(Auth::user()->hasPermission('update_employee'))
                <a class="btn btn-warning btn-sm ml-2" href="{{route('emp-edit', ['id' => $model->id])}}">
                    <i class="fas fa-pen" style="color: white;">
                    </i>
                </a>
                @endif
                @if(Auth::user()->hasPermission('assign_roles'))
                <a class="btn btn-success btn-sm ml-2" href="{{route('emp-roles', ['id' => $model->id])}}">
                    <i class="fas fa-tasks">
                    </i>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>