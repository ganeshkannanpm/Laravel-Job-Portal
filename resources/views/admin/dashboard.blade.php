<x-admin-dashboard-body>
<body class="bg-gray-100 font-sans">
  <div class="flex min-h-screen">

    <!-- Main Content -->
    <main class="flex-1 p-6">

      <!-- Top Bar -->
      <header class="flex justify-between items-center mt-6 mb-6">
        <h2 class="text-2xl font-bold">Admin Dashboard</h2>
      </header>

      <!-- Stats Cards -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Employers</h3>
          <p class="text-2xl font-bold text-indigo-600">{{ $totalEmployers }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Job Seekers</h3>
          <p class="text-2xl font-bold text-green-600">{{ $totalJobSeekers }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Jobs Posted</h3>
          <p class="text-2xl font-bold text-blue-600">{{ $totalJobs }}</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Applications</h3>
          <p class="text-2xl font-bold text-yellow-600">{{ $totalApplications}}</p>
        </div>
      </section>

      <!-- Recent Employers -->
      <section class="bg-white p-4 shadow rounded-lg mb-6">
        <h3 class="text-xl font-semibold mb-4">Recent Employers</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">Employer</th>
                <th class="px-4 py-2">Company</th>
                <th class="px-4 py-2">Jobs Posted</th>
                <th class="px-4 py-2">Joined</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employers as $employer )
                <tr class="border-t">
                <td class="px-4 py-2">{{ $employer->name}}</td>
                <td class="px-4 py-2">{{ $employer->company_name}}</td>
                <td class="px-4 py-2">{{ $employer->jobs_count }}</td>
                <td class="px-4 py-2">{{ $employer->created_at->format('M d, Y')}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </section>

      <!-- Recent Jobs -->
      <section class="bg-white p-4 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Recent Job Postings</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">Job Title</th>
                <th class="px-4 py-2">Company</th>
                <th class="px-4 py-2">Employer</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Posted On</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($latestJobs as $job )
                <tr class="border-t">
                <td class="px-4 py-2">{{ $job->title }}</td>
                <td class="px-4 py-2">{{ $job->company }}</td>
                <td class="px-4 py-2">{{ $job->employer->name }}</td>
                <td class="px-4 py-2">{{ $job->status}}</td>
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