<?php
$menu_modules = Session::get('modules');
	$user_permissions = Session::get('user_permission');
        $pagesArray = [];
        $submodulesArray = [];
        $pages  = Page::all();
        $submodules  = SubModule::all();
        foreach($submodules as $submodule){
            $submodule['name'] = strtolower(str_replace(" ", "_", $submodule['name']));
            $submodulesArray[$submodule['id']] = ['controller'=>$submodule->controller_name,'name'=>$submodule['name']];
        }
        
        foreach($pages as $page){
            
            $pagesArray[$page['id']] = ['method_name'=>$page['method_name'],'method_type'=>$page['method_type']];
        }
        
        
        $access_module=array();
        $moduleArray = [];
        foreach ($menu_modules as $module){
            $moduleArray[$module['id']] = strtolower(str_replace(" ", "_", $module['name']));
        }
        
        
        
          foreach($user_permissions as $pages){
              
                if(isset($submodulesArray[$pages->submodule_id]) && isset($moduleArray[$pages->module_id])){
                    //dd($submodulesArray[$pages->submodule_id]['controller']);exit;
                    //Route::get('settings/edit', 'SettingController@edit')->name('settings.edit');
                    $submodulesArray[$pages->submodule_id]['controller'] = str_replace("controller", "", $submodulesArray[$pages->submodule_id]['controller']);
                    $submodulesArray[$pages->submodule_id]['controller'] = str_replace("Controller", "", $submodulesArray[$pages->submodule_id]['controller']);
                    $submodulesArray[$pages->submodule_id]['controller'] = $submodulesArray[$pages->submodule_id]['controller']."Controller";
                   
                echo "Route::get('".$moduleArray[$pages->module_id].'/'.
                str_replace("_", "", $submodulesArray[$pages->submodule_id]['name']).
                        "/".$pages->method_name."' , '".
                        ucfirst($submodulesArray[$pages->submodule_id]['controller']).
                        "@".$pages->method_name."')->name('".$moduleArray[$pages->module_id].
                        ".".$submodulesArray[$pages->submodule_id]['name'].".".$pages->method_name."');<br/><br/>";
                }
            }
            exit;