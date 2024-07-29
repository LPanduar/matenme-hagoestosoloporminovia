<?php
require_once 'models/Respuesta.php';

class RespuestaController {
    public function create($encuesta_id, $opcion_id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $usuario_id = $_SESSION['usuario_id'];

            $respuesta = new Respuesta();
            $respuesta->encuesta_id = $encuesta_id;
            $respuesta->opcion_id = $opcion_id;
            $respuesta->usuario_id = $usuario_id;

            $respuesta->save();

            header('Location: encuestas.php?action=show&id=' . $encuesta_id);
        }
    }

    public function delete($id) {
        $respuesta = Respuesta::find($id);
        $respuesta->delete();

        header('Location: encuestas.php?action=show&id=' . $respuesta->encuesta_id);
    }
}
?>