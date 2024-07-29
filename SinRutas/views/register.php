<?php
require_once 'controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioController->register();
}
?>

<h1>Registro</h1>

<form action="register.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad"><br><br>
    <input type="submit" value="Registrarse">
</form>

<p>Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>