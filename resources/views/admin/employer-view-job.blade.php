<x-admin-dashboard-body>
  <section class="bg-gray-100 mt-10">
    <div class="max-w-5xl mx-auto p-4 md:p-10">

      <!-- Header Section -->
      <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">

          <div class="flex items-center space-x-4">
            <img src="https://picsum.photos/200"
              class="w-14 h-14 md:w-16 md:h-16 rounded-xl border" alt="Company Logo">

            <div>
              <h1 class="text-xl md:text-2xl font-bold text-gray-800">{{ $job->title }}</h1>
              <p class="text-sm md:text-base text-gray-600">{{ $job->company }}</p>
              <p class="text-xs md:text-sm text-gray-500 leading-relaxed">
                📍 {{ $job->location }} • {{ $job->schedule }}  
                • ₹ {{ $job->salary_min }} - ₹ {{ $job->salary_max }}  
                • {{ $job->experience_level }} Level  
                • Last date: {{ $job->deadline }}
              </p>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="flex flex-row space-x-3">
            <a href="{{ route('admin.employer.jobs', $profile->employer_id) }}"
              class="px-3 py-2 bg-gray-200 text-gray-700 rounded-lg text-xs md:text-sm hover:bg-gray-300 transition">
              ← Back
            </a>

            <form action="{{ route('admin.employer.job.delete', $job->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure you want to delete this job?');">
              @csrf
              @method('DELETE')
              <button type="submit"
                class="px-3 py-2 bg-red-600 text-white rounded-lg text-xs md:text-sm hover:bg-red-700 transition">
                🗑️
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Job Description -->
      <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 mb-6">
        <h2 class="text-lg md:text-xl font-semibold mb-3">Job Description</h2>
        <p class="text-sm md:text-base text-gray-700 leading-relaxed">{{ $job->description }}</p>
      </div>

      <!-- Responsibilities -->
      <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 mb-6">
        <h2 class="text-lg md:text-xl font-semibold mb-3">Responsibilities</h2>
        <p class="text-sm md:text-base text-gray-700 leading-relaxed">{{ $job->responsibilities }}</p>
      </div>

      <!-- Skills -->
      @if($job->skills_required)
        <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 mb-6">
          <h2 class="text-lg md:text-xl font-semibold mb-3">Skills Required</h2>
          <div class="flex flex-wrap gap-2">
            @foreach($job->skills_required as $skill)
              <span
                class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-xs md:text-sm font-medium">
                {{ trim($skill) }}
              </span>
            @endforeach
          </div>
        </div>
      @endif

      <!-- Company Info -->
      <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 mb-6">
        <h2 class="text-lg md:text-xl font-semibold mb-3">About Company</h2>
        <p class="text-sm md:text-base text-gray-700 leading-relaxed">{{ $job->about_company }}</p>
      </div>

      <!-- Footer Info -->
      <div class="bg-white shadow-md rounded-2xl p-4 md:p-6 flex justify-between items-center">
        <p class="text-xs md:text-sm text-gray-700">Posted on: {{ $job->posted }}</p>
      </div>

    </div>
  </section>
</x-admin-dashboard-body>
