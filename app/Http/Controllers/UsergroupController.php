<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Usergroup;
use App\Models\UserUsergroup;
use App\Models\User;
use Config;

class UsergroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmsInfo = [
            'moduleTitle'=>__("Access Control"),
            'subModuleTitle' =>__("User Group Management"),
            'subTitle'=>__("User Group List")
        ];
        $usergroup = new Usergroup();
        $usergroups = Usergroup::where('company_id', Auth::user()->company_id)->get();
//dd($usergroups);
        return view('usergroups.index', compact('cmsInfo', 'usergroups'));
    }

    public function create(Request $request)
    {
        if($request->isMethod('post')){
//            dd($request);
            $this->validate($request, [
                'group_name'=>'required|max:100|unique:usergroups,group_name'
            ]);

            $usergroupAdd  = Usergroup::create([
                'group_name' => $request->group_name,
                'dashboard_url' => $request->dashboard_url,
                'status' => 1,
                'company_id' => Auth::user()->company_id
            ]);

            $usergroup_id = $usergroupAdd->id;
//            $usergroup = UserUsergroup::where('usergroup_id', '=', $usergroup_id)->delete();

            if($request->selected_users) {
                for($i = 0; $i < sizeof($request->selected_users); $i ++){
                    UserUsergroup::insert([
                        'usergroup_id' => $usergroup_id,
                        'user_id' => $request->selected_users[$i],
                        'company_id' => Auth::user()->company_id
                    ]);
                }
            }

            if($usergroupAdd){
                flash(__('The record has been saved successfully!'),'success');
            }
            return redirect(route(Config::get('constants.defines.APP_USERGROUPS_INDEX')));
        }else{
           return $this->showAddForm();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showEditForm($id){
        $cmsInfo = [
            'moduleTitle'=>__("Access Control"),
            'subModuleTitle' =>__("User Group Management"),
            'subTitle'=>__("Edit User Group")
        ];
        $dynamic_route = Config::get('constants.defines.APP_USERGROUPS_EDIT');
        $isEdit = true;
        $usergroup = Usergroup::find($id);
        $users = User::where('company_id', Auth::user()->company_id)->orderBy('name', 'ASC')->get();
        $userusergroups = UserUsergroup::where('usergroup_id', $id)->where('company_id', Auth::user()->company_id)->get();
        return view('usergroups.edit_view', compact('cmsInfo','dynamic_route','isEdit', 'usergroup', 'users', 'userusergroups'));
    }

    public function showViewForm($id){
        $cmsInfo = [
            'moduleTitle'=>__("Access Control"),
            'subModuleTitle' =>__("User Group Management"),
            'subTitle'=>__("View User Group")
        ];
        $dynamic_route = Config::get('constants.defines.APP_USERGROUPS_CREATE');
        $isEdit = false;
        $usergroup = Usergroup::find($id);
        $users = User::where('company_id', Auth::user()->company_id)->orderBy('name', 'ASC')->get();
        $userusergroups = UserUsergroup::where('usergroup_id', $id)->where('company_id', Auth::user()->company_id)->get();
        return view('usergroups.edit_view', compact('cmsInfo','dynamic_route', 'isEdit', 'usergroup', 'users', 'userusergroups'));
    }


    public function showAddForm()
    {
        $cmsInfo = [
            'moduleTitle'=>__("Access Control"),
            'subModuleTitle' =>__("User Group Management"),
            'subTitle'=>__("Add User Group")
        ];
        $users = User::where('company_id', Auth::user()->company_id)->orderBy('name', 'ASC')->get();
        $dynamic_route = Config::get('constants.defines.APP_USERGROUPS_CREATE');
        return view('usergroups.edit_add', compact('cmsInfo','dynamic_route', 'users'));
    }


    public function edit(Request $request, $id = null)
    {
        $flag = $this->validateCompany($id, 'usergroups');
        if ($flag){
            return redirect()->route('login');
        }
        if($request->isMethod('post')){
            $this->validate($request, [
                'group_name'=>'required|max:100|unique:usergroups,id,'.$request->id
            ]);
            $usergroup = Usergroup::find($request->id);
            $usergroupEdit = $usergroup->update([
                'group_name' => $request->group_name,
                'dashboard_url' => $request->dashboard_url
            ]);

            $usergroup_id = $request->id;
            $userusergroup = UserUsergroup::where('usergroup_id', '=', $usergroup_id)->delete();

            if($request->selected_users) {
                for($i = 0; $i < sizeof($request->selected_users); $i ++){
                    UserUsergroup::insert([
                        'usergroup_id' => $usergroup_id,
                        'user_id' => $request->selected_users[$i],
                        'company_id' => Auth::user()->company_id
                    ]);
                }
            }

            if($usergroupEdit){
                flash(__('The record has been updated successfully!'),'success');
            }
            return redirect(route(Config::get('constants.defines.APP_USERGROUPS_INDEX')));
        }else{
            if($id > 0){
                return $this->showEditForm($id);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->validateCompany($id, 'usergroups');

        if ($flag){
            return redirect()->route('login');
        }

        if($id == Auth::user()->id) {
            flash(__("You Can't Delete Yourself"), 'danger');
            return back();
        }
        $userusergroup = UserUsergroup::where('usergroup_id', $id)->first();
        if(empty($userusergroup)) {
            $usergroup = Usergroup::find($id);
            $usergroupDelete = $usergroup->delete();
            if ($usergroupDelete) {
                flash(__('The record has been deleted successfully!'), 'success');
            }
        } else {
            flash(__('This User Group Is Being Used'),'danger');
        }
        return back();
    }
}
