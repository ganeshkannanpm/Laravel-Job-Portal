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

<body class="bg-blue-400 font-sans">

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

            <section class="ms-5 ">

                <div class="w-full mx-auto  rounded-lg p-8">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800">Personal Information</h2>

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="" method="POST" class="grid grid-cols-2 gap-6">
                        @csrf

                        <!-- Full Name -->
                        <div>
                            <label class="block text-gray-900 font-medium">Full Name</label>
                            <input type="text" name="full_name" class="mt-1 block w-full border-gray-300 rounded-lg p-2"
                                required>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <label class="block text-gray-900 font-medium">Date of Birth</label>
                            <input type="date" name="date_of_birth"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label class="block text-gray-900 font-medium">Gender</label>
                            <select name="gender" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                        </div>

                        <!-- Nationality -->
                        <div>
                            <label class="block text-gray-900 font-medium">Nationality</label>
                            <input type="text" name="nationality"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-gray-900 font-medium">Email</label>
                            <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-lg p-2"
                                required>
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-gray-900 font-medium">Phone</label>
                            <input type="text" name="phone" class="mt-1 block w-full border-gray-300 rounded-lg p-2"
                                required>
                        </div>

                        <!-- Address -->
                        <div>
                            <label class="block text-gray-900 font-medium">Address</label>
                            <textarea name="career_objective" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2"></textarea>
                        </div>

                        <!-- City -->
                        <div>
                            <label class="block text-gray-900 font-medium">City</label>
                            <input type="text" name="city" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- State -->
                        <div>
                            <label class="block text-gray-900 font-medium">State</label>
                            <input type="text" name="state" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Country -->
                        <div>
                            <label class="block text-gray-900 font-medium">Country</label>
                            <input type="text" name="country" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Postal Code -->
                        <div>
                            <label class="block text-gray-900 font-medium">Postal Code</label>
                            <input type="text" name="postal_code"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- LinkedIn URL -->
                        <div>
                            <label class="block text-gray-900 font-medium">LinkedIn URL</label>
                            <input type="url" name="linkedin_url"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- GitHub URL -->
                        <div>
                            <label class="block text-gray-900 font-medium">GitHub URL</label>
                            <input type="url" name="github_url"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Portfolio URL -->
                        <div>
                            <label class="block text-gray-900 font-medium">Portfolio URL</label>
                            <input type="url" name="portfolio_url"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Career Objective -->
                        <div>
                            <label class="block text-gray-900 font-medium">Career Objective</label>
                            <textarea name="career_objective" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2"></textarea>
                        </div>

                        <!-- Languages Known -->
                        <div>
                            <label class="block text-gray-900 font-medium">Languages Known</label>
                            <input type="text" name="languages_known"
                                class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        </div>

                        <!-- Work Authorization -->
                        <div>
                            <label class="block text-gray-900 font-medium">Work Authorization</label>
                            <select name="work_authorization" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                                <option value="">Select Work Authorization</option>
                                <option value="citizen">Citizen</option>
                                <option value="permanent_resident">Permanent Resident</option>
                                <option value="work_visa">Work Visa</option>
                                <option value="student_visa">Student Visa</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Willing to Relocate -->
                        <div class="col-span-2 flex items-center">
                            <input type="checkbox" name="willing_to_relocate" value="1"
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                            <label class="ml-2 text-gray-900">Willing to Relocate</label>
                        </div>

                        <!-- Submit -->
                        <div class="col-span-2">
                            <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">
                                Update 
                            </button>
                        </div>
                    </form>

                </div>
            </section>
        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>