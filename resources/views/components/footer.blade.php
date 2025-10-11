<footer class=" bg-gray-100 text-gray-900 py-5">
    <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- Logo & About -->
        <div>
            <div class="flex items-center space-x-2">
                <img src="{{asset('images/Workly_logo.jpg')}}" alt="Logo" class="h-18 w-18">
                <a href="/" class="font-bold  text-4xl text-indigo-600 hover:text-indigo-800 transition">Workly</a>
            </div>
            <p class="text-gray-900 mt-8">
                Find your dream job with us. Connecting talented professionals with top employers worldwide.
            </p>
            <h3 class="text-lg font-semibold mt-6">Follow Us</h3>
            <!-- Social Media -->
            <div class="flex space-x-4 mt-4">
                <!-- Facebook -->
                <a href="#" class="p-2 bg-indigo-600 rounded-full hover:bg-gray-800 transition">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M22 12C22 6.477 17.523 2 12 2S2 6.477 2 12a10 10 0 008.44 9.874v-6.99H7.898v-2.884H10.44V9.845c0-2.52 1.492-3.911 3.777-3.911 1.094 0 2.238.195 2.238.195v2.456h-1.26c-1.243 0-1.63.772-1.63 1.562v1.87h2.773l-.443 2.884h-2.33v6.99A10 10 0 0022 12z" />
                    </svg>
                </a>
                <!-- Twitter -->
                <a href="#" class="p-2 bg-indigo-600 rounded-full hover:bg-gray-800 transition">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19.633 7.581c.013.177.013.355.013.533 0 5.428-4.13 11.685-11.685 11.685-2.322 0-4.482-.678-6.296-1.844a8.233 8.233 0 005.96-1.667 4.122 4.122 0 01-3.849-2.861c.254.039.508.065.775.065.374 0 .748-.05 1.096-.143a4.118 4.118 0 01-3.297-4.042v-.051a4.14 4.14 0 001.86.522 4.118 4.118 0 01-1.272-5.494 11.675 11.675 0 008.457 4.287 4.643 4.643 0 01-.102-.944 4.118 4.118 0 017.124-2.813 8.233 8.233 0 002.61-.996 4.103 4.103 0 01-1.806 2.27 8.233 8.233 0 002.368-.64 8.845 8.845 0 01-2.056 2.13z" />
                    </svg>
                </a>
                <!-- LinkedIn -->
                <a href="#" class="p-2 bg-indigo-600 rounded-full hover:bg-gray-800 transition">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M4.983 3.5C4.983 4.604 4.106 5.5 3 5.5S1.017 4.604 1.017 3.5 1.894 1.5 3 1.5 4.983 2.396 4.983 3.5zM1.5 8.25h3v12h-3v-12zm7.5 0h2.88v1.641h.041c.402-.76 1.384-1.562 2.85-1.562 3.048 0 3.609 2.007 3.609 4.615v7.306h-3v-6.48c0-1.546-.027-3.54-2.156-3.54-2.159 0-2.49 1.676-2.49 3.422v6.598h-3v-12z" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Job Seekers</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Career Advice</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Browse Jobs</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Company Profile</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Help</a></li>
            </ul>
        </div>

        <!-- Job Categories -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Employers</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Post of a job</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Solutions</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Resources</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Pricing</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Help</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-4"></h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Privacy policy</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Terms & conditions</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Report issue</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Fraud alert</a></li>
                <li><a href="#" class="text-gray-900 no-underline hover:underline hover:text-indigo-600 transition">Service center</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div>
            {{-- <h3 class="text-lg font-semibold mb-4">Contact</h3>
            <ul class="space-y-2 text-gray-400">
                <li class="text-gray-900">Email: <a href="mailto:support@workly.com"
                        class="text-gray-900 hover:text-indigo-600 transition">support@workly.com</a></li>
                <li class="text-gray-900">Phone: <a href="tel:+1234567890"
                        class="text-gray-900 hover:text-indigo-600 transition">+1 234 567 890</a></li>
                <li class="text-gray-900">Location: <span class="text-gray-900 hover:text-indigo-600 transition">New York,
                        USA</span></li>
            </ul> --}}
            
        </div>
        <div>
        </div>
    </div>
    <!-- Bottom -->
    <div class="border-t border-gray-400 pt-6 text-center text-md text-gray-900">
        <p>&copy; 2025 Workly. All rights reserved.</p>
    </div>
    </div>
</footer>