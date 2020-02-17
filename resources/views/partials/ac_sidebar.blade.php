<?php $menu_modules = Session::get('modules');
	$user_permissions = Session::get('user_permission');
        $routeModuleAssoc = [];
        preg_match('/([a-z]*)@/i', Request::route()->getActionName(), $matches);
        $controllerName = $matches[1];
        //dd($controllerName);exit;
?>

<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <ul class="side-menu metismenu">
           
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
            
               
            
            <li class="{{(isset($routeModuleAssoc[$controllerName]) && ($routeModuleAssoc[$controllerName] == $module['id'])) ? 'active' : ''}}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>
                    <span class="nav-label">{{__($module['name'])}}</span><i class="fa fa-angle-left arrow"></i></a>
             <ul class="nav-2-level collapse">
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
                    $route = 'usergroup.role.index';
                } elseif($submodule['id'] == 2054) {
                    $route = 'rolepages.index';
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
                 <li>
                <a class="{{($submodule['controller_name'] == $controllerName) ? 'active':''}}" href="{{Route::has($route) ? route($route):'#'}}"> {{__($submodule['name'])}}</a>
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
            @if(Auth::user()->id == 0)
            <li class="{{(Route::is('modules.index') ? 'active' : '')}}">
                <a href="javascript:;"><i class="sidebar-item-icon ti-align-justify"></i>
                    <span class="nav-label">{{__('Master Data')}}</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a class="{{(Route::is('modules.index') ? 'active' : '')}}" href="{{route('modules.index')}}">{{__('Module Management')}}</a>
                    </li>
                    <li>
                        <a class="{{(Route::is('submodules.index') ? 'active' : '')}}" href="{{route('submodules.index')}}">{{__('Sub Module Management')}}</a>
                    </li>
                    <li>
                        <a class="{{(Route::is('pages.index') ? 'active' : '')}}" href="{{route('pages.index')}}">{{__('Page Management')}}</a>
                    </li>

                </ul>
            </li>

            {{--<li class="heading">{{__('Access Control')}}</li>--}}
            {{--<li class="{{(Route::is('users.index') ? 'active' : '')}}">--}}
                {{--<a href="javascript:;"><i class="sidebar-item-icon ti-paint-roller"></i>--}}
                    {{--<span class="nav-label">{{__('Access Control')}}</span><i class="fa fa-angle-left arrow"></i></a>--}}
                {{--<ul class="nav-2-level collapse">--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('users.index') ? 'active' : '')}}" href="{{route('users.index')}}"> {{__('User Management')}}</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('roles.index') ? 'active' : '')}}" href="{{route('roles.index')}}">{{__('Role Management')}}</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('usergroups.index') ? 'active' : '')}}" href="{{route('usergroups.index')}}">{{__('User Group Management')}}</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('rolepages.index') ? 'active' : '')}}" href="{{route('rolepages.index')}}">{{__('Role & Page Association')}}</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('usergroup.role.index') ? 'active' : '')}}" href="{{route('usergroup.role.index')}}">{{__('User Group & Role Association')}}</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a class="{{(Route::is('user.usergroup.index') ? 'active' : '')}}" href="{{route('user.usergroup.index')}}">{{__('User & User Group Association')}}</a>--}}
                    {{--</li>--}}
                </ul>
            </li>
            @endif
           {{----}}
        </ul>
        <div class="sidebar-footer">
            {{--<a href="javascript:;"><i class="ti-announcement"></i></a>--}}
            {{--<a href="calendar.html"><i class="ti-calendar"></i></a>--}}
            {{--<a href="javascript:;"><i class="ti-comments"></i></a>--}}
            {{--<a href="login.html"><i class="ti-power-off"></i></a>--}}
        </div>
    </div>
</nav>