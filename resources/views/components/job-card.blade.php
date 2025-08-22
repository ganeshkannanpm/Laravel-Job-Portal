<div class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition">

    <!-- Job Title -->
    <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>

    <!-- Employer -->
    <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>

    <!-- Salary -->
    <div class="mt-3 flex items-center text-gray-700 text-sm">
        💰 <span class="ml-2">{{ $job->salary }}</span>
    </div>

    <!-- Location -->
    <div class="mt-1 flex items-center text-gray-700 text-sm">
        📍 <span class="ml-2">{{ $job->location }}</span>
    </div>

    <!-- Job Type -->
    <div class="mt-3">
        <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
           {{ $job->schedule }}
        </span>
    </div>

    <!-- Apply Button -->
    <div class="mt-4">
        <x-forms.button>Apply Now</x-forms.button>
    </div>

</div>