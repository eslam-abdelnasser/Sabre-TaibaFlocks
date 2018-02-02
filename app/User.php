<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function group(){
        return $this->belongsToMany('App\Models\Group' , 'group_user'); 
    }

    public function packages()
    {
        // we just will add pivot table name as second parameter in case if name convention was wrong
        return $this->belongsToMany('App\Models\Package','package_user'); 
    }
}
