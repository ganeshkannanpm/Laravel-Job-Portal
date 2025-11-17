<x-user-dashboard-body>
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Update Experience</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update-experience', $experience->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Title -->
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title"
                    value="{{ old('job_title', $experience->job_title) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Company -->
            <div>
                <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company_name" id="company_name"
                    value="{{ old('company_name', $experience->company_name) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Starting -->
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start</label>
                <input type="date" name="start_date" id="start_date"
                    value="{{ old('start_date', optional($experience->start_date)->format('Y-m-d')) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Ending -->
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">End</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', optional($experience->end_date)->format('Y-m-d')) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Total Experience -->
            <div>
                <label for="total_experience" class="block text-sm font-medium text-gray-700">Total Experience</label>
                <input type="text" name="total_exp" id="total_exp" value="{{ old('total_exp',$experience->total_exp) }}"
                    class="mt-1 block w-full  py-2 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $experience->description) }}</textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-between items-center">
                <a href="{{ route('user.experience') }}"
                    class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Update Experience
                </button>
            </div>
        </form>
         <!-- Delete -->
        <form action="{{ route('user.delete-experience', $experience->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete this experience?');" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 px-4 py-2 rounded-lg text-gray-100 hover:bg-red-800">
                Delete
            </button>
        </form>

    </div>

</x-user-dashboard-body>