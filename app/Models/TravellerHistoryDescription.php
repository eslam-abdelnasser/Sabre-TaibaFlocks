<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravellerHistoryDescription extends Model
{
    //
    protected $table = 'traveller-description';

    public function travellerHistory(){
        return $this->belongsTo('App\Models\TravellerHistory','traveller_history_id');
    }


    public function language(){
        return $this->belongsTo('App\Models\Language','lang_id');
    }

}
