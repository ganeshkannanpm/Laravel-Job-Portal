<x-user-dashboard-body>
  <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Left Column -->
    <div class="lg:col-span-2 space-y-6">

      <!-- Welcome + Profile Completion -->
      <div
        class="bg-white p-6 rounded-xl shadow transition hover:shadow-xl hover:-translate-y-1 duration-200 mt-5">
        <h2 class="text-2xl font-semibold">
          Welcome, <span class="text-indigo-600">{{ Auth::guard('web')->user()->name }}</span>
        </h2>

        <div class="mt-4">
          <p class="text-sm text-gray-600 mb-2">Profile Completion</p>

          @php
            $completion = Auth::user()->profileCompletion();
          @endphp

          <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
            <div class="bg-indigo-600 h-3 rounded-full transition-all duration-500"
              style="width: {{ $completion }}%">
            </div>
          </div>

          <p class="text-xs text-gray-500 mt-1">{{ $completion }}% Complete</p>
        </div>

        <!-- Missing Sections -->
        @php
          $sections = [
            'Personal Info' => Auth::user()->personalInfo()->exists(),
            'Skills' => Auth::user()->skills()->exists(),
            'Education' => Auth::user()->education()->exists(),
            'Experience' => Auth::user()->experiences()->exists(),
            'Resume Upload' => !empty(Auth::user()->resume),
          ];
        @endphp

        <ul class="mt-4 text-sm space-y-1">
          @foreach ($sections as $name => $completed)
            @if (!$completed)
              <li class="text-red-500">⚠️ Fill {{ $name }}</li>
            @endif
          @endforeach
        </ul>
      </div>

      <!-- Quick Actions -->
      <div
        class="bg-white p-6 rounded-xl shadow transition hover:shadow-xl hover:-translate-y-1 duration-200 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        
        <a href="{{ route('user.personal-info') }}"
          class="bg-indigo-50 text-indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-white transition">
          Edit Profile
        </a>

        <a href="{{ route('user.resume') }}"
          class="bg-indigo-50 text-indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-white transition">
          Upload Resume
        </a>

        <a href="#"
          class="bg-indigo-50 text-indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-white transition">
          Search Jobs
        </a>

        <a href="{{ route('user.saved-jobs') }}"
          class="bg-indigo-50 text-indigo-700 px-6 py-3 rounded-lg hover:bg-indigo-700 hover:text-white transition">
          Saved Jobs
        </a>
      </div>

      <!-- Recent Applications -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition duration-200">
        <h3 class="text-lg font-semibold mb-4">Recent Applications</h3>

        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="text-gray-600 border-b">
              <th class="pb-2">Job Title</th>
              <th class="pb-2">Company</th>
              <th class="pb-2">Applied on</th>
              <th class="pb-2">Status</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($applications as $application)
              <tr class="border-b hover:bg-gray-50 transition">
                <td class="py-2">{{ $application->job->title }}</td>
                <td>{{ $application->job->company }}</td>
                <td>{{ $application->job->created_at }}</td>
                <td>
                  <span class="font-medium
                    @if ($application->status === 'Hired') text-green-600
                    @elseif ($application->status === 'Pending') text-yellow-600
                    @elseif ($application->status === 'Reviewed') text-gray-600
                    @elseif ($application->status === 'Rejected') text-red-600
                    @elseif ($application->status === 'Shortlisted') text-indigo-600
                    @endif
                  ">
                    {{ $application->status }}
                  </span>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Recommended Jobs -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition duration-200">
        <h3 class="text-lg font-semibold mb-4">Recommended Jobs</h3>

        <div class="space-y-4">
          @foreach ($recommendedJobs as $recommendedJob)
            <div
              class="border p-4 rounded-lg flex justify-between items-center hover:shadow-lg hover:-translate-y-1 transition duration-200">
              
              <div>
                <h4 class="font-semibold">{{ $recommendedJob->title }}</h4>
                <p class="text-gray-500 text-sm">
                  {{ $recommendedJob->company }} • {{ $recommendedJob->location }}
                </p>
              </div>

              <a href="{{ route('user-jobs.view', $recommendedJob->id) }}"
                class="bg-indigo-50 text-indigo-700 px-6 py-2 rounded-lg hover:bg-indigo-700 hover:text-white transition">
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
      <div
        class="bg-white p-6 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition duration-200 mt-5">
        
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-semibold">Notifications</h3>
          <a href="{{ route('user.notifications') }}" class="text-sm text-indigo-600 hover:text-indigo-800">View All</a>
        </div>

        @if ($latestNote)
          <div class="border-b pb-3 mb-3 hover:bg-gray-50 rounded transition p-2">
            <div class="flex justify-between items-center mb-1">
              <h4 class="font-semibold">{{ $latestNote->job->title }}</h4>
              <span class="text-xs text-gray-500">
                {{ $latestNote->created_at->format('d M Y, h:i A') }}
              </span>
            </div>

            <p class="text-gray-700 text-sm line-clamp-3">{{ $latestNote->note }}</p>

            <div class="flex justify-between items-center text-xs text-gray-500 mt-2">
              <div class="flex items-center gap-2">
                @if($latestNote->mode === 'Reminder')
                  <i class="fa-regular fa-bell text-indigo-600"></i>
                @elseif($latestNote->mode === 'Feedback')
                  <i class="fa-regular fa-comment-dots text-indigo-600"></i>
                @elseif($latestNote->mode === 'Follow-up')
                  <i class="fa-solid fa-reply text-indigo-600"></i>
                @else
                  <i class="fa-regular fa-note-sticky text-indigo-600"></i>
                @endif
                <span class="font-medium">{{ $latestNote->mode }}</span>
              </div>
              <span>Added by: <span class="font-medium">{{ $latestNote->creator->name ?? 'Unknown' }}</span></span>
            </div>
          </div>
        @else
          <p class="text-gray-500 text-sm text-center">No new notifications.</p>
        @endif
      </div>

      <!-- Analytics -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition duration-200">
        <h3 class="text-lg font-semibold mb-4">Your Stats</h3>

        <div class="space-y-3 text-sm">
          <p>📄 <span class="font-bold">{{ $totalApplications }}</span> Applications this month</p>
          <p>👀 <span class="font-bold">34</span> Profile Views</p>
          <p>📥 <span class="font-bold">5</span> Resume Downloads</p>
        </div>
      </div>

      <!-- Saved Jobs -->
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-xl hover:-translate-y-1 transition duration-200">
        <h3 class="text-lg font-semibold mb-4">Saved Jobs</h3>

        @foreach ($savedJobs as $savedJob)
          <ul class="space-y-2 text-sm">
            <li class="hover:text-indigo-700 transition">🔖 {{ $savedJob->title }} – {{ $savedJob->company }}</li>
          </ul>
        @endforeach

        <a href="{{ route('user.saved-jobs') }}" class="mt-3 text-indigo-600 hover:underline">View All</a>
      </div>

    </div>

  </div>
</x-user-dashboard-body>
