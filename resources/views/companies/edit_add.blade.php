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
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'Edit Company');
    $_listLink = route('companies.index');

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
                <form role="form" action="{{route('companies.create')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-body">
                                    <div class="form-group mb-4 {{$errors->has('name') ? 'has-error':''}}">
                                        <label for="name">{{__('Company Name')}}</label>
                                        <input {{$isView ? 'disabled':''}} name="name" id="name" class="form-control" type="text" placeholder="{{__('Company Name')}}" value="{{ $a_company->name }}" required>
                                        @if($errors->has('name'))
                                            <label class="help-block error">{{__($errors->first('name'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4 {{$errors->has('email') ? 'has-error':''}}">
                                        <label for="phone">{{__('Email')}}</label>
                                        <input {{$isView ? 'disabled':''}} name="email" id="phone" class="form-control" type="text" placeholder="Email" value="{{ $a_company->email }}" required>
                                        @if($errors->has('email'))
                                            <label class="help-block error">{{__($errors->first('email'))}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4 {{$errors->has('password') ? 'has-error':''}}">
                                        <label>{{__('Password')}}</label>
                                        <input {{$isView ? 'disabled':''}} type="password" name="password" id="address1" value=""  class="form-control"  placeholder="{{__('Password')}}" required />
                                        @if($errors->has('password'))
                                            <label class="help-block error">{{__($errors->first('password'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4 {{$errors->has('c_password') ? 'has-error':''}}">
                                        <label>{{__('Confirm Password')}}</label>
                                        <input {{$isView ? 'disabled':''}} type="password" name="c_password" id="address1" value="" class="form-control" placeholder="{{__('Confirm Password')}}" required />
                                        @if($errors->has('c_password'))
                                            <label class="help-block error">{{__($errors->first('c_password'))}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @if(!$isView)
                            <input type="submit" value="{{__('Save')}}" class="btn btn-primary">
                            @endif
                            <a type="button" href="{{$_listLink}}" class="btn btn-default">{{__('Back')}}</a>
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
