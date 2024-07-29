<?php
require_once 'config/db.php';

class Opcion {
    public $id;
    public $encuesta_id;
    public $texto;

    public static function all($encuesta_id) {
        $sql = "SELECT * FROM opciones WHERE encuesta_id = $encuesta_id";
        $result = $conn->query($sql);
        $opciones = array();
        while ($row = $result->fetch_assoc()) {
            $opciones[] = new Opcion($row);
        }
        return $opciones;
    }

    public function save() {
        $sql = "INSERT INTO opciones (encuesta_id, texto) VALUES ($this->encuesta_id, '$this->texto')";
        $conn->query($sql);
    }
}
?>