<div class="table-responsive row">
    <table class="table table-bordered table-hover" id="datatable">
        <thead class="thead-default thead-lg">
        <tr>
            <th>
                <label class="checkbox checkbox-ebony">
                    <input type="checkbox" class="bulk-action" id="main-checkbox">
                    <span class="input-span"></span>
                </label>
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
                        <label class="checkbox checkbox-ebony">
                            <input name="moduleCheckbox[]" value="{{$module->id}}" type="checkbox" class="bulk-action">
                            <span class="input-span"></span>
                        </label>
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

                        <a class="text-muted font-16 mr-2" href="{{route('modules.edit',$module->id)}}">
                            <i class="ti-pencil-alt"></i>
                        </a>
                        <a class="text-muted font-16 mr-2" href="{{route('modules.view',$module->id)}}">
                            <i class="ti-eye"></i>
                        </a>
                        <a class="text-muted font-16" data-id="{{$module->id}}"  href="#" onclick="deleteAction('delete-form-{{$module->id}}')">
                            <i class="ti-trash"></i>
                        </a>
                        <form id="delete-form-{{$module->id}}" action="{{route('modules.delete', $module->id)}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
