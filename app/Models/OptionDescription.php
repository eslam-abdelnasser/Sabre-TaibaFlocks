<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionDescription extends Model
{
    //
    protected  $table = 'option-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
