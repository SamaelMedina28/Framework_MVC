<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="font-bold text-2xl mb-4 text-gray-800">Tasks</h1>
    <ul class="space-y-3 w-1/2 mx-auto">
        <?php foreach ($tasks['data'] as $task) { ?>
            <li class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 flex items-center justify-between">
                <a href="/tasks/<?= $task['id'] ?>" class="text-blue-600 hover:text-blue-800 font-medium">
                    <?= $task['titulo'] ?>
                </a>
                <div class="flex gap-2 ml-4">
                    <a href="/tasks/<?= $task['id'] ?>/edit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors">
                        Editar
                    </a>
                    <form action="/tasks/<?= $task['id'] ?>/delete" method="post" class="inline">
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition-colors">
                            Eliminar
                        </button>
                    </form>
                </div>
            </li>
        <?php } ?>
    </ul>
    <a href="/tasks/create" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors flex justify-center my-3 w-[200px] mx-auto">Crear Tarea</a>



    <?php 
        $paginate = 'tasks';
        require_once '../resources/views/assets/pagination.php' 
    ?>


</body>

</html>