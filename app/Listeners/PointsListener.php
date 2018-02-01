<?php

namespace App\Listeners;

use App\Events\CustomerLoyalty;
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
        $user  = $event->user ;
        $value = $event->value ;

    }
}
