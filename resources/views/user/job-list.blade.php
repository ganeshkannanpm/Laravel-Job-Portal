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
                    {{-- <button class="bg-gray-900 text-white px-3 py-1 rounded-lg hover:bg-gray-600 text-sm md:text-base">+
                        Add New
                        Job</button> --}}
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <x-layout>
                <section>
                    <h2 class="mb-5 text-white font-bold text-2xl text-center">
                        <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                        Latest Jobs
                    </h2>
                    <div class="grid lg:grid-cols-3 gap-8 ">
                        @foreach ($featuredJobs as $job)
                            <x-job-card :$job />
                        @endforeach
                    </div>
                </section>
            </x-layout>
            
        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>