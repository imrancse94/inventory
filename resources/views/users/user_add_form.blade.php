<div class="col-md-6">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('language') ? ' has-error' : '' }}">
            <label for="language">{{__('Languages')}}</label>
            <select class="form-control select2" name="language" id="language" style="width: 100%;" required>
                <option value="en" >English</option>
                <option value="tr" >Türkiye</option>
            </select>

            @if ($errors->has('language'))
                <span class="help-block">
                    <strong>{{ $errors->first('language') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">{{__('Name')}}</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{old('name')}}" required>
            @if($errors->has('name'))
                <label class="help-block error">{{$errors->first('name')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">{{__('Email')}}</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{old('email')}}" required>
            @if($errors->has('email'))
                <label class="help-block error">{{$errors->first('email')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="phone">{{__('Phone')}}</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="{{old('phone')}}" >
            @if($errors->has('phone'))
                <label class="help-block error">{{$errors->first('phone')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>


</div>

<div class="col-md-6">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password">{{__('Password')}}</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            @if($errors->has('password'))
                <label class="help-block error">{{$errors->first('password')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password_confirmation">{{__('Confirm Password')}}</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password" required>
            @if($errors->has('password_confirmation'))
                <label class="help-block error">{{$errors->first('password_confirmation')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('usergroup_id') ? ' has-error' : '' }}">
            <label for="usergroup_id">{{__('User Group')}}</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select a Usergroup"
                    style="width: 100%;" name="usergroup_id[]" id="usergroup_id" required>
                <option value="" >{{__('Please select')}}</option>
                @foreach($usergroups as $usergroup)
                    <option value="{{$usergroup->id}}" >{{$usergroup->name}}</option>
                @endforeach
            </select>
            @if($errors->has('usergroup_id'))
                <label class="help-block error">{{$errors->first('usergroup_id')}}</label>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5 {{ $errors->has('file') ? ' has-error' : '' }}">
            <label class="file-input mr-2">
                <span class="btn-icon"><i class="la la-cloud-upload"></i>{{__('Profile Picture')}}</span>
                <input type="file" name="img_path">
            </label>
        </div>
    </div>
</div>

