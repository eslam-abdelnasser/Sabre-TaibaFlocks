<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $table= 'blogs';

    public function blogDescription(){
        return $this->hasMany('App\Models\BlogDescription','blog_id');
    }
}
