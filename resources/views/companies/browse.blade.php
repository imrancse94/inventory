@extends('layouts.adminca')
@section('content')
    @include('partials.page_heading')
    <div class="page-content fade-in-up">
        @include('partials.flash')
        <div class="ibox">
            <div class="ibox-head">

                <div class="ibox-title">
                    {{__('Register Company')}} <a href="{{route('companies.create')}}" class="ml-3 btn btn-sm btn-primary pull-right"><i class="fa fa-plus-circle"></i> {{__('Add Company')}}</a>
                </div>

            </div>
            {{--<div class="ibox-head">--}}
            {{--<div class="ibox-title">--}}
            {{--{{__('COMPANY LIST')}} <a class="btn btn-rounded btn-primary btn-air" href="{{route('companies.create')}}">Add Company</a>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="ibox-body">
                {{--<h5 class="font-strong mb-4">COMPANY LIST</h5>--}}
                {{--<div class="flexbox mb-4">--}}
                {{--<div class="flexbox">--}}
                {{--<label class="mb-0 mr-2">Type:</label>--}}
                {{--<select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">--}}
                {{--<option value="">All</option>--}}
                {{--<optgroup label="Electronics">--}}
                {{--<option>TV & Video</option>--}}
                {{--<option>Cameras & Photo</option>--}}
                {{--<option>Computers & Tablets</option>--}}
                {{--</optgroup>--}}
                {{--<optgroup label="Fashion">--}}
                {{--<option>Health & Beauty</option>--}}
                {{--<option>Shoes</option>--}}
                {{--<option>Handbags & Purses</option>--}}
                {{--<option>Jewelry and Watches</option>--}}
                {{--</optgroup>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--@include('partials.flash')--}}
                {{--<div class="flexbox">--}}
                {{--<div class="input-group-icon input-group-icon-left mr-3">--}}
                {{--<span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>--}}
                {{--<input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">--}}
                {{--</div>--}}
                {{--<a class="btn btn-rounded btn-primary btn-air" href="{{route('companies.create')}}">Add Company</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                @if(isset($companies))
                    <div class="table-responsive row">

                        <table class="table table-bordered table-hover" id="products-table">
                            <thead class="thead-default thead-lg">
                            <tr>
                                <th>{{__('NO')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('email')}}</th>
                                <th>{{__('phone')}}</th>
                                <th>{{__('Address')}}</th>
                                <th>{{__('Last Update')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1 ?>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->cemail}}</td>
                                    <td>{{$company->phone}}</td>
                                    <td>{{$company->address1}}</td>
                                    <td>{{$company->updated_at}}</td>
                                    <td align="center">
                                        <a id="view-icon" href="{{route('companies.view', $company->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp; &nbsp;
                                        <a id="edit-icon" href="{{route('companies.edit', $company->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                        <form id="delete-form" method="POST" action="{{route('companies.delete', $company->id)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <button class="delete" data-toggle="confirmation" data-title="Are you sure?" data-placement="top" type="submit" style="border: 0; background: none;" ><i class="fa fa-trash " ></i></button>

                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>

                    </div>
                @else
                    <div class="content">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-hover" id="">
                                            <tbody>
                                            <tr>
                                                <td><label><b>{{__('Company Name:')}} </b></label></td>
                                                <td>{{$a_company->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><label><b>{{__('Contact Email:')}}</b></label></td>
                                                <td>{{$a_company->cemail}}</td>
                                            </tr>
                                            <tr>
                                                <td><label><b>{{__('Contact Email:')}}Registration No: </b></label></td>
                                                <td>{{$a_company->registration_no}}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-hover" id="">
                                            <tbody>
                                            <tr>
                                                <td><label><b>{{__('Contact Email:')}}Company Name: </b></label></td>
                                                <td>{{$a_company->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><label><b>{{__('Contact Email:')}}Contact Email: </b></label></td>
                                                <td>{{$a_company->cemail}}</td>
                                            </tr>
                                            <tr>
                                                <td><label><b>{{__('Contact Email:')}}Registration No: </b></label></td>
                                                <td>{{$a_company->registration_no}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <img style="height: 150px;" src="{!! asset($a_company->logo) !!}" width="100%" class="img-thumbnail">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <table class="table table-bordered table-hover" id="">
                                    <tbody>
                                    <tr>
                                        <td><label><b>{{__('Contact Email:')}}Address1: </b></label></td>
                                        <td>{{$a_company->tax_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><label><b>{{__('Contact Email:')}}Contact Email: </b></label></td>
                                        <td>{{$a_company->cemail}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <table class="table table-bordered table-hover" id="">
                                    <tbody>
                                    <tr>
                                        <td><label><b>{{__('Contact Email:')}}Tax No: </b></label></td>
                                        <td>{{$a_company->tax_no}}</td>
                                    </tr>
                                    <tr>
                                        <td><label><b>{{__('Contact Email:')}}Contact Email: </b></label></td>
                                        <td>{{$a_company->cemail}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Address 1:</label>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Address 2:</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Company Name:</label>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Name:</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Address 1:</label>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Address 2:</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Company Name:</label>
                                </div>
                                <div class="form-group">
                                    <label>{{__('Contact Email:')}}Name:</label>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        #delete-form{display: inline-block;}
        #view-icon{display: inline-block;}
        #edit-icon{display: inline-block;}
    </style>
@endsection
@section('js')
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
// other options
        });
        $(document).ready(function () {
            $('div.alert').delay(1500);
            $('div.alert').hide(1000);
        });
        $(function () {
            $('#example1').DataTable()
            /*$('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })*/
        });

    </script>
@endsection
