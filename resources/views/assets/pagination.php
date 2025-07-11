<nav aria-label="Page navigation" class="w-1/2 mx-auto">
    <div class="flex items-center justify-between border-t border-gray-200 px-4 py-3 sm:px-6">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Mostrando
                    <span class="font-medium"><?= $$paginate['from'] ?></span>
                    al
                    <span class="font-medium"><?= $$paginate['to'] ?></span>
                    de
                    <span class="font-medium"><?= $$paginate['total'] ?></span>
                    resultados
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs" aria-label="Pagination">
                    <a href="<?= $$paginate['prev_page'] ?><?= isset($$paginate['prev_page']) ? (isset($_GET['search']) ? "&search={$_GET['search']}" : '') : null ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Anterior</span>
                        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <?php for ($i = 1; $i <= $$paginate['total_pages']; $i++) { ?>
                        <?php if ($i == $$paginate['current_page']) { ?>
                            <a href="/tasks?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><?= $i ?></a>
                        <?php } else { ?>
                            <a href="/tasks?page=<?= $i ?><?= isset($_GET['search']) ? '&search=' . $_GET['search'] : '' ?>" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0"><?= $i ?></a>
                        <?php } ?>
                    <?php } ?>
                    <a href="<?= $$paginate['next_page'] ?><?= isset($$paginate['next_page']) ? (isset($_GET['search']) ? "&search={$_GET['search']}" : '') : null ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                        <span class="sr-only">Siguiente</span>
                        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>

</nav>