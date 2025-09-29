<x-user-dashboard-body>
    <div class="bg-white mt-10 p-6 rounded-lg shadow mb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Experience</h3>
            {{-- <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                + Add Experience
            </button> --}}
            <a href="{{ route('user.create-experience') }}"
          class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
         + Add Experience
        </a>
        </div>

        <div class="space-y-4">
            <!-- Experience Item -->
            <div class="border-l-4 border-indigo-600 pl-4">
                <h4 class="text-md font-semibold">Laravel Developer</h4>
                <p class="text-gray-500 text-sm">TechCorp • Jan 2023 – Present</p>
                <p class="text-gray-600 text-sm mt-1">
                    Working on backend APIs, authentication, and building scalable applications using Laravel.
                </p>
            </div>

            <!-- Experience Item -->
            <div class="border-l-4 border-indigo-600 pl-4">
                <h4 class="text-md font-semibold">React Developer</h4>
                <p class="text-gray-500 text-sm">CodeWorks • Aug 2021 – Dec 2022</p>
                <p class="text-gray-600 text-sm mt-1">
                    Built interactive UI components, improved app performance, and collaborated with backend team.
                </p>
            </div>

            <!-- Experience Item -->
            <div class="border-l-4 border-indigo-600 pl-4">
                <h4 class="text-md font-semibold">Junior PHP Developer</h4>
                <p class="text-gray-500 text-sm">WebGen • Jun 2020 – Jul 2021</p>
                <p class="text-gray-600 text-sm mt-1">
                    Assisted in building dynamic websites, writing SQL queries, and fixing bugs in existing projects.
                </p>
            </div>

        </div>
    </div>

</x-user-dashboard-body>