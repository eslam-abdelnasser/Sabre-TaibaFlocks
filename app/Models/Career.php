<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $table = 'careers';

    public function description(){
        return $this->hasMany('App\Models\CareerDescription' , 'career_id');
    }

}
