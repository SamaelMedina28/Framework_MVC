<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korbo Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        .bg-dots {
            background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%239C92AC' fill-opacity='0.05' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-stone-50 min-h-screen bg-dots font-sans antialiased flex items-center justify-center p-4">
    <div class="max-w-4xl w-full">
        <div class="text-center mb-12">
            <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mr-3 text-stone-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h1 class="text-5xl font-bold text-stone-800">Korbo</h1>
            </div>
            <p class="mt-4 text-xl text-stone-600 max-w-2xl mx-auto">
                Tu aplicación PHP MVC está lista. Construye algo increíble.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Documentación -->
            <a href="/docs" class="card-hover bg-white p-8 rounded-xl shadow-md text-center group">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-100 text-stone-600 mx-auto mb-4 group-hover:bg-stone-200 transition-colors">
                    <i class="fas fa-book-open text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-800 mb-2">Documentación</h3>
                <p class="text-stone-600 text-sm">
                    Aprende cómo sacar el máximo provecho a Korbo Library
                </p>
            </a>

            <!-- Demo -->
            <a href="/demo" class="card-hover bg-white p-8 rounded-xl shadow-md text-center group">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-100 text-blue-600 mx-auto mb-4 group-hover:bg-blue-200 transition-colors">
                    <i class="fas fa-laptop-code text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-800 mb-2">Ver Demo</h3>
                <p class="text-stone-600 text-sm">
                    Explora las funcionalidades con nuestra aplicación de ejemplo
                </p>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/SamaelMedina28/Framework_MVC" target="_blank" class="card-hover bg-white p-8 rounded-xl shadow-md text-center group">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-stone-800 text-white mx-auto mb-4 group-hover:bg-stone-700 transition-colors">
                    <i class="fab fa-github text-xl"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-800 mb-2">GitHub</h3>
                <p class="text-stone-600 text-sm">
                    Contribuye, reporta issues o revisa el código fuente
                </p>
            </a>
        </div>

        <div class="mt-16 text-center text-stone-500 text-sm">
            <div class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-stone-100 text-stone-800">
                <i class="fas fa-bolt mr-2 text-yellow-500"></i> Versión 1.0.0 | PHP <?php echo phpversion(); ?>
            </div>
            <p class="mt-4">
                Korbo - Libreria PHP MVC
            </p>
        </div>
    </div>
</body>

</html>