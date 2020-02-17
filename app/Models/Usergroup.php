<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Usergroup extends Model
{
    protected $fillable = [
        'group_name', 'dashboard_url', 'status', 'company_id'
    ];

    public static function insert_entry($data){
        $usergroup = new Usergroup();
        $usergroup->group_name = $data["group_name"];
        $usergroup->status = 1;
        $usergroup->company_id = $data["company_id"];
        $usergroup->save();
        return $usergroup;
    }

    public function getUsergroupsByCompanyId($company_id, $SUPER_SUPER_ADMIN_ID){
        if ($company_id == $SUPER_SUPER_ADMIN_ID) {
            $usergroup = $this->all();
        } else {
            $usergroup = $this->where([
                'company_id' => $company_id
            ]);
        }
        return $usergroup;
    }

    public function getUsergroups(){
        $usergroups = $this->all();

        return $usergroups;
    }

    public function role()
    {
        return $this->belongsToMany('\App\Models\Role', 'usergroup_roles', 'usergroup_id','role_id');
    }

    public function getUsergroupId($id){
        return $this->find($id);
    }

    
}
