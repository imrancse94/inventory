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
                    {{__($cmsInfo['subTitle'])}} <a href="{{route('users.index')}}" class="ml-3 btn btn-sm btn-primary pull-right {{(isset($logger) && !empty($logger)) ? 'd-none' : ''}}"><i class="fa fa-list-ul"></i> {{__('List')}}</a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">{{__('Create User')}}</h3>--}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{$dynamic_route}}" method="post" enctype="multipart/form-data" id="edit_form">
                    @csrf
                    @if((isset($logger) && empty($logger)))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="language">{{__('Languages')}}</label>
                                    <select class="form-control select2 select_check" name="language" id="language" style="width: 100%;" required >
                                        <option value="en" {{(isset($user) && $user->language == "en") ? "selected" : ""}}>English</option>
                                        <option value="tr" {{(isset($user) && $user->language == "tr") ? "selected" : ""}}>Türkiye</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{isset($user->name) ? $user->name : ''}}" required {{$disabled}}>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{__('Email')}}</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{isset($user->email) ? $user->email : ''}}" required {{$disabled}}>
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{__('Phone')}}</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="{{__('Phone')}}" value="{{isset($user->phone) ? $user->phone : ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{__('Password')}}</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('Password')}}" autocomplete="new-password" {{$disabled}}>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{__('Confirm Password')}}</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{__('Confirm Password')}}" autocomplete="new-password" {{$disabled}}>
                                </div>
                                <div class="form-group">
                                    <label for="usergroup_id">{{__('User Group')}}</label>
                                    <select class="form-control select_check select2_demo_1" multiple="multiple" data-placeholder="Select a Usergroup" style="width: 100%;" name="usergroup_id[]" id="usergroup_id" required {{$disabled}} {{(isset($logger) && !empty($logger)) ? 'disabled' : ''}}>
                                        <option value="" >{{__('Please select')}}</option>
                                        @foreach($usergroups as $usergroup)
                                            <option value="{{$usergroup->id}}" {{(in_array($usergroup->id, $assaigned_usergroups)) ? 'selected' : ''}}>{{$usergroup->group_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="btn btn-primary file-input mr-2">
                                        <span class="btn-icon"><i class="la la-cloud-upload"></i>{{__('Profile Picture')}}</span>
                                        <input type="file" name="img_path" {{$disabled}}>
                                    </label>
                                    @if(!empty($user->img_path))
                                        <img src="{{asset($user->img_path)}}" alt="" width="100">
                                    @endif
                                    {{--<input type="file" id="exampleInputFile" name="img_path">--}}
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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
    <script>
        $('#edit_form').on('submit', function() {
            $('.select_check').prop('disabled', false);
        });
    </script>
@endsection