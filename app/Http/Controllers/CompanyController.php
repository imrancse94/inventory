<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Requests\CompanyAddRequest;
use App\Models\Country;
use App\Models\Role;
use App\Models\RolePage;
use App\Models\Timezone;

use App\Models\Usergroup;
use App\Models\UsergroupRole;
use App\Models\UserUsergroup;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Hash;
use DB;
use Config;
use mysql_xdevapi\Exception;
use Validator;
use Session;
use Auth;

class CompanyController extends Controller
{
    use FileUploadTrait,DatabaseTransactions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmsInfo = [
            'moduleTitle'=>__("Companies"),
            'subModuleTitle' =>__("Company Management"),
            'subTitle'=>__("List")
        ];
        $page_limit = 10;
        $companies = Company::orderBy('created_at','DESC')->paginate($page_limit);
        return view('companies.browse', compact('companies','cmsInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('post')){
            return $this->store($request);
        }else{
            $cmsInfo = [
                'moduleTitle'=>__("Companies"),
                'subModuleTitle' =>__("Company Management"),
                'subTitle'=>__("Add")
            ];
            $countries = [];//Country::orderBy('country_name','ASC')->get();
    //        var_dump($countries);
    //        die();
            $timezones = [];//Timezone::orderBy('time_zone','ASC')->get();

            return view('companies.add')->with(compact('countries', 'timezones','cmsInfo'));
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cmsInfo['subModuleTitle'] = __("Companies");
        $cmsInfo['moduleTitle'] = __("Access Control");
        $cmsInfo['subModuleTitle'] = __("Add Company");

        $rules = [
            'name' => 'required|string',
            'email'=>'required|email|unique:companies,email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ];
        $request->validate($rules);
        DB::beginTransaction();
        try {
            $company_params = $request->only(array("name", "email", "password"));

            //add company
            $company = new Company();
            if ($company_entity = $company->add_company($company_params)) {
                //add User Section
                $company_id = $company_entity->id;
                $user_params = $company_params;//$request->only(array("cname", "username", "password", "img_path", "language", "email", "user_phone"));
                $user_params["company_id"] = $company_id;

                //$user_params["user_type"] = Config::get('constants.defines.ADMIN_USER_TYPE');
                $user_model = new User();

                if ($user = $user_model->add_user($user_params)) {
                    $user_id = $user->id;
                    //add UserGroup
                    $usergroup_params["group_name"] = config('constants.defines.USER_GROUP_NAME');
                    $usergroup_params["company_id"] = $company_id;
                    $usergroup = Usergroup::insert_entry($usergroup_params);

                    //add Role
                    $role_params["title"] = config('constants.defines.ROLE_TITLE');
                    $role_params["company_id"] = $company_id;
                    $role = Role::insert_entry($role_params);

                    //add User_usergroup
                    $user_usergroup_params["usergroup_id"] = $usergroup->id;
                    $user_usergroup_params["user_id"] = $user_id;
                    $user_usergroup_params["company_id"] = $company_id;
                    $user_usergroup = UserUsergroup::insert_entry($user_usergroup_params);

                    //add User_usergroup role
                    $usergroup_role = new UsergroupRole();
                    $usergroup_role->usergroup_id = $usergroup->id;
                    $usergroup_role->role_id = $role->id;
                    $usergroup_role->company_id = $company_id;
                    $usergroup_role->save();

                    //add Role page
                    $page_id = array(3078, 3075, 3068, 3067, 3066, 3065, 3058, 3057, 3056, 3055, 3049, 3048, 3047, 3046, 3045);
                    for ($i = 0; $i < count($page_id); $i++) {
                        $role_page = new  RolePage();
                        $role_page->role_id = $role->id;
                        $role_page->page_id = $page_id[$i];
                        $role_page->save();
                    }
                   DB::commit();
                    //flash(__('The record has been saved successfully!'), 'success');
                    toastSuccess('Company has been created successfully!');

                }

            }
        }catch (\Exception $e){
            $description = $e->getMessage();
            DB::rollback();
            dd($description);
        }
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function view($id){

        return $this->show($id);
    }


    public function show($id)
    {
        $cmsInfo = [
            'moduleTitle'=>__("Companies"),
            'subModuleTitle' =>__("Company Management"),
            'subTitle'=>__("View")
        ];

        $a_company = Company::find($id);
        $isView = true;
        return view('companies.edit_add')->with(compact('a_company','cmsInfo','isView'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id = null)
    {
        if($request->isMethod('put')){

            return $this->update_company($request, $id);

        }else{
            $cmsInfo = [
                'moduleTitle'=>__("Companies"),
                'subModuleTitle' =>__("Company Management"),
                'subTitle'=>__("Edit")
            ];
            $a_company = Company::find($id);
            $countries = [];//Country::orderBy('country_name','ASC')->get();
            $timezones = [];//Timezone::orderBy('time_zone','ASC')->get();
            $edit_route = Config::get('constants.defines.APP_COMPANIES_EDIT');
            $index_route = Config::get('constants.defines.APP_COMPANIES_INDEX');

            return view('companies.edit_add', compact('a_company', 'countries', 'timezones','cmsInfo','edit_route','index_route'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_company($request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'email'=>'required|email|unique:companies,email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ];
        $request->validate($rules);
        $company_params = $request->only(array("name", "email", "password"));

        $company = Company::where('id', $id)->first();

        $company->update_entry($company_params,$id);

        flash(__($company->name.' The record has been updated successfully!'), 'success');

        return redirect()->route(Config::get('constants.defines.APP_COMPANIES_INDEX'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::where('company_id',$id)->first();
        if (!$user) {
            $company = Company::find($id);
            $image_path =  public_path().'/'.$company->logo;

            if(file_exists($image_path) && !empty($company->logo)){
                unlink($image_path);
            }
            $company->delete();
            //delete usergroup for a company
            $user_group = Usergroup::where('company_id', $id)->first();
            if (!empty($user_group)){
                $user_group->delete();
            }

            //delete role for a company
            $role = Role::where('company_id', $id)->first();
            $role_id = -5;
            if (!empty($role)) {
                $role_id = $role->id;
                $role->delete();
            }

            //delete usergroup_roles for a company
            $usergroup_role = UsergroupRole::where('company_id', $id)->first();
            if (!empty($usergroup_role)) {
                $usergroup_role->delete();
            }

            //delete User_usergroup for a company
            $user_usergroup = UserUsergroup::where('company_id', $id)->first();
            if (!empty($user_usergroup)) {
                $user_usergroup->delete();
            }

            //delete rolepages for a company
            $role_pages = RolePage::where('role_id',$role_id)->get();
            if ($role_pages->count()>0){
                foreach ($role_pages as $role_page) {
                    $role_page->delete();
                }
            }

            flash(__('The record has been deleted successfully!'), 'danger');
        }else{

            flash(__('This Is Being Used'),'danger');
        }
        return back();
    }
    public function checkUserAndEmailExist($value){


    }
}









