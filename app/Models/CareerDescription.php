<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerDescription extends Model
{
    //
    protected $table = 'career-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
