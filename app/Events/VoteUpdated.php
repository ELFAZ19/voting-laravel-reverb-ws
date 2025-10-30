<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VoteUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $poll_id;
    public $option_id;
    public $votes_count;

    public function __construct($poll_id, $option_id, $votes_count)
    {
        $this->poll_id = $poll_id;
        $this->option_id = $option_id;
        $this->votes_count = $votes_count;
    }

    public function broadcastOn()
    {
        return new PresenceChannel("poll.{$this->poll_id}");
    }

    public function broadcastAs()
    {
        return 'vote.updated';
    }

    public function broadcastWith()
    {
        return [
            'poll_id' => $this->poll_id,
            'option_id' => $this->option_id,
            'votes_count' => $this->votes_count,
        ];
    }
}
