<?php

namespace app\controllers;

use app\models\Gerenciador;

class AuthGerenciador extends Gerenciador
{
    public function login()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/authLogin/loginGerenciador.php";
    }

    public function processaLogin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $email = filter_input(INPUT_POST, 'g_email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'g_senha', FILTER_SANITIZE_SPECIAL_CHARS);

        $gerenciador = $this->verificaLogin($email, $senha);

        if ($gerenciador) {
            $_SESSION['gerenciador_id'] = $gerenciador['g_id'];
            $_SESSION['gerenciador_email'] = $gerenciador['g_email'];

            header("Location: /?router=Usuarios/usuarios");
            exit;
        } else {
            $_SESSION['error'] = "Email ou senha incorretos.";
            header("Location: /?router=AuthGerenciador/login");
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