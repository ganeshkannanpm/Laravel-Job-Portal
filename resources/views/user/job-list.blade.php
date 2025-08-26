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
        <x-user-sidebar :user="$user" />

        <!-- Overlay (mobile) -->
        <div class="fixed inset-0 bg-black opacity-50 z-20 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition.opacity>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto ">
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
                    <img src="https://i.pravatar.cc/40" class="w-10 h-10 rounded-full">
                </div>
            </header>

            <x-layout>
                <section>
                    <h2 class="mb-5 text-white font-bold text-2xl text-center">
                        <span class="w-4 h-4 bg-white inline-block rounded-full"></span>
                        Latest Jobs
                    </h2>
                    <div class="grid lg:grid-cols-3 gap-8 ">
                        @foreach ($featuredJobs as $job)
                            {{-- <x-job-card :$job /> --}}
                            <div
                                class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">

                                <button class="absolute top-2 right-2 save-job-btn" data-job-id="{{ $job->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6 {{ auth()->user()->savedJobs->contains($job->id) ? 'text-red-500' : 'text-gray-700' }}">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.014-4.5-4.5-4.5
                               -1.77 0-3.292 1.02-4.031 2.482
                               C11.792 4.77 10.27 3.75 8.5 3.75
                               6.014 3.75 4 5.765 4 8.25
                               c0 7.22 8.25 11.25 8.25 11.25
                               S21 15.47 21 8.25z" />
                                    </svg>
                                </button>

                                <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>
                                <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>
                                <div class="mt-3 flex items-center text-gray-700 text-sm">
                                    💰 <span class="ml-2">{{ $job->salary }}</span>
                                </div>
                                <div class="mt-1 flex items-center text-gray-700 text-sm">
                                    📍 <span class="ml-2">{{ $job->location }}</span>
                                </div>
                                <div class="mt-3">
                                    <span
                                        class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
                                        {{ $job->schedule }}
                                    </span>
                                </div>
                                <div class="mt-4">
                                    <x-forms.button>Apply</x-forms.button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </x-layout>

        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        document.querySelectorAll('.save-job-btn').forEach(button => {
            button.addEventListener('click', function() {
                let jobId = this.dataset.jobId;
                let btn = this;

                fetch(`/save-job/${jobId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({}),
                    })

                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            btn.querySelector('svg').classList.add(
                            'text-red-500'); // Change heart to red
                        }
                    });
            });
        });
    </script>
</body>

</html>
