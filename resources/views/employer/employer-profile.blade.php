<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Add Employer — Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <main class="max-w-4xl mx-auto p-4 sm:p-6 lg:p-10">
    <h1 class="text-2xl font-semibold mb-6 text-center">Add Employer Information</h1>

    <form action="#" method="POST" class="bg-white shadow rounded-lg p-6 space-y-8">
      <!-- Company Information -->
      <section>
        <h2 class="text-lg font-semibold mb-4 border-b pb-2">Company Information</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" name="company_name" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter company name" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Industry / Business Type</label>
            <input type="text" name="industry" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. IT, Manufacturing" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Company Size</label>
            <input type="text" name="company_size" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. 50–200 employees" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Website URL</label>
            <input type="url" name="website" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com" />
          </div>
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Company Description</label>
            <textarea name="description" rows="3" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Briefly describe the company"></textarea>
          </div>
        </div>
      </section>

      <!-- Contact Details -->
      <section>
        <h2 class="text-lg font-semibold mb-4 border-b pb-2">Contact Details</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Employer Name (HR/Recruiter)</label>
            <input type="text" name="employer_name" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" name="phone" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
          <div class="sm:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Office Address</label>
            <textarea name="address" rows="2" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter full address"></textarea>
          </div>
        </div>
      </section>

      <!-- Account Info -->
      <section>
        <h2 class="text-lg font-semibold mb-4 border-b pb-2">Account Info</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Employer ID / Registration Date</label>
            <input type="text" name="registration_date" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="EMP-0001 / 2025-10-22" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Account Status</label>
            <select name="account_status" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
              <option>Active</option>
              <option>Suspended</option>
              <option>Pending Approval</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Verified Status</label>
            <select name="verified" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
              <option>Yes</option>
              <option>No</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Number of Jobs Posted</label>
            <input type="number" name="jobs_posted" min="0" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Total Applicants Received</label>
            <input type="number" name="applicants_received" min="0" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
        </div>
      </section>

      <!-- Optional -->
      <section>
        <h2 class="text-lg font-semibold mb-4 border-b pb-2">Optional</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Company Logo</label>
            <input type="file" name="logo" accept="image/*" class="mt-1 w-full text-sm" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Last Login / Activity Date</label>
            <input type="datetime-local" name="last_login" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Resume Downloads Count</label>
            <input type="number" name="downloads" min="0" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Rating or Feedback</label>
            <textarea name="feedback" rows="2" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Feedback from applicants"></textarea>
          </div>
        </div>
      </section>

      <!-- Submit -->
      <div class="flex justify-end gap-3 pt-4 border-t">
        <button type="reset" class="px-4 py-2 bg-gray-100 border border-gray-200 rounded-lg">Reset</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Save Employer</button>
      </div>
    </form>
  </main>
</body>
</html>
