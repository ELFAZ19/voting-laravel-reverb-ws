<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/polls', [PollController::class, 'index']);
    Route::get('/polls/{id}', [PollController::class, 'show']);
    Route::post('/polls/{id}/vote', [PollController::class, 'vote']);
});

// Optional: Public polls (if needed later)
Route::get('/polls/public', [PollController::class, 'indexPublic']);
