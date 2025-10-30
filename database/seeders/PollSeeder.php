<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poll;
use App\Models\Option;

class PollSeeder extends Seeder
{
    public function run()
    {
        $poll1 = Poll::create([
            'title' => 'Favorite Programming Language?',
            'description' => 'Which language do you prefer?',
            'ends_at' => now()->addDays(7),
        ]);

        $poll2 = Poll::create([
            'title' => 'Best AI Model?',
            'description' => 'Which AI model is most powerful?',
            'ends_at' => now()->addDays(14),
        ]);

        Option::create(['poll_id' => $poll1->id, 'title' => 'JavaScript']);
        Option::create(['poll_id' => $poll1->id, 'title' => 'Python']);
        Option::create(['poll_id' => $poll1->id, 'title' => 'Go']);
        Option::create(['poll_id' => $poll1->id, 'title' => 'Rust']);

        Option::create(['poll_id' => $poll2->id, 'title' => 'GPT-4']);
        Option::create(['poll_id' => $poll2->id, 'title' => 'Claude 3']);
        Option::create(['poll_id' => $poll2->id, 'title' => 'Gemini Pro']);
        Option::create(['poll_id' => $poll2->id, 'title' => 'Llama 3']);
    }
}
