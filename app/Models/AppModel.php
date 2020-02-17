<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    public static function createModel($model, $data=[])
    {
       $smodel =  $model::create($data);
        return $smodel;
    }
}
