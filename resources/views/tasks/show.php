<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Task</h1>
    <p><?=$task['titulo']?></p>
    <p><?=$task['descripcion']?></p>
    <p><?=ucfirst(str_replace('_', ' ', $task['estado']))?></p>
    <a href="/tasks/<?=$task['id']?>/edit">Editar</a>
    <form action="/tasks/<?=$task['id']?>/delete" method="post">
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>