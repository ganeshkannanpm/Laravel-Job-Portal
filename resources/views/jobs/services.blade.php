<x-layout>

<x-header />
<body class="bg-gray-50">

  <!-- Hero Section -->
  <section class="pt-24 pb-16 text-center px-6 bg-indigo-600 text-white">
    <h2 class="text-4xl font-extrabold mb-3">Our Services</h2>
    <p class="max-w-2xl mx-auto text-lg">
      Everything you need to find the right job or hire the best talent.
    </p>
  </section>


  <!-- Services Grid -->
  <section class="max-w-7xl mx-auto px-6 py-16">

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

      <!-- Service Card -->
      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">💼</div>
        <h3 class="text-xl font-bold mb-2">Job Listings</h3>
        <p class="text-gray-600">
          Browse thousands of curated job opportunities from top companies across industries.
        </p>
      </div>

      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">🏢</div>
        <h3 class="text-xl font-bold mb-2">Company Hiring</h3>
        <p class="text-gray-600">
          Employers can post jobs, manage applications, and hire the right talent smoothly.
        </p>
      </div>

      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">📄</div>
        <h3 class="text-xl font-bold mb-2">Resume Builder</h3>
        <p class="text-gray-600">
          Create professional resumes with modern templates tailored for your industry.
        </p>
      </div>

      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">🎯</div>
        <h3 class="text-xl font-bold mb-2">Career Guidance</h3>
        <p class="text-gray-600">
          Personalized career tips, job recommendations, and interview preparation support.
        </p>
      </div>

      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">⚡</div>
        <h3 class="text-xl font-bold mb-2">Premium Services</h3>
        <p class="text-gray-600">
          Boost your profile visibility and get priority application reviews from employers.
        </p>
      </div>

      <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
        <div class="text-indigo-600 text-4xl mb-4">👨‍💻</div>
        <h3 class="text-xl font-bold mb-2">Freelance Projects</h3>
        <p class="text-gray-600">
          Explore freelance work opportunities and build your profile with real projects.
        </p>
      </div>

    </div>
  </section>


  <!-- CTA Section -->
  <section class="bg-indigo-600 text-white text-center px-6 py-16">
    <h3 class="text-3xl font-bold mb-3">Ready to Get Started?</h3>
    <p class="max-w-xl mx-auto mb-6">
      Create your account today and start your job search or begin hiring talent.
    </p>
    <div class="flex justify-center gap-4">
      <a href="{{ route('register.create') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-xl font-semibold shadow-md">Register</a>
      <a href="{{ route('login') }}" class="bg-gray-900 px-6 py-3 rounded-xl font-semibold shadow-md">Post a Job</a>
    </div>
  </section>

  <!-- Footer -->
  <x-footer />

</body>
</x-layout>