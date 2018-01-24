<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function user(){
    	return $this->belongsTo('App\User' , 'user_id'); 
    }

    public function ticketDetails(){
        return $this->hasMany('App\Models\TicketDetails','ticket_id');
    }
}
