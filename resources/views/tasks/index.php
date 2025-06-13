<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Mis Tareas</h1>
                <p class="text-gray-600">Administra tus tareas pendientes</p>
            </div>
            <a href="/tasks/create" 
               class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center">
                <i class="fas fa-plus mr-2"></i> Nueva Tarea
            </a>
        </div>

        <!-- Search Bar -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
            <form action="/tasks" method="get" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-grow">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                           name="search" 
                           placeholder="Buscar tareas..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 foc us:ring-blue-500 focus:border-transparent outline-none transition-all"
                           value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </div>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors whitespace-nowrap">
                    Buscar
                </button>
            </form>
        </div>

        <!-- Tasks List -->
        <?php if (!empty($tasks['data'] ?? $tasks)): ?>
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    <?php foreach ($tasks['data'] ?? $tasks as $task): ?>
                        <li class="hover:bg-gray-50 transition-colors duration-150">
                            <div class="px-6 py-4 flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <a href="/tasks/<?= $task['id'] ?>" 
                                       class="text-lg font-medium text-gray-900 hover:text-blue-600 truncate block">
                                        <?= htmlspecialchars($task['titulo']) ?>
                                    </a>
                                    <?php if (!empty($task['descripcion'])): ?>
                                        <p class="text-gray-500 text-sm mt-1 line-clamp-2">
                                            <?= htmlspecialchars($task['descripcion']) ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex space-x-2">
                                    <a href="/tasks/<?= $task['id'] ?>/edit"
                                       class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50"
                                       title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="/tasks/<?= $task['id'] ?>/delete" method="post" class="inline">
                                        <button type="submit"
                                                class="text-red-600 hover:text-red-800 p-2 rounded-full hover:bg-red-50"
                                                title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Pagination -->
            <?php if (isset($tasks['data'])): ?>
                <div class="mt-6">
                    <?php 
                    $paginate = 'tasks';
                    require_once '../resources/views/assets/pagination.php';
                    ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-12 bg-white rounded-lg shadow-sm">
                <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-700">No hay tareas aún</h3>
                <p class="text-gray-500 mt-1">Comienza creando tu primera tarea</p>
                <a href="/tasks/create" 
                   class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg transition-colors">
                    Crear Tarea
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Añadir animación suave al hacer clic en los botones
        document.querySelectorAll('button, a[href^="/"]').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.add('transform', 'scale-95');
                setTimeout(() => {
                    this.classList.remove('transform', 'scale-95');
                }, 150);
            });
        });
    </script>
</body>

</html>