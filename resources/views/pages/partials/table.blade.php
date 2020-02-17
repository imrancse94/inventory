<div class="table-responsive row">
    <table class="table table-bordered table-hover" id="datatable">
        <thead class="thead-default thead-lg">
        <tr>
            <th class="no-sort">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"/>
                    </label>
                </div>

            </th>
            <th>{{__('Page Id')}}</th>
            <th>{{__('Module Name')}}</th>
            <th>{{__('Sub Module Name')}}</th>
            <th>{{__('Page Name')}}</th>
            <th>{{__('Route Name')}}</th>
            <th>{{__('Created On')}}</th>
            <th class="no-sort text-center">{{__('Action')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($pages))
            {{--{{dd($pages)}}--}}
            @foreach($pages as $page)
                <tr>
                    <td>
                        <label class="checkbox checkbox-ebony">
                            <input name="pageCheckbox[]" value="{{$page->id}}" type="checkbox" class="bulk-action">
                            <span class="input-span"></span>
                        </label>
                    </td>
                    <td>{{$page->id}}</td>
                    <td>{{__($page->modules['name'])}}</td>
                    <td>{{__($page->submodules['name'])}}</td>
                    <td>{{__($page->name)}}</td>
                    <td>{{__($page->route_name)}}</td>
                    <td>{{$page->created_at}}</td>
                    <td class="text-center">
                        <a href="{{route('pages.edit', $page->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('pages.view', $page->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                           data-form-id="{{ $page->id }}"><i class="fa fa-trash-o"></i></a>
                        <form id="delete-form-{{$page->id}}" action="{{route('pages.delete', $page->id)}}" method="post" style="display: none;">
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
