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
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'Edit Role');
    $_listLink = route('roles.edit');

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
                <form role="form" action="{{route($dynamic_route,$role->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group {{$errors->has('title') ? 'has-error':''}}">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Title')}}" value="{{$role->title}}" {{$isEdit ? 'required' : 'readonly'}}/>
                                    @if($errors->has('title'))
                                        <label class="help-block error">{{$errors->first('title')}}</label>
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                @if($isEdit)
                                    <input type="hidden" name="id" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                @endif
                                <a href="{{route('roles.index')}}" class="btn btn-default">{{__('Back')}}</a>
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
