<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Customer;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Store a message from external API.
     * Expects JSON: {
     *   "external_user_id": 123,
     *   "message": "Hello",
     *   "message_id": "msg_123",
     *   "sent_at": "2025-12-14 10:30:00"
     * }
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'external_user_id' => 'required|integer',
            'message' => 'required|string',
            'message_id' => 'required|string',
            'sent_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        // Check if customer exists
        $customer = Customer::where('external_id', $validated['external_user_id'])->first();

        // If customer doesn't exist, create one
        if (!$customer) {
            $customer = Customer::create([
                'external_id' => $validated['external_user_id'],
                'name' => 'Customer ' . $validated['external_user_id'],
            ]);
        }

        // Check if conversation exists for this customer
        $conversation = Conversation::where('customer_id', $customer->id)->first();

        // If no conversation exists, create one
        if (!$conversation) {
            $conversation = Conversation::create([
                'customer_id' => $customer->id,
                'status' => true,
            ]);
        }

        // Create the message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'customer_id' => $validated['external_user_id'],
            'message' => $validated['message'],
            'message_id' => $validated['message_id'],
            'sent_at' => $validated['sent_at'],
        ]);

        return response()->json([
            'success' => true,
            'message' => $message,
            'conversation_id' => $conversation->id,
        ], 201);
    }
}
