<x-employer-dashboard-body>
    <section class="ms-5 mt-5">
        <div class="flex gap-6 pt-4 border-t mt-10">
            <!-- Filter Dropdown -->
            <form method="GET" action="{{ route('employer.view.jobs') }}">
                <select name="filter" onchange="this.form.submit()"
                    class="border border-gray-300 text-gray-700 text-sm rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Jobs</option>
                    <option value="featured" {{ request('filter') == 'featured' ? 'selected' : '' }}>Featured</option>
                    <option value="non-featured" {{ request('filter') == 'non-featured' ? 'selected' : '' }}>Non-Featured
                    </option>
                </select>
            </form>
            <a href="{{ route('employer.manage.jobs') }}"
                class=" bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                Back
            </a>
            <h3 class="text-xl font-semibold  text-gray-800">Posted Jobs</h3>
        </div>

        <!-- Featured Jobs -->
        @if($featuredJobs->isNotEmpty())
            <h4 class="text-lg font-semibold text-center mt-4 bg-indigo-600 text-white px-4 py-2 mb-2">Featured Jobs</h4>
            <div class="grid lg:grid-cols-3 gap-8 mb-10">
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
                        <!-- Action Buttons -->
                        <div class="mt-4 flex justify-end gap-2">
                            <a href="{{ route('employer.jobs.details',$job->id) }}"
                                class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-sm hover:bg-indigo-200">View</a>

                            <a href="#" class="text-yellow-700 px-3 py-1 bg-yellow-100 text-sm  hover:bg-yellow-200">Edit</a>

                            <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-700 px-3 py-1 bg-red-100 text-sm  hover:bg-red-200">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Non-featured Jobs -->
        @if($jobs->isNotEmpty())
            <h4 class="text-lg font-semibold text-center mt-4 bg-indigo-600 text-white px-4 py-2 mb-2">Other Jobs</h4>
            <div class="grid lg:grid-cols-3 gap-8">
                @foreach ($jobs as $job)
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
                        <!-- Action Buttons -->
                        <div class="mt-4 flex justify-end gap-2">
                            <a href="{{ route('employer.jobs.details',$job->id) }}"
                                class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-md text-sm hover:bg-indigo-200">View</a>

                            <a href="#" class="text-yellow-700 px-3 py-1 bg-yellow-100 text-sm  hover:bg-yellow-200">Edit</a>

                            <form action="#" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-700 px-3 py-1 bg-red-100 text-sm  hover:bg-red-200">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</x-employer-dashboard-body>