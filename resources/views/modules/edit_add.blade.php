{{-- Extends Layout --}}
@extends('layouts.adminca')

{{-- Breadcrumbs --}}


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
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'ADD');
    $_listLink = route('modules.index');

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

        <div class="box-body no-padding">
            <div class="ibox-body">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route($dynamic_route)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group {{$errors->has('module_id') ? 'has-error':''}}">
                                    <label for="name">{{__('Module Id')}}</label>
                                    <input type="text" class="form-control" name="module_id" id="name" placeholder="{{__('Module Id')}}" value="{{isset($user->name) ? $user->name : ''}}" required/>
                                    @if($errors->has('module_id'))
                                        <label class="help-block error">{{$errors->first('module_id')}}</label>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('module_name') ? 'has-error':''}}">
                                    <label for="email">{{__('Module Name')}}</label>
                                    <input type="text" class="form-control" name="module_name" id="email" placeholder="{{__('Module Name')}}" value="{{isset($user->email) ? $user->email : ''}}" required/>
                                    @if($errors->has('module_name'))
                                        <label class="help-block error">{{$errors->first('module_name')}}</label>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('module_icon') ? 'has-error':''}}">
                                    <label for="password">{{__('Module Icon')}}</label>
                                    <input type="text" class="form-control" name="module_icon" id="password" placeholder="{{__('Module Icon')}}" required>
                                    @if($errors->has('module_icon'))
                                        <label class="help-block error">{{$errors->first('module_icon')}}</label>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('sequence') ? 'has-error':''}}">
                                    <label for="sequence">{{__('Sequence')}}</label>
                                    <input type="text" class="form-control" name="sequence" id="password_confirmation" placeholder="{{__('Sequence')}}" required>
                                    @if($errors->has('sequence'))
                                        <label class="help-block error">{{$errors->first('sequence')}}</label>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                <a href="{{route('modules.index')}}" class="btn btn-primary">{{__('Back')}}</a>
                            </div>
                        </div>
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
