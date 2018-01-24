<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDescription extends Model
{
    //
    protected $table = 'package-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function package(){
       return $this->belongsTo('App\Models\Package', 'package_id');
    }
}
