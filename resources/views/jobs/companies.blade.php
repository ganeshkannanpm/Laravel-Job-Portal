<x-layout>

    <x-header />

    <body class="bg-gray-100">

        <!-- Hero Section -->
        <section class="pt-24 pb-10 text-center bg-blue-50">
            <h2 class="text-3xl font-extrabold text-gray-800">Top Hiring Companies</h2>
            <p class="mt-2 text-gray-600 max-w-md mx-auto">Browse trusted companies hiring for various roles across
                multiple industries.</p>
        </section>

        <!-- Filters -->
        <div class="max-w-6xl mx-auto p-4 mb-4">
            <div class="flex flex-col md:flex-row gap-3 md:items-center md:justify-between">
                <input type="text" placeholder="Search companies..."
                    class="w-full md:w-1/3 p-3 border rounded-xl focus:ring focus:border-blue-500" />
                <select class="p-3 border rounded-xl w-full md:w-1/4 focus:ring focus:border-blue-500">
                    <option>All Industries</option>
                    <option>IT & Software</option>
                    <option>Finance</option>
                    <option>Healthcare</option>
                    <option>Marketing</option>
                </select>
            </div>
        </div>

        <!-- Companies Grid -->
        <section class="max-w-6xl mx-auto p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 pb-20">

            <!-- Company Card -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/60" class="w-16 h-16 rounded-full" />
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">TechNova Pvt Ltd</h3>
                        <p class="text-gray-500 text-sm">IT & Software</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600 text-sm">A leading software company specializing in building
                    high‑scalability systems.</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-700">12 Open Positions</span>
                    <a href="#" class="text-blue-600 font-medium hover:underline">View</a>
                </div>
            </div>

            <!-- Repeat Cards -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/60" class="w-16 h-16 rounded-full" />
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">FinEdge Corp</h3>
                        <p class="text-gray-500 text-sm">Finance</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600 text-sm">Financial consulting and investment solutions provider.</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-700">7 Open Positions</span>
                    <a href="#" class="text-blue-600 font-medium hover:underline">View</a>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center space-x-4">
                    <img src="https://via.placeholder.com/60" class="w-16 h-16 rounded-full" />
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">MediCare Plus</h3>
                        <p class="text-gray-500 text-sm">Healthcare</p>
                    </div>
                </div>
                <p class="mt-4 text-gray-600 text-sm">Trusted healthcare solutions and pharmaceutical services provider.
                </p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-sm text-gray-700">5 Open Positions</span>
                    <a href="#" class="text-blue-600 font-medium hover:underline">View</a>
                </div>
            </div>

        </section>

        <x-footer />

    </body>

</x-layout>