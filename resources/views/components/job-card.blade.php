<div class="mx-5 bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow-md transition relative">
    <h2 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h2>
    <h4 class="text-md font-semibold text-gray-800">{{ $job->company }}</h4>
    <p class="text-sm text-gray-600 mt-1">{{ $job->employer->name }}</p>
    <div class="mt-3 flex items-center text-gray-700 text-sm">
        💰 <span class="ml-2">₹ {{ $job->salary_min }} - ₹ {{ $job->salary_max }} • {{ $job->experience_level }} Level</span>
    </div>
    <div class="mt-1 flex items-center text-gray-700 text-sm">
        📍 <span class="ml-2">{{ $job->location }}</span>
    </div>
    <div class="mt-3">
        <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-gray-800 rounded-full">
            {{ $job->schedule }}
        </span>
    </div>
    <div class="mt-4">
        {{-- <a href="{{ route('jobs.view',$job->id) }}" type="submit"
            class=" text-gray-100 text-left px-4 py-2  bg-indigo-600 rounded-md hover:bg-gray-800">
            View
        </a> --}}
        @auth
            {{-- If user is logged in --}}
            <a href="{{ route('user-jobs.view', $job->id) }}"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
              View
            </a>
          @endauth

          @guest
            {{-- If user is NOT logged in --}}
            <a href="{{ route('jobs.view',$job->id) }}"
              class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-xl font-medium shadow">
              View
            </a>
          @endguest
    </div>
</div>