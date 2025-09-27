<x-user-dashboard-body>
    <section class="ms-5 mt-10 overflow-auto">
        <div class="grid lg:grid-cols-3 gap-8">
            @forelse($savedJobs as $saved)
                <div class="relative p-5 border rounded-xl bg-white shadow-md hover:shadow-lg transition">
                    <h2 class="font-semibold text-lg text-gray-900">{{ $saved->job->title }}</h2>
                    <h4 class="text-md font-semibold text-gray-800">{{ $saved->job->company }}</h4>
                    <p class="text-sm text-gray-600">{{ $saved->job->employer->name }}</p>
                    <p class="text-sm text-gray-700 mt-2">💰 {{ $saved->job->salary }}</p>
                    <p class="text-sm text-gray-700">📍 {{ $saved->job->location }}</p>
                    <form action="{{ route('jobs.unsave', $saved->job->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded">
                            <i class="fa-solid fa-bookmark"></i> Unsave
                        </button>
                    </form>
                </div>
            @empty
                <p class="text-white">No saved jobs yet.</p>
            @endforelse
        </div>
    </section>
</x-user-dashboard-body>