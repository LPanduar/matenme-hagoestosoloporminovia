<?php
require_once 'controllers/UsuarioController.php';

$usuarioController = new UsuarioController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioController->login();
}
?>

<h1>Login</h1>

<form action="login.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Iniciar sesión">
</form>

<p>No tienes cuenta? <a href="register.php">Regístrate</a></p>