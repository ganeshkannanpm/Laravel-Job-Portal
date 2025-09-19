<x-user-dashboard-body>
    <section class="ms-5 mt-10">
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach ($featuredJobs as $job)
                <div
                    class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>
                    <div class="mt-3 flex items-center text-gray-700 text-sm">
                        💰 <span class="ml-2">{{ $job->salary }}</span>
                    </div>
                    <div class="mt-1 flex items-center text-gray-700 text-sm">
                        📍 <span class="ml-2">{{ $job->location }}</span>
                    </div>
                    <div class="mt-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
                            {{ $job->schedule }}
                        </span>
                    </div>
                    <div class="mt-4">

                        @php
                            $alreadyApplied =
                                Auth::check() && $job->JobApplication()->where('user_id', Auth::id())->exists();
                        @endphp

                        @if ($alreadyApplied)
                            <button disabled
                                class="px-3 py-2 bg-gray-400 text-white rounded-lg font-semibold cursor-not-allowed">
                                Applied
                            </button>
                        @else
                            <button type="button" onclick="window.location.href='{{ route('user.apply-job', $job->id) }}'"
                                class="px-3 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition">
                                Apply
                            </button>
                        @endif
                        @php
                            $isSaved = Auth::check() && Auth::user()->savedJobs->contains($job->id);
                        @endphp

                        <form action="{{ route('jobs.save', $job->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit"
                                class="ms-4 {{ $isSaved ? 'text-green-600' : 'text-gray-600 hover:text-gray-800' }}">
                                @if ($isSaved)
                                    <i class="fa-solid fa-bookmark"></i> Saved
                                @else
                                    <i class="fa-regular fa-bookmark"></i> Save
                                @endif
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-user-dashboard-body>