@extends('layouts.adminca')
@section('content')
@include('partials.page_heading')

    <div class="page-content fade-in-up">
        @include('partials.flash')
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    {{__($cmsInfo['subTitle'])}} <a href="{{route('usergroups.create')}}" class="ml-3 btn btn-sm btn-primary pull-right"> <i class="fa fa-plus-circle"></i> {{__('Add')}}</a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="flexbox mb-4">
                    <div class="flexbox">
                        <label class="mb-0 mr-2">{{__("Bulk Action")}}</label>
                        <select class="selectpicker show-tick form-control mr-2" title="{{__("Bulk Action")}}" data-style="btn-solid" data-width="150px">
                            <option>{{__("Move to trash")}}</option>
                        </select>
                         <button class="btn btn-primary">{{__('Apply')}}</button>
                    </div>

                    <div class="input-group-icon input-group-icon-left mr-3">
                        <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                        <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search">
                    </div>
                </div>
                <div class="table-responsive row">
                    <table class="table table-bordered table-hover" id="datatable">
                        <thead class="thead-default thead-lg">
                            <tr>
                                <th class="no-sort">
                                    <label class="checkbox checkbox-ebony">
                                        <input type="checkbox" class="bulk-action" id="main-checkbox">
                                        <span class="input-span"></span>
                                    </label>
                                </th>
                                <th>{{__('Group Name')}}</th>
                                <th>{{__('Dashboard URL')}}</th>
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
                                    <label class="checkbox checkbox-ebony">
                                        <input name="pageCheckbox[]" value="{{$usergroup->id}}" type="checkbox" class="bulk-action">
                                        <span class="input-span"></span>
                                    </label>
                                </td>
                                <td>{{__($usergroup->group_name)}}</td>
                                <td>{{__($usergroup->dashboard_url)}}</td>
                                <td>{{$usergroup->created_at}}</td>
                                <td class="text-center">
                                    <a class="text-muted font-16 mr-1 ml-1" href="{{route('usergroups.edit', $usergroup->id)}}">
                                        <i class="ti-pencil-alt"></i>
                                    </a>
                                    <a class="text-muted font-16 mr-1 ml-1" href="{{route('usergroups.view', $usergroup->id)}}">
                                        <i class="ti-eye"></i>
                                    </a>
                                    <a class="text-muted font-16 mr-1 ml-1" data-id="{{$usergroup->id}}"  href="#" onclick="deleteAction('delete-form-{{$usergroup->id}}')">
                                        <i class="ti-trash"></i>
                                    </a>
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
            </div>

        </div>
    </div>
@endsection
@section('js')
<script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });

            $('#main-checkbox').click(function(){
               $('.bulk-action').click();
            })
        });
    </script>
@endsection
