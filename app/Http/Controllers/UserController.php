<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\AppModel;
use App\Models\Usergroup;
use App\Models\UserUsergroup;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cookie;
use Auth;
use Config;
use Mockery\Exception;

class UserController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request->s);
        if ( $request->ajax() ) {
            $search = trim($request->input('search'));
            return $this->getusers($search);
        }
        $s = '';
        $page_limit = 10;
        if (isset($request->page_limit)) {
            $page_limit = $request->page_limit;
        }
        if (isset($request->s)) {
            $s = $request->s;
        }
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("User Management"),
            'subTitle' => __("User List")
        ];

        $users = User::where('company_id', Auth::user()->company_id)
            ->where(function ($query) use ($s){
                $query->where('name','like', '%'.$s.'%')
                    ->orWhere('email','like', '%'.$s.'%');
            })->orderBy('updated_at','DESC')->paginate($page_limit);

        return view('users.index', compact('users', 'cmsInfo', 'page_limit', 's'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->store($request);
        } else {
            $cmsInfo = [
                'moduleTitle' => __("Access Control"),
                'subModuleTitle' => __("User Management"),
                'subTitle' => __("Create User")
            ];
            $usergroups = Usergroup::where('company_id', Auth::user()->company_id)->get();
           // dd($usergroups);
            $dynamic_route = route(config('constants.defines.APP_USERS_CREATE'));
            return view('users.add', compact('usergroups', 'dynamic_route', 'cmsInfo'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();
        $input = $request->all();
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'company_id' => Auth::user()->company_id,
            'password' => bcrypt($input['password']),
            'language' => $input['language'],
        ]);

        if (!empty($input['img_path'])) {
            if(!empty($user->img_path)){
                Storage::delete($user->img_path);
            }
            $input['img_path'] = $this->uploadFile($input['img_path'], 'users/img_path');
            //$user->update(['img_path' => $input['img_path']]);
        }

        $input['user_id'] = $user->id;
        if (!empty($input['usergroup_id'])) {
            foreach ($input['usergroup_id'] as $usergroup) {
                UserUsergroup::create([
                    'usergroup_id' => $usergroup,
                    'user_id' => $user->id,
                    'company_id' => Auth::user()->company_id
                ]);
            }
        }
        flash(__('The record has been saved successfully!'), 'success');
        return redirect()->route(Config::get('constants.defines.APP_USERS_INDEX'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $flag = $this->validateCompany($id, 'users');
        if ($flag){
            return redirect()->route('login');
        }
        return $this->show($id);
    }

    public function show($id)
    {
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("User Management"),
            'subTitle' => __("View User")
        ];
        $usergroups = Usergroup::all();
        $user = User::findOrFail($id);
        $assaigned_usergroups = [];
        $assaigned_groups = UserUsergroup::where('user_id', $user->id)->get();
        if (count($assaigned_groups) > 0) {
            foreach ($assaigned_groups as $assaigned_group) {
                $assaigned_usergroups[] = $assaigned_group->usergroup_id;
            }
        }
        $dynamic_route = route(Config::get('constants.defines.APP_USERS_EDIT'), $id);
        $disabled = 'disabled';
        return view('users.edit_view', compact('usergroups', 'dynamic_route', 'user', 'assaigned_usergroups', 'cmsInfo', 'disabled'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id = null)
    {
        $flag = $this->validateCompany($id, 'users');
        if ($flag){
            return redirect()->route('login');
        }
        if ($request->isMethod('put')) {
            return $this->update($request, $id);
        } else {
            $resendotp = $request->input('resendotp');

            if (isset($resendotp) && !empty($resendotp)) {
                $data = $this->resendOTP($id);
                return view('users.otpform', $data);
            }

            $otp = $request->input('otp');

            if (isset($otp) && !empty($otp)) {
                $this->verifyOTP($request,$id);
            }

            return $this->userEdit($id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request);
        return $this->userUpdate($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->validateCompany($id, 'users');
        if ($flag){
            return redirect()->route('login');
        }
        if ($id == Auth::user()->id) {
            flash(__("You can't Delete Yourself!"), 'danger');
            return back();
        }
        $user = User::find($id);
        $has_data = User::is_data_exits($id);
        if ($user != null && !$has_data) {
            if(!empty($user->img_path)){
                Storage::delete($user->img_path);
            }
            $user->delete();
            $user_usergroups = UserUsergroup::where('user_id', $id)->get();
            foreach ($user_usergroups as $usergroup) {
                $usergroup->delete();
            }
            flash(__('The record has been deleted successfully!'), 'success');
        } else {
            flash(__('User can not be deleted'), 'danger');
        }


        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|string|max:255',
            'phone' => 'required|unique:users,phone|max:50',
            'password' => 'required|min:8|string',
            'password_confirmation' => 'required|same:password',
            'language' => 'required',
            'usergroup_id' => 'required|exists:usergroups,id'
        ]);
    }

    protected function userEdit($id)
    {
        $logger = '';
        if ($id == 'profile') {
            $profile = Auth::user();
            $id = $profile->id;

            $cmsInfo = [
                'moduleTitle' => __("Dashboard"),
                'subModuleTitle' => __("Profile"),
                'subTitle' => __("Edit Profile")
            ];
            $logger = $id;
            $dynamic_route = route('profile.edit.post', $id);
        } else {
            $cmsInfo = [
                'moduleTitle' => __("Access Control"),
                'subModuleTitle' => __("User Management"),
                'subTitle' => __("Edit User")
            ];
            $dynamic_route = route(Config::get('constants.defines.APP_USERS_EDIT'), $id);
        }

        $usergroups = Usergroup::where('company_id', Auth::user()->company_id)->get();
        $user = User::findOrFail($id);
        $assaigned_usergroups = [];
        $assaigned_groups = UserUsergroup::where('user_id', $user->id)->get();
        if (count($assaigned_groups) > 0) {
            foreach ($assaigned_groups as $assaigned_group) {
                $assaigned_usergroups[] = $assaigned_group->usergroup_id;
            }
        }
        $disabled = '';
        return view('users.edit_view', compact('usergroups', 'dynamic_route', 'user', 'assaigned_usergroups', 'cmsInfo', 'disabled', 'logger'));
    }

    private function sendSMSToUser(User $user, $OTP)
    {
        ///Send SMS OTP
        $language = $this->getLang($user);
        $header = "";
        $phone = $user->phone;
        $message = view('OTP.profile_change.profile_change_' . $language,
            compact('OTP'))->render();
        $this->sendSMS($header, $message, $phone);
        /// Send SMS OTP
    }

    private function sendEmailTOUser(User $user, $OTP)
    {
        /// Send E-mail
        $data['OTP'] = $OTP;
        $language = $this->getLang($user);
        $from = config('app.SYSTEM_NO_REPLY_ADDRESS');
        $to = $user->email;
        $template = "user_profile.user_profile";

        $this->sendEmail($data, "LOGIN_OTP", $from, $to, "",
            $template, $language);
        /// Send E-Mail
    }

    private function sendOTPforUserInfoUpdate(Request $request, $input)
    {
        $this->validate($request, [
            'phone'=>'required|unique:users,phone|max:25',
            'email'=>'required|email|unique:users,email'
        ]);
        try {
            $request->session()->put('userUpdateInfoStore', $input);

            $user = User::find($input['user_id']);
            $OTP = $user->cacheTheOTP();

            $this->sendSMSToUser($user, $OTP);
            $this->sendEmailTOUser($user, $OTP);

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    private function verifyOTP(Request $request, $id)
    {
        $this->validate($request, [
            'otp' => 'required'
        ]);

        $user = User::find($id);
        $cachedOTP = $user->OTP();

        $requestOTP = $request->input('otp');

        if ($cachedOTP == $requestOTP) {
            $input = $request->session()->get('userUpdateInfoStore');
            $user = User::where('email', $input['email'])->first();
//            dd($user);
            $user_update = $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'language' => $input['language'],
                'phone' => $input['phone']
            ]);

//            dd($user);

            if ($user_update) {
                //session()->put('locale', $input['language']);
                Cookie::queue('locale', $input['language'], time() + 31556926);
            }


            if (!empty($input['password'])) {
                $user->update(['password' => bcrypt($input['password'])]);
            }


            $input['user_id'] = $user->id;
            if (!empty($input['usergroup_id'])) {
                UserUsergroup::where('user_id', $user->id)->delete();
                foreach ($input['usergroup_id'] as $usergroup) {
                    UserUsergroup::create([
                        'usergroup_id' => $usergroup,
                        'user_id' => $user->id,
                        'company_id' => Auth::user()->company_id
                    ]);
                }
            }
            flash(__('The record has been updated successfully!'), 'success');
            return redirect()->route(Config::get('constants.defines.APP_USERS_EDIT'), $user->id);
        } else {
            $vData['cmsInfo'] = [
                'moduleTitle' => __("Dashboard"),
                'subModuleTitle' => __("Profile"),
                'subTitle' => __("Verify OTP")
            ];
            flash(__('OTP does not match'), 'danger');
            $vData['user_id'] = $id;
            $vData['dynamic_route'] = route(Config::get('constants.defines.APP_USERS_EDIT'), $id);
            return view('users.otpform', $vData);
        }
    }

    private function resendOTP($id)
    {
        $vData['cmsInfo'] = [
            'moduleTitle' => __("Dashboard"),
            'subModuleTitle' => __("Profile"),
            'subTitle' => __("Verify OTP")
        ];
        try {
            $user = User::find($id);
            $OTP = $user->cacheTheOTP();

            $this->sendSMSToUser($user, $OTP);
            $this->sendEmailTOUser($user, $OTP);
            flash(__('Your new OTP is sent, please check'), 'success');
        } catch (Exception $exception) {
            flash(__('OTP Resend Failed'), 'danger');
        }
        $vData['user_id'] = $id;
        $vData['dynamic_route'] = route(Config::get('constants.defines.APP_USERS_EDIT'), $id);
        return $vData;
    }


    protected function userUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email,' . $id,
            'language' => 'required',
            'usergroup_id' => 'required|exists:usergroups,id',
            'phone'=>'required|unique:users,phone'
        ]);

        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['language'] = $request->input('language');
        $input['phone'] = $request->input('phone');
        $input['user_password'] = $request->input('user_password');
        $input['password'] = $request->input('password');
        $input['password_confirmation'] = $request->input('password_confirmation');
        $input['img_path'] = $request->file('img_path');
        $input['usergroup_id'] = $request->input('usergroup_id');
        $input['user_id'] = $id;


        $user = User::find($id);

        if (!empty($input['user_password']) || !empty($input['password']) || !empty($input['password_confirmation'])) {
            $this->validate($request, [
                'user_password' => 'required',
                'password' => 'required|min:8|string',
                'password_confirmation' => 'required|same:password',
            ], [
                'user_password.required' => __('Old password is required, please, try again'),
                'password.required' => __('New password is required'),
                'password.min' => __('New password must be at least 8 characters'),
                'password_confirmation.required' => __('Confirm password is required'),
                'password_confirmation.same' => __('Confirm password and new password must match')
            ]);

            if (!Hash::check($request->user_password, $user->password)) {
                return back()
                    ->withErrors(__('Old password is incorrect, please, try again'));
            }

        }
        if (!empty($input['img_path'])) {
            if(!empty($user->img_path)){
                Storage::delete($user->img_path);
            }
            $input['img_path'] = $this->uploadFile($input['img_path'], 'users/img_path');
            $user->update(['img_path' => $input['img_path']]);
        }

        $status = $this->sendOTPforUserInfoUpdate($request, $input);

        if ($status) {
            $vData['cmsInfo'] = [
                'moduleTitle' => __("Dashboard"),
                'subModuleTitle' => __("Profile"),
                'subTitle' => __("Verify OTP")
            ];
            $vData['user_id'] = $user->id;
            $vData['dynamic_route'] = route(Config::get('constants.defines.APP_USERS_EDIT'),$user->id);
            return view('users.otpform', $vData);
        } else {
            return redirect()->back();
        }


    }

    public function profileEdit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            return $this->userUpdate($request, $id);
        } else {
            return $this->userEdit($id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request, $id)
    {
//        dd($request);
        return $this->userUpdate($request, $id);

    }

    private function getusers($search)
    {
        //$search = trim($inputData['search']);

        if (strlen($search) > 3) {
            $user = new User();
            $query = DB::table('users');
            $query = $user->scopeSearch($query, $search);
            $data = $query->select('name', 'id', 'email')->get();
            return \response()->json($data);
        }
    }
}
