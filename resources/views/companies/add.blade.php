{{--@extends('layouts.adminca')
@section('content')

    @include('partials.page_heading')
    <div class="page-content fade-in-up">
        @include('partials.flash')
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">
                    {{__('Register Company')}} <a href="{{route('companies.index')}}" class="ml-3 btn btn-sm btn-primary pull-right"><i class="fa fa-life-ring"></i> {{__('List')}}</a>
                </div>
            </div>
            <div class="ibox-body">
                <div class="box-header with-border">
<h3 class="box-title">{{__('Create User')}}</h3>

                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
<div class="ibox-head">

<div class="ibox-title">Base Form Controls</div>

</div>

                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="name">{{__('Company Name')}}</label>
                                        <input name="name" id="name" class="form-control" type="text" placeholder="{{__('Company Name')}}" value="{{ old('name') }}" required>
                                        @if($errors->has('name'))
                                            <label class="help-block error">{{__($errors->first('name'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone">{{__('Phone')}}</label>
                                        <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone" value="{{ old('phone') }}" required>
                                        @if($errors->has('phone'))
                                            <label class="help-block error">{{__($errors->first('phone'))}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>{{__('Address 1')}}</label>
                                        <textarea name="address1" id="address1"  class="form-control" rows="2" placeholder="{{__('Address 1')}}" required>{{ old('address1') }}</textarea>
                                        @if($errors->has('address1'))
                                            <label class="help-block error">{{__($errors->first('address1'))}}</label>
                                        @endif
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="fax">{{__('Fax')}}</label>
                                        <input name="fax" id="fax" class="form-control" type="text" placeholder="{{__('Fax')}}" value="{{ old('fax') }}">
                                        @if($errors->has('fax'))
                                            <label class="help-block error">{{__($errors->first('fax'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('Country')}}</label>
                                        <select name="country" id="country" class="form-control" required value="{{ old('country') }}">
                                            <option></option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country'))
                                            <label class="help-block error">{{__($errors->first('country'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="state">{{__('State')}}</label>
                                        <input name="state" id="state" class="form-control" type="text" placeholder="{{__('State')}}" value="{{ old('state') }}" required>
                                        @if($errors->has('state'))
                                            <label class="help-block error">{{__($errors->first('state'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city">{{__('City')}}</label>
                                        <input name="city" id="city" class="form-control" type="text" placeholder="{{__('City')}}" value="{{ old('city') }}" required>
                                        @if($errors->has('city'))
                                            <label class="help-block error">{{__($errors->first('city'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('PhoTimeZonene')}}</label>
                                        <select name="timezone" id="timezone" class="form-control" required value="{{ old('timezone') }}" >
                                            <option></option>
                                            @foreach($timezones as $timezone)
                                                <option value="{{$timezone->id}}">{{'['.$timezone->utc_offset.'] '.$timezone->time_zone}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('timezone'))
                                            <label class="help-block error">{{__($errors->first('timezone'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="Postcode">{{__('Post Code')}}</label>
                                        <input name="postcode" id="postcode" class="form-control" type="text" placeholder="{{__('Post Code')}}" value="{{ old('postcode') }}" required>
                                        @if($errors->has('postcode'))
                                            <label class="help-block error">{{__($errors->first('postcode'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="logo">{{__('Logo')}} </label><br>
<input name="logo" id="logo" class="form-control" type="file" placeholder="Logo" >

                                        <label class="btn btn-info file-input mr-2">
                                            <span class="btn-icon"><i class="la la-upload"></i>{{__('Browse file')}}</span>
                                            <input name="logo" id="logo" class="form-control" type="file" placeholder="{{__('Logo')}}" value="{{ old('logo') }}" required>
                                        </label>
                                        @if($errors->has('logo'))
                                            <label class="help-block error">{{__($errors->first('logo'))}}</label>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
<div class="ibox-head">

<div class="ibox-title">Line Style Controls</div>

</div>

                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="cname">{{__('Contact Name')}}</label>
                                        <input name="cname" id="cname" class="form-control" type="text" placeholder="{{__('Contact Name')}}" value="{{ old('cname') }}" required>
                                        @if($errors->has('cname'))
                                            <label class="help-block error">{{__($errors->first('cname'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('Contact Email')}}</label>
                                        <input name="cemail" id="cemail" class="form-control" type="text" placeholder="{{__('Contact Email')}}" value="{{ old('cemail') }}" required>
                                        @if($errors->has('cemail'))
                                            <label class="help-block error">{{__($errors->first('cemail'))}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>{{__('Address 2')}}</label>
                                        <textarea name="address2" id="address2"  class="form-control" rows="2" placeholder="{{__('Address 2')}}" >{{ old('address2') }}</textarea>

                                        @if($errors->has('address2'))
                                            <label class="help-block error">{{__($errors->first('address2'))}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="registration_no">{{__('Registration No')}}</label>
                                        <input name="registration_no" id="registration_no" class="form-control" type="text" placeholder=" {{__('Registration No')}}" value="{{ old('registration_no') }}" >

                                        @if($errors->has('registration_no'))
                                            <label class="help-block error">{{__($errors->first('registration_no'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="tax_no">{{__('Tax No')}}</label>
                                        <input name="tax_no" id="registration_no" class="form-control" type="text" placeholder="{{__('Tax No')}}" value="{{ old('tax_no') }}" >
                                        @if($errors->has('tax_no'))
                                            <label class="help-block error">{{__($errors->first('tax_no'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="tax_no">{{__('No of Employees')}}</label>
                                        <input name="no_of_employees" id="no_of_employees" class="form-control" type="text" placeholder="{{__('No of Employees')}}" value="{{ old('no_of_employees') }}">
                                        @if($errors->has('no_of_employees'))
                                            <label class="help-block error">{{__($errors->first('no_of_employees'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="cmmi_level">{{__('CMMI Level')}}</label>
                                        <input name="cmmi_level" id="cmmi_level" class="form-control" type="text" placeholder="{{__('CMMI Level')}}" value="{{ old('cmmi_level') }}">
                                        @if($errors->has('cmmi_level'))
                                            <label class="help-block error">{{__($errors->first('cmmi_level'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="yearly_revenue">{{__('Yearly Revenue')}}</label>
                                        <input name="yearly_revenue" id="yearly_revenue" class="form-control" type="text" placeholder="{{__('Yearly Revenue')}}" value="{{ old('yearly_revenue') }}" >

                                        @if($errors->has('yearly_revenue'))
                                            <label class="help-block error">{{__($errors->first('yearly_revenue'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="hourly_rate">{{__('Hourly Rate')}}</label>
                                        <input name="hourly_rate" id="hourly_rate" class="form-control" type="text" placeholder="{{__('Hourly Rate')}}" value="{{ old('hourly_rate') }}" >

                                        @if($errors->has('hourly_rate'))
                                            <label class="help-block error">{{__($errors->first('hourly_rate'))}}</label>
                                        @endif
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="Postcode">{{__('Username')}}</label>
                                        <input name="username" id="username" class="form-control" type="text" placeholder="{{__('User Name')}}" value="{{ old('username') }}"required>
                                        @if($errors->has('username'))
                                            <label class="help-block error">{{__($errors->first('username'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="user_email">{{__('User Email')}}</label>
                                        <input name="email" id="email" class="form-control" type="text" placeholder="{{__('User Email')}}" value="{{ old('email') }}" required>
                                        @if($errors->has('email'))
                                            <label class="help-block error">{{__($errors->first('email'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="user_email">{{__('User Phone')}}</label>
                                        <input name="user_phone" id="user_phone" class="form-control" type="text" placeholder="{{__('User Phone')}}" value="{{ old('user_phone') }}" >
                                        @if($errors->has('user_phone'))
                                            <label class="help-block error">{{__($errors->first('user_phone'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('Language')}}</label>
                                        <select name="language" id="language" class="form-control" value="{{ old('language') }}">
                                            <option value="en">{{__('English')}}</option>
                                            <option value="tr">{{__('Turkey')}}</option>
                                        </select>
                                        @if($errors->has('language'))
                                            <label class="help-block error">{{__($errors->first('language'))}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="password">{{__('Password')}}</label>
                                        <input name="password" id="password" class="form-control" type="password" placeholder="{{__('Password')}}"  required>
                                        @if($errors->has('password'))
                                            <label class="help-block error">{{__($errors->first('password'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="confirm_password">{{__('Confirm Password')}}</label>
                                        <input name="confirm_password" id="confirm_password" class="form-control" type="password" placeholder="{{__('Confirm Password')}}" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="profile">{{__('Profile')}} </label><br>
<input name="logo" id="logo" class="form-control" type="file" placeholder="Logo" >

                                        <label class="btn btn-info file-input mr-2">
                                            <span class="btn-icon"><i class="la la-upload"></i>{{__('Browse file')}}</span>
                                            <input name="profile" id="profile" class="form-control" type="file" placeholder="{{__('Profile')}}" value="{{ old('profile') }}" required>
                                        </label>

                                        @if($errors->has('profile'))
                                            <label class="help-block error">{{__($errors->first('profile'))}}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Save" class="btn btn-success">
                            <input type="button" value="Clear" class="btn btn-default">
                        </div>

                    </div>
                </form>

            </div>
            <!-- /.box -->
        </div>
    </div>






@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #e3e2e2;
            border-radius: 0px;
        }
        .select2-container .select2-selection--single {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            height: 37px;
            user-select: none;
            -webkit-user-select: none;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 20px;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            display: block;
            padding-left: 16px;
            padding-right: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 18px;
            right: 1px;
            width: 20px;
        }
        .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            top: 54%;
            right: 2rem;
            font-family: themify;
            speak: none;
            font-style: normal;
            display: inline-block;
            font-family: LineAwesome;
            text-decoration: inherit;
            text-rendering: optimizeLegibility;
            text-transform: none;
            font-weight: 400;
            line-height: 0;
            margin-right: 5px;
            font-size: 0;
        }
        .required:after{
            content:"*";
            font-weight:bold;
            color:red;
        }
    </style>
@endsection
@section('js')
    <script src="{{asset('adminca')}}/assets/js/scripts/form-plugins.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
        $('.select2').select2()
    </script>

    <script>
        $(document).ready(function() {
            $('#country').select2({
                placeholder: "Select a Country",
                allowClear: true
            });
            $('#timezone').select2({
                placeholder: "Select Timezone",
                allowClear: true
            });
        });
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
        $("input[required]").siblings("label").addClass("required");
        $("textarea[required]").siblings("label").addClass("required");
        $("select[required]").siblings("label").addClass("required");
        $("input[required]").parent().siblings("label").addClass("required");
    </script>
@endsection--}}
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
    $_pageSubtitle = (isset($addVarsForView['_pageSubtitle']) && !empty($addVarsForView['_pageSubtitle']) ? $addVarsForView['_pageSubtitle'] : 'Add Company');
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
                                    <div class="form-group mb-4">
                                        <label for="name">{{__('Company Name')}}</label>
                                        <input name="name" id="name" class="form-control" type="text" placeholder="{{__('Company Name')}}" value="{{ old('name') }}" required>
                                        @if($errors->has('name'))
                                            <label class="help-block error">{{__($errors->first('name'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone">{{__('Email')}}</label>
                                        <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone" value="{{ old('phone') }}" required>
                                        @if($errors->has('email'))
                                            <label class="help-block error">{{__($errors->first('email'))}}</label>
                                        @endif
                                    </div>

                                   {{-- <div class="form-group mb-4">
                                        <label>{{__('Address 1')}}</label>
                                        <textarea name="address1" id="address1"  class="form-control" rows="2" placeholder="{{__('Address 1')}}" required>{{ old('address1') }}</textarea>
                                        @if($errors->has('address1'))
                                            <label class="help-block error">{{__($errors->first('address1'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="fax">{{__('Fax')}}</label>
                                        <input name="fax" id="fax" class="form-control" type="text" placeholder="{{__('Fax')}}" value="{{ old('fax') }}">
                                        @if($errors->has('fax'))
                                            <label class="help-block error">{{__($errors->first('fax'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('Country')}}</label>
                                        <select name="country" id="country" class="form-control" required value="{{ old('country') }}">
                                            <option></option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country'))
                                            <label class="help-block error">{{__($errors->first('country'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="state">{{__('State')}}</label>
                                        <input name="state" id="state" class="form-control" type="text" placeholder="{{__('State')}}" value="{{ old('state') }}" required>
                                        @if($errors->has('state'))
                                            <label class="help-block error">{{__($errors->first('state'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city">{{__('City')}}</label>
                                        <input name="city" id="city" class="form-control" type="text" placeholder="{{__('City')}}" value="{{ old('city') }}" required>
                                        @if($errors->has('city'))
                                            <label class="help-block error">{{__($errors->first('city'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>{{__('PhoTimeZonene')}}</label>
                                        <select name="timezone" id="timezone" class="form-control" required value="{{ old('timezone') }}" >
                                            <option></option>
                                            @foreach($timezones as $timezone)
                                                <option value="{{$timezone->id}}">{{'['.$timezone->utc_offset.'] '.$timezone->time_zone}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('timezone'))
                                            <label class="help-block error">{{__($errors->first('timezone'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="Postcode">{{__('Post Code')}}</label>
                                        <input name="postcode" id="postcode" class="form-control" type="text" placeholder="{{__('Post Code')}}" value="{{ old('postcode') }}" required>
                                        @if($errors->has('postcode'))
                                            <label class="help-block error">{{__($errors->first('postcode'))}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="logo">{{__('Logo')}} </label><br>
                                        <input name="logo" id="logo" class="form-control" type="file" placeholder="Logo" >
                                        @if($errors->has('logo'))
                                            <label class="help-block error">{{__($errors->first('logo'))}}</label>
                                        @endif
                                    </div>--}}

                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="{{__('Save')}}" class="btn btn-primary">
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
