{{--{{dd($page)}}--}}
@extends('layouts.adminca')
@section('content')
@include('partials.page_heading')

    <div class="page-content fade-in-up">
        @include('partials.flash')
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    {{__($cmsInfo['subTitle'])}} <a href="{{route('roles.index')}}" class="ml-3 btn btn-sm btn-primary pull-right"><i class="fa fa-list-ul"></i> {{__('List')}}</a>
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
                                    <a href="{{route('roles.index')}}" class="btn btn-primary">{{__('Back')}}</a>
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