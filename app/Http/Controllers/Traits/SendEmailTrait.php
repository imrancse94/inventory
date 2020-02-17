<?php
namespace App\Http\Controllers\Traits;

use App\Mail\SendMail;
use App\Notifications\SendNotification;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

trait SendEmailTrait{
    public function sendEmail($data, $subject_label,$from,$to,$attachment, $template,$language){

        if(empty($language)) {
            $language = "tr";
        }

        $physical_template = $template."_".$language;

        $email_subject = $this->getEmailSubject($subject_label, $language);
        try {
          Mail::to($to)->send(new SendMail($data, $email_subject,$from, $attachment, $physical_template));
        //   $userObj = new User();
        //   $to_user = $userObj->getByEmail($to);
        //   if($to_user) {
        //     $to_user->notify(new SendNotification($email_subject, $data));
        //   }
        }catch(\Exception $e){

        }
    }

    private function getEmailSubject($labelName, $language='tr'){
        $old_lang = app()->getLocale();
        app()->setLocale($language);
        $subject = __('subject.'.$labelName);
        app()->setLocale($old_lang);
        return $subject;
    }
}
