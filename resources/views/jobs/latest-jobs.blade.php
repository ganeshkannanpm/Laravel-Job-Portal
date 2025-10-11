<x-layout>
    <section>
        <div>
            <x-header />
        </div>
        <div class="mt-25 mb-5">
            <h2 class="mb-5  text-gray-900 font-bold text-2xl text-center">
                <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                Latest Jobs
            </h2>
            <div class="grid lg:grid-cols-3 gap-8">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </div>
        <div class="bg-gray-100 border-t border-gray-300 p-8 text-center text-gray-900">
            <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
        </div>
    </section>
</x-layout>