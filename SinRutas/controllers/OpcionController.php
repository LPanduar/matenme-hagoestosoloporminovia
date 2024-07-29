<?php
require_once 'models/Opcion.php';

class OpcionController {
    public function create($encuesta_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $texto = $_POST['texto'];

            $opcion = new Opcion();
            $opcion->encuesta_id = $encuesta_id;
            $opcion->texto = $texto;

            $opcion->save();

            header('Location: encuestas.php?action=show&id=' . $encuesta_id);
        }
    }
}
?>