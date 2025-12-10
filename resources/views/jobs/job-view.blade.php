<x-layout>
  <x-header />

  <section class="mt-20 bg-gray-100">
    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-10">

      <!-- Header Section -->
      <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">

          <div class="flex items-start sm:items-center gap-4">
            <img src="https://picsum.photos/200" class="w-16 h-16 rounded-xl border object-cover" alt="Company Logo">

            <div>
              <h1 class="text-xl sm:text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
              <p class="text-gray-900">{{ $job->company }}</p>

              <p class="text-sm text-gray-900 mt-1 leading-relaxed">
                📍 {{ $job->location }} • {{ $job->schedule }} <br class="sm:hidden">
                ₹ {{ $job->salary_min }} - ₹ {{ $job->salary_max }} • {{ $job->experience_level }} Level <br
                  class="sm:hidden">
                Last date: {{ $job->deadline }}
              </p>
            </div>
          </div>

          <!-- Apply Button -->
          <div class="sm:mt-0 mt-2">
            @auth
              <a href="{{ route('user.apply-job', $job->id) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-medium shadow block text-center">
                Apply Now
              </a>
            @endauth

            @guest
              <a href="{{ route('login') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-medium shadow block text-center">
                Apply Now
              </a>
            @endguest
          </div>
        </div>
      </div>

      <!-- Job Description -->
      <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
        <h2 class="text-lg sm:text-xl font-semibold mb-3">Job Description</h2>
        <p class="text-gray-700 leading-relaxed">{{ $job->description }}</p>
      </div>

      <!-- Responsibilities -->
      @if($job->responsibilities)
        <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
          <h2 class="text-lg sm:text-xl font-semibold mb-3">Responsibilities</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            @foreach(explode("\n", $job->responsibilities) as $item)
              <li>{{ $item }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Requirements -->
      @if($job->requirements)
        <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
          <h2 class="text-lg sm:text-xl font-semibold mb-3">Requirements</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            @foreach(explode("\n", $job->requirements) as $req)
              <li>{{ $req }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Skills -->
      @if($job->skills_required)
        <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
          <h2 class="text-lg sm:text-xl font-semibold mb-3">Skills Required</h2>

          <div class="flex flex-wrap gap-2">
            @foreach($job->skills_required as $skill)
              <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-xs sm:text-sm font-medium">
                {{ trim($skill) }}
              </span>
            @endforeach
          </div>
        </div>
      @endif

      <!-- Company -->
      <div class="bg-white shadow-md rounded-2xl p-4 sm:p-6 mb-6">
        <h2 class="text-lg sm:text-xl font-semibold mb-3">About Company</h2>
        <p class="text-gray-700 leading-relaxed">{{ $job->about_company }}</p>
      </div>

      <!-- Footer Info -->
      <div
        class="bg-white shadow-md rounded-2xl p-4 sm:p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
        <p class="text-gray-900 text-sm">
          Posted On: {{ $job->created_at->format('M d, Y') }}
        </p>
      </div>

    </div>
  </section>

  <footer class="bg-gray-100 border-t border-gray-300 p-6 text-center text-gray-900 text-sm">
    <p>&copy; {{ date('Y') }} Workly. All rights reserved.</p>
  </footer>

</x-layout>