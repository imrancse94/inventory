<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{

    protected $fillable = [
        'id', 'name', 'icon', 'sequence'
    ];
    public function getModules($page_limit = 10){
        $modules = $this::query()->paginate($page_limit);

        return $modules;
    }


    public function submodules(){
       return $this->hasMany(\App\Models\Submodule::class);
    }

    public function pages() {
        return $this->hasMany(\App\Models\Page::class);
    }
}
