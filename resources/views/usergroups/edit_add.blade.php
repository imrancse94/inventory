{{-- Extends Layout --}}
@extends('layouts.adminca')

{{-- Page Title --}}
@section('page-title', $cmsInfo['subTitle'])

{{-- Page Subtitle --}}
@section('page-subtitle', config('app.app_name'))

{{-- Header Extras to be Included --}}
@section('head-extras')

@endsection

@section('content')
    <?php
    $_pageTitle = (isset($addVarsForView['_pageTitle']) && !empty($addVarsForView['_pageTitle']) ? $addVarsForView['_pageTitle'] : '');
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'Add Role');
    $_listLink = route('usergroups.index');

    ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{$_pageSubtitle}}</h3>
            <div class="box-tools pull-right">
                <a href="{{ $_listLink }}" class="btn btn-sm btn-primary pull-right">
                    <i class="fa fa-list"></i> <span>List</span>
                </a>
            </div>
        </div>
        {{--@includeIf($resourceAlias.'._search')--}}

        <div class="box-body">
            <div class="ibox-body">
                <form role="form" action="{{route($dynamic_route)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group {{$errors->has('group_name') ? 'has-error':''}}">
                                    <label for="group_name">{{__('Group Name')}}</label>
                                    <input type="text" class="form-control" name="group_name" id="group_name" placeholder="{{__('Group Name')}}" value="" required/>
                                    @if($errors->has('group_name'))
                                        <label class="help-block error">{{$errors->first('group_name')}}</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <label for="">{{__('Select Users')}}</label>
                                <div class="row mb-4" id="swap-roles">
                                    <div class="col p-0 rounded border border-top-0 border-right-0 border-left-0 border-primary" style="margin: 0 15px;">
                                        <ul class="list-group list-group-bordered" id="aulist">
                                            <li class="list-group-item active flexbox"><label class="m-0 p-0">{{__('Available Users')}}</label></li>
                                            @if(!empty($users))
                                                @foreach($users as $user)
                                                    <li class="list-group-item flexbox notsel" data="{{$user->id}}">{{$user->name}}</li>
                                                @endforeach
                                            @else
                                                <li class="list-group-item flexbox">&nbsp;</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <label for="">{{__('Select Users')}}</label>
                                <div class="row mb-4" id="swap-roles">
                                    <div class="col p-0 rounded border border-top-0 border-right-0 border-left-0 border-primary" style="margin: 0 15px;">
                                        <ul class="list-group list-group-bordered" id="sulist">
                                            <li class="list-group-item active flexbox"><label class="m-0 p-0">{{__('Selected Users')}}</label></li>
                                            @if(empty($users))
                                                <li class="list-group-item flexbox">&nbsp;</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                        <a href="{{route('usergroups.index')}}" class="btn btn-primary">{{__('Back')}}</a>
                    </div>
                </form>

            </div>
        </div>
        <!-- /.box-body -->
    </div>


@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
@section('js')
    <script src="{{asset('adminca')}}/assets/js/scripts/form-plugins.js"></script>
    <script>
        $(document).on('change', '#module_id', function () {
            var selectedValue = $(this).val();
            $("#sub_module_id").html('<option value="" selected disabled>{{__("Please select")}}</option>');
            $('#loader').removeClass('d-none');
            if(selectedValue) {
                $.ajax({
                    type: "GET",
                    url: '{{url("pages/getassociation/")}}/'+selectedValue,
                    dataType: "json",
                    success: function (response) {
                        $('#loader').addClass('d-none');
                        $("#sub_module_id").html(response.submodule_content);
                    },
                    error: function (xhr, status, error) {
                        console.log('error');
                    }
                });
            }
        });

        $(document).ready(function(){
            $('#module_id').change();
        });
    </script>
@endsection
