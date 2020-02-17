<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Usergroup;
use App\Models\UsergroupRole;
use Illuminate\Http\Request;
use Auth;

class UsergroupRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->isMethod('POST')) {
            return $this->modify($request);
        } else {
            $cmsInfo = [
                'moduleTitle' => __("Access Control"),
                'subModuleTitle' => __("User Group & Role Association")
            ];
            $usergroups = Usergroup::where('company_id', Auth::user()->company_id)->get();
//        dd($usergroups);
            return view('UsergroupRole.index', compact('cmsInfo', 'usergroups'));
        }
    }

    public function ajaxGetData($id) {
        $role = new Role();
        $roles = $role->getRoles();
        $usergrouproles = UsergroupRole::where('usergroup_id', '=', $id)->get();

        $role_contents = view('UsergroupRole.usergrouprolecontent', compact('roles', 'usergrouproles'))->render();
//        var_dump($usergrouproles);
        $response['role_content'] = $role_contents;
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

    public function modify(Request $request) {

        $usergroup_id = $request->usergroup_id;
        $usergroup = UsergroupRole::where('usergroup_id', '=', $usergroup_id)->delete();

        if($request->selected_roles) {
            for($i = 0; $i < sizeof($request->selected_roles); $i ++){
                UsergroupRole::insert([
                    'usergroup_id' => $usergroup_id,
                    'role_id' => $request->selected_roles[$i]
                ]);
            }
        }

        flash(__('The record has been updated successfully!'),'success');
        return back()->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

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
