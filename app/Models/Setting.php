<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title','logo_path', 'admin_name', 'admin_phone','company_address','footer'
    ];
    public function getSetting(){
        $setting = $this->first();

        return $setting;
    }
}
