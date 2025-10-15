<x-layout>
    <x-header />
    <div class="max-w-xl mx-auto mt-30 mb-10 px-6">
        <x-page-heading>Employer Register</x-page-heading>
        <x-forms.form method="POST" action="{{ route('employer-register.store') }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            <x-forms.input label="Name" name="name" />
            <x-forms.input label="Company Name" name="company_name" />
            <x-forms.input label="Email" name="email" type="email" />
            <x-forms.input label="Password" name="password" type="password" />
            <x-forms.input label="Confirm Password" name="password_confirmation" type="password" />
            <x-forms.input label="Company Logo" name="company_logo" type="file" />

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-gray-800" type="submit">
                Register Employer
            </button>
        </x-forms.form>
    </div>
    <div class="border-t bg-gray-100 border-gray-400 pt-6 pb-6 text-center text-gray-900">
        <p>&copy; 2025 Workly. All rights reserved.</p>
    </div>
</x-layout>