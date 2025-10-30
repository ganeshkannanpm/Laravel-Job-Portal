<x-user-dashboard-body>
    <section class="ms-5 overflow-auto">
        <div class="w-full mx-auto mt-6  rounded-lg p-8">
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
                    <input type="text" name="full_name" value="{{ old('full_name', $personalInfo->full_name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-gray-900 font-medium">Date of Birth</label>
                    <input type="date" name="date_of_birth"
                        value="{{ old('date_of_birth', $personalInfo->date_of_birth) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-gray-900 font-medium">Gender</label>
                    <select name="gender" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        <option value="">Select Gender</option>
                        <option value="Male" {{ old('gender', $personalInfo->gender) == 'Male' ? 'selected' : '' }}>Male
                        </option>
                        <option value="Female" {{ old('gender', $personalInfo->gender) == 'Female' ? 'selected' : '' }}>
                            Female</option>
                        <option value="Other" {{ old('gender', $personalInfo->gender) == 'Other' ? 'selected' : '' }}>
                            Other</option>
                    </select>
                </div>

                <!-- Nationality -->
                <div>
                    <label class="block text-gray-900 font-medium">Nationality</label>
                    <input type="text" name="nationality" value="{{ old('nationality', $personalInfo->nationality) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-900 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $personalInfo->email) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-900 font-medium">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $personalInfo->phone) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-gray-900 font-medium">Address</label>
                    <textarea name="address" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2"> {{ old('address', $personalInfo->address) }}</textarea>
                </div>

                <!-- City -->
                <div>
                    <label class="block text-gray-900 font-medium">City</label>
                    <input type="text" name="city" value="{{ old('city', $personalInfo->city) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- State -->
                <div>
                    <label class="block text-gray-900 font-medium">State</label>
                    <input type="text" name="state" value="{{ old('state', $personalInfo->state) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Country -->
                <div>
                    <label class="block text-gray-900 font-medium">Country</label>
                    <input type="text" name="country" value="{{ old('country', $personalInfo->country) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Postal Code -->
                <div>
                    <label class="block text-gray-900 font-medium">Postal Code</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $personalInfo->postal_code) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- LinkedIn URL -->
                <div>
                    <label class="block text-gray-900 font-medium">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $personalInfo->linkedin_url) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- GitHub URL -->
                <div>
                    <label class="block text-gray-900 font-medium">GitHub URL</label>
                    <input type="url" name="github_url" value="{{ old('github_url', $personalInfo->github_url) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Portfolio URL -->
                <div>
                    <label class="block text-gray-900 font-medium">Portfolio URL</label>
                    <input type="url" name="portfolio_url"
                        value="{{ old('portfolio_url', $personalInfo->portfolio_url) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Career Objective -->
                <div>
                    <label class="block text-gray-900 font-medium">Career Objective</label>
                    <textarea name="career_objective" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">{{ old('career_objective', $personalInfo->career_objective) }}</textarea>
                </div>

                <!-- Languages Known -->
                <div>
                    <label class="block text-gray-900 font-medium">Languages Known</label>
                    <input type="text" name="languages_known"
                        value="{{ old('languages_known', $personalInfo->languages_known) }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                </div>

                <!-- Work Authorization -->
                <div>
                    <label class="block text-gray-900 font-medium">Work Authorization</label>
                    <select name="work_authorization" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
                        <option value="">Select Work Authorization</option>
                        <option value="citizen" {{ old('work_authorization', $personalInfo->work_authorization) == 'citizen' ? 'selected' : '' }}>Citizen</option>
                        <option value="permanent_resident" {{ old('work_authorization', $personalInfo->work_authorization) == 'permanent_resident' ? 'selected' : '' }}>Permanent
                            Resident</option>
                        <option value="work_visa" {{ old('work_authorization', $personalInfo->work_authorization) == 'work_visa' ? 'selected' : '' }}>Work Visa</option>
                        <option value="student_visa" {{ old('work_authorization', $personalInfo->work_authorization) == 'student_visa' ? 'selected' : '' }}>Student Visa
                        </option>
                        <option value="other" {{ old('work_authorization', $personalInfo->work_authorization) == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Willing to Relocate -->
                <div class="col-span-2 flex items-center">
                    <input type="checkbox" name="willing_to_relocate" value="1" {{ old('willing_to_relocate', $personalInfo->willing_to_relocate) ? 'checked' : '' }}
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