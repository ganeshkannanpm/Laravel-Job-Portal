<x-user-dashboard-body>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Update Education</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update-education', $education->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Degree -->
            <div>
                <label for="degree" class="block text-sm font-medium text-gray-700">Degree</label>
                <input type="text" name="degree" id="degree"
                    value="{{ old('degree', $education->degree) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Institution -->
            <div>
                <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                <input type="text" name="institution" id="institution"
                    value="{{ old('institution', $education->institution) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Starting -->
            <div>
                <label for="start_year" class="block text-sm font-medium text-gray-700">Start</label>
                <input type="text" name="start_year" id="start_year"
                    value="{{ old('start_year', $education->start_year) }}" placeholder="Jan 2023 - Present"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Ending -->
            <div>
                <label for="end_year" class="block text-sm font-medium text-gray-700">End</label>
                <input type="text" name="end_year" id="end_year" value="{{ old('end_year', $education->end_year) }}"
                    placeholder="Jan 2023 - Present"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Details -->
            <div>
                <label for="details" class="block text-sm font-medium text-gray-700">Details</label>
                <textarea name="details" id="details" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('details', $education->details) }}</textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-between items-center">
                <a href="{{ route('user.education') }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Update Education
                </button>
            </div>
        </form>
         <!-- Delete -->
        <form action="{{ route('user.delete-education', $education->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this education?');" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 px-4 py-2 rounded-lg text-gray-100 hover:bg-red-800">
                Delete
            </button>
        </form>

    </div>

</x-user-dashboard-body>