<section class="bg-gray-800 text-white px-6 py-12 sm:px-8 lg:px-16">
  <div class="max-w-3xl mx-auto">
    <h2 class="text-3xl sm:text-4xl font-bold mb-8">Frequently asked questions</h2>

    <div x-data="{ open: 1 }" class="space-y-4">
      <!-- FAQ Item -->
      <div class="border-b border-gray-700 pb-4">
        <button 
          @click="open === 1 ? open = null : open = 1"
          class="flex justify-between items-center w-full text-left"
        >
          <span class="font-semibold">How do I create an account as a job seeker?</span>
          <span>
            <span x-show="open !== 1" x-cloak>+</span>
            <span x-show="open === 1" x-cloak>-</span>
          </span>
        </button>
        <p 
          x-show="open === 1" 
          x-transition
          x-cloak
          class="mt-2 text-gray-400"
        >
          Simply click on the "Sign Up" button, choose "Job Seeker" and fill in your details. Once you verify your email, your account will be ready.
        </p>
      </div>

      <!-- FAQ Item -->
      <div class="border-b border-gray-700 pb-4">
        <button 
          @click="open === 2 ? open = null : open = 2"
          class="flex justify-between items-center w-full text-left"
        >
          <span class="font-semibold">How can employers post a job?</span>
          <span>
            <span x-show="open !== 2" x-cloak>+</span>
            <span x-show="open === 2" x-cloak>-</span>
          </span>
        </button>
        <p 
          x-show="open === 2" 
          x-transition
          x-cloak
          class="mt-2 text-gray-400"
        >
          Employers can log in to their account, navigate to "Post a Job", fill out the form, and submit. Jobs will be visible after approval.
        </p>
      </div>

      <!-- FAQ Item -->
      <div class="border-b border-gray-700 pb-4">
        <button 
          @click="open === 3 ? open = null : open = 3"
          class="flex justify-between items-center w-full text-left"
        >
          <span class="font-semibold">Is it free to apply for jobs?</span>
          <span>
            <span x-show="open !== 3" x-cloak>+</span>
            <span x-show="open === 3" x-cloak>-</span>
          </span>
        </button>
        <p 
          x-show="open === 3" 
          x-transition
          x-cloak
          class="mt-2 text-gray-400"
        >
         Yes! Applying for jobs is completely free for job seekers on our platform.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<style>
  [x-cloak] { display: none !important; }
</style>
