<x-admin-dashboard-body>

  <body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow mt-10">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-700">Manage Candidates</h1>
        <a href="#add-candidate" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
          + Add Candidate
        </a>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-6">

      <!-- Search & Filter -->
<form method="GET" action="{{ route('admin.manage-candidates') }}" class="bg-white shadow rounded-lg p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

  <!-- Search -->
  <input type="text"
         name="search"
         value="{{ request('search') }}"
         placeholder="Search candidates..."
         class="w-full md:w-1/3 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 outline-none" 
         oninput="this.form.submit()"
  />

  <!-- Filter -->
  <select name="status"
          class="w-full md:w-1/4 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500 outline-none"
          onchange="this.form.submit()">
      <option value="">All</option>
      <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
      <option value="Reviewed" {{ request('status') == 'Reviewed' ? 'selected' : '' }}>Reviewed</option>
      <option value="Shortlisted" {{ request('status') == 'Shortlisted' ? 'selected' : '' }}>Shortlisted</option>
      <option value="Hired" {{ request('status') == 'Hired' ? 'selected' : '' }}>Hired</option>
      <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
  </select>
</form>


      <!-- Candidates Table -->
      <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applied For
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

            @foreach ($applications as $application)
              <tr>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $application->id }}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $application->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $application->email }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $application->job->title }}</td>
                <td class="px-6 py-4">
                  @if ($application->status === 'Hired')
                    <span
                      class="bg-green-100 rounded-full px-2 py-1 text-green-600 text-xs font-semibold">{{ $application->status }}</span>
                  @elseif ($application->status === 'Pending')
                    <span
                      class="bg-yellow-100 rounded-full px-2 py-1 text-yellow-600 text-xs font-semibold">{{ $application->status }}</span>
                  @elseif ($application->status === 'Reviewed')
                    <span
                      class="bg-gray-100 rounded-full px-2 py-1 text-gray-600 text-xs font-semibold">{{ $application->status }}</span>
                  @elseif ($application->status === 'Rejected')
                    <span
                      class="bg-red-100 rounded-full px-2 py-1 text-red-600 text-xs font-semibold">{{ $application->status }}</span>
                  @elseif ($application->status === 'Shortlisted')
                    <span
                      class="bg-indigo-100 rounded-full px-2 py-1 text-indigo-600 text-xs font-semibold">{{ $application->status }}</span>
                  @endif
                </td>
                <td class="px-6 py-4 text-right text-sm space-x-2">
                  <button class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded hover:bg-indigo-200">View</button>
                  <button class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">Edit</button>
                  <button class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>

        <div class="mt-6">
          {{ $applications->links() }}
        </div>

      </div>

    </main>
  </body>
</x-admin-dashboard-body>