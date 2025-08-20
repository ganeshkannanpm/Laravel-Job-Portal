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
    <aside
      class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 shadow-md transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:inset-0 overflow-y-auto"
      :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" aria-label="Sidebar">

      <!-- Logo -->
      <div class="p-4 flex items-center space-x-2 border-b mt-1">
        <h1 class="text-3xl ms-8 font-bold text-white">Workly</h1>
      </div>

      <!-- Profile -->
      <div class="p-4 border-b flex items-center space-x-3">
        <img src="https://i.pravatar.cc/50" class="w-10 h-10 rounded-full" alt="User profile picture">
        <div>
          <h2 class="font-semibold text-white">Franklin Jr</h2>
          <p class="text-sm text-gray-100">User</p>
        </div>
      </div>

      <!-- Menu -->
      <nav class="flex-1 p-4 overflow-y-auto">
        <ul class="space-y-4">

          <!-- Section: Dashboard -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider">Main</li> -->
          <li>
            <a href="#"
              class="flex items-center p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :class="{ 'bg-gray-700 text-white': activePage === 'dashboard' }">
              <span class="material-icons mr-2">dashboard</span>Dashboard
            </a>
          </li>

          <!-- Section: Jobs -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Jobs</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">work</span> Jobs Management</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Job List</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Job Applications</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Apply Job</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Saved Jobs</a></li>
            </ul>
          </li>

          <!-- Section: Profile -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Profile</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">account_circle</span> Profile</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Personal Info</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Resume Upload</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Skills & Experience</a></li>
            </ul>
          </li>

          <!-- Section: Notifications -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Profile</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">notifications</span>Notifications</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">All Notifications</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Unread</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Job Alerts</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Application Updates</a></li>
            </ul>
          </li>

          <!-- Section: Help & Support -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Profile</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">help</span>Help & Support</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">FAQ</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Contact Support</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Live Chat</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Guides & Tutorials</a></li>
            </ul>
          </li>

          <!-- Section: Settings -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Profile</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">settings</span>Settings</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Profile Settings</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Privacy Settings</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Notification Settings</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Account Security</a></li>
              <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-700 text-gray-100">Delete / Deactivate Account</a></li>
            </ul>
          </li>

          <!-- Section: Logout -->
          <!-- <li class="text-xs uppercase text-gray-400 tracking-wider pt-4">Profile</li> -->
          <li x-data="{ open: false }">
            <button @click="open = !open"
              class="flex items-center justify-between w-full p-2 rounded-lg transition-colors duration-150 hover:bg-gray-700 text-gray-100"
              :aria-expanded="open.toString()">
              <span class="flex items-center"><span class="material-icons mr-2">logout</span>Logout</span>
              <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
            </button>
            <ul x-show="open" x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform -translate-y-2"
              x-transition:enter-end="opacity-100 transform translate-y-0"
              x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100 transform translate-y-0"
              x-transition:leave-end="opacity-0 transform -translate-y-2" class="ml-6 mt-2 space-y-2">
              <li><a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 text-white">
          <span class="material-icons mr-2">logout</span> Logout
        </a></li>
          
            </ul>
          </li>

          <!-- <div class="p-4 border-t border-gray-700 space-y-2">
        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-700 text-gray-100">
          <span class="material-icons mr-2">settings</span> Settings
        </a>
        <a href="#" class="flex items-center p-2 rounded-lg hover:bg-red-600 text-white">
          <span class="material-icons mr-2">logout</span> Logout
        </a>
      </div> -->

        </ul>
      </nav>

      <!-- Bottom Section -->
      
    </aside>


    <!-- Overlay (mobile) -->
    <div class="fixed inset-0 bg-black opacity-50 z-20 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"
      x-transition.opacity>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ">

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
          <button class="bg-gray-900 text-white px-3 py-1 rounded-lg hover:bg-gray-600 text-sm md:text-base">+ Add New
            Job</button>
          <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
        </div>
      </header>

      <!-- Full-width Table -->
      <main class="p-4 md:p-6 flex-1 overflow-auto">
        <h3 class="text-xl text-white font-semibold mb-4">Job Applications</h3>
        <div class="bg-white rounded-lg shadow-md overflow-x-auto w-full">
          <table class="w-full border-collapse text-sm md:text-base">
            <thead class="bg-gray-50 text-gray-600">
              <tr>
                <th class="p-3 text-left">No</th>
                <th class="p-3 text-left">Position</th>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">Applied On</th>
                <th class="p-3 text-left">Submitted By</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="p-3">1</td>
                <td class="p-3">Database Analyst</td>
                <td class="p-3">Jordan</td>
                <td class="p-3">jordan@gmail.com</td>
                <td class="p-3">1234567890</td>
                <td class="p-3">24-01-2024</td>
                <td class="p-3">Nicholas</td>
                <td class="p-3">
                  <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Pending</span>
                </td>
                <td class="p-3 flex space-x-2">
                  <button class="text-green-600 hover:text-green-800">✔</button>
                  <button class="text-red-600 hover:text-red-800">✘</button>
                  <button class="text-gray-600 hover:text-gray-800">👁</button>
                </td>
              </tr>
              <tr class="border-b">
                <td class="p-3">2</td>
                <td class="p-3">System Analyst</td>
                <td class="p-3">Asher</td>
                <td class="p-3">asher@gmail.com</td>
                <td class="p-3">9876543210</td>
                <td class="p-3">24-01-2024</td>
                <td class="p-3">Dominic</td>
                <td class="p-3">
                  <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">Success</span>
                </td>
                <td class="p-3 flex space-x-2">
                  <button class="text-green-600 hover:text-green-800">✔</button>
                  <button class="text-red-600 hover:text-red-800">✘</button>
                  <button class="text-gray-600 hover:text-gray-800">👁</button>
                </td>
              </tr>
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