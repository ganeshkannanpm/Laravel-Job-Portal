<x-admin-dashboard-body>

    <body class="bg-gray-50 text-gray-800">

        <!-- Page Container -->
        <div class="min-h-screen p-4 sm:p-6">

            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center mt-10 mb-6">
                <h1 class="text-2xl font-semibold mb-3 sm:mb-0">Manage Employers</h1>
                <div class="w-full sm:w-1/3">
                    <input type="text" placeholder="Search employers..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-indigo-200 focus:outline-none" />
                </div>
            </div>

            <!-- Table Container -->
            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Company Name</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($employers as $employer)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $employer->company_name }}</td>
                                <td class="px-6 py-3">{{ $employer->email }}</td>
                                <td class="px-6 py-3">

                                    @if ($employer->status === 'Active')
                                        <span class="text-green-600 font-medium">{{ $employer->status }}</span>
                                    @elseif ($employer->status === 'Suspended')
                                        <span class="text-red-600 font-medium">{{ $employer->status }}</span>
                                    @elseif ($employer->status === 'Closed')
                                        <span class="text-gray-500 font-medium">{{ $employer->status }}</span>
                                    @else
                                        <span class="text-yellow-600 font-medium">{{ $employer->status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <button class="text-blue-600 hover:underline mr-3">View</button>
                                    <button class="text-yellow-600 hover:underline mr-3">Edit</button>
                                    <button class="text-red-600 hover:underline">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6 text-sm">
                <p>Showing 1 to 3 of 10 employers</p>
                <div class="space-x-2">
                    <button class="px-3 py-1 border rounded-md hover:bg-gray-100">&laquo; Prev</button>
                    <button class="px-3 py-1 border rounded-md bg-indigo-500 text-white hover:bg-indigo-600">1</button>
                    <button class="px-3 py-1 border rounded-md hover:bg-gray-100">2</button>
                    <button class="px-3 py-1 border rounded-md hover:bg-gray-100">Next &raquo;</button>
                </div>
            </div>

        </div>

    </body>
</x-admin-dashboard-body>