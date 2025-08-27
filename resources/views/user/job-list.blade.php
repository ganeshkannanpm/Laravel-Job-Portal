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
                    @foreach ($featuredJobs as $job)
                        <div
                            class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">
                            <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>
                            <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>
                            <div class="mt-3 flex items-center text-gray-700 text-sm">
                                💰 <span class="ml-2">{{ $job->salary }}</span>
                            </div>
                            <div class="mt-1 flex items-center text-gray-700 text-sm">
                                📍 <span class="ml-2">{{ $job->location }}</span>
                            </div>
                            <div class="mt-3">
                                <span
                                    class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
                                    {{ $job->schedule }}
                                </span>
                            </div>
                            <div class="mt-4">
                               
                                <button type="button" onclick="window.location.href='{{ route('user.apply-job') }}'"
                                    class="px-4 py-2 rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition">
                                    Apply
                                </button>

                                @php
                                    $isSaved = Auth::check() && Auth::user()->savedJobs->contains($job->id);
                                @endphp

                                <form action="{{ route('jobs.save', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit"
                                        class="ms-4 {{ $isSaved ? 'text-green-600' : 'text-gray-600 hover:text-gray-800' }}">
                                        @if($isSaved)
                                            <i class="fa-solid fa-bookmark"></i> Saved
                                        @else
                                            <i class="fa-regular fa-bookmark"></i> Save
                                        @endif
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</body>

</html>