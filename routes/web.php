<?php

use App\Http\Controllers\ConversationController;
use App\Models\Conversation;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConversationController::class, 'index'])->name('conversations.index');
Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
Route::post('/messages', [\App\Http\Controllers\MessageController::class, 'store'])->name('messages.store');