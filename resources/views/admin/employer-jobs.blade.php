<x-admin-dashboard-body>

    <body class="bg-gray-50 text-gray-800">

        <!-- Page Header -->
        <header class="bg-white shadow-sm mt-10">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
                <h1 class="text-2xl font-semibold">Employer Jobs</h1>
                <a href="{{ route('admin.employer.profile',$profile->employer_id) }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Back to Profile
                </a>
            </div>
        </header>

        <!-- Employer Info -->
        <section class="max-w-7xl mx-auto px-6 py-6">
            <div class="bg-white shadow rounded-lg p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4 border-b pb-2">Employer Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Company Name</p>
                        <p class="font-medium">{{ $profile->company_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Employer ID</p>
                        <p class="font-medium">EMP-{{ str_pad($profile->employer_id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p class="font-medium">{{ $profile->recruiter_email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Contact</p>
                        <p class="font-medium">{{ $profile->contact_phone }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Joined Date</p>
                        <p class="font-medium">{{ $profile->created_at->format('M d, Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Jobs Posted</p>
                        <p class="font-medium text-blue-600">{{ $totalJobs }}</p>
                    </div>
                </div>
            </div>

            <!-- Jobs Table -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold border-b pb-2">Jobs Posted</h2>
                    <div>
                        <input type="text" placeholder="Search jobs..."
                            class="border border-gray-300 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 text-sm">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left border">Job ID</th>
                                <th class="px-4 py-2 text-left border">Title</th>
                                <th class="px-4 py-2 text-left border">Location</th>
                                <th class="px-4 py-2 text-left border">Salary</th>
                                <th class="px-4 py-2 text-left border">Status</th>
                                <th class="px-4 py-2 text-left border">Posted On</th>
                                <th class="px-4 py-2 text-center border">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jobs as $job)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border">JOB{{ str_pad($job->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-4 py-2 border font-medium">{{ $job->title }}</td>
                                    <td class="px-4 py-2 border">{{ $job->location }}</td>
                                    <td class="px-4 py-2 border">{{ $job->salary_min  }} - {{ $job->salary_max }}</td>
                                    <td class="px-4 py-2 border">
                                        <span
                                            class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">{{ $job->status }}</span>
                                    </td>
                                    <td class="px-4 py-2 border">{{ $job->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-2 border text-center space-x-2">
                                        <a href="{{ route('admin.employer.view.jobs', $job->id) }}"
                                            class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">View</a>
                                        {{-- <button
                                            class="px-2 py-1 text-xs bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">Suspend</button>
                                        <button
                                            class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200">Delete</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </body>
</x-admin-dashboard-body>