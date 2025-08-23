<x-layout>
  <x-header />
  <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
    <x-page-heading>Register</x-page-heading>
    <x-forms.form method="POST" action="{{ route('register.store')}}" enctype="multipart/form-data" class="space-y-6">
      <x-forms.input label="Name" name="name" />
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />
      <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />
      <x-forms.input label="Employer Name" name="employer" />
      <x-forms.input label="Employer Logo" name="logo" type="file" />
      <div class="pt-4">
        <x-forms.button>Create Account</x-forms.button>
      </div>
    </x-forms.form>
  </div>
  <div class="border-t border-gray-700 pt-6 pb-6 text-center text-white">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>
</x-layout>