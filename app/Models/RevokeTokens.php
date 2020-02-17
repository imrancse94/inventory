<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RevokeTokens
{

    public function logoutPastLogin($userId){

//        $tokens = DB::table('oauth_access_tokens')->get()->where('user_id', $userId);
//        foreach($tokens as $token){
//            DB::table('oauth_refresh_tokens')
//                ->where('access_token_id', $token->id)
//                ->update([
//                    'revoked' => true
//                ]);   
//
//            DB::table('oauth_access_tokens')
//                ->where('user_id', $userId)
//                ->update([
//                    'revoked' => true
//                ]);
//        }

        $previous_session = DB::table('users')->where('id', $userId)->value('session_id');    
        if ($previous_session) {
            Session::getHandler()->destroy($previous_session);
        }  
    }
}
