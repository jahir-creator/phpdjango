//Punto de entrada de la aplicacion
<?php
include 'controllers/UsuarioController.php';

$controller = new UsuarioController();
$controller->handleRequest();
?>
