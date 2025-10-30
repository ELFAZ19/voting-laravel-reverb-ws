<?php
 

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Option;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\VoteUpdated;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::with('options')->get();
        return response()->json($polls);
    }

    public function show($id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        return response()->json($poll);
    }

    public function vote(Request $request, $id)
    {
        $request->validate([
            'option_id' => 'required|exists:options,id',
        ]);

        $poll = Poll::findOrFail($id);
        $user = Auth::user();

        // Prevent multiple votes
        if (Vote::where('user_id', $user->id)->where('poll_id', $poll->id)->exists()) {
            return response()->json(['error' => 'You have already voted on this poll.'], 409);
        }

        //For even better safety in high-concurrency environments, consider:
        $option = Option::lockForUpdate()->findOrFail($request->option_id);
        $votes_count = $option->increment('votes_count');

        // Create vote record
        Vote::create([
            'user_id' => $user->id,
            'poll_id' => $poll->id,
            'option_id' => $request->option_id,
        ]);

        // Broadcast update with correct data
        broadcast(new VoteUpdated($poll->id, $request->option_id, $votes_count));

        return response()->json([
            'message' => 'Vote recorded successfully',
            'votes_count' => $votes_count
        ]);
    }
}