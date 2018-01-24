<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    //
    protected $table = 'package_user' ;

    public function options(){
        return $this->belongsToMany('App\Models\Option','package_user_option','package_user_id','option_id')->withTimestamps();
    }


    public function packages(){
        return $this->belongsTo('App\Models\Package','package_id');
    }

    public  function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
