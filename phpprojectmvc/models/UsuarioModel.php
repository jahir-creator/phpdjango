<?php
include 'conexion.php';

class UsuarioModel {
    private $conn;

    public function __construct() {
        $this->conn = new Conexion();
    }

    public function obtenerUsuarios() {
        $result = $this->conn->query("SELECT * FROM usuarios");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function crearUsuario($nombre, $apellido) {
        $this->conn->query("INSERT INTO usuarios (nombre, apellido) VALUES ('$nombre', '$apellido')");
    }

    public function actualizarUsuario($id, $nombre, $apellido) {
        $this->conn->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido' WHERE id=$id");
    }

    public function eliminarUsuario($id) {
        $this->conn->query("DELETE FROM usuarios WHERE id=$id");
    }
}
?>
