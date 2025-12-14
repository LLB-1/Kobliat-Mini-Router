<?php

use App\Http\Controllers\ConversationController;
use App\Models\Conversation;
use Illuminate\Support\Facades\Route;

Route::get('/', [ConversationController::class, 'index']);