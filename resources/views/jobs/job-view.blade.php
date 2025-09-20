<x-layout>
  <x-header />
  <section class="mt-10">
    <body class="bg-gray-100 ">
      <div class="max-w-5xl mx-auto p-10 ">
        <!-- Header Section -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
              <img src="https://picsum.photos/200" class="w-16 h-16 rounded-xl border" alt="Company Logo">
              <div>
                <h1 class="text-2xl font-bold text-gray-800">Frontend Developer</h1>
                <p class="text-gray-600">Tech Solutions Pvt Ltd</p>
                <p class="text-sm text-gray-500">📍 Chennai, India • Full Time • ₹6-8 LPA</p>
              </div>
            </div>
            <a href="{{route('login.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl font-medium shadow">
              Apply Now
            </a>
          </div>
        </div>

        <!-- Job Description -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <h2 class="text-xl font-semibold mb-3">Job Description</h2>
          <p class="text-gray-700 leading-relaxed">
            We are looking for a skilled Frontend Developer to join our dynamic team.
            You will be responsible for building user-friendly web applications using
            modern JavaScript frameworks and ensuring excellent user experience.
          </p>
        </div>

        <!-- Responsibilities -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <h2 class="text-xl font-semibold mb-3">Responsibilities</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Develop responsive web pages using React.js and Tailwind CSS.</li>
            <li>Work closely with designers and backend developers.</li>
            <li>Optimize application performance and scalability.</li>
            <li>Participate in code reviews and team meetings.</li>
          </ul>
        </div>

        <!-- Requirements -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <h2 class="text-xl font-semibold mb-3">Requirements</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Bachelor’s degree in Computer Science or related field.</li>
            <li>2+ years of experience in frontend development.</li>
            <li>Strong knowledge of JavaScript, React, and Tailwind CSS.</li>
            <li>Good understanding of REST APIs and Git.</li>
          </ul>
        </div>

        <!-- Skills -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <h2 class="text-xl font-semibold mb-3">Skills Required</h2>
          <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">JavaScript</span>
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">React.js</span>
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">Tailwind CSS</span>
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-sm font-medium">Git</span>
          </div>
        </div>

        <!-- Company Info -->
        <div class="bg-white shadow-md rounded-2xl p-6 mb-6">
          <h2 class="text-xl font-semibold mb-3">About Company</h2>
          <p class="text-gray-700 leading-relaxed">
            Tech Solutions Pvt Ltd is a leading IT company specializing in web
            development and digital solutions. We focus on innovation and delivering
            high-quality products to our clients worldwide.
          </p>
        </div>

        <!-- Footer Info -->
        <div class="bg-white shadow-md rounded-2xl p-6 flex justify-between items-center">
          <p class="text-gray-500 text-sm">📅 Posted 3 days ago • 👥 24 applicants</p>
          <a href="{{route('login.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-medium shadow">
            Save
          </a>
        </div>
      </div>
    </body>
  </section>
  <div class=" bg-indigo-600 border-t border-gray-700 p-8 text-center text-gray-100">
    <p>&copy; 2025 Workly. All rights reserved.</p>
  </div>
</x-layout>