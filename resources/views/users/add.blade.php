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
    $_pageTitle = '';
    $_pageSubtitle = 'User Add';
    $_listLink = route('users.index');
    $_createLink = route('users.create');
    $search = "";
    $tableCounter = 0;

    ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $_pageSubtitle }}</h3>
        </div>
        <form action="{{route('users.create')}}" method="post">
            @csrf
            <div class="box-body no-padding">
                @include('users.user_add_form')
            </div>
            <div class="box-footer clearfix">
                <!-- Edit Button -->
                <div class="col-xs-6">
                    <div class="text-center margin-b-5 margin-t-5">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-save"></i> <span>Save</span>
                        </button>
                    </div>
                </div>
                <!-- /.col-xs-6 -->
                <div class="col-xs-6">
                    <div class="text-center margin-b-5 margin-t-5">
                        <a href="{{$_listLink}}" class="btn btn-default">
                            <i class="fa fa-ban"></i> <span>Back</span>
                        </a>
                    </div>
                </div>
                <!-- /.col-xs-6 -->
            </div>
        </form>
    </div>

@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
