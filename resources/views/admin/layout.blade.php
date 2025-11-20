<!DOCTYPE html>
<html lang="id" class="{{ request()->session()->get('dark_mode', false) ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name', 'Rifat CV') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen flex flex-col lg:flex-row">
    <!-- Mobile Menu Toggle -->
    <button id="mobile-toggle" class="lg:hidden fixed top-4 left-4 z-50 bg-light-cyan dark:bg-dark-yellow text-white p-3 rounded-full shadow-lg hover:scale-110 transition">
        <i class="bi bi-list text-xl"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white dark:bg-gray-800 shadow-2xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out overflow-y-auto">
        <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h1 class="text-xl font-bold text-light-cyan dark:text-dark-yellow">Admin Panel</h1>
            <button id="sidebar-close" class="lg:hidden text-2xl text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">×</button>
        </div>
        <nav class="mt-8 px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-house-door mr-3"></i> Dashboard
            </a>
            <a href="{{ route('admin.profile') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.profile') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-person mr-3"></i> Profil
            </a>
            <a href="{{ route('admin.skills.index') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.skills.*') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-star mr-3"></i> Skills
            </a>
            <a href="{{ route('admin.projects.index') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.projects.*') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-folder mr-3"></i> Projects
            </a>
            <a href="{{ route('admin.education.index') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.education.*') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-mortarboard mr-3"></i> Pendidikan
            </a>
            <a href="{{ route('admin.certificates.index') }}" class="flex items-center px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.certificates.*') ? 'bg-light-cyan/20 dark:bg-dark-yellow/30 text-light-cyan dark:text-dark-yellow' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                <i class="bi bi-award mr-3"></i> Sertifikasi
            </a>
        </nav>
        <div class="absolute bottom-4 left-4 right-4">
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="w-full flex items-center px-4 py-3 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">
                    <i class="bi bi-box-arrow-right mr-3"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Overlay for Mobile -->
    <div id="overlay" class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden transition-opacity duration-300"></div>

    <!-- Main Content -->
    <div class="flex-1 lg:ml-0 p-4 sm:p-6 lg:p-8 min-h-screen">
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-lg dark:bg-green-900/30 dark:border-green-400 dark:text-green-300">
                <i class="bi bi-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg dark:bg-red-900/30 dark:border-red-400 dark:text-red-300">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- Theme Toggle (Fixed) -->
    <button id="theme-toggle" class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-light-cyan dark:bg-dark-yellow text-white rounded-full shadow-2xl flex items-center justify-center text-xl hover:scale-110 transition-all duration-300">
        <i class="bi bi-sun-fill"></i>
        <i class="bi bi-moon-fill absolute opacity-0"></i>
    </button>

    <script>
        // Mobile Sidebar Toggle
        const mobileToggle = document.getElementById('mobile-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const sidebarClose = document.getElementById('sidebar-close');

        mobileToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        });
        sidebarClose.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const sunIcon = themeToggle.querySelector('.bi-sun-fill');
        const moonIcon = themeToggle.querySelector('.bi-moon-fill');
        const html = document.documentElement;

        if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            sunIcon.classList.add('opacity-0');
            moonIcon.classList.remove('opacity-0');
        }

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                sunIcon.classList.add('opacity-0');
                moonIcon.classList.remove('opacity-0');
                localStorage.theme = 'dark';
            } else {
                moonIcon.classList.add('opacity-0');
                sunIcon.classList.remove('opacity-0');
                localStorage.theme = 'light';
            }
        });
    </script>
</body>
</html>