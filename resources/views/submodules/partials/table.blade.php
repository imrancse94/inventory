<div class="table-responsive row">
    <table class="table table-bordered table-hover" id="datatable">
        <thead class="thead-default thead-lg">
        <tr>
            <th>
                <input type="checkbox" onclick="checkAllCheckbox(this)">
            </th>
            <th>{{__('Module Id')}}</th>
            <th>{{__('Module Name')}}</th>
            <th>{{__('Created On')}}</th>
            <th>{{__('Modified On')}}</th>
            <th class="no-sort text-center">{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($modules))
            @foreach($modules as $module_id => $module)
                <tr>
                    <td>
                        <input name="moduleCheckbox[]" value="{{$module->id}}" type="checkbox" class="bulk-action">
                    </td>
                    <td>
                        {{$module->id}}
                    </td>
                    <td>{{$module->name}}</td>
                    <td>{{$module->created_at}}</td>
                    <td>
                        {{$module->updated_at}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('modules.edit', $module->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('modules.view', $module->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                           data-form-id="{{ $module->id }}"><i class="fa fa-trash-o"></i></a>
                        <form id="delete-form-{{$module->id}}" action="{{route('modules.delete', $module->id)}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
