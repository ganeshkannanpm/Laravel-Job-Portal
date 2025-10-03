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
          <p class="text-2xl font-bold text-indigo-600">45</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Job Seekers</h3>
          <p class="text-2xl font-bold text-green-600">350</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Jobs Posted</h3>
          <p class="text-2xl font-bold text-blue-600">120</p>
        </div>
        <div class="bg-white p-4 shadow rounded-lg text-center">
          <h3 class="text-lg font-semibold">Applications</h3>
          <p class="text-2xl font-bold text-yellow-600">950</p>
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
              <tr class="border-t">
                <td class="px-4 py-2">Rajesh Kumar</td>
                <td class="px-4 py-2">TechWave Ltd</td>
                <td class="px-4 py-2">3</td>
                <td class="px-4 py-2">28 Sep 2025</td>
              </tr>
              <tr class="border-t">
                <td class="px-4 py-2">Sneha Patel</td>
                <td class="px-4 py-2">DesignHub</td>
                <td class="px-4 py-2">1</td>
                <td class="px-4 py-2">25 Sep 2025</td>
              </tr>
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
                <th class="px-4 py-2">Employer</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Posted On</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t">
                <td class="px-4 py-2">React Developer</td>
                <td class="px-4 py-2">TechWave Ltd</td>
                <td class="px-4 py-2 text-green-600">Active</td>
                <td class="px-4 py-2">30 Sep 2025</td>
              </tr>
              <tr class="border-t">
                <td class="px-4 py-2">Data Analyst</td>
                <td class="px-4 py-2">DesignHub</td>
                <td class="px-4 py-2 text-yellow-600">Pending</td>
                <td class="px-4 py-2">27 Sep 2025</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>
  </div>
</body>
</x-admin-dashboard-body>