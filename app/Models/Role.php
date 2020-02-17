<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Role extends Model
{
    protected $fillable = [
        'title', 'status', 'company_id'
    ];

    public static function insert_entry($data){
        $role = new Role();
        $role->title = $data["title"];
        $role->status = 1;
        $role->company_id = $data["company_id"];
        $role->save();
        return $role;
    }

    public function getRolesByCompanyId($company_id, $DEFAULT_COMPANY_ID){
//        if ($company_id == $DEFAULT_COMPANY_ID) {
//                $selected_pages = $this->all();
//        } else {
//                $selected_pages = $this->where([ 
//                        'company_id' => $company_id 
//                ]);
//        }
        
        $selected_pages = $this->where([ 
                        'company_id' => $company_id 
                ])->get();
        $rolesArray = [ ];
        foreach ( $selected_pages as $role ) {
                $rolesArray [$role->id] = $role->title;
        }
        return $rolesArray;
    }

    public function getRoles(){
        $roles = $this->where('company_id',Auth::user()->company_id)->get();

        return $roles;
    }
}
