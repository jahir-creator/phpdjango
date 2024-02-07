

<?php
include('conexion.php');

// Función para validar que una cadena contiene solo letras
function validarLetras($cadena) {
    return preg_match("/^[a-zA-Z]+$/", $cadena);
}

// Función para validar datos
function validarDatos($nombre, $apellido) {
    $errores = [];

    // Verificar que los campos no estén vacíos
    if (empty($nombre)) {
        $errores['nombre'] = "El campo Nombre no puede estar vacío.";
    }

    if (empty($apellido)) {
        $errores['apellido'] = "El campo Apellido no puede estar vacío.";
    }

    // Verificar que nombre y apellido contengan solo letras
    if (!validarLetras($nombre)) {
        $errores['nombre'] = "El nombre debe contener solo letras.";
    }

    if (!validarLetras($apellido)) {
        $errores['apellido'] = "El apellido debe contener solo letras.";
    }

    return $errores;
}

// Inicializar mensajes de validación vacíos
$mensajeErroresCrear = [];

// Create
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Validar datos
    $errores = validarDatos($nombre, $apellido);

    if (empty($errores)) {
        // No hay errores, proceder con la inserción en la base de datos
        $sql = "INSERT INTO usuarios (nombre, apellido) VALUES ('$nombre', '$apellido')";
        $conn->query($sql);
    } else {
        $mensajeErroresCrear = $errores;
    }
}

// Read
$result = $conn->query("SELECT * FROM usuarios");

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newNombre = $_POST['newNombre'];
    $newApellido = $_POST['newApellido'];

    // Validar datos
    $errores = validarDatos($newNombre, $newApellido);

    if (empty($errores)) {
        // No hay errores, proceder con la actualización en la base de datos
        $sql = "UPDATE usuarios SET nombre='$newNombre', apellido='$newApellido' WHERE id=$id";
        $conn->query($sql);
    } else {
        $mensajeErrorActualizar[$id] = $errores;
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // No es necesario validar datos para eliminar un registro

    // Eliminar de la base de datos
    $sql = "DELETE FROM usuarios WHERE id=$id";
    $conn->query($sql);
}

// Include the HTML view
include('index_view.php');
?>
