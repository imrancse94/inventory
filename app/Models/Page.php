<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'id', 'module_id', 'sub_module_id', 'name', 'method_name', 'method_type', 'available_to_company'
    ];

    public function getPages(){
        $pages = $this->all();

        return $pages;
    }

    public function submodules(){
        return $this->hasOne(\App\Models\Submodule::class,'id', 'submodule_id');
    }

    public function modules() {
        return $this->hasOne(\App\Models\Module::class,'id', 'module_id');
    }

}
