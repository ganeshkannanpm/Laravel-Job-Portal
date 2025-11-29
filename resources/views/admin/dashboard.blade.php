<x-admin-dashboard-body>
<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">

    <!-- Main Content -->
    <main class="flex-1 p-6">

      <!-- Top Bar -->
      <header class="flex justify-between items-center mt-6 mb-8">
        <h2 class="text-3xl font-bold tracking-tight text-gray-800">Admin Dashboard</h2>
      </header>

      <!-- Stats Cards -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-md font-medium text-gray-600">Employers</h3>
          <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalEmployers }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-md font-medium text-gray-600">Job Seekers</h3>
          <p class="text-3xl font-bold text-green-600 mt-1">{{ $totalJobSeekers }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-md font-medium text-gray-600">Jobs Posted</h3>
          <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalJobs }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-md font-medium text-gray-600">Applications</h3>
          <p class="text-3xl font-bold text-yellow-600 mt-1">{{ $totalApplications }}</p>
        </div>
      </section>

      <!-- Recent Employers -->
      <section class="bg-white p-5 rounded-xl shadow mb-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Recent Employers</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr class="text-gray-700">
                <th class="px-4 py-2 font-medium">Employer</th>
                <th class="px-4 py-2 font-medium">Company</th>
                <th class="px-4 py-2 font-medium">Jobs Posted</th>
                <th class="px-4 py-2 font-medium">Joined</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employers as $employer)
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-2">{{ $employer->name }}</td>
                  <td class="px-4 py-2">{{ $employer->company_name }}</td>
                  <td class="px-4 py-2">{{ $employer->jobs_count }}</td>
                  <td class="px-4 py-2">{{ $employer->created_at->format('M d, Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>

      <!-- Recent Jobs -->
      <section class="bg-white p-5 rounded-xl shadow">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Recent Job Postings</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr class="text-gray-700">
                <th class="px-4 py-2 font-medium">Job Title</th>
                <th class="px-4 py-2 font-medium">Company</th>
                <th class="px-4 py-2 font-medium">Employer</th>
                <th class="px-4 py-2 font-medium">Status</th>
                <th class="px-4 py-2 font-medium">Posted On</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($latestJobs as $job)
                <tr class="border-t hover:bg-gray-50">
                  <td class="px-4 py-2">{{ $job->title }}</td>
                  <td class="px-4 py-2">{{ $job->company }}</td>
                  <td class="px-4 py-2">{{ $job->employer->name }}</td>
                  <td class="px-4 py-2">{{ $job->status }}</td>
                  <td class="px-4 py-2">{{ $job->created_at->format('M d, Y') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>

    </main>
  </div>
</body>
</x-admin-dashboard-body>
