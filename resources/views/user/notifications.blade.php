<x-user-dashboard-body>
  <body class="bg-gray-100 min-h-screen">
    <!-- Main Content -->
    <main class="max-w-5xl mx-auto mt-10 px-4">
      <div class="bg-white p-6 rounded-lg shadow-sm">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Notifications</h2>

        <!-- Notifications List -->
        <div class="space-y-4">

          @forelse ($notes as $note)
            <!-- Single Notification -->
            <div class="flex items-start justify-between bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition">
              <div class="flex items-start space-x-3">
                <div class="bg-indigo-100 text-indigo-600 p-2 rounded-full">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 8v4m0 4v4m0-8h.01" />
                  </svg>
                </div>

                <div>
                  <h4 class="font-semibold text-gray-900">{{ $note->title }}</h4>
                  <p class="text-gray-600 text-sm">
                    Your interview for
                    <span class="font-medium">{{ $note->job->title }}</span> at
                    <span class="font-medium">{{ $note->job->company }}</span> is scheduled on
                    <span class="font-medium">{{ $note->created_at->format('d M Y, h:i A') }}</span>.
                  </p>
                  <p class="text-xs text-gray-400 mt-1">
                    {{ $note->created_at->diffForHumans() }}
                  </p>
                </div>
              </div>

              <!-- Delete Button -->
              <form action="{{ route('notifications.destroy', $note->id) }}" method="POST"
                onsubmit="return confirm('Delete this notification?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-gray-400 hover:text-indigo-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </form>
            </div>
          @empty
            <p class="text-gray-500 text-sm text-center">No new notifications.</p>
          @endforelse

        </div>

        <!-- Clear All Button (optional) -->
        <div class="mt-6 text-right">
          <form action="{{ route('notifications.clear') }}" method="POST"
            onsubmit="return confirm('Clear all notifications?');">
            @csrf
            @method('DELETE')
            <button type="submit"
              class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-md transition">
              Clear All
            </button>
          </form>
        </div>
      </div>
    </main>
  </body>
</x-user-dashboard-body>