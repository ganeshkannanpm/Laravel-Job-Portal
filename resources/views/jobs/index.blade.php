<x-layout>
    <section>
        <div>
            <x-header />
        </div>
        <div class="mb-8">
            <x-banner />
        </div>
        <h2 class="mb-5 text-white font-bold text-2xl text-center">
            <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
            Latest Jobs
        </h2>
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach ( $featuredJobs as $job )
                 <x-job-card :$job />
            @endforeach
        </div>

        <div class="mt-8">
            <h2 class=" mb-4 ms-4 text-white font-bold text-2xl">
                <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                Recent Jobs
            </h2>
            <div class="space-y-3">
                @foreach ( $jobs as $job )
                <x-recent-jobs :$job />
            @endforeach
            </div>
        </div>

        <div>
            <x-faq />
        </div>

        <div class="w-full">
            <x-footer />
        </div>
    </section>
</x-layout>