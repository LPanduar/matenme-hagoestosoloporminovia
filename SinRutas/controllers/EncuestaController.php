<?php
require_once 'models/Encuesta.php';

class EncuestaController {
    public function index() {
        $encuestas = Encuesta::all();
        require_once 'views/encuestas.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $categoria_id = $_POST['categoria_id'];
            $usuario_id = $_SESSION['usuario_id'];
            $fecha_creacion = date('Y-m-d');

            $encuesta = new Encuesta();
            $encuesta->titulo = $titulo;
            $encuesta->descripcion = $descripcion;
            $encuesta->categoria_id = $categoria_id;
            $encuesta->usuario_id = $usuario_id;
            $encuesta->fecha_creacion = $fecha_creacion;

            $encuesta->save();

            header('Location: encuestas.php');
        }
    }

    public function delete($id) {
        $encuesta = Encuesta::find($id);
        $encuesta->delete();
        header('Location: encuestas.php');
    }
}
?>