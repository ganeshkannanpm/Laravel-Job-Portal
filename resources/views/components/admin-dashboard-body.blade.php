<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100 font-sans">

    <div class="flex">

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ">

            <!-- Navbar -->
            <nav class="fixed top-0 left-0 right-0 bg-white shadow-md px-6 py-4 flex justify-between items-center z-50">

                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="{{asset('images/Workly_logo_dashboard.jpg')}}" alt="Logo" class="h-12 w-12">
                    <h1 class="text-3xl font-bold text-indigo-600">Workly</h1>
                </div>
                <!-- Center Nav Links -->
                <ul class="hidden md:flex space-x-6">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') 
    ? 'text-gray-100 font-bold bg-indigo-600 px-4 py-2 rounded'
    : 'text-gray-700 hover:text-indigo-700 hover:underline' }}">
                        Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-employers') }}" 
                        class="{{ request()->routeIs('admin.manage-employers','admin.employer.profile','admin.edit.account.info','admin.employer.jobs')
    ? 'text-gray-100 font-bold bg-indigo-600 px-4 py-2 rounded'
    : 'text-gray-700 hover:text-indigo-700 hover:underline' }}">
                        Manage Employers
                        </a>
                    </li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-800 no-underline hover:underline">Manage
                            Candidates</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-800 no-underline hover:underline">Jobs
                            Approval</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-indigo-800 no-underline hover:underline">Reports</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-700 hover:text-indigo-800 no-underline hover:underline">Settings</a></li>
                </ul>

                <!-- User Section -->
                <div class="hidden md:flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User profile picture">
                    <span class="font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                    <button class="relative">
                        <span class="material-icons">🔔</span>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">5</span>
                    </button>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                </div>

                <!-- Hamburger -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-gray-800 text-white">
                <ul class="p-4 space-y-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Manage Employers</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Manage Candidates</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Jobs Approval</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Reports</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Settings</a></li>

                    <li class="flex items-center space-x-3 pt-4 border-t border-gray-700">
                        <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User profile picture">
                        <span class="font-semibold">{{ Auth::user()->name }}</span>
                        <button class="relative">
                            <span class="material-icons">🔔</span>
                            <span
                                class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">5</span>
                        </button>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full text-left px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Mobile Menu Toggle Script -->
            <script>
                const menuBtn = document.getElementById('menu-btn');
                const mobileMenu = document.getElementById('mobile-menu');

                menuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            </script>


            <div class="p-6 mt-6">
                {{ $slot }}
            </div>

        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>