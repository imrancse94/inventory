<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;

class LocalizationController extends Controller
{
    public function index($locale)
    {


        $user = App\User::where('id',Auth::id())->first();
        $user->language = $locale;
        $user->save();

//        var_dump(Auth::id());
//        die();
        App::setLocale($locale);
        //store the locale in session so that the middleware can register it
        //session()->put('locale', $locale);
        $timeStamp = 864000;// for 10 days
        Cookie::queue('locale', $locale, $timeStamp);

        return redirect()->back();
    }


}
