<?php
namespace App\Http\Controllers\Traits;
use App\Models\MerchantCommission;
use App\Notifications\SendNotification;
use Carbon\Carbon;
use Illuminate\Support\Carbon as IlluminateCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/1/2019
 * Time: 3:46 PM
 */
trait CommonLogTrait
{
    public function _getCommonLogData($logData = array())
    {
        $logCommonData = [
            'date_time' => Carbon::now(),
            'auth_user_ip'=> $this->getClientIp(),
            'auth_user_agent'=> $this->getUserAgent()
        ];
        if(Auth::user()){
            $logCommonData['auth_default_currency'] = Auth::user()->currentCurrency()->name;
            $logCommonData['auth_email'] = Auth::user()->email;
            $logCommonData['auth_id'] = Auth::user()->id;
        }
        return array_merge($logData, $logCommonData);
    }

    public function getClientIp()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function getUserAgent()
    {
        $maxlength = 80;
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if(strlen($userAgent) < 80){
            $maxlength = strlen($userAgent);
        }

        return substr($userAgent, 0, $maxlength);
    }

    public function make_round($value){
        return round($value,2);
    }

    public function validateCompany($id, $table_name){
        $sql = "SELECT company_id FROM ".$table_name." WHERE id =".$id;
       // echo $sql;exit;
        $execute_query = DB::select($sql);
        if (!empty($execute_query)){
            $company_id =  $execute_query[0]->company_id;
            if (\auth()->user()->company_id != $company_id){
                \auth()->logout();
               return true;
            }else{
                return false;
            }
        }else{
            \auth()->logout();
            return true;
        }
    }

    public function getGeneratedToken($unique_string){

        $token = "";
        try{

            $token =  md5($unique_string.time().$this->getSecretKey());
        } catch(Exception $ex){

        }

        return $token;
    }

    public function getSecretKey($length = 32){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;

    }


    function getOperatorByMobileNo( $mobile_no ){

        $part = substr($mobile_no, 0,3);

        $operator = "";

        if($part == 561 || ($part > 530 && $part < 540)){
            $operator = MerchantCommission::TRUKCELL;
        } else if(($part > 539 && $part < 550)){
            $operator = MerchantCommission::VODAFONE;
        } else if(($part > 499 && $part < 510) || ($part > 549 && $part < 560)){
            $operator = MerchantCommission::TRUK_TELEKOM;
        }

        return $operator;

    }

    public function getSystemDate()
    {
        return Carbon::today();
    }

    public function sendNotification($user, $data, $template, $language = "tr"){
        $physical_template = $template."_".$language;
        $html = view('notifications.'.$physical_template, compact('data'))->render();
        try {

          if($user) {
            $user->notify(new SendNotification($html));
          }
        }catch(\Exception $e){

        }
    }

    public function fileWrite($file_name, $data, $write_enable){

        if ($write_enable && !empty($data)){
            $file_path = public_path('files/'.$file_name);

            if(!is_dir(public_path('files/'))){
                mkdir(public_path('files'));
                chmod(public_path('files'), 0777);
            }
            if(file_exists($file_path)){
                unlink($file_path);
            }

            $file = fopen($file_path,"w+");
            fwrite($file,$data);
            chmod($file_path,0777);

            fclose($file);
        }

    }
}
