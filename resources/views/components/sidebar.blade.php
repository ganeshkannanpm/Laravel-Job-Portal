<aside 
    class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 shadow-md transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:inset-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <!-- Logo -->
    <div class="p-4 flex items-center space-x-2 border-b mt-1">
      <!-- <div class="bg-gray-900 text-white w-10 h-10 flex items-center justify-center rounded-full">J</div> -->
      <h1 class="text-3xl ms-8 font-bold text-white">Workly</h1>
    </div>

    <!-- Profile -->
    <div class="p-4 border-b flex items-center space-x-3">
      <img src="https://i.pravatar.cc/50" class="w-10 h-10 rounded-full">
      <div>
        <h2 class="font-semibold text-white">Franklin Jr</h2>
        <p class="text-sm text-gray-100">Superadmin</p>
      </div>
    </div>

    <!-- Menu -->
    <nav class="p-4">
      <ul class="space-y-2">
        <!-- Dashboard -->
        <li>
          <a href="#" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">
            <span class="material-icons mr-2">dashboard</span> Dashboard
          </a>
        </li>

        <!-- Jobs with Submenu -->
        <li x-data="{ open: false }">
          <button 
            @click="open = !open" 
            class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">
            <span class="flex items-center"><span class="material-icons mr-2">work</span> Jobs Management</span>
            <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
          </button>
          <ul x-show="open" class="ml-6 mt-2 space-y-2" x-transition>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Job List</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Job Applications</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Apply Job</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Saved Jobs</a></li>

          </ul>
        </li>

        <!-- Profile -->
        <li x-data="{ open: false }">
          <button 
            @click="open = !open" 
            class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">
            <span class="flex items-center"><span class="material-icons mr-2">account_circle</span>Profile</span>
            <span class="material-icons text-sm" x-text="open ? 'expand_less' : 'expand_more'"></span>
          </button>
          <ul x-show="open" class="ml-6 mt-2 space-y-2" x-transition>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">User</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Password Change</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Notifications</a></li>
            <li><a href="#" class="block p-2 rounded-lg hover:bg-gray-100 hover:text-gray-600 text-gray-100">Logout</a></li>
          </ul>
        </li>


      </ul>
    </nav>
  </aside>