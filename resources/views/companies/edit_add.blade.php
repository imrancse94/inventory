@extends('layouts.adminca')
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
                    {{--<h3 class="box-title">{{__('Create User')}}</h3>--}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{url('companies/'.$a_company->id)}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="ibox">
                                {{--<div class="ibox-head">--}}
                                {{--<div class="ibox-title">Base Form Controls</div>--}}
                                {{--</div>--}}
                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="name">Company Name</label>
                                        <input name="name" id="name" class="form-control" type="text" placeholder="Company Name" value="{{ $a_company->name }}" required>
                                        @if($errors->has('name'))
                                            <label class="help-block error">{{$errors->first('name')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone">Phone</label>
                                        <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone" value="{{ $a_company->phone }}" required>
                                        @if($errors->has('phone'))
                                            <label class="help-block error">{{$errors->first('phone')}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Address 1</label>
                                        <textarea name="address1" id="address1"  class="form-control" rows="2"  required>{{ $a_company->address1 }}</textarea>
                                        @if($errors->has('address1'))
                                            <label class="help-block error">{{$errors->first('address1')}}</label>
                                        @endif
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="fax">Fax</label>
                                        <input name="fax" id="fax" class="form-control" type="text" placeholder="Fax" value="{{ $a_company->fax }}">
                                        @if($errors->has('fax'))
                                            <label class="help-block error">{{$errors->first('fax')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Country</label>
                                        <select name="country" id="country" class="form-control" required value="{{ old('country') }}">
                                            <option></option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->country_code}} " {{($country->country_code == $a_company->country)? 'selected':''}}>{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('country'))
                                            <label class="help-block error">{{$errors->first('country')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="state">State</label>
                                        <input name="state" id="state" class="form-control" type="text" placeholder="State" value="{{ $a_company->state }}" required>
                                        @if($errors->has('state'))
                                            <label class="help-block error">{{$errors->first('state')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city">City</label>
                                        <input name="city" id="city" class="form-control" type="text" placeholder="City" value="{{ $a_company->city }}" required>
                                        @if($errors->has('city'))
                                            <label class="help-block error">{{$errors->first('city')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>TimeZone</label>
                                        <select name="timezone" id="timezone" class="form-control" required value="{{ $a_company->timezone }}" >
                                            <option></option>
                                            @foreach($timezones as $timezone)
                                                <option value="{{$timezone->id}}"{{($timezone->id == $a_company->timezone)? 'selected':''}}>{{'['.$timezone->utc_offset.'] '.$timezone->time_zone}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('timezone'))
                                            <label class="help-block error">{{$errors->first('timezone')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="Postcode">Post Code</label>
                                        <input name="postcode" id="postcode" class="form-control" type="text" placeholder="Post Code" value="{{ $a_company->postcode }}" required>
                                        @if($errors->has('postcode'))
                                            <label class="help-block error">{{$errors->first('postcode')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="logo">Logo: </label><br>
                                        {{--<input name="logo" id="logo" class="form-control" type="file" placeholder="Logo" >--}}
                                        <label class="btn btn-info file-input mr-2">
                                            <span class="btn-icon"><i class="la la-upload"></i>Browse file</span>
                                            <input name="logo" id="logo" class="form-control" type="file" placeholder="Logo" value="{{ old('logo') }}" >
                                        </label>
                                        @if($errors->has('logo'))
                                            <label class="help-block error">{{$errors->first('logo')}}</label>
                                        @endif
                                        <img src="{!! asset($a_company->logo) !!}" width="80px" class="img-thumbnail">
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="ibox">
                                {{--<div class="ibox-head">--}}
                                {{--<div class="ibox-title">Line Style Controls</div>--}}
                                {{--</div>--}}
                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label for="cname">Contact Name</label>
                                        <input name="cname" id="cname" class="form-control" type="text" placeholder="Contact Name" value="{{ $a_company->cname }}" required>
                                        @if($errors->has('cname'))
                                            <label class="help-block error">{{$errors->first('cname')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Contact Email</label>
                                        <input name="cemail" id="cemail" class="form-control" type="text" placeholder="Contact Email" value="{{ $a_company->cemail }}" required>
                                        @if($errors->has('cemail'))
                                            <label class="help-block error">{{$errors->first('cemail')}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Address 2</label>
                                        <textarea name="address2" id="address2"  class="form-control" rows="2" >{{ $a_company->address2 }}</textarea>
                                        @if($errors->has('address2'))
                                            <label class="help-block error">{{$errors->first('address2')}}</label>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="registration_no">Registration No</label>
                                        <input name="registration_no" id="registration_no" class="form-control" type="text" placeholder="Registration No" value="{{ $a_company->registration_no }}" >
                                        @if($errors->has('registration_no'))
                                            <label class="help-block error">{{$errors->first('registration_no')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="tax_no">Tax No</label>
                                        <input name="tax_no" id="tax_no" class="form-control" type="text" placeholder="Tax No" value="{{$a_company->tax_no }}" >
                                        @if($errors->has('tax_no'))
                                            <label class="help-block error">{{$errors->first('tax_no')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="tax_no">No of Employees</label>
                                        <input name="no_of_employees" id="no_of_employees" class="form-control" type="text" placeholder="No of Employees" value="{{ $a_company->no_of_employees }}">
                                        @if($errors->has('no_of_employees'))
                                            <label class="help-block error">{{$errors->first('no_of_employees')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="cmmi_level">CMMI Level</label>
                                        <input name="cmmi_level" id="cmmi_level" class="form-control" type="text" placeholder="CMMI Level" value="{{ $a_company->cmmi_level }}">
                                        @if($errors->has('cmmi_level'))
                                            <label class="help-block error">{{$errors->first('cmmi_level')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="yearly_revenue">Yearly Revenue</label>
                                        <input name="yearly_revenue" id="yearly_revenue" class="form-control" type="text" placeholder="Yearly Revenue" value="{{ $a_company->yearly_revenue }}" >
                                        @if($errors->has('yearly_revenue'))
                                            <label class="help-block error">{{$errors->first('yearly_revenue')}}</label>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="hourly_rate">Hourly Rate</label>
                                        <input name="hourly_rate" id="hourly_rate" class="form-control" type="text" placeholder="Hourly Rate" value="{{ $a_company->hourly_rate }}" >
                                        @if($errors->has('hourly_rate'))
                                            <label class="help-block error">{{$errors->first('hourly_rate')}}</label>
                                        @endif
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Update" class="btn btn-primary">
                            <a href="{{route('companies.index')}}"  class="btn btn-success">Back</a>
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
    {{--<script>
        $('.select2').select2()
    </script>--}}
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
    </script>
@endsection