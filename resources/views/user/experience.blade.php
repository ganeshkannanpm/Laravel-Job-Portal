<x-user-dashboard-body>
    <div class="mt-10">
        @php
            $profileRoutes = [
                'user.personal-info' => 'Personal Info',
                'user.skill-index' => 'Skills',
                'user.experience' => 'Experience',
                'user.education' => 'Education',
                'user.resume' => 'Resume Upload',
            ];

            $breadcrumbs = getBreadcrumbs([
                'Profile' => $profileRoutes
            ]);
        @endphp

        <x-breadcrumb :links="$breadcrumbs" />

    </div>
    <div class="bg-white max-w-3xl mx-auto mt-10 p-6 rounded-lg shadow mb-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Experience</h2>
            @if(session('message'))
                <div
                    class="mb-4 rounded-lg bg-green-50 border border-green-300 text-green-800 px-4 py-3 relative shadow-md">
                    <div class="flex items-center">
                        <!-- Icon -->
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <!-- Message -->
                        <span class="font-medium">{{ session('message') }}</span>
                        <!-- Close button -->
                        <button type="button" onclick="this.parentElement.remove()"
                            class="ms-3 top-3 right-0 text-green-600 hover:text-green-800">
                            ✕
                        </button>
                    </div>
                </div>
            @endif
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
                        <h4 class="text-xl font-semibold">{{ $experience->job_title }}</h4>
                        <p class="text-gray-900 text-md">
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
                        <a href="{{ route('user.edit-experience', $experience->id) }}"
                            class="text-indigo-600 hover:text-indigo-800" title="Edit">
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