<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
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
        <h1 class="text-3xl font-bold text-indigo-600">Workly</h1>

        <!-- Center Nav Links -->
        <ul class="hidden md:flex space-x-6 absolute left-1/2 transform -translate-x-1/2">
          <!-- Dashboard -->
          <li>
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard')
  ? 'text-gray-100 font-bold bg-indigo-600 px-4 py-2 rounded'
  : 'text-gray-900 hover:text-indigo-800' }}">
              Dashboard
            </a>
          </li>

          <!-- Jobs Dropdown -->
          <li class="relative">
            <button onclick="toggleDropdown('jobs-desktop')" class="{{ request()->routeIs('user.joblist', 'user.applied-jobs', 'user.saved-jobs')
  ? 'text-gray-100 font-bold bg-indigo-600 px-4 py-2 rounded'
  : 'text-gray-700 hover:text-indigo-600' }}">
              Jobs
            </button>
            <ul id="jobs-desktop"
              class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden transition-all duration-200 z-50">
              <li><a href="{{ route('user.joblist') }}" class="block px-4 py-2 hover:bg-gray-100">Job List</a></li>
              <li><a href="{{ route('user.applied-jobs') }}" class="block px-4 py-2 hover:bg-gray-100">Job
                  Applications</a></li>
              <li><a href="{{ route('user.saved-jobs') }}" class="block px-4 py-2 hover:bg-gray-100">My Jobs</a></li>
            </ul>
          </li>

          <!-- Profile Dropdown -->
          <li class="relative">
            <button onclick="toggleDropdown('profile-desktop')" class="{{ request()->routeIs('user.personal-info', 'user.skill-index', 'user.experience', 'user.education', 'user.resume')
  ? 'text-gray-100 font-bold bg-indigo-600 px-4 py-2 rounded'
  : 'text-gray-700 hover:text-indigo-600' }}">
              Profile
            </button>
            <ul id="profile-desktop"
              class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden transition-all duration-200 z-50">
              <li><a href="{{ route('user.personal-info') }}" class="block px-4 py-2 hover:bg-gray-100">Personal
                  Info</a></li>
              <li><a href="{{ route('user.skill-index') }}" class="block px-4 py-2 hover:bg-gray-100">Skills</a></li>
              <li><a href="{{ route('user.experience') }}" class="block px-4 py-2 hover:bg-gray-100">Experiences</a>
              </li>
              <li><a href="{{ route('user.education')}}" class="block px-4 py-2 hover:bg-gray-100">Education</a></li>
              <li><a href="{{ route('user.resume')}}" class="block px-4 py-2 hover:bg-gray-100">Resume Upload</a></li>
            </ul>
          </li>

          <!-- Notifications Dropdown -->
          <li class="relative">
            <button onclick="toggleDropdown('notifications-desktop')" class="text-gray-700 hover:text-indigo-600">
              Notifications
            </button>
            <ul id="notifications-desktop"
              class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden transition-all duration-200 z-50">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">All Notifications</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Unread</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Job Alerts</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Application Updates</a></li>
            </ul>
          </li>

          <!-- Help -->
          <li class="relative">
            <button onclick="toggleDropdown('help-desktop')" class="text-gray-700 hover:text-indigo-600">
              Help & Support
            </button>
            <ul id="help-desktop"
              class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden transition-all duration-200 z-50">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">FAQ</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Contact Support</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Live Chat</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Guides & Tutorials</a></li>
            </ul>
          </li>

          <!-- Settings -->
          <li class="relative">
            <button onclick="toggleDropdown('settings-desktop')" class="text-gray-700 hover:text-indigo-600">
              Settings
            </button>
            <ul id="settings-desktop"
              class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden transition-all duration-200 z-50">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile Settings</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Privacy Settings</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Notification Settings</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Account Security</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Delete / Deactivate Account</a></li>
            </ul>
          </li>
        </ul>

        <!-- User Section (Right Side) -->
        <div class="hidden md:flex items-center space-x-4">
          <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User profile picture">
          <span class="font-semibold text-gray-700">{{ Auth::user()->name }}</span>
          <button class="relative">
            <span class="material-icons">🔔</span>
            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">3</span>
          </button>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
              Logout
            </button>
          </form>
        </div>

        <!-- Hamburger (Mobile) -->
        <div class="md:hidden">
          <button id="menu-btn" class="text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </nav>

      <!-- Mobile Menu -->
      <div id="mobile-menu" class="md:hidden hidden bg-gray-800 text-white">
        <ul class="p-4 space-y-2">
          <li><a href="{{ route('user.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a></li>
          <li>
            <button onclick="toggleDropdown('jobs-mobile')" class="w-full text-left px-4 py-2 hover:bg-gray-700">
              Jobs
            </button>
            <ul id="jobs-mobile" class="hidden pl-4 mt-1 space-y-1">
              <li><a href="{{ route('user.joblist') }}" class="block px-4 py-2 hover:bg-gray-700">Job List</a></li>
              <li><a href="{{ route('user.applied-jobs') }}" class="block px-4 py-2 hover:bg-gray-700">Job
                  Applications</a></li>
              <li><a href="{{ route('user.saved-jobs') }}" class="block px-4 py-2 hover:bg-gray-700">My Jobs</a></li>
            </ul>
          </li>
          <li>
            <button onclick="toggleDropdown('profile-mobile')" class="w-full text-left px-4 py-2 hover:bg-gray-700">
              Profile
            </button>
            <ul id="profile-mobile" class="hidden pl-4 mt-1 space-y-1">
              <li><a href="{{ route('user.personal-info') }}" class="block px-4 py-2 hover:bg-gray-700">Personal
                  Info</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Skills</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Experiences</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Resume Upload</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Education</a></li>
            </ul>
          </li>
          <!-- Repeat for Profile, Notifications, Help, Settings -->
          <li class="flex items-center space-x-3 pt-4 border-t border-gray-700">
            <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full" alt="User profile picture">
            <span class="font-semibold">{{ Auth::user()->name }}</span>
            <button class="relative">
              <span class="material-icons">🔔</span>
              <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">3</span>
            </button>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="w-full text-left px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                Logout
              </button>
            </form>
          </li>
        </ul>
      </div>

      <!-- Scripts -->
      <script>
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));

        function toggleDropdown(id) {
          // Close all dropdowns first
          document.querySelectorAll('ul[id$="-desktop"], ul[id$="-mobile"]').forEach(menu => {
            if (menu.id !== id) menu.classList.add('hidden');
          });

          // Toggle the selected one
          const dropdown = document.getElementById(id);
          dropdown.classList.toggle('hidden');
        }

        // Close dropdowns if click outside
        document.addEventListener('click', (e) => {
          if (!e.target.closest('li.relative') && !e.target.closest('#mobile-menu')) {
            document.querySelectorAll('ul[id$="-desktop"], ul[id$="-mobile"]').forEach(menu => {
              menu.classList.add('hidden');
            });
          }
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