<x-user-dashboard-body>
    <section class="ms-5 mt-10 overflow-auto">
        <h3 class="text-xl mt-2 mb-2 font-semibold text-gray-800">Saved Jobs</h3>
        <div class="grid lg:grid-cols-3 gap-8">
            @forelse($savedJobs as $saved)
                <div class="relative p-5 border rounded-xl bg-white shadow-md hover:shadow-lg transition">
                    <h2 class="font-semibold text-lg text-gray-900">{{ $saved->job->title }}</h2>
                    <h4 class="text-md font-semibold text-gray-800">{{ $saved->job->company }}</h4>
                    <p class="text-sm text-gray-600">{{ $saved->job->employer->name }}</p>
                    <p class="text-sm text-gray-700 mt-2">💰 {{ $saved->job->salary }}</p>
                    <p class="text-sm text-gray-700">📍 {{ $saved->job->location }}</p>
                    <div class="flex space-x-3">
                        <form action="{{ route('jobs.unsave', $saved->job->id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-indigo-600 text-white rounded">
                                <i class="fa-solid fa-bookmark"></i> Unsave
                            </button>
                        </form>
                        <a href="{{ route('user-jobs.view', $saved->job->id) }}"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded font-medium shadow">
                            View
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-900 text-2xl font-semibold">No saved jobs yet.</p>
            @endforelse
        </div>
    </section>
</x-user-dashboard-body>