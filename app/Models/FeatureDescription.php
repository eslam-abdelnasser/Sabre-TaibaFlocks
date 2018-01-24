<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureDescription extends Model
{
    //
    protected $table = 'feature-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }
}
