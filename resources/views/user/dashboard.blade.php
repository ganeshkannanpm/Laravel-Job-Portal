<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-600 font-sans">

  <div class="flex h-screen" x-data="{ sidebarOpen: false, openMenu: null }">

    <!-- Sidebar -->
    <x-user-sidebar :user="$user" />

    <!-- Overlay (mobile) -->
    <div class="fixed inset-0 bg-black opacity-50 z-20 md:hidden" x-show="sidebarOpen" @click="sidebarOpen = false"
      x-transition.opacity>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ">

      <!-- Navbar -->
      <x-user-dashboard-header />

  
      {{-- <x-job-application /> --}}
    </div>
  </div>

  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>

</html>