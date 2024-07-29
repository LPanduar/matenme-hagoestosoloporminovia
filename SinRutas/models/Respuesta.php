<?php
require_once 'config/db.php';

class Respuesta {
    public $id;
    public $encuesta_id;
    public $opcion_id;
    public $usuario_id;

    public static function find($id) {
        $sql = "SELECT * FROM respuestas WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return new Respuesta($row);
    }

    public function save() {
        $sql = "INSERT INTO respuestas (encuesta_id, opcion_id, usuario_id) VALUES ($this->encuesta_id, $this->opcion_id, $this->usuario_id)";
        $conn->query($sql);
    }

    public function delete() {
        $sql = "DELETE FROM respuestas WHERE id = $this->id";
        $conn->query($sql);
    }

    public function __construct($data = null) {
        if ($data) {
            $this->id = $data['id'];
            $this->encuesta_id = $data['encuesta_id'];
            $this->opcion_id = $data['opcion_id'];
            $this->usuario_id = $data['usuario_id'];
        }
    }
}
?>