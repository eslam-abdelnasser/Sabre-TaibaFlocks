<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutDescription extends Model
{
    //
    protected $table = 'about_description';
    protected $fillable = ['id' , 'about_id' , 'lang_id'];
    public function about(){
        return $this->hasMany('App\Models\About');
    }

    public function language(){
        return $this->belongsTo('App\Models\language' , 'lang_id');
    }
}
