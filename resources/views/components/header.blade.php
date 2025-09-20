
<div class="bg-indigo-600 px-6 fixed top-0 left-0 right-0 z-50">
    <nav class="flex justify-between items-center py-4 text-gray-300">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="/" class="font-sans font-semibold text-3xl hover:text-gray-900 transition">Workly</a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">
            <a href="/" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Home</a>
            <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">About Us</a>
            <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Jobs</a>
            <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Companies</a>
            <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Contact Us</a>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="hidden md:flex space-x-6 font-semibold">
            <a href="/register" class="px-3 py-2 text-gray-100 rounded hover:bg-gray-200 hover:text-gray-900">Sign Up</a>
            <a href="/login" class="px-3 py-2 text-gray-100 rounded hover:bg-gray-200 hover:text-gray-900">Log In</a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="md:hidden flex flex-col space-y-1 focus:outline-none">
            <span class="block w-6 h-0.5 bg-gray-300"></span>
            <span class="block w-6 h-0.5 bg-gray-300"></span>
            <span class="block w-6 h-0.5 bg-gray-300"></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden flex-col space-y-4 pb-4 text-gray-300 md:hidden">
        <a href="/" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Home</a>
        <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">About Us</a>
        <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Jobs</a>
        <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Companies</a>
        <a href="#" class="px-3 py-2 font-semibold rounded text-gray-100 hover:bg-gray-200 hover:text-gray-900">Contact Us</a>
        <hr class="border-gray-600">
        
        <a href="{{ route('register.create') }}" class="px-3 py-2 text-gray-100 rounded hover:bg-gray-200 hover:text-gray-900">Sign Up</a>
        <a href="{{ route('login.create') }}" class="px-3 py-2 text-gray-100 rounded hover:bg-gray-200 hover:text-gray-900">Log In</a>
    </div>
</div>