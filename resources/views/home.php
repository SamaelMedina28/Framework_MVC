<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Korbo - Mini framework PHP MVC inspirado en Laravel, rápido y ligero para desarrollo ágil">
    <title>Korbo Framework PHP MVC | Alternativa ligera a Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        .bg-dots {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%239C92AC' fill-opacity='0.05' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
        }

        .gradient-text {
            background: linear-gradient(45deg, #4b5563, #1e293b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-stone-50 min-h-screen bg-dots font-sans antialiased">
    <!-- Barra de navegación -->
    <nav class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="text-xl font-bold text-stone-800 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-stone-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Korbo
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/docs" class="text-stone-600 hover:text-stone-900 transition-colors">
                        <i class="fas fa-book mr-1"></i> Documentación
                    </a>
                    <a href="/tasks" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-stone-600 hover:bg-stone-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors">
                        <i class="fas fa-tasks mr-2"></i> Demo
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="text-center">
            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-stone-100 text-stone-800 mb-6">
                <i class="fas fa-bolt mr-2 text-yellow-500"></i> Versión 1.0.0
            </div>
            <h1 class="text-5xl font-extrabold tracking-tight sm:text-6xl lg:text-7xl">
                <span class="gradient-text">Construye rápido</span> con Korbo
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-stone-600">
                Un mini framework PHP MVC inspirado en Laravel, pero ultra ligero y fácil de usar. Perfecto para proyectos pequeños y medianos donde necesitas productividad sin la sobrecarga de un framework completo.
            </p>
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
                <a href="/tasks" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-stone-600 hover:bg-stone-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors">
                    <i class="fas fa-play-circle mr-2"></i> Ver demostración
                </a>
                <a href="#install" class="inline-flex items-center justify-center px-6 py-3 border border-stone-300 text-base font-medium rounded-md text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors">
                    <i class="fas fa-download mr-2"></i> Instalar ahora
                </a>
                <a href="https://github.com/tu-usuario/korbo" target="_blank" class="inline-flex items-center justify-center px-6 py-3 border border-stone-300 text-base font-medium rounded-md text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors">
                    <i class="fab fa-github mr-2"></i> GitHub
                </a>
            </div>

            <!-- Stats -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-3xl font-bold text-stone-800">~150KB</div>
                    <div class="text-stone-600 mt-1">Tamaño del núcleo</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-3xl font-bold text-stone-800">100%</div>
                    <div class="text-stone-600 mt-1">PHP puro</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-3xl font-bold text-stone-800">MVC</div>
                    <div class="text-stone-600 mt-1">Arquitectura</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <div class="text-3xl font-bold text-stone-800">0</div>
                    <div class="text-stone-600 mt-1">Dependencias</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Sección de características -->
    <section id="features" class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-stone-900 sm:text-4xl">
                    <span class="block">Funcionalidades principales</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-stone-600 mx-auto">
                    Todo lo esencial de un framework moderno, sin la complejidad innecesaria
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-project-diagram text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">Arquitectura MVC</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Separación clara entre Modelos, Vistas y Controladores para un código organizado y mantenible.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Enrutamiento elegante</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Inyección de dependencias básica</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Sistema de plantillas simple</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-database text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">ORM Básico</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Interacción con bases de datos mediante un ORM simplificado inspirado en Eloquent.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Consultas fluidas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Relaciones básicas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Migraciones simples</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-shield-alt text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">Seguridad</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Protecciones esenciales para tu aplicación sin configuración complicada.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>CSRF protection</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Validación de datos</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Escape de salida automático</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-tachometer-alt text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">Rendimiento</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Ultra ligero y rápido, perfecto para hosting compartido o proyectos pequeños.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Sin dependencias externas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Bajo consumo de memoria</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Carga instantánea</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-code text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">Sintaxis familiar</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Si conoces Laravel, te sentirás como en casa. Diseñado para una curva de aprendizaje mínima.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Helpers similares</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Estructura de directorios familiar</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Convenciones similares</span>
                        </li>
                    </ul>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card bg-stone-50 p-8 rounded-xl transition-all duration-300 ease-in-out">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mb-6">
                        <i class="fas fa-plug text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-stone-900">Extensible</h3>
                    <p class="mt-3 text-base text-stone-600">
                        Añade solo lo que necesites. Fácil de extender con tus propias librerías.
                    </p>
                    <ul class="mt-4 space-y-2 text-stone-600">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Sistema de middlewares</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Eventos básicos</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-2 text-sm"></i>
                            <span>Facades opcionales</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Installation Section -->
    <section id="install" class="py-16 bg-stone-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-stone-900 sm:text-4xl">
                    <span class="block">Instalación en 3 pasos</span>
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-stone-600 mx-auto">
                    Comienza a usar Korbo en minutos
                </p>
            </div>

            <div class="mt-12 space-y-8">
                <!-- Step 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-stone-100 rounded-md p-3">
                            <span class="text-stone-800 font-bold text-xl">1</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-stone-900">Descarga el framework</h3>
                            <div class="mt-2 bg-stone-800 text-stone-100 p-4 rounded-md font-mono text-sm overflow-x-auto">
                                <span class="text-green-400">$</span> git clone https://github.com/tu-usuario/korbo.git
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-stone-100 rounded-md p-3">
                            <span class="text-stone-800 font-bold text-xl">2</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-stone-900">Configura el entorno</h3>
                            <div class="mt-2 bg-stone-800 text-stone-100 p-4 rounded-md font-mono text-sm overflow-x-auto">
                                <span class="text-green-400">$</span> cp .env.example .env<br>
                                <span class="text-green-400">$</span> php korbo key:generate
                            </div>
                            <p class="mt-2 text-stone-600 text-sm">
                                Edita el archivo .env con tus credenciales de base de datos
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 bg-stone-100 rounded-md p-3">
                            <span class="text-stone-800 font-bold text-xl">3</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-stone-900">¡Listo para empezar!</h3>
                            <div class="mt-2 bg-stone-800 text-stone-100 p-4 rounded-md font-mono text-sm overflow-x-auto">
                                <span class="text-green-400">$</span> php korbo serve
                            </div>
                            <p class="mt-4 text-stone-600">
                                Abre tu navegador en <a href="http://localhost:8000" class="text-stone-800 font-medium hover:underline">http://localhost:8000</a> y comienza a desarrollar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-stone-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold sm:text-4xl">
                <span class="block">¿Listo para comenzar?</span>
            </h2>
            <p class="mt-4 max-w-2xl text-xl text-stone-300 mx-auto">
                Korbo es perfecto para prototipos rápidos, proyectos pequeños o cuando necesitas algo más ligero que Laravel.
            </p>
            <div class="mt-8 flex justify-center">
                <a href="/docs" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-stone-800 bg-white hover:bg-stone-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-stone-500 transition-colors">
                    <i class="fas fa-book-open mr-2"></i> Ver documentación
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white text-lg font-medium mb-4">Korbo</h3>
                    <p class="text-sm">
                        Un mini framework PHP MVC inspirado en Laravel, pero más ligero y sencillo para proyectos ágiles.
                    </p>
                </div>
                <div>
                    <h3 class="text-white text-lg font-medium mb-4">Recursos</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/docs" class="hover:text-white transition-colors">Documentación</a></li>
                        <li><a href="/examples" class="hover:text-white transition-colors">Ejemplos</a></li>
                        <li><a href="https://github.com/tu-usuario/korbo" class="hover:text-white transition-colors">GitHub</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-medium mb-4">Comunidad</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">GitHub Issues</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Twitter</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Stack Overflow</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white text-lg font-medium mb-4">Legal</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Licencia MIT</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Política de privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-stone-800 text-sm text-center">
                <p>© 2023 Korbo Framework. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add animation to feature cards on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>

</html>