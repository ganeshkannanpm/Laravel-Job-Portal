<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-600 font-sans">

    <div class="flex h-screen" x-data="{ sidebarOpen: false, openMenu: null }">

        <!-- Sidebar -->
        <x-user-sidebar :user="$user" />

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

            <section class="ms-5 mt-10">
                    <div class="grid lg:grid-cols-3 gap-8">
                        @forelse($savedJobs as $saved)
                            <div class="relative p-5 border rounded-xl bg-white shadow-md hover:shadow-lg transition">
                                <h2 class="font-semibold text-lg text-gray-900">{{ $saved->job->title }}</h2>
                                <p class="text-sm text-gray-600">{{ $saved->job->employer->name }}</p>
                                <p class="text-sm text-gray-700 mt-2">💰 {{ $saved->job->salary }}</p>
                                <p class="text-sm text-gray-700">📍 {{ $saved->job->location }}</p>
                                <form action="{{ route('jobs.unsave', $saved->job->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-gray-800 text-white rounded">
                                        <i class="fa-solid fa-bookmark"></i> Unsave
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-white">No saved jobs yet.</p>
                        @endforelse
                    </div>
                </section>
        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>