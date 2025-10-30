<x-user-dashboard-body>
  <section class="overflow-auto">
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

    <div class="w-full mx-auto rounded-lg p-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Personal Information</h2>

        @if(session('message'))
          <div class="mb-4 rounded-lg bg-green-50 border border-green-300 text-green-800 px-4 py-3 relative shadow-md">
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

        @if ($personalInfo)

            {{-- <a href="{{ route('user.show-personal-info') }}"
              class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition">
              Update Profile
            </a> --}}
          </div>

          {{-- Personal Information --}}

          <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left column: Personal Information -->
            <div class="lg:col-span-2 space-y-6">

              <!-- Basic Details -->
              <article class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Basic Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <p class="text-xs text-gray-500">Full Name</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->full_name ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Date of Birth</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->date_of_birth ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Gender</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->gender ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Nationality</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->nationality ?? '—' }}</p>
                  </div>
                </div>
              </article>

              <!-- Contact Details -->
              <article class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Contact Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <p class="text-xs text-gray-500">Email</p>
                    <a href="mailto:{{ $personalInfo->email ?? '' }}" class="mt-1 text-blue-600 text-sm">
                      {{ $personalInfo->email ?? '—' }}
                    </a>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Phone</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->phone ?? '—' }}</p>
                  </div>
                  <div class="sm:col-span-2">
                    <p class="text-xs text-gray-500">Address</p>
                    <p class="mt-1 text-sm text-gray-700 break-words">{{ $personalInfo->address ?? '—' }}</p>
                  </div>
                </div>
              </article>

              <!-- Location Info -->
              <article class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Location Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <p class="text-xs text-gray-500">City</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->city ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">State</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->state ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Country</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->country ?? '—' }}</p>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">Postal Code</p>
                    <p class="mt-1 font-medium">{{ $personalInfo->postal_code ?? '—' }}</p>
                  </div>
                </div>
              </article>

              <!-- Online Profiles -->
              <article class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Online Profiles</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <p class="text-xs text-gray-500">LinkedIn</p>
                    <a href="{{ $personalInfo->linkedin_url ?? '#' }}" target="_blank"
                      class="mt-1 text-sm text-blue-600 break-all">
                      {{ $personalInfo->linkedin_url ?? '—' }}
                    </a>
                  </div>
                  <div>
                    <p class="text-xs text-gray-500">GitHub</p>
                    <a href="{{ $personalInfo->github_url ?? '#' }}" target="_blank"
                      class="mt-1 text-sm text-blue-600 break-all">
                      {{ $personalInfo->github_url ?? '—' }}
                    </a>
                  </div>
                  <div class="sm:col-span-2">
                    <p class="text-xs text-gray-500">Portfolio</p>
                    <a href="{{ $personalInfo->portfolio_url ?? '#' }}" target="_blank"
                      class="mt-1 text-sm text-blue-600 break-all">
                      {{ $personalInfo->portfolio_url ?? '—' }}
                    </a>
                  </div>
                </div>
              </article>

              <!-- Career Info -->
              <article class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-lg font-semibold mb-3">Career Information</h2>
                <div class="space-y-3 text-sm">
                  <div>
                    <p class="text-xs text-gray-500">Career Objective</p>
                    <p class="mt-2 text-gray-700 leading-relaxed">
                      {{ $personalInfo->career_objective ?? '—' }}
                    </p>
                  </div>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                      <p class="text-xs text-gray-500">Languages Known</p>
                      <p class="mt-1 font-medium">{{ $personalInfo->languages_known ?? '—' }}</p>
                    </div>
                    <div>
                      <p class="text-xs text-gray-500">Work Authorization</p>
                      <p class="mt-1 font-medium">{{ $personalInfo->work_authorization ?? '—' }}</p>
                    </div>
                    <div>
                      <p class="text-xs text-gray-500">Willing to Relocate</p>
                      <p class="mt-1 font-medium">
                        {{ isset($personalInfo->willing_to_relocate) ? ($personalInfo->willing_to_relocate ? 'Yes' : 'No') : '—' }}
                      </p>
                    </div>
                  </div>
                </div>
              </article>

            </div>

            <!-- Right Column: Summary -->
            <aside class="space-y-6">
              <div class="bg-white p-6 rounded-lg shadow-sm">
                <h3 class="text-base font-semibold mb-3">Profile Summary</h3>
                <dl class="grid grid-cols-2 gap-3 text-sm">
                  <div>
                    <dt class="text-xs text-gray-500">Name</dt>
                    <dd class="font-medium">{{ $personalInfo->full_name ?? '—' }}</dd>
                  </div>
                  <div>
                    <dt class="text-xs text-gray-500">Email</dt>
                    <dd class="font-medium break-all">{{ $personalInfo->email ?? '—' }}</dd>
                  </div>
                  <div>
                    <dt class="text-xs text-gray-500">Location</dt>
                    <dd class="font-medium">{{ $personalInfo->city ?? '' }}, {{ $personalInfo->country ?? '' }}</dd>
                  </div>
                  <div>
                    <dt class="text-xs text-gray-500">Languages</dt>
                    <dd class="font-medium">{{ $personalInfo->languages_known ?? '—' }}</dd>
                  </div>
                </dl>
              </div>

              <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                {{-- <a href="#" class="inline-block px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                  Edit Info
                </a> --}}
                <a href="{{ route('user.show-personal-info') }}"
                  class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700 transition">
                  Update Profile
                </a>
              </div>
            </aside>

          </section>


        @else
        <p class="text-gray-900 text-2xl font-semibold">No Data yet.</p>
        {{-- Show Add Profile Button --}}
        <a href="{{ route('user.create-personal-info') }}"
          class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
          Add Your Profile
        </a>
      @endif


    </div>
  </section>
</x-user-dashboard-body>