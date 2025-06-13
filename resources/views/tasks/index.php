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



    <nav aria-label="Page navigation example" class="w-1/2 mx-auto">
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Mostrando
                        <span class="font-medium"><?=$tasks['from']?></span>
                        al
                        <span class="font-medium"><?=$tasks['to']?></span>
                        de
                        <span class="font-medium"><?=$tasks['total']?></span>
                        resultados
                    </p>
                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs" aria-label="Pagination">
                        <a href="<?=$tasks['prev_page']?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Previous</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <?php for ($i = 1; $i <= $tasks['total_pages']; $i++) { ?>
                            <?php if ($i == $tasks['current_page']) { ?>
                                <a href="/tasks?page=<?=$i?>" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><?=$i?></a>
                            <?php } else { ?>
                                <a href="/tasks?page=<?=$i?>" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0"><?=$i?></a>
                            <?php } ?>
                        <?php } ?>
                        <a href="<?=$tasks['next_page']?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0<?= $tasks['next_page'] ? '' : 'disabled' ?>">
                            <span class="sr-only">Next</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>

    </nav>


</body>

</html>