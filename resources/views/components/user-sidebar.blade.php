<aside
  class="fixed inset-y-0 left-0 z-30 w-64 bg-gray-800 shadow-md transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:inset-0 overflow-y-auto"
  aria-label="Sidebar">

  <!-- Logo -->
  <div class="p-4 flex items-center space-x-2 border-b mt-1">
    <h1 class="text-3xl ms-8 font-bold text-white">Workly</h1>
  </div>

  <!-- Profile -->
  <div class="p-4 border-b flex items-center space-x-3">
    <img src="https://i.pravatar.cc/50" class="w-10 h-10 rounded-full" alt="User profile picture">
    <div>
      <h2 class="font-semibold text-white">{{ Auth::user()->name }}</h2>
      <p class="text-sm text-gray-100">User</p>
    </div>
  </div>

  <!-- Menu -->
  <nav class="flex-1 p-4 overflow-y-auto">
    <ul class="space-y-4">

      <!-- Dashboard -->
      <li>
        <a href="" class="flex items-center p-2 rounded-lg transition-colors duration-150  text-white">
          <span class="material-icons mr-2">dashboard</span> Dashboard
        </a>
      </li>

      <!-- Jobs Section -->
      <li>
        <div class="flex items-center justify-between px-2 py-2 text-gray-400 uppercase text-xs font-semibold">Jobs
        </div>
        <ul class="ml-6 mt-2 space-y-2">
          <li>
            <a href="{{ route('user.joblist') }}" class="block p-2 rounded-lg
              {{ request()->routeIs('user.joblist') ? 'bg-gray-700 text-white' : 'text-gray-100 hover:bg-gray-700' }}">
              Job List
            </a>
          </li>
          <li><a href="{{ route('user.job-application') }}"
              class="block p-2 rounded-lg 
            {{ request()->routeIs('user.job-application') ? 'bg-gray-700 text-white' : 'text-gray-100 hover:bg-gray-700'}}">
              Job Applications
            </a>
          </li>
          <li><a href="{{ route('user.saved-jobs') }}"
              class="block p-2 rounded-lg 
            {{ request()->routeIs('user.saved-jobs') ? 'bg-gray-700 text-white' : 'text-gray-100 hover:bg-gray-700'}}">
              My Jobs
            </a>
          </li>


          {{-- <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Apply Job</a></li> --}}
          {{-- <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">My Jobs</a></li> --}}
        </ul>
      </li>

      <!-- Profile Section -->
      <li>
        <div class="flex items-center justify-between px-2 py-2 text-gray-400 uppercase text-xs font-semibold">Profile
        </div>
        <ul class="ml-6 mt-2 space-y-2">
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Personal Info</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Resume Upload</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Skills & Experience</a></li>
        </ul>
      </li>

      <!-- Notifications -->
      <li>
        <div class="flex items-center justify-between px-2 py-2 text-gray-400 uppercase text-xs font-semibold">
          Notifications</div>
        <ul class="ml-6 mt-2 space-y-2">
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">All Notifications</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Unread</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Job Alerts</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Application Updates</a></li>
        </ul>
      </li>

      <!-- Help & Support -->
      <li>
        <div class="flex items-center justify-between px-2 py-2 text-gray-400 uppercase text-xs font-semibold">Help &
          Support</div>
        <ul class="ml-6 mt-2 space-y-2">
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">FAQ</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Contact Support</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Live Chat</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Guides & Tutorials</a></li>
        </ul>
      </li>

      <!-- Settings -->
      <li>
        <div class="flex items-center justify-between px-2 py-2 text-gray-400 uppercase text-xs font-semibold">Settings
        </div>
        <ul class="ml-6 mt-2 space-y-2">
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Profile Settings</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Privacy Settings</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Notification Settings</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Account Security</a></li>
          <li><a href="#" class="block p-2 rounded-lg text-gray-100 hover:bg-gray-700">Delete / Deactivate Account</a>
          </li>
        </ul>
      </li>

      <!-- Logout -->
      <li>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="flex items-center w-full p-2 rounded-lg hover:bg-red-600 text-white text-left">
            <span class="material-icons mr-2">logout</span> Logout
          </button>
        </form>
      </li>

    </ul>
  </nav>
</aside>