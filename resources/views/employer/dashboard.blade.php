<x-employer-dashboard-body>
<!-- Sidebar + Main Layout -->
    <div class="flex min-h-screen">
     <!-- Main Content -->
    <main class="flex-1 p-6">

      <!-- Top Bar -->
      <header class="flex justify-between items-center mt-6 mb-6">
        <h2 class="text-2xl font-bold">Employer Dashboard</h2>
        <h3 class="text-2xl font-semibold">
          Welcome, <span class="text-indigo-600">{{ Auth::guard('employer')->user()->name }}</span>
        </h3>
      </header>

       
      <!-- Stats Cards -->
      <section class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Jobs Posted</h3>
          <p class="text-2xl font-bold text-indigo-600">12</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Active Jobs</h3>
          <p class="text-2xl font-bold text-green-600">5</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Applications</h3>
          <p class="text-2xl font-bold text-blue-600">89</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Shortlisted</h3>
          <p class="text-2xl font-bold text-yellow-600">14</p>
        </div>
      </section>

      <!-- Recent Applications -->
      <section class="bg-white p-4 shadow rounded-lg mb-6">
        <h3 class="text-xl font-semibold mb-4">Recent Applications</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">Candidate</th>
                <th class="px-4 py-2">Job Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Applied On</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t">
                <td class="px-4 py-2">John Doe</td>
                <td class="px-4 py-2">Frontend Developer</td>
                <td class="px-4 py-2 text-green-600">Shortlisted</td>
                <td class="px-4 py-2">01 Oct 2025</td>
              </tr>
              <tr class="border-t">
                <td class="px-4 py-2">Alice Smith</td>
                <td class="px-4 py-2">Backend Developer</td>
                <td class="px-4 py-2 text-yellow-600">Under Review</td>
                <td class="px-4 py-2">30 Sep 2025</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!-- Posted Jobs -->
      <section class="bg-white p-4 shadow rounded-lg">
        <h3 class="text-xl font-semibold mb-4">Your Posted Jobs</h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-left text-sm">
            <thead class="bg-gray-100">
              <tr>
                <th class="px-4 py-2">Job Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Applications</th>
                <th class="px-4 py-2">Posted On</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t">
                <td class="px-4 py-2">UI/UX Designer</td>
                <td class="px-4 py-2 text-green-600">Active</td>
                <td class="px-4 py-2">23</td>
                <td class="px-4 py-2">25 Sep 2025</td>
              </tr>
              <tr class="border-t">
                <td class="px-4 py-2">PHP Developer</td>
                <td class="px-4 py-2 text-red-600">Closed</td>
                <td class="px-4 py-2">40</td>
                <td class="px-4 py-2">15 Sep 2025</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>
  </div>
</body>


</x-employer-dashboard-body>