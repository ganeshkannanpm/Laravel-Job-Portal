<x-user-dashboard-body>
     <div class="mt-10">
        @php
            $profileRoutes = [
                'user.joblist' => 'Latest Jobs',
                'user.applied-jobs' => 'Applications',
                'user.saved-jobs' => 'Saved Jobs',
            ];

            $breadcrumbs = getBreadcrumbs([
                'Job' => $profileRoutes
            ]);
        @endphp
        <x-breadcrumb :links="$breadcrumbs" />
    </div>
    <main class="p-4 md:p-6 flex-1">
        <h3 class="text-xl mb-4 font-semibold text-gray-800">Applications</h3>
        <div class="bg-white rounded-lg shadow-md overflow-x-auto w-full">
            <table class="w-full border-collapse text-sm md:text-base">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Position</th>
                        <th class="p-3 text-left">Company</th>
                        <th class="p-3 text-left">Resume</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Actions</th>
                        <th class="p-3 text-left">Applied On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr class="border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3">{{ $application->job->title ?? 'N/A' }}</td>
                            <td class="p-3">{{ $application->job->company }}</td>
                            <td class="p-3">
                                @if ($application->resume)
                                    <a href="{{ asset('storage/resumes/' . auth()->user()->resume) }}" target="_blank"
                                        class="text-blue-600 hover:underline">
                                        View
                                    </a>
                                @else
                                    <span class="text-gray-400">No Resume</span>
                                @endif
                            </td>
                            <td class="p-3">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">
                                    {{ ucfirst($application->status ?? 'pending') }}
                                </span>
                            </td>
                            <td class="p-3">
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                        Withdraw
                                    </button>
                                </form>
                            </td>
                            <td class="p-3">
                                {{ $application->created_at->format('d-m-Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">
                                No applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-user-dashboard-body>