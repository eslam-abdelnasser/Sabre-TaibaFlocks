<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $table = 'reviews';

    public function package(){
        return $this->belongsTo('App\Models\Package','package_id');
    }
}
