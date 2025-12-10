<x-layout>

    <x-header />

    <body class="bg-gray-100">
        <!-- Hero Section -->
        <section class="pt-24 pb-10 text-center bg-blue-50">
            <h2 class="text-3xl font-extrabold text-gray-800">Top Hiring Companies</h2>
            <p class="mt-2 text-gray-600 max-w-md mx-auto">Browse trusted companies hiring for various roles across
                multiple industries.</p>
        </section>

        <!-- Search & Filters -->
        <form method="GET" action="{{ route('jobs.companies') }}">
            <div class="max-w-6xl mx-auto p-4 mb-4">
                <div class="flex flex-col md:flex-row gap-3 md:items-center md:justify-between">

                    <!-- Search -->
                    <input type="text" name="search" placeholder="Search companies..." value="{{ request('search') }}"
                        class="w-full md:w-1/3 p-3 border rounded-xl focus:ring focus:border-blue-500" />

                    <!-- Filter -->
                    <select name="industry"
                        class="p-3 border rounded-xl w-full md:w-1/4 focus:ring focus:border-blue-500">
                        <option value="All">All Industries</option>
                        <option value="IT & Software" {{ request('industry') == 'IT & Software' ? 'selected' : '' }}>IT &
                            Software</option>
                        <option value="Finance" {{ request('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                        <option value="Healthcare" {{ request('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare
                        </option>
                        <option value="Marketing" {{ request('industry') == 'Marketing' ? 'selected' : '' }}>Marketing
                        </option>
                    </select>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <!-- Search Button -->
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-3 rounded-xl hover:bg-blue-700 transition w-full md:w-auto">
                            Search
                        </button>

                        <!-- Clear Button -->
                        <a href="{{ route('jobs.companies') }}"
                            class="bg-gray-300 text-gray-800 px-4 py-3 rounded-xl hover:bg-gray-400 transition w-full md:w-auto">
                            Clear
                        </a>
                    </div>
                </div>
            </div>
        </form>


        <script>
            document.querySelector('select[name="industry"]').addEventListener('change', function () {
                this.form.submit();
            });
        </script>


        <!-- Companies Grid -->
        <section class="max-w-6xl mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pb-20">

            <!-- Company Card -->
            @foreach ($companies as $company)
                <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $company->logo) }}" class="w-16 h-16 rounded-full" />
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $company->company_name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $company->industry }}</p>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600 text-sm">{{ $company->description }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        <span class="text-sm text-gray-700">{{ $company->jobs_count }} Open Positions</span>
                        <a href="#" class="text-blue-600 font-medium hover:underline">View</a>
                    </div>
                </div>
            @endforeach
        </section>
        <x-footer />
    </body>

</x-layout>