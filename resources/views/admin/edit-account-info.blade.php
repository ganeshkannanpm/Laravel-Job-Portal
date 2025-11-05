<x-admin-dashboard-body>
  <body class="bg-gray-50 text-gray-800">
    <main class="max-w-6xl mx-auto p-4 sm:p-6 lg:p-10">
      <!-- Header -->
        @if (session('success'))
          <div class="bg-green-100 text-green-800 p-2 rounded">
            {{ session('success') }}
          </div>
        @endif

        <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
          <div class="flex items-center gap-4">
            <!-- Company Logo -->
            <div class="w-20 h-20 bg-white rounded-lg shadow flex items-center justify-center overflow-hidden">
              <img src="{{ asset('storage/' . $profile->logo) }}" alt="Company Logo" class="object-contain w-full h-full">
            </div>
            <div>
              <h1 class="text-2xl sm:text-3xl font-semibold">{{ $profile->company_name }}</h1>
              <p class="text-sm text-gray-500">{{ $profile->industry }} • {{ $profile->company_size }}</p>
            </div>
          </div>

          <div class="flex items-center gap-3">
            {{-- <a href=""
              class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
            Save
            </a> --}}
          </div>
        </header>

        <!-- Main content grid -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Left column: company details -->
          <div class="lg:col-span-2 space-y-6">
            <article 
  x-data="{ status: '{{ $profile->account_status ?? 'Active' }}' }" 
  class="bg-white p-6 rounded-lg shadow-sm"
>
  <h2 class="text-lg font-semibold mb-3">Account Info</h2>

  <form action="" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <!-- Employer ID & Registration Date -->
      <div>
        <label class="text-xs text-gray-500">Employer ID / Registration Date</label>
        <input type="text" readonly
          value="EMP-{{ str_pad($profile->employer_id, 6, '0', STR_PAD_LEFT) }} • {{ $profile->created_at->format('Y-m-d') }}"
          class="mt-1 w-full bg-gray-50 border-gray-200 rounded-md text-sm font-medium text-gray-700 px-3 py-2"
        >
      </div>

      <!-- Last Login / Activity -->
      <div>
        <label class="text-xs text-gray-500">Last Login / Activity</label>
        <input type="text" readonly
          value="{{ $profile->last_login ?? 'N/A' }}"
          class="mt-1 w-full bg-gray-50 border-gray-200 rounded-md text-sm font-medium text-gray-700 px-3 py-2"
        >
      </div>

      <!-- Account Status -->
      <div>
        <label for="account_status" class="text-xs text-gray-500">Account Status</label>
        <select id="account_status" name="account_status" x-model="status"
          class="mt-1 block w-full border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="Active" {{ $profile->account_status === 'Active' ? 'selected' : '' }}>Active</option>
          <option value="Suspended" {{ $profile->account_status === 'Suspended' ? 'selected' : '' }}>Suspended</option>
          <option value="Pending" {{ $profile->account_status === 'Pending' ? 'selected' : '' }}>Pending</option>
        </select>
      </div>

      <!-- Verified Status -->
      <div>
        <label for="verified" class="text-xs text-gray-500">Verified Status</label>
        <select id="verified" name="verified"
          class="mt-1 block w-full border-gray-300 rounded-md text-sm font-medium text-gray-700 focus:border-indigo-500 focus:ring-indigo-500">
          <option value="Yes" {{ $profile->verified === 'Yes' ? 'selected' : '' }}>Yes</option>
          <option value="No" {{ $profile->verified === 'No' ? 'selected' : '' }}>No</option>
        </select>
      </div>
    </div>

    <!-- Suspend Reason (shows only if Suspended) -->
    <div x-show="status === 'Suspended'" class="transition-all duration-300">
      <label for="suspend_reason" class="text-xs text-gray-500">Suspend Reason</label>
      <textarea id="suspend_reason" name="suspend_reason" rows="3"
        class="mt-1 w-full border-gray-300 rounded-md text-sm focus:border-indigo-500 focus:ring-indigo-500"
        placeholder="Enter reason for suspension...">{{ $profile->suspend_reason ?? '' }}</textarea>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end">
      <button type="submit"
        class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition">
        Update Info
      </button>
    </div>
  </form>
</article>

          </div>
        </section>
    </main>
  </body>
</x-admin-dashboard-body>