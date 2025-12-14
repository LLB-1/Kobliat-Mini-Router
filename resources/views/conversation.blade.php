<x-layout>
    <!-- Chat Container -->
    <div class="flex flex-col h-[calc(100vh-200px)] bg-white rounded-lg shadow overflow-hidden">

        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4 border-b flex-shrink-0">
            <h2 class="text-2xl font-bold">{{ $conversation->customer->name }}</h2>
            <p class="text-blue-100 text-sm">Conversation #{{ $conversation->id }}</p>
        </div>

        <!-- Messages Area -->
        <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
            @forelse ($conversation->messages as $message)
                @if ($message->customer_id != 0)
                    <div class="flex justify-start">
                        <div class="max-w-xs lg:max-w-md px-4 py-2 rounded-lg bg-gray-300 text-gray-900">
                            <p class="text-sm">{{ $message->message }}</p>
                            <p class="text-xs text-gray-600 mt-1">
                                {{ $message->sent_at->format('H:i') }}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="flex justify-end">
                        <div class="max-w-xs lg:max-w-md px-4 py-2 rounded-lg bg-blue-600 text-white">
                            <p class="text-sm">{{ $message->message }}</p>
                            <p class="text-xs text-blue-100 mt-1">
                                {{ $message->sent_at->format('H:i') }}
                            </p>
                        </div>
                    </div>
                @endif
            @empty
                <div class="flex items-center justify-center h-full">
                    <p class="text-gray-500">No messages yet. Start the conversation!</p>
                </div>
            @endforelse
        </div>

        <!-- Input Area -->
        <div class="border-t p-4 bg-white flex-shrink-0">
            <form class="flex gap-3">
                @csrf
                <a class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition"
                    href="{{ route('conversations.index') }}">
                    back
                </a>
                <input type="text" name="message" placeholder="Type your message..."
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                    required>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
                    Send
                </button>
            </form>
        </div>

    </div>
</x-layout>
