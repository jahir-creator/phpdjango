<?php
include 'models/UsuarioModel.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'listar';

        switch ($action) {
            case 'crear':
                $this->crear();
                break;
            case 'actualizar':
                $this->actualizar();
                break;
            case 'eliminar':
                $this->eliminar();
                break;
            default:
                $this->listar();
                break;
        }
    }

    private function listar() {
        $usuarios = $this->model->obtenerUsuarios();
        include 'views/index_view.php';
    }

    private function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $this->model->crearUsuario($nombre, $apellido);
        }

        $this->listar();
    }

    private function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['newNombre'];
            $apellido = $_POST['newApellido'];
            $this->model->actualizarUsuario($id, $nombre, $apellido);
        }

        $this->listar();
    }

    private function eliminar() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->model->eliminarUsuario($id);
        }

        $this->listar();
    }
}
?>

