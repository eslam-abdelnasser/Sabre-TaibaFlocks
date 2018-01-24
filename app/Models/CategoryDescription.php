<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model
{
    //
    protected $table = 'category-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function category(){
        return $this->belongsTo('App\models\Category','category_id');
    }
}
