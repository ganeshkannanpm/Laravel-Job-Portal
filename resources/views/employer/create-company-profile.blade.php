<x-employer-dashboard-body>
<h1 class="text-2xl font-semibold mb-6 text-center">Company Profile</h1>

<form action="#" method="POST" enctype="multipart/form-data"
  class="bg-white shadow rounded-lg p-6 space-y-8">

  <!-- Company Information -->
  <section>
    <h2 class="text-lg font-semibold mb-4 border-b pb-2">Company Information</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">Company Name</label>
        <input type="text" name="company_name" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Industry / Business Type</label>
        <input type="text" name="industry" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Company Size</label>
        <input type="text" name="company_size" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 50–200 employees" />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Website URL</label>
        <input type="url" name="website" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com" />
      </div>

      <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Company Description</label>
        <textarea name="description" rows="3" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
      </div>

    </div>
  </section>

  <!-- Contact Details -->
  <section>
    <h2 class="text-lg font-semibold mb-4 border-b pb-2">Contact Details</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">HR / Recruiter Name</label>
        <input type="text" name="employer_name" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" name="phone" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Office Address</label>
        <textarea name="address" rows="2" class="mt-1 w-full border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
      </div>

    </div>
  </section>

  <!-- Optional -->
  <section>
    <h2 class="text-lg font-semibold mb-4 border-b pb-2">Company Branding</h2>
    <div>
      <label class="block text-sm font-medium text-gray-700">Company Logo</label>
      <input type="file" name="logo" accept="image/*" class="mt-1 text-sm" />
    </div>
  </section>

  <div class="flex justify-end gap-3 pt-4 border-t">
    <button type="reset" class="px-4 py-2 bg-gray-100 border rounded-lg">Reset</button>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Profile</button>
  </div>
</form>
</x-employer-dashboard-body>