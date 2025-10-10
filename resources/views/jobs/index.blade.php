<x-layout>
    <section>
        <div>
            <x-header />
        </div>
        <div class="mb-8">
            <x-banner />
        </div>
        <h2 class="mb-5  text-gray-900 font-bold text-2xl text-center">
            <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
            Latest Jobs
        </h2>
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach ($featuredJobs as $job)
                <x-job-card :$job />
            @endforeach
        </div>
        <div>
            <x-job-categories />
        </div>


        {{-- <div class="mt-8">
            <h2 class=" mb-4 ms-4 text-white font-bold text-2xl">
                <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                Recent Jobs
            </h2>
            <div class="space-y-3">
                @foreach ( $jobs as $job )
                <x-recent-jobs :$job />
                @endforeach
            </div>
        </div> --}}

        {{-- <div>
            <x-how-it-works />
        </div>
        <div>
            <x-faq />
        </div> --}}
        <x-footer />
    </section>
</x-layout>