<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Role;
use App\Models\Module;
use App\Models\RolePage;
use App\Models\UsergroupRole;
use App\Models\Usergroup;
use App\Models\UserUsergroup;
use App\Models\User;
use DB;
use App\Models\UsertypeSubmodule;

class RolePageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->isMethod('post')){
            return $this->store($request);
        }else{
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("Role & Page Association")
        ];
        //echo Auth::user()->id;exit;


        $DEFAULT_COMPANY_ID = 1;
        $user = Auth::user();
        $company_id = $user->company_id;
        $role = new Role;
        $roleList = $role->getRolesByCompanyId($company_id, $DEFAULT_COMPANY_ID);
        return view('RolePages.index', compact('cmsInfo', 'roleList'));
        }
    }

//    public function ajaxGetRequest($id) {
//
//        $SUPER_SUPER_ADMIN_ID = 1;
//        $roles = array();
//        $selectedpages = array();
//        $submoduleSelectedList = array();
//        $user = Auth::user();
//        if ($user->id == $SUPER_SUPER_ADMIN_ID) {
//            $modulesInfo = Module::with('submodules', 'submodules.pages')->whereNotIn('id', [1001, 1002])->get();
//        } else {
//            $modulesInfo = Module::with('submodules', 'submodules.pages')->whereNotIn('id', [1001, 1002, 1007])->get();
//        }
//
////        $usertype_submodule_list = Module::join('sub_modules', 'sub_modules.module_id', 'modules.id')
////            ->join('usertype_submodules', 'usertype_submodules.sub_module_id', 'sub_modules.id')
////            ->where('usertype_submodules.user_type_id', $user->user_type)
////            ->select('modules.id as module_id',
////                'sub_modules.id as sub_module_id'
////            )->get();
////
////        $module_ids_array = $usertype_submodule_list->unique('module_id')->pluck('module_id')->toArray();
////        $usertype_submodule_ids_array = $usertype_submodule_list->unique('sub_module_id')->pluck('sub_module_id')->toArray();
//        if ($id > 0) {
//            $roles = RolePage::where('role_id', $id)->get();
//        }
//
//        if (!empty($roles)) {
//            foreach ($roles as $role) {
//                $selectedpages[] = $role->page_id;
//            }
//        }
//
//        $modulesArray = [];
//        $moduleAssocSubmodule = [];
//        if(!empty($modulesInfo)){
//            foreach ($modulesInfo as $moduleInfo) {
//                if (in_array($moduleInfo->id, $module_ids_array)){
//                    $modulesArray [$moduleInfo->id] = $moduleInfo->name;
//                }
//                if(!empty($moduleInfo->submodules)){
//                    foreach ($moduleInfo->submodules as $submodules){
//                        $moduleAssocSubmodule[$moduleInfo->id][] = $submodules->id;
//                        if(!empty($submodules)){
//                            $submoduleselected = 0;
//                            foreach ($submodules->pages as $page){
//                                if(in_array($page->id, $selectedpages)){
//                                    $submoduleselected++;
//                                }
//                            }
//                            $submoduleSelectedList[$submodules->id] = 0;
//                            if(count($submodules->pages) == $submoduleselected){
//                                $submoduleSelectedList[$submodules->id] = 1;
//                            }
//                        }
//                    }
//
//                }
//            }
//        }
//        $selectedModuleList = [];
//        if(!empty($moduleAssocSubmodule)){
//            foreach ($moduleAssocSubmodule as $module_id => $submoduleList){
//                $selectedModuleList[$module_id] = 0;
//                if(!empty($submoduleList)){
//                    $selectedmodule = 0;
//                    foreach($submoduleList as $submodule_id){
//                        if($submoduleSelectedList[$submodule_id] == 1){
//                            $selectedmodule++;
//                        }
//                    }
//
//                    if(count($submoduleList) == $selectedmodule){
//                        $selectedModuleList[$module_id] = 1;
//                    }
//                }
//            }
//        }
//
//
//
//        $dropdown_contents = view('RolePages.moduleDropdownList', compact('modulesArray'))->render();
//        $role_contents = view('RolePages.rolepagecontent', compact('modulesInfo', 'module_ids_array', 'usertype_submodule_ids_array', 'selectedpages','submoduleSelectedList','selectedModuleList'))->render();
//        $response['moduledropdown'] = $dropdown_contents;
//        $response['role_content'] = $role_contents;
//        $response['selectedpages'] = $selectedpages;
//        $response['selectedModuleList'] = $selectedModuleList;
//        echo json_encode($response);
//        exit;
//    }

        public function ajaxGetRequest($id) {

        $SUPER_SUPER_ADMIN_ID = 1;
        $roles = array();
        $selectedpages = array();
        $submoduleSelectedList = array();
        $user = Auth::user();
        if ($user->id == $SUPER_SUPER_ADMIN_ID) {
            $modulesInfo = Module::with('submodules', 'submodules.pages')->whereNotIn('id', [1001, 1002])->get();
        } else {
            $modulesInfo = Module::with('submodules', 'submodules.pages')->whereNotIn('id', [1001, 1002, 1007])->get();
        }

        if ($id > 0) {
            $roles = RolePage::where('role_id', $id)->get();
        }

        if (!empty($roles)) {
            foreach ($roles as $role) {
                $selectedpages[] = $role->page_id;
            }
        }

        $modulesArray = [];
        $moduleAssocSubmodule = [];
        if(!empty($modulesInfo)){
            foreach ($modulesInfo as $moduleInfo) {
                $modulesArray [$moduleInfo->id] = $moduleInfo->name;
                if(!empty($moduleInfo->submodules)){
                    foreach ($moduleInfo->submodules as $submodules){
                        $moduleAssocSubmodule[$moduleInfo->id][] = $submodules->id;
                        if(!empty($submodules)){
                            $submoduleselected = 0;
                            foreach ($submodules->pages as $page){
                                if(in_array($page->id, $selectedpages)){
                                    $submoduleselected++;
                                }
                            }
                            $submoduleSelectedList[$submodules->id] = 0;
                            if(count($submodules->pages) == $submoduleselected){
                                $submoduleSelectedList[$submodules->id] = 1;
                            }
                        }
                    }

                }
            }
        }
        $selectedModuleList = [];
        if(!empty($moduleAssocSubmodule)){
            //$allSubmodule = $submoduleSelectedList
            foreach ($moduleAssocSubmodule as $module_id => $submoduleList){
                $selectedModuleList[$module_id] = 0;
                if(!empty($submoduleList)){
                    $selectedmodule = 0;
                    foreach($submoduleList as $submodule_id){
                        if($submoduleSelectedList[$submodule_id] == 1){
                            $selectedmodule++;
                        }
                    }

                    if(count($submoduleList) == $selectedmodule){
                        $selectedModuleList[$module_id] = 1;
                    }
                }
            }
        }



        $dropdown_contents = view('RolePages.moduleDropdownList', compact('modulesArray'))->render();
        $role_contents = view('RolePages.rolepagecontent', compact('modulesInfo', 'selectedpages','submoduleSelectedList','selectedModuleList'))->render();
        $response['moduledropdown'] = $dropdown_contents;
        $response['role_content'] = $role_contents;
        $response['selectedpages'] = $selectedpages;
        $response['selectedModuleList'] = $selectedModuleList;
        echo json_encode($response);
        exit;
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

//    public function store(Request $request) {
////        $this->validate($request, [
////            'role_id'=>'required'
////        ]);
//        $selectedPageIdList = $request->selectedpageIds;
//        $role_id = $request->role_id;
//        $module_id = $request->module_id;
//
//        if($role_id > 0 && !empty($selectedPageIdList)){
//            $insertData = array();
//
////            var_dump($selectedPageIdList);
////            die();
//            $admin_pages = [];
//            $usertype_submodules = UsertypeSubmodule::with('sub_module')->where('user_type_id', 1)->get();
//            foreach ($usertype_submodules as $sub_module) {
//                if (!empty($sub_module->sub_module)) {
//                    $all_pages = $sub_module->sub_module->pages;
//                    if (!empty($all_pages)) {
//                        foreach($all_pages as $page) {
//                            $admin_pages[] = $page->id;
//                        }
//                    }
//                }
//            }
//            foreach ($selectedPageIdList as $page_id){
//                if (in_array($page_id, $admin_pages)) {
//                    $insertData[] = ['role_id'=>$role_id,'page_id'=>$page_id];
//                }
//            }
//            //dd($insertData);exit;
//            $roles = RolePage::where('role_id', $role_id)->delete();
//            RolePage::insert($insertData);
//            $usergrouproles = UsergroupRole::where('role_id',$role_id)->get();
//            $userGroupIds = [];
//            if(!empty($usergrouproles)){
//                foreach ($usergrouproles as $usergrouprole){
//                    $userGroupIds[] = $usergrouprole->usergroup_id;
//                }
//
//                $userGroupIds = array_unique($userGroupIds);
//                $usergroups = [];
//                if(!empty($userGroupIds)){
//                  $usergroups = UserUsergroup::whereIn('usergroup_id',$userGroupIds)->get();
//                }
//                $userIds = [];
//                if(!empty($usergroups)){
//                    foreach($usergroups as $usergroup){
//                        $userIds[] = $usergroup->user_id;//['id'=>$usergroup->user_id];
//                    }
//                }
//
//                $userIds = array_unique($userIds);
//                if(!empty($userIds)){
//                   $user = User::whereIn('id',$userIds)->update(['permission_version'=>DB::raw('permission_version+1')]);
//
//                }
//            }
//            flash(__('The record has been updated successfully!'),'success');
//        }
//        return back()->withInput();
//    }
 public function store(Request $request) {
//        $this->validate($request, [
//            'role_id'=>'required'
//        ]);
        $selectedPageIdList = $request->selectedpageIds;
        $role_id = $request->role_id;
        $module_id = $request->module_id;
        if($role_id > 0 && !empty($selectedPageIdList)){
            $roles = RolePage::where('role_id', $role_id)->delete();
            $insertData = array();

            foreach ($selectedPageIdList as $page_id){
                $insertData[] = ['role_id'=>$role_id,'page_id'=>$page_id];
            }
            //dd($insertData);exit;
            RolePage::insert($insertData);
            $usergrouproles = UsergroupRole::where('role_id',$role_id)->get();
            $userGroupIds = [];
            if(!empty($usergrouproles)){
                foreach ($usergrouproles as $usergrouprole){
                    $userGroupIds[] = $usergrouprole->usergroup_id;
                }

                $userGroupIds = array_unique($userGroupIds);
                $usergroups = [];
                if(!empty($userGroupIds)){
                  $usergroups = UserUsergroup::whereIn('usergroup_id',$userGroupIds)->get();
                }
                $userIds = [];
                if(!empty($usergroups)){
                    foreach($usergroups as $usergroup){
                        $userIds[] = ['id'=>$usergroup->user_id];
                    }
                }

                $userIds = array_unique($userIds);
                if(!empty($userIds)){
                   $user = User::whereIn('id',$userIds)->update(['permission_version'=>DB::raw('permission_version+1')]);

                }
            }
            flash(__('Successfully Updated'),'success');
        }
        return back()->withInput();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request) {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
