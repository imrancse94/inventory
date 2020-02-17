<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;
use App\Models\Page;
use App\Models\SubModule;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lan = Auth::user()->language;
        //session()->put('locale', $lan);
        app()->setLocale($lan);
        //Cookie::queue('locale', $lan, time()+31556926 );

        $home_cache = Setting::first();

        /*Cache::put('logo_path', $home_cache->logo_path);
        Cache::put('title', $home_cache->title);
        Cache::put('footer', $home_cache->footer);
        Cache::put('favicon_path', $home_cache->favicon_path);*/

       // $this->getDynamicRoute();

        return view('front');
    }


    private function getDynamicRoute(){
        $menu_modules = Session::get('modules');
	$user_permissions = Session::get('user_permission');
        //dd($user_permissions);exit;
        $pagesArray = [];
        $submodulesArray = [];
        $pages  = Page::all();
        $submodules  = SubModule::all();
        foreach($submodules as $submodule){
            $submodule['name'] = strtolower(str_replace(" ", "", $submodule['name']));
            $submodulesArray[$submodule['id']] = ['controller'=>$submodule->controller_name,'name'=>$submodule['name']];
        }

        foreach($pages as $page){

            $pagesArray[$page['id']] = ['method_name'=>$page['method_name'],'method_type'=>$page['method_type']];
        }


        $access_module=array();
        $moduleArray = [];
        foreach ($menu_modules as $module){
            $moduleArray[$module['id']] = strtolower(str_replace(" ", "", $module['name']));
        }



          foreach($user_permissions as $pages){

                if(isset($submodulesArray[$pages->submodule_id]) && isset($moduleArray[$pages->module_id])){
                    //dd($submodulesArray[$pages->submodule_id]['controller']);exit;
                    //Route::get('settings/edit', 'SettingController@edit')->name('settings.edit');
                    $submodulesArray[$pages->submodule_id]['controller'] = str_replace("controller", "", $submodulesArray[$pages->submodule_id]['controller']);
                    $submodulesArray[$pages->submodule_id]['controller'] = str_replace("Controller", "", $submodulesArray[$pages->submodule_id]['controller']);
                    $submodulesArray[$pages->submodule_id]['controller'] = $submodulesArray[$pages->submodule_id]['controller']."Controller";
                    $method_type = "get";
                    if($pages->method_type == 1){
                        $method_type = "post";
                    }else if($pages->method_type == 2){
                        $method_type = "get";
                    }else if($pages->method_type == 3){
                        $method_type = "put";
                    }else if($pages->method_type == 4){
                        $method_type = "delete";
                    }
                    if($pages->module_id >= 1005)
                echo "Route::".$method_type."('".$moduleArray[$pages->module_id].'/'.
                str_replace("_", "", $submodulesArray[$pages->submodule_id]['name']).
                        "/".$pages->method_name."' , '".
                        ucfirst($submodulesArray[$pages->submodule_id]['controller']).
                        "@".$pages->method_name."')->name('".$moduleArray[$pages->module_id].
                        ".".$submodulesArray[$pages->submodule_id]['name'].".".$pages->method_name."');<br/><br/>";
                }
            }
            exit;
    }
}
