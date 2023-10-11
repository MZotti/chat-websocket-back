<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\Channel;
 
class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $senderId;
    public $senderName;
    public $message;
    public $sent_at;

    public function __construct($senderId, $senderName, $message)
    {
        $this->senderId = $senderId;
        $this->senderName = $senderName;
        $this->message = $message;
        $this->sent_at = Carbon::now();
    }

    public function broadcastOn()
    {
        return ['chat-channel'];
        // return ['my-channel'];
    }

    public function broadcastAs()
    {
        return new Channel('chat-channel');
        // return 'my-event';
    }
}