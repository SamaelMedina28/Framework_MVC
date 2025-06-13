<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm p-6 md:p-8">
            <!-- Encabezado -->
            <div class="mb-8">
                <a href="/tasks" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
                    <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
                </a>
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800"><?= htmlspecialchars($task['titulo']) ?></h1>
                        <div class="mt-1 flex items-center">
                            <?php
                            $statusIcons = [
                                'pendiente' => '🟡 Pendiente',
                                'en_proceso' => '🔵 En Proceso',
                                'completada' => '✅ Completada'
                            ];
                            $status = $task['estado'];
                            $statusText = ucfirst(str_replace('_', ' ', $status));
                            $statusClass = [
                                'pendiente' => 'bg-yellow-100 text-yellow-800',
                                'en_proceso' => 'bg-blue-100 text-blue-800',
                                'completada' => 'bg-green-100 text-green-800'
                            ][$status] ?? 'bg-gray-100 text-gray-800';
                            ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusClass ?>">
                                <?= $statusIcons[$status] ?? $statusText ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex space-x-2">
                        <a href="/tasks/<?= htmlspecialchars($task['id']) ?>/edit" 
                           class="inline-flex items-center px-3 py-1.5 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            <i class="fas fa-edit mr-1.5"></i> Editar
                        </a>
                        <form action="/tasks/<?= htmlspecialchars($task['id']) ?>/delete" method="post" class="inline">
                            <button type="submit" 
                                    class="inline-flex items-center px-3 py-1.5 border border-red-200 rounded-lg text-red-600 hover:bg-red-50 transition-colors"
                                    onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">
                                <i class="fas fa-trash mr-1.5"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contenido -->
            <div class="prose max-w-none">
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Descripción</h3>
                    <p class="text-gray-800 whitespace-pre-line"><?= nl2br(htmlspecialchars($task['descripcion'])) ?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animación al hacer clic en los botones
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