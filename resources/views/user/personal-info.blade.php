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
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>

                        @if ($personalInfo)

                                <a href="{{ route('user.show-personal-info') }}"
                                    class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">
                                    Update Profile
                                </a>
                            </div>

                            {{-- Personal Information --}}

                            <div class="grid grid-cols-2 gap-6">

                                <!-- Full Name -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Full Name</label>
                                    <input type="text" name="full_name" readonly
                                        value="{{ old('full_name', $personalInfo->full_name ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed" required>
                                </div>

                                <!-- Date of Birth -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Date of Birth</label>
                                    <input type="date" name="date_of_birth" readonly
                                        value="{{ old('date_of_birth', $personalInfo->date_of_birth ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed ">
                                </div>

                                <!-- Gender -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Gender</label>
                                    <input type="text" name="gender" readonly
                                        value="{{ old('gender', $personalInfo->gender ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Nationality -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Nationality</label>
                                    <input type="text" name="nationality" readonly
                                        value="{{ old('nationality', $personalInfo->nationality ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Email</label>
                                    <input type="email" name="email" readonly
                                        value="{{ old('email', $personalInfo->email ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed" required>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Phone</label>
                                    <input type="text" name="phone" readonly
                                        value="{{ old('phone', $personalInfo->phone ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed" required>
                                </div>

                                <!-- Address -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Address</label>
                                    <textarea name="address" rows="4" readonly
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">{{ old('address', $personalInfo->address ?? '') }}</textarea>
                                </div>

                                <!-- City -->
                                <div>
                                    <label class="block text-gray-900 font-medium">City</label>
                                    <input type="text" name="city" readonly value="{{ old('city', $personalInfo->city ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- State -->
                                <div>
                                    <label class="block text-gray-900 font-medium">State</label>
                                    <input type="text" name="state" readonly
                                        value="{{ old('state', $personalInfo->state ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Country -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Country</label>
                                    <input type="text" name="country" readonly
                                        value="{{ old('country', $personalInfo->country ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Postal Code -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Postal Code</label>
                                    <input type="text" name="postal_code" readonly
                                        value="{{ old('postal_code', $personalInfo->postal_code ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- LinkedIn URL -->
                                <div>
                                    <label class="block text-gray-900 font-medium">LinkedIn URL</label>
                                    <input type="url" name="linkedin_url" readonly
                                        value="{{ old('linkedin_url', $personalInfo->linkedin_url ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- GitHub URL -->
                                <div>
                                    <label class="block text-gray-900 font-medium">GitHub URL</label>
                                    <input type="url" name="github_url" readonly
                                        value="{{ old('github_url', $personalInfo->github_url ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Portfolio URL -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Portfolio URL</label>
                                    <input type="url" name="portfolio_url" readonly
                                        value="{{ old('portfolio_url', $personalInfo->portfolio_url ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Career Objective -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Career Objective</label>
                                    <textarea name="career_objective" rows="4" readonly
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">{{ old('career_objective', $personalInfo->career_objective ?? '') }}</textarea>
                                </div>

                                <!-- Languages Known -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Languages Known</label>
                                    <input type="text" name="languages_known" readonly
                                        value="{{ old('languages_known', $personalInfo->languages_known ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Work Authorization -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Work Authorization</label>
                                    <input type="text" name="work_authorization" readonly
                                        value="{{ old('work_authorization', $personalInfo->work_authorization ?? '') }}"
                                        class="mt-1 block w-full border-gray-300 rounded-lg p-2 cursor-not-allowed">
                                </div>

                                <!-- Willing to Relocate -->
                                <div>
                                    <label class="block text-gray-900 font-medium">Willing to Relocate</label>
                                    <p class="mt-1 block w-full border-gray-300 rounded-lg p-2 bg-gray-100 cursor-not-allowed">
                                        {{ $personalInfo->willing_to_relocate ? 'Yes' : 'No' }}
                                    </p>

                                </div>
                            </div>

                        @else

                        {{-- Show Add Profile Button --}}
                        <a href="{{ route('user.create-personal-info') }}" class="btn btn-dark">
                            Add Your Profile
                        </a>
                    @endif


                </div>
            </section>
        </div>
    </div>

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>