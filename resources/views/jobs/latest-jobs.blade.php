<x-layout>
    <section>

        {{-- Header --}}
        <div>
            <x-header />
        </div>

        {{-- Hero Section --}}
        <div class="relative h-80 md:h-96">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('images/job-page.jpg') }}');"></div>
            <div class="absolute inset-0 bg-black/40"></div>

            <div class="relative text-white py-20 px-8 text-center">
                <h1 class="text-4xl font-bold mt-10 mb-2">Latest Job Opportunities</h1>
                <p class="text-lg opacity-90">Explore top featured jobs and trending openings.</p>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="max-w-5xl mx-auto mt-14 grid md:grid-cols-3 gap-8 text-center">
            <div class="bg-white p-6 shadow rounded-xl">
                <h3 class="text-3xl font-bold text-blue-600">{{ $totalJobs }}</h3>
                <p class="text-gray-600">Active Jobs</p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl">
                <h3 class="text-3xl font-bold text-green-600">{{ $totalCompanies }}</h3>
                <p class="text-gray-600">Companies</p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl">
                <h3 class="text-3xl font-bold text-purple-600">{{ $totalApplicants }}</h3>
                <p class="text-gray-600">Applicants</p>
            </div>
        </div>

        {{-- Featured Jobs --}}
        <div class="mt-10 mb-10 px-6">
            <h2 class="mb-10 text-gray-900 font-bold text-3xl text-center">
                Featured Jobs
            </h2>

            <div class="grid lg:grid-cols-3 gap-10">
                @forelse ($featuredJobs as $job)
                    <x-job-card :$job />
                @empty
                    <p class="text-center col-span-3 text-gray-600">No featured jobs available.</p>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $featuredJobs->links() }}
            </div>
        </div>

        {{-- All Jobs --}}
        <div class="mt-10 mb-10 px-6">
            <h2 class="mb-10 text-gray-900 font-bold text-3xl text-center">
                All Job Listings
            </h2>

            <div class="grid lg:grid-cols-3 gap-10">
                @forelse ($jobs as $job)
                    <x-job-card :$job />
                @empty
                    <p class="text-center col-span-3 text-gray-600">No jobs available.</p>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $jobs->links() }}
            </div>
        </div>

        {{-- Newsletter Section --}}
        <div class="bg-blue-50 py-14 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">
                Get Weekly Job Alerts
            </h2>
            <p class="text-gray-600 mb-6">Subscribe to stay updated on new job opportunities.</p>

            <form action="" method="POST" class="max-w-md mx-auto flex gap-3">
                @csrf
                <input type="email" name="email" placeholder="Enter your email"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600">

                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Subscribe
                </button>
            </form>
        </div>

        {{-- Footer --}}
        <div class="bg-gray-100 border-t border-gray-300 p-8 text-center text-gray-900">
            <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
        </div>

    </section>
</x-layout>