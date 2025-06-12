<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIAFC')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
</head>
<body class="antialiased transition-colors">
<script>
    const theme = localStorage.getItem('theme');
    if (theme === 'light') {
        document.documentElement.classList.remove('dark');
    } else {
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }

    function toggleTheme() {
        const html = document.documentElement;
        const isDark = html.classList.toggle('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        document.getElementById('theme-toggle').textContent = isDark ? '☀️' : '🌙';
    }

    window.addEventListener('DOMContentLoaded', () => {
        const currentTheme = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
        const btn = document.getElementById('theme-toggle');
        if (btn) btn.textContent = currentTheme;
    });
</script>

<div class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
    <header class="bg-red-600 text-white p-6 shadow-md flex justify-between items-center">
        <h1 class="text-xl font-bold">STS Informática</h1>
    </header>

    <main class="flex-grow px-6 py-10">
        @yield('content')
    </main>

    <footer class="text-center text-sm py-6 text-gray-600 dark:text-gray-400">
        <p class="mb-4">Jaime Gabriel. &copy; {{ date('Y') }}. All rights reserved.</p>
        <button id="theme-toggle" onclick="toggleTheme()" class="text-lg px-3 py-1 rounded border border-gray-500 dark:border-gray-300">
            ☀️
        </button>
    </footer>
</div>
</body>
</html>
