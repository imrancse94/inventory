<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Traits\OTPTrait;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserUsergroup;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Traits\PermissionUpdateTreait;
use App\Models\RevokeTokens;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, PermissionUpdateTreait;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function showLoginForm()
    {
        $locale = Cookie::get('locale');
        if (isset($locale)) {
            app()->setLocale($locale);
        }
        return view('auth.login');
    }

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->decayMinutes = config('app.login_locked_time_minutes');
        $this->maxAttempts = config('app.failed_login_attemps');
        $this->middleware('guest')->except('logout');
        $this->middleware('TwoFA')->except('logout');
        $this->notAdmin = 0;
    }

    public function validateLogin(LoginRequest $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ],[
            'email.required' => 'required',
            'password.required' => 'required'
        ]);
    }

    public function login(LoginRequest $request)
    {


        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            /*User::where('email', $request->email)->update(['ip' => $request->ip()]);
            $from = Config('app.SYSTEM_NO_REPLY_ADDRESS');
            $adminEmail = Config('app.ADMIN_EMAIL');
            $message['lock_time'] = date('d F, Y h:i:s');
            $message['email'] = isset($request->email) ? $request->email : "";
            $message['ip'] = $request->ip();
            $message['language'] = Config('app.ADMIN_LANGUAGE');
            $emailTemplate = "account_blocked.admin_account_blocked";

            $this->sendEmail($message,"account_blocked_admin",$from,$adminEmail,
                "",$emailTemplate,$message['language']);

            $user = User::select('name')->where('email', $request->email)->first();

            if (!empty($user)) {
                $data_arr['isfor'] = 'Account Lock';
                $data_arr['name'] = $user->name;
                $data_arr['email'] = $request->email;
                $data_arr['language'] = empty($request->language) ? 'tr' : $request->language;
                $emailTemplate = "account_blocked.user_account_blocked";
                $this->sendEmail($data_arr,"account_blocked_user",$from,$request->email,
                    "",$emailTemplate,$data_arr['language']);
            }*/

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }

        if ($this->notAdmin) {
            Auth::logout();
            Session::flash('not-admin-error', __('These credentials do not match with any admin record'));
            return view('auth.login');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function attemptLogin(LoginRequest $request)
    {
        $isOTPEnable = config('app.is_otp_enable');

        $allCredintials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')

        ];

        $result = Auth::attempt($allCredintials);


        if ($result) {
            $id = Auth::id();
            $this->getPermissionList($id);
            Session::put('isOTP', 1);
            if($this->userUsergroupCheck(auth()->user()->id)) {

                if ($isOTPEnable) {
                    $data = array();
                    $language = $this->getLang(auth()->user());
                    $OTP = $this->cacheTheOTP();
                    $header = "";
                    $message = view('OTP.login.login_' . $language, compact('OTP'))->render();
                    $data['otp'] = $OTP;
                    $template = 'login.otp_' . $language;
                    $attachment = "";
                    $from = config('app.SYSTEM_NO_REPLY_ADDRESS');
                    $phone = auth()->user()->phone;
                    $userInfo = ['email' => $request->email, 'id' => $id, 'phone' => $phone];
                    $to = $request->email;
                    $request->session()->put('login_info', $userInfo);
                    $otp_key = 'login_otp_' . auth()->user()->id;
                    $otp_expire_time = Config::get('constants.defines.LOGIN_OTP_EXPIRE_TIME');
                    $this->set_otp_to_cache($otp_key, $OTP, $otp_expire_time);
                    //Cache::put(['login_otp_' . auth()->user()->id => $OTP], now()->addSeconds(60 * 5));
                    $this->sendEmail($data, "LOGIN_OTP", $from, $to, $attachment, "login.otp", $language);
                    $this->sendSMS($header, $message, $phone);

                }
            } else {
                $this->notAdmin = 1;
                return true;
            }
        } else {

            /*$user = new User();
            $user_fl = $user->select('failed_login_attempt')->where('email', $request->email)->first();
            if (is_null($user_fl)) {
                $fla_cnt = 0;
            } else {
                $fla_cnt = $user_fl->failed_login_attempt;
            }
            $user->where('email', $request->email)->update(['failed_login_attempt' => ($fla_cnt + 1), 'last_failed_login_datetime' => Carbon::now()]);

            $log_data = [
                'action' => 'Login Failed',
                'ip' => $request->ip(),
                'user_email' => $request->email,
                'status' => 'Failure',
                'date_time' => Carbon::now(),
                'failed_login_attempt' => $fla_cnt + 1
            ];
            $user->createLog(
                $this->_getCommonLogData($log_data)
            );*/
        }

        //echo "sdsdsd";exit;
        return $result;
    }

    public function resetUserSessionId()
    {
        Log::info(json_encode("LOGOUT::Called"));
        $previous_session = Auth::User()->session_id;
        $jsonPrevSession = [];
        if ($previous_session) {
            $jsonPrevSession = explode(",", $previous_session);
            foreach ($jsonPrevSession as $jsonKey => $sessionValue) {
                if (Session::getId() == $sessionValue) {
                    unset($jsonPrevSession[$jsonKey]);
                }
            }
        }
        Auth::user()->session_id = implode(",", $jsonPrevSession);
        Auth::user()->save();
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

    public function userUsergroupCheck($id) {
        $admin_check = UserUsergroup::where('user_id', $id)->first();
        if(empty($admin_check)) {
            return false;
        } else {
            return true;
        }
    }


}
