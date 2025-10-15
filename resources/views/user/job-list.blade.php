<x-user-dashboard-body>
    <div class="mt-10">
        @php
            $profileRoutes = [
                'user.joblist' => 'Latest Jobs',
                'user.applied-jobs' => 'Applications',
                'user.saved-jobs' => 'Saved Jobs',
            ];

            $breadcrumbs = getBreadcrumbs([
                'Job' => $profileRoutes
            ]);
        @endphp
        <x-breadcrumb :links="$breadcrumbs" />
    </div>

    <section class="ms-5 mt-5">
        <h3 class="text-xl mt-4 mb-4 font-semibold text-gray-800">Latest Jobs</h3>
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach ($featuredJobs as $job)
                <div
                    class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">
                    <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>
                    <h4 class="text-md font-semibold text-gray-800">{{ $job->company }}</h4>
                    <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>
                    <div class="mt-3 flex items-center text-gray-700 text-sm">
                        💰 <span class="ml-2">₹ {{ $job->salary_min }} - ₹ {{ $job->salary_max }}</span>
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
                            {{-- <a href="{{ route('jobs.view', $job->id) }}" type="submit"
                                class=" text-gray-100 text-left px-4 py-2 ms-4 bg-indigo-600 rounded-md hover:bg-gray-800">
                                View
                            </a> --}}
                            @auth
                                {{-- If user is logged in --}}
                                <a href="{{ route('user-jobs.view', $job->id) }}"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
                                    View
                                </a>
                            @endauth

                            @guest
                                {{-- If user is NOT logged in --}}
                                <a href="{{ route('jobs.view', $job->id) }}"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
                                    View
                                </a>
                            @endguest
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