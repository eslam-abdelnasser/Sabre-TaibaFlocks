<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravellerHistory extends Model
{
    //
    protected $table = 'travellers-history';

    public function travellerDescription(){
        return $this->hasMany('App\Models\TravellerHistoryDescription','traveller_history_id');
    }
}
