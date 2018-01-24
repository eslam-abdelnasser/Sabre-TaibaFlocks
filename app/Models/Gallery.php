<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
    public function images(){
    	return $this->hasMany('App\Models\GalleryImage' , 'gallery_id'); 
    }


}
