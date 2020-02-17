{{--{{dd($settings)}}--}}

@extends('layouts.adminca')
@section('content')
    @include('partials.page_heading')

    <div class="page-content fade-in-up">
        @include('partials.flash')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    {{__($cmsInfo['subModuleTitle'])}}
                </div>
            </div>
            <div class="ibox-body">

                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route($dynamic_route)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">{{__('Page Title')}}</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="{{__('Page Title')}}" value="{{isset($settings->title) ? $settings->title : ''}}" >
                                </div>
                                <div class="form-group">
                                    <label class="btn btn-primary file-input mr-2">
                                        <span class="btn-icon"><i class="la la-cloud-upload"></i>{{__('Logo Path')}}</span>
                                        <input type="file" name="logo_path" >
                                    </label>
                                    @if(isset($settings->logo_path) && !empty($settings->logo_path))
                                        <img src="{{asset($settings->logo_path)}}" alt="" width="100">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Admin Name')}}</label>
                                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder="{{__('Admin Name')}}" value="{{isset($settings->admin_name) ? $settings->admin_name : ''}}" >
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Admin Phone')}}</label>
                                    <input type="phone" class="form-control" name="admin_phone" id="admin_phone" placeholder="{{__('Admin Phone')}}" value="{{isset($settings->admin_phone) ? $settings->admin_phone : ''}}" >
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Company Address')}}</label>
                                    <input type="text" class="form-control" name="company_address" id="company_address" placeholder="{{__('Company Address')}}" value="{{isset($settings->company_address) ? $settings->company_address : ''}}" >
                                </div>
                                <div class="form-group">
                                    <label class="btn btn-primary file-input mr-2">
                                        <span class="btn-icon"><i class="la la-cloud-upload"></i>{{__('Favicon Path')}}</span>
                                        <input type="file" name="favicon_path" >
                                    </label>
                                    @if(!empty($settings->favicon_path))
                                        <img src="{{asset($settings->favicon_path)}}" alt="" width="100">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Footer')}}</label>
                                    <input type="text" class="form-control" name="footer" id="footer" placeholder="{{__('Footer')}}" value="{{isset($settings->footer) ? $settings->footer : ''}}">
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                @if($isEdit)
                                    <input type="hidden" name="id" value="{{isset($settings->id) ? $settings->id:''}}">
                                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                @endif
                                <a href="{{route('modules.index')}}" class="btn btn-primary">{{__('Back')}}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('adminca')}}/assets/js/scripts/form-plugins.js"></script>
    {{--<script>
        $('.select2').select2()
    </script>--}}
@endsection
