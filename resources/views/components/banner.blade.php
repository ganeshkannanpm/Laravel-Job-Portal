<div class="relative isolate overflow-hidden bg-brand-primary py-24 sm:py-32 h-lvh">
    <!-- Background image -->
     <img src="{{ Vite::asset('resources/images/banner.jpg') }}"
        alt="" class="absolute inset-0 z-[-20] h-full w-full object-cover object-center" />

    <!-- Overlay shapes -->
     <div class="absolute inset-0 bg-gradient-to-tr from-gray-800 to-gray-800 opacity-70 z-[-10]"></div>

    <!-- Main content -->
    <div class="mx-auto max-w-7xl px-6 lg:px-8 z-[10]">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h1 class="text-5xl font-bold tracking-tight text-white sm:text-7xl">Find Your Dream Job</h1>
            <p class="mt-8 text-lg font-medium text-gray-100 sm:text-xl">
                Search thousands of job listings from top companies and start your career journey today.
            </p>

            <!-- Job Search Bar -->
            <form class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-3 bg-white p-4 rounded-lg shadow-lg">
                <input type="text" placeholder="Job title or keyword"
                    class="col-span-1 sm:col-span-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-primary">
                <input type="text" placeholder="Location"
                    class="col-span-1 sm:col-span-1 border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-brand-primary">
                <button type="submit"
                    class="col-span-1 bg-brand-secondary text-gray-500 font-semibold px-4 py-2 rounded hover:bg-gray-800 hover:text-white transition-colors duration-300">
                    Search Jobs
                </button>
            </form>
        </div>

        <!-- Links -->
        <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div
                class="grid grid-cols-1 gap-x-8 gap-y-6 text-lg font-semibold text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                <a href="#" class="no-underline hover:underline">Browse Jobs <span aria-hidden="true">&rarr;</span></a>
                <a href="#" class="no-underline hover:underline">Post a Job <span aria-hidden="true">&rarr;</span></a>
                <a href="#" class="no-underline hover:underline">Top Companies <span aria-hidden="true">&rarr;</span></a>
                <a href="#" class="no-underline hover:underline">Career Advice <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
    </div>
</div>