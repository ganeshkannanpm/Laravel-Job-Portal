<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Workly</title>
    @vite(['resources/css/app.css', 'resources/css/app.js'])
</head>

<body class="bg-gray-200 pb-10">
    <div class="bg-gray-800 px-10 fixed top-0 left-0 right-0 z-50">
        <nav class=" flex justify-between items-center py-4 text-gray-300">
            <div>
                <a href="/" class="font-sans font-semibold text-4xl">Workly</a>
                {{-- <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt=""> --}}
            </div>

            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-brand-accent">Home</a>
                <a href="#" class="hover:text-brand-accent">About Us</a>
                <a href="#" class="hover:text-brand-accent">Jobs</a>
                <a href="#" class="hover:text-brand-accent">Companies</a>
                <a href="#" class="hover:text-brand-accent">Contact Us</a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
            </div>
        </nav>

    </div>
    <x-banner />
    <main class="mt-10 max-w-[1500px] mx-auto">
        {{ $slot }}
    </main>

    
</body>

</html>