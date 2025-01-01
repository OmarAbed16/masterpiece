<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatPusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $SenderId;
    public $ReceiverId;
    public $message;

    public function __construct($SenderId,$ReceiverId, $message)
    {
        $this->SenderId = $SenderId; 
        $this->ReceiverId = $ReceiverId; 
        $this->message = $message;
    }

    public function broadcastOn(): array
    {
        return ['chat.'.$this->SenderId.".".$this->ReceiverId]; 
    }

    public function broadcastAs()
    {
        return 'message';
    }
}
