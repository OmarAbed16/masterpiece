<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessagePusher implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public $message;
public $username;
    public function __construct($message,$username)
    {
        $this->message=$message;
        $this->username=$username;
    }

    public function broadcastOn(): array
    {
        return ['chat.2'];
    }
 
    
    public function broadcastAs()
    {
        return 'message';
    }


}
