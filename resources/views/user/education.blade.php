<x-user-dashboard-body>
    <div class="bg-white max-w-3xl mx-auto mt-10 p-6 rounded-lg shadow mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Education</h2>
            <a href="{{ route('user.create-education') }}"
                class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                + Add Education
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($educations as $education)
                <!-- Experience Item -->
                <div class="pl-4 flex justify-between items-start">
                    <div class="border-l-4 border-indigo-600 pl-4 mb-6">
                        <h3 class="text-xl font-semibold text-gray-700">{{ $education->degree}}</h3>
                        <p class="text-gray-600">{{ $education->institution }} • {{ $education->start_year }} -
                            {{ $education->end_year }}</p>
                        <p class="text-gray-500 mt-1">{{ $education->details }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2 ml-4">
                        <!-- Edit Icon -->
                        <a href="{{ route('user.edit-education') }}" class="text-indigo-600 hover:text-indigo-800"
                            title="Edit">
                            <!-- Heroicons Pencil -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-user-dashboard-body>