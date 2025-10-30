<?php

namespace App\Listeners;

use App\Events\VoteUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastVoteUpdate
{
    public function handle(VoteUpdated $event)
    {
        // Automatically handled by ShouldBroadcastNow
    }
}
