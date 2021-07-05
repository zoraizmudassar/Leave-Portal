<table id="example1" class="text-center table table-bordered table-striped projects">
    <thead class="table-dark">
        <tr>
            <th>
                Employee
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
                <a>
                    {{ $model->user->name }}
                </a>
            </td>
            <td>
                {{$model->subject}}
            </td>
            <td>
                {{ $model->no_of_days }} <b><?= $model->no_of_days == '0.5' ? ($model->half == 1 ? 'F' : ($model->half == 2 ? 'S' : '')) : ''; ?></b>
            </td>
            <td class="project-state">
                <span class="badge badge-{{$model->status == '0' ? 'danger' : ($model->status == '1' ? 'success' : 'warning')}}"><?= $model->status == 0 ? 'Rejected' : ($model->status == 1 ? 'Accepted' : 'Pending') ?></span>
            </td>
            <td>
                {{date('d-M-Y h:i A', strtotime($model->datetime))}}
            </td>
            <td class="project-actions text-center">
                <a class="btn btn-info btn-sm" href="{{route($view_route_name, ['id'=>$model->id])}}">
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