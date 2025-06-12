<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
</head>

<body>
    <h1>Editar Tarea</h1>
    <form action="/tasks/<?=$task['id']?>" method="post">
        <input type="text" name="titulo" placeholder="Titulo" required value="<?=$task['titulo']?>">
        <input type="text" name="descripcion" placeholder="Descripcion" required value="<?=$task['descripcion']?>">
        <select name="estado" required>
            <option <?= $task['estado'] == 'pendiente' ? 'selected' : '' ?> value="pendiente">Pendiente</option>
            <option <?= $task['estado'] == 'completada' ? 'selected' : '' ?> value="completada">Completada</option>
            <option <?= $task['estado'] == 'en_proceso' ? 'selected' : '' ?> value="en_proceso">En Proceso</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>