<x-layout>
  <x-header />

  <section class="mt-10 bg-gray-100">
    <div class="max-w-5xl mx-auto p-10">
      <!-- Header Section -->
      <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-4">
            <img src="https://picsum.photos/200" class="w-16 h-16 rounded-xl border" alt="Company Logo">
            <div>
              <h1 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
              <p class="text-gray-600">{{ $job->company }}</p>
              <p class="text-sm text-gray-500">
                📍 {{ $job->location }} • {{ $job->schedule }} • {{ $job->salary }}
              </p>
            </div>
          </div>

          <a href="{{ route('login.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl font-medium shadow">
            Apply Now
          </a>
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
              <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">
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
        <p class="text-gray-500 text-sm">{{ $job->posted }}</p>
        <a href="{{ route('login.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-medium shadow">
          Save
        </a>
      </div>
    </div>
  </section>

  <div class="bg-indigo-600 border-t border-gray-700 p-8 text-center text-gray-100">
    <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
  </div>
</x-layout>
