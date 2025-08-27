<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-600 font-sans">

    <div class="flex h-screen" x-data="{ sidebarOpen: false, openMenu: null }">

        <!-- Sidebar -->
        <x-user-sidebar />

        <!-- Overlay (mobile) -->
        <div class="fixed inset-0 bg-black opacity-50 z-20 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition.opacity>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto ">
            <!-- Navbar -->
            <header class="flex items-center justify-between bg-white p-4 shadow-sm sticky top-0 z-10">
                <div class="flex items-center space-x-3">
                    <!-- Hamburger -->
                    <button class="md:hidden text-gray-600" @click="sidebarOpen = true">
                        <span class="material-icons">menu</span>
                    </button>
                    <h2 class="font-bold text-lg">User Dashboard</h2>
                </div>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search"
                        class="border rounded-lg px-3 py-1 w-40 md:w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <main class="p-4 md:p-6 flex-1 overflow-auto">
                <h3 class="text-xl text-white font-semibold mb-4">Applications</h3>
                <div class="bg-white rounded-lg shadow-md overflow-x-auto w-full">
                    <table class="w-full border-collapse text-sm md:text-base">
                        <thead class="bg-gray-50 text-gray-600">
                            <tr>
                                <th class="p-3 text-left">No</th>
                                <th class="p-3 text-left">Position</th>
                                <th class="p-3 text-left">Resume</th>
                                <th class="p-3 text-left">Status</th>
                                <th class="p-3 text-left">Actions</th>
                                <th class="p-3 text-left">Applied On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($applications as $application)
                                <tr class="border-b">
                                    <td class="p-3">{{  1 }}</td>
                                    <td class="p-3">{{ $application->job->title ?? 'N/A' }}</td>
                                    <td class="p-3">
                                        @if ($application->resume)
                                            <a href="/storage/resumes/resume1.pdf" target="_blank"
                                                class="text-blue-600 hover:underline">
                                                View
                                            </a>
                                        @else
                                            <span class="text-gray-400">No Resume</span>
                                        @endif
                                    </td>
                                    <td class="p-3">
                                        <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">
                                            {{ ucfirst($application->status ?? 'pending') }}
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                                Withdraw
                                            </button>
                                        </form>
                                    </td>
                                    <td class="p-3">
                                        {{ $application->created_at->format('d-m-Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-500">
                                        No applications found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>