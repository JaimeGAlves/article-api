<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Article Management System</title>
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
            document.getElementById('theme-toggle').textContent = currentTheme;
        });
    </script>

    <div class="bg-white text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col">
        <header class="bg-red-600 text-white p-6 shadow-md flex justify-between items-center">
            <h1 class="text-xl font-bold">STS Informática</h1>
        </header>

        <main class="flex-grow">
            <section class="text-center py-12 px-6">
                <h2 class="text-3xl font-bold mb-4">System of Articles Management</h2>
                <p class="max-w-3xl mx-auto">A system of articles management for managing and publishing articles in a simple and efficient way.</p>
            </section>

            <section class="py-12 px-4">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-xl shadow-md">
                        <h3 class="text-2xl font-semibold mb-4 text-red-400">🌐 Frontend Routes</h3>
                        <ul class="list-disc list-inside text-blue-600 dark:text-blue-400 space-y-2">
                            <li><a href="/articles" class="hover:underline">List Articles</a></li>
                            <li><a href="/articles/create" class="hover:underline">Create Article</a></li>
                        </ul>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-xl shadow-md">
                        <h3 class="text-2xl font-semibold mb-4 text-red-400">🧹 API Endpoints</h3>
                        <ul class="list-disc list-inside font-mono text-gray-700 dark:text-gray-300 space-y-2">
                            <li>GET /api/articles</li>
                            <li>GET /api/articles/{id}</li>
                            <li>POST /api/articles</li>
                            <li>PUT /api/articles/{id}</li>
                            <li>DELETE /api/articles/{id}</li>
                        </ul>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-xl shadow-md">
                        <h3 class="text-2xl font-semibold mb-4 text-red-400">📄 Swagger Documentation</h3>
                        <ul class="list-disc list-inside text-blue-600 dark:text-blue-400 space-y-2">
                            <li><a href="/api/documentation" class="hover:underline">Swagger Documentation</a></li>
                        </ul>
                    </div>
                </div>
            </section>
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
