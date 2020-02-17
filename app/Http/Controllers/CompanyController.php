<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Models\Country;
use App\Models\Role;
use App\Models\RolePage;
use App\Models\Timezone;

use App\Models\Usergroup;
use App\Models\UsergroupRole;
use App\Models\UserUsergroup;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Hash;
use DB;
use Config;
use Validator;
use Session;
use Auth;

class CompanyController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmsInfo['subModuleTitle'] = __("Companies");
        $cmsInfo['moduleTitle'] = __("Access Control");
        $cmsInfo['subModuleTitle'] = __("Companies");
        $companies = Company::orderBy('created_at','DESC')->get();
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
            $cmsInfo['subModuleTitle'] = __("Companies");
            $cmsInfo['moduleTitle'] = __("Access Control");
            $cmsInfo['subModuleTitle'] = __("Companies");
            $countries = Country::orderBy('country_name','ASC')->get();
    //        var_dump($countries);
    //        die();
            $timezones = Timezone::orderBy('time_zone','ASC')->get();

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
            'cname'=>'required|string',
            'cemail'=>'required|email',
            'address1'=>'required|string',
            'address2'=>'nullable|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'country'=>'required|string',
            'postcode'=>'required|string',
            'phone'=>'required|max:25',
            'timezone'=>'required|integer',
            'logo'=>'required|mimes:jpg,png,jpeg',
            'profile'=>'required|mimes:jpg,png,jpeg',
            'username' => 'required|min:4|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'user_phone' => 'required|unique:users,phone|max:25',
            'password' => 'required|min:5',

        ];
        $request->validate($rules);
        $company_params = $request->only(array("name","cname","cemail","address1","address2","city","state","country","postcode","phone",
            "timezone","registration_no","tax_no","no_of_employees","cmmi_level","yearly_revenue","hourly_rate","daily_rate","fax"));

        if($request->hasFile('logo')) {
            $image = time() . rand(1,1000).'.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/company'), $image);
            $company_params["logo"] = 'uploads/company/'.$image;
        }

        //add company
        $company = new Company();
        if ($company->add_company($company_params)){
            //add User Section
            $user_params  = $request->only(array("cname","username", "password","img_path","language","email","user_phone"));
            if($request->hasFile('profile')) {
                $profile_img = time() . rand(1,1000).'.' . $request->profile->getClientOriginalExtension();
                $request->profile->move(public_path('uploads/user_photo'), $profile_img);
                $user_params["profile"] = 'uploads/user_photo/'.$profile_img;
            }
            $user_params["company_id"] = $company->id;
            $user_params["user_type"] = Config::get('constants.defines.ADMIN_USER_TYPE');
            $user_model = new \App\User();

            if ($user = $user_model->add_user($user_params )){
                //add UserGroup
                $usergroup_params["group_name"] = Config::get('constants.defines.USER_GROUP_NAME');
                $usergroup_params["company_id"] = $company->id;
                $usergroup = Usergroup::insert_entry($usergroup_params);

                //add Role
                $role_params["title"] = Config::get('constants.defines.ROLE_TITLE');
                $role_params["company_id"] = $company->id;
                $role = Role::insert_entry($role_params);

                //add User_usergroup
                $user_usergroup_params["usergroup_id"] = $usergroup->id;
                $user_usergroup_params["user_id"] = $user->id;
                $user_usergroup_params["company_id"] = $company->id;
                $user_usergroup = UserUsergroup::insert_entry($user_usergroup_params);

                //add User_usergroup role
                $usergroup_role = new UsergroupRole();
                $usergroup_role->usergroup_id = $usergroup->id;
                $usergroup_role->role_id = $role->id;
                $usergroup_role->company_id = $company->id;
                $usergroup_role->save();

                //add Role page
                $page_id = array(3078,3075,3068,3067,3066,3065,3058,3057,3056,3055,3049,3048,3047,3046,3045);
                for ($i=0; $i<count($page_id); $i++){
                    $role_page = new  RolePage();
                    $role_page->role_id = $role->id;
                    $role_page->page_id = $page_id[$i];
                    $role_page->save();
                }
                flash(__('The record has been saved successfully!'), 'success');
            }
        }

        return redirect()->route(Config::get('constants.defines.APP_COMPANIES_INDEX'));
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
        $cmsInfo['subModuleTitle'] = __("Companies");
        $cmsInfo['moduleTitle'] = __("Access Control");
        $cmsInfo['subModuleTitle'] = __("Companies");
        $a_company = Company::find($id);
        return view('companies.browse')->with(compact('a_company','cmsInfo'));
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
            $cmsInfo['subModuleTitle'] = __("Companies");
            $cmsInfo['moduleTitle'] = __("Access Control");
            $cmsInfo['subModuleTitle'] = __("Companies");
            $a_company = Company::find($id);
            $countries = Country::orderBy('country_name','ASC')->get();
            $timezones = Timezone::orderBy('time_zone','ASC')->get();
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
            'cname'=>'required|string',
            'cemail'=>'required|email',
            'address1'=>'required|string',
            'address2'=>'nullable|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'country'=>'required|string',
            'postcode'=>'required|string',
            'phone'=>'required|max:25',
            'timezone'=>'required|integer',
            'logo'=>'mimes:jpg,png,jpeg',

        ];
        $request->validate($rules);
        $company_params = $request->only(array("name","cname","cemail","address1","address2","city","state","country","postcode","phone",
            "timezone","registration_no","tax_no","no_of_employees","cmmi_level","yearly_revenue","hourly_rate","daily_rate","fax"));

        $company = Company::where('id', $id)->first();

        if($request->hasFile('logo')) {
            $old_image_path =  public_path().'/'.$company->logo;

            if(file_exists($old_image_path) && !empty($company->logo)){
                unlink($old_image_path);
            }
            $image = time() . rand(1,1000).'.' . $request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/company'), $image);
            $company_params["logo"] = 'uploads/company/'.$image;
        }

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









