<?php
class Conexion {
    private $servername = "tu_servidor_mysql";
    private $username = "tu_usuario_mysql";
    private $password = "tu_contraseña_mysql";
    private $dbname = "tu_nombre_de_base_de_datos";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }
}
?>
