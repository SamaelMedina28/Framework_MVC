<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
</head>
<body>
    <h1>Crear Tarea</h1>
    <form action="/tasks" method="post">
        <input type="text" name="titulo" placeholder="Titulo" required>
        <input type="text" name="descripcion" placeholder="Descripcion" required>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="completada">Completada</option>
            <option value="en_proceso">En Proceso</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>