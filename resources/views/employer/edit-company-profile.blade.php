<x-employer-dashboard-body>

    @if (session('error'))
        <div class="bg-red-100 text-red-800 p-2 rounded">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('employer.update.profile', $profiles->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-8">
        @csrf
        @method('PUT')
        <!-- Company Information -->
        <section>
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Update Company Profile</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="company_name"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('company_name', $profiles->company_name) }}" placeholder="Company Name"
                        required />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Industry / Business Type</label>
                    <input type="text" name="industry" value="{{ old('industry', $profiles->industry) }}"
                        placeholder="Industry / Business Type"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Company Size</label>
                    <input type="text" name="company_size" value="{{ old('company_size', $profiles->company_size) }}"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g. 50–200 employees" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Website URL</label>
                    <input type="url" name="website" value="{{ old('website', $profiles->website) }}"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://example.com" />
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Company Description</label>
                    <textarea name="description" placeholder="Enter here..." rows="3"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('description', $profiles->description) }}</textarea>
                </div>

            </div>
        </section>

        <!-- Contact Details -->
        <section>
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Contact Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Recruiter Name</label>
                    <input type="text" name="recruiter_name"
                        value="{{ old('recruiter_name', $profiles->recruiter_name) }}" placeholder="Recruiter Name"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $profiles->contact_phone) }}"
                        placeholder="Phone Number"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Office Address</label>
                    <textarea name="address" placeholder="Enter here..." rows="2"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('address', $profiles->address) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Recruiter Email</label>
                    <input type="email" name="recruiter_email"
                        value="{{ old('recruiter_email', $profiles->recruiter_email) }}"
                        class="mt-1 w-full py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://example.com" />
                </div>

            </div>
        </section>

        <!-- Optional -->
        <section>
            <h2 class="text-lg font-semibold mb-4 border-b pb-2">Company Branding</h2>
            <div>
                <label class="block text-sm font-medium text-gray-700">Company Logo</label>
                <input type="file" name="logo" accept="image/*" class="mt-1 text-sm" />
                <img src="{{ asset('storage/' . $profiles->logo) }}" alt="" class="mt-3 w-12 h-12">
            </div>
        </section>

        <div class="flex justify-end gap-3 pt-4 border-t">
            <a href="{{ route('employer.company.profile') }}"
                class=" bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                Back
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">Save Profile</button>
        </div>
    </form>
</x-employer-dashboard-body>