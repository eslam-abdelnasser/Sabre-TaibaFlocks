<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetails extends Model
{
    //
    protected $table = 'ticket-details';

    public function ticket(){
        return $this->belongsTo('App\Models\Ticket','ticket_id');
    }

    public function admin(){
        return $this->belongsTo('App\Admin', 'admin_id');
    }
}
