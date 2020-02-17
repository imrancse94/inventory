{{-- Extends Layout --}}
@extends('layouts.adminca')

{{-- Breadcrumbs --}}


{{-- Page Title --}}
@section('page-title', 'Dashboard')

{{-- Page Subtitle --}}
@section('page-subtitle', config('app.app_name'))

{{-- Header Extras to be Included --}}
@section('head-extras')

@endsection

@section('content')

    <!-- Small boxes (Stat box) -->
    <div class="row">
    </div>
    <!-- /.row -->

@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
