<x-user-dashboard-body>
  <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-6 overflow-auto">

    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-6">

      <!-- Welcome + Profile Completion -->
      <div class="bg-white p-6 rounded-lg shadow mt-5">
        <h2 class="text-2xl font-semibold">
          Welcome, <span class="text-indigo-600">{{ Auth::user()->name }}</span>
        </h2>
        <p class="text-gray-500">Full Stack Developer</p>

        <div class="mt-4">
          <p class="text-sm text-gray-600 mb-2">Profile Completion</p>

          @php
            $completion = Auth::user()->profileCompletion();
          @endphp

          <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-indigo-600 h-3 rounded-full" style="width: {{ $completion }}%"></div>
          </div>

          <p class="text-xs text-gray-500 mt-1">{{ $completion }}% Complete</p>
        </div>
      </div>
      @php
        $sections = [
          'Personal Info' => Auth::user()->personalInfo()->exists(),
          'Skills' => Auth::user()->skills()->exists(),
          'Education' => Auth::user()->education()->exists(),
          'Experience' => Auth::user()->experiences()->exists(),
          'Resume Upload' => !empty(Auth::user()->resume),
        ];
      @endphp

      <ul class="mt-2 text-sm">
        @foreach ($sections as $name => $completed)
          @if (!$completed)
            <li class="text-red-500">Fill {{ $name }}</li>
          @endif
        @endforeach
      </ul>


      <!-- Quick Actions -->
      <div class="bg-white p-6 rounded-lg shadow grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        <a href="{{ route('user.personal-info') }}"
          class="mt-3 bg-indigo-100 text--indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-gray-100">
          Edit Profile
        </a>
        <a href="{{ route('user.resume') }}"
          class="mt-3 bg-indigo-100 text--indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-gray-100">
          Upload Resume
        </a>
        <a href="#"
          class="mt-3 bg-indigo-100 text--indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-gray-100">
          Search Jobs
        </a>
        <a href="{{ route('user.saved-jobs') }}"
          class="mt-3 bg-indigo-100 text--indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-gray-100">
          Saved Jobs
        </a>
      </div>

      <!-- Recent Applications -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Recent Applications</h3>
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="text-gray-600">
              <th class="pb-2">Job Title</th>
              <th class="pb-2">Company</th>
              <th class="pb-2">Date</th>
              <th class="pb-2">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($applications as $application)
              <tr class="border-t">
                <td class="py-2">{{ $application->job->title }}</td>
                <td>{{ $application->job->company }}</td>
                <td>{{ $application->job->created_at }}</td>
                {{-- <td><span class="text-green-600 font-medium">Shortlisted</span></td> --}}
              </tr>
            @endforeach

            {{-- <tr class="border-t">
              <td class="py-2">React Developer</td>
              <td>CodeWorks</td>
              <td>12 Sep 2025</td>
              <td><span class="text-yellow-600 font-medium">Interview</span></td>
            </tr>
            <tr class="border-t">
              <td class="py-2">Backend Engineer</td>
              <td>DataSoft</td>
              <td>10 Sep 2025</td>
              <td><span class="text-red-600 font-medium">Rejected</span></td>
            </tr> --}}
          </tbody>
        </table>
      </div>

      <!-- Recommended Jobs -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Recommended Jobs</h3>
        <div class="space-y-4">
          @foreach ($recommendedJobs as $recommendedJob)
            <div class="border p-4 rounded-lg flex justify-between items-center">
              <div>
                <h4 class="font-semibold">{{ $recommendedJob->title }}</h4>
                <p class="text-gray-500 text-sm">{{ $recommendedJob->company }} • {{ $recommendedJob->location }}</p>
              </div>
              <a href="{{ route('jobs.view', $recommendedJob->id) }}"
                class="mt-3 bg-indigo-100 text--indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-gray-100">
                View
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <!-- Right Column -->
    <div class="space-y-6">

      <!-- Notifications -->
      <div class="bg-white p-6 rounded-lg shadow mt-5">
        <h3 class="text-lg font-semibold mb-4">Notifications</h3>
        <ul class="space-y-3 text-sm text-gray-600">
          <li>✅ Your application for Backend Engineer is shortlisted.</li>
          <li>📢 5 new Laravel jobs available in Chennai.</li>
          <li>💬 Employer viewed your profile.</li>
        </ul>
      </div>

      <!-- Analytics -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Your Stats</h3>
        <div class="space-y-3">
          <p>📄 <span class="font-bold">12</span> Applications this month</p>
          <p>👀 <span class="font-bold">34</span> Profile Views</p>
          <p>📥 <span class="font-bold">5</span> Resume Downloads</p>
        </div>
      </div>

      <!-- Saved Jobs -->
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold mb-4">Saved Jobs</h3>
        @foreach ($savedJobs as $savedJob)
          <ul class="space-y-2 text-sm">
            <li>🔖 {{ $savedJob->title }} – {{ $savedJob->company }}</li>
          </ul>
        @endforeach
        <a href="{{ route('user.saved-jobs') }}" class="mt-3 text-indigo-600 hover:underline">
          View All
        </a>

      </div>
    </div>
  </div>
</x-user-dashboard-body>