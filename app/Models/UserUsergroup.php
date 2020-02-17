<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserUsergroup extends Model
{
    protected $fillable = ['usergroup_id', 'user_id', 'company_id'];

    public static function insert_entry($data){
        $user_usergroup = new UserUsergroup();
        $user_usergroup->usergroup_id = $data["usergroup_id"];
        $user_usergroup->user_id = $data["user_id"];
        $user_usergroup->company_id = $data["company_id"];
        $user_usergroup->save();
        return $user_usergroup;

    }

    public function getCurrentGroup($user_id, $company_id)
    {
        $uugroup_ids = Self::where('user_id', $user_id)->where('company_id', $company_id)->pluck('id');
        return $uugroup_ids->toArray();
    }

    public function getFirstUserUsergoupByUserId($user_id){
        return $this->where('user_id', $user_id)->first();
    }

    public function deletePrevGroup(Array $uugroup_ids) 
    {
        $result = false;
        if ($this->destroy($uugroup_ids)) {
            $result = true;
        }
        return $result;
    }
}
