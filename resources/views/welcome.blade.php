<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>FreelanceHub - Conectando Talento</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gradient-to-b from-gray-900 to-gray-800">
        <!-- Navegación -->
        <nav class="fixed w-full bg-gradient-to-r from-gray-800 to-gray-900 shadow-lg z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="/" class="text-2xl font-bold text-white">
                            FreelanceHub
                        </a>
                    </div>
                    
                    <div class="hidden md:flex items-center space-x-8">
                        <a class="text-gray-300 hover:text-white transition">Inicio</a>
                        <a  class="text-gray-300 hover:text-white transition">Explorar Proyectos</a>
                        <a class="text-gray-300 hover:text-white transition">Cómo Funciona</a>
                        @auth
                            <a href="{{ route('filament.admin.pages.dashboard') }}" class="text-white font-medium hover:text-gray-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white font-medium hover:text-gray-300">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-gray-700 to-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                                Registrarse
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-gradient-to-b from-gray-800 to-gray-900 pt-32 pb-20">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                        Gestiona tus proyectos de manera eficiente
                    </h1>
                    <p class="text-xl text-white/90 mb-8">
                        FreelanceHub te permite organizar y monitorear tus proyectos de manera efectiva.
                    </p>
                    <a href="#" class="inline-block bg-gray-800 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-700 transition">
                        Comienza a gestionar tu proyecto
                    </a>
                </div>
            </div>
        </div>

        <!-- Proyectos Destacados -->
        <div class="py-20 bg-gradient-to-b from-gray-800 to-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12 text-white">Proyectos que puedes gestionar</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Proyecto 1 -->
                    <div class="bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2 text-white">Gestión de Tareas</h3>
                        <p class="text-gray-300">Organiza y asigna tareas a tu equipo de manera efectiva.</p>
                    </div>
                    <!-- Proyecto 2 -->
                    <div class="bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2 text-white">Seguimiento de Proyectos</h3>
                        <p class="text-gray-300">Monitorea el progreso de tus proyectos y ajusta estrategias.</p>
                    </div>
                    <!-- Proyecto 3 -->
                    <div class="bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition">
                        <h3 class="text-xl font-semibold mb-2 text-white">Gestión de Recursos</h3>
                        <p class="text-gray-300">Administra los recursos de tus proyectos de manera eficiente.</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- Preguntas Frecuentes -->
        <div class="py-20 bg-gradient-to-b from-gray-800 to-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12 text-white">Preguntas Frecuentes</h2>
                <div class="space-y-4">
                    <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                        <h3 class="font-semibold text-white">¿Cómo funciona el sistema de gestión de proyectos?</h3>
                        <p class="text-gray-300">Nuestra plataforma permite gestionar tus proyectos de manera eficiente.</p>
                    </div>
                    <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                        <h3 class="font-semibold text-white">¿Es seguro gestionar mis proyectos aquí?</h3>
                        <p class="text-gray-300">Sí, ofrecemos un sistema seguro para la gestión de tus proyectos.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Final -->
        <div class="bg-gradient-to-b from-gray-700 to-gray-800 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-8">
                    ¿Listo para llevar tu proyecto al siguiente nivel?
                </h2>
                <div class="space-x-4">
                    <a href="{{ route('register') }}" class="inline-block bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-500 transition">
                        Registrate ahora
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gradient-to-b from-gray-900 to-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Enlaces rápidos -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Enlaces Rápidos</h3>
                        <ul class="space-y-2">
                            <li><a  class="text-gray-400 hover:text-white transition">Inicio</a></li>
                            <li><a  class="text-gray-400 hover:text-white transition">FAQ</a></li>
                            <li><a  class="text-gray-400 hover:text-white transition">Términos y Condiciones</a></li>
                        </ul>
                    </div>
                    <!-- Redes Sociales -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Síguenos</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Facebook</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">Twitter</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition">LinkedIn</a></li>
                        </ul>
                    </div>
                    <!-- Más secciones del footer... -->
                </div>
                <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                    <p>&copy; {{ date('Y') }} FreelanceHub. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
