<div class="table-responsive row">

    <table class="table table-bordered table-hover" id="products-table">
        <thead class="thead-default thead-lg">
        <tr>
            <th>{{__('NO')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('email')}}</th>
            <th>{{__('Created At')}}</th>
            <th>{{__('Last Update')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1 ?>
        @foreach($companies as $company)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->created_at}}</td>
                <td>{{$company->updated_at}}</td>
                <td class="text-center">
                    <a href="{{route('companies.edit', $company->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{route('companies.view', $company->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                       data-form-id="{{ $company->id }}"><i class="fa fa-trash-o"></i></a>
                    <form id="delete-form-{{$company->id}}" action="{{route('companies.delete', $company->id)}}" method="post" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>

            </tr>
        @endforeach


        </tbody>
    </table>

</div>
