<x-employer-dashboard-body>

  <div class="flex min-h-screen bg-gray-50">

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-6">

      <!-- TOP HEADER -->
      <header
        class="flex justify-between items-center mb-8 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
        
        <h2 class="text-2xl font-bold text-gray-800">Employer Dashboard</h2>

        <div class="flex items-center gap-4">
          <div class="text-right">
            {{-- <p class="text-sm text-gray-500">Logged in as</p>
            <h3 class="text-xl font-semibold text-indigo-600 tracking-wide">
              {{ Auth::guard('employer')->user()->name }}
            </h3> --}}
          </div>
          {{-- <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center shadow-inner">
            <i class="fa-solid fa-user text-indigo-600"></i>
          </div> --}}
        </div>
      </header>


      <!-- STATS CARDS -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        
        <!-- CARD -->
        <div
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 cursor-pointer">
          <h3 class="text-gray-600 font-medium mb-1">Jobs Posted</h3>
          <p class="text-3xl font-bold text-indigo-600">{{ $totalJobs }}</p>
        </div>

        <div
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 cursor-pointer">
          <h3 class="text-gray-600 font-medium mb-1">Active Jobs</h3>
          <p class="text-3xl font-bold text-green-600">{{ $activeJobs }}</p>
        </div>

        <div
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 cursor-pointer">
          <h3 class="text-gray-600 font-medium mb-1">Applications</h3>
          <p class="text-3xl font-bold text-blue-600">{{ $totalApplications }}</p>
        </div>

        <div
          class="bg-white p-6 rounded-xl shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 border border-gray-100 cursor-pointer">
          <h3 class="text-gray-600 font-medium mb-1">Shortlisted</h3>
          <p class="text-3xl font-bold text-yellow-600">{{ $shortlisted }}</p>
        </div>

      </section>


      <!-- RECENT APPLICATIONS -->
      <section class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100 mb-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Recent Applications</h3>

        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead>
              <tr class="bg-gray-100 text-gray-700 border-b">
                <th class="px-4 py-3">Candidate</th>
                <th class="px-4 py-3">Job Title</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Applied On</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($applications as $application)
                <tr class="border-b hover:bg-indigo-50 transition">
                  <td class="px-4 py-3">{{ $application->name }}</td>
                  <td class="px-4 py-3">{{ $application->job->title }}</td>
                  <td class="px-4 py-3">
                    @if ($application->status === 'Hired')
                      <span class="text-green-600 font-medium">{{ $application->status }}</span>
                    @elseif ($application->status === 'Pending')
                      <span class="text-yellow-600 font-medium">{{ $application->status }}</span>
                    @elseif ($application->status === 'Reviewed')
                      <span class="text-gray-600 font-medium">{{ $application->status }}</span>
                    @elseif ($application->status === 'Rejected')
                      <span class="text-red-600 font-medium">{{ $application->status }}</span>
                    @elseif ($application->status === 'Shortlisted')
                      <span class="text-indigo-600 font-medium">{{ $application->status }}</span>
                    @endif
                  </td>
                  <td class="px-4 py-3">{{ $application->job->created_at }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>


      <!-- POSTED JOBS -->
      <section class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition border border-gray-100">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Your Posted Jobs</h3>

        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead>
              <tr class="bg-gray-100 text-gray-700 border-b">
                <th class="px-4 py-3">Job Title</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Applications</th>
                <th class="px-4 py-3">Posted On</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($postedJobs as $job)
                <tr class="border-b hover:bg-indigo-50 transition">
                  <td class="px-4 py-3">{{ $job->title }}</td>
                  <td class="px-4 py-3 text-green-600">Active</td>
                  <td class="px-4 py-3">{{ $job->job_application_count }}</td>
                  <td class="px-4 py-3">{{ $job->created_at }}</td>
                </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      </section>

    </main>
  </div>

</x-employer-dashboard-body>
