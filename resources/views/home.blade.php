<x-layout>
    <!-- Messages Container -->
    <div id="messages-container" class="space-y-4 mb-6">
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <h3 class="text-red-800 font-semibold mb-2">Errors</h3>
                <ul class="text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                <p class="text-green-800">{{ session('success') }}</p>
            </div>
        @endif

        @if (session('warning'))
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <p class="text-yellow-800">{{ session('warning') }}</p>
            </div>
        @endif

        @if (session('info'))
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <p class="text-blue-800">{{ session('info') }}</p>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Conversations</h2>

        @forelse ($conversations as $conversation)
            <div class="border-b pb-4 mb-4 last:border-b-0">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Conversation #{{ $conversation->id }}</h3>
                        <p class="text-sm text-gray-600">Customer: {{ $conversation->customer->name ?? 'Unknown' }}</p>
                        <p class="text-sm text-gray-500">Created: {{ $conversation->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    <span
                        class="inline-block px-3 py-1 rounded-full text-sm font-medium {{ $conversation->status ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $conversation->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-500">No conversations yet.</p>
            </div>
        @endforelse

        <!-- Pagination -->
        @if ($conversations->hasPages())
            <div class="mt-6">
                {{ $conversations->links() }}
            </div>
        @endif
    </div>

</x-layout>
