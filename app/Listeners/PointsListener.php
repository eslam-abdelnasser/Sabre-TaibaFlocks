<?php

namespace App\Listeners;

use App\Events\CustomerLoyalty;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PointsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerLoyalty  $event
     * @return void
     */
    public function handle(CustomerLoyalty $event)
    {
        //
//        $user  = $event->user ;

        $selected_user = User::find($event->user->id);
        $selected_user->points =  $event->value  + (!$selected_user->points  ?  $selected_user->points: 0);
        $selected_user->save() ;

//        $value = $event->value ;

    }
}
