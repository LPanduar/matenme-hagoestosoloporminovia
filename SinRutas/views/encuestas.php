<?php
require_once 'controllers/EncuestaController.php';
require_once 'controllers/OpcionController.php';

$encuesta_id = $_GET['id'];
$encuesta = Encuesta::find($encuesta_id);
$opciones = Opcion::all($encuesta_id);

$opcionController = new OpcionController();

?>

<h1><?php echo $encuesta->titulo; ?></h1>

<p><?php echo $encuesta->descripcion; ?></p>

<h2>Opciones</h2>

<ul>
    <?php foreach ($opciones as $opcion) { ?>
        <li><?php echo $opcion->texto; ?></li>
    <?php } ?>
</ul>

<form action="encuestas.php?action=createOpcion&id=<?php echo $encuesta_id; ?>" method="post">
    <input type="text" name="texto" placeholder="Agregar opción">
    <button type="submit">Agregar</button>
</form>