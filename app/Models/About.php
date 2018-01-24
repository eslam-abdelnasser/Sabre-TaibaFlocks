<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $fillable = ['id'];

    public function description(){
        return $this->hasMany('App\Models\AboutDescription' , 'about_id');
    }
}
