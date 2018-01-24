<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderDescription extends Model
{
    //
    protected $table = 'slider-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
