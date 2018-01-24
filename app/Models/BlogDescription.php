<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDescription extends Model
{
    //
    protected $table = 'blog-description';

    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }

    public function blog(){
        return $this->belongsTo('App\Models\Blog','blog_id');
    }

}
