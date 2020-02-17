{{--
@extends('layouts.adminca')
@section('content')
@include('partials.page_heading')

    <div class="page-content fade-in-up">
        @include('partials.flash')
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    {{__($cmsInfo['subTitle'])}} <a href="{{route('pages.create')}}" class="ml-3 btn btn-sm btn-primary pull-right"> <i class="fa fa-plus-circle"></i> {{__('Add')}}</a>
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
--}}

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
    $users = $pages;
    $_pageTitle = (isset($addVarsForView['_pageTitle']) && !empty($addVarsForView['_pageTitle']) ? $addVarsForView['_pageTitle'] : '');
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'List');
    $_listLink = route('users.index');
    $_createLink = route('users.create');
    $search = "";
    $tableCounter = 0;
    $total = 0;
    if (count($users) > 0) {
        $total = $users->total();
        $tableCounter = ($users->currentPage() - 1) * $users->perPage();
        $tableCounter = $tableCounter > 0 ? $tableCounter : 0;
    }
    ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $_pageSubtitle }}</h3>
            @include('common.search')
        </div>
        {{--@includeIf($resourceAlias.'._search')--}}

        <div class="box-body no-padding">

            @if (count($users) > 0)
                @include('pages.partials.table')
                <div class="padding-5">
                    <span class="text-green padding-l-5">Total: {{ $total }} items.</span>&nbsp;
                </div>

            @else
                <p class="margin-l-5 lead text-green">No records found.</p>
            @endif

        </div>
        <!-- /.box-body -->
        @if (count($users) > 0)
            @include('common.paginate', ['records' => $users])
        @endif

    </div>


@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection

