<?php

namespace app\controllers;

use app\models\Usuario;

class AuthLogin extends Usuario
{
    public function cadastrar()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/authLogin/cadastrarUsuario.php";
        $cadastrar = $this->cadastra();
        if ($cadastrar) {
            echo '<script>window.location.href = "/?router=AuthLogin/login";</script>';
        }  
    }

    public function login()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/authLogin/login.php";
    }

    public function processaLogin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $email = filter_input(INPUT_POST, 'u_email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'u_senha', FILTER_SANITIZE_SPECIAL_CHARS);

        $usuario = $this->verificaLogin($email, $senha);

        if ($usuario) {
            $_SESSION['user_id'] = $usuario['u_id'];
            $_SESSION['user_email'] = $usuario['u_email'];
            $_SESSION['user_foto'] = $usuario['u_foto'];
            $_SESSION['user_nome'] = $usuario['u_nome'];
            $_SESSION['user_sobrenome'] = $usuario['u_sobrenome'];

            header("Location: /?router=Logado/home");
            exit;
        } else {
            $_SESSION['error'] = "Email ou senha incorretos.";
            header("Location: /?router=AuthLogin/login");
            exit;
        }
    }

    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];

        header("Location: /?router=Site/home");
        exit;
    }

}