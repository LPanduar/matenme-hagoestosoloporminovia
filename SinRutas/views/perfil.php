<?php
require_once 'controllers/UsuarioController.php';

$usuarioController = new UsuarioController();
$usuario = $usuarioController->perfil();

?>

<h1>Perfil</h1>

<p>Nombre: <?php echo $usuario->nombre; ?></p>
<p>Email: <?php echo $usuario->email; ?></p>
<p>Edad: <?php echo $usuario->edad; ?></p>

<form action="perfil.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $usuario->nombre; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $usuario->email; ?>"><br><br>
    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" value="<?php echo $usuario->edad; ?>"><br><br>
    <input type="submit" value="Actualizar perfil">
</form>

<p><a href="cerrarSesion.php">Cerrar sesión</a></p>