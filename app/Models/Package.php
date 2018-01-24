<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function packageDescription(){
        return $this->hasMany('App\Models\PackageDescription','package_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function gallery(){
        return $this->hasMany('App\Models\PackagesGallery','package_id');
    }

    public function features(){
        return $this->belongsToMany('App\Models\Feature','feature-package','package_id','feature_id')->withTimestamps();
    }

    public function options(){
        return $this->belongsToMany('App\Models\Option','option-package','package_id','option_id')->withTimestamps();
    }

    public function users()
    {
        // we just will add pivot table name as second parameter in case if name convention was wrong
        return $this->belongsToMany('App\User','package_user');
    }
}
