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
              <li><a href="{{ route('logout') }}" class="flex items-center p-2 rounded-lg hover:bg-red-600 text-white">
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