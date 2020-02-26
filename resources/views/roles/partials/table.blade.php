<div class="table-responsive row" id="datatable">
    <table class="table table-bordered table-hover" >
        <thead class="thead-default thead-lg">
        <tr>
            <th class="no-sort">
                <input type="checkbox" onclick="checkAllCheckbox(this)">
            </th>
            <th>{{__('Title')}}</th>
            <th>{{__('Created On')}}</th>
            <th class="no-sort text-center">{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        {{--@if(!empty($roles))--}}
            {{--{{dd($roles)}}--}}
           {{-- @foreach($roles as $role)--}}
                <tr  v-for="role in roles" :key="role.id">

                    <td>
                        <input name="pageCheckbox[]" :value="role.id" type="checkbox" class="bulk-action">
                    </td>
                    <td>@{{role.title}}</td>
                    <td>@{{role.created_at}}</td>
                    <td class="text-center">
                        <a href="{{route('roles.edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        {{--<a href="{{route('roles.view')}}/@{{role.id}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="#" data-toggle="confirmation" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                           data-form-id="@{{role.id}}"><i class="fa fa-trash-o"></i></a>
                        <form id="delete-form-@{{role.id}}" id="confirm-form" action="{{route('roles.delete')}}/@{{role.id}}" method="post" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>--}}
                    </td>
                </tr>
            {{--@endforeach--}}
        {{--@endif--}}
        </tbody>

    </table>
</div>

<script>
    var app = new Vue({
        el: '#datatable',
        data: {
            roles: []
        },
        created() {
            axios
                .get('{{route('roles.index')}}')
                .then(response => {
                    this.roles = response.data.data;
                    console.log(response);
                });
        },
        methods: {
            add() {
                axios
                    .get('roles')
                    .then(response => {
                        console.log(response)

                    })
                    .catch(error => (
                        console.log(error)
                    ))
                    .finally(() => this.loading = false)
            }
        }
    })
</script>
