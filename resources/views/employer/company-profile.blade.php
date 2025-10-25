<x-employer-dashboard-body>
<body class="bg-gray-50 text-gray-800">
  <main class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-10">
    <!-- Header -->
    <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
      <div class="flex items-center gap-4">
        <!-- Company Logo -->
        <div class="w-20 h-20 bg-white rounded-lg shadow flex items-center justify-center overflow-hidden">
          <img src="/path/to/logo.png" alt="Company Logo" class="object-contain w-full h-full">
        </div>
        <div>
          <h1 class="text-2xl sm:text-3xl font-semibold">Company Name</h1>
          <p class="text-sm text-gray-500">Industry / Business Type • 50–200 employees</p>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-lg shadow-sm text-sm hover:shadow-md">Edit</a>
        <button class="inline-flex items-center gap-2 px-4 py-2 bg-red-50 text-red-600 border border-red-100 rounded-lg text-sm">Suspend</button>
      </div>
    </header>

    <!-- Top summary cards -->
    <section class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
      <div class="bg-white p-4 rounded-lg shadow-sm">
        <p class="text-xs text-gray-500">Account Status</p>
        <p class="mt-1 font-medium">Active</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-sm">
        <p class="text-xs text-gray-500">Verified</p>
        <p class="mt-1 font-medium">Yes</p>
      </div>
      <div class="bg-white p-4 rounded-lg shadow-sm">
        <p class="text-xs text-gray-500">Jobs Posted</p>
        <p class="mt-1 font-medium">12</p>
      </div>
    </section>

    <!-- Main content grid -->
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- Left column: company details -->
      <div class="lg:col-span-2 space-y-6">
        <article class="bg-white p-6 rounded-lg shadow-sm">
          <h2 class="text-lg font-semibold mb-3">Company Details</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500">Company Name</p>
              <p class="mt-1 font-medium">Acme Solutions Pvt Ltd</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Industry / Business Type</p>
              <p class="mt-1 font-medium">Software Development</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Company Size</p>
              <p class="mt-1 font-medium">50–200 employees</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Website</p>
              <a href="#" class="mt-1 inline-block text-sm break-all text-blue-600">https://www.acme.example</a>
            </div>
          </div>

          <div class="mt-6">
            <p class="text-xs text-gray-500">Company Description</p>
            <p class="mt-2 text-sm leading-relaxed text-gray-700">Acme Solutions is a product-focused software company building tools for small and medium businesses. We specialise in e-commerce platforms, payment integrations and developer tooling. Our mission is to simplify infrastructure and accelerate teams.</p>
          </div>
        </article>

        <article class="bg-white p-6 rounded-lg shadow-sm">
          <h2 class="text-lg font-semibold mb-3">Contact Details</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500">Employer Name (HR/Recruiter)</p>
              <p class="mt-1 font-medium">Rita Sharma</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Email</p>
              <a href="mailto:hr@acme.example" class="mt-1 inline-block text-sm text-blue-600">hr@acme.example</a>
            </div>
            <div>
              <p class="text-xs text-gray-500">Phone Number</p>
              <p class="mt-1 font-medium">+91 98765 43210</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Office Address</p>
              <p class="mt-1 text-sm break-words">No. 12, Business Park, MG Road, Bengaluru, Karnataka, 560001</p>
            </div>
          </div>
        </article>

        <article class="bg-white p-6 rounded-lg shadow-sm">
          <h2 class="text-lg font-semibold mb-3">Account Info</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-xs text-gray-500">Employer ID / Registration Date</p>
              <p class="mt-1 font-medium">EMP-000123 • 2024-08-15</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Last Login / Activity</p>
              <p class="mt-1 font-medium">2025-10-21 18:32</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Account Status</p>
              <p class="mt-1 font-medium">Active</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Verified Status</p>
              <p class="mt-1 font-medium">Yes</p>
            </div>
          </div>
        </article>

      </div>

      <!-- Right column: stats & actions -->
      <aside class="space-y-6">
        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-base font-semibold mb-3">Activity & Stats</h3>
          <dl class="grid grid-cols-2 gap-3 text-sm">
            <div>
              <dt class="text-xs text-gray-500">Total Applicants</dt>
              <dd class="font-medium">389</dd>
            </div>
            <div>
              <dt class="text-xs text-gray-500">Resume Downloads</dt>
              <dd class="font-medium">124</dd>
            </div>
            <div>
              <dt class="text-xs text-gray-500">Rating</dt>
              <dd class="flex items-center gap-2">
                <div class="flex -space-x-1">
                  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.165c.969 0 1.371 1.24.588 1.81l-3.372 2.455a1 1 0 00-.364 1.118l1.287 3.968c.3.92-.755 1.688-1.54 1.118l-3.372-2.455a1 1 0 00-1.175 0L5.21 17.07c-.784.57-1.838-.197-1.539-1.118l1.287-3.968a1 1 0 00-.364-1.118L1.223 8.41c-.783-.57-.38-1.81.588-1.81h4.165a1 1 0 00.95-.69L9.05 2.927z"></path></svg>
                  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.165c.969 0 1.371 1.24.588 1.81l-3.372 2.455a1 1 0 00-.364 1.118l1.287 3.968c.3.92-.755 1.688-1.54 1.118l-3.372-2.455a1 1 0 00-1.175 0L5.21 17.07c-.784.57-1.838-.197-1.539-1.118l1.287-3.968a1 1 0 00-.364-1.118L1.223 8.41c-.783-.57-.38-1.81.588-1.81h4.165a1 1 0 00.95-.69L9.05 2.927z"></path></svg>
                  <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.165c.969 0 1.371 1.24.588 1.81l-3.372 2.455a1 1 0 00-.364 1.118l1.287 3.968c.3.92-.755 1.688-1.54 1.118l-3.372-2.455a1 1 0 00-1.175 0L5.21 17.07c-.784.57-1.838-.197-1.539-1.118l1.287-3.968a1 1 0 00-.364-1.118L1.223 8.41c-.783-.57-.38-1.81.588-1.81h4.165a1 1 0 00.95-.69L9.05 2.927z"></path></svg>
                </div>
                <span class="text-xs text-gray-500">4.2 / 5</span>
              </dd>
            </div>
            <div>
              <dt class="text-xs text-gray-500">Total Jobs Posted</dt>
              <dd class="font-medium">12</dd>
            </div>
          </dl>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-sm">
          <h3 class="text-base font-semibold mb-3">Optional Info</h3>
          <div class="text-sm space-y-3">
            <div>
              <p class="text-xs text-gray-500">Resume Downloads Count</p>
              <p class="mt-1 font-medium">124</p>
            </div>
            <div>
              <p class="text-xs text-gray-500">Rating / Feedback</p>
              <p class="mt-1 text-sm text-gray-700">"Responsive HR, clear job descriptions — 4/5"</p>
            </div>
          </div>
        </div>

        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
          <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg">View Jobs</a>
        </div>
      </aside>
    </section>

    <!-- Footer actions -->
    <div class="mt-8 flex flex-col sm:flex-row sm:justify-end gap-3">
      <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Edit Profile</button>
    </div>
  </main>
</body>
</x-employer-dashboard-body>