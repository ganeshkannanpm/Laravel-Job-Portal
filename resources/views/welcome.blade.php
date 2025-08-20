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
            <x-job-card />
            <x-job-card />
            <x-job-card />
        </div>

        <div class="mt-8">
            <h2 class=" mb-4 ms-4 text-white font-bold text-2xl">
                <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                Recent Jobs
            </h2>
            <x-recent-jobs />
        </div>

        <div>
            <x-faq />
        </div>

        <div class="w-full">
            <x-footer />
        </div>
    </section>

</x-layout>