<x-layout>
  <x-header />

  <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
    <x-page-heading>User Register</x-page-heading>

    <x-forms.form method="POST" action="{{ route('register.store')}}" enctype="multipart/form-data" class="space-y-6">
      @csrf
      <x-forms.input label="Name" name="name" />
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />
      <x-forms.input label="Password Confirmation" name="password_confirmation" type="password" />

      <div class="pt-4">
        <button class="bg-indigo-600 rounded-md text-gray-100 px-4 py-2 hover:bg-gray-800" type="submit">
          Create Account
        </button>
      </div>
    </x-forms.form>
  </div>

  <div class="border-t bg-gray-100 border-gray-400 pt-6 pb-6 text-center text-gray-900">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>

</x-layout>