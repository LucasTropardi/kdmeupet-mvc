<?php

namespace app\controllers;

use app\models\Usuario;

class AuthLogin extends Usuario
{
    public function cadastrar()
    {
        require_once ROOT . "/app/views/partials/navbar1.php";
        require_once ROOT . "/app/views/authLogin/cadastrarUsuario.php";
        $cadastrar = $this->cadastrar();
    }
}