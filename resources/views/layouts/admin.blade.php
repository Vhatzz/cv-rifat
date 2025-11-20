<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100 dark:bg-gray-900">

<div x-data="{ sidebarOpen: false }" class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 w-64 fixed inset-y-0 z-30 transform transition-transform duration-200 ease-in-out"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

        <!-- Branding -->
        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">Admin Panel</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">Portfolio Dashboard</p>
        </div>

        <!-- Navigation -->
        <nav class="p-4 space-y-1 font-medium">

            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-speedometer2 mr-3"></i> Dashboard
            </a>

            <a href="{{ route('admin.projects.index') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.projects*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-kanban mr-3"></i> Projects
            </a>

            <a href="{{ route('admin.education.index') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.education*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-mortarboard mr-3"></i> Education
            </a>

            <a href="{{ route('admin.skills.index') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.skills*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-lightning-charge mr-3"></i> Skills
            </a>

            <a href="{{ route('admin.certificates.index') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.certificates*') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-award mr-3"></i> Certificates
            </a>

            <a href="{{ route('admin.profile') }}"
               class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700
               text-gray-700 dark:text-gray-300 {{ request()->routeIs('admin.profile') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                <i class="bi bi-person-circle mr-3"></i> Profile
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button class="w-full flex items-center px-4 py-2 rounded-lg bg-red-500/10 text-red-600 hover:bg-red-500/20 dark:text-red-400">
                    <i class="bi bi-box-arrow-right mr-3"></i> Logout
                </button>
            </form>

        </nav>
    </aside>

    <!-- Overlay (mobile) -->
    <div class="fixed inset-0 bg-black/40 z-20 md:hidden"
         x-show="sidebarOpen"
         x-transition.opacity
         @click="sidebarOpen = false"></div>


    <!-- Main Content -->
    <main class="flex-1 md:ml-64">

        <!-- Top Navigation Bar -->
        <header class="sticky top-0 z-10 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex justify-between items-center">
            
            <button @click="sidebarOpen = true" class="md:hidden text-gray-700 dark:text-gray-300 text-2xl">
                <i class="bi bi-list"></i>
            </button>

            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                Admin Dashboard
            </h2>

            <button class="text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white text-xl">
                <i class="bi bi-brightness-high"></i>
            </button>
        </header>

        <div class="p-6">
            @yield('content')
        </div>

    </main>

</div>

<script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
