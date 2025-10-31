<x-employer-dashboard-body>
    <section class="bg-gray-100">
        <div class="max-w-5xl mx-auto p-10">

            <!-- Header Section -->
            <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                <div class="flex items-start justify-between">

                    @if (session('success'))
          <div class="bg-green-100 text-green-800 p-2 rounded">
            {{ session('success') }}
          </div>
        @endif

                    <!-- Job Info -->
                    <div class="flex items-center space-x-4">
                        <img src="https://picsum.photos/200" class="w-16 h-16 rounded-xl border" alt="Company Logo">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
                            <p class="text-gray-600">{{ $job->company }}</p>
                            <p class="text-sm text-gray-500">
                                📍 {{ $job->location }} • {{ $job->schedule }} • ₹ {{ $job->salary_min }} - ₹
                                {{ $job->salary_max }}
                                • {{ $job->experience_level }} Level • Last date for apply: {{ $job->deadline }}
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row sm:space-x-3 space-y-2 sm:space-y-0">
                        <!-- Back Button -->
                        <a href="{{ route('employer.view.jobs') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition">
                            ← Back
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('employer.jobs.edit',$job->id) }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">
                            ✏️
                        </a>

                        <!-- Delete Button -->
                        <form action="" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this job?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm hover:bg-red-700 transition">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Job Description -->
            <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                <h2 class="text-xl font-semibold mb-3">Job Description</h2>
                <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
            </div>

            <!-- Responsibilities -->
            @if($job->responsibilities)
                <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-3">Responsibilities</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        @foreach(explode("\n", $job->responsibilities) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Requirements -->
            @if($job->requirements)
                <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-3">Requirements</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        @foreach(explode("\n", $job->requirements) as $req)
                            <li>{{ $req }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Skills -->
            @if($job->skills_required)
                <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-3">Skills Required</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $job->skills_required) as $skill)
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-sm font-medium">
                                {{ trim($skill) }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Company Info -->
            <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
                <h2 class="text-xl font-semibold mb-3">About Company</h2>
                <p class="text-gray-700 leading-relaxed">{{ $job->about_company }}</p>
            </div>

            <!-- Footer Info -->
            <div class="bg-white shadow-md rounded-2xl p-6 flex justify-between items-center">
                <p class="text-gray-700 text-sm">Posted on: {{ $job->posted }}</p>
            </div>
        </div>
    </section>

    <div class="bg-gray-100 border-t border-gray-200 p-8 text-center text-gray-900">
        <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
    </div>
</x-employer-dashboard-body>