<div class="table-responsive list-records">
    <table class="table table-hover table-bordered">
        <thead>
            <!--<th style="width: 10px;"><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>-->
            <th>{{__('Id')}}</th>
            <th>{{__('Name')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Status')}}</th>
            <th>{{__('Created On')}}</th>
            <th>{{__('Update On')}}</th>
            <th style="width: 120px;">Actions</th>
        </thead>
        <tbody>
        <?php $tableCounter = 0; ?>
        @foreach ($records as $record)
            <?php
            $tableCounter++;
            $editLink = route($resourceRoutesAlias.'.edit', $record->id);
            $deleteLink = route($resourceRoutesAlias.'.delete', $record->id);
            $formId = 'formDeleteModel_'.$record->id;
            $formIdImpersonate = 'impersonateForm_'.$record->id;

            $canUpdate = true;
            $canDelete = true;
            $canImpersonate = true;
            ?>
            <tr>
            <!--<td><input type="checkbox" name="ids[]" value="{{ $record->id }}" class="square-blue"></td>-->
                <td>{{ $tableCounter }}</td>
                <td class="table-text">
                    <a href="{{ $editLink }}">{{ $record->name }}</a>
                </td>
                <td class="table-text">
                    <a href="{{ $editLink }}">{{ $record->email }}</a>
                </td>
                <td>{{ $record->status }}</td>
                <td>{{ $record->created_at }}</td>
                <td>{{ $record->updated_at }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <div class="btn-group">
                        @if ($canUpdate)
                            <a href="{{ $editLink }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endif
                        @if ($canDelete)
                            <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                               data-form-id="{{ $formId }}"><i class="fa fa-trash-o"></i></a>
                        @endif
                    </div>
                    @if ($canDelete)
                        <!-- Delete Record Form -->
                        <form id="{{ $formId }}" action="{{ $deleteLink }}" method="POST"
                              style="display: none;" class="hidden form-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
