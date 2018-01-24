<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //

    public function featureDescription(){
        return $this->hasMany('App\Models\FeatureDescription','feature_id');
    }

    public function packages(){
        return $this->belongsToMany('App\Models\Package');
    }
}
