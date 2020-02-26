<div class="table-responsive row">
    <table class="table table-bordered table-hover" id="datatable">
        <thead class="thead-default thead-lg">
        <tr>
            <th class="no-sort">
                <input type="checkbox" onclick="checkAllCheckbox(this)">
            </th>
            <th>{{__('Group Name')}}</th>
            <th>{{__('Created On')}}</th>
            <th class="no-sort text-center">{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($usergroups))
            {{--{{dd($usergroups)}}--}}
            @foreach($usergroups as $usergroup)
                <tr>
                    <td>
                        <input name="pageCheckbox[]" value="{{$usergroup->id}}" type="checkbox" class="bulk-action">
                    </td>
                    <td>{{__($usergroup->name)}}</td>
                    <td>{{$usergroup->created_at}}</td>
                    <td class="text-center">
                        <a href="{{route('usergroups.edit', $usergroup->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('usergroups.view', $usergroup->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="confirmation" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                           data-form-id="{{ $usergroup->id }}"><i class="fa fa-trash-o"></i></a>
                        <form id="delete-form-{{$usergroup->id}}" action="{{route('usergroups.delete', $usergroup->id)}}" method="post" style="display: none;">
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
