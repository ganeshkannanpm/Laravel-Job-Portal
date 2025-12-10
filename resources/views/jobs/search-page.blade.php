<x-layout>
    <x-header />

    <section class="mt-24 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 py-10">

            {{-- Search Summary --}}
            @if(request()->has('keyword') || request()->has('location'))
                <div class="mt-4 text-gray-700">
                    <span class="font-semibold">Showing results for:</span>

                    @if(request('keyword'))
                        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm ml-2">
                            {{ request('keyword') }}
                        </span>
                    @endif

                    @if(request('location'))
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm ml-2">
                            {{ request('location') }}
                        </span>
                    @endif

                    <a href="{{ route('job.index') }}" class="ml-4 text-red-500 underline text-sm">Clear</a>
                </div>
            @endif


            {{-- Job Results --}}
            <div class="mt-8 space-y-5">
                @forelse ($jobs as $job)
                    <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
                        <h2 class="text-xl font-bold text-gray-900">{{ $job->title }}</h2>

                        <div class="mt-1 text-gray-600">
                            <span>{{ $job->company_name }}</span> •
                            <span>{{ $job->location }}</span>
                        </div>

                        <p class="mt-2 text-gray-700">
                            {{ Str::limit($job->description, 150) }}
                        </p>

                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</span>

                            <a href="{{ route('jobs.view', $job->id) }}"
                                class="text-indigo-600 font-semibold hover:underline">
                                View Details →
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 py-10 text-lg">No jobs found.</p>
                @endforelse
            </div>


            {{-- Pagination --}}
            <div class="mt-10">
                {{ $jobs->withQueryString()->links() }}
            </div>

        </div>
    </section>

    <x-footer />
</x-layout>