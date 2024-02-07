<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>
<body>
    <h2>CRUD PHP</h2>

    <!-- Formulario para crear un nuevo registro -->
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <!-- Mensaje de validación para el campo Nombre -->
        <?php if (!empty($mensajeErroresCrear['nombre'])) : ?>
            <p style="color: red;"><?php echo $mensajeErroresCrear['nombre']; ?></p>
        <?php endif; ?>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <!-- Mensaje de validación para el campo Apellido -->
        <?php if (!empty($mensajeErroresCrear['apellido'])) : ?>
            <p style="color: red;"><?php echo $mensajeErroresCrear['apellido']; ?></p>
        <?php endif; ?>

        <button type="submit" name="submit">Crear</button>
    </form>

    <!-- Mostrar registros existentes -->
    <h3>Registros existentes:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li>
                <?php echo $row['nombre'] . ' ' . $row['apellido']; ?>
                
                <!-- Enlace para editar un registro -->
                <a href="?edit=<?php echo $row['id']; ?>">Editar</a>

                <!-- Enlace para eliminar un registro -->
                <a href="?delete=<?php echo $row['id']; ?>">Eliminar</a>

                <?php
                // Si hay un intento de editar este registro, mostrar el formulario de edición
                if (isset($_GET['edit']) && $_GET['edit'] == $row['id']) : ?>
                    <!-- Formulario para actualizar un registro -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <label for="newNombre">Nuevo Nombre:</label>
                        <input type="text" name="newNombre" required>
                        <!-- Mensaje de validación para el campo Nuevo Nombre -->
                        <?php if (!empty($mensajeErrorActualizar['nombre'])) : ?>
                            <p style="color: red;"><?php echo $mensajeErrorActualizar['nombre']; ?></p>
                        <?php endif; ?>

                        <label for="newApellido">Nuevo Apellido:</label>
                        <input type="text" name="newApellido" required>
                        <!-- Mensaje de validación para el campo Nuevo Apellido -->
                        <?php if (!empty($mensajeErrorActualizar['apellido'])) : ?>
                            <p style="color: red;"><?php echo $mensajeErrorActualizar['apellido']; ?></p>
                        <?php endif; ?>

                        <button type="submit" name="update">Actualizar</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>


