<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP MVC</title>
</head>
<body>
    <h2>CRUD PHP MVC</h2>

    <!-- Formulario para crear un nuevo registro -->
    <form action="?action=crear" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <button type="submit">Crear</button>
    </form>

    <!-- Mostrar registros existentes -->
    <h3>Registros existentes:</h3>
    <ul>
        <?php foreach ($usuarios as $usuario) : ?>
            <li>
                <?php echo $usuario['nombre'] . ' ' . $usuario['apellido']; ?>
                <a href="?action=eliminar&id=<?php echo $usuario['id']; ?>">Eliminar</a>

                <!-- Formulario para actualizar un registro -->
                <form action="?action=actualizar" method="post">
                    <input type="hidden"
