<header class="flex items-center justify-between bg-blue-950 p-4 shadow-sm sticky top-0 z-10">
    <div class="flex items-center space-x-3">
        <!-- Hamburger -->
        <button class="md:hidden text-gray-600" @click="sidebarOpen = true">
            <span class="material-icons">menu</span>
        </button>
        <h2 class="font-bold text-lg text-white">User Dashboard</h2>
    </div>
    <div class="flex items-center space-x-4">
        <input type="text" placeholder="Search"
            class="border rounded-lg px-3 py-1 w-40 md:w-64 focus:outline-none focus:ring-2 focus:ring-gray-400">
        {{-- <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full"> --}}
    </div>
</header>