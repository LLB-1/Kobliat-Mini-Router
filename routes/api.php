<?php

// routes/api.php
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ConversationController;
use Illuminate\Support\Facades\Route;

Route::get('conversations', [ConversationController::class, 'index']);
Route::post('messages', [MessageController::class, 'store']);
