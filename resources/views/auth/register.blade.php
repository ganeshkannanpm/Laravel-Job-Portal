<x-layout>
  <x-header />

  <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="{{ route('register.store')}}" enctype="multipart/form-data" class="space-y-6">
      @csrf

      {{-- Common fields --}}
      <x-forms.input label="Name" name="name" />
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />
      <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

      {{-- Role selection --}}
      <div>
        <label class="block mb-1 font-medium">Register as</label>
        <select name="role" id="role" class="w-full border-gray-300 rounded-md">
          <option value="user">Job Seeker</option>
          <option value="employer">Employer</option>
        </select>
      </div>

      {{-- Employer-only fields --}}
      <div id="employerFields" class="hidden space-y-4">
        <x-forms.input label="Company Name" name="company_name" />
        <x-forms.input label="Company Logo" name="company_logo" type="file" />
      </div>

      <div class="pt-4">
        <button class="bg-indigo-600 rounded-md text-gray-100 px-4 py-2 hover:bg-gray-800" type="submit">
          Create Account
        </button>
      </div>
    </x-forms.form>
  </div>

  <div class="border-t bg-indigo-600 border-gray-700 pt-6 pb-6 text-center text-white">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>

  {{-- Toggle employer fields with JS --}}
  <script>
    document.getElementById('role').addEventListener('change', function () {
      let employerFields = document.getElementById('employerFields');
      employerFields.classList.toggle('hidden', this.value !== 'employer');
    });
  </script>
</x-layout>
