@extends('layouts.app')

@section('content')

    <form class="ibox-body" id="login-form" action="{{ route('password.request') }}" method="POST">
        @csrf
        <h4 class="font-strong text-center mb-5 text-uppercase">{{__('Reset Password')}}</h4>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group mb-4">
            <input id="email" class="form-control form-control-line" type="text" name="email" placeholder="{{__('Email')}}" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group mb-4">
            <input id="password-confirm" class="form-control form-control-line" type="password" name="password" placeholder="{{__('Password')}}">
            @if ($errors->has('password'))
                <span class="" >
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group mb-4">
            <input id="password-confirm" class="form-control form-control-line" type="password" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
            @if ($errors->has('password'))
                <span class="" >
                        <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
            @endif
        </div>
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-primary btn-rounded btn-block">{{__('Reset Password')}}</button>
        </div>
    </form>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('password.update') }}">--}}
                        {{--@csrf--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Reset Password') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
