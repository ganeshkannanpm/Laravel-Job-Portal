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
        
            <x-job-categories />
       
        
            <x-popular-companies />
       
        
            <x-get-the-app />
       
        <x-footer />
    </section>
</x-layout>