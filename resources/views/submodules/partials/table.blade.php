<div class="table-responsive row">
    <table class="table table-bordered table-hover" id="datatable">
        <thead class="thead-default thead-lg">
        <tr>
            <th>
                <input type="checkbox" onclick="checkAllCheckbox(this)">
            </th>
            <th>{{__('Sub Module Id')}}</th>
            <th>{{__('Module Name')}}</th>
            <th>{{__('Sub Module Name')}}</th>
            <th>{{__('Created On')}}</th>
            <th>{{__('Modified On')}}</th>
            <th class="no-sort text-center">{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($submodules))
            @foreach($submodules as $submodule_id => $submodule)

                <tr>
                    <td>
                        <input name="moduleCheckbox[]" value="{{$submodule->id}}" type="checkbox" class="bulk-action">
                    </td>
                    <td>
                        {{$submodule->id}}
                    </td>
                    <td>{{$submodule->modules['name']}}</td>

                    <td>{{$submodule->name}}</td>

                    <td>{{$submodule->created_at}}</td>
                    <td>
                        {{$submodule->updated_at}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('submodules.edit', $submodule->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('submodules.view', $submodule->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                           data-form-id="{{ $submodule->id }}"><i class="fa fa-trash-o"></i></a>
                        <form id="delete-form-{{$submodule->id}}" action="{{route('submodules.delete', $submodule->id)}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    </td>
                    <!--                                    --><?php //dd($submodule->name); ?>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>
