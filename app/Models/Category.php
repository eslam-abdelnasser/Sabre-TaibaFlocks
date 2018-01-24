<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function categoryDescription(){
        return $this->hasMany('App\Models\CategoryDescription','category_id');
    }
}
