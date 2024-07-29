<?php
require_once 'config/db.php';

class Usuario {
    public $id;
    public $nombre;
    public $email;
    public $password;
    public $edad;

    public static function all() {
        $sql = "SELECT * FROM usuarios";
        $result = $conn->query($sql);
        $usuarios = array();
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = new Usuario($row);
        }
        return $usuarios;
    }

    public static function find($id) {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return new Usuario($row);
    }

    public static function where($campo, $valor) {
        $sql = "SELECT * FROM usuarios WHERE $campo = '$valor'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return new Usuario($row);
    }

    public function save() {
        $sql = "INSERT INTO usuarios (nombre, email, password, edad) VALUES ('$this->nombre', '$this->email', '$this->password', $this->edad)";
        $conn->query($sql);
    }

    public function update() {
        $sql = "UPDATE usuarios SET nombre = '$this->nombre', email = '$this->email', password = '$this->password', edad = $this->edad WHERE id = $this->id";
        $conn->query($sql);
    }

    public function delete() {
        $sql = "DELETE FROM usuarios WHERE id = $this->id";
        $conn->query($sql);
    }

    public function __construct($data = null) {
        if ($data) {
            $this->id = $data['id'];
            $this->nombre = $data['nombre'];
            $this->email = $data['email'];
            $this->password = $data['password'];
            $this->edad = $data['edad'];
        }
    }
}
?>