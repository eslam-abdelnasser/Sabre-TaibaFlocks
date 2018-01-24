<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //


    public function optionDescription(){
        return $this->hasMany('App\Models\OptionDescription','option_id');
    }

    public function  packages(){
        return $this->hasMany('App\Models\Package');
    }

}
