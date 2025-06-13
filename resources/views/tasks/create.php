<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Tarea</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm p-6 md:p-8">
            <div class="mb-8">
                <a href="/tasks" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-4">
                    <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
                </a>
                <h1 class="text-2xl font-bold text-gray-800">Nueva Tarea</h1>
                <p class="text-gray-600">Completa los detalles de la tarea</p>
            </div>

            <form action="/tasks" method="post" class="space-y-6">
                <!-- Campo Título -->
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-heading text-gray-400"></i>
                        </div>
                        <input type="text" 
                               id="titulo" 
                               name="titulo" 
                               required
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all"
                               placeholder="Título de la tarea"
                               autofocus>
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <div class="relative">
                        <div class="absolute top-3 left-3">
                            <i class="fas fa-align-left text-gray-400"></i>
                        </div>
                        <textarea id="descripcion" 
                                  name="descripcion" 
                                  rows="4"
                                  required
                                  class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all resize-none"
                                  placeholder="Describe los detalles de la tarea"></textarea>
                    </div>
                </div>

                <!-- Campo Estado -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-tasks text-gray-400"></i>
                        </div>
                        <select id="estado" 
                                name="estado" 
                                required
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none appearance-none bg-white">
                            <option value="pendiente">🟡 Pendiente</option>
                            <option value="en_proceso">🔵 En Proceso</option>
                            <option value="completada">✅ Completada</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="/tasks" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all flex items-center">
                        <i class="fas fa-save mr-2"></i> Guardar Tarea
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animación al hacer clic en el botón
        document.querySelector('button[type="submit"]').addEventListener('click', function() {
            this.classList.add('transform', 'scale-95');
            setTimeout(() => {
                this.classList.remove('transform', 'scale-95');
            }, 150);
        });
    </script>
</body>
</html>