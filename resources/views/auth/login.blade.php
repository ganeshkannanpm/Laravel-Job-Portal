<x-layout>
  <x-header />
  <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
    <x-page-heading>Login</x-page-heading>
    <x-forms.form method="POST" action="/register" enctype="multipart/form-data" class="space-y-6">
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />
      <div class="pt-4">
        <x-forms.button>Submit</x-forms.button>
      </div>
    </x-forms.form>
  </div>
  <div class="mt-50 border-t border-gray-700 pt-6 text-center text-white">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>
</x-layout>