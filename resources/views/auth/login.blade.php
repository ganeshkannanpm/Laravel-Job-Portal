<x-layout>
  <x-header />
  <div class="max-w-xl mx-auto mt-30 mb-10 px-6 ">
    <x-page-heading>Please Login to continue</x-page-heading>
    <x-forms.form method="POST" action="{{ route('login.store') }}" enctype="multipart/form-data" class="space-y-6">
      <x-forms.input label="Email" name="email" type="email" />
      <x-forms.input label="Password" name="password" type="password" />

      <!-- Forgot Password Link -->
      <div class="text-right -mt-2">
        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
          Forgot Password?
        </a>
      </div>

      <div class="pt-4">
        <button class="bg-indigo-600 rounded-md text-gray-100 px-4 py-2 hover:bg-gray-800" type="submit">Submit</button>
      </div>
    </x-forms.form>

    <p class="text-center text-md text-gray-900-100 mt-6">
      Don’t have an account?
      <a href="/register" class=" text-indigo-600 hover:underline font-medium">Create one</a>
    </p>
  </div>

  <div class="mt-45 bg-gray-100 border-t border-gray-400 p-8 text-center text-gray-900">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>
</x-layout>