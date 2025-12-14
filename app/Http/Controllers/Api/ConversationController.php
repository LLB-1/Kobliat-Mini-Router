<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Customer;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

    public function store(Request $request)
    {


    }


    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        $conversation->load('messages');

        $conversationReturn = [
            'conversation_id' => $conversation->id,
            'customer_id' => $conversation->customer_id,
            'status' => $conversation->status,
            'messages' => $conversation->messages,
            'customer_name' => $conversation->customer->name,
        ];

        return response()->json($conversationReturn);
    }

    public function index()
    {
        $conversations = Conversation::all();

        return response()->json($conversations);
    }
}
