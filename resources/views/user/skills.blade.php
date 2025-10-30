<x-user-dashboard-body>
  <body>
    <div class="mt-8 bg-indigo-600 text-gray-50 px-4 py-2">
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
    <div class="container mx-auto mt-20 max-w-lg bg-white shadow-md rounded-lg p-6">
      <h2 class="text-xl font-semibold mb-6">My Skills</h2>

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

      <!-- Add Skill -->
      <form action="{{ route('user-skill.store') }}" method="POST" class="mb-6 flex">
        @csrf
        <input type="text" name="name"
          class="flex-1 border rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Enter a skill" required>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-700">Add</button>
      </form>

      <!-- Skill List -->
      @if($skills->count())
        @foreach ($skills as $skill)
          <ul class="space-y-2">
            <li class="flex justify-between items-center bg-gray-50 px-4 py-2 rounded-md shadow-sm">
              <span>{{ $skill->name }}</span>
              <form action="{{ route('user-skill.delete', $skill->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                  class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Delete</button>
              </form>
            </li>
          </ul>
        @endforeach

        <!-- No skills placeholder -->
      @else
        <p class="text-gray-500">No skills added yet.</p>
      @endif

    </div>
  </body>
</x-user-dashboard-body>