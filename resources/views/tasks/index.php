<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
    <!-- Tailwind -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>
<body>
    <h1>Tasks</h1>
    <ul>
        <?php foreach ($tasks as $task) { ?>
            <li>
                <a href="/tasks/<?=$task['id']?>">
                    <?=$task['titulo']?>
                </a>
                <a href="/tasks/<?=$task['id']?>/edit">Editar</a>
                <form action="/tasks/<?=$task['id']?>/delete" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        <?php } ?>
    </ul>
    <a href="/tasks/create">Crear Tarea</a>
</body>
</html>