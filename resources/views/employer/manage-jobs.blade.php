<x-employer-dashboard-body>
  <body class="bg-gray-100 font-sans">
    <main class="lg:col-span-9 mt-10">
      <!-- Page Container -->
      <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Main Content -->
        <main class="flex-1 p-6">
          <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manage Jobs</h1>
            <a href="{{ route('employer.jobs.create') }}"
              class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
              + Post New Job
            </a>
          </div>

          <!-- Job List -->
          <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full table-auto">
              <thead class="bg-indigo-600 text-white text-left">
                <tr>
                  <th class="px-6 py-3">Job Title</th>
                  <th class="px-6 py-3">Applications</th>
                  <th class="px-6 py-3">Status</th>
                  <th class="px-6 py-3">Posted On</th>
                  <th class="px-6 py-3 text-right">Actions</th>
                </tr>
              </thead>
              
              <tbody class="divide-y divide-gray-200 text-gray-700">

                @foreach ($manageJobs as $job )
                  <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-medium">{{ $job->title }}</td>
                  <td class="px-6 py-4">{{ $job->job_application_count }}</td>
                  <td class="px-6 py-4">
                    <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Active</span>
                  </td>
                  <td class="px-6 py-4">Oct 5, 2025</td>
                  <td class="px-6 py-4 text-right space-x-2">
                    <a href="{{ route('employer.view.applications') }}"
                      class="mt-3 bg-indigo-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-600 transition">
                      view
                    </a>
                    <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded">Delete</button>
                  </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          <div class="flex justify-between items-center mt-6">
    <p class="text-sm text-gray-600">
        Showing {{ $manageJobs->firstItem() }}–{{ $manageJobs->lastItem() }} of {{ $manageJobs->total() }} jobs
    </p>
    <div>
        {{ $manageJobs->links() }}
    </div>
</div>

        </main>
      </div>
    </main>
  </body>
</x-employer-dashboard-body>