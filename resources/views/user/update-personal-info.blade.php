<x-user-dashboard-body>
    <section class="ms-5 overflow-auto">

        <div class="w-full mx-auto  rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Personal Information</h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 text-red-800 p-2 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('user.update-personal-info', $personalInfo->id) }}" method="POST"
                class="grid grid-cols-2 gap-6">
                @csrf
                @method('PUT')
                <!-- Full Name -->
                <div>
                    <label class="block text-gray-900 font-medium">Full Name</label>
                    <input type="text" name="full_name" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-gray-900 font-medium">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-gray-900 font-medium">Gender</label>
                    <select name="gender" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Nationality -->
                <div>
                    <label class="block text-gray-900 font-medium">Nationality</label>
                    <input type="text" name="nationality" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-900 font-medium">Email</label>
                    <input type="email" name="email" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-900 font-medium">Phone</label>
                    <input type="text" name="phone" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-gray-900 font-medium">Address</label>
                    <textarea name="address" rows="4"
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
                    <input type="text" name="postal_code" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- LinkedIn URL -->
                <div>
                    <label class="block text-gray-900 font-medium">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- GitHub URL -->
                <div>
                    <label class="block text-gray-900 font-medium">GitHub URL</label>
                    <input type="url" name="github_url" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Portfolio URL -->
                <div>
                    <label class="block text-gray-900 font-medium">Portfolio URL</label>
                    <input type="url" name="portfolio_url" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
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
                    <input type="text" name="languages_known" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
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
                        class=" bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition">
                        Update
                    </button>
                    <a href="{{ route('user.personal-info') }}"
                        class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </section>
</x-user-dashboard-body>