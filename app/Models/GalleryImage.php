<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    public function gallery(){
     	return $this->belongsTo('App\Models\Gallery');
     }
}
