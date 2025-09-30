<x-user-dashboard-body>
    <div class="bg-white mt-10 p-6 rounded-lg shadow mb-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Experience</h3>
            <a href="{{ route('user.create-experience') }}"
                class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                + Add Experience
            </a>
        </div>

        <div class="space-y-4">
            <!-- Experience Item -->
            @foreach ($experiences as $experience)
                <div class="border-l-4 border-indigo-600 pl-4 flex justify-between items-start">
                    <div>
                        <h4 class="text-md font-semibold">{{ $experience->job_title }}</h4>
                        <p class="text-gray-600 text-sm">
                            {{ $experience->company_name }} • {{ $experience->start_date }} –
                            {{ $experience->end_date ?? 'Present' }}
                        </p>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ $experience->description }}
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-2 ml-4">
                        <!-- Edit Icon -->
                        <a href="#" class="text-indigo-600 hover:text-indigo-800" title="Edit">
                            <!-- Heroicons Pencil -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M4 16a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <!-- Delete Icon -->
                        {{-- <form action="#" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this experience?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                <!-- Heroicons Trash -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2h12a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM5 6a1 1 0 011 1v9a2 2 0 002 2h4a2 2 0 002-2V7a1 1 0 112 0v9a4 4 0 01-4 4H8a4 4 0 01-4-4V7a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form> --}}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</x-user-dashboard-body>