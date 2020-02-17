<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsergroupRole extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'usergroup_id', 'role_id'
    ];

    public function role()
    {
        return $this->belongsToMany('\App\Models\Role', 'usergroup_roles', 'usergroup_id','role_id');
    }

    public function getUsergroupByRoleCompany($role_id, $company_id)
    {
        return Self::where('role_id', $role_id)->where('company_id', $company_id)->first();
    }
}
