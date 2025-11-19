<x-layout>
    <x-header />
    <div class="max-w-md mx-auto mt-40 bg-white shadow-lg rounded-2xl p-8">

        <h2 class="text-2xl font-semibold mb-6 text-center">Forgot Password</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 text-sm bg-green-100 p-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-2 font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2 border border-gray-300 rounded-lg 
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold 
                   py-2 rounded-lg transition duration-200">
                Send Reset Link
            </button>
        </form>

    </div>
    <div class="mt-45 bg-gray-100 border-t border-gray-400 p-8 text-center text-gray-900">
        <p>&copy; 2025 Workly. All rights reserved.</p>
    </div>
</x-layout>