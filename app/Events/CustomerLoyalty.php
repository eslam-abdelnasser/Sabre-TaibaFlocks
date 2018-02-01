<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CustomerLoyalty
{
    use InteractsWithSockets, SerializesModels;

    public $user ;
    public $value ;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $value)
    {
        //
        $this->user = $user ;
        $this->value = $value ;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
