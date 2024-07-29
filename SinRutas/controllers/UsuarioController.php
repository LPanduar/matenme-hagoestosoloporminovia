<?php
require_once 'models/Usuario.php';

class UsuarioController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $edad = $_POST['edad'];

            $usuario = new Usuario();
            $usuario->nombre = $nombre;
            $usuario->email = $email;
            $usuario->password = password_hash($password, PASSWORD_DEFAULT);
            $usuario->edad = $edad;

            $usuario->save();

            header('Location: login.php');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = Usuario::where('email', $email)->first();

            if ($usuario && password_verify($password, $usuario->password)) {
                $_SESSION['usuario_id'] = $usuario->id;
                header('Location: index.php');
            } else {
                echo 'Email o contraseña incorrectos';
            }
        }
    }

    public function perfil() {
        $usuario_id = $_SESSION['usuario_id'];
        $usuario = Usuario::find($usuario_id);

        require_once 'views/perfil.php';
    }

    public function cerrarSesion() {
        session_destroy();
        header('Location: login.php');
    }
}
?>