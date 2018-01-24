<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    public function gallery(){
    	return $this->hasOne('App\Models\Gallery' , 'id' , 'gallery_id'); 
    }
}
