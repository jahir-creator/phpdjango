<?php
include('conexion.php');

$mensajeErroresCrear = [];

// Create
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Validar datos con JavaScript
    echo '<script src="validaciones.js"></script>';
}

// Read
$result = $conn->query("SELECT * FROM usuarios");

// Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $newNombre = $_POST['newNombre'];
    $newApellido = $_POST['newApellido'];

    // Validar datos con JavaScript
    echo '<script src="validaciones.js"></script>';
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

