<?php
require_once 'config/db.php';

class Encuesta {
    public $id;
    public $titulo;
    public $descripcion;
    public $categoria_id;
    public $usuario_id;
    public $fecha_creacion;

    public static function all() {
        $sql = "SELECT * FROM encuestas";
        $result = $conn->query($sql);
        $encuestas = array();
        while ($row = $result->fetch_assoc()) {
            $encuestas[] = new Encuesta($row);
        }
        return $encuestas;
    }

    public static function find($id) {
        $sql = "SELECT * FROM encuestas WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return new Encuesta($row);
    }

    public function save() {
        $sql = "INSERT INTO encuestas (titulo, descripcion, categoria_id, usuario_id, fecha_creacion) VALUES ('$this->titulo', '$this->descripcion', $this->categoria_id, $this->usuario_id, '$this->fecha_creacion')";
        $conn->query($sql);
    }

    public function delete() {
        $sql = "DELETE FROM encuestas WHERE id = $this->id";
        $conn->query($sql);
    }
}
?>