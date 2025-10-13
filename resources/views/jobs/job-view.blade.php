<x-layout>
  <x-header />
  <section class="mt-20 bg-gray-100">
    <div class="max-w-5xl mx-auto p-10">
      <!-- Header Section -->
      <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-4">
            <img src="https://picsum.photos/200" class="w-16 h-16 rounded-xl border" alt="Company Logo">
            <div>
              <h1 class="text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
              <p class="text-gray-900">{{ $job->company }}</p>
              <p class="text-sm text-gray-900">
                📍 {{ $job->location }} • {{ $job->schedule }} • ₹ {{ $job->salary_min }} - ₹ {{ $job->salary_max }}
                 • {{ $job->experience_level }} Level • Last date for apply: {{ $job->deadline }}
              </p>
            </div>
          </div>

          @auth
            {{-- If user is logged in --}}
            <a href="{{ route('user.apply-job', $job->id) }}"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
              Apply Now
            </a>
          @endauth

          @guest
            {{-- If user is NOT logged in --}}
            <a href="{{ route('login.create') }}"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
              Apply Now
            </a>
          @endguest

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
        <p class="text-gray-900 text-sm">Posted On {{ $job->created_at }}</p>
      </div>
    </div>
  </section>

  <div class="bg-gray-100 border-t border-gray-300 p-8 text-center text-gray-900">
    <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
  </div>
</x-layout>