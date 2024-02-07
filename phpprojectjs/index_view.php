<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <script src="validaciones.js"></script>
</head>
<body>
    <h2>CRUD PHP</h2>

    <!-- Formulario para crear un nuevo registro -->
    <form action="" method="post" onsubmit="return validarFormularioCrear()">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <!-- Mensaje de validación para el campo Nombre -->
        <p id="errorNombre" style="color: red;"></p>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <!-- Mensaje de validación para el campo Apellido -->
        <p id="errorApellido" style="color: red;"></p>

        <button type="submit" name="submit">Crear</button>
    </form>

    <!-- Mostrar registros existentes -->
    <h3>Registros existentes:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li>
                <?php echo $row['nombre'] . ' ' . $row['apellido']; ?>
                <a href="?delete=<?php echo $row['id']; ?>">Eliminar</a>

                <!-- Botón para editar un registro -->
                <button onclick="mostrarFormularioEditar(<?php echo $row['id']; ?>)">Editar</button>

                <!-- Formulario para actualizar un registro (inicialmente oculto) -->
                <form id="formEditar_<?php echo $row['id']; ?>" action="" method="post" style="display: none;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="newNombre">Nuevo Nombre:</label>
                    <input type="text" name="newNombre" required>
                    <!-- Mensaje de validación para el campo Nuevo Nombre -->
                    <p id="errorNuevoNombre_<?php echo $row['id']; ?>" style="color: red;"></p>

                    <label for="newApellido">Nuevo Apellido:</label>
                    <input type="text" name="newApellido" required>
                    <!-- Mensaje de validación para el campo Nuevo Apellido -->
                    <p id="errorNuevoApellido_<?php echo $row['id']; ?>" style="color: red;"></p>

                    <button type="submit" name="update">Actualizar</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>

    <script>
        // Función para mostrar el formulario de edición correspondiente al hacer clic en "Editar"
        function mostrarFormularioEditar(id) {
            // Ocultar todos los formularios de edición
            document.querySelectorAll('form[id^="formEditar_"]').forEach(form => form.style.display = 'none');

            // Mostrar el formulario de edición correspondiente al ID
            document.getElementById('formEditar_' + id).style.display = 'block';
        }

        // Función para validar el formulario de creación
        function validarFormularioCrear() {
            var nombre = document.getElementById('nombre').value;
            var apellido = document.getElementById('apellido').value;

            var errorNombre = document.getElementById('errorNombre');
            var errorApellido = document.getElementById('errorApellido');

            errorNombre.innerHTML = '';
            errorApellido.innerHTML = '';

            var letras = /^[A-Za-z]+$/;

            if (nombre.trim() === '') {
                errorNombre.innerHTML = 'El campo Nombre no puede estar vacío.';
                return false;
            } else if (!nombre.match(letras)) {
                errorNombre.innerHTML = 'El nombre debe contener solo letras.';
                return false;
            }

            if (apellido.trim() === '') {
                errorApellido.innerHTML = 'El campo Apellido no puede estar vacío.';
                return false;
            } else if (!apellido.match(letras)) {
                errorApellido.innerHTML = 'El apellido debe contener solo letras.';
                return false;
            }

            return true;
        }

        // Función para validar el formulario de edición
        function validarFormularioEditar(id) {
            var nuevoNombre = document.getElementById('formEditar_' + id).elements.newNombre.value;
            var nuevoApellido = document.getElementById('formEditar_' + id).elements.newApellido.value;

            var errorNuevoNombre = document.getElementById('errorNuevoNombre_' + id);
            var errorNuevoApellido = document.getElementById('errorNuevoApellido_' + id);

            errorNuevoNombre.innerHTML = '';
            errorNuevoApellido.innerHTML = '';

            var letras = /^[A-Za-z]+$/;

            if (nuevoNombre.trim() === '') {
                errorNuevoNombre.innerHTML = 'El campo Nuevo Nombre no puede estar vacío.';
                return false;
            } else if (!nuevoNombre.match(letras)) {
                errorNuevoNombre.innerHTML = 'El nuevo nombre debe contener solo letras.';
                return false;
            }

            if (nuevoApellido.trim() === '') {
                errorNuevoApellido.innerHTML = 'El campo Nuevo Apellido no puede estar vacío.';
                return false;
            } else if (!nuevoApellido.match(letras)) {
                errorNuevoApellido.innerHTML = 'El nuevo apellido debe contener solo letras.';
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

