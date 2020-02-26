<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Role;
use App\Models\UsergroupRole;
use Illuminate\Http\Request;
use Config;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("Role Management"),
            'subTitle' => __("Role List")
        ];
//        $role = new Role();
//        $roles = $role->getRoles();
        if(\request()->wantsJson()){
            $page_limit = 10;
            $roles = Role::where('company_id', Auth::user()->company_id)->paginate($page_limit);
            return response()->json($roles,200);
        }

        $page_limit = 10;
        $roles = Role::where('company_id', Auth::user()->company_id)->paginate($page_limit);
        return view('roles.index', compact('cmsInfo', 'roles'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:100|unique:roles,title'
            ]);

            $roleAdd = Role::create([
                'title' => $request->title,
                'status' => 1,
                'company_id' => Auth::user()->company_id
            ]);
            if ($roleAdd) {
                //flash(__('The record has been saved successfully!'), 'success');
                toastSuccess('Role has been created successfully!');
            }
            return redirect(route(Config::get('constants.defines.APP_ROLES_INDEX')));
        } else {
            return $this->showAddForm();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function showEditForm($id)
    {
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("Role Management"),
            'subTitle' => __("Edit Role")
        ];
        $dynamic_route = Config::get('constants.defines.APP_ROLES_EDIT');
        $isEdit = true;
        $role = Role::find($id);
        return view('roles.edit_view', compact('cmsInfo', 'dynamic_route', 'isEdit', 'role'));
    }

    public function showViewForm($id)
    {
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("Role Management"),
            'subTitle' => __("View Role")
        ];
        $dynamic_route = Config::get('constants.defines.APP_ROLES_CREATE');
        $isEdit = false;
        $role = Role::find($id);
        return view('roles.edit_view', compact('cmsInfo', 'dynamic_route', 'isEdit', 'role'));
    }


    public function showAddForm()
    {
        $cmsInfo = [
            'moduleTitle' => __("Access Control"),
            'subModuleTitle' => __("Role Management"),
            'subTitle' => __("Add Role")
        ];

        $dynamic_route = Config::get('constants.defines.APP_ROLES_CREATE');
        return view('roles.edit_add', compact('cmsInfo', 'dynamic_route'));
    }


    public function edit(Request $request, $id = null)
    {
        $flag = $this->validateCompany($id, 'roles');
        if ($flag){
            return redirect()->route('login');
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:100|unique:roles,title, '.$id
            ]);
            $role = Role::find($request->id);
            $roleEdit = $role->update([
                'title' => $request->title
            ]);
            if ($roleEdit) {
                //flash(__('The record has been updated successfully!'), 'success');
                toastSuccess('Role has been updated successfully!');
            }
            return redirect(route(Config::get('constants.defines.APP_ROLES_INDEX')));
        } else {
            return $this->showEditForm($id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showViewForm($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->validateCompany($id, 'roles');
        if ($flag){
            return redirect()->route('login');
        }

        if ($id == Auth::user()->id) {
            flash(__("You Can't Delete Yourself!"), 'danger');
            return back();
        }
        $usergrouprole = UsergroupRole::where('role_id', $id)->first();
        if (empty($usergrouprole)) {
            $role = Role::find($id);
            $roleDelete = $role->delete();
            if ($roleDelete) {
                flash(__('The record has been deleted successfully!'), 'success');
            }
        } else {
            flash(__('This Role Is Being Used'), 'danger');
        }
        return back();
    }
}
