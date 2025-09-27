<x-user-dashboard-body>
<body class="">
  <div class="container mx-auto mt-10 max-w-lg bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-bold mb-6">My Skills</h2>

    <!-- Success Message -->
    <div class="mb-4 hidden" id="successMessage">
      <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded">
        Skill added successfully!
      </div>
    </div>

    <!-- Add Skill -->
    <form class="mb-6 flex">
      <input type="text" class="flex-1 border rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter a skill" required>
      <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-700">Add</button>
    </form>

    <!-- Skill List -->
    <ul class="space-y-2">
      <li class="flex justify-between items-center bg-gray-50 px-4 py-2 rounded-md shadow-sm">
        <span>PHP</span>
        <button class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Delete</button>
      </li>
      <li class="flex justify-between items-center bg-gray-50 px-4 py-2 rounded-md shadow-sm">
        <span>Laravel</span>
        <button class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Delete</button>
      </li>
      <li class="flex justify-between items-center bg-gray-50 px-4 py-2 rounded-md shadow-sm">
        <span>JavaScript</span>
        <button class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Delete</button>
      </li>
    </ul>

    <!-- No skills placeholder -->
    <!-- <p class="text-gray-500">No skills added yet.</p> -->
  </div>
</body>
</x-user-dashboard-body>
