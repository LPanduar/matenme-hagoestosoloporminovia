<?php
require_once 'controllers/EncuestaController.php';

$encuestaController = new EncuestaController();
$estadisticas = $encuestaController->estadisticas();

?>

<h1>Estadísticas</h1>

<table>
    <tr>
        <th>Encuesta</th>
        <th>Votos</th>
        <th>Porcentaje</th>
    </tr>
    <?php foreach ($estadisticas as $estadistica) { ?>
        <tr>
            <td><?php echo $estadistica['encuesta']; ?></td>
            <td><?php echo $estadistica['votos']; ?></td>
            <td><?php echo $estadistica['porcentaje']; ?>%</td>
        </tr>
    <?php } ?>
</table>

<p><a href="encuestas.php">Volver a encuestas</a></p>