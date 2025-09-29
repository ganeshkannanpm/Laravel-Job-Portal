<x-user-dashboard-body>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Add Experience</h2>

        {{-- <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                error
            </ul>
        </div> --}}


        <form action="" method="POST" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="title" id="title"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Company -->
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company" id="company"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Starting -->
            <div>
                <label for="start" class="block text-sm font-medium text-gray-700">Start</label>
                <input type="text" name="start" id="start" placeholder="Jan 2023 - Present"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Ending -->
            <div>
                <label for="end" class="block text-sm font-medium text-gray-700">End</label>
                <input type="text" name="end" id="end" placeholder="Jan 2023 - Present"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-between items-center">
                <a href="" class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
                    Save Experience
                </button>
            </div>
        </form>
    </div>

</x-user-dashboard-body>