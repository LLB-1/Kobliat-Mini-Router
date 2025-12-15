<?php

// routes/api.php
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ConversationController;
use Illuminate\Support\Facades\Route;

Route::get('conversations', [ConversationController::class, 'index']);
Route::get('conversations/{conversation}', [ConversationController::class, 'show']);
Route::post('/messages', [MessageController::class, 'store']);
