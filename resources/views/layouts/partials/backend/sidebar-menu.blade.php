<?php $menu_modules = Session::get('modules');
$user_permissions = Session::get('user_permission');
$routeModuleAssoc = [];
preg_match('/([a-z]*)@/i', Request::route()->getActionName(), $matches);
$controllerName = $matches[1];
//dd($controllerName);exit;
?>

<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="#">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <?php
    $access_module=array();

    if(!empty($user_permissions)){
        foreach($user_permissions as $row){

            if(!in_array($row->module_id,$access_module))
                $access_module[]=$row->module_id;
        }
    }
    $access_submodule=array();

    if(!empty($user_permissions)){
        foreach($user_permissions as $row){
            if(!in_array($row->submodule_id,$access_submodule))
                $access_submodule[]=$row->submodule_id;
        }
    }

    ?>


    <?php

    if(!empty($menu_modules)){
        foreach($menu_modules as $module){
            if(in_array($module['id'],$access_module)){
                $icon='<i class="fa fa-codepen" aria-hidden="true"></i>';
                if($module['icon']!=""){
                    $icon=$module['icon'];
                }
                ?>

          <?php
                $submodule_controller_arr=array();
                $submodule_assoc_pages_method = array();
                foreach($module->submodules as $key => $submodule ){
                    //print_r($submodule->pages);exit;
                    $submodule_controller_arr[$submodule['id']]= strtolower(str_replace(" ", "", $module['name'])).".".strtolower(str_replace(" ", "", $submodule['name'])).".".strtolower($submodule['default_method']);

                }

                ?>
             <?php

                foreach($module->submodules as $submodule ){

                    if(in_array($submodule['id'],$access_submodule)){
                        $sub_icon='<i class="fa fa-circle-o"></i>';
                        if($submodule['icon']!=""){
                            $sub_icon=$submodule['icon'];
                        }


                        $routeModuleAssoc[$submodule['controller_name']] = $module['id'];
                    }


                }
                //dd($routeModuleAssoc);exit;
                ?>
    <li class="treeview {{(isset($routeModuleAssoc[$controllerName]) && ($routeModuleAssoc[$controllerName] == $module['id'])) ? 'menu-open' : 'menu-close'}}">
        <a href="{{(isset($routeModuleAssoc[$controllerName]) && ($routeModuleAssoc[$controllerName] == $module['id'])) ? 'active' : ''}}">
            <i class="fa fa-book"></i> <span>{{__($module['name'])}}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu {{(isset($routeModuleAssoc[$controllerName]) && ($routeModuleAssoc[$controllerName] == $module['id'])) ? 'display-block' : ''}}">
            <?php
            foreach($module->submodules as $submodule ){

                if(in_array($submodule['id'],$access_submodule)){
                    $sub_icon='<i class="fa fa-circle-o"></i>';
                    if($submodule['icon']!=""){
                        $sub_icon=$submodule['icon'];
                    }
                    $route = $module['name'].".".$submodule['name'].".".$submodule['default_method'];
                    if($submodule['id'] == 2050) {
                        $route = 'users.index';
                    } elseif($submodule['id'] == 2051) {
                        $route = 'roles.index';
                    } elseif($submodule['id'] == 2052) {
                        $route = 'usergroups.index';
                    } elseif($submodule['id'] == 2053) {
                        $route = 'usergrouprole.index';
                    } elseif($submodule['id'] == 2054) {
                        $route = 'rolepageassoc.index';
                    }elseif($submodule['id'] == 2072) {
                        $route = 'user.usergroup.index';
                    }elseif($submodule['id'] == 2070) {
                        $route = 'settings.edit';
                    }else if($submodule['id'] == 2001){
                        $route = 'companies.index';
                    }else if($submodule['id'] == 2020){
                        $route = 'modules.index';
                    }else if($submodule['id'] == 2021){
                        $route = 'submodules.index';
                    }else if($submodule['id'] == 2022){
                        $route = 'pages.index';
                    }

                    ?>
            <li class="{{($submodule['controller_name'] == $controllerName) ? 'active':''}}">
                <a class="{{($submodule['controller_name'] == $controllerName) ? 'active':''}}" href="{{Route::has($route) ? route($route):'#'}}">
                    <span>{{__($submodule['name'])}}</span>
                </a>
            </li>
            <?php }
          }
          ?>
        </ul>
    </li>
    <?php
    }
    }
    }

    ?>
</ul>
