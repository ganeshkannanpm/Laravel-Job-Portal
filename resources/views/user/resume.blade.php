<x-user-dashboard-body>
    <div class="container mx-auto mt-20 max-w-lg bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-6">My Resume</h2>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 rounded-lg bg-green-50 border border-green-300 text-green-800 px-4 py-3 relative shadow-md">
                <div class="flex items-center">
                    <!-- Icon -->
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <!-- Message -->
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
                <!-- Close button -->
                <button type="button" onclick="this.parentElement.remove()"
                    class="absolute top-2 right-2 text-green-600 hover:text-green-800">
                    ✕
                </button>
            </div>
        @endif

        <!-- Resume Upload Form -->
        <form action="{{ route('resume.upload') }}" method="POST" enctype="multipart/form-data" class="mb-6 flex">
            @csrf
            <div class="mb-3">
                <label>Upload Resume (PDF/DOC)</label>
                <input type="file" name="resume" accept=".pdf,.doc,.docx"
                    class="border border-gray-300 rounded-lg px-3 py-2 w-full" required>
                <button type="submit"
                    class="bg-indigo-600 mt-4 text-white text-sm px-4 py-2 rounded-lg hover:bg-indigo-700">Upload
                    Resume</button>
            </div>
        </form>

        <!-- Show Current Resume -->
        @if(auth()->user()->resume)
            <p>Current Resume: <strong>{{ auth()->user()->resume }}</strong></p>
            <a href="{{ route('resume.download') }}"
                class="inline-flex items-center mt-4 text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg shadow-lg transition duration-300 ease-in-out">
                Download Resume
            </a>

        @else
            <p>No resume uploaded yet.</p>
        @endif
    </div>
</x-user-dashboard-body>