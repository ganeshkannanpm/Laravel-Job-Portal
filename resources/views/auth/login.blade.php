<x-layout>
  <x-header />
  <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
    <x-page-heading>Login</x-page-heading>
    <x-forms.form method="POST" action="{{ route('login.store') }}" enctype="multipart/form-data" class="space-y-6">
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />
      <div class="pt-4">
        <x-forms.button>Submit</x-forms.button>
      </div>
    </x-forms.form>
    <p class="text-center text-md text-gray-100 mt-6">
      Don’t have an account?
      <a href="/register" class="text-gray-100 hover:underline font-medium">Create one</a>
    </p>
  </div>
  <div class="mt-40 border-t border-gray-700 pt-6 text-center text-white">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>
</x-layout>