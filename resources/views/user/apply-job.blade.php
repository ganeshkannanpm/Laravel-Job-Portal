<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
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
            <x-user-dashboard-header />
            
            <section class="ms-5 mt-10">
                <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Apply for this Job</h2>

                    <!-- Show global success/error messages -->
                    @if (session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('user.store-job', $job) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-5">
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Cover Letter -->
                        <div>
                            <label for="cover_letter" class="block text-sm font-medium text-gray-700">Cover
                                Letter</label>
                            <textarea name="cover_letter" id="cover_letter" rows="4" required
                                class="mt-1 w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none @error('cover_letter') border-red-500 @enderror">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Resume Upload -->
                        <div>
                            <label for="resume" class="block text-sm font-medium text-gray-700">Upload Resume</label>
                            <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" required
                                class="mt-2 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0 file:text-sm file:font-medium
                       file:bg-blue-600 file:text-white hover:file:bg-blue-700 cursor-pointer @error('resume') border-red-500 @enderror">
                            <p class="mt-1 text-xs text-gray-500">Accepted formats: PDF, DOC, DOCX (Max 5MB)</p>
                            @error('resume')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        @php
                            $alreadyApplied =
                                Auth::check() && $job->JobApplication()->where('user_id', Auth::id())->exists();
                        @endphp

                        @if ($alreadyApplied)
                            <button disabled
                                class="w-full bg-gray-400 text-white py-3 rounded-lg font-semibold cursor-not-allowed">
                                Already Applied
                            </button>
                        @else
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition shadow-md">
                                Apply
                            </button>
                        @endif

                    </form>
                </div>

            </section>

        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</body>

</html>
