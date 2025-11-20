<!DOCTYPE html>
<html lang="id" class="light scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rifat Pratama - Web CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-black text-gray-800 dark:text-gray-200 min-h-screen flex flex-col">

    <!-- Toggle Mode (Pojok Kanan Atas) -->
    <button id="theme-toggle" class="fixed top-4 right-4 z-50 w-12 h-12 bg-cyan-500 dark:bg-yellow-500 text-white rounded-full shadow-2xl flex items-center justify-center text-xl hover:scale-110 transition-all duration-300">
        <i class="bi bi-sun-fill transition-all duration-500"></i>
        <i class="bi bi-moon-fill absolute opacity-0 transition-all duration-500"></i>
    </button>

    <!-- Main Content Area -->
    <main class="flex-1 w-full">
        @yield('content')
    </main>

    <!-- Footer Mobile Friendly -->
    <footer class="bg-gradient-to-r from-cyan-500 to-cyan-600 dark:from-yellow-500 dark:to-yellow-600 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-6 text-sm sm:text-base">
                <a href="mailto:rifatpratamaa@gmail.com" class="flex flex-col items-center gap-2 hover:opacity-80">
                    <i class="bi bi-envelope-fill text-2xl"></i>
                    <span>Email</span>
                </a>
                <a href="https://wa.me/6285863441987" class="flex flex-col items-center gap-2 hover:opacity-80">
                    <i class="bi bi-whatsapp text-2xl"></i>
                    <span>WhatsApp</span>
                </a>
                <a href="https://instagram.com/_rifatpratamaa" class="flex flex-col items-center gap-2 hover:opacity-80">
                    <i class="bi bi-instagram text-2xl"></i>
                    <span>Instagram</span>
                </a>
                <a href="https://github.com/Vhatzz" class="flex flex-col items-center gap-2 hover:opacity-80">
                    <i class="bi bi-github text-2xl"></i>
                    <span>GitHub</span>
                </a>
            </div>
            <p class="text-sm opacity-90">© 2025 Rifat Pratama — Sukabumi</p>

            @guest
            <div class="mt-6">
                <a href="{{ route('login') }}" class="inline-block bg-white/20 hover:bg-white/30 backdrop-blur-sm px-6 py-3 rounded-full text-sm font-medium border border-white/20 transition-all">
                    Admin Login
                </a>
            </div>
            @endguest
        </div>
    </footer>

    <script>
        // Toggle theme script
        const toggle = document.getElementById('theme-toggle');
        const sun = toggle.querySelector('.bi-sun-fill');
        const moon = toggle.querySelector('.bi-moon-fill');
        const html = document.documentElement;

        if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            sun.classList.add('opacity-0'); 
            moon.classList.remove('opacity-0');
        }

        toggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            if (html.classList.contains('dark')) {
                sun.classList.add('opacity-0'); 
                moon.classList.remove('opacity-0');
                localStorage.theme = 'dark';
            } else {
                moon.classList.add('opacity-0'); 
                sun.classList.remove('opacity-0');
                localStorage.theme = 'light';
            }
        });
    </script>
</body>
</html>