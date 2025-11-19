<x-layout>
    <x-header />
    <div class="max-w-md mx-auto mt-20 bg-white shadow-lg rounded-2xl p-8">

        <h2 class="text-2xl font-semibold mb-6 text-center">Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-4">
                <label class="block mb-2 font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $email) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block mb-2 font-medium text-gray-700">New Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block mb-2 font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg 
                   hover:bg-indigo-700 transition duration-200">
                Reset Password
            </button>

        </form>

    </div>
    <div class="mt-45 bg-gray-100 border-t border-gray-400 p-8 text-center text-gray-900">
        <p>&copy; 2025 Workly. All rights reserved.</p>
    </div>
</x-layout>