<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CommonLogTrait;
use App\Models\Usergroup;
use App\Models\UserUsergroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\OTPTrait;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Session;
use Auth;
class OTPController extends Controller
{
    use OTPTrait, CommonLogTrait;

    public function index(){
        $cmsInfo = [
            'moduleTitle' => "",
            'subModuleTitle' =>""
        ];
        return view('OTP.index', compact('cmsInfo'));
    }

    public function verify(Request $request){
        $this->validate($request,[
            'otp'=>'required'
        ]);
        $loginInfo = $request->session()->get('login_info');
        //dd($loginInfo);
        $OTP = Cache::get('login_otp_'.$loginInfo['id']);
        if(!empty($request->otp) && $request->otp == $OTP){
            $request->session()->put('APP_ADMIN_LOGIN_IP', $this->getClientIp());
            Session::forget('isOTP');
            $request->session()->forget('login_info');

            $userUsergoup = new UserUsergroup();
            $userUsergoupObj = $userUsergoup->getFirstUserUsergoupByUserId(auth()->id());

            $userGroup = new Usergroup();
            $userGroupObj = $userGroup->getUsergroupId($userUsergoupObj->usergroup_id);
            if (!empty($userGroupObj->dashboard_url)){
                return redirect($userGroupObj->dashboard_url);
            }

            return redirect(route('home'));
        }
        flash(__('OTP is expired or invalid'),'danger');
        return back();
    }

    public function resend(Request $request)
    {
       // dd($request);
        if($request->resend_otp == 'resend'){
            //$user = User::
            $OTP = $this->cacheTheOTP();
            $header = "";
            $message = __('Your login OTP is').' '.$OTP;
            $loginInfo = $request->session()->get('login_info');
            Cache::put(['login_otp_'.$loginInfo['id'] => $OTP], now()->addSeconds(60*5));
            $phone =  $loginInfo['phone']; //auth()->user()->phone;
            $this->sendSMS($header, $message, $phone);

            $data['otp'] = $OTP;
            $to_mail = auth()->user()->email;
            $language = $this->getLang(auth()->user());
            $from = config('app.SYSTEM_NO_REPLY_ADDRESS');
            $emailTemplate = "login.otp";
            $this->sendEmail($data,"Resend_Login_OTP",$from,$to_mail,
                "",$emailTemplate,$language);

            flash(__('Your new OTP is sent, please check'),'success');
            return redirect()->back()->with('Message', __('Your new OTP is sent, please check'));
        }
    }

    public function clearOTP(Request $request){
        Session::forget('isOTP');
        $request->session()->forget('login_info');
        Auth::Logout();
        return redirect()->route('login');
    }
}
