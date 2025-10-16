<x-employer-dashboard-body>
    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Jobs | Employer Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

  <!-- Page Container -->
  <div class="min-h-screen flex flex-col md:flex-row">

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manage Jobs</h1>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
          + Post New Job
        </button>
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
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">Frontend Developer</td>
              <td class="px-6 py-4">24</td>
              <td class="px-6 py-4">
                <span class="bg-green-100 text-green-700 text-xs px-3 py-1 rounded-full">Active</span>
              </td>
              <td class="px-6 py-4">Oct 5, 2025</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded">Edit</button>
                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded">Delete</button>
              </td>
            </tr>

            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">Backend Engineer</td>
              <td class="px-6 py-4">10</td>
              <td class="px-6 py-4">
                <span class="bg-yellow-100 text-yellow-700 text-xs px-3 py-1 rounded-full">Pending</span>
              </td>
              <td class="px-6 py-4">Oct 8, 2025</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded">Edit</button>
                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded">Delete</button>
              </td>
            </tr>

            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium">UI/UX Designer</td>
              <td class="px-6 py-4">17</td>
              <td class="px-6 py-4">
                <span class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">Closed</span>
              </td>
              <td class="px-6 py-4">Sept 25, 2025</td>
              <td class="px-6 py-4 text-right space-x-2">
                <button class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded">Edit</button>
                <button class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-sm rounded">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-600">Showing 1–3 of 10 jobs</p>
        <div class="flex items-center space-x-2">
          <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">&laquo;</button>
          <button class="px-3 py-1 bg-indigo-600 text-white rounded">1</button>
          <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">2</button>
          <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">3</button>
          <button class="px-3 py-1 bg-gray-200 rounded hover:bg-gray-300">&raquo;</button>
        </div>
      </div>
    </main>
  </div>

</body>
</html>

</x-employer-dashboard-body>